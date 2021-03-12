<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_tracking_mod extends CI_Model {

	public function __construct(){
    parent::__construct();
  }
   
  function master_tracking_list_db($where = null){
		if(isset($where)){
			$this->db->where($where);
    }
		$this->db->order_by('created_date','DESC');
		$query = $this->db->get('master_tracking');
		return $query->result_array();
  }
  
  public function master_tracking_create_process_db($data){
		$this->db->insert('master_tracking', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }
  
  public function generate_master_tracking($master_tracking){
		$this->db->select('RIGHT(master_tracking,3) as kode', FALSE);
		$this->db->order_by('master_tracking','DESC');
		$this->db->limit(1);
		$this->db->where("master_tracking LIKE '".$master_tracking."%' ", NULL);
    $query = $this->db->get('master_tracking');
    if($query->num_rows() <> 0){
      $data = $query->row();
      $kode = intval($data->kode) + 1;
    }
    else{
      $kode = 1;
    }
		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
		return $kodemax;
  }

}