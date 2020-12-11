<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shipment extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login();
		$this->load->model('home_mod');
		$this->load->model('shipment_mod');
	}

	public function index()
	{
		redirect("shipment/shipment_list");
	}

	public function shipment_list()
	{
		// test_var($this->input->get());
		$where = array();
		$where['status_delete'] 	= 1;
		if ($this->session->userdata('branch')) {
			if ($this->session->userdata('branch') != "NONE") {
				$where["(assign_branch LIKE '%" . $this->session->userdata('branch') . "%' OR branch LIKE '%" . $this->session->userdata('branch') . "%')"] 	= NULL;
			}
		} else {
			redirect('home/logout');
		}

		if ($this->session->userdata('role') == "Driver") {
			$where["(driver_pickup = " . $this->session->userdata('id') . " OR driver_deliver = " . $this->session->userdata('id') . ")"] 	= NULL;
		}
		elseif ($this->session->userdata('role') == "Commercial") {
			$where["created_by"] 	= $this->session->userdata('id');
		}

		if ($this->input->get('status_driver')) {
			$status_driver = explode("_", $this->input->get('status_driver'));
			if(count($status_driver) > 1){
				$where["(status_driver_" . $status_driver[0] . " = " . $status_driver[1] . ")"] 	= NULL;
			}
			else{
				$where["(status_driver_" . $status_driver[0] . " IN (1, 2) )"] 	= NULL;
			}
			
		}
		foreach ($this->input->get() as $key => $value) {
			if ($this->input->get($key) || $value == 0) {
				$exc_filter = array("status_driver");
				if (!in_array($key, $exc_filter)) {
					$where[$key . " LIKE '%" . $value . "%'"] 	= NULL;
				}
			}
		}

		// $summary_list 					= $this->shipment_mod->summary_per_status($where);
		// $data['summary_list'] 	= $summary_list[0];
		$order_by = NULL;
		if ($this->session->userdata('role') == "Driver") {
			$order_by["assign_driver_date"] = "DESC";
		}
		$datadb 				= $this->shipment_mod->shipment_list_db($where, null, $order_by);
		$shipment_list 	= [];
		$express_list 	= [];
		$created_by 	= [];
		foreach ($datadb as $key => $value) {
			if($value['sea'] == "Express" && $value['status'] != "Delivered"){
				$express_list[] = $value;
			}
			else{
				$shipment_list[] = $value;
			}
			if(!in_array($value['created_by'], $created_by)){
				$created_by[] = $value['created_by'];
			}
		}
		$data['shipment_list'] 	= array_merge($express_list, $shipment_list);
		// test_var($data['shipment_list']);

		unset($where);
		$where['role'] 				= "Driver";
		if ($this->session->userdata('branch')) {
			if ($this->session->userdata('branch') != "NONE") {
				$where["branch"] 	= $this->session->userdata('branch');
			}
		}
		$data['driver_list'] 	= $this->home_mod->user_list($where);

		$created_by_list = [];
		if(count($created_by) > 0 && $this->session->userdata('role') == "Super Admin"){
			unset($where);
			$where["id IN ('".join("', '", $created_by)."')"] 	= NULL;
			$datadb 	= $this->home_mod->user_list($where);
			foreach ($datadb as $key => $value) {
				$created_by_list[$value['id']] = $value['name'];
			}
		}
		$data['created_by_list'] = $created_by_list;

		$data['country'] = json_decode(file_get_contents("./assets/country/country.json"), true);

		$data['subview'] 				= 'shipment/shipment_list';
		$data['meta_title'] 		= 'Shipment List';
		$this->load->view('index', $data);
	}

	public function shipment_create()
	{
		$data['subview'] 			= 'shipment/shipment_create';
		$data['meta_title'] 	= 'Create Shipment';

		$data['country'] = json_decode(file_get_contents("./assets/country/country.json"), true);
		$this->load->view('index', $data);
	}

	public function shipment_receipt($id = NULL)
	{
		// $post = $this->input->post();
		// test_var(count($post), 1);
		// test_var($post);

		if ($id) {
			$where['shipment.id'] 	= $id;
			$data_post 							= $this->shipment_mod->shipment_list_db($where);
			unset($where);
			$data_post 							= $data_post[0];

			$where['id_shipment'] 	= $id;
			$packages_list 					= $this->shipment_mod->shipment_packages_list_db($where);
			unset($where);
			foreach ($packages_list as $key => $value) {
				foreach ($value as $key2 => $value2) {
					if (!in_array($key2, array('id', 'id_shipment', 'create_date', 'status_delete')))
						$data_post[$key2][] = $value2;
				}
			}
			$post = $data_post;
		} else {
			$post = $this->input->post();
		}

		$data['data_input'] 			= $post;
		$data['meta_title'] 			= 'Shipment Receipt';
		$data['subview']    			= 'shipment/shipment_receipt';
		$this->load->view('index', $data);
	}

	public function shipment_receipt_pdf($id = NULL)
	{
		// test_var(count($post), 1);
		// test_var($post);
		if ($id) {
			$where['shipment.id'] 	= $id;
			$data_post 							= $this->shipment_mod->shipment_list_db($where);
			unset($where);
			$data_post 							= $data_post[0];

			$where['id_shipment'] 	= $id;
			$packages_list 					= $this->shipment_mod->shipment_packages_list_db($where);
			unset($where);
			foreach ($packages_list as $key => $value) {
				foreach ($value as $key2 => $value2) {
					if (!in_array($key2, array('id', 'id_shipment', 'create_date', 'status_delete')))
						$data_post[$key2][] = $value2;
				}
			}
			$post = $data_post;
		} else {
			$post = $this->input->post();
		}

		$data['post'] = $post;

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Receipt-" . date('Y-m-d H:i:s') . ".pdf";
		$this->pdf->load_view('shipment/shipment_receipt_pdf', $data);
	}

	public function shipment_create_process()
	{
		$post = $this->input->post();
		$tracking_no = $this->shipment_mod->shipment_generate_tracking_no_db();
		$tracking_no = "XPDC" . $tracking_no;

		// if ($post['status_pickup'] == 'Dropoff') {
		// 	$status = 'Pending Payment';
		// } else if ($post['status_pickup'] == 'Picked Up') {
		// 	$status = 'Booked';
		// }
		$status = 'Booked';
		$sea = '';

		if (isset($post['sea'])) {
			$sea = $post['sea'];
		}

		$form_data = array(
			'tracking_no' 				=> $tracking_no,
			'shipper_name' 				=> $post['shipper_name'],
			'shipper_address' 			=> $post['shipper_address'],
			'shipper_city' 				=> $post['shipper_city'],
			'shipper_country' 			=> $post['shipper_country'],
			'shipper_postcode'			=> $post['shipper_postcode'],
			'shipper_contact_person' 	=> $post['shipper_contact_person'],
			'shipper_phone_number' 		=> $post['shipper_phone_number'],
			'shipper_email' 			=> $post['shipper_email'],
			'consignee_name' 			=> $post['consignee_name'],
			'consignee_address' 		=> $post['consignee_address'],
			'consignee_city' 			=> $post['consignee_city'],
			'consignee_country' 		=> $post['consignee_country'],
			'consignee_postcode' 		=> $post['consignee_postcode'],
			'consignee_contact_person' 	=> $post['consignee_contact_person'],
			'consignee_phone_number' 	=> $post['consignee_phone_number'],
			'consignee_email' 			=> $post['consignee_email'],
			'type_of_shipment' 			=> $post['type_of_shipment'],
			'type_of_mode' 				=> $post['type_of_mode'],
			'incoterms' 				=> $post['incoterms'],
			'sea' 						=> $sea,
			'description_of_goods'		=> $post['description_of_goods'],
			'hscode'					=> $post['hscode'],
			'coo'						=> $post['coo'],
			'declared_value'			=> $post['declared_value'],
			'currency'					=> $post['currency'],
			'ref_no'					=> $post['ref_no'],
			'status'					=> $status,
			'status_delete'				=> 1,
			'created_by'				=> $this->session->userdata('id'),
			'branch'				=> $this->session->userdata('branch'),
		);
		$id_shipment = $this->shipment_mod->shipment_create_process_db($form_data);

		if ($post['status_pickup'] == 'Dropoff') {
			$form_data = array(
				'id_shipment' 							=> $id_shipment,
				'status_pickup' 						=> $post['status_pickup'],

				'billing_same_as' 					=> $post['billing_same_as'],
				'billing_account' 					=> $post['billing_account'],
				'billing_name' 							=> $post['billing_name'],
				'billing_address' 					=> $post['billing_address'],
				'billing_city' 							=> $post['billing_city'],
				'billing_country' 					=> $post['billing_country'],
				'billing_postcode' 					=> $post['billing_postcode'],
				'billing_contact_person' 		=> $post['billing_contact_person'],
				'billing_phone_number' 			=> $post['billing_phone_number'],
				'billing_email' 						=> $post['billing_email'],
			);
		} else if ($post['status_pickup'] == 'Picked Up') {
			$form_data = array(
				'id_shipment' 							=> $id_shipment,
				'status_pickup' 						=> $post['status_pickup'],
				'pickup_same_as' 						=> $post['pickup_same_as'],
				'pickup_name' 							=> $post['pickup_name'],
				'pickup_address' 						=> $post['pickup_address'],
				'pickup_city' 							=> $post['pickup_city'],
				'pickup_country' 						=> $post['pickup_country'],
				'pickup_postcode'						=> $post['pickup_postcode'],
				'pickup_contact_person' 		=> $post['pickup_contact_person'],
				'pickup_phone_number' 			=> $post['pickup_phone_number'],
				'pickup_email' 							=> $post['pickup_email'],
				'pickup_date' 							=> $post['pickup_date'],
				'pickup_time' 							=> $post['pickup_time'],
				'pickup_date_to' 						=> $post['pickup_date_to'],
				'pickup_time_to' 						=> $post['pickup_time_to'],
				'pickup_notes' 							=> $post['pickup_notes'],

				'billing_same_as' 					=> $post['billing_same_as'],
				'billing_account' 					=> $post['billing_account'],
				'billing_name' 							=> $post['billing_name'],
				'billing_address' 					=> $post['billing_address'],
				'billing_city' 							=> $post['billing_city'],
				'billing_country' 					=> $post['billing_country'],
				'billing_postcode' 					=> $post['billing_postcode'],
				'billing_contact_person' 		=> $post['billing_contact_person'],
				'billing_phone_number' 			=> $post['billing_phone_number'],
				'billing_email' 						=> $post['billing_email'],
			);
		}

		$this->shipment_mod->shipment_detail_create_process_db($form_data);

		$form_data = array(
			'id_shipment' 			=> $id_shipment,
			'date' 					=> date("Y-m-d"),
			'time' 					=> date("H:i:s"),
			'location' 				=> $post['shipper_city'] . ", " . $post['shipper_country'],
			'status' 				=> $status,
			'remarks' 				=> "",
		);
		$this->shipment_mod->shipment_history_create_process_db($form_data);

		foreach ($post['qty'] as $key => $value) {
			$form_data = array(
				'id_shipment' 			=> $id_shipment,
				'qty' 					=> $post['qty'][$key],
				'piece_type' 			=> $post['piece_type'][$key],
				'length' 				=> $post['length'][$key],
				'width' 				=> $post['width'][$key],
				'height' 				=> $post['height'][$key],
				'weight'				=> $post['weight'][$key],
			);
			$this->shipment_mod->shipment_packages_create_process_db($form_data);
		}

		// $this->shipment_update_last_history($id_shipment);

		$this->session->set_flashdata('success', 'Your Shipment data has been Created!');
		redirect('shipment/shipment_list');
	}

	public function shipment_update($id)
	{
		$where['id'] 						= $id;
		$shipment_list 					= $this->shipment_mod->shipment_list_db($where);

		unset($where);
		$where['id_shipment'] 	= $id;
		$packages_list 					= $this->shipment_mod->shipment_packages_list_db($where);
		$where['id_shipment'] 	= $id;
		$history_list 					= $this->shipment_mod->shipment_history_list_db($where);

		if (count($shipment_list) <= 0) {
			$this->session->set_flashdata('error', 'Shipment not Found!');
			redirect("shipment/shipment_list");
		}

		$t = 'sein';
		if($this->input->get('t')){
			$t = $this->input->get('t');
		}
		$data['t'] = $t;

		$data['country'] = json_decode(file_get_contents("./assets/country/country.json"), true);

		$data['shipment'] 			= $shipment_list[0];
		$data['packages_list'] 	= $packages_list;
		$data['history_list'] 	= $history_list;
		// $data['t'] 							= 'g';
		$data['subview'] 				= 'shipment/shipment_update';
		$data['meta_title'] 		= 'Shipment Update';
		$this->load->view('index', $data);
	}

	public function shipment_update_process()
	{
		$post = $this->input->post();
		$form_data = array(
			'shipper_name' 				=> $post['shipper_name'],
			'shipper_address' 			=> $post['shipper_address'],
			'shipper_city' 				=> $post['shipper_city'],
			'shipper_country' 			=> $post['shipper_country'],
			'shipper_postcode'			=> $post['shipper_postcode'],
			'shipper_contact_person' 	=> $post['shipper_contact_person'],
			'shipper_phone_number' 		=> $post['shipper_phone_number'],
			'shipper_email' 			=> $post['shipper_email'],
			'consignee_name' 			=> $post['consignee_name'],
			'consignee_address' 		=> $post['consignee_address'],
			'consignee_city' 			=> $post['consignee_city'],
			'consignee_country' 		=> $post['consignee_country'],
			'consignee_postcode' 		=> $post['consignee_postcode'],
			'consignee_contact_person' 	=> $post['consignee_contact_person'],
			'consignee_phone_number' 	=> $post['consignee_phone_number'],
			'consignee_email' 			=> $post['consignee_email'],
			'type_of_shipment' 			=> $post['type_of_shipment'],
			'type_of_mode' 				=> $post['type_of_mode'],
			'incoterms' 				=> $post['incoterms'],
			'sea' 						=> @$post['sea'],
			'description_of_goods'		=> $post['description_of_goods'],
			'hscode'					=> $post['hscode'],
			'coo'						=> $post['coo'],
			'declared_value'			=> $post['declared_value'],
			'currency'					=> $post['currency'],
			'ref_no'					=> $post['ref_no'],
		);
		if(isset($post['has_updated_packages'])){
			$form_data['has_updated_packages'] = 1;
		}
		$where['id'] = $post['id'];
		$this->shipment_mod->shipment_update_process_db($form_data, $where);

		$form_data = array(
			'status_pickup' 						=> $post['status_pickup'],
			'pickup_same_as' 						=> $post['pickup_same_as'],
			'pickup_name' 							=> $post['pickup_name'],
			'pickup_address' 						=> $post['pickup_address'],
			'pickup_city' 							=> $post['pickup_city'],
			'pickup_country' 						=> $post['pickup_country'],
			'pickup_postcode'						=> $post['pickup_postcode'],
			'pickup_contact_person' 		=> $post['pickup_contact_person'],
			'pickup_phone_number' 			=> $post['pickup_phone_number'],
			'pickup_email' 							=> $post['pickup_email'],
			'pickup_date' 							=> $post['pickup_date'],
			'pickup_time' 							=> $post['pickup_time'],
			'pickup_date_to' 						=> $post['pickup_date_to'],
			'pickup_time_to' 						=> $post['pickup_time_to'],
			'pickup_notes' 							=> $post['pickup_notes'],
			'billing_same_as' 					=> $post['billing_same_as'],
			'billing_account' 					=> $post['billing_account'],
			'billing_name' 							=> $post['billing_name'],
			'billing_address' 					=> $post['billing_address'],
			'billing_city' 							=> $post['billing_city'],
			'billing_country' 					=> $post['billing_country'],
			'billing_postcode' 					=> $post['billing_postcode'],
			'billing_contact_person' 		=> $post['billing_contact_person'],
			'billing_phone_number' 			=> $post['billing_phone_number'],
			'billing_email' 						=> $post['billing_email'],
		);
		$where2['id_shipment'] = $post['id'];
		$this->shipment_mod->shipment_detail_update_process_db($form_data, $where2);

		foreach ($post['qty'] as $key => $value) {
			unset($where);
			if ($post['id_detail'][$key] == "") {
				$form_data = array(
					'id_shipment' 					=> $post['id'],
					'qty' 							=> $post['qty'][$key],
					'piece_type' 					=> $post['piece_type'][$key],
					'length' 						=> $post['length'][$key],
					'width' 						=> $post['width'][$key],
					'height' 						=> $post['height'][$key],
					'weight' 						=> $post['weight'][$key],
				);
				$this->shipment_mod->shipment_packages_create_process_db($form_data);
			} else {
				$form_data = array(
					'qty' 							=> $post['qty'][$key],
					'piece_type' 					=> $post['piece_type'][$key],
					'length' 						=> $post['length'][$key],
					'width' 						=> $post['width'][$key],
					'height' 						=> $post['height'][$key],
					'weight' 						=> $post['weight'][$key],
				);
				$where['id'] = $post['id_detail'][$key];
				$this->shipment_mod->shipment_packages_update_process_db($form_data, $where);
			}
		}

		if(isset($post['has_updated_packages'])){
			$form_data = array(
				'id_shipment' 	=> $post['id'],
				'date' 					=> date("Y-m-d"),
				'time' 					=> date("H:i:s"),
				'location' 			=> $post['shipper_city'].", ".$post['shipper_country'],
				'status' 				=> "Service Center",
				'remarks' 			=> "",
			);
			$id_history = $this->shipment_mod->shipment_history_create_process_db($form_data);
			$this->shipment_update_last_history($post['id']);
		}

		$this->session->set_flashdata('success', 'Your Shipment data has been Updated!');
		redirect('shipment/shipment_update/' . $post['id']);
	}

	public function shipment_package_detail($id)
	{
		$where['id'] 						= $id;
		$shipment_list 					= $this->shipment_mod->shipment_list_db($where);

		unset($where);
		$where['id_shipment'] 	= $id;
		$packages_list 					= $this->shipment_mod->shipment_packages_list_db($where);

		if (count($shipment_list) <= 0) {
			$this->session->set_flashdata('error', 'Shipment not Found!');
			redirect("shipment/shipment_list");
		}

		$data['shipment'] 			= $shipment_list[0];
		$data['packages_list'] 	= $packages_list;
		$data['country'] = json_decode(file_get_contents("./assets/country/country.json"), true);
		$data['subview'] 				= 'shipment/shipment_package_detail';
		$data['meta_title'] 		= 'Shipment Package Detail';
		$this->load->view('index', $data);
	}

	public function shipment_package_detail_process()
	{
		$post = $this->input->post();
		$form_data = array(
			'incoterms' 						=> $post['incoterms'],
			'description_of_goods'	=> $post['description_of_goods'],
			'hscode'								=> $post['hscode'],
			'coo'										=> $post['coo'],
			'declared_value'				=> $post['declared_value'],
			'currency'							=> $post['currency'],
			'ref_no'								=> $post['ref_no'],
		);
		if(isset($post['has_updated_packages'])){
			$form_data['has_updated_packages'] = 1;
		}
		$where['id'] = $post['id'];
		$this->shipment_mod->shipment_update_process_db($form_data, $where);

		foreach ($post['qty'] as $key => $value) {
			unset($where);
			if ($post['id_detail'][$key] == "") {
				$form_data = array(
					'id_shipment' 					=> $post['id'],
					'qty' 							=> $post['qty'][$key],
					'piece_type' 					=> $post['piece_type'][$key],
					'length' 						=> $post['length'][$key],
					'width' 						=> $post['width'][$key],
					'height' 						=> $post['height'][$key],
					'weight' 						=> $post['weight'][$key],
				);
				$this->shipment_mod->shipment_packages_create_process_db($form_data);
			} else {
				$form_data = array(
					'qty' 							=> $post['qty'][$key],
					'piece_type' 					=> $post['piece_type'][$key],
					'length' 						=> $post['length'][$key],
					'width' 						=> $post['width'][$key],
					'height' 						=> $post['height'][$key],
					'weight' 						=> $post['weight'][$key],
				);
				$where['id'] = $post['id_detail'][$key];
				$this->shipment_mod->shipment_packages_update_process_db($form_data, $where);
			}
		}

		if(isset($post['has_updated_packages'])){
			$form_data = array(
				'id_shipment' 	=> $post['id'],
				'date' 					=> date("Y-m-d"),
				'time' 					=> date("H:i:s"),
				'location' 			=> $post['shipper_city'].", ".$post['shipper_country'],
				'status' 				=> "Service Center",
				'remarks' 			=> "",
			);
			$id_history = $this->shipment_mod->shipment_history_create_process_db($form_data);
			$this->shipment_update_last_history($post['id']);
		}

		$this->session->set_flashdata('success', 'Your Shipment data has been Updated!');
		redirect("shipment/shipment_list?status=Picked up");
	}

	public function shipment_edit($id)
	{
		$where['id'] 						= $id;
		$shipment_list 					= $this->shipment_mod->shipment_list_db($where);
		unset($where);

		if (count($shipment_list) <= 0) {
			$this->session->set_flashdata('error', 'Shipment not Found!');
			redirect("shipment/shipment_list");
		}

		$datadb 	= $this->home_mod->agent_list();
		$agent_list = [];
		foreach ($datadb as $key => $value) {
			$agent_list[$value['name']] = $value;
		}
		$data['agent_list'] 	= $agent_list;

		$data['country'] = json_decode(file_get_contents("./assets/country/country.json"), true);

		$data['shipment'] 			= $shipment_list[0];
		$data['t'] 							= 'g';
		$data['subview'] 				= 'shipment/shipment_edit';
		$data['meta_title'] 		= 'Shipment Edit Shipping Information';
		$this->load->view('index', $data);
	}

	public function shipment_edit_process()
	{
		$post = $this->input->post();
		
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
			// 'port_of_loading'												=> $post['port_of_loading'],
			// 'port_of_discharge'											=> $post['port_of_discharge'],
			'container_no'													=> $post['container_no'],
			'seal_no'																=> $post['seal_no'],
			'cipl_no'																=> $post['cipl_no'],
			'permit_no'															=> $post['permit_no']
		);
		$this->load->library('upload');
		// $this->load->library('image_lib');
		if (!empty($_FILES['main_agent_mawb_mbl_atc']['name'])) {
			$upload_path = 'file/agent/';
			$config = [
				'upload_path' 		=> $upload_path,
				'file_name' 			=> 'img_main_agent_mawb_mbl_atc_'.$post['id'].'_'. date('YmsHis'),
				'allowed_types' 	=> '*',
				// 'max_size'				=> 500,
				'overwrite' 			=> TRUE,
			];
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('main_agent_mawb_mbl_atc')) {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect($_SERVER['HTTP_REFERER']);
				return false;
			}

			$gbr = $this->upload->data();
			// unset($config);
			// $config = [
			// 	'image_library'		=> 'gd2',
			// 	'source_image'		=> $upload_path.$gbr['file_name'],
			// 	// 'create_thumb'		=> FALSE,
			// 	'maintain_ratio'	=> TRUE,
			// 	'quality'					=> '50%',
			// 	'width'						=> 500,
			// 	// 'height'					=> 400,
			// 	'new_image'				=> $upload_path.$gbr['file_name'],
			// ];

			// $this->image_lib->initialize($config);
			// if (!$this->image_lib->resize()) {
			// 	$this->session->set_flashdata('error', $this->image_lib->display_errors());
			// 	redirect($_SERVER['HTTP_REFERER']);
			// 	return false;
			// }
			$form_data['main_agent_mawb_mbl_atc'] = $gbr['file_name'];
		}
		if (!empty($_FILES['secondary_agent_mawb_mbl_atc']['name'])) {
			$upload_path = 'file/agent/';
			$config = [
				'upload_path' 		=> $upload_path,
				'file_name' 			=> 'img_secondary_agent_mawb_mbl_atc_'.$post['id'].'_'. date('YmsHis'),
				'allowed_types' 	=> '*',
				// 'max_size'				=> 500,
				'overwrite' 			=> TRUE,
			];
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('secondary_agent_mawb_mbl_atc')) {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect($_SERVER['HTTP_REFERER']);
				return false;
			}

			$gbr = $this->upload->data();
			// unset($config);
			// $config = [
			// 	'image_library'		=> 'gd2',
			// 	'source_image'		=> $upload_path.$gbr['file_name'],
			// 	// 'create_thumb'		=> FALSE,
			// 	'maintain_ratio'	=> TRUE,
			// 	'quality'					=> '50%',
			// 	'width'						=> 500,
			// 	// 'height'					=> 400,
			// 	'new_image'				=> $upload_path.$gbr['file_name'],
			// ];

			// $this->image_lib->initialize($config);
			// if (!$this->image_lib->resize()) {
			// 	$this->session->set_flashdata('error', $this->image_lib->display_errors());
			// 	redirect($_SERVER['HTTP_REFERER']);
			// 	return false;
			// }
			$form_data['secondary_agent_mawb_mbl_atc'] = $gbr['file_name'];
		}
		if (!empty($_FILES['cipl_no_atc']['name'])) {
			$upload_path = 'file/agent/';
			$config = [
				'upload_path' 		=> $upload_path,
				'file_name' 			=> 'img_cipl_no_atc_'.$post['id'].'_'. date('YmsHis'),
				'allowed_types' 	=> '*',
				// 'max_size'				=> 500,
				'overwrite' 			=> TRUE,
			];
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('cipl_no_atc')) {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect($_SERVER['HTTP_REFERER']);
				return false;
			}

			// $gbr = $this->upload->data();
			// unset($config);
			// $config = [
			// 	'image_library'		=> 'gd2',
			// 	'source_image'		=> $upload_path.$gbr['file_name'],
			// 	// 'create_thumb'		=> FALSE,
			// 	'maintain_ratio'	=> TRUE,
			// 	'quality'					=> '50%',
			// 	'width'						=> 500,
			// 	// 'height'					=> 400,
			// 	'new_image'				=> $upload_path.$gbr['file_name'],
			// ];

			// $this->image_lib->initialize($config);
			// if (!$this->image_lib->resize()) {
			// 	$this->session->set_flashdata('error', $this->image_lib->display_errors());
			// 	redirect($_SERVER['HTTP_REFERER']);
			// 	return false;
			// }
			$form_data['cipl_no_atc'] = $gbr['file_name'];
		}

		$where2['id_shipment'] = $post['id'];
		$this->shipment_mod->shipment_detail_update_process_db($form_data, $where2);

		$this->session->set_flashdata('success', 'Your Shipment data has been Updated!');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function shipment_assign($id)
	{
		$where['id'] 						= $id;
		$shipment_list 					= $this->shipment_mod->shipment_list_db($where);
		unset($where);

		if (count($shipment_list) <= 0) {
			$this->session->set_flashdata('error', 'Shipment not Found!');
			redirect("shipment/shipment_list");
		}

		$datadb 	= $this->home_mod->branch_list();
		$branch_list = [];
		foreach ($datadb as $key => $value) {
			$branch_list[$value['name']] = $value;
		}
		$data['branch_list'] 	= $branch_list;

		$data['country'] = json_decode(file_get_contents("./assets/country/country.json"), true);

		$data['shipment'] 			= $shipment_list[0];
		$data['t'] 							= 'g';
		$data['subview'] 				= 'shipment/shipment_assign';
		$data['meta_title'] 		= 'Assign Shipment';
		$this->load->view('index', $data);
	}

	public function shipment_assign_process()
	{
		$post = $this->input->post();
		$form_data = array(
			'assign_branch'					=> $post['assign_branch'],
		);
		$where['id'] = $post['id'];
		$this->shipment_mod->shipment_update_process_db($form_data, $where);

		$this->session->set_flashdata('success', 'Your Shipment data has been Updated!');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function shipment_cost($id)
	{
		$where['id'] 						= $id;
		$shipment_list 					= $this->shipment_mod->shipment_list_db($where);
		$data['shipment_list'] 	= $shipment_list[0];

		unset($where);
		echo $id;
		$where['id_shipment'] 	= $id;
		$cost_list 							= $this->shipment_mod->shipment_cost_list_db($where);
		$main_agent 						= array();
		$secondary_agent				= array();
		$costumer								= array();
		foreach ($cost_list as $key => $value) {
			if ($value['category'] == "main-agent") {
				$main_agent[] = $value;
			} elseif ($value['category'] == "secondary-agent") {
				$secondary_agent[] = $value;
			} elseif ($value['category'] == "costumer") {
				$costumer[] = $value;
			}
		}
		$data['main_agent'] 			= $main_agent;
		$data['secondary_agent'] 	= $secondary_agent;
		$data['costumer'] 				= $costumer;

		$data['subview'] 				= 'shipment/shipment_cost';
		$data['meta_title'] 		= 'Shipment Cost';
		$this->load->view('index', $data);
	}

	public function shipment_cost_process()
	{
		$post = $this->input->post();
		foreach ($post['unit_price'] as $key => $value) {
			if ($value != "" && $value != "0") {
				unset($where);
				if ($post['id_cost'][$key] == "") {
					$form_data = array(
						'id_shipment' 			=> $post['id'],
						'description' 			=> $post['description'][$key],
						'qty' 							=> $post['qty'][$key],
						'uom' 							=> $post['uom'][$key],
						'currency' 					=> $post['currency'][$key],
						'unit_price' 				=> $post['unit_price'][$key],
						'exchange_rate' 		=> $post['exchange_rate'][$key],
						'remarks' 					=> $post['remarks'][$key],
						'category' 					=> $post['category'],
					);
					$this->shipment_mod->shipment_cost_create_process_db($form_data);
				} else {
					$form_data = array(
						'description' 			=> $post['description'][$key],
						'qty' 							=> $post['qty'][$key],
						'uom' 							=> $post['uom'][$key],
						'currency' 					=> $post['currency'][$key],
						'unit_price' 				=> $post['unit_price'][$key],
						'exchange_rate' 		=> $post['exchange_rate'][$key],
						'remarks' 					=> $post['remarks'][$key],
					);
					$where['id'] = $post['id_cost'][$key];
					$this->shipment_mod->shipment_cost_update_process_db($form_data, $where);
				}
			}
		}

		$tab = "";
		if ($post['category'] == 'main-agent') {
			$tab = "?t=m";
		} elseif ($post['category'] == 'secondary-agent') {
			$tab = "?t=s";
		}

		$this->session->set_flashdata('success', 'Your Shipment data has been Updated!');
		redirect($_SERVER['HTTP_REFERER'] . $tab);
	}

	public function shipment_update_invoice_process()
	{
		$post = $this->input->post();

		$config['upload_path']          = 'file/invoice/';
		$config['file_name']            = 'invoice_' . $post['category'] . '_' . $post['id'] . '_' . date('YmsHis');
		$config['allowed_types']        = '*';
		$config['overwrite'] 						= TRUE;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('file')) {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect($_SERVER['HTTP_REFERER']);
			return false;
		}

		$tab = "";
		if ($post['main_agent_invoice']) {
			$form_data = array(
				'main_agent_invoice'				=> $post['main_agent_invoice'],
				'main_agent_invoice_attc'		=> $this->upload->data('file_name'),
			);
			$tab = "?t=m";
		} elseif ($post['secondary_agent_invoice']) {
			$form_data = array(
				'secondary_agent_invoice'				=> $post['secondary_agent_invoice'],
				'secondary_agent_invoice_attc'		=> $this->upload->data('file_name'),
			);
			$tab = "?t=s";
		}
		if ($post['status_cost'] != 1) {
			$form_data['status_cost'] = 1;
		}

		$where2['id_shipment'] = $post['id'];
		$this->shipment_mod->shipment_detail_update_process_db($form_data, $where2);

		$this->session->set_flashdata('success', 'Your Shipment data has been Updated!');
		redirect($_SERVER['HTTP_REFERER'] . $tab);
	}

	public function shipment_bill($id)
	{
		$where['id'] 						= $id;
		$shipment_list 					= $this->shipment_mod->shipment_list_db($where);
		$data['shipment_list'] 	= $shipment_list[0];

		unset($where);
		$where['id_shipment'] 	= $id;
		$shipment_invoice 			= $this->shipment_mod->shipment_invoice_list_db($where);
		if (count($shipment_invoice) > 0) {
			$data['invoice'] 				= $shipment_invoice[0];
		}

		unset($where);
		echo $id;
		$where['id_shipment'] 	= $id;
		$cost_list 							= $this->shipment_mod->shipment_cost_list_db($where);
		$main_agent 						= array();
		$secondary_agent				= array();
		$costumer								= array();
		foreach ($cost_list as $key => $value) {
			if ($value['category'] == "costumer") {
				$costumer[] = $value;
			}
		}
		$data['main_agent'] 			= $main_agent;
		$data['secondary_agent'] 	= $secondary_agent;
		$data['costumer'] 				= $costumer;

		$data['subview'] 				= 'shipment/shipment_bill';
		$data['meta_title'] 		= 'Shipment Bill';
		$this->load->view('index', $data);
	}

	public function shipment_bill_process()
	{
		$post = $this->input->post();
		// test_var($post);

		if ($post['id_invoice'] == "") {
			$where['name'] = $post['branch'];
			$branch = $this->home_mod->branch_list($where);
			unset($where);
			if (count($branch) < 1) {
				$this->session->set_flashdata('danger', 'Branch Not Found!');
				redirect($_SERVER['HTTP_REFERER']);
				return false;
			}
			$branch = $branch[0];

			$where['YEAR(create_date)'] = date("Y");
			$where["SUBSTRING_INDEX(SUBSTRING_INDEX(invoice_no,'-',1), '/', -1) = '" . $branch['code'] . "'"] = NULL;
			$invoice_no = $this->shipment_mod->shipment_generate_invoice_no_db($where);
			unset($where);
			$invoice_no = $invoice_no . "/" . $branch['code'] . "-FH" . "/" . date("Y");
			$form_data = array(
				'id_shipment' 		=> $post['id'],
				'invoice_no' 			=> $invoice_no,
				'invoice_date' 		=> $post['invoice_date'],
				'create_by' 			=> $this->session->userdata('id'),

				'payment_terms' 		=> $post['payment_terms'],
				'vat' 							=> $post['vat'],
				'discount' 					=> $post['discount'],
				'notes' 						=> $post['notes'],
				'beneficiary_name'	=> $post['beneficiary_name'],
				'acc_no'						=> $post['acc_no'],
				'bank_name'					=> $post['bank_name'],
			);
			$id_shipment = $this->shipment_mod->shipment_invoice_create_process_db($form_data);

			$form_data = array(
				'status_bill' 		=> 1,
			);
			$where['id_shipment'] = $post['id'];
			$this->shipment_mod->shipment_detail_update_process_db($form_data, $where);
		} else {
			$form_data = array(
				'invoice_no' 				=> $post['invoice_no'],
				'invoice_date' 			=> $post['invoice_date'],
				'payment_terms' 		=> $post['payment_terms'],
				'vat' 							=> $post['vat'],
				'discount' 					=> $post['discount'],
				'notes' 						=> $post['notes'],
				'beneficiary_name'	=> $post['beneficiary_name'],
				'acc_no'						=> $post['acc_no'],
				'bank_name'					=> $post['bank_name'],
			);
			$where['id'] = $post['id_invoice'];
			$this->shipment_mod->shipment_invoice_update_process_db($form_data, $where);

			unset($where);
			$form_data = array(
				'status_bill' 		=> $post['status_bill'],
				'date_paid' 			=> $post['date_paid'],
			);
			$where['id_shipment'] = $post['id'];
			$this->shipment_mod->shipment_detail_update_process_db($form_data, $where);
		}

		foreach ($post['unit_price'] as $key => $value) {
			if ($value != "" && $value != "0") {
				unset($where);
				if ($post['id_cost'][$key] == "") {
					$form_data = array(
						'id_shipment' 			=> $post['id'],
						'description' 			=> $post['description'][$key],
						'qty' 							=> $post['qty'][$key],
						'uom' 							=> $post['uom'][$key],
						'currency' 					=> $post['currency'][$key],
						'unit_price' 				=> $post['unit_price'][$key],
						'exchange_rate' 		=> $post['exchange_rate'][$key],
						'remarks' 					=> $post['remarks'][$key],
						'category' 					=> $post['category'],
					);
					$this->shipment_mod->shipment_cost_create_process_db($form_data);
				} else {
					$form_data = array(
						'description' 			=> $post['description'][$key],
						'qty' 							=> $post['qty'][$key],
						'uom' 							=> $post['uom'][$key],
						'currency' 					=> $post['currency'][$key],
						'unit_price' 				=> $post['unit_price'][$key],
						'exchange_rate' 		=> $post['exchange_rate'][$key],
						'remarks' 					=> $post['remarks'][$key],
					);
					$where['id'] = $post['id_cost'][$key];
					$this->shipment_mod->shipment_cost_update_process_db($form_data, $where);
				}
			}
		}

		$this->session->set_flashdata('success', 'Your Shipment data has been Updated!');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function shipment_invoice_update_process()
	{
		$post = $this->input->post();
		// test_var($post);
		$form_data = array(
			'payment_terms' 		=> $post['payment_terms'],
			'vat' 							=> $post['vat'],
			'discount' 					=> $post['discount'],
			'notes' 						=> $post['notes'],
			'beneficiary_name'	=> $post['beneficiary_name'],
			'acc_no'						=> $post['acc_no'],
			'bank_name'					=> $post['bank_name'],
		);
		$where['id'] = $post['id'];
		$this->shipment_mod->shipment_invoice_update_process_db($form_data, $where);

		$this->session->set_flashdata('success', 'Your Invoice data has been Updated!');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function shipment_invoice_pdf($id)
	{
		$where['shipment.id'] 		= $id;
		$shipment_list 						= $this->shipment_mod->shipment_list_db($where);
		$shipment 								= $shipment_list[0];
		$data['shipment'] 				= $shipment;

		unset($where);
		$where['id_shipment'] 	= $id;
		$shipment_invoice 			= $this->shipment_mod->shipment_invoice_list_db($where);
		$data['invoice'] 				= $shipment_invoice[0];

		unset($where);
		$where['id_shipment'] 	= $id;
		$cost_list 							= $this->shipment_mod->shipment_cost_list_db($where);
		$costumer								= array();
		foreach ($cost_list as $key => $value) {
			if ($value['category'] == "costumer") {
				$costumer[] = $value;
			}
		}
		$data['costumer'] 				= $costumer;

		unset($where);
		$where['name'] 		= $shipment['branch'];
		$branch_list 			= $this->home_mod->branch_list($where);
		$branch 					= $branch_list[0];
		// test_var($branch);
		$data['branch'] 	= $branch;

		$data['logo'] 	= base64_encode(file_get_contents("assets/img/logo-big-xpdc.png"));

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Invoice-" . $shipment['tracking_no'] . ".pdf";
		$this->pdf->load_view('shipment/shipment_invoice_pdf', $data);
	}

	public function shipment_delete_process($id)
	{
		$form_data = array(
			'status_delete'	=> 0,
		);
		$where['id'] = $id;
		$this->shipment_mod->shipment_update_process_db($form_data, $where);
		$this->session->set_flashdata('success', 'Your Shipment data has been Deleted!');
		redirect('shipment/shipment_list');
	}

	public function shipment_approve_process($id)
	{
		$form_data = array(
			'status'	=> 'Booked',
		);
		$where['id'] = $id;
		$this->shipment_mod->shipment_update_process_db($form_data, $where);
		$this->session->set_flashdata('success', 'Your Shipment data has been update to Booked!');
		redirect('shipment/shipment_list');
	}

	public function shipment_history_delete_db($id, $id_shipment)
	{
		$where['id'] = $id;
		$this->shipment_mod->shipment_history_delete($where, 'shipment_history');

		redirect("shipment/shipment_tracking/" . $id_shipment);
	}

	public function shipment_history_delete_process($id_shipment, $id)
	{
		$form_data = array(
			'status_delete'	=> 0,
		);
		$where['id'] 					= $id;
		$where['id_shipment'] = $id_shipment;
		$this->shipment_mod->shipment_history_update_process_db($form_data, $where);

		$this->shipment_update_last_history($id_shipment);
	}

	public function shipment_packages_delete_process($id)
	{
		$form_data = array(
			'status_delete'	=> 0,
		);
		$where['id'] = $id;
		$this->shipment_mod->shipment_packages_update_process_db($form_data, $where);
	}

	public function shipment_cost_delete_process($id)
	{
		$form_data = array(
			'status_delete'	=> 0,
		);
		$where['id'] = $id;
		$this->shipment_mod->shipment_cost_update_process_db($form_data, $where);
	}

	public function shipment_update_last_history($id)
	{
		$where['id_shipment'] 	= $id;
		$history_list 					= $this->shipment_mod->shipment_history_list_db($where);
		$history 								= $history_list[0];

		$form_data = array(
			'status' 			=> $history['status'],
		);
		unset($where);
		$where['id'] = $id;
		$this->shipment_mod->shipment_update_process_db($form_data, $where);
	}

	public function shipment_tracking($id)
	{
		$where['id'] 						= $id;
		$shipment_list 					= $this->shipment_mod->shipment_list_db($where);

		unset($where);
		// echo $id;
		$where['id_shipment'] 	= $id;
		$history_list 					= $this->shipment_mod->shipment_history_list_db($where);

		$data['shipment'] 			= $shipment_list[0];
		$data['history_list'] 	= $history_list;
		$data['subview'] 				= 'shipment/shipment_track';
		$data['meta_title'] 		= 'Shipment Track';
		$this->load->view('index', $data);
	}

	public function shipment_tracking_label_pdf($id)
	{
		$where['shipment.id'] 				= $id;
		$shipment_list 			= $this->shipment_mod->shipment_label_list_db($where);
		$data['shipment_list'] 	= $shipment_list;
		// $data['shipment'] 	= $shipment_list[0];
		unset($where);
		// $this->load->view('shipment/shipment_pdf', $data);
		$total_label = 0;
		foreach ($shipment_list as $key => $shipment) {
			$total_label = $total_label + $shipment['qty'];
		}
		$data['total_label'] 	= $total_label;

		$label_track = set_barcode($shipment['tracking_no']);
		$data['label_track'] 	= $label_track;
		$data['logo'] 	= base64_encode(file_get_contents("assets/img/logo-big-xpdc.png"));

		// $this->load->view('shipment/shipment_pdf', $data);

		$this->load->library('pdf');
		$this->pdf->setPaper('A6', 'potrait');
		$this->pdf->filename = "Label-" . $shipment['tracking_no'] . ".pdf";
		$this->pdf->load_view('shipment/shipment_pdf', $data);
	}

	public function shipment_awb_pdf($id)
	{
		$where['shipment.id'] 	= $id;
		$shipment_list 					= $this->shipment_mod->shipment_label_list_db($where);
		$data['shipment'] 			= $shipment_list[0];
		$data['packages_list'] 	= $shipment_list;

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "AWB-" . $data['shipment']['tracking_no'] . ".pdf";
		$this->pdf->load_view('shipment/shipment_awb_pdf', $data);
	}

	public function shipment_history_update()
	{
		$data['subview'] 				= 'shipment/shipment_history_update';
		$data['meta_title'] 		= 'Shipment History Update';
		$this->load->view('index', $data);
	}

	public function shipment_history_update_process()
	{
		$post = $this->input->post();
		$history_location = $post['city_history_location'] . ", " . $post['country_history_location'];
		$where['tracking_no'] 	= $post['tracking_no'];
		$shipment_list 					= $this->shipment_mod->shipment_list_db($where);
		if (count($shipment_list) == 0) {
			$where = [
				"master_tracking"  => $post['tracking_no'],
			];
			$shipment_list 					= $this->shipment_mod->shipment_list_db($where);
			if (count($shipment_list) == 0) {
				echo "Error : Tracking Number Not Found!";
				return false;
			}
		} elseif ($post['history_date'] > date("Y-m-d") || ($post['history_date'] == date("Y-m-d") && $post['history_time'] > date("H:i"))) {
			echo "Error : You cannot submit for a future date!<br>Current time : " . date("Y-m-d H:i");
			return false;
		}

		foreach ($shipment_list as $key => $value) {
			if($post['history_status'] == "Departed" && $value['main_agent_name'] == ""){
				echo "Error : You cannot depart shipment before fill up Shipping Information (".$value['tracking_no'].")";
				return false;
				exit;
			}
			elseif ($post['history_status'] == "Service Center" && $value['status'] == "Picked up" && $value['has_updated_packages'] != 1) {
				echo "Error : You need to edit shipment information / packages first to change status Service Center from Picked up (".$value['tracking_no'].")";
				return false;
				exit;
			}
			$form_data = array(
				'id_shipment' 	=> $value['id'],
				'date' 					=> $post['history_date'],
				'time' 					=> $post['history_time'],
				'location' 			=> $history_location,
				'status' 				=> $post['history_status'],
				'remarks' 			=> $post['history_remarks'],
			);
			$id_history = $this->shipment_mod->shipment_history_create_process_db($form_data);
			$this->shipment_update_last_history($value['id']);
		}

		$output = $form_data;
		$output['tracking_no'] = $post['tracking_no'];
		$output['id'] = $id_history;

		echo json_encode($output);
	}

	public function column_history_update_process(){
		$post = $this->input->post();
		$form_data = [
			$post['column'] => $post['text']
		];
		$where = [
			'id' => $post['id']
		];
		$this->shipment_mod->shipment_history_update_process_db($form_data, $where);

		if(in_array($post['column'], array('date', 'time'))){
			$this->shipment_update_last_history($post['id_shipment']);
		}
	}

	public function shipment_import()
	{
		$data['subview'] 				= 'shipment/shipment_import';
		$data['meta_title'] 		= 'Import Shipment';
		$this->load->view('index', $data);
	}

	public function shipment_import_preview()
	{
		$config['upload_path']          = 'file/shipment/';
		$config['file_name']            = 'excel_' . date('YmsHis');
		$config['allowed_types']        = 'xlsx';
		$config['overwrite'] 						= TRUE;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('file')) {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect("shipment/shipment_import");
			return false;
		}

		include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('file/shipment/' . $this->upload->data('file_name')); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

		$data['sheet']						= $sheet;
		$data['meta_title'] 			= 'Import Preview';
		$data['subview']    			= 'shipment/shipment_import_preview';
		$this->load->view('index', $data);
	}

	public function shipment_import_process()
	{
		$post = $this->input->post();
		$shipper_name = $post['shipper_name'];
		foreach ($shipper_name as $key => $value) {
			$tracking_no = $this->shipment_mod->shipment_generate_tracking_no_db();
			$tracking_no = "XPDC" . $tracking_no;
			$form_data = array(
				'tracking_no' 							=> $tracking_no,
				'shipper_name' 							=> $post['shipper_name'][$key],
				'shipper_address' 					=> $post['shipper_address'][$key],
				'shipper_city' 							=> $post['shipper_city'][$key],
				'shipper_country' 					=> $post['shipper_country'][$key],
				'shipper_postcode'					=> $post['shipper_postcode'][$key],
				'shipper_contact_person' 		=> $post['shipper_contact_person'][$key],
				'shipper_phone_number' 			=> $post['shipper_phone_number'][$key],
				'shipper_email' 						=> $post['shipper_email'][$key],
				'consignee_name' 						=> $post['consignee_name'][$key],
				'consignee_address' 				=> $post['consignee_address'][$key],
				'consignee_city' 						=> $post['consignee_city'][$key],
				'consignee_country' 				=> $post['consignee_country'][$key],
				'consignee_postcode' 				=> $post['consignee_postcode'][$key],
				'consignee_contact_person' 	=> $post['consignee_contact_person'][$key],
				'consignee_phone_number' 		=> $post['consignee_phone_number'][$key],
				'consignee_email' 					=> $post['consignee_email'][$key],
				'type_of_shipment' 					=> $post['type_of_shipment'][$key],
				'type_of_mode' 							=> $post['type_of_mode'][$key],
				'incoterms' 								=> $post['incoterms'][$key],
				'sea' 											=> $post['sea'][$key],
				'description_of_goods'			=> $post['description_of_goods'][$key],
				'hscode'										=> $post['hscode'][$key],
				'coo'												=> $post['coo'][$key],
				'declared_value'						=> $post['declared_value'][$key],
				'currency'									=> $post['currency'][$key],
				'ref_no'										=> $post['ref_no'][$key],
				'status'										=> "Booked",
				'status_delete'							=> 1,
				'created_by'								=> $this->session->userdata('id'),
			);
			$id_shipment = $this->shipment_mod->shipment_create_process_db($form_data);

			$form_data = array(
				'id_shipment' 												=> $id_shipment,
			);
			$this->shipment_mod->shipment_detail_create_process_db($form_data);

			$form_data = array(
				'id_shipment' 		=> $id_shipment,
				'date' 						=> date("Y-m-d"),
				'time' 						=> date("H:i:s"),
				'location' 				=> $post['shipper_city'][$key] . ", " . $post['shipper_country'][$key],
				'status' 					=> "Booked",
				'remarks' 				=> "",
			);
			$this->shipment_mod->shipment_history_create_process_db($form_data);
		}
		$this->session->set_flashdata('success', 'Your Shipment data has been Imported!');
		redirect('shipment/shipment_import');
	}

	public function laporan_pdf()
	{
		// $this->load->view('shipment/shipment_pdf');
		$data = array(
			"dataku" => array(
				"nama" => "Petani Kode",
				"url" => "http://petanikode.com"
			)
		);

		$this->load->library('pdf');
		$this->pdf->setPaper('A6', 'potrait');
		$this->pdf->filename = "laporan-petanikode.pdf";
		$this->pdf->load_view('shipment/shipment_pdf', $data);
	}

	public function shipment_link_share()
	{
		$data['subview'] 				= 'shipment/shipment_share_link';
		$data['meta_title'] 		= 'Share Link Shipment';
		$this->load->view('index', $data);
	}

	public function check_custumer(){
		$post = $this->input->post();
		$where = [
			"status_delete" => 1,
			"account_no" 		=> $post['account_no'],
		];
		$datadb 	= $this->home_mod->customer_list($where);
		if(count($datadb) > 0){
			$customer = $datadb[0];
			echo json_encode($customer);
		}
		else{
			echo "Error: Account Number ".$post['account_no']." Not Found!";
			exit;
		}
	}
}
