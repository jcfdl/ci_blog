<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Users extends CI_Controller { 
	public function __construct() {
		parent::__construct();
		// load neccesary libraries
		$this->load->library('form_validation');
		$this->load->model('user');
		// check if logged in
    // $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn');
	}

	public function index() {
		
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
    $userData = array();
    if($this->form_validation->run('registration') == FALSE) {
      $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
    } else {
      $userData = array(
        'first_name' => strip_tags(ucfirst($this->input->post('first_name'))), 
        'last_name' => strip_tags(ucfirst($this->input->post('last_name'))), 
        'email' => strip_tags($this->input->post('email')), 
        'password' => md5($this->input->post('password')), 
        'role_id' => 2 
      );
      $insert = $this->user->insert($userData);
      if($insert) {
        $this->session->set_userdata('userId', $insert);
        $this->session->set_userdata('isUserLoggedIn', TRUE);
        redirect('administrator');
      }
    }
    $this->load->view('administrator/registration/index');
	}

	public function login() {
		$data = array();   
    $data['error_msg'] = '';       
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
    if($this->form_validation->run('login') == true){ 
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
        redirect('administrator'); 
      }else{ 
        $data['error_msg'] = 'Wrong email or password, please try again.'; 
      } 
    }else{ 
      $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
    }  
    // Load view 
    // $this->load->view('elements/header', $data); 
    // $this->load->view('users/login', $data); 
    // $this->load->view('elements/footer'); 
    $this->load->view('administrator/login/index', $data);
	}

  public function logout() {
    $this->session->unset_userdata('isUserLoggedIn'); 
    $this->session->unset_userdata('userId'); 
    $this->session->sess_destroy(); 
    redirect('administrator/login'); 
  }
}