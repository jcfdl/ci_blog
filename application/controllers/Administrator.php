<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Administrator extends MY_AuthController { 
	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index() {
		$data = array();
		$data['user'] = $this->user->getUser($this->session->userdata('userId'));
		$this->load->view('administrator/blocks/header', $data);		
		$this->load->view('administrator/dashboard/index');
		$this->load->view('administrator/blocks/footer');
	}

	
}