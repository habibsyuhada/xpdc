<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Operation_mod extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function shipment_list($where = null)
    {
        if (isset($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get('shipment');
        return $query->result_array();
    }

    function driver_list($where = null)
    {
        if (isset($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get('mst_driver');
        return $query->result_array();
    }

    public function shipment_history_create_process_db($data)
    {
        $this->db->insert('shipment_history', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function service_center_update_process_db($data, $where){
		$this->db->where($where);
		$this->db->update('shipment_detail',$data);
    }

    public function update_shipment_status($data, $where){
		$this->db->where($where);
		$this->db->update('shipment',$data);
    }
}
