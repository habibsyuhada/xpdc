<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Commercial extends CI_Controller
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
        $this->load->model('commercial_mod');
        $this->load->model('branch_mod');
    }

    public function index()
    {
        redirect("commercial/custumer_list");
    }

    public function customer_list()
    {
        if ($this->session->userdata('role') == "Commercial") {
            $where["create_by"] 	= $this->session->userdata('id');
            $data['customer_list']     = $this->commercial_mod->customer_list_db($where);
        }else{
            $data['customer_list']     = $this->commercial_mod->customer_list_db();
        }
        $data['subview']            = 'commercial/customer_list';
        $data['meta_title']         = 'Customer List';
        $this->load->view('index', $data);
    }

    public function customer_create()
    {
        $data['country'] = json_decode(file_get_contents("./assets/country/country.json"), true);

        $data['payment_terms_list'] = $this->home_mod->payment_terms_list();

        $data['subview']        = 'commercial/customer_create';
        $data['meta_title']     = 'Create Customer';
        $this->load->view('index', $data);
    }

    public function customer_create_process()
    {
        $post = $this->input->post();

        $where['email'] = $post['email'];
        $customer_list      = $this->commercial_mod->customer_list_db($where);
        if (count($customer_list) > 0) {
            $this->session->set_flashdata('error', 'Duplicate Customer!');
            redirect("commercial/customer_create");
        }

        // $form_data = array(
        //     'name'                 => $post['name'],
        //     'email'             => $post['email'],
        //     'password'         => MD5("customerxpdc"),
        //     'role'                 => "Customer",
        //     'branch'             => "NONE",
        // );
        // $id_user = $this->commercial_mod->customer_create_process_db($form_data);

        $form_detail_data = array(
            // 'customer_id' => $id_user,
            'name'              => $post['name'],
            'email'             => $post['email'],
            'address'           => $post['address'],
            'city'              => $post['city'],
            'country'           => $post['country'],
            'postcode'          => $post['postcode'],
            'contact_person'    => $post['contact_person'],
            'phone_number'      => $post['phone_number'],

            'payment_terms'         => $post['payment_terms'],
            'discount'              => $post['discount'],
            'vat'                   => $post['vat'],
            'account_name'          => $post['account_name'],
            'account_email'         => $post['account_email'],
            'account_phone_number'  => $post['account_phone_number'],

            'create_by'         => $this->session->userdata('id'),
            'status_delete'     => 1
        );

        $id_detail = $this->commercial_mod->customer_detail_create_process_db($form_detail_data);

        $this->session->set_flashdata('success', 'Your Customer data has been Created!');
        redirect('commercial/customer_create');
    }

    public function customer_update($id)
    {
        $where['id']   = $id;
        $user_list             = $this->commercial_mod->customer_list_db($where);
        if (count($user_list) < 1) {
            $this->session->set_flashdata('error', 'Customer Not Found!');
            redirect("commercial/customer_list");
        }
        $data['customer_list']     = $user_list[0];
        $data['country'] = json_decode(file_get_contents("./assets/country/country.json"), true);

        $data['payment_terms_list'] = $this->home_mod->payment_terms_list();

        $data['subview']            = 'commercial/customer_update';
        $data['meta_title']         = 'Customer Update';
        $this->load->view('index', $data);
    }

    public function customer_update_process($id)
    {
        $post = $this->input->post();

        $form_data = array(
            'name'               => $post['name']
        );
        $where['id'] = $post['customer_id'];
        $id_user = $this->commercial_mod->customer_update_process_db($form_data, $where);

        $form_detail_data = array(
            'name'              => $post['name'],
            'address'           => $post['address'],
            'city'              => $post['city'],
            'country'           => $post['country'],
            'postcode'          => $post['postcode'],
            'contact_person'    => $post['contact_person'],
            'phone_number'      => $post['phone_number'],

            'payment_terms'         => $post['payment_terms'],
            'discount'              => $post['discount'],
            'vat'                   => $post['vat'],
            'account_name'          => $post['account_name'],
            'account_email'         => $post['account_email'],
            'account_phone_number'  => $post['account_phone_number'],
        );
        $where_detail['id'] = $id;
        $id_detail_customer = $this->commercial_mod->customer_detail_update_process_db($form_detail_data, $where_detail);

        $this->session->set_flashdata('success', 'Your Customer data has been Updated!');
        redirect('commercial/customer_update/' . $id);
    }

    public function customer_rest_password($id)
    {
        $form_data = array(
            'password' => MD5("123"),
        );
        $where['id'] = $id;
        $id_user = $this->commercial_mod->customer_update_process_db($form_data, $where);

        $this->session->set_flashdata('success', 'This Customer Has Been Reset<br> New Password : 123!');
        redirect('commercial/customer_list');
    }

    public function customer_delete_process($id){
		$where['id'] = $id;
		$this->commercial_mod->customer_delete_process_db($where);

		$this->session->set_flashdata('success', 'Your Customer data has been Deleted!');
		redirect('commercial/customer_list');
    }
    
    public function customer_approval_process($id){
        $where['id'] = $id;
        $customer_list      = $this->commercial_mod->customer_list_db($where);
        if (count($customer_list) < 1) {
            $this->session->set_flashdata('error', 'Customer Not Found!');
            redirect("commercial/customer_list");
        }
        $customer_list = $customer_list[0];
        
        $where = [
            'email'             => $customer_list['email'],
        ];
        $user_list = $this->home_mod->user_list($where);
        if (count($user_list) > 0) {
            $this->session->set_flashdata('error', 'Duplicate Customer Account!');
            redirect("commercial/customer_list");
        }

        // $where = [
        //     "account_no != ''"             => NULL,
        // ];
        // $account_no = $this->commercial_mod->customer_generate_account_no_db($where);

        $where = [
            'id'             => $customer_list['create_by'],
        ];
        $user_list = $this->home_mod->user_list($where);
        $user_list = $user_list[0];

        $form_data = array(
            'name'              => $customer_list['name'],
            'email'             => $customer_list['email'],
            'password'          => MD5("customerxpdc"),
            'role'              => "Customer",
            'branch'            => $user_list['branch'],
        );
        $id_user = $this->commercial_mod->customer_create_process_db($form_data);
        
        do {
            $random_no = rand(0,9999);
            $random_no = str_pad($random_no, 4, '0', STR_PAD_LEFT);
            if($user_list['branch'] == 'TANGERANG'){
                $random_no = "21".$random_no;
            }
            elseif($user_list['branch'] == 'BATAM'){
                $random_no = "78".$random_no;
            }
            else{
                $random_no = "00".$random_no;
            }
        } while(count($this->commercial_mod->customer_check_account_no($random_no)) > 0);

        $form_detail_data = array(
            'account_no'        => $random_no,
            'customer_id'       => $id_user,
            'status_approval'   => 1,
        );
        $where_detail['id']     = $id;
        $id_detail_customer     = $this->commercial_mod->customer_detail_update_process_db($form_detail_data, $where_detail);
        $this->session->set_flashdata('success', 'This Customer Has Been Approved!<br>Password Account: customerxpdc');
        redirect('commercial/customer_list');
    }

    public function table_rate_list($id)
	{
		$data['id_customer'] = $id;
		$data['zone'] = $this->branch_mod->zone_list_db();

		$data['subview']            = 'commercial/table_rate_list';
		$data['meta_title']         = 'Table Rate List';
		$this->load->view('index', $data);
	}

	public function load_table_rate()
	{
		$post = $this->input->post();
		$where = array('id_customer' => $post['id_customer'], 'type_of_mode' => $post['type_of_mode'], 'zone' => $post['zone'], 'subzone' => $post['subzone'], 'rate_type' => "fix rate");
		$data['table_rate_fix'] = $this->branch_mod->table_rate_list_db($where);

		unset($where);
		$where = array('id_customer' => $post['id_customer'], 'type_of_mode' => $post['type_of_mode'], 'zone' => $post['zone'], 'subzone' => $post['subzone'], 'rate_type' => "multiply rate");
		$data['table_rate_multiply'] = $this->branch_mod->table_rate_list_db($where);

		$data['id_customer'] = $post['id_customer'];
		$data['type_of_mode'] = $post['type_of_mode'];
		$data['zone'] = $post['zone'];
		$data['subzone'] = $post['subzone'];

		$this->load->view("commercial/load_table_rate", $data);
	}

	public function load_table_rate_domestic()
	{
		$where['id_customer'] = $this->input->post('id_customer');
		$data['table_rate'] = $this->branch_mod->table_rate_domestic_list_db($where);

		unset($where);
		$where['country'] = "Indonesia";
		$country = $this->branch_mod->country_list_db($where);
		$get_country = $country[0];

		unset($where);
		$where['id_country'] = $get_country['id'];
		$data['city'] = $this->branch_mod->city_list_db($where);
		$data['id_customer'] = $this->input->post('id_customer');

		$this->load->view("commercial/load_table_rate_domestic", $data);
	}

	public function edit_table_rate()
	{
		$where['id'] = $this->input->post('id');
		$table_rate_list = $this->branch_mod->table_rate_list_db($where);

		$data['table_rate'] = $table_rate_list[0];

		$this->load->view('commercial/edit_table_rate', $data);
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

		$this->load->view('commercial/edit_table_rate_domestic', $data);
	}

	public function table_rate_create_process_fix()
	{
		$post = $this->input->post();

		$data = array(
			'id_customer' => $post['id_customer'],
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
			'id_customer' => $post['id_customer'],
			'city' => $post['city'],
			'airfreight_price_kg' => $post['airfreight_price_kg'],
			'airfreight_term' => $post['airfreight_term'],
			'landfreight_price_kg' => $post['landfreight_price_kg'],
			'landfreight_term' => $post['landfreight_term'],
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
			'id_customer' => $post['id_customer'],
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
			'airfreight_price_kg'	=> $post['airfreight_price_kg'],
			'airfreight_term'	=> $post['airfreight_term'],
			'landfreight_price_kg'	=> $post['landfreight_price_kg'],
			'landfreight_term'	=> $post['landfreight_term'],
			'seafreight_price_kg'	=> $post['seafreight_price_kg'],
			'seafreight_term'	=> $post['seafreight_term'],
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

		$where['id_customer'] = $id;
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
		$where['id_customer']			= $id;
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
				$where['id_customer'] = $id;
				$this->branch_mod->table_rate_delete_process_db($where);
				$i = 0;
				$handle = fopen($file, "r") or die("can't open file");
				while (($row = fgetcsv($handle, 2048, $delimiter))) {
					$i++;
					if ($i == 1) continue;

					$data = [
						'id_customer' => $id,
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

					$id_customer = $this->branch_mod->table_rate_create_process_db($data);
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
