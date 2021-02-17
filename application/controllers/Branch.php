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
			'no_telp' 			=> $post['no_telp'],
			'address' 			=> $post['address'],
			'latitude' 			=> $post['latitude'],
			'longitude' 		=> $post['longitude'],
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
			'latitude' 			=> $post['latitude'],
			'longitude' 		=> $post['longitude'],
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
		$where = array('id_branch' => $post['id_branch'], 'type_of_mode' => $post['type_of_mode'], 'zone' => $post['zone'], 'subzone' => $post['subzone'], 'rate_type' => "fix rate", 'id_customer' => '0');
		$data['table_rate_fix'] = $this->branch_mod->table_rate_list_db($where);

		unset($where);
		$where = array('id_branch' => $post['id_branch'], 'type_of_mode' => $post['type_of_mode'], 'zone' => $post['zone'], 'subzone' => $post['subzone'], 'rate_type' => "multiply rate", 'id_customer' => '0');
		$data['table_rate_multiply'] = $this->branch_mod->table_rate_list_db($where);

		$data['id_branch'] = $post['id_branch'];
		$data['type_of_mode'] = $post['type_of_mode'];
		$data['zone'] = $post['zone'];
		$data['subzone'] = $post['subzone'];

		$this->load->view("branch/load_table_rate", $data);
	}

	public function load_table_rate_domestic()
	{
		$where['id_branch'] = $this->input->post('id_branch');
		$where['id_customer'] = '0';
		$data['table_rate'] = $this->branch_mod->table_rate_domestic_list_db($where);

		unset($where);
		$where['country'] = "Indonesia";
		$country = $this->branch_mod->country_list_db($where);
		$get_country = $country[0];

		unset($where);
		$where['id_country'] = $get_country['id'];
		$data['city'] = $this->branch_mod->city_list_db($where);
		$data['id_branch'] = $this->input->post('id_branch');

		$this->load->view("branch/load_table_rate_domestic", $data);
	}

	public function edit_table_rate()
	{
		$where['id'] = $this->input->post('id');
		$table_rate_list = $this->branch_mod->table_rate_list_db($where);

		$data['table_rate'] = $table_rate_list[0];

		$this->load->view('branch/edit_table_rate', $data);
	}

	public function edit_table_rate_domestic()
	{
		$where['id'] = $this->input->post('id');
		$table_rate_list = $this->branch_mod->table_rate_domestic_list_db($where);

		$data['table_rate'] = $table_rate_list[0];

		unset($where);
		$where['country'] = "Indonesia";
		$country = $this->branch_mod->country_list_db($where);
		$get_country = $country[0];

		unset($where);
		$where['id_country'] = $get_country['id'];
		$data['city'] = $this->branch_mod->city_list_db($where);

		$this->load->view('branch/edit_table_rate_domestic', $data);
	}

	public function table_rate_create_process_fix()
	{
		$post = $this->input->post();

		$data = array(
			'id_branch' => $post['id_branch'],
			'type_of_mode' => $post['type_of_mode'],
			'zone' => $post['zone'],
			'subzone' => $post['subzone'],
			'rate_type' => $post['rate_type'],
			'default_value' => $post['default_value'],
			'price' => $post['price']
		);

		$this->branch_mod->table_rate_create_process_db($data);
		echo "OK";
	}

	public function table_rate_domestic_create_process()
	{
		$post = $this->input->post();

		$data = array(
			'id_branch' => $post['id_branch'],
			'city' => $post['city'],
			'airfreight_min_kg' => $post['airfreight_min_kg'],
			'airfreight_max_kg' => $post['airfreight_max_kg'],
			'airfreight_price_kg' => $post['airfreight_price_kg'],
			'airfreight_term' => $post['airfreight_term'],
			'landfreight_min_kg' => $post['landfreight_min_kg'],
			'landfreight_max_kg' => $post['landfreight_max_kg'],
			'landfreight_price_kg' => $post['landfreight_price_kg'],
			'landfreight_term' => $post['landfreight_term'],
			'seafreight_min_kg' => $post['seafreight_min_kg'],
			'seafreight_max_kg' => $post['seafreight_max_kg'],
			'seafreight_price_kg' => $post['seafreight_price_kg'],
			'seafreight_term' => $post['seafreight_term']
		);

		$this->branch_mod->table_rate_domestic_create_process_db($data);
		echo "OK";
	}

	public function table_rate_create_process_multiply()
	{
		$post = $this->input->post();

		$data = array(
			'id_branch' => $post['id_branch'],
			'type_of_mode' => $post['type_of_mode'],
			'zone' => $post['zone'],
			'subzone' => $post['subzone'],
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
		} else if ($post['rate_type'] == 'multiply rate') {
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

	public function table_rate_domestic_update_process($id)
	{
		$post = $this->input->post();

		$form_data = array(
			'city'             		=> $post['city'],
			'airfreight_min_kg' => $post['airfreight_min_kg'],
			'airfreight_max_kg' => $post['airfreight_max_kg'],
			'airfreight_price_kg' => $post['airfreight_price_kg'],
			'airfreight_term' => $post['airfreight_term'],
			'landfreight_min_kg' => $post['landfreight_min_kg'],
			'landfreight_max_kg' => $post['landfreight_max_kg'],
			'landfreight_price_kg' => $post['landfreight_price_kg'],
			'landfreight_term' => $post['landfreight_term'],
			'seafreight_min_kg' => $post['seafreight_min_kg'],
			'seafreight_max_kg' => $post['seafreight_max_kg'],
			'seafreight_price_kg' => $post['seafreight_price_kg'],
			'seafreight_term' => $post['seafreight_term']
		);

		$where['id'] = $id;
		$this->branch_mod->table_rate_domestic_update_process_db($form_data, $where);

		$this->session->set_flashdata('success', 'Your Table Rate Domestic data has been Updated!');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function table_rate_delete_process($id)
	{
		$where['id'] = $id;
		$this->branch_mod->table_rate_delete_process_db($where);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function table_rate_domestic_delete_process($id)
	{
		$where['id'] = $id;
		$this->branch_mod->table_rate_domestic_delete_process_db($where);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function download_table_rate($id)
	{
		$file_name = 'table_rate_' . date('Ymd') . '.csv';
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=$file_name");
		header("Content-Type: application/csv;");

		$where['id_branch'] = $id;
		$where['id_customer'] = '0';
		// get data 
		$table_rate = $this->branch_mod->table_rate_download_list_db($where);

		// file creation 
		$file = fopen('php://output', 'w');

		$header = array("Type of Mode (Land Shipping/Air Freight - Express/Air Freight - Reguler/Sea Transport - LCL/Sea Transport - FCL)", "Zone", "Sub Zone (if Exists)", "Rate Type (fix rate / multiply rate)", "Default Value (for fix rate)", "Min. Value (for multiply value)", "Max. Value (for multiply value)", "Price");
		fputcsv($file, $header);
		foreach ($table_rate as $key => $value) {
			fputcsv($file, $value);
		}
		fclose($file);
		exit;
	}

	public function download_table_rate_domestic($id)
	{
		$file_name = 'table_rate_domestic_' . date('Ymd') . '.csv';
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=$file_name");
		header("Content-Type: application/csv;");

		$where['id_branch'] = $id;
		$where['id_customer'] = '0';
		// get data 
		$table_rate = $this->branch_mod->table_rate_domestic_download_list_db($where);

		// file creation 
		$file = fopen('php://output', 'w');

		$header = array("City", "Airfreight Min Value", "Airfreight Max Value", "Airfreight / Kg", "Airfreight Term", "Landfreight Min Value", "Landfreight Max Value", "Landfreight / Kg", "Landfreight Term", "Seafreight Min Value", "Seafreight Max Value", "Seafreight / Kg", "Seafreight Term");
		fputcsv($file, $header);
		foreach ($table_rate as $key => $value) {
			fputcsv($file, $value);
		}
		fclose($file);
		exit;
	}

	public function load_subzone()
	{
		$post = $this->input->post();

		$zone = $post['zone'];
		$where['id_zone'] = $zone;
		$subzone_list = $this->branch_mod->subzone_list_db($where);
		echo json_encode($subzone_list);
	}

	public function upload_table_rate($id)
	{
		$where['id_branch']			= $id;
		$where['id_customer'] = '0';
		$branch_list                = $this->branch_mod->table_rate_list_db($where);
		if (count($branch_list) < 1) {
			redirect($_SERVER['HTTP_REFERER']);
		}
		$file = $_FILES['upload_excel']['tmp_name'];
		$ext = explode(".", $_FILES['upload_excel']['name']);
		if (empty($file)) {
			$this->session->set_flashdata('error', 'File is not uploaded!');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			if (strtolower(end($ext)) === 'csv' && $_FILES['upload_excel']['size'] > 0) {
				$delimiter = $this->getFileDelimiter($file);
				unset($where);
				$where['id_branch'] = $id;
				$this->branch_mod->table_rate_delete_process_db($where);
				$i = 0;
				$handle = fopen($file, "r") or die("can't open file");
				while (($row = fgetcsv($handle, 2048, $delimiter))) {
					$i++;
					if ($i == 1) continue;

					$data = [
						'id_branch' => $id,
						'type_of_mode' => $row[0],
						'zone' => $row[1],
						'subzone' => $row[2],
						'rate_type' => $row[3],
						'default_value' => $row[4],
						'min_value' => $row[5],
						'max_value' => $row[6],
						'price' => $row[7],
						'created_by' => $this->session->userdata('id')
					];

					$id_branch = $this->branch_mod->table_rate_create_process_db($data);
				}

				fclose($handle);
				$this->session->set_flashdata('success', 'Your city data has been imported!');
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->session->set_flashdata('error', 'Invalid format file!');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}

	public function upload_table_rate_domestic($id)
	{
		$where['id_branch']			= $id;
		$where['id_customer'] = '0';
		$branch_list                = $this->branch_mod->table_rate_domestic_list_db($where);
		if (count($branch_list) < 1) {
			redirect($_SERVER['HTTP_REFERER']);
		}
		$file = $_FILES['upload_excel']['tmp_name'];
		$ext = explode(".", $_FILES['upload_excel']['name']);
		if (empty($file)) {
			$this->session->set_flashdata('error', 'File is not uploaded!');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			if (strtolower(end($ext)) === 'csv' && $_FILES['upload_excel']['size'] > 0) {
				$delimiter = $this->getFileDelimiter($file);
				unset($where);
				$where['id_branch'] = $id;
				$this->branch_mod->table_rate_domestic_delete_process_db($where);
				$i = 0;
				$handle = fopen($file, "r") or die("can't open file");
				while (($row = fgetcsv($handle, 2048, $delimiter))) {
					$i++;
					if ($i == 1) continue;

					$data = [
						'id_branch' => $id,
						'city' => $row[0],
						'airfreight_min_kg' => $row[1],
						'airfreight_max_kg' => $row[2],
						'airfreight_price_kg' => $row[3],
						'airfreight_term' => $row[4],
						'landfreight_min_kg' => $row[5],
						'landfreight_max_kg' => $row[6],
						'landfreight_price_kg' => $row[7],
						'landfreight_term' => $row[8],
						'seafreight_min_kg' => $row[9],
						'seafreight_max_kg' => $row[10],
						'seafreight_price_kg' => $row[11],
						'seafreight_term' => $row[12]
					];

					$id_branch = $this->branch_mod->table_rate_domestic_create_process_db($data);
				}

				fclose($handle);
				$this->session->set_flashdata('success', 'Your table rate domestic data has been imported!');
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->session->set_flashdata('error', 'Invalid format file!');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}
	function getFileDelimiter($file, $checkLines = 2)
	{
		$file = new SplFileObject($file);
		$delimiters = array(
			',',
			'\t',
			';',
			'|',
			':'
		);
		$results = array();
		$i = 0;
		while ($file->valid() && $i <= $checkLines) {
			$line = $file->fgets();
			foreach ($delimiters as $delimiter) {
				$regExp = '/[' . $delimiter . ']/';
				$fields = preg_split($regExp, $line);
				if (count($fields) > 1) {
					if (!empty($results[$delimiter])) {
						$results[$delimiter]++;
					} else {
						$results[$delimiter] = 1;
					}
				}
			}
			$i++;
		}
		$results = array_keys($results, max($results));
		return $results[0];
	}
}
