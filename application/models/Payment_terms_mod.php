<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment_terms_mod extends CI_Model {

	public function __construct(){
    parent::__construct();
  }
   
  function payment_terms_list_db($where = null){
		if(isset($where)){
			$this->db->where($where);
		}
		$this->db->order_by("created_date", "DESC");
		$query = $this->db->get('mst_payment_terms');
		
		return $query->result_array();
	}

	public function payment_terms_create_process_db($data)
  {
    $this->db->insert('mst_payment_terms', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }
	
	public function payment_terms_update_process_db($data, $where)
  {
    $this->db->where($where);
    $this->db->update('mst_payment_terms', $data);
  }
	
	public function payment_terms_delete_process_db($where)
  {
    $this->db->where($where);
    $this->db->delete('mst_payment_terms');
  }

}