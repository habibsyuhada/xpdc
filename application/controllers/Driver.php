<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Driver extends CI_Controller
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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		cek_login();
		$this->load->model('home_mod');
		$this->load->model('shipment_mod');
	}

	public function index(){
		redirect("shipment/shipment_list");
	}

	public function assign_driver_process(){
		$post = $this->input->post();
		if(count($post['id']) < 1){
			$this->session->set_flashdata('error', 'Please tick shipment first to assign driver!');
			redirect('shipment/shipment_list');
		}

		$where['shipment.id IN ('.$post['id'].')'] = NULL;
		$shipment_list 					= $this->shipment_mod->shipment_list_db($where);
		unset($where);
		if(count($shipment_list) > 0){
			if($post['status'] == "pickup"){
				foreach ($shipment_list as $key => $value) {
					if($value['status'] != "Booking Confirmed"){
						$shipment[] = $value['tracking_no'];
					}
				}
				if(count(@$shipment) > 0){
					$this->session->set_flashdata('error', 'All shipment below is not Booking Confirmed status!<br>'.join('<br>', $shipment));
					redirect('shipment/shipment_list');
				}
			}
			elseif($post['status'] == "deliver"){
				foreach ($shipment_list as $key => $value) {
					if($value['status'] != "Clearance Complete"){
						$shipment[] = $value['tracking_no'];
					}
				}
				if(count(@$shipment) > 0){
					$this->session->set_flashdata('error', 'All shipment below is not Clearance Complete status!<br>'.join('<br>', $shipment));
					redirect('shipment/shipment_list');
				}
			}
		}

		$form_data = array(
			'driver_'.$post['status'] 	=> $post['driver'],
			'status_driver_'.$post['status'] 	=> 1,
		);
		$where['id IN ('.join(", ", $post['id']).')'] = NULL;
		$this->shipment_mod->shipment_update_process_db($form_data, $where);

		if($post['status'] == "pickup"){
			$date_now = date("Y-m-d");
			$time_now = date("H:i:s");
			foreach ($shipment_list as $key => $value) {
				$form_data = array(
					'id_shipment' 	=> $value['id'],
					'date' 					=> $date_now,
					'time' 					=> $time_now,
					'location' 			=> $value["consignee_city"].", ".$value["consignee_country"],
					'status' 				=> "With Courier",
					'remarks' 			=> "-",
				);
				$id_history = $this->shipment_mod->shipment_history_create_process_db($form_data);
				$this->shipment_update_last_history($post['id']);
			}
		}

		$this->session->set_flashdata('success', 'Your Shipment data has been Assigned!');
		redirect('shipment/shipment_list');
	}

	public function driver_update($id){
		$where['id'] 						= $id;
		$shipment_list 					= $this->shipment_mod->shipment_list_db($where);
		$data['shipment'] 			= $shipment_list[0];

		unset($where);
		$where['role'] 					= "Driver";
		$data['driver_list'] 		= user_data(array($data['shipment']['driver_pickup']));

		$data['subview'] 				= 'driver/driver_update';
		$data['meta_title'] 		= 'Driver Detail';
		$this->load->view('index', $data);
	}

	public function driver_update_process(){
		$post = $this->input->post();

		$config['upload_path']          = 'file/driver/';
		$config['file_name']            = 'img_'.$post['status'].'_'.$post['id'].'_'. date('YmsHis');
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['overwrite'] 						= TRUE;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('file')) {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect("driver/driver_update/".$post['id']);
			return false;
		}

		$form_data = array(
			'photo_driver_'.$post['status'] 	=> $this->upload->data('file_name'),
			'notes_driver_'.$post['status'] 	=> $post['notes_driver_'.$post['status']],
			'signature_driver_'.$post['status'] 	=> $post['signature_driver_'.$post['status']],
			'status_driver_'.$post['status'] 	=> 2,
		);
		$where['id'] = $post['id'];
		$this->shipment_mod->shipment_update_process_db($form_data, $where);

		$status_history = "";
		if($post['status'] == 'pickup'){
			$status_history = "Picked up";
		}
		elseif($post['status'] == 'deliver'){
			$status_history = "Delivered";
		}
		$form_data = array(
			'id_shipment' 	=> $post['id'],
			'date' 					=> date("Y-m-d"),
			'time' 					=> date("H:i:s"),
			'location' 			=> $post['location_driver_'.$post['status']],
			'status' 				=> $status_history,
			'remarks' 			=> $post['notes_driver_'.$post['status']],
		);
		$id_history = $this->shipment_mod->shipment_history_create_process_db($form_data);
		$this->shipment_update_last_history($post['id']);

		$this->session->set_flashdata('success', 'Your Driver Detail has been Updated!');
		redirect("driver/driver_update/".$post['id']);
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
		
}
