<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uom_mod extends CI_Model {

	public function __construct(){
    parent::__construct();
  }
   
  function uom_list_db($where = null){
		if(isset($where)){
			$this->db->where($where);
		}
		$this->db->order_by("created_date", "DESC");
		$query = $this->db->get('mst_uom');
		
		return $query->result_array();
	}

	public function uom_create_process_db($data)
  {
    $this->db->insert('mst_uom', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }
	
	public function uom_update_process_db($data, $where)
  {
    $this->db->where($where);
    $this->db->update('mst_uom', $data);
  }
	
	public function uom_delete_process_db($where)
  {
    $this->db->where($where);
    $this->db->delete('mst_uom');
  }

}