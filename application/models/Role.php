<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Role extends CI_Model {

  protected $table;

	function __construct() {
		$this->table = 'roles';
	}

  function getRoles() {
    $this->db->from($this->table);
    $query = $this->db->get();
    return $query->result();
  }
} 