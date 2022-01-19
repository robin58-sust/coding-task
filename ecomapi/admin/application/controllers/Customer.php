<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer extends CI_Controller {
	 public function __construct(){	
		parent::__construct();		
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url', 'language'));
	}
	public function index(){
	
		$customer =  $this->common_model->getTableData('users',array(),array())->result();
		$data['customer'] = $customer;
		$data['title'] = 'Customer List';
		$data['meta_keywords'] = 'Customer List';
		$data['meta_description'] = 'Customer List';
		$data['main_content'] = 'customer/index';
		$this->load->view('layout/front_layout',$data);
	}
	public function add(){
		if($this->input->post()){
			$insert_data['name'] = $this->input->post('name');
			$insert_data['mobile'] = $this->input->post('mobile');
			$insert_data['is_verified'] = $this->input->post('is_verified');
			$insert_data['house'] = $this->input->post('house');
			$insert_data['flat'] = $this->input->post('flat');
			$insert_data['road'] = $this->input->post('road');
			$insert_data['block'] = $this->input->post('block');
			$insert_data['area'] = $this->input->post('area');
			$insert_data['instruction'] = $this->input->post('instruction');
			$results = $this->common_model->insertTableData('users', $insert_data);	
			if($results){
				$this->session->set_flashdata('success','Customer has been saved!');
				front_redirect('customer', 'refresh');	
			}else{
				$this->session->set_flashdata('error','Customer has been not saved!');
				front_redirect('customer', 'refresh');	
			}
		}
		$data['title'] = 'Add Customer';
		$data['meta_keywords'] = 'Add Customer';
		$data['meta_description'] = 'Add Customer';
		$data['main_content'] = 'customer/add';
		$this->load->view('layout/front_layout',$data);
	}
	function edit($id = null){
		if($this->input->post()){

			$updateData['name'] = $this->input->post('name');
			$updateData['mobile'] = $this->input->post('mobile');
			$updateData['is_verified'] = $this->input->post('is_verified');
			$updateData['house'] = $this->input->post('house');
			$updateData['flat'] = $this->input->post('flat');
			$updateData['road'] = $this->input->post('road');
			$updateData['block'] = $this->input->post('block');
			$updateData['area'] = $this->input->post('area');
			$updateData['instruction'] = $this->input->post('instruction');
		
			$condition = array('user_id' => $id);
			$update = $this->common_model->updateTableData('users', $condition, $updateData);
			if ($update) {
				$this->session->set_flashdata('success', 'Customer successfully updated!');
				front_redirect('customer', 'refresh');	
			}else{
				$this->session->set_flashdata('error', 'Customer has been not updated!');
				front_redirect('customer/edit/'.$id,'refresh');
			}
		}
		$customer = $this->common_model->getTableData('users',array('user_id'=>$id),array())->row();
		$data['customer']=$customer;
		$data['title'] = 'Edit Customer';
		$data['meta_keywords'] = 'Edit Customer';
		$data['meta_description'] = 'Edit Customer';
		$data['main_content'] = 'customer/edit';
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
		$category = $this->common_model->getTableData('users',array('user_id'=>$id),array())->row();
		if(!empty($category)){
			$condition = array('user_id' => $id);
			$deletes = $this->common_model->deleteTableData('users', $condition);
			if ($deletes) {
				$this->session->set_flashdata('success', 'User has been deleted!');
				front_redirect('customer', 'refresh');	
			}else{
				$this->session->set_flashdata('error', 'User not found. please try again!');
				front_redirect('customer', 'refresh');
			}
		}
	}
}