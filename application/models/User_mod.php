<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_mod extends CI_Model {

	public function __construct(){
    parent::__construct();
  }
   
  function user_list_db($where = null){
		if(isset($where)){
			$this->db->where($where);
    }
		$query = $this->db->get('user');
		return $query->result_array();
	}

}