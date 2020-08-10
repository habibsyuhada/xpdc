<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shipment_mod extends CI_Model {

	public function __construct(){
    parent::__construct();
  }
   
  public function shipment_create_process_db($data){
		$this->db->insert('shipment', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }

  public function shipment_update_process_db($data, $where){
		$this->db->where($where);
		$this->db->update('shipment',$data);
	}

  function shipment_list_db($where = null, $show_all = 0){
		if(isset($where)){
			$this->db->where($where);
    }
    if($show_all != 1){
			$this->db->where('status_delete', '1');
    }
		$query = $this->db->get('shipment');
		return $query->result_array();
	}

  public function shipment_packages_create_process_db($data){
		$this->db->insert('shipment_packages', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }

  public function shipment_packages_update_process_db($data, $where){
		$this->db->where($where);
		$this->db->update('shipment_packages',$data);
	}

  function shipment_packages_list_db($where = null, $show_all = 0){
		if(isset($where)){
			$this->db->where($where);
    }
    if($show_all != 1){
			$this->db->where('status_delete', '1');
    }
		$query = $this->db->get('shipment_packages');
		return $query->result_array();
  }
  
  public function shipment_history_create_process_db($data){
		$this->db->insert('shipment_history', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }

  public function shipment_history_update_process_db($data, $where){
		$this->db->where($where);
		$this->db->update('shipment_history',$data);
	}

  function shipment_history_list_db($where = null, $show_all = 0){
		if(isset($where)){
			$this->db->where($where);
    }
    if($show_all != 1){
			$this->db->where('status_delete', '1');
    }
		$query = $this->db->order_by("date", "desc");
    $query = $this->db->order_by("time", "desc"); 
    // Produces: ORDER BY date DESC, time DESC
		$query = $this->db->get('shipment_history');
		return $query->result_array();
	}
  
  public function shipment_generate_tracking_no_db($where = NULL){
		if($where){
      $query = $this->db->where($where);
    }
    $query = $this->db->select('RIGHT(tracking_no, 6) AS tracking_no');
    $query = $this->db->order_by('tracking_no', 'DESC');
    $query = $this->db->limit("1");
    $query = $this->db->get('shipment');
    
    $query1_result = $query->result_array();

    if($query1_result){
        $batch_no_gen = str_pad($query1_result[0]["tracking_no"] + 1, 6, '0', STR_PAD_LEFT);
    } else {
        $batch_no_gen = "000001";
    }

    return $batch_no_gen;
	}

}