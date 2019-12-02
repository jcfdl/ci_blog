<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class User extends CI_Model {
	public function __construct() {
		// set table
		$this->table('users');
	}

	public function insert($data = array()) {
		
	}

} 