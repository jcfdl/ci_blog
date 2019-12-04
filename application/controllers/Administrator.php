<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Administrator extends MY_AuthController { 
	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('user');		
	}

	public function index() {
		$this->load->view('administrator/blocks/header');		
		$this->load->view('administrator/dashboard/index');
		$this->load->view('administrator/blocks/footer');
	}

	
}