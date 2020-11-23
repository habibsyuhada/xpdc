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
	public function __construct(){
		parent::__construct();
		cek_login();
		$this->load->model('home_mod');
		$this->load->model('shipment_mod');
	}

	public function index(){
		redirect("report/summary_report");
	}

	public function summary_report(){
    $data['subview'] 				= 'report/summary_report';
		$data['meta_title'] 		= 'Summary Report';
		$this->load->view('index', $data);
  }

	public function summary_report_process(){
    $post = $this->input->post();

    $where['created_date >=']  = $post['date_from'];
    $where['created_date <=']  = $post['date_to'];
		$shipment_list 					  = $this->shipment_mod->shipment_list_db($where);
    $data['shipment_list'] 	  = $shipment_list;
    $id_shipment              = array();
    foreach ($shipment_list as $key => $value) {
      $id_shipment[] = $value['id'];
    }

    if(count($id_shipment) > 0){
      unset($where);
      $where["id_shipment IN (".join(", ", $id_shipment).")"] 	= NULL;
      $shipment_invoice 			= $this->shipment_mod->shipment_invoice_list_db($where);
      $invoice = array();
      if(count($shipment_invoice) > 0){
        foreach ($shipment_invoice as $key => $value) {
          $invoice[$value['id_shipment']] = $value;
        }
      }
      $data['invoice'] 				= $invoice;

      unset($where);
      $where["id_shipment IN (".join(", ", $id_shipment).")"] 	= NULL;
      $cost_list 							= $this->shipment_mod->shipment_cost_list_db($where);
      $total = array();
      foreach ($cost_list as $key => $value) {
        $persen = 1;
        if($value['uom'] = '%'){
          $persen = 100;
        }
        if(isset($total[$value['id_shipment']][$value['category']])){
          $total[$value['id_shipment']][$value['category']] += ($value['qty'] / $persen) + $value['unit_price'] + $value['exchange_rate'];
        }
        else{
          $total[$value['id_shipment']][$value['category']] = ($value['qty'] / $persen) + $value['unit_price'] + $value['exchange_rate'];
        }
      }
      $data['total'] 			= $total;
    }

    $this->load->view('report/summary_report_excel', $data);
  }
		
}
