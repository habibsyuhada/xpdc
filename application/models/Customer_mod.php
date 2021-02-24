<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Customer_mod extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    function country_list_db($where = null)
    {
        if (isset($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get('mst_country');
        return $query;
    }
    function customer_list_db($where = null)
    {
        if (isset($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get('customer');
        return $query;
    }
    function branch_list_db($where = null)
    {
        if (isset($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get('branch');
        return $query;
    }
    function zone_list_db($where = null)
    {
        if (isset($where)) {
            $this->db->where($where);
        }
        $this->db->select("a.id, a.zone_name, b.country");
        $this->db->from("mst_zone a");
        $this->db->join('mst_zone_detail b', "a.id = b.id_zone", 'LEFT OUTER');
        $query = $this->db->get();
        return $query;
    }
    function subzone_list_db($where = null)
    {
        if (isset($where)) {
            $this->db->where($where);
        }
        $this->db->select("a.id, a.id_zone, a.sub_zone, b.city");
        $this->db->from("mst_sub_zone a");
        $this->db->join('mst_sub_zone_detail b', "a.id = b.id_subzone", 'LEFT OUTER');
        $query = $this->db->get();
        return $query;
    }
    function table_rate_list_db($where)
    {
        if (isset($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get('table_rate');
        return $query;
    }
    function table_rate_domestic_list_db($where = null)
    {
        if (isset($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get('table_rate_domestic');
        return $query;
    }
    function table_rate_pickup_list_db($where)
    {
        if (isset($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get('table_rate_pickup');
        return $query;
    }
}
