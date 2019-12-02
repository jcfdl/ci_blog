<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Users extends CI_Controller { 
	public function __construct() {
		parent::__construct();
		// load neccesary libraries
		$this->load->libary('form_validation');
		$this->load->model('user');
	}

	public function index() {

	}

}