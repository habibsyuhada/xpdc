<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shipment extends CI_Controller {

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
		$this->load->model('shipment_mod');
		$this->load->helper('general');
	}

	public function index(){
		redirect("shipment/shipment_list");
	}
	
	public function shipment_list(){
		$data['shipment_list'] 	= $this->shipment_mod->shipment_list_db();
		$data['subview'] 				= 'shipment/shipment_list';
		$data['meta_title'] 		= 'Shipment List';
		$this->load->view('index', $data);
	}

	public function shipment_create(){
		$data['subview'] 			= 'shipment/shipment_create';
		$data['meta_title'] 	= 'Create Shipment';
		$this->load->view('index', $data);
	}

	public function shipment_create_process(){
		$post = $this->input->post();
		$tracking_no = $this->shipment_mod->shipment_generate_tracking_no_db();
		$tracking_no = "XPDC".$tracking_no;
		$form_data = array(
			'tracking_no' 					=> $tracking_no,
			'shipment_date' 				=> $post['shipment_date'],
			'type_of_shipment' 			=> $post['type_of_shipment'],
			'type_of_mode' 					=> $post['type_of_mode'],
			'incoterms' 						=> $post['incoterms'],
			'description_of_goods'	=> $post['description_of_goods'],
			'hs_code' 							=> $post['hs_code'],
			'shipment_value' 				=> $post['shipment_value'],
			'currency' 							=> $post['currency'],
			'quantity' 							=> $post['quantity'],
			'type_of_packages' 			=> $post['type_of_packages'],
			'actual_weight' 				=> $post['actual_weight'],
			'vol_weight' 						=> $post['vol_weight'],
			'ref_no' 								=> $post['ref_no'],
			'measurement' 					=> $post['measurement'],
			'main_agent' 						=> $post['main_agent'],
			'master_awb' 						=> $post['master_awb'],
			'secondary_agent' 			=> $post['secondary_agent'],
			'house_awb' 						=> $post['house_awb'],
			'pickup_details' 				=> $post['pickup_details'],
			'pickup_datetime' 			=> $post['pickup_datetime'],
			
			'shipper_name'					=> $post['shipper_name'],
			'shipper_address'				=> $post['shipper_address'],
			'shipper_city'					=> $post['shipper_city'],
			'shipper_country'				=> $post['shipper_country'],
			'shipper_postcode'			=> $post['shipper_postcode'],
			'shipper_pic'						=> $post['shipper_pic'],
			'shipper_phone_number'	=> $post['shipper_phone_number'],
			
			'receiver_name'					=> $post['receiver_name'],
			'receiver_address'			=> $post['receiver_address'],
			'receiver_city'					=> $post['receiver_city'],
			'receiver_country'			=> $post['receiver_country'],
			'receiver_postcode'			=> $post['receiver_postcode'],
			'receiver_pic'					=> $post['receiver_pic'],
			'receiver_phone_number'	=> $post['receiver_phone_number'],
		);
		$id_shipment = $this->shipment_mod->shipment_create_process_db($form_data);

		$form_data = array(
			'id_shipment' 			=> $id_shipment,
			'date' 							=> $post['history_date'],
			'time' 							=> $post['history_time'],
			'location' 					=> $post['history_location'],
			'status' 						=> $post['history_status'],
			'remarks' 					=> $post['history_remarks'],
		);
		$this->shipment_mod->shipment_history_create_process_db($form_data);

		foreach ($post['description'] as $key => $value) {
			$form_data = array(
				'id_shipment' 			=> $id_shipment,
				'qty' 							=> $post['qty'][$key],
				'piece_type' 				=> $post['piece_type'][$key],
				'description' 			=> $post['description'][$key],
				'length' 						=> $post['length'][$key],
				'width' 						=> $post['width'][$key],
				'height' 						=> $post['height'][$key],
				'weight' 						=> $post['weight'][$key],
				'value' 						=> $post['value'][$key],
			);
			$this->shipment_mod->shipment_packages_create_process_db($form_data);
		}
		
		$this->shipment_update_last_history($id_shipment);

		$this->session->set_flashdata('success', 'Your Shipment data has been Created!');
		redirect('shipment/shipment_list');
	}

	public function shipment_update($id){
		$where['id'] 						= $id;
		$shipment_list 					= $this->shipment_mod->shipment_list_db($where);

		unset($where);
		$where['id_shipment'] 	= $id;
		$packages_list 					= $this->shipment_mod->shipment_packages_list_db($where);
		$history_list 					= $this->shipment_mod->shipment_history_list_db($where);

		if(count($shipment_list) <= 0){
			$this->session->set_flashdata('error', 'Shipment not Found!');
			redirect("shipment/shipment_list");
		}

		$data['shipment'] 			= $shipment_list[0];
		$data['packages_list'] 	= $packages_list;
		$data['history_list'] 	= $history_list;
		$data['t'] 							= 'g';
		$data['subview'] 				= 'shipment/shipment_update';
		$data['meta_title'] 		= 'Shipment List';
		$this->load->view('index', $data);
	}

	public function shipment_update_process(){
		$post = $this->input->post();
		$form_data = array(
			'shipment_date' 				=> $post['shipment_date'],
			'type_of_shipment' 			=> $post['type_of_shipment'],
			'type_of_mode' 					=> $post['type_of_mode'],
			'incoterms' 						=> $post['incoterms'],
			'description_of_goods'	=> $post['description_of_goods'],
			'hs_code' 							=> $post['hs_code'],
			'shipment_value' 				=> $post['shipment_value'],
			'currency' 							=> $post['currency'],
			'quantity' 							=> $post['quantity'],
			'type_of_packages' 			=> $post['type_of_packages'],
			'actual_weight' 				=> $post['actual_weight'],
			'vol_weight' 						=> $post['vol_weight'],
			'ref_no' 								=> $post['ref_no'],
			'measurement' 					=> $post['measurement'],
			'main_agent' 						=> $post['main_agent'],
			'master_awb' 						=> $post['master_awb'],
			'secondary_agent' 			=> $post['secondary_agent'],
			'house_awb' 						=> $post['house_awb'],
			'pickup_details' 				=> $post['pickup_details'],
			'pickup_datetime' 			=> $post['pickup_datetime'],
			
			'shipper_name'					=> $post['shipper_name'],
			'shipper_address'				=> $post['shipper_address'],
			'shipper_city'					=> $post['shipper_city'],
			'shipper_country'				=> $post['shipper_country'],
			'shipper_postcode'			=> $post['shipper_postcode'],
			'shipper_pic'						=> $post['shipper_pic'],
			'shipper_phone_number'	=> $post['shipper_phone_number'],
			
			'receiver_name'					=> $post['receiver_name'],
			'receiver_address'			=> $post['receiver_address'],
			'receiver_city'					=> $post['receiver_city'],
			'receiver_country'			=> $post['receiver_country'],
			'receiver_postcode'			=> $post['receiver_postcode'],
			'receiver_pic'					=> $post['receiver_pic'],
			'receiver_phone_number'	=> $post['receiver_phone_number'],
		);
		$where['id'] = $post['id'];
		$this->shipment_mod->shipment_update_process_db($form_data, $where);

		foreach ($post['id_history'] as $key => $value) {
			$form_data = array(
				'date' 							=> $post['records_date'][$key],
				'time' 							=> $post['records_time'][$key],
				'location' 					=> $post['records_location'][$key],
				'status' 						=> $post['records_status'][$key],
				'remarks' 					=> $post['records_remarks'][$key],
			);
			$where['id'] = $post['id_history'][$key];
			$this->shipment_mod->shipment_history_update_process_db($form_data, $where);
		}

		if(!in_array("", array($post['history_date'], $post['history_time'], $post['history_location'], $post['history_status']))){
			// test_var(array($post['history_date'], $post['history_time'], $post['history_location'], $post['history_status']));
			$form_data = array(
				'id_shipment' 			=> $post['id'],
				'date' 							=> $post['history_date'],
				'time' 							=> $post['history_time'],
				'location' 					=> $post['history_location'],
				'status' 						=> $post['history_status'],
				'remarks' 					=> $post['history_remarks'],
			);
			$this->shipment_mod->shipment_history_create_process_db($form_data);
		}

		foreach ($post['description'] as $key => $value) {
			unset($where);
			if($post['id_detail'][$key] == ""){
				$form_data = array(
					'id_shipment' 			=> $post['id'],
					'qty' 							=> $post['qty'][$key],
					'piece_type' 				=> $post['piece_type'][$key],
					'description' 			=> $post['description'][$key],
					'length' 						=> $post['length'][$key],
					'width' 						=> $post['width'][$key],
					'height' 						=> $post['height'][$key],
					'weight' 						=> $post['weight'][$key],
					'value' 						=> $post['value'][$key],
				);
				$this->shipment_mod->shipment_packages_create_process_db($form_data);
			}
			else{
				$form_data = array(
					'qty' 							=> $post['qty'][$key],
					'piece_type' 				=> $post['piece_type'][$key],
					'description' 			=> $post['description'][$key],
					'length' 						=> $post['length'][$key],
					'width' 						=> $post['width'][$key],
					'height' 						=> $post['height'][$key],
					'weight' 						=> $post['weight'][$key],
					'value' 						=> $post['value'][$key],
				);
				$where['id'] = $post['id_detail'][$key];
				$this->shipment_mod->shipment_packages_update_process_db($form_data, $where);
			}
		}

		$this->shipment_update_last_history($post['id']);

		$this->session->set_flashdata('success', 'Your Shipment data has been Updated!');
		redirect('shipment/shipment_update/'.$post['id']);
	}

	public function shipment_delete_process($id){
		$form_data = array(
			'status_delete'	=> 0,
		);
		$where['id'] = $id;
		$this->shipment_mod->shipment_update_process_db($form_data, $where);
		$this->session->set_flashdata('success', 'Your Shipment data has been Deleted!');
		redirect('shipment/shipment_list');
	}

	public function shipment_history_delete_process($id_shipment, $id){
		$form_data = array(
			'status_delete'	=> 0,
		);
		$where['id'] 					= $id;
		$where['id_shipment'] = $id_shipment;
		$this->shipment_mod->shipment_history_update_process_db($form_data, $where);

		$this->shipment_update_last_history($id_shipment);
	}

	public function shipment_packages_delete_process($id){
		$form_data = array(
			'status_delete'	=> 0,
		);
		$where['id'] = $id;
		$this->shipment_mod->shipment_packages_update_process_db($form_data, $where);
	}

	public function shipment_update_last_history($id){
		$where['id_shipment'] 	= $id;
		$history_list 					= $this->shipment_mod->shipment_history_list_db($where);
		$history 								= $history_list[0];

		$form_data = array(
			'date' 				=> $history['date'],
			'time' 				=> $history['time'],
			'location' 		=> $history['location'],
			'status' 			=> $history['status'],
			'remarks' 		=> $history['remarks'],
		);
		unset($where);
		$where['id'] = $id;
		$this->shipment_mod->shipment_update_process_db($form_data, $where);
	}
}
