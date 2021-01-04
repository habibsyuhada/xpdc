<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Zone_mod extends CI_Model {

	public function __construct(){
    parent::__construct();
  }
   
  function zone_list_db($where = null){
		if(isset($where)){
			$this->db->where($where);
		}
		$this->db->order_by("created_date", "DESC");
		$query = $this->db->get('mst_zone');
		
		return $query->result_array();
  }
  
  function branch_list_db($where = null){
		if(isset($where)){
			$this->db->where($where);
		}
		$this->db->order_by("created_date", "DESC");
		$query = $this->db->get('branch');
		
		return $query->result_array();
	}

	public function zone_create_process_db($data)
  {
    $this->db->insert('mst_zone', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }
	
	public function zone_update_process_db($data, $where)
  {
    $this->db->where($where);
    $this->db->update('mst_zone', $data);
  }
	
	public function zone_delete_process_db($where)
  {
    $this->db->where($where);
    $this->db->delete('mst_zone');
  }

}