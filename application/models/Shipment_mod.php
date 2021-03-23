<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shipment_mod extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function shipment_create_process_db($data)
  {
    $this->db->insert('shipment', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }

  public function shipment_detail_create_process_db($data)
  {
    $this->db->insert('shipment_detail', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }

  public function shipment_update_process_db($data, $where)
  {
    $this->db->where($where);
    $this->db->update('shipment', $data);
  }

  public function shipment_detail_update_process_db($data, $where)
  {
    $this->db->where($where);
    $this->db->update('shipment_detail', $data);
  }

  function shipment_list_db($where = null, $show_all = 0, $order_by = null)
  {
    if (isset($where)) {
      $this->db->where($where);
    }
    if ($show_all != 1) {
      $this->db->where('status_delete', '1');
    }
    $this->db->select('*');
    $this->db->from('shipment');
    $this->db->join('shipment_detail', 'shipment.id = shipment_detail.id_shipment');
    if (isset($order_by)) {
      foreach ($order_by as $key => $value) {
        $query = $this->db->order_by($key, $value);
      }
    } else {
      $query = $this->db->order_by("shipment.created_date", "DESC");
      $query = $this->db->order_by("shipment.tracking_no", "DESC");
    }
    $query = $this->db->get();
    return $query->result_array();
  }

  public function quotation_list_db($where = null)
  {

    if (isset($where)) {
      if (count($where) > 0) {
        $this->db->where($where);
      }
    }
    $query = $this->db->get('quotation');

    return $query->result_array();
  }

  public function customer_list_db($where = null)
  {

    if (isset($where)) {
      if (count($where) > 0) {
        $this->db->where($where);
      }
    }
    $query = $this->db->get('customer');

    return $query->result_array();
  }

  public function branch_list_db($where = null)
  {

    if (isset($where)) {
      if (count($where) > 0) {
        $this->db->where($where);
      }
    }
    $query = $this->db->get('branch');

    return $query->result_array();
  }
  function table_rate_pickup_list_db($where)
  {
    if (isset($where)) {
      $this->db->where($where);
    }
    $query = $this->db->get('table_rate_pickup');
    return $query;
  }

  public function package_type_list_db($where = null)
  {

    if (isset($where)) {
      if (count($where) > 0) {
        $this->db->where($where);
      }
    }
    $query = $this->db->get('mst_package_type');

    return $query->result_array();
  }

  public function country_list_db($where = null)
  {

    if (isset($where)) {
      if (count($where) > 0) {
        $this->db->where($where);
      }
    }
    $query = $this->db->get('mst_country');

    return $query->result_array();
  }

  public function city_list_db($where = null)
  {

    if (isset($where)) {
      if (count($where) > 0) {
        $this->db->where($where);
      }
    }
    $query = $this->db->get('mst_city');

    return $query->result_array();
  }

  public function shipment_packages_create_process_db($data)
  {
    $this->db->insert('shipment_packages', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }

  public function shipment_packages_update_process_db($data, $where)
  {
    $this->db->where($where);
    $this->db->update('shipment_packages', $data);
  }

  function shipment_packages_list_db($where = null, $show_all = 0)
  {
    if (isset($where)) {
      $this->db->where($where);
    }
    if ($show_all != 1) {
      $this->db->where('status_delete', '1');
    }
    $query = $this->db->get('shipment_packages');
    return $query->result_array();
  }

  public function shipment_cost_create_process_db($data)
  {
    $this->db->insert('shipment_cost', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }

  public function shipment_cost_update_process_db($data, $where)
  {
    $this->db->where($where);
    $this->db->update('shipment_cost', $data);
  }

  function shipment_cost_list_db($where = null, $show_all = 0)
  {
    if (isset($where)) {
      $this->db->where($where);
    }
    if ($show_all != 1) {
      $this->db->where('status_delete', '1');
    }
    $query = $this->db->get('shipment_cost');
    return $query->result_array();
  }

  function shipment_history_delete($where, $table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }

  function shipment_label_list_db($where = null, $show_all = 0)
  {
    if (isset($where)) {
      $this->db->where($where);
    }
    if ($show_all != 1) {
      $this->db->where('shipment_packages.status_delete', '1');
    }
    $this->db->select("shipment.*, shipment_packages.qty, shipment_packages.piece_type, shipment_packages.length, shipment_packages.width, shipment_packages.height, shipment_packages.weight");
    $this->db->from('shipment');
    $this->db->join('shipment_packages', 'shipment.id = shipment_packages.id_shipment');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function shipment_history_create_process_db($data)
  {
    $this->db->insert('shipment_history', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }

  public function shipment_history_update_process_db($data, $where)
  {
    $this->db->where($where);
    $this->db->update('shipment_history', $data);
  }

  function shipment_history_list_db($where = null, $show_all = 0)
  {
    if (isset($where)) {
      $this->db->where($where);
    }
    if ($show_all != 1) {
      $this->db->where('status_delete', '1');
    }
    $query = $this->db->order_by("date", "desc");
    $query = $this->db->order_by("time", "desc");
    $query = $this->db->order_by("create_date", "desc");
    // Produces: ORDER BY date DESC, time DESC
    $query = $this->db->get('shipment_history');
    return $query->result_array();
  }

  public function shipment_generate_tracking_no_db($where = NULL)
  {
    if ($where) {
      $query = $this->db->where($where);
    }
    $query = $this->db->select('RIGHT(tracking_no, 10) AS tracking_no');
    $query = $this->db->order_by('id', 'DESC');
    $query = $this->db->limit("1");
    $query = $this->db->get('shipment');

    $query1_result = $query->result_array();

    if ($query1_result) {
      $batch_no_gen = str_pad($query1_result[0]["tracking_no"] + 1, 10, '0', STR_PAD_LEFT);
    } else {
      $batch_no_gen = "0000000001";
    }

    return $batch_no_gen;
  }

  public function shipment_generate_invoice_no_db($where = NULL)
  {
    if ($where) {
      $query = $this->db->where($where);
    }
    $query = $this->db->select('LEFT(invoice_no, 4) AS invoice_no');
    $query = $this->db->order_by("invoice_no", 'DESC');
    $query = $this->db->limit("1");
    $query = $this->db->get('shipment_invoice');

    $query1_result = $query->result_array();

    if ($query1_result) {
      $batch_no_gen = str_pad($query1_result[0]["invoice_no"] + 1, 4, '0', STR_PAD_LEFT);
    } else {
      $batch_no_gen = "0001";
    }

    return $batch_no_gen;
  }

  public function summary_per_status($where = NULL)
  {
    $where_str = array();
    if ($where) {
      foreach ($where as $key => $value) {
        if ($key != "status") {
          if ($value == NULL) {
            $where_str[] = $key;
          } else {
            $where_str[] = $key . " = '" . $value . "'";
          }
        }
      }
    }
    $query = "SELECT 
    SUM(IF(shipment.status = 'Booked', 1, 0)) as 'Booked', 
    SUM(IF(shipment.status = 'Booking Confirmed', 1, 0)) as 'Booking Confirmed', 
    SUM(IF(shipment.status = 'Picked up', 1, 0)) as 'Picked up', 
    SUM(IF(shipment.status = 'Pending Payment', 1, 0)) as 'Pending Payment', 
    SUM(IF(shipment.status = 'Service Center', 1, 0)) as 'Service Center', 
    SUM(IF(shipment.status = 'Departed', 1, 0)) as 'Departed', 
    SUM(IF(shipment.status = 'Arrived', 1, 0)) as 'Arrived', 
    SUM(IF(shipment.status = 'In Transit', 1, 0)) as 'In Transit', 
    SUM(IF(shipment.status = 'Returned', 1, 0)) as 'Returned', 
    SUM(IF(shipment.status = 'Clearance Event', 1, 0)) as 'Clearance Event', 
    SUM(IF(shipment.status = 'Clearance Complete', 1, 0)) as 'Clearance Complete', 
    SUM(IF(shipment.status = 'With Courier', 1, 0)) as 'With Courier', 
    SUM(IF(shipment.status = 'Delivered', 1, 0)) as 'Delivered', 
    SUM(IF(shipment.status = 'On Hold', 1, 0)) as 'On Hold', 
    SUM(IF(shipment.status = 'Cancelled', 1, 0)) as 'Cancelled',
    SUM(IF(shipment.status_driver_pickup = '1', 1, 0)) as 'Outstanding Pickup',
    SUM(IF(shipment.status_driver_pickup = '2', 1, 0)) as 'Done Pickup',
    SUM(IF(shipment.status_driver_deliver = '1', 1, 0)) as 'Outstanding Deliver',
    SUM(IF(shipment.status_driver_deliver = '2', 1, 0)) as 'Done Deliver',
    SUM(IF(shipment_detail.status_bill = '0', 1, 0)) as 'Unbilled',
    SUM(IF(shipment_detail.status_bill = '1', 1, 0)) as 'Billed',
    SUM(IF(shipment_detail.status_bill = '2', 1, 0)) as 'Paid'
    FROM shipment JOIN shipment_detail ON shipment.id = shipment_detail.id_shipment";
    if (count($where_str) > 0) {
      $query .= " WHERE " . join(" AND ", $where_str);
    }
    $query = $this->db->query($query);
    return $query->result_array();
  }

  function shipment_invoice_list_db($where = null)
  {
    if (isset($where)) {
      $this->db->where($where);
    }
    $query = $this->db->get('shipment_invoice');
    return $query->result_array();
  }

  public function shipment_invoice_create_process_db($data)
  {
    $this->db->insert('shipment_invoice', $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }

  public function shipment_invoice_update_process_db($data, $where)
  {
    $this->db->where($where);
    $this->db->update('shipment_invoice', $data);
  }
}
