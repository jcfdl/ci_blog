<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Contents extends MY_AuthController { 
	public function __construct() {
		parent::__construct();
		$this->load->model('content');	
		$this->load->model('file', 'file_upload');
	}

	public function uploadImage($files, $fieldname) {
    $data = array();
    $userData = array();
    $config['upload_path'] = './assets/uploads/';
    $config['allowed_types'] = 'gif|jpg|png';
    $this->upload->initialize($config);
    if(!$this->upload->do_upload($fieldname)) {      
      return false;
    } else {
      $img = $this->upload->data();
      $userData = array(
        'name' => $img['file_name'],
        'user_id' => $this->session->userdata('userId')
      );
      return $this->file_upload->insert($userData);
    }
  }

	public function index() {			
		$data = array();
		$data['user'] = $this->user->getUser($this->session->userdata('userId'));
		$this->load->view('administrator/blocks/header', $data);
		$this->load->view('administrator/content/index');
		$this->load->view('administrator/blocks/footer');
	}

	public function add() {
		// print_r($_POST); exit();
		$data = array();
		$data['user'] = $this->user->getUser($this->session->userdata('userId'));
		$data['status'] = $this->content->getStatus();

		if($this->form_validation->run('content') == true) {
			$userData = array(
        'title' => strip_tags(ucfirst($this->input->post('title'))), 
        'user_id' => $this->session->userdata('userId'),
        'body' => $this->input->post('body'), 
        'status' => strip_tags($this->input->post('status')), 
        'meta_kw' => strip_tags($this->input->post('meta_kw')), 
        'meta_desc' => strip_tags($this->input->post('meta_desc'))
      );
      $userData['intro_img'] = $this->uploadImage($_FILES, 'intro_img');
      $userData['full_img'] = $this->uploadImage($_FILES, 'full_img');
      $insert = $this->content->insert($userData);
      redirect('administrator/content/edit/'.$insert);
		} else {
			$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
		}
		$this->load->view('administrator/blocks/header', $data);
		$this->load->view('administrator/content/add', $data);
		$this->load->view('administrator/blocks/footer');		
	}	

  public function edit($id) {
  	$data = array();
		$data['user'] = $this->user->getUser($this->session->userdata('userId'));
  	$content = $this->content->getRow($id, $this->session->userdata('userId'));
  	
		$data['status'] = $this->content->getStatus();
  	if(!$content) {
  		show_404();
  	}
  	$data['content'] = $content;
  	$this->load->view('administrator/blocks/header', $data);
		$this->load->view('administrator/content/edit', $data);
		$this->load->view('administrator/blocks/footer');	
  }
}