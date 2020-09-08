<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shipment extends CI_Controller
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
	public function __construct()
	{
		parent::__construct();
		$this->load->model('shipment_mod');
	}

	public function index()
	{
		redirect("shipment/shipment_list");
	}

	public function shipment_list()
	{
		$data['shipment_list'] 	= $this->shipment_mod->shipment_list_db();
		$data['subview'] 				= 'shipment/shipment_list';
		$data['meta_title'] 		= 'Shipment List';
		$this->load->view('index', $data);
	}

	public function shipment_create()
	{
		$data['subview'] 			= 'shipment/shipment_create';
		$data['meta_title'] 	= 'Create Shipment';
		$this->load->view('index', $data);
	}

	public function shipment_create_process()
	{
		$post = $this->input->post();
		print_r($post);
		$tracking_no = $this->shipment_mod->shipment_generate_tracking_no_db();
		$tracking_no = "XPDC" . $tracking_no;
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
			'sea' 						=> $post['sea'],
			'description_of_goods'		=> $post['description_of_goods'],
			'hscode'					=> $post['hscode'],
			'coo'						=> $post['coo'],
			'declared_value'			=> $post['declared_value'],
			'currency'					=> $post['currency'],
			'ref_no'					=> $post['ref_no'],
			'status'					=> "Booked",
			'status_delete'				=> 1
		);
		$id_shipment = $this->shipment_mod->shipment_create_process_db($form_data);

		$form_data = array(
			'id_shipment' 							=> $id_shipment,
			'pickup_name' 							=> $post['pickup_name'],
			'pickup_address' 						=> $post['pickup_address'],
			'pickup_city' 							=> $post['pickup_city'],
			'pickup_country' 						=> $post['pickup_country'],
			'pickup_postcode'						=> $post['pickup_postcode'],
			'pickup_contact_person' 				=> $post['pickup_contact_person'],
			'pickup_phone_number' 					=> $post['pickup_phone_number'],
			'pickup_email' 							=> $post['pickup_email'],
			'pickup_date' 							=> $post['pickup_date'],
			'pickup_time' 							=> $post['pickup_time'],
			'pickup_notes' 							=> $post['pickup_notes'],
			'billing_account' 						=> $post['billing_account'],
			'billing_name' 							=> $post['billing_name'],
			'billing_address' 						=> $post['billing_address'],
			'billing_city' 							=> $post['billing_city'],
			'billing_country' 						=> $post['billing_country'],
			'billing_postcode' 						=> $post['billing_postcode'],
			'billing_contact_person' 				=> $post['billing_contact_person'],
			'billing_phone_number' 					=> $post['billing_phone_number'],
			'billing_email' 						=> $post['billing_email'],
			'main_agent_mawb_mbl'					=> $post['main_agent_mawb_mbl'],
			'main_agent_carrier'					=> $post['main_agent_carrier'],
			'main_agent_voyage_flight_no'			=> $post['main_agent_voyage_flight_no'],
			'secondary_agent_mawb_mbl'				=> $post['secondary_agent_mawb_mbl'],
			'secondary_agent_carrier'				=> $post['secondary_agent_carrier'],
			'secondary_agent_voyage_flight_no'		=> $post['secondary_agent_voyage_flight_no'],
			'port_of_loading'						=> $post['port_of_loading'],
			'port_of_discharge'						=> $post['port_of_discharge'],
			'container_no'							=> $post['container_no'],
			'seal_no'								=> $post['seal_no'],
			'cipl_no'								=> $post['cipl_no'],
			'permit_no'								=> $post['permit_no']
		);
		$this->shipment_mod->shipment_detail_create_process_db($form_data);

		$form_data = array(
			'id_shipment' 			=> $id_shipment,
			'date' 					=> date("Y-m-d"),
			'time' 					=> date("H:i:s"),
			'location' 				=> $post['shipper_country'],
			'status' 				=> "Booked",
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
		echo $id;
		$where['id_shipment'] 	= $id;
		$packages_list 					= $this->shipment_mod->shipment_packages_list_db($where);
		$history_list 					= $this->shipment_mod->shipment_history_list_db($where);

		if (count($shipment_list) <= 0) {
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
			'sea' 						=> $post['sea'],
			'description_of_goods'		=> $post['description_of_goods'],
			'hscode'					=> $post['hscode'],
			'coo'						=> $post['coo'],
			'declared_value'			=> $post['declared_value'],
			'currency'					=> $post['currency'],
			'ref_no'					=> $post['ref_no'],
		);
		$where['id'] = $post['id'];
		$this->shipment_mod->shipment_update_process_db($form_data, $where);

		$form_data = array(
			'pickup_name' 							=> $post['pickup_name'],
			'pickup_address' 						=> $post['pickup_address'],
			'pickup_city' 							=> $post['pickup_city'],
			'pickup_country' 						=> $post['pickup_country'],
			'pickup_postcode'						=> $post['pickup_postcode'],
			'pickup_contact_person' 				=> $post['pickup_contact_person'],
			'pickup_phone_number' 					=> $post['pickup_phone_number'],
			'pickup_email' 							=> $post['pickup_email'],
			'pickup_date' 							=> $post['pickup_date'],
			'pickup_time' 							=> $post['pickup_time'],
			'pickup_notes' 							=> $post['pickup_notes'],
			'billing_account' 						=> $post['billing_account'],
			'billing_name' 							=> $post['billing_name'],
			'billing_address' 						=> $post['billing_address'],
			'billing_city' 							=> $post['billing_city'],
			'billing_country' 						=> $post['billing_country'],
			'billing_postcode' 						=> $post['billing_postcode'],
			'billing_contact_person' 				=> $post['billing_contact_person'],
			'billing_phone_number' 					=> $post['billing_phone_number'],
			'billing_email' 						=> $post['billing_email'],
			'main_agent_mawb_mbl'					=> $post['main_agent_mawb_mbl'],
			'main_agent_carrier'					=> $post['main_agent_carrier'],
			'main_agent_voyage_flight_no'			=> $post['main_agent_voyage_flight_no'],
			'secondary_agent_mawb_mbl'				=> $post['secondary_agent_mawb_mbl'],
			'secondary_agent_carrier'				=> $post['secondary_agent_carrier'],
			'secondary_agent_voyage_flight_no'		=> $post['secondary_agent_voyage_flight_no'],
			'port_of_loading'						=> $post['port_of_loading'],
			'port_of_discharge'						=> $post['port_of_discharge'],
			'container_no'							=> $post['container_no'],
			'seal_no'								=> $post['seal_no'],
			'cipl_no'								=> $post['cipl_no'],
			'permit_no'								=> $post['permit_no']
		);
		$where2['id_shipment'] = $post['id'];
		$this->shipment_mod->shipment_detail_update_process_db($form_data, $where2);

		foreach ($post['description'] as $key => $value) {
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

		$this->session->set_flashdata('success', 'Your Shipment data has been Updated!');
		redirect('shipment/shipment_update/' . $post['id']);
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

	public function shipment_update_last_history($id)
	{
		$where['id_shipment'] 	= $id;
		$history_list 					= $this->shipment_mod->shipment_history_list_db($where);
		$history 								= $history_list[0];

		$form_data = array(
			// 'date' 				=> $history['date'],
			// 'time' 				=> $history['time'],
			// 'location' 		=> $history['location'],
			'status' 			=> $history['status'],
			// 'remarks' 		=> $history['remarks'],
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
		echo $id;
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
		$where['id'] 				= $id;
		$shipment_list 			= $this->shipment_mod->shipment_list_db($where);
		$data['shipment'] 	= $shipment_list[0];

    $this->load->library('pdf');
    $this->pdf->setPaper('A6', 'potrait');
    $this->pdf->filename = "Label-".$data['shipment']['tracking_no'].".pdf";
    $this->pdf->load_view('shipment/shipment_pdf', $data);
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

		$where['tracking_no'] 	= $post['tracking_no'];
		$shipment_list 					= $this->shipment_mod->shipment_list_db($where);
		$shipment_list 					= $shipment_list[0];

		$form_data = array(
			'id_shipment' 	=> $shipment_list['id'],
			'date' 					=> date("Y-m-d"),
			'time' 					=> date("H:i:s"),
			'location' 			=> $post['history_location'],
			'status' 				=> $post['history_status'],
			'remarks' 			=> $post['history_remarks'],
		);
		$this->shipment_mod->shipment_history_create_process_db($form_data);
		$this->shipment_update_last_history($shipment_list['id']);
		$this->session->set_flashdata('success', 'Your Shipment History data has been Created!');
		redirect('shipment/shipment_history_update');
	}

	public function shipment_import()
	{
		$data['subview'] 				= 'shipment/shipment_import';
		$data['meta_title'] 		= 'Import Shipment';
		$this->load->view('index', $data);
	}

	public function shipment_import_preview(){
		$config['upload_path']          = 'file/shipment/';
		$config['file_name']            = 'excel_'.date('YmsHis');
		$config['allowed_types']        = 'xlsx';
		$config['overwrite'] 						= TRUE;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('file')){
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect("shipment/shipment_import");
			return false;
		}

		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('file/shipment/'.$this->upload->data('file_name')); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

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
				'status_delete'							=> 1
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
				'location' 				=> $post['shipper_country'][$key],
				'status' 					=> "Booked",
				'remarks' 				=> "",
			);
			$this->shipment_mod->shipment_history_create_process_db($form_data);
		}
		$this->session->set_flashdata('success', 'Your Shipment data has been Imported!');
		redirect('shipment/shipment_import');
	}

	function barcode_generator($tracking_no)
	{
		$this->load->library('zend');
		$this->zend->load('Zend/Barcode');
		Zend_Barcode::render('CODE128', 'image', array('text'=>$tracking_no, 'drawText' => false), array());
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
}
