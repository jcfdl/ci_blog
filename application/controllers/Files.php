<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Files extends MY_AuthController { 
	public function __construct() {
		parent::__construct();
		$this->load->model('file', 'file_upload');
	}

	public function addImageSummernote() {
		$data = array();
		$userData = array();
		$config['upload_path'] = './assets/uploads/';
    $config['allowed_types'] = 'gif|jpg|png';
    $this->upload->initialize($config);
    if(!$this->upload->do_upload('userfile')) {
    	$data[] = array('success'=>false, 'msg'=>'Please check your image. Your image was not uploaded.');
    } else {
    	$img = $this->upload->data();
      $userData = array(
      	'name' => $img['file_name'],
      	'user_id' => $this->session->userdata('userId')
      );
      $this->file_upload->insert($userData);
    	$data = array('success'=>true, 'msg'=>'Image was uploaded successfully', 'file'=>base_url('assets/uploads/'.$img['file_name']));
    }
    echo json_encode($data);
	}

  public function uploadImage($fieldname) {
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
}