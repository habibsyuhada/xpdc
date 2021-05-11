<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quotation extends CI_Controller
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
	 * @see https://codeigniter.com/agent_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		cek_login();
		$this->load->model('home_mod');
		$this->load->model('quotation_mod');
		$this->load->model('shipment_mod');
	}

	public function index()
	{
		redirect("quotation/quotation_create");
	}

	public function quotation_list()
	{
		if ($this->session->userdata('role') == "Commercial") {
			$where['created_by'] = $this->session->userdata('id');
			$data['quotation_list'] = $this->quotation_mod->quotation_list_db($where);
		} elseif ($this->session->userdata('role') == "Finance") {
			$where['tracking_no !='] = "";
			$data['quotation_list'] = $this->quotation_mod->quotation_list_db($where);
		} else {
			$data['quotation_list'] = $this->quotation_mod->quotation_list_db();
		}

		$data['subview'] 			= 'quotation/quotation_list';
		$data['meta_title'] 	= 'Quotation List';
		$this->load->view('index', $data);
	}

	public function quotation_create()
	{
		$data['country'] = json_decode(file_get_contents("./assets/country/country.json"), true);
		$data['payment_terms_list'] = $this->home_mod->payment_terms_list();
		$data['uom_list'] = $this->home_mod->uom_list();
		if ($this->session->userdata('role') == "Super Admin") {
			$where = ["status_approval" => 1];
		} else {
			$where = ["status_approval" => 1, "assign_to" => $this->session->userdata('id')];
		}

		$term_condition = $this->quotation_mod->json_term_condition_list_db();
		$term = [];
		foreach ($term_condition as $row) {
			$term[$row['term_type']][] = $row['term_condition'];
		}
		$data['term_condition'] = json_encode($term, JSON_FORCE_OBJECT);

		$data['customer_list'] = $this->quotation_mod->customer_list_db($where);
		$data['package_type'] = $this->quotation_mod->package_type_list_db();
		$data['type_of_service'] = $this->quotation_mod->type_of_service_list_db();

		$data['subview'] 			= 'quotation/quotation_create';
		$data['meta_title'] 	= 'Create Quotation';
		$this->load->view('index', $data);
	}

	public function quotation_create_process()
	{
		$post = $this->input->post();

		$quotation_no = "";
		if (!isset($post['sea'])) {
			$post['sea'] = "";
		}

		$where = [
			'name' => $this->session->userdata('branch'),
		];
		$branch = $this->home_mod->branch_list($where);
		if (count($branch) < 1) {
			$this->session->set_flashdata('danger', 'Branch Not Found!');
			redirect($_SERVER['HTTP_REFERER']);
			return false;
		}
		$branch = $branch[0];

		$where = [
			'branch' 													=> $this->session->userdata('branch'),
			'type_of_service' 								=> $post['type_of_service'],
			"MONTH(date) = '" . date('n') . "'" 		=> NULL,
			"YEAR(date) = '" . date('Y') . "'" 	=> NULL,
		];
		$quotation_no = $this->quotation_mod->quotation_generate_no_db($where);
		$quotation_no = $quotation_no . "/" . $branch['code'] . "-" . $post['type_of_service'] . "/" . date('m') . "/" . date('Y');

		$term_condition = join("\n", $post['term_condition']);

		if (!isset($post['shipper_tba'])) {
			$post['shipper_tba'] = 0;
		}
		if (!isset($post['consignee_tba'])) {
			$post['consignee_tba'] = 0;
		}

		if (isset($post['type_of_shipment'])) {
			$type_of_shipment = $post['type_of_shipment'];
		} else {
			$type_of_shipment = '';
		}

		if (isset($post['incoterms'])) {
			$incoterms = $post['incoterms'];
		} else {
			$incoterms = '';
		}

		$form_data = array(
			'quotation_no' 							=> $quotation_no,
			'tracking_no' 							=> $post['tracking_no'],
			'customer_account' 					=> $post['customer_account'],
			'customer_name' 						=> $post['customer_name'],
			'customer_contact_person' 	=> $post['customer_contact_person'],
			'customer_phone_number' 		=> $post['customer_phone_number'],
			'customer_email' 						=> $post['customer_email'],
			'customer_address' 					=> $post['customer_address'],
			'date' 											=> $post['date'],
			'exp_date' 									=> $post['exp_date'],
			'payment_terms' 						=> $post['payment_terms'],
			'type_of_service' 					=> $post['type_of_service'],
			'type_of_shipment' 					=> $type_of_shipment,
			'type_of_transport' 				=> $post['type_of_mode'],
			'sea' 											=> $post['sea'],
			'incoterms' 								=> $incoterms,
			'description_of_goods' 			=> $post['description_of_goods'],
			'shipper_tba' 							=> $post['shipper_tba'],
			'shipper_name' 							=> $post['shipper_name'],
			'shipper_address' 					=> $post['shipper_address'],
			'shipper_city' 							=> $post['shipper_city'],
			'shipper_country' 					=> $post['shipper_country'],
			'shipper_postcode'					=> $post['shipper_postcode'],
			'shipper_contact_person' 		=> $post['shipper_contact_person'],
			'shipper_phone_number' 			=> $post['shipper_phone_number'],
			'shipper_email' 						=> $post['shipper_email'],
			'consignee_tba' 						=> $post['consignee_tba'],
			'consignee_name' 						=> $post['consignee_name'],
			'consignee_address' 				=> $post['consignee_address'],
			'consignee_city' 						=> $post['consignee_city'],
			'consignee_country' 				=> $post['consignee_country'],
			'consignee_postcode' 				=> $post['consignee_postcode'],
			'consignee_contact_person' 	=> $post['consignee_contact_person'],
			'consignee_phone_number' 		=> $post['consignee_phone_number'],
			'consignee_email' 					=> $post['consignee_email'],
			'term_condition' 						=> htmlentities($term_condition),
			'branch' 										=> $this->session->userdata('branch'),
			'created_by' 								=> $this->session->userdata('id'),
			'hide_estimete_total_pdf' 	=> $post['hide_estimete_total_pdf'],
		);
		$id_quotation = $this->quotation_mod->quotation_create_process_db($form_data);

		foreach ($post['cargo_qty'] as $key => $value) {
			$form_data = array(
				'id_quotation' 			=> $id_quotation,
				'qty' 							=> $post['cargo_qty'][$key],
				'piece_type' 				=> $post['cargo_piece_type'][$key],
				'length' 						=> $post['cargo_length'][$key],
				'width' 						=> $post['cargo_width'][$key],
				'height' 						=> $post['cargo_height'][$key],
				'size' 							=> $post['cargo_size'][$key],
				'container_no' 			=> $post['cargo_container_no'][$key],
				'seal_no' 					=> $post['cargo_seal_no'][$key],
				'weight' 						=> $post['cargo_weight'][$key],
			);
			$this->quotation_mod->quotation_cargo_create_process_db($form_data);
		}

		foreach ($post['charges_description'] as $key => $value) {
			$form_data = array(
				'id_quotation' 			=> $id_quotation,
				'description' 			=> $post['charges_description'][$key],
				'qty' 							=> $post['charges_qty'][$key],
				'uom' 							=> $post['charges_uom'][$key],
				'currency' 					=> $post['charges_currency'][$key],
				'unit_price' 				=> $post['charges_unit_price'][$key],
				'exchange_rate' 		=> $post['charges_exchange_rate'][$key],
				'remarks' 					=> $post['charges_remarks'][$key],
			);
			$this->quotation_mod->quotation_charges_create_process_db($form_data);
		}

		$this->session->set_flashdata('success', 'Your Quotation has been Created!');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function quotation_update($id)
	{
		$where['id'] 						= $id;
		$quotation_list 				= $this->quotation_mod->quotation_list_db($where);

		unset($where);
		$where['id_quotation'] 	= $id;
		$cargo_list 						= $this->quotation_mod->quotation_cargo_list_db($where);
		$where['id_quotation'] 	= $id;
		$charges_list 					= $this->quotation_mod->quotation_charges_list_db($where);
		if ($this->session->userdata('role') == "Super Admin") {
			$where = ["status_approval" => 1];
		} else {
			$where = ["status_approval" => 1, "assign_to" => $this->session->userdata('id')];
		}
		$data['customer_list'] = $this->quotation_mod->customer_list_db($where);

		if (count($quotation_list) <= 0) {
			$this->session->set_flashdata('error', 'Quotation not Found!');
			redirect("quotation/quotation_list");
		}

		unset($where);
		$where["id"] 	= $quotation_list[0]['created_by'];
		$user_list 		= $this->home_mod->user_list($where);
		$user_list  	= $user_list[0]['name'];

		$data['user_list'] = $user_list;

		$data['country'] = json_decode(file_get_contents("./assets/country/country.json"), true);

		$data['payment_terms_list'] = $this->home_mod->payment_terms_list();
		$data['uom_list'] = $this->home_mod->uom_list();

		$data['quotation'] 			= $quotation_list[0];
		$data['cargo_list'] 		= $cargo_list;
		$data['charges_list'] 	= $charges_list;
		$data['package_type'] = $this->quotation_mod->package_type_list_db();
		$data['type_of_service'] = $this->quotation_mod->type_of_service_list_db();

		$delivery = $this->quotation_mod->type_of_service_list_db(['tos_code' => $quotation_list[0]['type_of_service']]);
		$data['delivery'] = $delivery[0]['is_delivery'];

		$data['subview'] 			= 'quotation/quotation_update';
		$data['meta_title'] 	= 'Quotation Detail Update';
		$this->load->view('index', $data);
	}

	public function quotation_view($id)
	{
		$where['id'] 						= $id;
		$quotation_list 				= $this->quotation_mod->quotation_list_db($where);

		unset($where);
		$where['id_quotation'] 	= $id;
		$cargo_list 						= $this->quotation_mod->quotation_cargo_list_db($where);
		$where['id_quotation'] 	= $id;
		$charges_list 					= $this->quotation_mod->quotation_charges_list_db($where);
		$data['customer_list'] = $this->quotation_mod->customer_list_db();

		if (count($quotation_list) <= 0) {
			$this->session->set_flashdata('error', 'Quotation not Found!');
			redirect("quotation/quotation_list");
		}

		unset($where);
		$where["id"] 	= $quotation_list[0]['created_by'];
		$user_list 		= $this->home_mod->user_list($where);
		$user_list  	= $user_list[0]['name'];

		$data['user_list'] = $user_list;

		$data['country'] = json_decode(file_get_contents("./assets/country/country.json"), true);

		$data['payment_terms_list'] = $this->home_mod->payment_terms_list();
		$data['uom_list'] = $this->home_mod->uom_list();

		$data['quotation'] 			= $quotation_list[0];
		$data['cargo_list'] 		= $cargo_list;
		$data['charges_list'] 	= $charges_list;

		$data['subview'] 			= 'quotation/quotation_view';
		$data['meta_title'] 	= 'Quotation Detail View';
		$this->load->view('index', $data);
	}

	public function quotation_update_process()
	{
		$post = $this->input->post();
		$term_condition = join("\n", $post['term_condition']);

		if (!isset($post['shipper_tba'])) {
			$post['shipper_tba'] = 0;
		}
		if (!isset($post['consignee_tba'])) {
			$post['consignee_tba'] = 0;
		}

		if (isset($post['type_of_shipment'])) {
			$type_of_shipment = $post['type_of_shipment'];
		} else {
			$type_of_shipment = '';
		}

		if (isset($post['incoterms'])) {
			$incoterms = $post['incoterms'];
		} else {
			$incoterms = '';
		}

		$form_data = array(
			'tracking_no' 							=> $post['tracking_no'],
			'customer_account' 					=> $post['customer_account'],
			'customer_name' 						=> $post['customer_name'],
			'customer_contact_person' 	=> $post['customer_contact_person'],
			'customer_phone_number' 		=> $post['customer_phone_number'],
			'customer_email' 						=> $post['customer_email'],
			'customer_address' 					=> $post['customer_address'],
			// 'date' 											=> $post['date'],
			'exp_date' 									=> $post['exp_date'],
			'payment_terms' 						=> $post['payment_terms'],
			'type_of_service' 					=> $post['type_of_service'],
			'type_of_transport' 				=> $post['type_of_transport'],
			'type_of_shipment' 					=> $type_of_shipment,
			'sea' 											=> $post['sea'],
			'incoterms' 								=> $incoterms,
			'description_of_goods' 			=> $post['description_of_goods'],
			'shipper_tba' 							=> $post['shipper_tba'],
			'shipper_name' 							=> $post['shipper_name'],
			'shipper_address' 					=> $post['shipper_address'],
			'shipper_city' 							=> $post['shipper_city'],
			'shipper_country' 					=> $post['shipper_country'],
			'shipper_postcode'					=> $post['shipper_postcode'],
			'shipper_contact_person' 		=> $post['shipper_contact_person'],
			'shipper_phone_number' 			=> $post['shipper_phone_number'],
			'shipper_email' 						=> $post['shipper_email'],
			'consignee_tba' 						=> $post['consignee_tba'],
			'consignee_name' 						=> $post['consignee_name'],
			'consignee_address' 				=> $post['consignee_address'],
			'consignee_city' 						=> $post['consignee_city'],
			'consignee_country' 				=> $post['consignee_country'],
			'consignee_postcode' 				=> $post['consignee_postcode'],
			'consignee_contact_person' 	=> $post['consignee_contact_person'],
			'consignee_phone_number' 		=> $post['consignee_phone_number'],
			'consignee_email' 					=> $post['consignee_email'],
			'status' 										=> 0,
			'term_condition' 						=> htmlentities($term_condition),
			'hide_estimete_total_pdf' 	=> $post['hide_estimete_total_pdf'],
		);
		$where['id'] = $post['id'];
		$this->quotation_mod->quotation_update_process_db($form_data, $where);
		unset($where);

		$cargo_temp = explode("|", $post['temp_cargo_id']);
		foreach ($cargo_temp as $cargo) {
			if (!in_array($cargo, $post['id_cargo'])) {
				$where['id'] = $cargo;
				$this->quotation_mod->quotation_cargo_delete_process_db($where);
			}
		}
		unset($where);

		$charges_temp = explode("|", $post['temp_charges_id']);
		foreach ($charges_temp as $charges) {
			if (!in_array($charges, $post['id_charges'])) {
				echo $charges;
				$where['id'] = $charges;
				$this->quotation_mod->quotation_charges_delete_process_db($where);
			}
		}

		foreach ($post['id_cargo'] as $key => $value) {
			unset($where);
			if ($post['id_cargo'][$key] == "") {
				$form_data = array(
					'id_quotation' 			=> $post['id'],
					'qty' 							=> $post['cargo_qty'][$key],
					'piece_type' 				=> $post['cargo_piece_type'][$key],
					'length' 						=> $post['cargo_length'][$key],
					'width' 						=> $post['cargo_width'][$key],
					'height' 						=> $post['cargo_height'][$key],
					'size' 							=> $post['cargo_size'][$key],
					'container_no' 			=> $post['cargo_container_no'][$key],
					'seal_no' 					=> $post['cargo_seal_no'][$key],
					'weight' 						=> $post['cargo_weight'][$key],
				);
				$this->quotation_mod->quotation_cargo_create_process_db($form_data);
			} else {
				$form_data = array(
					'qty' 							=> $post['cargo_qty'][$key],
					'piece_type' 				=> $post['cargo_piece_type'][$key],
					'length' 						=> $post['cargo_length'][$key],
					'width' 						=> $post['cargo_width'][$key],
					'height' 						=> $post['cargo_height'][$key],
					'size' 							=> $post['cargo_size'][$key],
					'container_no' 			=> $post['cargo_container_no'][$key],
					'seal_no' 					=> $post['cargo_seal_no'][$key],
					'weight' 						=> $post['cargo_weight'][$key],
				);
				$where['id'] = $post['id_cargo'][$key];
				$this->quotation_mod->quotation_cargo_update_process_db($form_data, $where);
			}
		}

		foreach ($post['id_charges'] as $key => $value) {
			unset($where);
			if ($post['id_charges'][$key] == "") {
				$form_data = array(
					'id_quotation' 			=> $post['id'],
					'description' 			=> $post['charges_description'][$key],
					'qty' 							=> $post['charges_qty'][$key],
					'uom' 							=> $post['charges_uom'][$key],
					'currency' 					=> $post['charges_currency'][$key],
					'unit_price' 				=> $post['charges_unit_price'][$key],
					'exchange_rate' 		=> $post['charges_exchange_rate'][$key],
					'remarks' 					=> $post['charges_remarks'][$key],
				);
				$this->quotation_mod->quotation_charges_create_process_db($form_data);
			} else {
				$form_data = array(
					'description' 			=> $post['charges_description'][$key],
					'qty' 							=> $post['charges_qty'][$key],
					'uom' 							=> $post['charges_uom'][$key],
					'currency' 					=> $post['charges_currency'][$key],
					'unit_price' 				=> $post['charges_unit_price'][$key],
					'exchange_rate' 		=> $post['charges_exchange_rate'][$key],
					'remarks' 					=> $post['charges_remarks'][$key],
				);
				$where['id'] = $post['id_charges'][$key];
				$this->quotation_mod->quotation_charges_update_process_db($form_data, $where);
			}
		}

		$this->session->set_flashdata('success', 'Your Quotation data has been Updated!');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function quotation_delete_process($id)
	{
		$where['id'] = $id;
		$this->quotation_mod->quotation_delete_process_db($where);

		$this->session->set_flashdata('success', 'Your Quotation data has been Deleted!');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function quotation_cargo_delete_process($id)
	{
		$where['id'] = $id;
		$this->quotation_mod->quotation_cargo_delete_process_db($where);
	}

	public function quotation_charges_delete_process($id)
	{
		$where['id'] = $id;
		$this->quotation_mod->quotation_charges_delete_process_db($where);
	}

	public function quotation_approval_process($id, $action)
	{
		$form_data = array(
			'status' 					=> $action,
		);

		if (isset($_POST['remarks'])) {
			$form_data['remarks'] = $_POST['remarks'];
		}

		$where['id'] = $id;
		$this->quotation_mod->quotation_update_process_db($form_data, $where);

		if ($action == "1") {
			$text = "Approved";
		} else {
			$text = "Rejected";
		}
		$this->session->set_flashdata('success', 'Your Quotation data has been ' . $text . '!');
		redirect("quotation/quotation_list");
	}

	public function shipment_create($id)
	{
		$data['subview'] 			= 'shipment/shipment_create';
		$data['meta_title'] 	= 'Create Shipment';

		$where['id'] 						= $id;
		$quotation_list 				= $this->quotation_mod->quotation_list_db($where);
		if (count($quotation_list) <= 0) {
			$this->session->set_flashdata('error', 'Quotation not Found!');
			redirect("quotation/quotation_list");
		}
		$data['quotation'] 			= $quotation_list[0];
		$data['id_quotation'] 	= $id;
		$datadb 	= $this->home_mod->branch_list(["name" => $data['quotation']['branch']]);
		$data["branch"] = $datadb[0];

		unset($where);
		$where['id_quotation'] 	= $id;
		$cargo_list 						= $this->quotation_mod->quotation_cargo_list_db($where);
		$data['cargo_list'] 		= $cargo_list;

		$data['country'] = $this->shipment_mod->country_list_db();
		$data['customer'] = $this->shipment_mod->customer_list_db();
		$data['package_type'] = $this->shipment_mod->package_type_list_db();
		$this->load->view('index', $data);
	}

	public function quotation_pdf($id)
	{
		$where['id'] 						= $id;
		$quotation_list 				= $this->quotation_mod->quotation_list_db($where);

		if (count($quotation_list) <= 0) {
			$this->session->set_flashdata('error', 'Quotation not Found!');
			redirect("quotation/quotation_list");
		}

		unset($where);
		$where['id_quotation'] 	= $id;
		$cargo_list 						= $this->quotation_mod->quotation_cargo_list_db($where);
		$where['id_quotation'] 	= $id;
		$charges_list 					= $this->quotation_mod->quotation_charges_list_db($where);
		$type_of_service = $this->quotation_mod->type_of_service_list_db(['tos_code' => $quotation_list[0]['type_of_service']]);
		$data['type_of_service'] = $type_of_service[0]['tos_name'];
		$data['isdelivery'] = $type_of_service[0]['is_delivery'];

		unset($where);
		$where["id"] 	= $quotation_list[0]['created_by'];
		$user_list 		= $this->home_mod->user_list($where);
		$user_list  	= $user_list[0]['name'];

		$data['quotation'] 			= $quotation_list[0];
		$data['cargo_list'] 		= $cargo_list;
		$data['charges_list'] 	= $charges_list;
		$data['user_list'] 			= $user_list;

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Quotation-" . date('Y-m-d H:i:s') . ".pdf";
		$this->pdf->load_view('quotation/quotation_pdf', $data);
	}

	public function quotation_reject($id, $action)
	{
		$where['id'] 						= $id;
		$quotation_list 				= $this->quotation_mod->quotation_list_db($where);

		if (count($quotation_list) <= 0) {
			$this->session->set_flashdata('error', 'Quotation not Found!');
			redirect("quotation/quotation_list");
		}

		$data['quotation'] = $quotation_list[0];

		$data['subview'] 			= 'quotation/quotation_reject';
		$data['meta_title'] 	= 'Quotation Reject';
		$this->load->view('index', $data);
	}

	public function quotation_approval($id, $action)
	{
		$where['id'] 						= $id;
		$quotation_list 				= $this->quotation_mod->quotation_list_db($where);

		if (count($quotation_list) <= 0) {
			$this->session->set_flashdata('error', 'Quotation not Found!');
			redirect("quotation/quotation_list");
		}

		$data['quotation'] = $quotation_list[0];
		$data['action'] = $action;

		$data['subview'] 			= 'quotation/quotation_reject';
		$data['meta_title'] 	= 'Quotation Reject';
		$this->load->view('index', $data);
	}

	public function term_condition()
	{
		$data['list']     = $this->quotation_mod->term_condition_list_db();

		$data['subview']            = 'quotation/term_condition';
		$data['meta_title']         = 'Term & Condition List';
		$this->load->view('index', $data);
	}

	public function term_condition_update($id)
	{
		$where['a.id'] = $id;
		$list     = $this->quotation_mod->term_condition_list_db($where);
		$data['list'] = $list[0];

		$detail = $this->quotation_mod->term_condition_detail_list_db(['id_term' => $id]);
		if (isset($detail[0])) {
			$data['detail'] = $detail;
		} else {
			$data['detail'] = [];
		}

		$data['subview']            = 'quotation/term_condition_update';
		$data['meta_title']         = 'Term & Condition Update';
		$this->load->view('index', $data);
	}

	public function term_condition_update_process($id)
	{
		$post = $this->input->post();
		$where['id_term'] = $id;

		$this->quotation_mod->term_condition_detail_delete_process_db($where);
		foreach ($post['term_condition'] as $key => $value) {
			$form_data = array(
				'id_term'  => $id,
				'term_condition'  => $value,
			);
			$id_uom = $this->quotation_mod->term_condition_detail_create_process_db($form_data);
		}

		$this->session->set_flashdata('success', 'Your Term Condition data has been Updated!');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function type_of_service_list()
	{
		$data['type_of_service_list']     = $this->quotation_mod->type_of_service_list_db();

		$data['subview']                 = 'quotation/type_of_service_list';
		$data['meta_title']         = 'Type of Service List';
		$this->load->view('index', $data);
	}

	public function type_of_service_create()
	{
		$data['subview']                 = 'quotation/type_of_service_create';
		$data['meta_title']         = 'Type of Service Create';
		$this->load->view('index', $data);
	}

	public function type_of_service_create_process()
	{
		$post = $this->input->post();

		$where["tos_code = '" . $post['tos_code'] . "'"]         = NULL;
		$type_of_service_list             = $this->quotation_mod->type_of_service_list_db($where);
		if (count($type_of_service_list) > 0) {
			$this->session->set_flashdata('error', 'Duplicate Type of Service!');
			redirect($_SERVER['HTTP_REFERER']);
		}

		$form_data = array(
			'tos_code'               => $post['tos_code'],
			'tos_name'               => $post['tos_name'],
			'is_delivery'               => $post['is_delivery'],
			'created_by'         => $this->session->userdata('id')
		);
		$id_tos = $this->quotation_mod->type_of_service_create_process_db($form_data);

		$this->session->set_flashdata('success', 'Your Type of Service data has been Created!');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function type_of_service_update($id)
	{
		$where['id']                 = $id;
		$type_of_service_list        = $this->quotation_mod->type_of_service_list_db($where);
		if (count($type_of_service_list) < 1) {
			redirect($_SERVER['HTTP_REFERER']);
		}
		$data['type_of_service_list']     = $type_of_service_list[0];

		$data['subview']                 = 'quotation/type_of_service_update';
		$data['meta_title']         = 'Type of Service Update';
		$this->load->view('index', $data);
	}

	public function type_of_service_update_process($id)
	{
		$post = $this->input->post();

		$form_data = array(
			'tos_code'               => $post['tos_code'],
			'tos_name'               => $post['tos_name'],
			'is_delivery'               => $post['is_delivery'],
		);
		$where['id'] = $id;
		$id_tos = $this->quotation_mod->type_of_service_update_process_db($form_data, $where);

		$this->session->set_flashdata('success', 'Your Type of Service data has been Updated!');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function type_of_service_delete_process($id)
	{
		$where['id'] = $id;
		$this->quotation_mod->type_of_service_delete_process_db($where);

		$this->session->set_flashdata('success', 'Your Type of Service data has been Deleted!');
		redirect($_SERVER['HTTP_REFERER']);
	}
}
