<?php 
	
	// Get The Content From Directory Views
	
	$this->load->view('parts/header');
	$this->load->view('parts/sidebar');
	$this->load->view($content);
	$this->load->view('parts/footer');


 ?>
 