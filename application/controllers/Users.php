<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Users extends CI_Controller { 
	public function __construct() {
		parent::__construct();
		// load neccesary libraries
		$this->load->library('form_validation');
		$this->load->model('user');
        $this->load->model('content');
        $this->load->model('role');
    $this->perPage = 1;
		// check if logged in
    // $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn');
	}

	public function index($id = '') {
    $data = array();
    $data['user'] = $this->user->getUser($this->session->userdata('userId'));
    // config for pagination
    $config['target'] = '#datalist';
    $config['link_func'] = 'searchFilter';
    $config['base_url'] = base_url('administrator/users/search');
    $config['total_rows'] = $this->user->getCount();
    $config['per_page'] = $this->perPage;
    $config['uri_segment'] = 3;
    // customization of pagination
    $config['full_tag_open'] = '<ul class="pagination pagination-sm mb-0">';
    $config['full_tag_close'] = '</ul>';
    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = $config['last_tag_open'] = $config['first_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = $config['last_tag_close'] = $config['first_tag_close'] = '</li>';
    $config['prev_link'] = '«';
    $config['next_link'] = '»';
    $config['attributes'] = array('class'=>'page-link');
    $config['show_count'] = 0;
    // end of pagination
    $this->ajax_pagination->initialize($config);
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data['links'] = $this->ajax_pagination->create_links();
    $data['users'] = $this->user->getLiveUsers($config["per_page"], $page);
    $this->load->view('administrator/blocks/header', $data);
    $this->load->view('administrator/user/index', $data);
    $this->load->view('administrator/blocks/footer');

	}

  public function search() {
    $page = $this->input->post('page');
    if(!$page) {
      $offset = 0;
    } else {
      $offset = $page;
    }
    $search = $this->input->post('search');
    $status = $this->input->post('status');
    if(!empty($search)) {
      $conditions['search']['keywords'] = $search;
    }
    if(!empty($status)) {
      $conditions['where']['status'] = $status;
    }

    $conditions['returnType'] = 'count';
    $total_rows = $this->user->getRows($conditions);
    // pagition config
    $config['target'] = '#datalist';
    $config['link_func'] = 'searchFilter';
    $config['base_url'] = base_url('administrator/users/search');
    $config['total_rows'] = $total_rows;
    $config['per_page'] = $this->perPage;
    $config['uri_segment'] = 4;
    // customization of pagination
    $config['full_tag_open'] = '<ul class="pagination pagination-sm mb-0">';
    $config['full_tag_close'] = '</ul>';
    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = $config['last_tag_open'] = $config['first_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = $config['last_tag_close'] = $config['first_tag_close'] = '</li>';
    $config['prev_link'] = '«';
    $config['next_link'] = '»';
    $config['attributes'] = array('class'=>'page-link');
    $config['show_count'] = 0;
    // end pagination config
    $this->ajax_pagination->initialize($config);
    $conditions['start'] = $offset; 
    $conditions['limit'] = $this->perPage; 
    unset($conditions['returnType']); 
    $data['links'] = $this->ajax_pagination->create_links();
    $data['users'] = $this->user->getRows($conditions); 
    $this->load->view('administrator/user/ajax', $data);
  }

  public function add() {

  }

  public function edit($id) {
      $data = array();
      $data['user'] = $this->user->getUser($id);
      $data['content_count'] = $this->content->getUserContentCount($id);
      $data['roles'] = $this->role->getRoles();
      $data['user_status'] = $this->user->getStatus();
      $userData = array();
    if($this->form_validation->run('update_user') == TRUE) {
      $userData = array(
        'first_name' => strip_tags(ucfirst($this->input->post('first_name'))), 
        'last_name' => strip_tags(ucfirst($this->input->post('last_name'))),   
        'role_id' => strip_tags($this->input->post('role_id')),
        'status' => strip_tags($this->input->post('status')),
      );
      $update = $this->user->update($this->input->post('id'), $userData);
      if($update) {
        $this->session->set_flashdata('success_msg', 'Successfully updated user!');
        redirect('administrator/users/edit/'. $this->input->post('id'));
      }
    }
      $this->load->view('administrator/blocks/header', $data);
      $this->load->view('administrator/user/edit', $data);
      $this->load->view('administrator/blocks/footer');
  }

  public function userChangePassword($id) {
    $userData = array();
    $password = $this->user->getDefaultPassword();
    $userData = array(
      'password' => md5($password),
    );
    $update = $this->user->update($id, $userData);
    if($update) {
      $this->session->set_flashdata('success_msg', 'Successfully changed user passwort to default password!');
      redirect('administrator/users/edit/'. $id);
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