<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_mod extends CI_Model {

	public function __construct(){
    parent::__construct();
  }
   
  function user_list_db($where = null){
		if(isset($where)){
      if(count($where) > 0){
        $this->db->where($where);
      }
		}
		$this->db->order_by("created_date", "DESC");
		$query = $this->db->get('user');
		
		return $query->result_array();
	}

	public function user_create_process_db($data)
  {
    $this->db->insert('user', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }
	
	public function user_update_process_db($data, $where)
  {
    $this->db->where($where);
    $this->db->update('user', $data);
  }
	
	public function user_delete_process_db($where)
  {
    $this->db->where($where);
    $this->db->delete('user');
  }

  function target_list_db($where = null){
		if(isset($where)){
      if(count($where) > 0){
        $this->db->where($where);
      }
		}
		$this->db->order_by("year", "DESC");
		$this->db->order_by("month", "DESC");
		$query = $this->db->get('commercial_target');
		
		return $query->result_array();
	}

  public function target_create_process_db($data)
  {
    $this->db->insert('commercial_target', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }
	
	public function target_update_process_db($data, $where)
  {
    $this->db->where($where);
    $this->db->update('commercial_target', $data);
  }
	
	public function target_delete_process_db($where)
  {
    $this->db->where($where);
    $this->db->delete('commercial_target');
  }

}