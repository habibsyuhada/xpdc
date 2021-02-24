<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('home_mod');
        $this->load->model('customer_mod');
    }

    public function index()
    {
        redirect("customer/check_price");
    }

    public function check_price()
    {
        $data['country'] = $this->customer_mod->country_list_db()->result_array();

        $data['subview']            = 'customer/check_price';
        $data['meta_title']         = 'Check Price';
        $this->load->view('index', $data);
    }

    public function check_price_process()
    {
        $post = $this->input->post();

        $where['customer_id'] = $this->session->userdata('id');
        $customer = $this->customer_mod->customer_list_db($where)->row_array();
        $id_customer = $customer['id'];

        unset($where);
        $where['name'] = $this->session->userdata('branch');
        $branch = $this->customer_mod->branch_list_db($where)->row_array();
        $id_branch = $branch['id'];

        $data['customer'] = $customer;
        $data['branch'] = $branch;
        $data['country_post'] = $post['country'];
        $data['city_post'] = $post['city'];
        $data['weight_post'] = $post['weight'];

        unset($where);
        //domestic
        if ($post['country'] == 'Indonesia') {
            $where = array($post['weight'] . " BETWEEN airfreight_min_kg AND airfreight_max_kg" => NULL, 'city' => $post['city'], 'id_customer' => $id_customer);
            $query = $this->customer_mod->table_rate_domestic_list_db($where);
            if ($query->num_rows() > 0) {
                // if customer table rate exists
                $row = $query->row_array();
                $data['result'] = $row;
                $data['status'] = "202";
                $data['type_of_shipment'] = "Domestic";
            } else {
                // if customer table rate not exists, get from branch
                $where = array($post['weight'] . " BETWEEN airfreight_min_kg AND airfreight_max_kg" => NULL, 'city' => $post['city'], 'id_branch' => $id_branch);
                $query = $this->customer_mod->table_rate_domestic_list_db($where);
                if ($query->num_rows() > 0) {
                    $row = $query->row_array();
                    $data['result'] = $row;
                    $data['status'] = "202";
                    $data['type_of_shipment'] = "Domestic";
                } else {
                    $data['result'] = NULL;
                    $data['status'] = "404";
                    $data['type_of_shipment'] = "Domestic";
                }
            }
        } else {
            $where['city'] = $post['city'];
            $get_subzone = $this->customer_mod->subzone_list_db($where);
            if ($get_subzone->num_rows() > 0) {
                $subzone = $get_subzone->row_array();
                //if city in subzone exists
                unset($where);
                //fix rate
                $where = array('id_customer' => $id_customer, 'subzone' => $subzone['sub_zone'], 'default_value' => $post['weight'], 'rate_type' => 'fix rate');
                $fix_rate = $this->customer_mod->table_rate_list_db($where);

                if ($fix_rate->num_rows() > 0) {
                    //if fix rate exists
                    $data['result'] = $fix_rate->row_array();
                    $data['status'] = "202";
                    $data['type_of_shipment'] = "International";
                } else {
                    //if fix rate not exists
                    unset($where);
                    $where = array('id_customer' => $id_customer, 'subzone' => $subzone['sub_zone'], $post['weight'] . ' BETWEEN min_value AND max_value' => NULL, 'rate_type' => 'multiply rate');
                    $multiply_rate = $this->customer_mod->table_rate_list_db($where);
                    if ($multiply_rate->num_rows() > 0) {
                        //if multiply rate exists
                        $data['result'] = $multiply_rate->row_array();
                        $data['status'] = "202";
                        $data['type_of_shipment'] = "International";
                    } else {
                        //if multiply rate not exists, check branch fix rate
                        unset($where);
                        $where = array('id_branch' => $id_branch, 'subzone' => $subzone['sub_zone'], 'default_value' => $post['weight'], 'rate_type' => 'fix rate');
                        $branch = $this->customer_mod->table_rate_list_db($where);
                        if ($branch->num_rows() > 0) {
                            // if fix rate branch is exists
                            $data['result'] = $branch->row_array();
                            $data['status'] = "202";
                            $data['type_of_shipment'] = "International";
                        } else {
                            // if fix rate branch is not exists
                            unset($where);
                            $where = array('id_branch' => $id_branch, 'subzone' => $subzone['sub_zone'], $post['weight'] . ' BETWEEN min_value AND max_value' => NULL, 'rate_type' => 'multiply rate');
                            $branch = $this->customer_mod->table_rate_list_db($where);
                            if ($branch->num_rows() > 0) {
                                $data['result'] = $branch->row_array();
                                $data['status'] = "202";
                                $data['type_of_shipment'] = "International";
                            } else {
                                $data['result'] = null;
                                $data['status'] = "404";
                                $data['type_of_shipment'] = "International";
                            }
                        }
                    }
                }
            } else {
                //if city in subzone not exists
                unset($where);
                $where['country'] = $post['country'];
                $get_zone = $this->customer_mod->zone_list_db($where);
                if ($get_zone->num_rows() > 0) {
                    $zone = $get_zone->row_array();
                    //if country in zone exists
                    unset($where);
                    //fix rate
                    $where = array('id_customer' => $id_customer, 'zone' => $zone['zone_name'], 'default_value' => $post['weight'], 'rate_type' => 'fix rate');
                    $fix_rate = $this->customer_mod->table_rate_list_db($where);

                    if ($fix_rate->num_rows() > 0) {
                        // if fix rate exists
                        $data['result'] = $fix_rate->row_array();
                        $data['status'] = "202";
                        $data['type_of_shipment'] = "International";
                    } else {
                        unset($where);
                        $where = array('id_customer' => $id_customer, 'zone' => $zone['zone_name'], $post['weight'] . ' BETWEEN min_value AND max_value' => NULL, 'rate_type' => 'multiply rate');
                        $multiply_rate = $this->customer_mod->table_rate_list_db($where);
                        if ($multiply_rate->num_rows() > 0) {
                            $data['result'] = $multiply_rate->row_array();
                        } else {
                            //if multiply rate not exists, check branch fix rate
                            unset($where);
                            $where = array('id_branch' => $id_branch, 'zone' => $zone['zone_name'], 'default_value' => $post['weight'], 'rate_type' => 'fix rate');
                            $branch = $this->customer_mod->table_rate_list_db($where);
                            if ($branch->num_rows() > 0) {
                                // if fix rate branch is exists
                                $data['result'] = $branch->row_array();
                                $data['status'] = "202";
                                $data['type_of_shipment'] = "International";
                            } else {
                                // if fix rate branch is not exists
                                unset($where);
                                $where = array('id_branch' => $id_branch, 'zone' => $zone['zone_name'], $post['weight'] . ' BETWEEN min_value AND max_value' => NULL, 'rate_type' => 'multiply rate');
                                $branch = $this->customer_mod->table_rate_list_db($where);
                                if ($branch->num_rows() > 0) {
                                    $data['result'] = $branch->row_array();
                                    $data['status'] = "202";
                                    $data['type_of_shipment'] = "International";
                                } else {
                                    $data['result'] = null;
                                    $data['status'] = "404";
                                    $data['type_of_shipment'] = "International";
                                }
                            }
                        }
                    }
                } else {
                    $data['result'] = NULL;
                    $data['status'] = "404";
                    $data['type_of_shipment'] = "International";
                }
            }
        }

        unset($where);
        //fix rate
        $where = array('default_value' => $post['weight'], 'id_customer' => $id_customer, 'rate_type' => 'fix rate');
        $query = $this->customer_mod->table_rate_pickup_list_db($where);
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $data['pickup'] = $row;
        } else {
            //multiply rate
            unset($where);
            $where = array($post['weight'] . " BETWEEN min_value AND max_value" => NULL, 'id_customer' => $id_customer, 'rate_type' => 'multiply rate');
            $query = $this->customer_mod->table_rate_pickup_list_db($where);
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $data['pickup'] = $row;
            } else {
                //fix rate branch
                unset($where);
                $where = array('city' => $customer['city'], 'default_value' => $post['weight'], 'id_branch' => $id_branch, 'rate_type' => 'fix rate');
                $query = $this->customer_mod->table_rate_pickup_list_db($where);
                if ($query->num_rows() > 0) {
                    $row = $query->row_array();
                    $data['pickup'] = $row;
                } else {
                    //multiply rate branch
                    unset($where);
                    $where = array('city' => $customer['city'], $post['weight'] . " BETWEEN min_value AND max_value" => NULL, 'id_branch' => $id_branch, 'rate_type' => 'multiply rate');
                    $query = $this->customer_mod->table_rate_pickup_list_db($where);
                    if ($query->num_rows() > 0) {
                        $row = $query->row_array();
                        $data['pickup'] = $row;
                    } else {
                        $data['pickup'] = NULL;
                    }
                }
            }
        }

        $this->load->view('customer/load_price', $data);
    }
}
