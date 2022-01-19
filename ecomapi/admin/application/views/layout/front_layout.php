<?php 
	
	$this->load->view('element/front_header'); 
	$this->load->view('element/front_sidebar');
	$this->load->view($main_content);
	$this->load->view('element/front_footer');
?>