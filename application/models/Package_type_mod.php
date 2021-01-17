<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Package_type_mod extends CI_Model {

	public function __construct(){
    parent::__construct();
  }
   
  function package_type_list_db($where = null){
		if(isset($where)){
			$this->db->where($where);
		}
		$this->db->order_by("created_date", "DESC");
		$query = $this->db->get('mst_package_type');
		
		return $query->result_array();
	}

	public function package_type_create_process_db($data)
  {
    $this->db->insert('mst_package_type', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }
	
	public function package_type_update_process_db($data, $where)
  {
    $this->db->where($where);
    $this->db->update('mst_package_type', $data);
  }
	
	public function package_type_delete_process_db($where)
  {
    $this->db->where($where);
    $this->db->delete('mst_package_type');
  }

}