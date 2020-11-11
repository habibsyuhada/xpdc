<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Branch_mod extends CI_Model {

	public function __construct(){
    parent::__construct();
  }
   
  function branch_list_db($where = null){
		if(isset($where)){
			$this->db->where($where);
		}
		$this->db->order_by("created_date", "DESC");
		$query = $this->db->get('branch');
		
		return $query->result_array();
	}

	public function branch_create_process_db($data)
  {
    $this->db->insert('branch', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }
	
	public function branch_update_process_db($data, $where)
  {
    $this->db->where($where);
    $this->db->update('branch', $data);
  }
	
	public function branch_delete_process_db($where)
  {
    $this->db->where($where);
    $this->db->delete('branch');
  }

}