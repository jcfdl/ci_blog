<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Content extends CI_Model {
	protected $table = 'contents';

	function __construct() {
		parent::__construct();
	}

	function getStatus() {
		$status = array(1 => 'Published', 2 => 'Unpublished', 3 => 'Trashed');
		return $status;
	}

	function getRow($id, $userId) {
		$query = $this->db->get_where($this->table, array('id'=>$id, 'user_id'=>$userId));
		return $query->row();
	}

	function getCount() {
		$query = $this->db->where('user_id', $this->session->userdata('userId'))->from($this->table);
		return $query->count_all_results();
	}

	function getContents($limit, $start) {
		$this->db->limit($limit, $start);
		$query = $this->db->get_where($this->table, array('user_id'=>$this->session->userdata('userId')));
		return $query->result();
	}

	public function insert($data = array()) {
    if(!empty($data)){ 
      // Add created and modified date if not included 
      if(!array_key_exists("created", $data)){ 
          $data['created'] = date("Y-m-d H:i:s"); 
      } 
      if(!array_key_exists("modified", $data)){ 
          $data['modified'] = date("Y-m-d H:i:s"); 
      } 
       
      // Insert member data 
      $insert = $this->db->insert($this->table, $data); 
       
      // Return the status 
      return $insert?$this->db->insert_id():false; 
    } 
    return false; 
	}
}