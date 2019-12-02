<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Home extends CI_Controller { 
	public function __construct() {
		parent::__construct();
		$this->load->model('user');
		// check if logged in
    $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn');
	}

	public function index() {
		$data = array();
		if($this->isUserLoggedIn) {
			$con = array( 
        'id' => $this->session->userdata('userId') 
      ); 
      $data['user'] = $this->user->getRows($con);
		}
		$this->load->view('blocks/head'); 
    $this->load->view('blocks/header', $data);       
    $this->load->view('blocks/page_header'); 
    $this->load->view('blocks/footer');
	}

	
} 