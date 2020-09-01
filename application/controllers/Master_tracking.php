<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_tracking extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
		parent::__construct();
		$this->load->model('master_tracking_mod');
		$this->load->model('shipment_mod');
	}

	public function index(){
		redirect('home/home');
	}

	public function master_tracking_list(){
		$data['master_list'] 		= $this->master_tracking_mod->master_tracking_list_db();

		$where['(master_tracking IS NOT NULL OR master_tracking != "")'] = NULL;
		$shipment_list 					= $this->shipment_mod->shipment_list_db($where);
		$shipment 							= array();
		foreach ($shipment_list as $key => $value) {
			$shipment[$value['master_tracking']][] = $value;
		}
		$data['shipment'] 			= $shipment;

		$data['subview'] 				= 'master_tracking/master_tracking_list';
		$data['meta_title'] 		= 'Master Tracking List';
		$this->load->view('index', $data);
  }

	public function master_tracking_create(){
		$post = $this->input->post();

		$form_data = array(
			'master_tracking' 	=> $post['master_tracking'],
			'remarks' 					=> $post['remarks'],
		);
		$id_insert	= $this->master_tracking_mod->master_tracking_create_process_db($form_data);

		$form_data = array(
			'master_tracking' 	=> $post['master_tracking'],
		);
		$where['id IN ('.$post['id'].')'] = NULL;
		$this->shipment_mod->shipment_update_process_db($form_data, $where);

		$this->session->set_flashdata('success', 'Your Shipment data has been Updated!');
		redirect('shipment/shipment_list');
  }
  
  public function master_tracking_detail($master_tracking){
    $where['master_tracking'] = $master_tracking;
		$data['shipment_list'] 	  = $this->shipment_mod->shipment_list_db($where);
		$data['master_tracking'] 	= $master_tracking;
		$data['subview'] 				  = 'master_tracking/master_tracking_detail';
		$data['meta_title'] 		  = 'Shipment List';
		$this->load->view('index', $data);
	}
}
