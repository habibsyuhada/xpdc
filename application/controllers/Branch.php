<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Branch extends CI_Controller
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
	 * @see https://codeigniter.com/branch_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		cek_login();
		$this->load->model('home_mod');
		$this->load->model('branch_mod');
	}

	public function index()
	{
		redirect("branch/branch_list");
	}

	public function branch_list()
	{
		$data['branch_list'] 	= $this->branch_mod->branch_list_db();

		$data['subview'] 				= 'branch/branch_list';
		$data['meta_title'] 		= 'Branch List';
		$this->load->view('index', $data);
	}

	public function branch_create()
	{
		$data['subview'] 				= 'branch/branch_create';
		$data['meta_title'] 		= 'Branch Create';
		$this->load->view('index', $data);
	}

	public function branch_create_process()
	{
		$post = $this->input->post();

		$where["name = '" . $post['name'] . "' OR code = '" . $post['code'] . "'"] 		= NULL;
		$branch_list 			= $this->branch_mod->branch_list_db($where);
		if (count($branch_list) > 0) {
			$this->session->set_flashdata('error', 'Duplicate Code or Name Branch!');
			redirect($_SERVER['HTTP_REFERER']);
		}

		$form_data = array(
			'name' 				=> $post['name'],
			'code' 				=> $post['code'],
			'no_telp' 		=> $post['no_telp'],
			'address' 		=> $post['address'],
		);
		$id_branch = $this->branch_mod->branch_create_process_db($form_data);

		$this->session->set_flashdata('success', 'Your Branch data has been Created!');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function branch_update($id)
	{
		$where['id'] 				= $id;
		$branch_list 					= $this->branch_mod->branch_list_db($where);
		if (count($branch_list) < 1) {
			// $this->session->set_flashdata('error', 'Branch Not Found!');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$data['branch_list'] 	= $branch_list[0];

		$data['subview'] 				= 'branch/branch_update';
		$data['meta_title'] 		= 'Branch Update';
		$this->load->view('index', $data);
	}

	public function branch_update_process($id)
	{
		$post = $this->input->post();

		$form_data = array(
			'name' 				=> $post['name'],
			'code' 				=> $post['code'],
			'no_telp' 		=> $post['no_telp'],
			'address' 		=> $post['address'],
		);
		$where['id'] = $id;
		$id_branch = $this->branch_mod->branch_update_process_db($form_data, $where);

		$this->session->set_flashdata('success', 'Your Branch data has been Updated!');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function branch_delete_process($id)
	{
		$where['id'] = $id;
		$this->branch_mod->branch_delete_process_db($where);

		$this->session->set_flashdata('success', 'Your Branch data has been Deleted!');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function table_rate_list($id)
	{
		$data['id_branch'] = $id;
		$data['zone'] = $this->branch_mod->zone_list_db();

		$data['subview']            = 'branch/table_rate_list';
		$data['meta_title']         = 'Table Rate List';
		$this->load->view('index', $data);
	}

	public function load_table_rate()
	{
		$post = $this->input->post();
		$where = array('id_branch' => $post['id_branch'], 'type_of_shipment' => $post['type_of_shipment'], 'type_of_mode' => $post['type_of_mode'], 'zone' => $post['zone'], 'rate_type' => "fix rate");
		$data['table_rate_fix'] = $this->branch_mod->table_rate_list_db($where);

		unset($where);
		$where = array('id_branch' => $post['id_branch'], 'type_of_shipment' => $post['type_of_shipment'], 'type_of_mode' => $post['type_of_mode'], 'zone' => $post['zone'], 'rate_type' => "multiply rate");
		$data['table_rate_multiply'] = $this->branch_mod->table_rate_list_db($where);

		$data['id_branch'] = $post['id_branch'];
		$data['type_of_shipment'] = $post['type_of_shipment'];
		$data['type_of_mode'] = $post['type_of_mode'];
		$data['zone'] = $post['zone'];

		$this->load->view("branch/load_table_rate", $data);
	}

	public function edit_table_rate()
	{
		$where['id'] = $this->input->post('id');
		$table_rate_list = $this->branch_mod->table_rate_list_db($where);

		$data['table_rate'] = $table_rate_list[0];

		$this->load->view('branch/edit_table_rate', $data);
	}

	public function table_rate_create_process_fix()
	{
		$post = $this->input->post();

		$data = array(
			'id_branch' => $post['id_branch'],
			'type_of_shipment' => $post['type_of_shipment'],
			'type_of_mode' => $post['type_of_mode'],
			'id_zone' => $post['id_zone'],
			'rate_type' => $post['rate_type'],
			'default_value' => $post['default_value'],
			'price' => $post['price']
		);

		$this->branch_mod->table_rate_create_process_db($data);
		echo "OK";
	}

	public function table_rate_create_process_multiply()
	{
		$post = $this->input->post();

		$data = array(
			'id_branch' => $post['id_branch'],
			'type_of_shipment' => $post['type_of_shipment'],
			'type_of_mode' => $post['type_of_mode'],
			'id_zone' => $post['id_zone'],
			'rate_type' => $post['rate_type'],
			'min_value' => $post['min_value'],
			'max_value' => $post['max_value'],
			'price' => $post['price']
		);

		$this->branch_mod->table_rate_create_process_db($data);
		echo "OK";
	}

	public function table_rate_update_process($id)
	{
		$post = $this->input->post();

		if ($post['rate_type'] == 'fix rate') {
			$form_data = array(
				'default_value'             => $post['default_value'],
				'price'             		=> $post['price'],
			);
		}else if($post['rate_type'] == 'multiply rate'){
			$form_data = array(
				'min_value'             => $post['min_value'],
				'max_value'             => $post['max_value'],
				'price'             		=> $post['price'],
			);
		}

		$where['id'] = $id;
		$this->branch_mod->table_rate_update_process_db($form_data, $where);

		$this->session->set_flashdata('success', 'Your Table Rate data has been Updated!');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function table_rate_delete_process($id)
	{
		$where['id'] = $id;
		$this->branch_mod->table_rate_delete_process_db($where);

		redirect($_SERVER['HTTP_REFERER']);
	}
}
