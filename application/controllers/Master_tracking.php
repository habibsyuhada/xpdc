<?php

use Sabberworm\CSS\Value\Value;

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
		cek_login();
		$this->load->model('master_tracking_mod');
		$this->load->model('shipment_mod');
		$this->load->model('home_mod');
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
		$data['subview'] 			= 'master_tracking/master_tracking_create';
		$data['meta_title'] 	= 'Create Master Tracking';
		$this->load->view('index', $data);
	}

	public function master_tracking_create_process(){
		$post = $this->input->post();
		$form_data = array(
			'master_tracking' 	=> $post['master_tracking'],
			'remarks' 					=> $post['remarks'],
		);
		$id_insert	= $this->master_tracking_mod->master_tracking_create_process_db($form_data);
		$this->session->set_flashdata('success', 'Your Master Tracking data has been Created!');
		redirect('master_tracking/master_tracking_list');
	}

	public function master_tracking_multi_create_process(){
		$post = $this->input->post();
		if(count($post['id']) < 1){
			$this->session->set_flashdata('error', 'Please tick shipment first to create new master tracking!');
			redirect('shipment/shipment_list');
		}

		$where['shipment.id IN ('.$post['id'].')'] = NULL;
		$where['shipment.master_tracking !='] = "";
		$shipment_list 					= $this->shipment_mod->shipment_list_db($where);
		unset($where);
		if(count($shipment_list) > 0){
			foreach ($shipment_list as $key => $value) {
				$shipment[] = $value['tracking_no'];
			}
			$this->session->set_flashdata('error', 'All Documents above already have master tracking!<br>'.join('<br>', $shipment));
			redirect('shipment/shipment_list');
		}

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
		unset($where);
		$id_shipment = array();
		$currency = "";
		$total_value = 0;
		$total_act_weight = 0;
		$total_vol_weight = 0;
		$total_measurement = 0;
		$per = 5000;
		foreach ($data['shipment_list'] as $key => $value) {
			$total_value += $value['declared_value'];
			$currency = $value['currency'];
			$id_shipment[] = $value['id'];
			if ($value['type_of_mode'] == 'Air Freight') {
				$per = 6000;
			}
		}
		if(count($id_shipment) > 0){
			$where["id_shipment IN ('".join("', '", $id_shipment)."')"] 	= NULL;
			$packages_list 					= $this->shipment_mod->shipment_packages_list_db($where);
			foreach ($packages_list as $key => $value) {
				$actual_weight = $value['qty'] * $value['weight'];
				$volume_weight = $value['qty'] * ($value['length'] * $value['width'] * $value['height']) / $per;
				$measurement = $value['qty'] * ($value['length'] * $value['width'] * $value['height']) / 1000000;

				$total_act_weight += $actual_weight;
				$total_vol_weight += $volume_weight;
				$total_measurement += $measurement;
			}
		}
		
		$data['summary_total'] 		= array(
			"total_value" => $currency." ".number_format($total_value, 2),
			"total_act_weight" => number_format($total_act_weight, 2),
			"total_vol_weight" => number_format($total_vol_weight, 2),
			"total_measurement" => number_format($total_measurement, 2),
		);
		$data['master_tracking'] 	= $master_tracking;
		$data['subview'] 				  = 'master_tracking/master_tracking_detail';
		$data['meta_title'] 		  = 'Shipment List';
		$this->load->view('index', $data);
	}

	public function submit_new_tracking_no(){
		$where['tracking_no'] 				= $this->input->post('tracking_no');
		$shipment_list 	  						= $this->shipment_mod->shipment_list_db($where);
		if(count($shipment_list)<1){
			echo "Error: Tracking Number Is Not Found!";
			exit;
		}
		elseif($shipment_list[0]['master_tracking'] != ""){
			echo "Error: Already in Container !".$shipment_list[0]['master_tracking'];
			exit;
		}
		$shipment			 	  						= $shipment_list[0];
		$form_data = array(
			'master_tracking' 	=> $this->input->post('master_tracking'),
		);
		$where['id IN ('.$shipment['id'].')'] = NULL;
		$this->shipment_mod->shipment_update_process_db($form_data, $where);
		
		echo json_encode($shipment);
		// test_var($this->input->post());
	}

	public function master_tracking_edit($master_tracking){
		$where['master_tracking'] 	= $master_tracking;
		$shipment_list 							= $this->shipment_mod->shipment_list_db($where);

		if (count($shipment_list) <= 0) {
			$this->session->set_flashdata('error', 'Shipment not Found!');
			redirect("master_tracking/master_tracking_list");
		}

		$all_same = true;
		$first = $shipment_list[0]['main_agent_name'].$shipment_list[0]['main_agent_mawb_mbl'].$shipment_list[0]['main_agent_carrier'].$shipment_list[0]['main_agent_voyage_flight_no'].$shipment_list[0]['main_agent_voyage_flight_date'].$shipment_list[0]['secondary_agent_name'].$shipment_list[0]['secondary_agent_mawb_mbl'].$shipment_list[0]['secondary_agent_carrier'].$shipment_list[0]['secondary_agent_voyage_flight_no'].$shipment_list[0]['secondary_agent_voyage_flight_date'].$shipment_list[0]['main_agent_port_of_loading'].$shipment_list[0]['main_agent_port_of_discharge'].$shipment_list[0]['secondary_agent_port_of_loading'].$shipment_list[0]['secondary_agent_port_of_discharge'].$shipment_list[0]['container_no'].$shipment_list[0]['seal_no'].$shipment_list[0]['cipl_no'].$shipment_list[0]['permit_no'];
		foreach ($shipment_list as $key => $value) {
			$new = $value['main_agent_name'].$value['main_agent_mawb_mbl'].$value['main_agent_carrier'].$value['main_agent_voyage_flight_no'].$value['main_agent_voyage_flight_date'].$value['secondary_agent_name'].$value['secondary_agent_mawb_mbl'].$value['secondary_agent_carrier'].$value['secondary_agent_voyage_flight_no'].$value['secondary_agent_voyage_flight_date'].$value['main_agent_port_of_loading'].$value['main_agent_port_of_discharge'].$value['secondary_agent_port_of_loading'].$value['secondary_agent_port_of_discharge'].$value['container_no'].$value['seal_no'].$value['cipl_no'].$value['permit_no'];
			if($first != $new){
				$all_same = false;
			}
		}
		if($all_same == true){
			$shipment = $shipment_list[0];
		}
		else{
			$shipment = array();
		}
		
		$data['shipment'] 			= $shipment;
		$data['master_tracking']= $master_tracking;
		$data['subview'] 				= 'master_tracking/master_tracking_edit';
		$data['meta_title'] 		= 'Master Tracking Shipping Information';
		$this->load->view('index', $data);
	}

	public function master_tracking_edit_process(){
		$post = $this->input->post();

		$form_data = array(
			'assign_branch'					=> $post['assign_branch'],
		);
		$where['master_tracking'] = $post['master_tracking'];
		$this->shipment_mod->shipment_update_process_db($form_data, $where);

		$shipment_list 	= $this->shipment_mod->shipment_list_db($where);
		$id_shipment 		= array();
		foreach ($shipment_list as $key => $value) {
			$id_shipment[] = $value['id'];
		}

		$form_data = array(
			'main_agent_name'												=> $post['main_agent_name'],
			'main_agent_mawb_mbl'										=> $post['main_agent_mawb_mbl'],
			'main_agent_carrier'										=> $post['main_agent_carrier'],
			'main_agent_voyage_flight_no'						=> $post['main_agent_voyage_flight_no'],
			'main_agent_voyage_flight_date'					=> $post['main_agent_voyage_flight_date'],
			'main_agent_port_of_loading'						=> $post['main_agent_port_of_loading'],
			'main_agent_port_of_discharge'					=> $post['main_agent_port_of_discharge'],
			// 'main_agent_cost'												=> $post['main_agent_cost'],
			'secondary_agent_name'									=> $post['secondary_agent_name'],
			'secondary_agent_mawb_mbl'							=> $post['secondary_agent_mawb_mbl'],
			'secondary_agent_carrier'								=> $post['secondary_agent_carrier'],
			'secondary_agent_voyage_flight_no'			=> $post['secondary_agent_voyage_flight_no'],
			'secondary_agent_voyage_flight_date'		=> $post['secondary_agent_voyage_flight_date'],
			'secondary_agent_port_of_loading'				=> $post['secondary_agent_port_of_loading'],
			'secondary_agent_port_of_discharge'			=> $post['secondary_agent_port_of_discharge'],
			// 'secondary_agent_cost'									=> $post['secondary_agent_cost'],
			'container_no'													=> $post['container_no'],
			'seal_no'																=> $post['seal_no'],
			'cipl_no'																=> $post['cipl_no'],
			'permit_no'															=> $post['permit_no']
		);
		$where2["id_shipment IN ('".join("', '", $id_shipment)."')"] = NULL;
		$this->shipment_mod->shipment_detail_update_process_db($form_data, $where2);

		$this->session->set_flashdata('success', 'Your Shipment data has been Updated!');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function master_tracking_assign($master_tracking){
		$where['master_tracking'] 	= $master_tracking;
		$shipment_list 							= $this->shipment_mod->shipment_list_db($where);

		if (count($shipment_list) <= 0) {
			$this->session->set_flashdata('error', 'Shipment not Found!');
			redirect("master_tracking/master_tracking_list");
		}

		$all_same = true;
		$first = $shipment_list[0]['assign_branch'];
		foreach ($shipment_list as $key => $value) {
			$new = $value['assign_branch'];
			if($first != $new){
				$all_same = false;
			}
		}
		if($all_same == true){
			$shipment = $shipment_list[0];
		}
		else{
			$shipment = array();
		}
		
		$datadb 	= $this->home_mod->branch_list();
		$branch_list = [];
		foreach ($datadb as $key => $value) {
			$branch_list[$value['name']] = $value;
		}
		$data['branch_list'] 	= $branch_list;
		
		$data['shipment'] 			= $shipment;
		$data['master_tracking']= $master_tracking;
		$data['subview'] 				= 'master_tracking/master_tracking_assign';
		$data['meta_title'] 		= 'Master Tracking Assign';
		$this->load->view('index', $data);
	}

	public function master_tracking_assign_process(){
		$post = $this->input->post();

		$form_data = array(
			'assign_branch'					=> $post['assign_branch'],
		);
		$where['master_tracking'] = $post['master_tracking'];
		$this->shipment_mod->shipment_update_process_db($form_data, $where);

		$this->session->set_flashdata('success', 'Your Shipment data has been Updated!');
		redirect($_SERVER['HTTP_REFERER']);
	}
}
