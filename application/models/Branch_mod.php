<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Branch_mod extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  function branch_list_db($where = null)
  {
    if (isset($where)) {
      $this->db->where($where);
    }
    $this->db->order_by("created_date", "DESC");
    $query = $this->db->get('branch');

    return $query->result_array();
  }

  public function branch_create_process_db($data)
  {
    $this->db->insert('branch', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }

  public function branch_update_process_db($data, $where)
  {
    $this->db->where($where);
    $this->db->update('branch', $data);
  }

  public function branch_delete_process_db($where)
  {
    $this->db->where($where);
    $this->db->delete('branch');
  }

  function table_rate_list_db($where = null)
  {
    if (isset($where)) {
      $this->db->where($where);
    }
    $this->db->order_by("created_date", "DESC");
    $query = $this->db->get('table_rate');

    return $query->result_array();
  }

  function table_rate_domestic_list_db($where = null)
  {
    if (isset($where)) {
      $this->db->where($where);
    }
    $this->db->order_by("created_date", "DESC");
    $query = $this->db->get('table_rate_domestic');

    return $query->result_array();
  }

  function subzone_list_db($where = null)
  {
    if (isset($where)) {
      $this->db->where($where);
    }
    $query = $this->db->get('mst_sub_zone');

    return $query->result_array();
  }

  function country_list_db($where = null)
  {
    if (isset($where)) {
      $this->db->where($where);
    }
    $query = $this->db->get('mst_country');

    return $query->result_array();
  }

  function city_list_db($where = null)
  {
    if (isset($where)) {
      $this->db->where($where);
    }
    $query = $this->db->get('mst_city');

    return $query->result_array();
  }

  public function table_rate_create_process_db($data)
  {
    $this->db->insert('table_rate', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }

  public function table_rate_domestic_create_process_db($data)
  {
    $this->db->insert('table_rate_domestic', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }

  public function table_rate_update_process_db($data, $where)
  {
    $this->db->where($where);
    $this->db->update('table_rate', $data);
  }

  public function table_rate_domestic_update_process_db($data, $where)
  {
    $this->db->where($where);
    $this->db->update('table_rate_domestic', $data);
  }

  public function table_rate_delete_process_db($where)
  {
    $this->db->where($where);
    $this->db->delete('table_rate');
  }

  public function table_rate_domestic_delete_process_db($where)
  {
    $this->db->where($where);
    $this->db->delete('table_rate_domestic');
  }

  function zone_list_db($where = null)
  {
    if (isset($where)) {
      $this->db->where($where);
    }
    $this->db->order_by("created_date", "DESC");
    $query = $this->db->get('mst_zone');

    return $query->result_array();
  }

  public function table_rate_download_list_db($where = null)
  {
    if (isset($where)) {
      $this->db->where($where);
    }
    $this->db->select('type_of_mode, zone, subzone, rate_type, default_value, min_value, max_value, price');
    $this->db->from('table_rate');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function table_rate_domestic_download_list_db($where = null)
  {
    if (isset($where)) {
      $this->db->where($where);
    }
    $this->db->select('city, airfreight_price_kg, airfreight_term, landfreight_price_kg, landfreight_term, seafreight_price_kg, seafreight_term');
    $this->db->from('table_rate_domestic');
    $query = $this->db->get();
    return $query->result_array();
  }
}
