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
		$this->load->model('quotation_mod');
		$this->load->model('payment_mod');
	}

	public function index()
	{
		redirect("shipment/shipment_list");
	}

	public function shipment_list()
	{
		// test_var($this->input->get());
		$where = array();
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
			}
		} else {
			redirect('home/logout');
		}

		if ($this->session->userdata('role') == "Driver") {
			$where["(driver_pickup = " . $this->session->userdata('id') . " OR driver_deliver = " . $this->session->userdata('id') . ")"] 	= NULL;
		} elseif ($this->session->userdata('role') == "Commercial") {
			unset($where);
			$datadb 	= $this->home_mod->customer_list(array("status_delete" => 1, "create_by" => $this->session->userdata('id')));
			$customer_list = [];
			foreach ($datadb as $key => $value) {
				if ($value['account_no'] != "") {
					$customer_list[] = $value['account_no'];
				}
			}
			if (count($customer_list) == 0) {
				$customer_list[] = "0";
			}
			$where['status_delete'] 	= 1;
			$where["(shipment_detail.billing_account IN ('" . join("', '", $customer_list) . "') OR created_by = '" . $this->session->userdata('id') . "')"] 	= NULL;
			// $where["created_by"] 	= $this->session->userdata('id');
		} elseif ($this->session->userdata('role') == "Customer") {
			unset($where);
			$datadb 	= $this->home_mod->customer_list(array("status_delete" => 1, "email" => $this->session->userdata('email')));
			if (count($datadb) == 0) {
				$account_no = "0000000";
			}
			$account_no = $datadb[0]["account_no"];
			$where['status_delete'] 	= 1;
			$where["(shipment_detail.billing_account = '" . $account_no . "' OR created_by = '" . $this->session->userdata('id') . "')"] 	= NULL;
		}

		if ($this->input->get('status_driver')) {
			$status_driver = explode("_", $this->input->get('status_driver'));
			if (count($status_driver) > 1) {
				$where["(status_driver_" . $status_driver[0] . " = " . $status_driver[1] . ")"] 	= NULL;
			} else {
				$where["(status_driver_" . $status_driver[0] . " IN (1, 2) )"] 	= NULL;
			}
		}
		foreach ($this->input->get() as $key => $value) {
			if ($value != "" || $value == "0") {
				$exc_filter = array("status_driver", "created_date_from", "created_date_to", "invoice_overdue");
				if (!in_array($key, $exc_filter)) {
					if ($this->input->get('page')) {
						$where["((status = 'Picked Up') OR (status = 'Booked' AND status_pickup = 'Dropoff'))"] 	= NULL;
					} else if ($key == 'branch') {
						if ($this->session->userdata('role') == 'Operator') {
							$where["((assign_branch LIKE '%" . $value . "%' AND assign_branch IS NOT NULL) OR (assign_branch IS NULL AND branch LIKE '%" . $value . "%'))"] 	= NULL;
						} else {
							$customer = $this->shipment_mod->customer_list_db(["customer_id IN(SELECT id FROM user WHERE role = 'Customer' AND branch = '" . $value . "')" => null]);
							$row_data = [];
							foreach ($customer as $row) {
								$row_data[] = $row['account_no'];
							}
							$where_in = "'" . implode("','", $row_data) . "'";
							$where["((branch LIKE '%" . $value . "%' AND billing_account = '') OR (billing_account IN(" . $where_in . ")))"] 	= NULL;
						}
					} else if ($this->input->get('tracking_no')) {
						if ($this->input->get('tracking_no') != '') {
							$tracking_no = "'" . join("','", $this->input->get('tracking_no')) . "'";
							$where["tracking_no IN($tracking_no) "] = NULL;
						}
					} else {
						$where[$key . " LIKE '%" . $value . "%'"] 	= NULL;
					}
				} elseif ($key == "created_date_from") {
					$where["DATE(created_date) >= '" . $value . "'"] 	= NULL;
				} elseif ($key == "created_date_to") {
					$where["DATE(created_date) <= '" . $value . "'"] 	= NULL;
				} elseif ($key == 'invoice_overdue') {
					$sub_where = [
						"status_bill" => 1,
						"payment_terms LIKE '%Days'" => NULL,
						"substr(shipment_invoice.payment_terms, 1, 2) < DATEDIFF(NOW(), invoice_date)" => NULL,
						"shipment.status_delete" => 1
					];
					if ($this->session->userdata('branch')) {
						if ($this->session->userdata('branch') != "NONE") {
							if ($this->session->userdata('role') == 'Operator') {
								$sub_where["((assign_branch LIKE '%" . $this->session->userdata('branch') . "%' AND assign_branch IS NOT NULL) OR (assign_branch IS NULL AND branch LIKE '%" . $this->session->userdata('branch') . "%'))"] 	= NULL;
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
								$sub_where["((branch LIKE '%" . $this->session->userdata('branch') . "%' AND billing_account = '') $where_in)"] 	= NULL;
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
								$sub_where["((branch LIKE '%" . $this->input->get("branch") . "%' AND billing_account = '') $where_in)"] 	= NULL;
							}
						}
					}
					$invoice = $this->shipment_mod->shipment_with_invoice_list_db($sub_where);
					$shipment_id = [];
					foreach ($invoice as $rows) {
						$shipment_id[] = $rows['id_shipment'];
					}
					$where["shipment.id IN ('" . join("','", $shipment_id) . "')"] = NULL;
				}
			}
		}

		// $summary_list 					= $this->shipment_mod->summary_per_status($where);
		// $data['summary_list'] 	= $summary_list[0];
		$order_by = NULL;
		if ($this->session->userdata('role') == "Driver") {
			$order_by["assign_driver_date"] = "DESC";
		}

		$where['status_delete'] 	= 1;
		$datadb 				= $this->shipment_mod->shipment_list_db($where, null, $order_by);
		$shipment_list 	= [];
		$express_list 	= [];
		$created_by 	= [];
		foreach ($datadb as $key => $value) {
			if ($value['sea'] == "Express" && !in_array($value['status'], array("Delivered", "Canceled"))) {
				$express_list[] = $value;
			} else {
				$shipment_list[] = $value;
			}
			if (!in_array($value['created_by'], $created_by)) {
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
		if (count($created_by) > 0 && $this->session->userdata('role') == "Super Admin") {
			unset($where);
			$where["id IN ('" . join("', '", $created_by) . "')"] 	= NULL;
			$datadb 	= $this->home_mod->user_list($where);
			foreach ($datadb as $key => $value) {
				$created_by_list[$value['id']] = $value['name'];
			}
		}
		$data['created_by_list'] = $created_by_list;

		$data['country'] = $this->shipment_mod->country_list_db();

		$data['subview'] 				= 'shipment/shipment_list';
		$data['meta_title'] 		= 'Shipment List';
		$this->load->view('index', $data);
	}

	public function shipment_create()
	{
		$data['subview'] 			= 'shipment/shipment_create';
		$data['meta_title'] 	= 'Create Shipment';

		if ($this->session->userdata('role') == "Customer") {
			$data['customer'] = $this->shipment_mod->customer_list_db(array("status_delete" => 1, "email" => $this->session->userdata('email')));
		} elseif ($this->session->userdata('role') == "Commercial") {
			$data['customer'] = $this->shipment_mod->customer_list_db(["status_approval" => 1, "status_delete" => 1, "assign_to" => $this->session->userdata('id')]);
		} else {
			$data['customer'] = $this->shipment_mod->customer_list_db(["status_approval" => 1, "status_delete" => 1]);
		}

		$datadb 	= $this->home_mod->branch_list(["name" => $this->session->userdata('branch')]);
		$data["branch"] = $datadb[0];

		$data['country'] = $this->shipment_mod->country_list_db();
		$data['package_type'] = $this->shipment_mod->package_type_list_db();
		$this->load->view('index', $data);
	}

	public function pickup_price()
	{
		$post = $this->input->post();
		$id_customer = $this->session->userdata('id');
		$city = $post['city'];

		$branch = $this->session->userdata('branch');
		$where['name'] = $branch;
		$branch = $this->shipment_mod->branch_list_db($where);
		$id_branch = $branch[0]['id'];

		$where = array('default_value' => $post['weight'], 'city' => $city, 'id_customer' => $id_customer, 'rate_type' => 'fix rate');
		$query = $this->shipment_mod->table_rate_pickup_list_db($where);
		if ($query->num_rows() > 0) {
			$row = $query->row_array();
			$pickup_rate = $row['price'] * $post['weight'];
		} else {
			//multiply rate
			unset($where);
			$where = array("'" . $post['weight'] . "' BETWEEN min_value AND max_value" => NULL, 'city' => $city, 'id_customer' => $id_customer, 'rate_type' => 'multiply rate');
			$query = $this->shipment_mod->table_rate_pickup_list_db($where);
			if ($query->num_rows() > 0) {
				$row = $query->row_array();
				$pickup_rate = $row['price'] * $post['weight'];
			} else {
				//fix rate branch
				unset($where);
				$where = array('city' => $city, 'default_value' => $post['weight'], 'id_branch' => $id_branch, 'rate_type' => 'fix rate');
				$query = $this->shipment_mod->table_rate_pickup_list_db($where);
				if ($query->num_rows() > 0) {
					$row = $query->row_array();
					$pickup_rate = $row['price'] * $post['weight'];
				} else {
					//multiply rate branch
					unset($where);
					$where = array('city' => $city, "'" . $post['weight'] . "' BETWEEN min_value AND max_value" => NULL, 'id_branch' => $id_branch, 'rate_type' => 'multiply rate');
					$query = $this->shipment_mod->table_rate_pickup_list_db($where);
					if ($query->num_rows() > 0) {
						$row = $query->row_array();
						$pickup_rate = $row['price'] * $post['weight'];
					} else {
						$pickup_rate = 0;
					}
				}
			}
		}

		echo $pickup_rate;
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
			unset($data_post['container_no']);
			unset($data_post['seal_no']);
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
		$data['meta_title'] 			= 'Shipment ' . (isset($post['tracking_no']) ? "Receipt" : "Preview");
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
			unset($data_post['container_no']);
			unset($data_post['seal_no']);
			foreach ($packages_list as $key => $value) {
				foreach ($value as $key2 => $value2) {
					if (!in_array($key2, array('id', 'id_shipment', 'create_date', 'status_delete'))) {
						echo $key2;
						$data_post[$key2][] = $value2;
					}
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
			'check_price_weight'					=> @$post['check_price_weight'],
			'check_price_term'					=> @$post['check_price_term'],
			'pickup_price'					=> @$post['pickup_price'],
			'insurance'					=> $post['insurance'],
		);
		if ($this->session->userdata('id') == "Guest") {
			$form_data['share_link'] = $this->session->userdata('id_link_commecial');
		}
		$id_shipment = $this->shipment_mod->shipment_create_process_db($form_data);

		if ($this->session->userdata('role') == 'Customer') {
			$status_finance = 1;
		} else {
			$status_finance = 0;
		}

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

				'status_bill'					=> $status_finance,
			);
		}
		if (isset($post['pickup_same_as'])) {
			$form_data['pickup_same_as'] = $post['pickup_same_as'];
		}

		$this->shipment_mod->shipment_detail_create_process_db($form_data);
		$remarks = "";
		if ($post['status_pickup'] == "Dropoff") {
			$remarks = "Tracking number has been created and shipment will be DROPPED OFF";
		} elseif ($post['status_pickup'] == "Picked Up") {
			$remarks = "Tracking number has been created and shipment is preparing to be PICKED UP";
		}
		$form_data = array(
			'id_shipment' 			=> $id_shipment,
			'date' 					=> date("Y-m-d"),
			'time' 					=> date("H:i:s"),
			'location' 				=> $post['shipper_city'] . ", " . $post['shipper_country'],
			'status' 				=> $status,
			'remarks' 				=> $remarks,
		);
		$this->shipment_mod->shipment_history_create_process_db($form_data);

		foreach ($post['qty'] as $key => $value) {
			$form_data = array(
				'id_shipment' 	=> $id_shipment,
				'qty' 					=> $post['qty'][$key],
				'piece_type' 		=> $post['piece_type'][$key],
				'length' 				=> $post['length'][$key],
				'width' 				=> $post['width'][$key],
				'height' 				=> $post['height'][$key],
				'size' 					=> $post['size'][$key],
				'container_no' 	=> $post['container_no'][$key],
				'seal_no' 			=> $post['seal_no'][$key],
				'weight'				=> $post['weight'][$key],
			);
			$this->shipment_mod->shipment_packages_create_process_db($form_data);
		}

		// $this->shipment_update_last_history($id_shipment);

		if (isset($post['id_quotation'])) {
			$form_data = array(
				'tracking_no' 					=> $tracking_no,
			);
			unset($where);
			$where['id'] = $post['id_quotation'];
			$this->quotation_mod->quotation_update_process_db($form_data, $where);
		}

		if (@$post['check_price_weight'] != "") {
			$where = [
				"status_delete" => 1,
				"account_no" 		=> $post['billing_account'],
			];
			$datadb 	= $this->home_mod->customer_list($where);
			$customer = $datadb[0];
			if (count($datadb) == 0) {
				$customer['payment_terms'] = "Cash In Advance";
			}

			unset($where);
			$where['name'] = $this->session->userdata('branch');
			$branch = $this->home_mod->branch_list($where);
			unset($where);
			$branch = $branch[0];

			$where['YEAR(create_date)'] = date("Y");
			$where["SUBSTRING_INDEX(SUBSTRING_INDEX(invoice_no,'-',1), '/', -1) = '" . $branch['code'] . "'"] = NULL;
			$invoice_no = $this->shipment_mod->shipment_generate_invoice_no_db($where);
			unset($where);
			$where = [
				'branch' => $branch['name'],
				'default_value' => '1'
			];
			$payment = $this->payment_mod->payment_list_db($where);

			unset($where);
			$invoice_no = $invoice_no . "/" . $branch['code'] . "-FH" . "/" . date("Y");
			$form_data = array(
				'id_shipment' 		=> $id_shipment,
				'invoice_no' 			=> $invoice_no,
				'invoice_date' 		=> date("Y-m-d"),
				'create_by' 			=> $this->session->userdata('id'),

				'payment_terms' 		=> $customer['payment_terms'],
				'vat' 							=> 0,
				'discount' 					=> 0,
				'notes' 						=> "",
				'beneficiary_name'	=>  $payment[0]['beneficiary_name'],
				'acc_no'						=> $payment[0]['account_no'],
				'bank_name'					=> $payment[0]['bank_name'],
			);
			$id_bill = $this->shipment_mod->shipment_invoice_create_process_db($form_data);

			$form_data = array(
				'status_bill' 		=> 1,
			);
			$where['id_shipment'] = $id_shipment;
			$this->shipment_mod->shipment_detail_update_process_db($form_data, $where);

			foreach ($post['qty'] as $key => $value) {
				$form_data = array(
					'id_shipment' 			=> $id_shipment,
					'description' 			=> "Freight Handling",
					'qty' 							=> $post['check_price_weight_fix'],
					'uom' 							=> "Kg",
					'currency' 					=> "IDR",
					'unit_price' 				=> ($post['check_price_weight'] / $post['check_price_weight_fix']),
					'exchange_rate' 		=> 1,
					'remarks' 					=> "",
					'category' 					=> "costumer",
				);
				$this->shipment_mod->shipment_cost_create_process_db($form_data);
			}

			$this->session->set_flashdata('success', 'Your Shipment data has been Created!');
			redirect('shipment/shipment_autobill/' . $id_shipment);
		}

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
		if ($this->input->get('t')) {
			$t = $this->input->get('t');
		}
		$data['t'] = $t;

		$data['country'] = $this->shipment_mod->country_list_db();

		$datadb 	= $this->home_mod->branch_list(["name" => $shipment_list[0]["branch"]]);
		$data["branch"] 	= $datadb[0];

		$data['shipment'] 			= $shipment_list[0];
		$data['packages_list'] 	= $packages_list;
		$data['history_list'] 	= $history_list;

		if ($this->session->userdata('role') == "Commercial") {
			$data['customer'] = $this->shipment_mod->customer_list_db(["status_approval" => 1, "status_delete" => 1, "assign_to" => $this->session->userdata('id')]);
		} else {
			$data['customer'] = $this->shipment_mod->customer_list_db(["status_approval" => 1, "status_delete" => 1]);
		}

		$data['package_type'] = $this->shipment_mod->package_type_list_db();
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
			'insurance'					=> $post['insurance'],
		);
		if (isset($post['has_updated_packages'])) {
			$form_data['has_updated_packages'] = 1;
		}
		$where['id'] = $post['id'];
		$this->shipment_mod->shipment_update_process_db($form_data, $where);

		$form_data = array(
			'status_pickup' 						=> $post['status_pickup'],
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

			// 'container_no'							=> $post['container_no'],
			// 'seal_no'										=> $post['seal_no'],
			'cipl_no'										=> $post['cipl_no'],
			'permit_no'									=> $post['permit_no']
		);
		if ($post['status_pickup'] == "Picked Up") {
			$form_data['pickup_name'] = $post['shipper_name'];
			$form_data['pickup_address'] = $post['shipper_address'];
			$form_data['pickup_city'] = $post['shipper_city'];
			$form_data['pickup_country'] = $post['shipper_country'];
			$form_data['pickup_postcode'] = $post['shipper_postcode'];
			$form_data['pickup_contact_person'] = $post['shipper_contact_person'];
			$form_data['pickup_phone_number'] = $post['shipper_phone_number'];
			$form_data['pickup_email'] = $post['shipper_email'];
		}
		if (isset($post['pickup_same_as'])) {
			$form_data['pickup_same_as'] = $post['pickup_same_as'];
		}
		if (!empty($_FILES['cipl_no_atc']['name'])) {
			$upload_path = 'file/agent/';
			$config = [
				'upload_path' 		=> $upload_path,
				'file_name' 			=> 'img_cipl_no_atc_' . $post['id'] . '_' . date('YmsHis'),
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

			$gbr = $this->upload->data();
			$form_data['cipl_no_atc'] = $gbr['file_name'];
		}
		$where2['id_shipment'] = $post['id'];
		$this->shipment_mod->shipment_detail_update_process_db($form_data, $where2);

		$total_weight = 0;
		foreach ($post['qty'] as $key => $value) {
			unset($where);
			if ($post['id_detail'][$key] == "") {
				$form_data = array(
					'id_shipment' 			=> $post['id'],
					'qty' 							=> $post['qty'][$key],
					'piece_type' 				=> $post['piece_type'][$key],
					'length' 						=> $post['length'][$key],
					'width' 						=> $post['width'][$key],
					'height' 						=> $post['height'][$key],
					'size' 							=> $post['size'][$key],
					'container_no' 			=> $post['container_no'][$key],
					'seal_no' 					=> $post['seal_no'][$key],
					'weight' 						=> $post['weight'][$key],
				);
				$this->shipment_mod->shipment_packages_create_process_db($form_data);
			} else {
				$form_data = array(
					'qty' 							=> $post['qty'][$key],
					'piece_type' 				=> $post['piece_type'][$key],
					'length' 						=> $post['length'][$key],
					'width' 						=> $post['width'][$key],
					'height' 						=> $post['height'][$key],
					'size' 							=> $post['size'][$key],
					'container_no' 			=> $post['container_no'][$key],
					'seal_no' 					=> $post['seal_no'][$key],
					'weight' 						=> $post['weight'][$key],
				);
				$where['id'] = $post['id_detail'][$key];
				$this->shipment_mod->shipment_packages_update_process_db($form_data, $where);
			}
			$total_weight = $total_weight + ($post['qty'][$key] * $post['weight'][$key]);
		}

		if ($post['check_price_weight'] != "" && $post['check_price_weight'] != "0") {
			$cost = $this->shipment_mod->shipment_cost_list_db([
				"uom" 				=> 'Kg',
				"category" 		=> 'costumer',
				"id_shipment" => $post['id'],
			]);
			if (count($cost) > 0) {
				$cost = $cost[0];
				$form_data = [
					"qty" 					=> $total_weight,
					"qty_costumer" 	=> $cost['qty'],
				];
				$this->shipment_mod->shipment_cost_update_process_db($form_data, ["id" => $cost['id']]);

				// $form_data = ["status" => "Pending Payment"];
				// $where = ["id" => $post['id']];
				// $this->shipment_mod->shipment_update_process_db($form_data, $where);

				// $where = [
				// 	"id_shipment" => $post['id']
				// ];
				// $datadb = $this->shipment_mod->shipment_history_list_db($where);
				// $history = $datadb[0];

				// $form_data = array(
				// 	'id_shipment' 	=> $post['id'],
				// 	'date' 					=> date("Y-m-d"),
				// 	'time' 					=> date("H:i:s"),
				// 	'location' 			=> $history['location'],
				// 	'status' 				=> "Pending Payment",
				// 	'remarks' 			=> "Shipment information updated.",
				// );
				// $id_history = $this->shipment_mod->shipment_history_create_process_db($form_data);
			}
		}

		if (isset($post['has_updated_packages'])) {
			$form_data = array(
				'id_shipment' 	=> $post['id'],
				'date' 					=> date("Y-m-d"),
				'time' 					=> date("H:i:s"),
				'location' 			=> $post['shipper_city'] . ", " . $post['shipper_country'],
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
		$data['package_type'] = $this->shipment_mod->package_type_list_db();
		$data['country'] = $this->shipment_mod->country_list_db();
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
		if (isset($post['has_updated_packages'])) {
			$form_data['has_updated_packages'] = 1;
		}
		$where['id'] = $post['id'];
		$this->shipment_mod->shipment_update_process_db($form_data, $where);
		$total_weight = 0;
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
			$total_weight = $total_weight + ($post['qty'][$key] * $post['weight'][$key]);
		}

		// if (isset($post['has_updated_packages'])) {
		// 	$form_data = array(
		// 		'id_shipment' 	=> $post['id'],
		// 		'date' 					=> date("Y-m-d"),
		// 		'time' 					=> date("H:i:s"),
		// 		'location' 			=> $post['shipper_city'] . ", " . $post['shipper_country'],
		// 		'status' 				=> "Service Center",
		// 		'remarks' 			=> "Shipment information updated.",
		// 	);
		// 	$id_history = $this->shipment_mod->shipment_history_create_process_db($form_data);
		// 	$this->shipment_update_last_history($post['id']);
		// }

		if ($post['check_price_weight'] != "" || $post['check_price_weight'] != "0") {
			$cost = $this->shipment_mod->shipment_cost_list_db([
				// "uom" 				=> 'Kg',
				"category" 		=> 'costumer',
				"id_shipment" => $post['id'],
			]);
			if (count($cost) > 0) {
				$cost = $cost[0];
				$form_data = [
					"qty" 					=> $total_weight,
					"qty_costumer" 	=> $cost['qty'],
				];
				$this->shipment_mod->shipment_cost_update_process_db($form_data, ["id" => $cost['id']]);
			}
		}

		$where = ["id" => $post['id']];
		$shipment_list = $this->shipment_mod->shipment_list_db($where);

		if ($shipment_list[0]['billing_account'] == '' || $shipment_list[0]['billing_account'] == NULL) {
			$status = 'Pending Payment';
		} else {
			$status = 'Service Center';
		}

		$form_data = ["status" => $status];

		$this->shipment_mod->shipment_update_process_db($form_data, $where);

		$where = [
			"id_shipment" => $post['id']
		];
		$datadb = $this->shipment_mod->shipment_history_list_db($where);
		$history = $datadb[0];

		$form_data = array(
			'id_shipment' 	=> $post['id'],
			'date' 					=> date("Y-m-d"),
			'time' 					=> date("H:i:s"),
			'location' 			=> $history['location'],
			'status' 				=> $status,
			'remarks' 			=> "",
		);
		$id_history = $this->shipment_mod->shipment_history_create_process_db($form_data);

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

		$data['country'] = $this->shipment_mod->country_list_db();

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
		);
		$this->load->library('upload');
		// $this->load->library('image_lib');
		if (!empty($_FILES['main_agent_mawb_mbl_atc']['name'])) {
			$upload_path = 'file/agent/';
			$config = [
				'upload_path' 		=> $upload_path,
				'file_name' 			=> 'img_main_agent_mawb_mbl_atc_' . $post['id'] . '_' . date('YmsHis'),
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
			$form_data['main_agent_mawb_mbl_atc'] = $gbr['file_name'];
		}
		if (!empty($_FILES['secondary_agent_mawb_mbl_atc']['name'])) {
			$upload_path = 'file/agent/';
			$config = [
				'upload_path' 		=> $upload_path,
				'file_name' 			=> 'img_secondary_agent_mawb_mbl_atc_' . $post['id'] . '_' . date('YmsHis'),
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
			$form_data['secondary_agent_mawb_mbl_atc'] = $gbr['file_name'];
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

		$data['country'] = $this->shipment_mod->country_list_db();

		$data['shipment'] 			= $shipment_list[0];
		$data['t'] 							= 'g';
		$data['subview'] 				= 'shipment/shipment_assign';
		$data['meta_title'] 		= 'Assign Shipment';
		$this->load->view('index', $data);
	}

	public function shipment_assign_process()
	{
		$post = $this->input->post();
		if ($post['assign_branch'] != '') {
			$form_data = array(
				'assign_branch'					=> $post['assign_branch'],
			);
			$where['id'] = $post['id'];
			$this->shipment_mod->shipment_update_process_db($form_data, $where);
		}

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

		$data['uom_list'] = $this->home_mod->uom_list();

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

		$quotation = $this->shipment_mod->quotation_list_db(array('tracking_no' => $shipment_list[0]['tracking_no']));
		if (count($quotation) > 0) {
			$data['quotation'] = $quotation[0];
		}

		$payment_terms = '';
		if ($shipment_list[0]['billing_account'] != '') {
			$customer = $this->shipment_mod->customer_list_db(['account_no' => $shipment_list[0]['billing_account']]);
			$payment_terms = $customer[0]['payment_terms'];
		}
		$data['payment_terms'] = $payment_terms;

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

		unset($where);
		$where = null;
		if ($this->session->userdata('branch') != 'NONE') {
			$where['branch'] = $this->session->userdata('branch');
		}
		$data['payment_info'] = $this->payment_mod->payment_list_db($where);
		$data['main_agent'] 			= $main_agent;
		$data['secondary_agent'] 	= $secondary_agent;
		$data['costumer'] 				= $costumer;

		$data['payment_terms_list'] = $this->home_mod->payment_terms_list();
		$data['uom_list'] = $this->home_mod->uom_list();

		$data['subview'] 				= 'shipment/shipment_bill';
		$data['meta_title'] 		= 'Shipment Bill';
		$this->load->view('index', $data);
	}

	public function get_payment_information()
	{
		if ($this->input->post()) {
			$id = $this->input->post('id');

			$where['id'] = $id;
			$payment = $this->payment_mod->payment_list_db($where);
			echo json_encode($payment[0]);
		} else {
			echo "error";
		}
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
				$this->session->set_flashdata('error', 'Branch Not Found!');
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
				'swift_code'						=> $post['swift_code'],
				'bank_name'					=> $post['bank_name'],
				'payment_info'				=> $post['payment_info']
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
				'bank_address'						=> $post['bank_address'],
				'swift_code'						=> $post['swift_code'],
				'bank_name'					=> $post['bank_name'],
				'payment_info'				=> $post['payment_info']
			);
			$where['id'] = $post['id_invoice'];
			$this->shipment_mod->shipment_invoice_update_process_db($form_data, $where);

			unset($where);
			if (isset($post['status_bill'])) {
				$form_data = array(
					'status_bill' 		=> $post['status_bill'],
					'date_paid' 			=> $post['date_paid'],
				);
				$where['id_shipment'] = $post['id'];
				$this->shipment_mod->shipment_detail_update_process_db($form_data, $where);

				if ($post['status_bill'] == 2) {
					if (!empty($_FILES['file']['name'])) {
						$config['upload_path']          = 'file/invoice/';
						$config['file_name']            = 'invoice_customer_' . $this->session->userdata('id') . '_' . date('YmsHis');
						$config['allowed_types']        = '*';
						$config['overwrite'] 			= TRUE;

						$this->load->library('upload');
						$this->upload->initialize($config);

						if (!$this->upload->do_upload('file')) {
							$this->session->set_flashdata('error', $this->upload->display_errors());
							redirect($_SERVER['HTTP_REFERER']);
							return false;
						}

						$where['shipment.id'] = $post['id'];
						$shipment_list 					= $this->shipment_mod->shipment_list_db($where);

						$form_data = [
							"paid_attachment" => $this->upload->data("file_name"),
						];
						$where = ['id_shipment' => $post['id']];
						$this->shipment_mod->shipment_invoice_update_process_db($form_data, $where);
					} else {
						$this->session->set_flashdata('error', "Must Upload Attachment!");
						redirect($_SERVER['HTTP_REFERER']);
						return false;
					}

					unset($where);
					$where = [
						"id_shipment" => $post['id']
					];
					$datadb = $this->shipment_mod->shipment_history_list_db($where);
					$history = $datadb[0];

					$where 			= ["id" => $post['id']];
					$shipment = $this->shipment_mod->shipment_list_db($where);
					if ($shipment[0]['billing_account'] == '' || $shipment[0]['billing_account'] == NULL) {
						$form_data = array(
							'id_shipment' 	=> $post['id'],
							'date' 					=> date("Y-m-d"),
							'time' 					=> date("H:i:s"),
							'location' 			=> $history['location'],
							'status' 				=> "Service Center",
							'remarks' 			=> "Shipment Bill is Paid.",
						);
						$id_history = $this->shipment_mod->shipment_history_create_process_db($form_data);

						$form_data 	= ["status" => "Service Center"];
						$this->shipment_mod->shipment_update_process_db($form_data, $where);
					}
				}
			}
		}

		foreach ($post['description'] as $key => $value) {
			if ($value != "") {
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
		$payment_info = $this->payment_mod->payment_list_db(['branch' => $branch['name']]);
		$data['payment_info'] = $payment_info[0];

		$data['logo'] 	= base64_encode(file_get_contents("assets/img/logo-big-xpdc.png"));

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Invoice-" . $shipment['tracking_no'] . ".pdf";
		$this->pdf->load_view('shipment/shipment_invoice_pdf', $data);
	}

	public function shipment_do_pdf($id)
	{
		$where['shipment.id'] = $id;
		$shipment_list = $this->shipment_mod->shipment_list_db($where);
		$shipment = $shipment_list[0];
		$data['shipment'] = $shipment;

		unset($where);
		$where['id_shipment'] = $id;
		$packages_list = $this->shipment_mod->shipment_packages_list_db($where);
		$data['packages'] = $packages_list;

		$data['driver_list_deliver'] = user_data(array($data['shipment']['driver_deliver']));

		$data['logo'] 	= base64_encode(file_get_contents("assets/img/logo-big-xpdc.png"));

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "DeliveryOrder-" . $shipment['tracking_no'] . ".pdf";
		$this->pdf->load_view('shipment/shipment_do_pdf', $data);
	}

	public function shipment_delete_process($id)
	{
		$form_data = array(
			'status_delete'	=> 0,
			'deleted_by' => $this->session->userdata('id')
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

		$data['country'] 				= $this->shipment_mod->country_list_db();

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
		unset($where);
		$where['id_shipment'] = $id;
		$data['cost'] = $this->shipment_mod->shipment_cost_list_db($where);

		$this->load->library('pdf');
		// $this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "AWB-" . $data['shipment']['tracking_no'] . ".pdf";
		$this->pdf->load_view('shipment/shipment_awb_pdf', $data);
	}

	public function shipment_history_update()
	{
		$data['country'] = $this->shipment_mod->country_list_db();
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
		$type_of_shipment = 1;
		if (count($shipment_list) == 0) {
			$where = [
				"master_tracking"  => $post['tracking_no'],
			];
			$shipment_list 					= $this->shipment_mod->shipment_list_db($where);
			if (count($shipment_list) == 0) {
				echo "Error : Tracking Number Not Found!";
				return false;
			}
			$type_of_shipment = 2;
		} elseif ($post['history_date'] > date("Y-m-d") || ($post['history_date'] == date("Y-m-d") && $post['history_time'] > date("H:i"))) {
			echo "Error : You cannot submit for a future date!<br>Current time : " . date("Y-m-d H:i");
			return false;
		}

		foreach ($shipment_list as $key => $value) {
			// if ($post['history_status'] == "Departed" && $value['main_agent_name'] == "") {
			if ($post['history_status'] == "Departed") {
				if ($type_of_shipment == 1) {
					echo "OK|" . $value['id'];
					return false;
					exit;
				} else if ($type_of_shipment == 2) {
					if ($value['main_agent_name'] == "") {
						echo "Error : You cannot depart shipment before fill up Shipping Information (" . $value['tracking_no'] . ")";
						return false;
						exit;
					}
				}
			} elseif ($post['history_status'] == "Service Center" && $value['status'] == "Picked up" && $value['has_updated_packages'] != 1) {
				echo "Error : You need to edit shipment information / packages first to change status Service Center from Picked up (" . $value['tracking_no'] . ")";
				return false;
				exit;
			} elseif ($post['history_status'] == "Arrived" && $value['status'] != "Departed") {
				echo "Error : Status need to Departed first before update to Arrived (" . $value['tracking_no'] . ")";
				return false;
				exit;
			} elseif ($post['history_status'] == "Service Center" && !in_array($value['status'], ["Arrived", "Clearance Complete"])) {
				echo "Error : Status need to Arrived/Clearance Complete first before update to Service Center (" . $value['tracking_no'] . ")";
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

	public function shipment_shipping_information()
	{
		$id = $this->input->post('id');
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

		$datadb 	= $this->home_mod->branch_list();
		$branch_list = [];
		foreach ($datadb as $key => $value) {
			$branch_list[$value['name']] = $value;
		}
		$data['branch_list'] 	= $branch_list;

		$data['country'] = $this->shipment_mod->country_list_db();

		$data['shipment'] 			= $shipment_list[0];
		$data['t'] 							= 'g';
		$data['pages'] = $this->input->post('page');
		// $data['subview'] 				= 'shipment/shipment_shipping_information';
		// $data['meta_title'] 		= 'Shipment Edit Shipping Info?rmation';
		$this->load->view('shipment/shipment_shipping_information', $data);
	}

	public function shipment_shipping_information_process()
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
		);
		$this->load->library('upload');
		// $this->load->library('image_lib');
		if (!empty($_FILES['main_agent_mawb_mbl_atc']['name'])) {
			$upload_path = 'file/agent/';
			$config = [
				'upload_path' 		=> $upload_path,
				'file_name' 			=> 'img_main_agent_mawb_mbl_atc_' . $post['id'] . '_' . date('YmsHis'),
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
			$form_data['main_agent_mawb_mbl_atc'] = $gbr['file_name'];
		}
		if (!empty($_FILES['secondary_agent_mawb_mbl_atc']['name'])) {
			$upload_path = 'file/agent/';
			$config = [
				'upload_path' 		=> $upload_path,
				'file_name' 			=> 'img_secondary_agent_mawb_mbl_atc_' . $post['id'] . '_' . date('YmsHis'),
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
			$form_data['secondary_agent_mawb_mbl_atc'] = $gbr['file_name'];
		}

		$where2['id_shipment'] = $post['id'];
		$this->shipment_mod->shipment_detail_update_process_db($form_data, $where2);

		unset($form_data);
		unset($where);

		if ($post['assign_branch'] != '') {
			$form_data = array(
				'assign_branch'					=> $post['assign_branch'],
			);
			$where['id'] = $post['id'];
			$this->shipment_mod->shipment_update_process_db($form_data, $where);
		}

		unset($form_data);
		unset($where);

		$history_location = $post['city_history_location'] . ", " . $post['country_history_location'];
		$where['tracking_no'] 	= $post['tracking_no'];
		if ($post['history_date'] > date("Y-m-d") || ($post['history_date'] == date("Y-m-d") && $post['history_time'] > date("H:i"))) {
			echo "Error : You cannot submit for a future date!<br>Current time : " . date("Y-m-d H:i");
			return false;
		}

		$form_data = array(
			'id_shipment' 	=> $post['id'],
			'date' 					=> $post['history_date'],
			'time' 					=> $post['history_time'],
			'location' 			=> $history_location,
			'status' 				=> $post['history_status'],
			'remarks' 			=> $post['history_remarks'],
		);
		$id_history = $this->shipment_mod->shipment_history_create_process_db($form_data);
		$this->shipment_update_last_history($post['id']);

		$output = $form_data;
		$output['tracking_no'] = $post['tracking_no'];
		$output['id'] = $id_history;

		echo json_encode($output);
	}

	public function column_history_update_process()
	{
		$post = $this->input->post();
		$form_data = [
			$post['column'] => $post['text']
		];
		$where = [
			'id' => $post['id']
		];
		$this->shipment_mod->shipment_history_update_process_db($form_data, $where);

		if (in_array($post['column'], array('date', 'time'))) {
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

	public function check_custumer()
	{
		$post = $this->input->post();
		$where = [
			"status_delete" => 1,
			"account_no" 		=> $post['account_no'],
		];
		$datadb 	= $this->home_mod->customer_list($where);
		if (count($datadb) > 0) {
			$customer = $datadb[0];
			echo json_encode($customer);
		} else {
			echo "Error: Account Number " . $post['account_no'] . " Not Found!";
			exit;
		}
	}

	public function shipment_autobill($id)
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

		$quotation = $this->shipment_mod->quotation_list_db(array('tracking_no' => $shipment_list[0]['tracking_no']));
		if (count($quotation) > 0) {
			$data['quotation'] = $quotation[0];
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

		$data['payment_terms_list'] = $this->home_mod->payment_terms_list();
		$data['uom_list'] = $this->home_mod->uom_list();

		$data['subview'] 						= 'shipment/shipment_autobill';
		$data['meta_title'] 				= 'Shipment Bill';
		$data['autobill_status'] 		= 0;
		$this->load->view('index', $data);
	}

	public function shipment_autobill_process()
	{
		$post = $this->input->post();

		$form_data = array(
			'payment_terms' 		=> $post['payment_terms'],
		);
		$where['id'] = $post['id_invoice'];
		$this->shipment_mod->shipment_invoice_update_process_db($form_data, $where);

		$this->session->set_flashdata('success', 'Your Shipment data has been Updated!');
		redirect('shipment/shipment_autobill_complete/' . strtr($this->encryption->encrypt($post['id']), '+=/', '.-~'));
	}

	public function shipment_autobill_complete($id)
	{
		if ($this->session->userdata('id') == "Guest") {
			// $this->session->unset_userdata('id');
			// $this->session->unset_userdata('nama');
			// $this->session->unset_userdata('email');
			// $this->session->unset_userdata('role');
			// $this->session->unset_userdata('departemen');
			// session_destroy();
		}

		$id = $this->encryption->decrypt(strtr($id, '.-~', '+=/'));

		$where['id'] 						= $id;
		$shipment_list 					= $this->shipment_mod->shipment_list_db($where);
		$data['shipment_list'] 	= $shipment_list[0];

		unset($where);
		$where['id_shipment'] 	= $id;
		$shipment_invoice 			= $this->shipment_mod->shipment_invoice_list_db($where);
		if (count($shipment_invoice) > 0) {
			$data['invoice'] 				= $shipment_invoice[0];
		}

		$quotation = $this->shipment_mod->quotation_list_db(array('tracking_no' => $shipment_list[0]['tracking_no']));
		if (count($quotation) > 0) {
			$data['quotation'] = $quotation[0];
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

		$data['payment_terms_list'] = $this->home_mod->payment_terms_list();
		$data['uom_list'] = $this->home_mod->uom_list();

		$data['subview'] 						= 'shipment/shipment_autobill';
		$data['meta_title'] 				= 'Shipment Bill';
		$data['autobill_status'] 		= 1;
		$this->load->view('index', $data);
	}

	public function shipment_multipaid_process()
	{
		$post = $this->input->post();
		$id_arr = explode(", ", $post['id']);

		$config['upload_path']          = 'file/invoice/';
		$config['file_name']            = 'invoice_customer_' . $this->session->userdata('id') . '_' . date('YmsHis');
		$config['allowed_types']        = '*';
		$config['overwrite'] 						= TRUE;

		$this->load->library('upload');
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('file')) {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect($_SERVER['HTTP_REFERER']);
			return false;
		}

		$where['shipment.id IN (' . $post['id'] . ')'] = NULL;
		$shipment_list 					= $this->shipment_mod->shipment_list_db($where);

		$not_bill = [];
		foreach ($shipment_list as $key => $value) {
			if ($value['status_bill'] != 1) {
				$not_bill[] = $value['tracking_no'];
			}
		}
		if (count($not_bill) > 0) {
			$this->session->set_flashdata('error', 'All shipment below is not already billed!<br>' . join('<br>', $not_bill));
			redirect($_SERVER['HTTP_REFERER']);
		}

		$form_data = [
			"paid_attachment" => $this->upload->data("file_name"),
		];
		$where = ['id_shipment IN (' . $post['id'] . ')' => NULL];
		$this->shipment_mod->shipment_invoice_update_process_db($form_data, $where);

		$form_data = [
			"status_bill" => 2,
			"date_paid" 	=> date("Y-m-d"),
		];
		$where = ['id_shipment IN (' . $post['id'] . ')' => NULL];
		$this->shipment_mod->shipment_detail_update_process_db($form_data, $where);

		foreach ($id_arr as $key => $value) {
			$where = [
				'id' => $value
			];
			$shipment 				= $this->shipment_mod->shipment_list_db($where);
			$billing_account = $shipment[0]['billing_account'];
			if ($billing_account == '') {
				$where = [
					"id_shipment" => $value
				];
				$datadb = $this->shipment_mod->shipment_history_list_db($where);
				$history = $datadb[0];

				$where 			= ["id" => $value];
				$shipment = $this->shipment_mod->shipment_list_db($where);

				if ($shipment[0]['billing_account'] == '' || $shipment[0]['billing_account'] == NULL) {
					$form_data = array(
						'id_shipment' 	=> $value,
						'date' 					=> date("Y-m-d"),
						'time' 					=> date("H:i:s"),
						'location' 			=> $history['location'],
						'status' 				=> "Service Center",
						'remarks' 			=> "Shipment Bill is Paid.",
					);
					$id_history = $this->shipment_mod->shipment_history_create_process_db($form_data);

					$form_data 	= ["status" => "Service Center"];
					$where 			= ["id" => $value];
					$this->shipment_mod->shipment_update_process_db($form_data, $where);
				}
			}
		}

		$this->session->set_flashdata('success', 'Your Shipment data has been Updated!');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function shipment_paid_attachment($id)
	{
		$datadb = $this->shipment_mod->shipment_invoice_list_db(["id_shipment" => $id]);
		if (count($datadb) == 0) {
			$this->session->set_flashdata('error', 'Paid Attachment is no uploaded!');
			redirect($_SERVER['HTTP_REFERER']);
		}

		$invoice = $datadb[0];
		if ($invoice['paid_attachment'] == "") {
			$this->session->set_flashdata('error', 'Paid Attachment is no uploaded!');
			redirect($_SERVER['HTTP_REFERER']);
		}

		redirect(base_url() . "file/invoice/" . $invoice['paid_attachment']);
	}

	public function shipment_export_excel()
	{
		$post = $this->input->post();
		$id_arr = explode(", ", $post['id']);

		$where['shipment.id IN (' . $post['id'] . ')'] = NULL;
		$order_by = NULL;
		if ($this->session->userdata('role') == "Driver") {
			$order_by["assign_driver_date"] = "DESC";
		}

		$where['status_delete'] 	= 1;
		$datadb 				= $this->shipment_mod->shipment_list_db($where, null, $order_by);
		$shipment_list 	= [];
		$express_list 	= [];
		$created_by 	= [];
		foreach ($datadb as $key => $value) {
			if ($value['sea'] == "Express" && !in_array($value['status'], array("Delivered", "Canceled"))) {
				$express_list[] = $value;
			} else {
				$shipment_list[] = $value;
			}
			if (!in_array($value['created_by'], $created_by)) {
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
		if (count($created_by) > 0 && $this->session->userdata('role') == "Super Admin") {
			unset($where);
			$where["id IN ('" . join("', '", $created_by) . "')"] 	= NULL;
			$datadb 	= $this->home_mod->user_list($where);
			foreach ($datadb as $key => $value) {
				$created_by_list[$value['id']] = $value['name'];
			}
		}
		$data['created_by_list'] = $created_by_list;

		$data['country'] = $this->shipment_mod->country_list_db();
		$this->load->view('shipment/shipment_export_excel', $data);
	}

	public function shipment_export_pdf()
	{
		$post = $this->input->post();
		$id_arr = explode(", ", $post['id']);

		$where['shipment.id IN (' . $post['id'] . ')'] = NULL;
		$order_by = NULL;

		$where['status_delete'] 	= 1;
		$datadb 				= $this->shipment_mod->shipment_list_db($where, null, $order_by);

		$data['type_of_mode'] = [];
		foreach ($datadb as $row) {
			$data['type_of_mode'][$row['id']] = $row['type_of_mode'];
		}

		$data['shipment_list'] = $datadb;

		unset($where);
		$where['id_shipment IN (' . $post['id'] . ')'] = NULL;
		$data['packages_list'] 					= $this->shipment_mod->master_tracking_packages_list_db($where);

		$data['master_tracking'] = $post['master_tracking'];

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Master-tracking-detail-" . date('Y-m-d H:i:s') . ".pdf";
		$this->pdf->load_view('master_tracking/master_tracking_detail_pdf', $data);
	}

	public function shipment_pending_payment($id_shipment)
	{

		$form_data = array(
			'status' 		=> "Pending Payment",
		);
		$where['id'] = $id_shipment;
		$this->shipment_mod->shipment_update_process_db($form_data, $where);

		unset($where);
		$where = [
			"id_shipment" => $id_shipment
		];
		$datadb = $this->shipment_mod->shipment_history_list_db($where);
		$history = $datadb[0];

		$form_data = array(
			'id_shipment' 	=> $id_shipment,
			'date' 					=> date("Y-m-d"),
			'time' 					=> date("H:i:s"),
			'location' 			=> $history['location'],
			'status' 				=> "Pending Payment",
			'remarks' 			=> "",
		);
		$id_history = $this->shipment_mod->shipment_history_create_process_db($form_data);

		$this->session->set_flashdata('success', 'Your Shipment status has changed to Pending Payment!');
		redirect($_SERVER['HTTP_REFERER']);
	}
}
