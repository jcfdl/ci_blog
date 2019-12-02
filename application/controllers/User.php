<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class User extends CI_Controller { 
	public function __construct() {
		parent::__construct();
		// load neccesary libraries
		$this->load->library('form_validation');
		$this->load->model('user');
		// check if logged in
    $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn');
	}

	public function index() {
		if($this->isUserLoggedIn) {
			redirect('user/account');
		} else {
			redirect('user/login');
		}
	}

	public function account() {
		$data = array(); 
    if($this->isUserLoggedIn){ 
      $con = array( 
        'id' => $this->session->userdata('userId') 
      ); 
      $data['user'] = $this->user->getRows($con);        
      // Pass the user data and load view 
      $this->load->view('blocks/head'); 
      $this->load->view('blocks/header', $data);       
      $this->load->view('account/index', $data); 
      $this->load->view('blocks/footer'); 
    }else{ 
      redirect('user/login'); 
    }
	}

	public function registration() {

	}

	public function login() {
		$data = array();          
    // Get messages from the session 
    if($this->session->userdata('success_msg')){ 
      $data['success_msg'] = $this->session->userdata('success_msg'); 
      $this->session->unset_userdata('success_msg'); 
    } 
    if($this->session->userdata('error_msg')){ 
      $data['error_msg'] = $this->session->userdata('error_msg'); 
      $this->session->unset_userdata('error_msg'); 
    } 
     
    // If login request submitted 
    if($this->input->post('loginSubmit')){ 
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
      $this->form_validation->set_rules('password', 'password', 'required'); 
       
      if($this->form_validation->run() == true){ 
        $con = array( 
          'returnType' => 'single', 
          'conditions' => array( 
              'email'=> $this->input->post('email'), 
              'password' => md5($this->input->post('password')), 
              'status' => 1 
          ) 
        ); 
        $checkLogin = $this->user->getRows($con); 
        if($checkLogin){ 
          $this->session->set_userdata('isUserLoggedIn', TRUE); 
          $this->session->set_userdata('userId', $checkLogin['id']); 
          redirect('users/account/'); 
        }else{ 
          $data['error_msg'] = 'Wrong email or password, please try again.'; 
        } 
      }else{ 
        $data['error_msg'] = 'Please fill all the mandatory fields.'; 
      } 
    }     
    // Load view 
    $this->load->view('elements/header', $data); 
    $this->load->view('users/login', $data); 
    $this->load->view('elements/footer'); 
	}
}