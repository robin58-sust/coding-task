<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Order extends CI_Controller {
	 public function __construct(){	
		parent::__construct();		
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url', 'language'));
	
	}
	public function index(){
		$order_status =  $this->common_model->getTableData('order_status',array(),array())->result();
		$this->db->select('*');
    	$this->db->from('orders');
   		$this->db->where_in('status',['0','11']);
		$query = $this->db->get();
		$orders = $query->result(); 
		$data['orders'] = $orders;
		$data['order_status'] = $order_status;
		$data['title'] = 'Order List';
		$data['meta_keywords'] = 'Order List';
		$data['meta_description'] = 'Order List';
		$data['main_content'] = 'order/index';
		$session_data = array('sidebar' =>'new');
		$this->session->set_userdata($session_data);
		$this->load->view('layout/front_layout',$data);
	}
	public function add(){
		
		$order_status =  $this->common_model->getTableData('order_status',array(),array())->result();
		$delivery_mans =  $this->common_model->getTableData('delivery_mans',array(),array())->result();
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
					}
				}
				$insert_data['app_image'] = 'images/categories/'.$category_image;
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
		$data['order_status'] = $order_status;
		$data['delivery_mans'] = $delivery_mans;
		$data['title'] = 'Add Order';
		$data['meta_keywords'] = 'Add Order';
		$data['meta_description'] = 'Add Order';
		$data['main_content'] = 'order/add';
		$this->load->view('layout/front_layout',$data);
	}
	public function shipping(){
		$orders =  $this->common_model->getTableData('orders',array('status'=>'12'),array())->result();
		$data['orders'] = $orders;
		$data['title'] = 'Order Shipping';
		$data['meta_keywords'] = 'Order Shipping';
		$data['meta_description'] = 'Order Shipping';
		$data['main_content'] = 'order/shipping';
		$session_data = array('sidebar' =>'shipping');
		$this->session->set_userdata($session_data);
		$this->load->view('layout/front_layout',$data);
	}
	public function partially(){
		$orders =  $this->common_model->getTableData('orders',array('status'=>'21'),array())->result();
		$data['orders'] = $orders;
		$data['title'] = 'Order Partially Delivered';
		$data['meta_keywords'] = 'Order Partially Delivered';
		$data['meta_description'] = 'Order Partially Delivered';
		$data['main_content'] = 'order/partially';
		$session_data = array('sidebar' =>'partially');
		$this->session->set_userdata($session_data);
		$this->load->view('layout/front_layout',$data);
	}
	public function delivered(){
		$orders =  $this->common_model->getTableData('orders',array('status'=>'22'),array())->result();
		$data['orders'] = $orders;
		$data['title'] = 'Order Delivered';
		$data['meta_keywords'] = 'Order Delivered';
		$data['meta_description'] = 'Order Delivered';
		$data['main_content'] = 'order/delivered';
		$session_data = array('sidebar' =>'delivered');
		$this->session->set_userdata($session_data);
		$this->load->view('layout/front_layout',$data);
	}
	public function canceled(){
		$orders =  $this->common_model->getTableData('orders',array('status'=>'41'),array())->result();
		$data['orders'] = $orders;
		$data['title'] = 'Order Canceled ';
		$data['meta_keywords'] = 'Order Canceled';
		$data['meta_description'] = 'Order Canceled';
		$data['main_content'] = 'order/canceled';
		$session_data = array('sidebar' =>'canceled');
		$this->session->set_userdata($session_data);
		$this->load->view('layout/front_layout',$data);
	}
	function edit($id = null){
		$orders = $this->common_model->getTableData('orders',array('id'=>$id),array())->row();
		$user_id = $orders->user_id;
		$user = $this->common_model->getTableData('users',array('user_id'=>$user_id),array())->row();

		$order_status =  $this->common_model->getTableData('order_status',array(),array())->result();
		$delivery_mans =  $this->common_model->getTableData('delivery_mans',array(),array())->result();


		if($this->input->post()){
			$updateData['mobile'] = $this->input->post('mobile');
			$updateData['name'] = $this->input->post('name');
			$updateData['house'] = $this->input->post('house');
			$updateData['flat'] = $this->input->post('flat');
			$updateData['road'] = $this->input->post('road');
			$updateData['block'] = $this->input->post('block');
			$updateData['area'] = $this->input->post('area');
			$updateData['instruction'] = $this->input->post('instruction');
			$updateData['delivery_note'] = $this->input->post('delivery_note');
			$updateData['admin_msg'] = $this->input->post('admin_msg');
			$updateData['status'] = $this->input->post('status');
			$updateData['cash_collection'] = $this->input->post('cash_collection');
			$updateData['due'] = $this->input->post('due');
			$updateData['delivery_man'] = $this->input->post('delivery_man');
			$condition = array('id' => $id);
			$update = $this->common_model->updateTableData('orders', $condition, $updateData);
			if(($this->input->post('status') ==11) && isset($_POST['check_sms'])){
				$username = "KenaKeta";
	   			$password = "Sms4TFol@1!";
	   			$mobiles = $this->input->post('mobile');
	   			$originator = '01844016400';
	   			$message  = 'Your order '.$id." is received.\nThanks\nTazaFol - 01970413031";
	   			$message = rawurlencode($message);
	   			$url = "http://clients.muthofun.com:8901/esmsgw/sendsms.jsp?user=$username&password=$password&mobiles=$mobiles&sms=$message&unicode=1";			

				$c = curl_init(); 
				curl_setopt($c, CURLOPT_RETURNTRANSFER, 1); 
				curl_setopt($c, CURLOPT_URL, $url); 
				$response = curl_exec($c);
			}
			if ($update) {
				$updateDataUser['due'] = $this->input->post('previous_due');
				$updateDataUser['is_verified'] = $this->input->post('is_verified');
				$user_id = $this->input->post('user_id');
				$conditionUser = array('user_id' => $user_id);
				$update = $this->common_model->updateTableData('users', $conditionUser, $updateDataUser);

				if(!empty($this->input->post('order_detail_id'))){
					$order_detail_id = $this->input->post('order_detail_id');
					$quantity = $this->input->post('quantity');
					foreach($order_detail_id as $k=>$order_detail_ids) {
						$updateDatas['quantity'] = $quantity[$k];
						$is_delivered = $_POST['is_delivered_'.$order_detail_ids];
						$updateDatas['is_delivered'] = $is_delivered;
						$condition = array('id' => $order_detail_ids);
						$update = $this->common_model->updateTableData('order_details', $condition, $updateDatas);
					}
				}
				$this->session->set_flashdata('success', 'Order successfully updated!');
				front_redirect('order', 'refresh');	
			}else{
				$this->session->set_flashdata('error', 'Order has been not updated!');
				front_redirect('order/edit/'.$id,'refresh');
			}
			
		}
		
		
		$this->db->select("order_details.id,order_details.order_id,order_details.product_id,order_details.unit,order_details.quantity,order_details.is_delivered,products.name_en,products.name_bn");
		$this->db->from('order_details');
		$this->db->join('products', 'order_details.product_id = products.product_id');
		$this->db->where('order_details.order_id', $id);
		$query = $this->db->get();
		$order_details_product = $query->result_array();
		$data['user'] = $user;
		$data['orders'] = $orders;
		$data['order_status'] = $order_status;
		$data['delivery_mans'] = $delivery_mans;
		$data['order_details_product'] = $order_details_product;
		$data['title'] = 'Edit Order';
		$data['meta_keywords'] = 'Edit Order';
		$data['meta_description'] = 'Edit Order';
		$data['main_content'] = 'order/edit';
		$this->load->view('layout/front_layout',$data);
	}
	function view($id = null){
		$orders = $this->common_model->getTableData('orders',array('id'=>$id),array())->row();
		$user_id = $orders->user_id;
		$user = $this->common_model->getTableData('users',array('user_id'=>$user_id),array())->row();

		$order_status =  $this->common_model->getTableData('order_status',array(),array())->result();
		$this->db->select("order_details.id,order_details.order_id,order_details.price,order_details.product_id,order_details.unit,order_details.quantity,order_details.is_delivered,products.name_en,products.name_bn");
		$this->db->from('order_details');
		$this->db->join('products', 'order_details.product_id = products.product_id');
		$this->db->where('order_details.order_id', $id);
		$query = $this->db->get();
		$order_details_product = $query->result_array();
		$data['user'] = $user;
		$data['orders'] = $orders;
		$data['order_status'] = $order_status;
		$data['order_details_product'] = $order_details_product;
		$data['title'] = 'View Order';
		$data['meta_keywords'] = 'View Order';
		$data['meta_description'] = 'View Order';
		$data['main_content'] = 'order/view';
		$this->load->view('layout/front_layout',$data);
	}
	function invoice($id = null){
		$orders = $this->common_model->getTableData('orders',array('id'=>$id),array())->row();
		$user_id = $orders->user_id;
		$user = $this->common_model->getTableData('users',array('user_id'=>$user_id),array())->row();

		$order_status =  $this->common_model->getTableData('order_status',array(),array())->result();
		$this->db->select("order_details.id,order_details.order_id,order_details.price,order_details.product_id,order_details.unit,order_details.quantity,order_details.is_delivered,products.name_en,products.name_bn");
		$this->db->from('order_details');
		$this->db->join('products', 'order_details.product_id = products.product_id');
		$this->db->where('order_details.order_id', $id);
		$query = $this->db->get();
		$order_details_product = $query->result_array();
		$data['user'] = $user;
		$data['orders'] = $orders;
		$data['order_status'] = $order_status;
		$data['order_details_product'] = $order_details_product;
		
		if(isset($_POST['send_sms']) && $_POST['send_sms'] =='1'){
			//echo "user_mobile".$orders->mobile;
			$message  = 'Your order '.$orders->id." is shipping\n";
			if(!empty($_POST['product_name_en'])){ 
				$disableRow = $_POST['disableRow'];
				$product_name = $_POST['product_name_en'];
				$post_deliver_qty = $this->input->post('post_deliver_qty');
				$post_unit_price = $this->input->post('post_unit_price');
				$product_unit = $this->input->post('product_unit');
				$post_total = $this->input->post('post_total');
				foreach($disableRow as  $k=>$order_details_product_arr) {
					$message  .= $product_name[$k].'-'.$post_deliver_qty[$k].'('.$product_unit[$k].')-'.$post_unit_price[$k]*$post_deliver_qty[$k]."tk\n";
				}
			} 
			if(isset($_POST['extraCharges']['delivery_charges'])){
				$message .= 'Delivery charge - '.$_POST['post_delivery_charges']."tk\n";
			}
			if(isset($_POST['extraCharges']['fish_clean_fee'])){
				$message .= 'Fish clean - '.$_POST['post_fish_fee']."tk\n";
			}
			if(isset($_POST['extraCharges']['other_clean_fee'])){
				$message .= 'Others fee - '.$_POST['post_other_fee']."tk\n";
			}
			if(isset($_POST['extraCharges']['previous_due'])){
				$message  .= 'Previous due - '.$_POST['post_dues']."tk\n";
			}
			if(isset($_POST['extraCharges']['discount'])){
				$message  .= 'Discount - '.$_POST['post_discount']."tk\n";
			}
		    $message  .= 'Total - '.$_POST['post_grand_total']."tk\n";
		    $message  .= 'TazaFol 01970413031';
		    

		    $username = "KenaKeta";
	   		$password = "Sms4TFol@1!";
	   		$mobiles = $orders->mobile;
	   		$originator = '01844016400';

	   		$message = rawurlencode($message);
	   		$url = "http://clients.muthofun.com:8901/esmsgw/sendsms.jsp?user=$username&password=$password&mobiles=$mobiles&sms=$message&unicode=1";			

			$c = curl_init(); 
			curl_setopt($c, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($c, CURLOPT_URL, $url); 
			$response = curl_exec($c);


	  
		}
		$data['title'] = 'Invoice Order';
	    $data['meta_keywords'] = 'Invoice Order';
	    $data['meta_description'] = 'Invoice Order';
		$this->load->view('order/invoice',$data);
		
	
	}

	function deleted($id = null){ 
		$orders = $this->common_model->getTableData('orders',array('id'=>$id),array())->row();
		if(!empty($orders)){
			$this->db->delete('orders', array('id' => $id));
			$this ->db->delete('order_details', array('order_id' => $id));
			$this->session->set_flashdata('success','Order has been deleted');
			front_redirect('order', 'refresh');
		}else{
			$this->session->set_flashdata('error','Order not found. please try again');
			front_redirect('order', 'refresh');
		}
	}
	function details($id = null){
		$orders = $this->common_model->getTableData('orders',array('id'=>$id),array())->row();
		$order_status =  $this->common_model->getTableData('order_status',array(),array())->result();
		$this->db->select("order_details.id,order_details.order_id,order_details.price,order_details.product_id,order_details.unit,order_details.quantity,order_details.is_delivered,products.name_en,products.name_bn");
		$this->db->from('order_details');
		$this->db->join('products', 'order_details.product_id = products.product_id');
		$this->db->where('order_details.order_id', $id);
		$query = $this->db->get();
		$order_details_product = $query->result_array();
		$data['orders'] = $orders;
		$data['order_status'] = $order_status;
		$data['order_details_product'] = $order_details_product;
		$data['title'] = 'Details Order';
		$data['meta_keywords'] = 'Details Order';
		$data['meta_description'] = 'Details Order';
		$data['main_content'] = 'order/details';
		$this->load->view('layout/front_layout',$data);
	}
}
