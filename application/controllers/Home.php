<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
		$this->load->model('user_mod');
		$this->load->model('home_mod');
		$this->load->model('shipment_mod');
		$this->load->model('commercial_mod');
		$this->load->model('quotation_mod');
		if ($this->session->userdata('id') == "Guest") {
			$this->session->unset_userdata('id');
			session_destroy();
		}
	}

	public function index()
	{
		$data = array();
		if ($this->input->get('tracking_no')) {
			$tracking_no = $this->input->get('tracking_no');
			$where['tracking_no'] 	= $tracking_no;
			$shipment_list 					= $this->shipment_mod->shipment_list_db($where);
			if (count($shipment_list) > 0) {
				unset($where);
				$where['id_shipment'] 	= $shipment_list[0]['id'];
				$history_list 					= $this->shipment_mod->shipment_history_list_db($where);
				$data['shipment'] 			= $shipment_list[0];
				$data['history_list'] 	= $history_list;
			}

			$data['tracking_no'] 		= $tracking_no;
		}
		$data['branch'] = $this->shipment_mod->branch_list_db(array("name != 'NONE'" => null));

		$this->load->view('home/landing_page', $data);
	}

	public function notification()
	{
		$data['history'] = $this->shipment_mod->shipment_result_history_list_db();
		$this->load->view("_partial/notification", $data);
	}

	public function tracking_xpdc($id)
	{
		$where['id'] 						= $id;
		$shipment_list 					= $this->shipment_mod->shipment_list_db($where);

		unset($where);
		echo $id;
		$where['id_shipment'] 	= $id;
		$history_list 					= $this->shipment_mod->shipment_history_list_db($where);

		$data['shipment'] 			= $shipment_list[0];
		$data['history_list'] 	= $history_list;
		$this->load->view('home/landing_page', $data);
	}

	public function home()
	{
		if (!$this->session->userdata('id')) {
			redirect('home/login');
		}
		if ($this->session->userdata('role') == "Commercial") {
			redirect('home/home_commercial');
		}
		if ($this->session->userdata('role') == "Customer") {
			redirect('home/home_customer');
		}

		$where['shipment.status_delete'] 	= 1;
		if ($this->session->userdata('branch')) {
			if ($this->session->userdata('branch') != "NONE") {
				if ($this->session->userdata('role') == 'Operator') {
					$where["((assign_branch LIKE '%" . $this->session->userdata('branch') . "%' AND assign_branch IS NOT NULL) OR (assign_branch IS NULL AND branch LIKE '%" . $this->session->userdata('branch') . "%'))"] 	= NULL;
				} else if ($this->session->userdata('role') == 'Driver') {
				} else {
					$customer = $this->shipment_mod->customer_list_db(["customer_id IN(SELECT id FROM user WHERE role = 'Customer' AND branch = '" . $this->session->userdata('branch') . "')" => null]);
					$row_data = [];
					foreach ($customer as $row) {
						$row_data[] = $row['account_no'];
					}
					$where_in = '';
					if(count($row_data) > 0){
						$where_in = " OR (billing_account IN('" . implode("','", $row_data) . "'))";
					}
					// $where_in = "'" . implode("','", $row_data) . "'";
					$where["((branch LIKE '%" . $this->session->userdata('branch') . "%' AND billing_account = '') $where_in)"] 	= NULL;
				}
			} else {
				if ($this->input->get("branch")) {
					$customer = $this->shipment_mod->customer_list_db(["customer_id IN(SELECT id FROM user WHERE role = 'Customer' AND branch = '" . $this->session->userdata('branch') . "')" => null]);
					$row_data = [];
					foreach ($customer as $row) {
						$row_data[] = $row['account_no'];
					}
					// $where_in = "'" . implode("','", $row_data) . "'";
					
					$where_in = '';
					if(count($row_data) > 0){
						$where_in = " OR (billing_account IN('" . implode("','", $row_data) . "'))";
					}
					$where["((branch LIKE '%" . $this->input->get("branch") . "%' AND billing_account = '') $where_in)"] 	= NULL;
				}
			}
		} else {
			redirect('home/logout');
		}

		if ($this->session->userdata('role') == "Driver") {
			// $where["(shipment.driver_pickup = " . $this->session->userdata('id') . " OR shipment.driver_deliver = " . $this->session->userdata('id') . ")"] 	= NULL;
			$where["(driver_pickup = " . $this->session->userdata('id') . " OR driver_deliver = " . $this->session->userdata('id') . ")"] 	= NULL;
		}

		$data['branch_list'] = $this->shipment_mod->branch_list_db(array("name != 'NONE'" => null));
		$summary_list 					= $this->shipment_mod->summary_per_status($where);
		$data['summary_list'] 	= $summary_list[0];

		if ($this->session->userdata('role') == "Super Admin") {
			$branch = NULL;
			if ($this->input->get("branch")) {
				if ($this->input->get('branch') != '') {
					$branch = $this->input->get('branch');
				}
			}

			$where = [
				"MONTH(created_date)" => date("n"),
				"YEAR(created_date)" => date("Y"),
			];
			if ($branch != '' && $branch != NULL) {
				$where['branch'] = $branch;
			}
			$quotation = $this->quotation_mod->quotation_list_db($where);

			$where = [
				"status_delete" => 1
			];
			$customer = $this->commercial_mod->customer_list_db($where);
			$account_no = [];
			foreach ($customer as $key => $value) {
				$account_no[] = $value['account_no'];
			}

			$where = [
				"status_bill > 0" => NULL,
				"MONTH(created_date)" => date("n"),
				"YEAR(created_date)" => date("Y"),
				"status_delete" => 1,
			];
			if ($branch != '' && $branch != NULL) {
				$where['branch'] = $branch;
			}
			$datadb = $this->shipment_mod->shipment_list_db($where);
			$id_shipment = [];
			$shipment = [];
			foreach ($datadb as $key => $value) {
				$id_shipment[] = $value['id_shipment'];
				$shipment[$value['id_shipment']] = $value;
			}

			$where = [
				"id_shipment IN ('" . join("', '", $id_shipment) . "')" => NULL,
				"category" => "costumer",
				"status_delete" => 1
			];
			$cost_list = $this->shipment_mod->shipment_cost_list_db($where);
			$summary = [];
			foreach ($cost_list as $key => $value) {
				$persen = 1;
				if ($value['uom'] == '%') {
					$persen = 100;
				}
				$type_of_shipment = $shipment[$value['id_shipment']]['type_of_shipment'];
				$type_of_mode = $shipment[$value['id_shipment']]['type_of_mode'];
				$summary[$type_of_shipment][$type_of_mode] = @$summary[$type_of_shipment][$type_of_mode] + ($value['qty'] / $persen) * $value['unit_price'] * $value['exchange_rate'] + 0;
			}

			$where = [
				"month" => date("n"),
				"year" => date("Y"),
			];
			$datadb = $this->user_mod->target_list_db($where);
			$target = [];
			foreach ($datadb as $key => $value) {
				$target[$value['type_of_shipment']][$value['type_of_mode']] = $value['target'] + 0;
			}

			$data['summary'] = $summary;
			$data['target'] = $target;
			$data['total_shipment'] = count($shipment);
			$data['total_customer'] = count($customer);
			$data['total_quotation'] = count($quotation);
		}
		
		$where = [
			"status_bill" => 1,
			"payment_terms LIKE '%Days'" => NULL,
			"substr(shipment_invoice.payment_terms, 1, 2) < DATEDIFF(NOW(), invoice_date)" => NULL,
			"shipment.status_delete" => 1
		];
		if ($this->session->userdata('branch')) {
			if ($this->session->userdata('branch') != "NONE") {
				if ($this->session->userdata('role') == 'Operator') {
					$where["((assign_branch LIKE '%" . $this->session->userdata('branch') . "%' AND assign_branch IS NOT NULL) OR (assign_branch IS NULL AND branch LIKE '%" . $this->session->userdata('branch') . "%'))"] 	= NULL;
				} else if ($this->session->userdata('role') == 'Driver') {
				} else {
					$customer = $this->shipment_mod->customer_list_db(["customer_id IN(SELECT id FROM user WHERE role = 'Customer' AND branch = '" . $this->session->userdata('branch') . "')" => null]);
					$row_data = [];
					foreach ($customer as $row) {
						$row_data[] = $row['account_no'];
					}
					$where_in = '';
					if(count($row_data) > 0){
						$where_in = " OR (billing_account IN('" . implode("','", $row_data) . "'))";
					}
					// $where_in = "'" . implode("','", $row_data) . "'";
					$where["((branch LIKE '%" . $this->session->userdata('branch') . "%' AND billing_account = '') $where_in)"] 	= NULL;
				}
			} else {
				if ($this->input->get("branch")) {
					$customer = $this->shipment_mod->customer_list_db(["customer_id IN(SELECT id FROM user WHERE role = 'Customer' AND branch = '" . $this->input->get('branch') . "')" => null]);
					$row_data = [];
					foreach ($customer as $row) {
						$row_data[] = $row['account_no'];
					}
					$where_in = '';
					if(count($row_data) > 0){
						$where_in = " OR (billing_account IN('" . implode("','", $row_data) . "'))";
					}
					// $where_in = "'" . implode("','", $row_data) . "'";
					$where["((branch LIKE '%" . $this->input->get("branch") . "%' AND billing_account = '') $where_in)"] 	= NULL;
				}
			}
		}
		$invoice = $this->shipment_mod->shipment_with_invoice_list_db($where);
		$data['invoice_count'] = count($invoice);

		$data['subview'] 			= 'home/home';
		$data['meta_title'] 	= 'Home';
		$this->load->view('index', $data);
	}

	public function home_commercial()
	{
		if (!$this->session->userdata('id')) {
			redirect('home/login');
		}
		if ($this->session->userdata('role') != "Commercial") {
			redirect('home/home');
		}
		if ($this->session->userdata('role') == "Customer") {
			redirect('home/home_customer');
		}

		$where = [
			"created_by" => $this->session->userdata('id'),
			"MONTH(created_date)" => date("n"),
			"YEAR(created_date)" => date("Y"),
		];
		$quotation = $this->quotation_mod->quotation_list_db($where);

		$where = [
			"assign_to" => $this->session->userdata('id'),
			"status_delete" => 1
		];
		$customer = $this->commercial_mod->customer_list_db($where);
		$account_no = [];
		foreach ($customer as $key => $value) {
			$account_no[] = $value['account_no'];
		}

		$where = [
			"(share_link = " . $this->session->userdata('id') . " OR created_by = " . $this->session->userdata('id') . ")" => NULL,
			"status_bill > 0" => NULL,
			"MONTH(created_date)" => date("n"),
			"YEAR(created_date)" => date("Y"),
			"status_delete" => 1,
		];
		$datadb = $this->shipment_mod->shipment_list_db($where);
		$id_shipment = [];
		$shipment = [];
		foreach ($datadb as $key => $value) {
			$id_shipment[] = $value['id_shipment'];
			$shipment[$value['id_shipment']] = $value;
		}

		$where = [
			"id_shipment IN ('" . join("', '", $id_shipment) . "')" => NULL,
			"category" => "costumer",
			"status_delete" => 1
		];
		$cost_list = $this->shipment_mod->shipment_cost_list_db($where);
		$summary = [];
		foreach ($cost_list as $key => $value) {
			$persen = 1;
			if ($value['uom'] == '%') {
				$persen = 100;
			}
			$type_of_shipment = $shipment[$value['id_shipment']]['type_of_shipment'];
			$type_of_mode = $shipment[$value['id_shipment']]['type_of_mode'];
			$summary[$type_of_shipment][$type_of_mode] = @$summary[$type_of_shipment][$type_of_mode] + ($value['qty'] / $persen) * $value['unit_price'] * $value['exchange_rate'] + 0;
		}

		$where = [
			"id_user" => $this->session->userdata('id'),
			"month" => date("n"),
			"year" => date("Y"),
		];
		$datadb = $this->user_mod->target_list_db($where);
		$target = [];
		foreach ($datadb as $key => $value) {
			$target[$value['type_of_shipment']][$value['type_of_mode']] = $value['target'] + 0;
		}

		$data['summary'] = $summary;
		$data['target'] = $target;
		$data['total_shipment'] = count($shipment);
		$data['total_customer'] = count($customer);
		$data['total_quotation'] = count($quotation);

		$data['subview'] 			= 'home/home_commercial';
		$data['meta_title'] 	= 'Home';
		$this->load->view('index', $data);
	}

	public function home_customer()
	{
		if (!$this->session->userdata('id')) {
			redirect('home/login');
		}
		if ($this->session->userdata('role') == "Commercial") {
			redirect('home/home_commercial');
		}
		if ($this->session->userdata('role') != "Customer") {
			redirect('home/home');
		}

		$datadb 	= $this->home_mod->customer_list(array("status_delete" => 1, "email" => $this->session->userdata('email')));
		if (count($datadb) == 0) {
			$account_no = "0000000";
		}
		$account_no = $datadb[0]["account_no"];
		$where['status_delete'] 	= 1;
		$where["(shipment_detail.billing_account = '" . $account_no . "' OR created_by = '" . $this->session->userdata('id') . "')"] 	= NULL;
		$where['MONTH(created_date)'] 	= date("n");
		if ($this->input->get('month')) {
			$where['MONTH(created_date)'] 	= $this->input->get('month');
		}
		$where['YEAR(created_date)'] 	= date("Y");
		if ($this->input->get('year')) {
			$where['YEAR(created_date)'] 	= $this->input->get('year');
		}
		$datadb = $this->shipment_mod->shipment_list_db($where);
		$id_shipment = [];
		foreach ($datadb as $key => $value) {
			$id_shipment[] = $value['id_shipment'];
		}

		$where = [
			"id_shipment IN ('" . join("', '", $id_shipment) . "')" => NULL,
			"category" => "costumer",
			"status_delete" => 1
		];
		$cost_list = $this->shipment_mod->shipment_cost_list_db($where);
		$total_cost = 0;
		foreach ($cost_list as $key => $value) {
			$cost = $value['qty'] * $value['unit_price'] * $value['exchange_rate'];
			if ($value['uom'] == "%") {
				$cost = $cost / 100;
			}
			$total_cost += $cost;
		}
		$data['total_shipment'] = count($id_shipment);
		$data['total_cost'] = $total_cost;

		$data['subview'] 			= 'home/home_customer';
		$data['meta_title'] 	= 'Home';
		$this->load->view('index', $data);
	}

	public function login()
	{
		if ($this->session->userdata('id')) {
			redirect('home/home');
		}
		$data['meta_title'] 	= 'Login';
		$this->load->view('home/login');
	}

	public function login_process()
	{
		$data_post 					= $this->input->post();
		$where['email'] = $data_post['email'];
		$where['password'] = MD5($data_post['password']);
		$user = $this->user_mod->user_list_db($where);

		if (count($user) > 0) {
			$user = $user[0];
			$session_user = array(
				"id" 					=> $user['id'],
				"name" 				=> $user['name'],
				"email" 			=> $user['email'],
				"role" 				=> $user['role'],
				"branch" 			=> $user['branch'],
			);
			$this->session->set_userdata($session_user);
			redirect('home/home');
		} else {
			$this->session->set_flashdata('error', 'Email or Password is Wrong!');
			redirect("home/login");
		}
	}

	public function logout()
	{
		if ($this->session->userdata('id')) {
			$this->session->unset_userdata('id');
			$this->session->unset_userdata('nama');
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('role');
			$this->session->unset_userdata('departemen');
			session_destroy();
		}

		redirect('home/login');
	}

	public function shipment_create($branch, $date_key = NULL, $id_link_commecial)
	{
		if (!$this->session->userdata('id')) {
			$session_user = array(
				"id" 								=> "Guest",
				"branch" 						=> $branch,
				"role" 							=> "Customer",
				"id_link_commecial" => $id_link_commecial,
			);
			$this->session->set_userdata($session_user);
		}
		if ($this->session->userdata('id') != "Guest") {
			$this->session->set_flashdata('error', 'You Cannot Access the Guest Page!');
			redirect('shipment/shipment_list');
		}
		$date_key = $this->encryption->decrypt(strtr($date_key, '.-~', '+=/'));
		if (date('Y-m-d') != date('Y-m-d', strtotime($date_key))) {
			$this->session->set_flashdata('error', 'This link is expired! Please contact your administrator!');
			redirect('home/login');
		}

		redirect("customer/check_price");
	}

	public function shipment_create_old($branch, $date_key = NULL)
	{
		if (!$this->session->userdata('id')) {
			$session_user = array(
				"id" 					=> "Guest",
			);
			$this->session->set_userdata($session_user);
		}
		if ($this->session->userdata('id') != "Guest") {
			$this->session->set_flashdata('error', 'You Cannot Access the Guest Page!');
			redirect('shipment/shipment_list');
		}
		$date_key = $this->encryption->decrypt(strtr($date_key, '.-~', '+=/'));
		if (date('Y-m-d') != date('Y-m-d', strtotime($date_key))) {
			$this->session->set_flashdata('error', 'This link is expired! Please contact your administrator!');
			redirect('home/login');
		}
		$data['subview'] 			= 'shipment/shipment_create';
		$data['meta_title'] 	= 'Create Shipment';

		$data['country'] = json_decode(file_get_contents("./assets/country/country.json"), true);
		$this->load->view('index', $data);
	}

	function barcode_generator($tracking_no)
	{
		$this->load->library('zend');
		$this->zend->load('Zend/Barcode');
		Zend_Barcode::render('CODE128', 'image', array('text' => $tracking_no, 'drawText' => false), array());
	}
}
