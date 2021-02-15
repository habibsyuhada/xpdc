<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('home_mod');
        $this->load->model('branch_mod');
    }

    public function index()
    {
        redirect("customer/table_rate_list");
    }

    public function table_rate_list()
    {
        $where = array('customer_id' => $this->session->userdata("id"));
        $customer = $this->home_mod->customer_list($where);
        $id_customer = $customer[0]['id'];

        unset($where);
        $where['id_customer'] = $id_customer;
        $get = $this->branch_mod->table_rate_list_db($where);
        if (count($get) > 0) {
            $data['status_branch'] = 0;
        } else {
            $data['status_branch'] = 1;
        }

        $data['branch'] = $this->branch_mod->branch_list_db(array("name != 'None'" => NULL));

        $data['id_customer'] = $this->session->userdata("id");
        $data['zone'] = $this->branch_mod->zone_list_db();

        $data['subview']            = 'customer/table_rate_list';
        $data['meta_title']         = 'Table Rate List';
        $this->load->view('index', $data);
    }

    public function load_table_rate()
    {
        $post = $this->input->post();

        $where = array('customer_id' => $post['id_customer']);
        $customer = $this->home_mod->customer_list($where);
        $customers = $customer[0];

        unset($where);
        $id_customer = $customers['id'];
        $where = array('id_customer' => $id_customer);
        $table_rate_fix = $this->branch_mod->table_rate_list_db($where);

        unset($where);
        if (count($table_rate_fix) > 0) {
            $where = array('id_customer' => $id_customer, 'type_of_mode' => $post['type_of_mode'], 'zone' => $post['zone'], 'subzone' => $post['subzone'], 'rate_type' => "fix rate");
            $data['table_rate_fix'] = $this->branch_mod->table_rate_list_db($where);

            unset($where);
            $where = array('id_customer' => $id_customer, 'type_of_mode' => $post['type_of_mode'], 'zone' => $post['zone'], 'subzone' => $post['subzone'], 'rate_type' => "multiply rate");
            $data['table_rate_multiply'] = $this->branch_mod->table_rate_list_db($where);
        } else {
            $where = array('id_branch' => $post['branch'], 'type_of_mode' => $post['type_of_mode'], 'zone' => $post['zone'], 'subzone' => $post['subzone'], 'rate_type' => "fix rate");
            $data['table_rate_fix'] = $this->branch_mod->table_rate_list_db($where);

            unset($where);
            $where = array('id_branch' => $post['branch'], 'type_of_mode' => $post['type_of_mode'], 'zone' => $post['zone'], 'subzone' => $post['subzone'], 'rate_type' => "multiply rate");
            $data['table_rate_multiply'] = $this->branch_mod->table_rate_list_db($where);
        }

        $data['id_customer'] = $id_customer;
        $data['type_of_mode'] = $post['type_of_mode'];
        $data['zone'] = $post['zone'];
        $data['subzone'] = $post['subzone'];

        $this->load->view("customer/load_table_rate", $data);
    }

    public function load_table_rate_domestic()
    {
        $post = $this->input->post();
        $where['customer_id'] = $this->session->userdata('id');
        $customer = $this->home_mod->customer_list($where);
        $id_customer = $customer[0]['id'];

        if (isset($post['branch'])) {
            unset($where);
            $where['id_branch'] = $post['branch'];
            $data['table_rate'] = $this->branch_mod->table_rate_domestic_list_db($where);
        } else {
            unset($where);
            $where['id_customer'] = $id_customer;
            $data['table_rate'] = $this->branch_mod->table_rate_domestic_list_db($where);
        }

        unset($where);
        $where['country'] = "Indonesia";
        $country = $this->branch_mod->country_list_db($where);
        $get_country = $country[0];

        unset($where);
        $where['id_country'] = $get_country['id'];
        $data['city'] = $this->branch_mod->city_list_db($where);
        $data['id_customer'] = $this->input->post('id_customer');

        $this->load->view("customer/load_table_rate_domestic", $data);
    }

    public function load_subzone()
    {
        $post = $this->input->post();

        $zone = $post['zone'];
        $where['id_zone'] = $zone;
        $subzone_list = $this->branch_mod->subzone_list_db($where);
        echo json_encode($subzone_list);
    }
}
