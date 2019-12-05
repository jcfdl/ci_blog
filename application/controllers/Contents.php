<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Contents extends MY_AuthController { 
	public function __construct() {
		parent::__construct();
		$this->load->model('content');
		$this->status = array(1 => 'Published', 2 => 'Unpublished', 3 => 'Trashed');
	}

	public function index() {			
		$data = array();
		$data['user'] = $this->user->getUser($this->session->userdata('userId'));
		$this->load->view('administrator/blocks/header', $data);
		$this->load->view('administrator/content/index');
		$this->load->view('administrator/blocks/footer');
	}

	public function add() {
		$data = array();
		$data['user'] = $this->user->getUser($this->session->userdata('userId'));
		$data['status'] = $this->status;
		$this->load->view('administrator/blocks/header', $data);
		$this->load->view('administrator/content/add', $data);
		$this->load->view('administrator/blocks/footer');
	}
}