<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_tracking_mod extends CI_Model {

	public function __construct(){
    parent::__construct();
  }
   
  function master_tracking_list_db($where = null){
		if(isset($where)){
			$this->db->where($where);
    }
		$query = $this->db->get('master_tracking');
		return $query->result_array();
  }
  
  public function master_tracking_create_process_db($data){
		$this->db->insert('master_tracking', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }

}