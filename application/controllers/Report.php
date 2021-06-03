<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   * 		http://example.com/index.php/welcome
   *	- or -
   * 		http://example.com/index.php/welcome/index
   *	- or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/branch_guide/general/urls.html
   */
  public function __construct()
  {
    parent::__construct();
    cek_login();
    $this->load->model('home_mod');
    $this->load->model('shipment_mod');
  }

  public function index()
  {
    redirect("report/summary_report");
  }

  public function summary_report()
  {
    $data['subview']         = 'report/summary_report';
    $data['meta_title']     = 'Summary Report';
    $this->load->view('index', $data);
  }

  public function summary_report_process()
  {
    $post = $this->input->post();
    if ($this->session->userdata('branch') != "NONE") {
      if ($this->session->userdata('role') == 'Operator') {
        $where["((assign_branch LIKE '%" . $this->session->userdata('branch') . "%' AND assign_branch IS NOT NULL) OR (assign_branch IS NULL AND branch LIKE '%" . $this->session->userdata('branch') . "%'))"]   = NULL;
      } else if ($this->session->userdata('role') == 'Driver') {
      } else {
        $customer = $this->shipment_mod->customer_list_db(["customer_id IN(SELECT id FROM user WHERE role = 'Customer' AND branch = '" . $this->session->userdata('branch') . "')" => null]);
        $row_data = [];
        foreach ($customer as $row) {
          $row_data[] = $row['account_no'];
        }
        $where_in = '';
        if (count($row_data) > 0) {
          $where_in = " OR (billing_account IN('" . implode("','", $row_data) . "'))";
        }
        // $where_in = "'" . implode("','", $row_data) . "'";
        $where["((branch LIKE '%" . $this->session->userdata('branch') . "%' AND billing_account = '') $where_in)"]   = NULL;
      }
    }

    if ($this->session->userdata('role') == "Commercial") {
      unset($where);
      $datadb   = $this->home_mod->customer_list(array("status_delete" => 1, "create_by" => $this->session->userdata('id')));
      $customer_list = [];
      foreach ($datadb as $key => $value) {
        if ($value['account_no'] != "") {
          $customer_list[] = $value['account_no'];
        }
      }
      if (count($customer_list) == 0) {
        $customer_list[] = "0";
      }
      $where['status_delete']   = 1;
      $where["(shipment_detail.billing_account IN ('" . join("', '", $customer_list) . "') OR created_by = '" . $this->session->userdata('id') . "')"]   = NULL;
      // $where["created_by"] 	= $this->session->userdata('id');
    }

    $where["created_date BETWEEN '" . $post['date_from'] . " 00:00:00' AND '" . $post['date_to'] . " 23:59:59'"]  = NULL;
    // $where['created_date <=']  = ;
    $where['status_delete']    = 1;

    $shipment_list             = $this->shipment_mod->shipment_list_db($where);
    $data['shipment_list']     = $shipment_list;
    $created_by   = [];
    $id_shipment              = array();
    foreach ($shipment_list as $key => $value) {
      $id_shipment[] = $value['id'];
      if (!in_array($value['created_by'], $created_by)) {
        $created_by[] = $value['created_by'];
      }
    }

    $created_by_list = [];
    if (count($created_by) > 0) {
      unset($where);
      $where["id IN ('" . join("', '", $created_by) . "')"]   = NULL;
      $datadb   = $this->home_mod->user_list($where);
      foreach ($datadb as $key => $value) {
        $created_by_list[$value['id']] = $value['name'];
      }
    }
    $data['created_by_list'] = $created_by_list;

    if (count($id_shipment) > 0) {
      unset($where);
      $where["id_shipment IN (" . join(", ", $id_shipment) . ")"]   = NULL;
      $shipment_invoice       = $this->shipment_mod->shipment_invoice_list_db($where);
      $invoice = array();
      if (count($shipment_invoice) > 0) {
        foreach ($shipment_invoice as $key => $value) {
          $invoice[$value['id_shipment']] = $value;
        }
      }
      $data['invoice']         = $invoice;

      unset($where);
      $where["id_shipment IN (" . join(", ", $id_shipment) . ")"]   = NULL;
      $where["status_delete"]   = 1;
      $cost_list               = $this->shipment_mod->shipment_cost_list_db($where);
      // test_var($cost_list);
      $total = array();
      foreach ($cost_list as $key => $value) {
        $persen = 1;
        if ($value['uom'] == '%') {
          $persen = 100;
        }
        if (isset($total[$value['id_shipment']][$value['category']])) {
          $total[$value['id_shipment']][$value['category']] += ($value['qty'] / $persen) * $value['unit_price'] * $value['exchange_rate'];
        } else {
          $total[$value['id_shipment']][$value['category']] = ($value['qty'] / $persen) * $value['unit_price'] * $value['exchange_rate'];
        }
      }
      $data['total']       = $total;
    }

    $this->load->view('report/summary_report_excel', $data);
  }
}
