<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class MY_Controller extends CI_Controller { 
	public function __construct() {
		parent::__construct();
		
	}
}

class MY_AuthController extends CI_Controller { 
	public function __construct() {
		parent::__construct();
		$this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn');
		if(!$this->isUserLoggedIn) {
			redirect('administrator/login');
		}
	}

	public function login() {
		$this->load->view('administrator/login/index');
	}
}