<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Notification extends CI_Controller {
	 public function __construct(){	
		parent::__construct();		
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url', 'language'));
	}
	public function index(){
	
		$notification =  $this->common_model->getTableData('notifications',array(),array())->result();
		$data['notification'] = $notification;
		$data['title'] = 'Notification List';
		$data['meta_keywords'] = 'Notification List';
		$data['meta_description'] = 'Notification List';
		$data['main_content'] = 'notification/index';
		$this->load->view('layout/front_layout',$data);
	}
	public function add(){
		if($this->input->post()){
			if(!empty($_FILES['noti_image']['name'])){
				$image1 = $_FILES['noti_image'];
				$configUpload['upload_path']    = '../images/notifications/';
				$configUpload['allowed_types']  = 'gif|jpg|png|bmp|jpeg';                               
				$this->load->library('upload', $configUpload);                 
				if(!$this->upload->do_upload('noti_image')){
					$uploadedDetails    = $this->upload->display_errors();
				}else{
					if(!empty($_FILES['noti_image'])){
						$uploadedDetails    = $this->upload->data(); 
						$ext = substr(strrchr($image1['name'], "."), 1);
						$notification_image = time() . ".$ext";
						rename(
							$uploadedDetails['full_path'],
							$uploadedDetails['file_path'].'/'.$notification_image
						);
					}
				}
				$insert_data['image'] = 'images/notifications/'.$notification_image;
				
			}
			$insert_data['title'] = $this->input->post('title');
			$insert_data['description'] = $this->input->post('description');
			$insert_data['publish_date'] = $this->input->post('publish_date');
			$insert_data['is_active'] = $this->input->post('is_active');
			$results = $this->common_model->insertTableData('notifications', $insert_data);	
			if($results){
				$this->session->set_flashdata('success','Notification has been saved!');
				front_redirect('notification', 'refresh');	
			}else{
				$this->session->set_flashdata('error','Notification has been not saved!');
				front_redirect('notification', 'refresh');	
			}
		}
		$data['title'] = 'Add Notification';
		$data['meta_keywords'] = 'Add Notification';
		$data['meta_description'] = 'Add Notification';
		$data['main_content'] = 'notification/add';
		$this->load->view('layout/front_layout',$data);
	}
	function edit($id = null){
		if($this->input->post()){
			$image = $_FILES['noti_image']['name'];
			if($image!="") {
				$image1 = $_FILES['noti_image'];
				$configUpload['upload_path']    = '../images/notifications/';
				$configUpload['allowed_types']  = 'gif|jpg|png|bmp|jpeg';                               
				$this->load->library('upload', $configUpload);                 
				if(!$this->upload->do_upload('noti_image')){
					$uploadedDetails    = $this->upload->display_errors();

				}else{
					if(!empty($_FILES['noti_image'])){
						$uploadedDetails    = $this->upload->data(); 
						$ext = substr(strrchr($image1['name'], "."), 1);
						$notification_image = time() . ".$ext";
						rename(
							$uploadedDetails['full_path'],
							$uploadedDetails['file_path'].'/'.$notification_image
						);
					}
				} 
			}else{
				$notification_image = $this->input->post('noti_image');
			}
			$updateData['title'] = $this->input->post('title');
			$updateData['description'] = $this->input->post('description');
			$updateData['publish_date'] = $this->input->post('publish_date');
			$updateData['is_active'] = $this->input->post('is_active');
			if(strpos($notification_image,'/') == null){
				$updateData['image'] = 'images/notifications/'.$notification_image;
			}else{
				$updateData['image'] = $notification_image;
			}
			
			$condition = array('id' => $id);
			$update = $this->common_model->updateTableData('notifications', $condition, $updateData);

			if ($update) {
				$this->session->set_flashdata('success', 'Notification successfully updated!');
				front_redirect('notification', 'refresh');	
			}else{
				$this->session->set_flashdata('error', 'Notification has been not updated!');
				front_redirect('notification/edit/'.$id,'refresh');
			}
		}
		$notification = $this->common_model->getTableData('notifications',array('id'=>$id),array())->row();
		$data['notification']=$notification;
		$data['title'] = 'Edit Notification';
		$data['meta_keywords'] = 'Edit Notification';
		$data['meta_description'] = 'Edit Notification';
		$data['main_content'] = 'notification/edit';
		$this->load->view('layout/front_layout',$data);
	}
	function view($id = null){
		$category = $this->common_model->getTableData('category',array('id'=>$id),array())->row();
		$data['category']=$category;
		$data['title'] = 'View Category';
		$data['meta_keywords'] = 'View Category';
		$data['meta_description'] = 'View Category';
		$data['main_content'] = 'category/view';
		$this->load->view('layout/front_layout',$data);
	}
	function deleted ($id = null){ 
		$category = $this->common_model->getTableData('notifications',array('id'=>$id),array())->row();
		if(!empty($category)){
			$condition = array('id' => $id);
			$deletes = $this->common_model->deleteTableData('notifications', $condition);
			if ($deletes) {
				$this->session->set_flashdata('success', 'Notification has been deleted!');
				front_redirect('notification', 'refresh');	
			}else{
				$this->session->set_flashdata('error', 'Notification not found. please try again!');
				front_redirect('notification', 'refresh');
			}
		}
	}
}