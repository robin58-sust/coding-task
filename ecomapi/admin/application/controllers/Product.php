<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller {
	 public function __construct(){	
		parent::__construct();		
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url', 'language'));
	}
	public function index(){
	
		$product =  $this->common_model->getTableData('products',array(),array())->result();
		$data['product'] = $product;
		$data['title'] = 'Product List';
		$data['meta_keywords'] = 'Product List';
		$data['meta_description'] = 'Product List';
		$data['main_content'] = 'product/index';
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
			if(!empty($_FILES['thumb_image']['name'])){
				$image1 = $_FILES['thumb_image'];
				$configUpload['upload_path']    = '../images/products/';
				$configUpload['allowed_types']  = 'gif|jpg|png|bmp|jpeg';                               
				$this->load->library('upload', $configUpload);                 
				if(!$this->upload->do_upload('thumb_image')){
					$uploadedDetails    = $this->upload->display_errors();
				}else{
					if(!empty($_FILES['thumb_image'])){
						$uploadedDetails    = $this->upload->data(); 
						$ext = substr(strrchr($image1['name'], "."), 1);
						$thumb_image = time() . ".$ext";
						rename(
							$uploadedDetails['full_path'],
							$uploadedDetails['file_path'].'/'.$thumb_image
						);
						$this->resizeImage($uploadedDetails['file_path']. $thumb_image, '../images/products/200', 200, null);
						$this->resizeImage($uploadedDetails['file_path'] . $thumb_image,'../images/products/80', 80, null);
					}
				}
				$insert_data['picture'] = $thumb_image;
				//$insert_data['image1'] = $category_image;
			}

			if(!empty($_FILES['slide_image']['name'])){
				$count = count($_FILES['slide_image']['name']);
    
				for($i=0;$i<$count;$i++){
			  
				  if(!empty($_FILES['slide_image']['name'][$i])){
			  
					$_FILES['file']['name'] = $_FILES['slide_image']['name'][$i];
					$_FILES['file']['type'] = $_FILES['slide_image']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['slide_image']['tmp_name'][$i];
					$_FILES['file']['error'] = $_FILES['slide_image']['error'][$i];
					$_FILES['file']['size'] = $_FILES['slide_image']['size'][$i];
			
					$config['upload_path'] = '../images/products/slider/'; 
					$config['allowed_types'] = 'jpg|jpeg|png|gif';
					$config['max_size'] = '5000';
					$config['file_name'] = $_FILES['slide_image']['name'][$i];
			 
					$this->load->library('upload',$config); 
			  
					if($this->upload->do_upload('file')){
					  $uploadedDetails = $this->upload->data();
					  $ext = substr(strrchr($config['file_name'], "."), 1);
					  $slide_image = time()+rand(10000,999999) . ".$ext";
					  rename(
						  $uploadedDetails['full_path'],
						  $uploadedDetails['file_path'].$slide_image
					  );
					  	$this->resizeImage($uploadedDetails['file_path'] . $slide_image, '../images/products/slider/200', 200, null);
						$this->resizeImage($uploadedDetails['file_path'] . $slide_image,'../images/products/slider/80', 80, null);
			 
					  $totalFiles[] = $slide_image;;
					}
					else {
						$uploadedDetails    = $this->upload->display_errors();
					}
				  }
				}
				$insert_data['slider_image'] = implode(',', $totalFiles);
				
			}
			$insert_data['category_id'] = $this->input->post('category_id');
			$insert_data['ranking'] = $this->input->post('ranking');
			$insert_data['name_en'] = $this->input->post('name_en');
			$insert_data['name_bn'] = $this->input->post('name_bn');
			$insert_data['price'] = $this->input->post('price');
			$insert_data['unit'] = $this->input->post('unit');
			$insert_data['sale_price'] = $this->input->post('sale_price');
			$insert_data['is_discount'] = $this->input->post('is_discount');
			$insert_data['amount'] = $this->input->post('amount');
			$insert_data['is_percentage'] = $this->input->post('is_percentage');
			$insert_data['description_bn'] = $this->input->post('description_bn');
			$insert_data['is_active'] = $this->input->post('is_active');
			$results = $this->common_model->insertTableData('products', $insert_data);	
			if($results){
				$this->session->set_flashdata('success','Product has been saved!');
				front_redirect('product', 'refresh');	
			}else{
				$this->session->set_flashdata('error','Product has been not saved!');
				front_redirect('product', 'refresh');	
			}
		}
		$category =  $this->common_model->getTableData('category',array(),array())->result();
		$data['category'] = $category;
		$data['title'] = 'Add Product';
		$data['meta_keywords'] = 'Add Product';
		$data['meta_description'] = 'Add Product';
		$data['main_content'] = 'product/add';
		$this->load->view('layout/front_layout',$data);
	}
	function edit($id = null){
		if($this->input->post()){
			$image = $_FILES['thumb_image']['name'];
			$image_slide = $_FILES['slide_image']['name'];
			if($image!="") {
				$image1 = $_FILES['thumb_image'];
				$configUpload['upload_path']    = '../images/products/';
				$configUpload['allowed_types']  = 'gif|jpg|png|bmp|jpeg';                               
				$this->load->library('upload', $configUpload);                 
				if(!$this->upload->do_upload('thumb_image')){
					$uploadedDetails    = $this->upload->display_errors();
				}else{
					if(!empty($_FILES['thumb_image'])){
						$uploadedDetails    = $this->upload->data(); 
						$ext = substr(strrchr($image1['name'], "."), 1);
						$thumb_image = time() . ".$ext";
						rename(
							$uploadedDetails['full_path'],
							$uploadedDetails['file_path'].'/'.$thumb_image
						);
						$this->resizeImage($uploadedDetails['file_path']. $thumb_image, '../images/products/200', 200, null);
						$this->resizeImage($uploadedDetails['file_path'] . $thumb_image,'../images/products/80', 80, null);
					}
				} 
			}else{
				$thumb_image = $this->input->post('thumb_image');
			}
			if(!empty($image_slide[0])) {
				$count = count($_FILES['slide_image']['name']);
    
				for($i=0;$i<$count;$i++){
			  
				  if(!empty($_FILES['slide_image']['name'][$i])){
			  
					$_FILES['file']['name'] = $_FILES['slide_image']['name'][$i];
					$_FILES['file']['type'] = $_FILES['slide_image']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['slide_image']['tmp_name'][$i];
					$_FILES['file']['error'] = $_FILES['slide_image']['error'][$i];
					$_FILES['file']['size'] = $_FILES['slide_image']['size'][$i];
			
					$config['upload_path'] = '../images/products/slider/'; 
					$config['allowed_types'] = 'jpg|jpeg|png|gif';
					$config['max_size'] = '5000';
					$config['file_name'] = $_FILES['slide_image']['name'][$i];
			 
					$this->load->library('upload',$config); 
			  
					if($this->upload->do_upload('file')){
					  $uploadedDetails = $this->upload->data();
					  //print_r($uploadedDetails);die();
					  $ext = substr(strrchr($config['file_name'], "."), 1);
					  $slide_image = time()+rand(10000,999999) . ".$ext";
					  rename(
						  $uploadedDetails['full_path'],
						  $uploadedDetails['file_path'].$slide_image
					  );
					  	$this->resizeImage($uploadedDetails['file_path'] . $slide_image, '../images/products/slider/200', 200, null);
						$this->resizeImage($uploadedDetails['file_path']  . $slide_image,'../images/products/slider/80', 80, null);
			 
					  $totalFiles[] = $slide_image;
					}
					else {
						$uploadedDetails = $this->upload->display_errors();
					}
				  }
				}
				
				$slide_image = implode(',', $totalFiles);
			}else{
				$slide_image = $this->input->post('slide_image');
			}

			$updateData['category_id'] = $this->input->post('category_id');
			$updateData['ranking'] = $this->input->post('ranking');
			$updateData['name_en'] = $this->input->post('name_en');
			$updateData['name_bn'] = $this->input->post('name_bn');
			$updateData['price'] = $this->input->post('price');
			$updateData['unit'] = $this->input->post('unit');
			$updateData['sale_price'] = $this->input->post('sale_price');
			$updateData['is_discount'] = $this->input->post('is_discount');
			$updateData['amount'] = $this->input->post('amount');
			$updateData['is_percentage'] = $this->input->post('is_percentage');
			$updateData['description_bn'] = $this->input->post('description_bn');
			$updateData['is_active'] = $this->input->post('is_active');
			$updateData['picture'] = $thumb_image;
			$updateData['slider_image'] = $slide_image;
			
		
			$condition = array('product_id' => $id);
			$update = $this->common_model->updateTableData('products', $condition, $updateData);
			if ($update) {
				$this->session->set_flashdata('success', 'Product successfully updated!');
				front_redirect('product', 'refresh');	
			}else{
				$this->session->set_flashdata('error', 'Product has been not updated!');
				front_redirect('product/edit/'.$id,'refresh');
			}
		}
		$product = $this->common_model->getTableData('products',array('product_id'=>$id),array())->row();
		$data['product']=$product;
		$category =  $this->common_model->getTableData('category',array(),array())->result();
		$data['category'] = $category;
		$data['title'] = 'Edit Product';
		$data['meta_keywords'] = 'Edit Product';
		$data['meta_description'] = 'Edit Product';
		$data['main_content'] = 'product/edit';
		$this->load->view('layout/front_layout',$data);
	}
	function view($id = null){
		$product = $this->common_model->getTableData('products',array('product_id'=>$id),array())->row();
		$data['product']=$product;
		$data['title'] = 'View Product';
		$data['meta_keywords'] = 'View Product';
		$data['meta_description'] = 'View Product';
		$data['main_content'] = 'product/view';
		$this->load->view('layout/front_layout',$data);
	}
	function deleted ($id = null){ 
		$category = $this->common_model->getTableData('products',array('product_id'=>$id),array())->row();
		if(!empty($category)){
			$condition = array('product_id' => $id);
			$deletes = $this->common_model->deleteTableData('products', $condition);
			if ($deletes) {
				$this->session->set_flashdata('success', 'Product has been deleted!');
				front_redirect('product', 'refresh');	
			}else{
				$this->session->set_flashdata('error', 'Product not found. please try again!');
				front_redirect('product', 'refresh');
			}
		}
	}
}
