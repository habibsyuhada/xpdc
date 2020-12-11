<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quotation_mod extends CI_Model {

	public function __construct(){
    parent::__construct();
  }
   
  function quotation_list_db($where = null){
		if(isset($where)){
      if(count($where) > 0){
        $this->db->where($where);
      }
		}
		$this->db->order_by("created_date", "DESC");
		$query = $this->db->get('quotation');
		
		return $query->result_array();
	}

	public function quotation_create_process_db($data)
  {
    $this->db->insert('quotation', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }
	
	public function quotation_update_process_db($data, $where)
  {
    $this->db->where($where);
    $this->db->update('quotation', $data);
  }
	
	public function quotation_delete_process_db($where)
  {
    $this->db->where($where);
    $this->db->delete('quotation');
  }

  function quotation_cargo_list_db($where = null){
		if(isset($where)){
      if(count($where) > 0){
        $this->db->where($where);
      }
		}
		// $this->db->order_by("created_date", "DESC");
		$query = $this->db->get('quotation_cargo');
		
		return $query->result_array();
	}

	public function quotation_cargo_create_process_db($data)
  {
    $this->db->insert('quotation_cargo', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }
	
	public function quotation_cargo_update_process_db($data, $where)
  {
    $this->db->where($where);
    $this->db->update('quotation_cargo', $data);
  }
	
	public function quotation_cargo_delete_process_db($where)
  {
    $this->db->where($where);
    $this->db->delete('quotation_cargo');
  }

  function quotation_charges_list_db($where = null){
		if(isset($where)){
      if(count($where) > 0){
        $this->db->where($where);
      }
		}
		// $this->db->order_by("created_date", "DESC");
		$query = $this->db->get('quotation_charges');
		
		return $query->result_array();
	}

	public function quotation_charges_create_process_db($data)
  {
    $this->db->insert('quotation_charges', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }
	
	public function quotation_charges_update_process_db($data, $where)
  {
    $this->db->where($where);
    $this->db->update('quotation_charges', $data);
  }
	
	public function quotation_charges_delete_process_db($where)
  {
    $this->db->where($where);
    $this->db->delete('quotation_charges');
  }

}