<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agent_mod extends CI_Model {

	public function __construct(){
    parent::__construct();
  }
   
  function agent_list_db($where = null){
		if(isset($where)){
			$this->db->where($where);
		}
		$this->db->order_by("created_date", "DESC");
		$query = $this->db->get('agent');
		
		return $query->result_array();
	}

	public function agent_create_process_db($data)
  {
    $this->db->insert('agent', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }
	
	public function agent_update_process_db($data, $where)
  {
    $this->db->where($where);
    $this->db->update('agent', $data);
  }
	
	public function agent_delete_process_db($where)
  {
    $this->db->where($where);
    $this->db->delete('agent');
  }

}