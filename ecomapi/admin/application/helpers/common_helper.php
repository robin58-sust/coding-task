<?php
	// Administrator URL
	function admin_url(){
		return base_url() . 'admin/';
	}
	// Admin URL redirect
	function admin_redirect($url, $refresh = 'refresh') {
		redirect('admin/'.$url, $refresh);
	}
	function admin_login_redirect($url, $refresh = 'refresh') {
		redirect('/'.$url, $refresh);
	}
	// User URL redirect
	function front_redirect($url, $refresh = 'refresh') {
		redirect($url, $refresh);
	}
	function getAdminName($id=null) {
		$ci =& get_instance();
		$admin_name = $ci->db->where('id', $id)->get('admin')->row()->admin_name;
		if ($admin_name) {
			return $admin_name;
		} else {
			return 'Admin';	
		}
	}
	function getSiteName() {
		$ci =& get_instance();
		$name = $ci->db->where('id', 1)->get('site_settings')->row()->site_name;
		if ($name) {
			return $name;
		} else {
			return 'No Company name';	
		}
	}
	function getSiteFavIcon() {
		$ci =& get_instance();
		$logo = $ci->db->where('id', 1)->get('site_settings')->row()->site_favicon;
		if ($logo) {
			return $logo;
		} else {
			return false;	
		}
	}
	function getSiteLogo() {
		$ci =& get_instance();
		$logo = $ci->db->where('id', 1)->get('site_settings')->row()->site_logo;
		if ($logo) {
			return $logo;
		} else {
			return false;	
		}
	}
	
	function getOrderDetails($order_id) {
		$product_details='';
		$ci =& get_instance();
		 $order_details_count = $ci->db->where('order_id', $order_id)->get('order_details')->num_rows();
		 if($order_details_count>0)
		{
			$ci->db->select("order_details.id,order_details.product_id,order_details.unit,order_details.quantity,order_details.is_delivered,products.name_en,products.name_bn");
			$ci->db->from('order_details');
			$ci->db->join('products', 'order_details.product_id = products.product_id');
			$ci->db->where('order_details.order_id', $order_id);
			//$ci->db->limit(2);
			$query = $ci->db->get();
			$order_details_product=$query->result_array();
			//echo '<pre>';print_r($order_details_product);
			if(!empty($order_details_product))
			{
				for($i=0; $i < $order_details_count; $i++){
					$product=$order_details_product[$i]['name_bn'].' - '.$order_details_product[$i]['quantity'].'('.$order_details_product[$i]['unit'].')';
					if($order_details_product[$i]['is_delivered']==1){
						$product_details.=' <span style="color:#3346FF;"><del>'.$product.'</del></span>,';
					}else{
						$product_details.=' '.$product.',';
					}
					
				}

				//$product_details.='<span style="color:#3346FF;"><del>Request has been sent</del></span>';
				/*$product1='';
				$product2='';
				if($order_details_count>2)
				{
					$total=$order_details_count-2;
				}else{
					if($order_details_count==1)
					{
						$total=0;
					}else{
						$total=2-$order_details_count;
					}
					
				}
				$product1=$order_details_product[0]['name_bn'].' - '.$order_details_product[0]['quantity'].'('.$order_details_product[0]['unit'].')';
				if(isset($order_details_product[1]['quantity']))
				{
					$product2=$order_details_product[1]['name_bn'].' - '.$order_details_product[1]['quantity'].'('.$order_details_product[1]['unit'].')';
				}
				
				$product_details=$product1.','.$product2;
				if($total>0)
				{
					$product_details.=' and '.$total.' more';
				}*/
			}
			
		} 
		return $product_details;
	}

	function getImageExt($file) {
		if($file === null) {
			return null;
		}
		else {
			$ext = explode('.', $file);
			return end($ext);
		}
	}
?>