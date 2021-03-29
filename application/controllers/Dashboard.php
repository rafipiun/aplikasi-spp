<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		// if($this->session->userdata('level') == '1' || $this->session->userdata('level') =='2'){
		// 	$params = array(
		// 		'status' => 'login'
		// 	);
			
		// 	$this->session->set_userdata( $params );
		// 	if($this->session->userdata('status' !== 'login')){
		// 		redirect('auth');
		// 	}
		// } 
		check_not_login();
		$this->template->load('template','dashboard');
	}
}
