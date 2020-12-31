<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Table_rate_mod extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function table_rate_list_db($where = null)
    {
        $query = $this->db->query("SELECT a.id, a.id_branch, b.name, a.zone, a.type_of_mode, a.price FROM table_rate a LEFT OUTER JOIN branch b ON a.id_branch = b.id");

        return $query->result_array();
    }

    function table_rate_branch_list_db($where = null)
    {
        if (isset($where)) {
            $this->db->where($where);
        }
        $this->db->order_by("created_date", "DESC");
        $query = $this->db->get('branch');

        return $query->result_array();
    }
    
    function table_rate_zone_list_db($where = null)
    {
        if (isset($where)) {
            $this->db->where($where);
        }
        $this->db->distinct();
        $this->db->select('zone');
        $this->db->order_by("zone", "ASC");
        $query = $this->db->get('mst_zone');

        return $query->result_array();
    }

    public function table_rate_create_process_db($data)
    {
        $this->db->insert('table_rate', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function table_rate_update_process_db($data, $where)
    {
        $this->db->where($where);
        $this->db->update('table_rate', $data);
    }

    public function zone_delete_process_db($where)
    {
        $this->db->where($where);
        $this->db->delete('table_rate');
    }
}
