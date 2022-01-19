<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends CI_Controller {
	 public function __construct(){	
		parent::__construct();		
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url', 'language'));
	}
	public function index(){
	
		$category =  $this->common_model->getTableData('category',array(),array())->result();
		$data['category'] = $category;
		$data['title'] = 'Category List';
		$data['meta_keywords'] = 'Category List';
		$data['meta_description'] = 'Category List';
		$data['main_content'] = 'category/index';
		$this->load->view('layout/front_layout',$data);
	}
	 /**

    * Manage uploadImage

    *

    * @return Mix  Resize error or true

   */

  public function resizeImage($sourcePath, $destinationPath, $width=200, $height)

  {

	 $config_manip = array(

		 'image_library' => 'gd2',

		 'source_image' => $sourcePath,

		 'new_image' => $destinationPath,

		 'maintain_ratio' => TRUE,

		 'create_thumb' => TRUE,

		 'thumb_marker' => '',

		 'width' => $width,

		 'height' => $height,

	 );

	// print_r($config_manip);
	// die();



	$this->load->library('image_lib');
	$this->image_lib->initialize($config_manip);

	if (!$this->image_lib->resize()) {

		return $this->image_lib->display_errors();

	}
	$this->image_lib->clear();
	return true;
}

	public function add(){
		if($this->input->post()){
			if(!empty($_FILES['app_image']['name'])){
				$image1 = $_FILES['app_image'];
				$configUpload['upload_path']    = '../images/categories/';
				$configUpload['allowed_types']  = 'gif|jpg|png|bmp|jpeg';                               
				$this->load->library('upload', $configUpload);                 
				if(!$this->upload->do_upload('app_image')){
					$uploadedDetails    = $this->upload->display_errors();
				}else{
					if(!empty($_FILES['app_image'])){
						$uploadedDetails    = $this->upload->data();
						$ext = substr(strrchr($image1['name'], "."), 1);
						$category_image = time() . ".$ext";
						rename(
							$uploadedDetails['full_path'],
							$uploadedDetails['file_path'].'/'.$category_image
						);
						//print_r($uploadedDetails);
						$this->resizeImage($uploadedDetails['file_path']. $category_image, '../images/categories/200', 200, null);
						$this->resizeImage($uploadedDetails['file_path'] . $category_image,'../images/categories/80', 80, null);
					}
				}
				$insert_data['app_image'] = $category_image;
				$insert_data['web_image'] = $category_image;
			}
			$insert_data['ranking'] = $this->input->post('ranking');
			$insert_data['name_en'] = $this->input->post('name_en');
			$insert_data['name_bn'] = $this->input->post('name_bn');
			$insert_data['is_active'] = $this->input->post('is_active');
			$results = $this->common_model->insertTableData('category', $insert_data);	
			if($results){
				$this->session->set_flashdata('success','Category has been saved!');
				front_redirect('category', 'refresh');	
			}else{
				$this->session->set_flashdata('error','Category has been not saved!');
				front_redirect('category', 'refresh');	
			}
		}
		$data['title'] = 'Add Category';
		$data['meta_keywords'] = 'Add Category';
		$data['meta_description'] = 'Add Category';
		$data['main_content'] = 'category/add';
		$this->load->view('layout/front_layout',$data);
	}
	function edit($id = null){
		if($this->input->post()){
			$image = $_FILES['app_image']['name'];
			if($image!="") {
				$image1 = $_FILES['app_image'];
				$configUpload['upload_path']    = '../images/categories/';
				$configUpload['allowed_types']  = 'gif|jpg|png|bmp|jpeg';                               
				$this->load->library('upload', $configUpload);                 
				if(!$this->upload->do_upload('app_image')){
					$uploadedDetails    = $this->upload->display_errors();
				}else{
					if(!empty($_FILES['app_image'])){
						$uploadedDetails    = $this->upload->data(); 
						$ext = substr(strrchr($image1['name'], "."), 1);
						$category_image = time() . ".$ext";
						rename(
							$uploadedDetails['full_path'],
							$uploadedDetails['file_path'].'/'.$category_image
						);
						$this->resizeImage($uploadedDetails['file_path']. $category_image, '../images/categories/200', 200, null);
						$this->resizeImage($uploadedDetails['file_path'] . $category_image,'../images/categories/80', 80, null);
					}
				} 
			}else{
				$category_image = $this->input->post('app_image');
			}
			$updateData['ranking'] = $this->input->post('ranking');
			$updateData['name_en'] = $this->input->post('name_en');
			$updateData['name_bn'] = $this->input->post('name_bn');
			$updateData['is_active'] = $this->input->post('is_active');
			if(strpos($category_image,'/') == null){
				$updateData['app_image'] =  $category_image;
			}else{
				$updateData['app_image'] = $category_image;
			}
			
			$updateData['web_image'] = $category_image;
			$condition = array('id' => $id);
			$update = $this->common_model->updateTableData('category', $condition, $updateData);
			if ($update) {
				$this->session->set_flashdata('success', 'Category successfully updated!');
				front_redirect('category', 'refresh');	
			}else{
				$this->session->set_flashdata('error', 'Category has been not updated!');
				front_redirect('category/edit/'.$id,'refresh');
			}
		}
		$category = $this->common_model->getTableData('category',array('id'=>$id),array())->row();
		$data['category']=$category;
		$data['title'] = 'Edit Category';
		$data['meta_keywords'] = 'Edit Category';
		$data['meta_description'] = 'Edit Category';
		$data['main_content'] = 'category/edit';
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
		$category = $this->common_model->getTableData('category',array('id'=>$id),array())->row();
		if(!empty($category)){
			$condition = array('id' => $id);
			$deletes = $this->common_model->deleteTableData('category', $condition);
			if ($deletes) {
				$this->session->set_flashdata('success', 'Category has been deleted!');
				front_redirect('category', 'refresh');	
			}else{
				$this->session->set_flashdata('error', 'Category not found. please try again!');
				front_redirect('category', 'refresh');
			}
		}
	}
}
