<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Offer extends CI_Controller {
	 public function __construct(){	
		parent::__construct();		
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url', 'language'));
	}
	public function index(){
	
		$offer =  $this->common_model->getTableData('offer_list',array(),array())->result();
		$data['offer'] = $offer;
		$data['title'] = 'Offer List';
		$data['meta_keywords'] = 'Offer List';
		$data['meta_description'] = 'Offer List';
		$data['main_content'] = 'offer/index';
		$this->load->view('layout/front_layout',$data);
	}
	public function add(){
		if($this->input->post()){
			if(!empty($_FILES['offer_image']['name'])){
				$image1 = $_FILES['offer_image'];
				$configUpload['upload_path']    = '../images/offers/';
				$configUpload['allowed_types']  = 'gif|jpg|png|bmp|jpeg';                               
				$this->load->library('upload', $configUpload);                 
				if(!$this->upload->do_upload('offer_image')){
					$uploadedDetails    = $this->upload->display_errors();
				}else{
					if(!empty($_FILES['offer_image'])){
						$uploadedDetails    = $this->upload->data(); 
						$ext = substr(strrchr($image1['name'], "."), 1);
						$offer_image = time() . ".$ext";
						rename(
							$uploadedDetails['full_path'],
							$uploadedDetails['file_path'].'/'.$offer_image
						);
					}
				}
				$insert_data['image'] = 'images/offers/'.$offer_image;
			}
			$insert_data['title'] = $this->input->post('title');
			$insert_data['description'] = $this->input->post('description');
			$insert_data['offer_start'] = $this->input->post('offer_start');
			$insert_data['offer_end'] = $this->input->post('offer_end');
			$insert_data['is_active'] = $this->input->post('is_active');
			$results = $this->common_model->insertTableData('offer_list', $insert_data);	
			if($results){
				$this->session->set_flashdata('success','Offer has been saved!');
				front_redirect('offer', 'refresh');	
			}else{
				$this->session->set_flashdata('error','Offer has been not saved!');
				front_redirect('offer', 'refresh');	
			}
		}
		$data['title'] = 'Add Offer';
		$data['meta_keywords'] = 'Add Offer';
		$data['meta_description'] = 'Add Offer';
		$data['main_content'] = 'offer/add';
		$this->load->view('layout/front_layout',$data);
	}
	function edit($id = null){
		if($this->input->post()){
			$image = $_FILES['offer_image']['name'];
			if($image!="") {
				$image1 = $_FILES['offer_image'];
				$configUpload['upload_path']    = '../images/offers/';
				$configUpload['allowed_types']  = 'gif|jpg|png|bmp|jpeg';                               
				$this->load->library('upload', $configUpload);                 
				if(!$this->upload->do_upload('offer_image')){
					$uploadedDetails    = $this->upload->display_errors();
				}else{
					if(!empty($_FILES['offer_image'])){
						$uploadedDetails    = $this->upload->data(); 
						$ext = substr(strrchr($image1['name'], "."), 1);
						$offer_image = time() . ".$ext";
						rename(
							$uploadedDetails['full_path'],
							$uploadedDetails['file_path'].'/'.$offer_image
						);
					}
				} 
			}else{
				$offer_image = $this->input->post('offer_image');
			}
			$updateData['title'] = $this->input->post('title');
			$updateData['description'] = $this->input->post('description');
			$updateData['offer_start'] = $this->input->post('offer_start');
			$updateData['offer_end'] = $this->input->post('offer_end');
			$updateData['is_active'] = $this->input->post('is_active');
			if(strpos($offer_image,'/') == null){
				$updateData['image'] = 'images/offers/'.$offer_image;
			}else{
				$updateData['image'] = $offer_image;
			}
			
			$condition = array('id' => $id);
			$update = $this->common_model->updateTableData('offer_list', $condition, $updateData);
			if ($update) {
				$this->session->set_flashdata('success', 'Offer successfully updated!');
				front_redirect('offer', 'refresh');	
			}else{
				$this->session->set_flashdata('error', 'Offer has been not updated!');
				front_redirect('offer/edit/'.$id,'refresh');
			}
		}
		$offer = $this->common_model->getTableData('offer_list',array('id'=>$id),array())->row();
		$data['offer']=$offer;
		$data['title'] = 'Edit Offer';
		$data['meta_keywords'] = 'Edit Offer';
		$data['meta_description'] = 'Edit Offer';
		$data['main_content'] = 'offer/edit';
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
		$category = $this->common_model->getTableData('offer_list',array('id'=>$id),array())->row();
		if(!empty($category)){
			$condition = array('id' => $id);
			$deletes = $this->common_model->deleteTableData('offer_list', $condition);
			if ($deletes) {
				$this->session->set_flashdata('success', 'Offer has been deleted!');
				front_redirect('offer', 'refresh');	
			}else{
				$this->session->set_flashdata('error', 'Offer not found. please try again!');
				front_redirect('offer', 'refresh');
			}
		}
	}
}
