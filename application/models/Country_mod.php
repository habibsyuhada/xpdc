<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Country_mod extends CI_Model
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
    $this->db->order_by("created_date", "DESC");
    $query = $this->db->get('mst_country');

    return $query->result_array();
  }

  public function country_create_process_db($data)
  {
    $this->db->insert('mst_country', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }

  public function country_update_process_db($data, $where)
  {
    $this->db->where($where);
    $this->db->update('mst_country', $data);
  }

  public function country_delete_process_db($where)
  {
    $this->db->where($where);
    $this->db->delete('mst_country');
  }

  public function country_download_list_db()
  {
    $this->db->select('country, country_code');
    $this->db->from('mst_country');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function city_download_list_db($where = null)
  {
    if(isset($where)){
      $this->db->where($where);
    }
    $this->db->select('city, city_code');
    $this->db->from('mst_city');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function country_truncate_process_db()
  {
    $this->db->truncate('mst_country');
  }

  function city_list_db($where = null)
  {
    if (isset($where)) {
      $this->db->where($where);
    }
    $this->db->order_by("created_date", "DESC");
    $query = $this->db->get('mst_city');

    return $query->result_array();
  }

  public function city_create_process_db($data)
  {
    $this->db->insert('mst_city', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }

  public function city_update_process_db($data, $where)
  {
    $this->db->where($where);
    $this->db->update('mst_city', $data);
  }

  public function city_delete_process_db($where)
  {
    $this->db->where($where);
    $this->db->delete('mst_city');
  }
}
