<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class User extends CI_Model {

  protected $table;

	function __construct() {
		$this->table = 'users';
	}

  function getStatus() {
    $status = array(
      1 => 'Active',
      0 => 'Inactive'
    );

    return $status;
  }

  function getDefaultPassword() {
    return '123456';
  }

  function getUser($id) {
    $this->db->select('users.*, roles.name AS role_name');
    $this->db->from($this->table);
    $this->db->join('roles', 'roles.id = users.role_id');
    $this->db->where( array('users.id' => $id));
    $query = $this->db->get();
    $result = $query->row_array();
    return $result;
  }

  function getLiveUsers($limit, $start) {
    $array = array(
      'users.status' => 1
    );
    $this->db->limit($limit, $start);
    $this->db->select('users.*, roles.name AS role_name');
    $this->db->from($this->table);
    $this->db->join('roles', 'roles.id = users.role_id');
    $this->db->where($array);
    $query = $this->db->get();
    return $query->result();
  }

  function getCount() {
    $query = $this->db->where('status', 1)->from($this->table);
    return $query->count_all_results();
  }

	function getRows($params = array()) {
    $this->db->select('users.*, roles.name AS role_name');
    $this->db->from($this->table);
    $this->db->join('roles', 'roles.id = users.role_id'); 
    if(array_key_exists("where", $params)){ 
      foreach($params['where'] as $key => $val){ 
        $this->db->where($key, $val); 
      } 
    }    
    if(array_key_exists("search", $params)){ 
      foreach($params['search'] as $key => $val){ 
        $this->db->like('CONCAT(users.first_name, " ", users.last_name)', $val);  
        $this->db->or_like('roles.name', $val);
      } 
    }      
    if(array_key_exists("returnType", $params) && $params['returnType'] == 'count'){ 
        $result = $this->db->count_all_results(); 
    }else{ 
      if(array_key_exists("id", $params) || (array_key_exists("returnType", $params) && $params['returnType'] == 'single')){ 
          if(!empty($params['id'])){ 
            $this->db->where('id', $params['id']); 
          } 
          $query = $this->db->get(); 
          $result = $query->row_array(); 
      }else{ 
        // $this->db->order_by('id', 'desc'); 
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
          $this->db->limit($params['limit'],$params['start']); 
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
          $this->db->limit($params['limit']); 
        }          
        $query = $this->db->get(); 
        $result = ($query->num_rows() > 0)?$query->result():FALSE;
      } 
    }     
    // Return fetched data 
    return $result; 
	}

  function deleteRow($id) {
    $this->db->set('status', 0);
    $this->db->where('id', $id);
    $this->db->update($this->table);
    return true;
  }

	function insert($data = array()) {
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

  function update($id, $data = array()) {
    $this->db->set($data);
    $this->db->where('id', $id);
    $this->db->update($this->table);
    return true;
  }
} 