<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_mod extends CI_Model {

	public function __construct(){
    parent::__construct();
  }

  function user_list($where = null, $show_all = 0){
		if(isset($where)){
			$this->db->where($where);
    }
    $this->db->select('*');
    $this->db->from('user');
		$query = $this->db->get();
		return $query->result_array();
	}

  function user_list_by_id($where_in){
    $this->db->where_in('id', $where_in);
    $this->db->select('*');
    $this->db->from('user');
		$query = $this->db->get();
		return $query->result_array();
  }
  
  function branch_list($where = null){
		if(isset($where)){
			$this->db->where($where);
    }
    $this->db->select('*');
    $this->db->from('branch');
		$query = $this->db->get();
		return $query->result_array();
	}
  
  function agent_list($where = null){
		if(isset($where)){
			$this->db->where($where);
    }
    $this->db->select('*');
    $this->db->from('agent');
		$query = $this->db->get();
		return $query->result_array();
	}
  
  function customer_list($where = null){
    if(isset($where)){
      $this->db->where($where);
    }
    $this->db->from('customer');
    $query = $this->db->get();
    return $query->result_array();
  }

}