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
		if($post['id'] == ""){
			$this->session->set_flashdata('error', 'Please tick shipment first to assign driver!');
			redirect('shipment/shipment_list');
		}
		$driver_list = user_data(array($post['driver']));

		$where['shipment.id IN ('.$post['id'].')'] = NULL;
		$shipment_list 					= $this->shipment_mod->shipment_list_db($where);
		unset($where);
		if(count($shipment_list) > 0){
			$shipment = array();
			if($post['status'] == "pickup"){
				// foreach ($shipment_list as $key => $value) {
				// 	if($value['status'] != "Booking Confirmed"){
				// 		$shipment[] = $value['tracking_no'];
				// 	}
				// }
				// if(count(@$shipment) > 0){
				// 	$this->session->set_flashdata('error', 'All shipment below is not Booking Confirmed status!<br>'.join('<br>', $shipment));
				// 	redirect('shipment/shipment_list');
				// }
			}
			elseif($post['status'] == "deliver"){
				foreach ($shipment_list as $key => $value) {
					if($value['status'] != "Service Center"){
						$shipment[] = $value['tracking_no'];
					}
				}
				if(count(@$shipment) > 0){
					$this->session->set_flashdata('error', 'All shipment below is not Service Center status!<br>'.join('<br>', $shipment));
					redirect('shipment/shipment_list');
				}
			}
		}

		$form_data = array(
			'driver_'.$post['status'] 	=> $post['driver'],
			'status_driver_'.$post['status'] 	=> 1,
			'assign_driver_date' 	=> date("Y-m-d H:i:s"),
		);
		$where['id IN ('.$post['id'].')'] = NULL;
		$this->shipment_mod->shipment_update_process_db($form_data, $where);

		if($post['status'] == "deliver"){
			$date_now = date("Y-m-d");
			$time_now = date("H:i:s");
			foreach ($shipment_list as $key => $value) {
				$form_data = array(
					'id_shipment' 	=> $value['id'],
					'date' 					=> $date_now,
					'time' 					=> $time_now,
					'location' 			=> $value["consignee_city"].", ".$value["consignee_country"],
					'status' 				=> "With Courier",
					'remarks' 			=> "Delivery assigned to (".@$driver_list[$post['driver']]['name'].")",
				);
				$id_history = $this->shipment_mod->shipment_history_create_process_db($form_data);
				$this->shipment_update_last_history($post['id']);
			}
		}
		elseif($post['status'] == "pickup"){
			$date_now = date("Y-m-d");
			$time_now = date("H:i:s");
			foreach ($shipment_list as $key => $value) {
				$form_data = array(
					'id_shipment' 	=> $value['id'],
					'date' 					=> $date_now,
					'time' 					=> $time_now,
					'location' 			=> $value["shipper_city"].", ".$value["shipper_country"],
					'status' 				=> "Booking Confirmed",
					'remarks' 			=> "Pick up has been assigned to ".@$driver_list[$post['driver']]['name']." at ".$date_now." ".$time_now,
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
		$where['id_shipment'] 	= $id;
		$data['packages_list'] 	= $this->shipment_mod->shipment_packages_list_db($where);

		unset($where);
		$where['role'] 					= "Driver";
		$data['driver_list'] 		= user_data(array($data['shipment']['driver_pickup']));

		$data['subview'] 				= 'driver/driver_update';
		$data['meta_title'] 		= 'Driver Detail';
		$this->load->view('index', $data);
	}

	public function driver_update_process(){
		$post = $this->input->post();
		$upload_path = 'file/driver/';

		$config['upload_path']          = $upload_path;
		$config['file_name']            = 'img_'.$post['status'].'_'.$post['id'].'_'. date('YmsHis');
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		// $config['max_size']      				= 500;
		$config['overwrite'] 						= TRUE;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('file')) {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect("driver/driver_update/".$post['id']);
			return false;
		}

		$gbr = $this->upload->data();
		//Compress Image
		unset($config);
		$config['image_library']	= 'gd2';
		$config['source_image']		= $upload_path.$gbr['file_name'];
		// $config['create_thumb']		= FALSE;
		$config['maintain_ratio']	= TRUE;
		$config['quality']				= '50%';
		$config['width']					= 500;
		// $config['height']					= 400;
		$config['new_image']			= $upload_path.$gbr['file_name'];
		$this->load->library('image_lib', $config);
		if (!$this->image_lib->resize()) {
			$this->session->set_flashdata('error', $this->image_lib->display_errors());
			redirect("driver/driver_update/".$post['id']);
			return false;
		}

		$text_add_note = "";
		if($post['status'] == 'pickup'){
			$text_add_note = "Handovered by ";
		}
		elseif($post['status'] == 'deliver'){
			$text_add_note = "Received by ";
		}
		$form_data = array(
			'photo_driver_'.$post['status'] 	=> $this->upload->data('file_name'),
			'notes_driver_'.$post['status'] 	=> $text_add_note.$post['notes_driver_'.$post['status']],
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
			'remarks' 			=> $text_add_note.$post['notes_driver_'.$post['status']],
		);
		$id_history = $this->shipment_mod->shipment_history_create_process_db($form_data);
		$this->shipment_update_last_history($post['id']);

		$this->session->set_flashdata('success', 'Your Driver Detail has been Updated!');
		redirect("driver/driver_update/".$post['id']);
	}

	public function shipment_update_last_history($id){
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

	public function driver_take_out($id, $type){
		$form_data = array(
			'driver_'.$type 	=> 0,
			'status_driver_'.$type 	=> 0,
			'assign_driver_date' 	=> date("Y-m-d H:i:s"),
		);
		$where['id'] = $id;
		$this->shipment_mod->shipment_update_process_db($form_data, $where);

		$this->session->set_flashdata('success', 'Your Driver data has been Taken Out!');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function return_driver($type, $id_shipment){
		$form_data = array(
			'status_driver_'.$type 	=> 3,
		);
		$where['id'] = $id_shipment;
		$this->shipment_mod->shipment_update_process_db($form_data, $where);

		$where = ['shipment.id' => $id_shipment];
		$shipment = $this->shipment_mod->shipment_list_db($where);
		$shipment = $shipment[0];
		if($type == 'pickup'){
			$location = $shipment["pickup_city"].", ".$shipment["pickup_country"];
			$remarks = "Shipper is not available";
		}
		elseif($type == 'deliver'){
			$location = $shipment["consignee_city"].", ".$shipment["consignee_country"];
			$remarks = "Consignee is not available";
		}

		$form_data = array(
			'id_shipment' 	=> $id_shipment,
			'date' 					=> date("Y-m-d"),
			'time' 					=> date("H:i:s"),
			'location' 			=> $location,
			'status' 				=> "Returned",
			'remarks' 			=> $remarks,
		);
		$id_history = $this->shipment_mod->shipment_history_create_process_db($form_data);
		$this->shipment_update_last_history($id_shipment);

		$this->session->set_flashdata('success', 'Shipment is Returned!');
		redirect($_SERVER['HTTP_REFERER']);
	}
		
}
