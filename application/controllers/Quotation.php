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
	public function __construct(){
		parent::__construct();
		cek_login();
		$this->load->model('home_mod');
		$this->load->model('quotation_mod');
	}

	public function index(){
		redirect("quotation/quotation_create");
	}

	public function quotation_list(){
	    if($this->session->userdata('role') == "Commercial"){
	        $where['created_by'] = $this->session->userdata('id');
	        $data['quotation_list'] = $this->quotation_mod->quotation_list_db($where);
	    }else{
	        $data['quotation_list'] = $this->quotation_mod->quotation_list_db();   
		}

		$data['subview'] 			= 'quotation/quotation_list';
		$data['meta_title'] 	= 'Quotation List';
		$this->load->view('index', $data);
	}

	public function quotation_create(){
		$data['country'] = json_decode(file_get_contents("./assets/country/country.json"), true);
		$data['payment_terms_list'] = $this->home_mod->payment_terms_list();
		$data['customer_list'] = $this->quotation_mod->customer_list_db();

		$data['subview'] 			= 'quotation/quotation_create';
		$data['meta_title'] 	= 'Create Quotation';
		$this->load->view('index', $data);
	}

	public function quotation_create_process(){
		$post = $this->input->post();

		$quotation_no = "";
		if(!isset($post['sea'])){
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
			"MONTH(date) = '".date('n')."'" 		=> NULL,
			"YEAR(date) = '".date('Y')."'" 	=> NULL,
		];
		$quotation_no = $this->quotation_mod->quotation_generate_no_db($where);
		$quotation_no = $quotation_no."/".$branch['code']."-".$post['type_of_service']."/".date('m')."/".date('Y');
		
		$term_condition = join("\n", $post['term_condition']);

		$form_data = array(
			'quotation_no' 							=> $quotation_no,
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
			'type_of_shipment' 					=> $post['type_of_shipment'],
			'type_of_transport' 				=> $post['type_of_mode'],
			'sea' 											=> $post['sea'],
			'incoterms' 								=> $post['incoterms'],
			'description_of_goods' 			=> $post['description_of_goods'],
			'shipper_name' 							=> $post['shipper_name'],
			'shipper_address' 					=> $post['shipper_address'],
			'shipper_city' 							=> $post['shipper_city'],
			'shipper_country' 					=> $post['shipper_country'],
			'shipper_postcode'					=> $post['shipper_postcode'],
			'shipper_contact_person' 		=> $post['shipper_contact_person'],
			'shipper_phone_number' 			=> $post['shipper_phone_number'],
			'shipper_email' 						=> $post['shipper_email'],
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

	public function quotation_update($id){
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

		$data['quotation'] 			= $quotation_list[0];
		$data['cargo_list'] 		= $cargo_list;
		$data['charges_list'] 	= $charges_list;

		$data['subview'] 			= 'quotation/quotation_update';
		$data['meta_title'] 	= 'Quotation Detail Update';
		$this->load->view('index', $data);
	}

	public function quotation_update_process()
	{
		$post = $this->input->post();
		$term_condition = join("\n", $post['term_condition']);
		$form_data = array(
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
			'type_of_shipment' 					=> $post['type_of_shipment'],
			'sea' 											=> $post['sea'],
			'incoterms' 								=> $post['incoterms'],
			'description_of_goods' 			=> $post['description_of_goods'],
			'shipper_name' 							=> $post['shipper_name'],
			'shipper_address' 					=> $post['shipper_address'],
			'shipper_city' 							=> $post['shipper_city'],
			'shipper_country' 					=> $post['shipper_country'],
			'shipper_postcode'					=> $post['shipper_postcode'],
			'shipper_contact_person' 		=> $post['shipper_contact_person'],
			'shipper_phone_number' 			=> $post['shipper_phone_number'],
			'shipper_email' 						=> $post['shipper_email'],
			'consignee_name' 						=> $post['consignee_name'],
			'consignee_address' 				=> $post['consignee_address'],
			'consignee_city' 						=> $post['consignee_city'],
			'consignee_country' 				=> $post['consignee_country'],
			'consignee_postcode' 				=> $post['consignee_postcode'],
			'consignee_contact_person' 	=> $post['consignee_contact_person'],
			'consignee_phone_number' 		=> $post['consignee_phone_number'],
			'consignee_email' 					=> $post['consignee_email'],
			'term_condition' 						=> htmlentities($term_condition),
		);
		$where['id'] = $post['id'];
		$this->quotation_mod->quotation_update_process_db($form_data, $where);

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

	public function quotation_pdf($id){
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
	
	
		
}
