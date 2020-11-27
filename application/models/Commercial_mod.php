<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Commercial_mod extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function customer_list_db($where = null)
    {
        if($where){
            $this->db->where($where);
        }
        $this->db->select('user.id, user.name, user.email, user.role, user.branch, customer.address, customer.city, customer.country, customer.postcode, customer.contact_person, customer.phone_number, customer.status_delete');
        $this->db->from('user');
        $this->db->join('customer', 'user.id = customer.customer_id', "LEFT OUTER");
        $this->db->where(array('customer.status_delete' => 1, 'user.role' => 'Customer'));
        $this->db->order_by("user.id", "DESC");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function customer_create_process_db($data)
    {
        $this->db->insert('user', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function customer_detail_create_process_db($data)
    {
        $this->db->insert('customer', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function customer_update_process_db($data, $where)
    {
        $this->db->where($where);
        $this->db->update('user', $data);
    }

    public function customer_detail_update_process_db($data, $where)
    {
        $this->db->where($where);
        $this->db->update('customer', $data);
    }

    public function customer_delete_process_db($where)
    {
        $this->db->where($where);
        $this->db->delete('user');
    }
}
