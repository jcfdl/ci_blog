<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Content extends CI_Model {
	function __construct() {
		$this->table = 'contents';
	}
}