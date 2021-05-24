<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment_mod extends CI_Model {

	public function __construct(){
    parent::__construct();
  }
   
  function payment_list_db($where = null){
		if(isset($where)){
			$this->db->where($where);
		}
		$this->db->order_by("created_date", "DESC");
		$query = $this->db->get('payment_information');
		
		return $query->result_array();
	}

	public function payment_create_process_db($data)
  {
    $this->db->insert('payment_information', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }
	
	public function payment_update_process_db($data, $where)
  {
    $this->db->where($where);
    $this->db->update('payment_information', $data);
  }
	
	public function payment_delete_process_db($where)
  {
    $this->db->where($where);
    $this->db->delete('payment_information');
  }

}