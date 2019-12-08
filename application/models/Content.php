<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Content extends CI_Model {
	function __construct() {
		$this->table = 'contents';
	}

	function getStatus() {
		$status = array(1 => 'Published', 2 => 'Unpublished', 3 => 'Trashed');
		return $status;
	}

	function getRow($id, $userId) {
		$query = $this->db->get_where($this->table, array('id'=>$id, 'user_id'=>$userId));
		return $query->row();
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