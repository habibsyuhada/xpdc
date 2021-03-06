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
    $this->load->model('shipment_mod');
  }

  public function index()
  {
    redirect("customer/check_price");
  }

  public function check_price()
  {
    $data['country'] = $this->customer_mod->country_list_db()->result_array();
    $data['package_type'] = $this->customer_mod->package_type_list_db();
    $data['customer'] = $this->customer_mod->customer_list_db()->result_array();
    $data['branch'] = $this->customer_mod->branch_list_db()->result_array();

    $data['subview']      = 'customer/check_price';
    $data['meta_title']     = 'Check Price';
    $this->load->view('index', $data);
  }

  public function check_price_process()
  {
    $post = $this->input->post();
    $data['post'] = $post;

    if ($this->session->userdata('role') == 'Customer') {
      $customer_post = $this->session->userdata('id');
      $branch_post = $this->session->userdata('branch');

      $where['customer_id'] = $customer_post;
      $customer = $this->customer_mod->customer_list_db($where)->row_array();
      $id_customer = $customer['id'];
      $data['customer']     = $customer;
    } else {
      $branch_post = $this->session->userdata('branch');
      $id_customer = 0;
    }

    unset($where);
    $where['name'] = $branch_post;
    $branch = $this->customer_mod->branch_list_db($where)->row_array();
    $id_branch = $branch['id'];

    $data['branch']     = $branch;
    if (isset($post['country'])) {
      $country = $post['country'];
    } else {
      $country = 'Indonesia';
    }

    $data['country_post']   = $country;
    $data['city_post']    = $post['city'];
    $data['weight_post']  = $post['act_weight'];
    $data['vol_weight_airfreight_post']  = $post['vol_weight_airfreight'];
    $data['vol_weight_landfreight_post']  = $post['vol_weight_landfreight'];
    $data['vol_weight_seafreight_post']  = $post['vol_weight_seafreight'];
    $data['measurement_post']  = $post['measurement'];

    $weight_fix_airfreight = 0;
    if ($post['act_weight'] > $post['vol_weight_airfreight']) {
      $weight_fix_airfreight = $post['act_weight'];
    } else {
      $weight_fix_airfreight = $post['vol_weight_airfreight'];
    }
    $weight_fix_airfreight = ceil($weight_fix_airfreight);

    $weight_fix_landfreight = 0;
    if ($post['act_weight'] > $post['vol_weight_landfreight']) {
      $weight_fix_landfreight = $post['act_weight'];
    } else {
      $weight_fix_landfreight = $post['vol_weight_landfreight'];
    }
    $weight_fix_landfreight = ceil($weight_fix_landfreight);

    $weight_fix_seafreight = 0;
    if ($post['act_weight'] > $post['vol_weight_seafreight']) {
      $weight_fix_seafreight = $post['act_weight'];
    } else {
      $weight_fix_seafreight = $post['vol_weight_seafreight'];
    }
    $weight_fix_seafreight = ceil($weight_fix_seafreight);

    $data['weight_fix_airfreight'] = $weight_fix_airfreight;
    $data['weight_fix_landfreight'] = $weight_fix_landfreight;
    $data['weight_fix_seafreight'] = $weight_fix_seafreight;

    unset($where);
    //domestic
    if ($post['type_of_shipment'] == 'Domestic Shipping') {
      $qry = "SELECT * FROM table_rate_domestic WHERE (('" . $weight_fix_airfreight . "' BETWEEN airfreight_min_kg AND airfreight_max_kg) OR ('" . $weight_fix_landfreight . "' BETWEEN landfreight_min_kg AND landfreight_max_kg) OR ('" . $weight_fix_seafreight . "' BETWEEN seafreight_min_kg AND seafreight_max_kg)) AND city = '" . $post['city'] . "' AND id_customer = '" . $id_customer . "' AND id_branch = 0 ";
      $query = $this->customer_mod->select_manual_query($qry);
      if ($query->num_rows() > 0) {
        $row = $query->result_array();
        $data_airfreight = [];
        $data_landfreight = [];
        $data_seafreight = [];
        $airfreight_price = 0;
        $landfreight_price = 0;
        $seafreight_price = 0;
        foreach ($row as $values) {
          if ($values['airfreight_min_kg'] <= $weight_fix_airfreight && $values['airfreight_max_kg'] >= $weight_fix_airfreight) {
            $data_airfreight = $values;
            $airfreight_price = $values['airfreight_price_kg'];
          }
          if ($values['landfreight_min_kg'] <= $weight_fix_landfreight && $values['landfreight_max_kg'] >= $weight_fix_landfreight) {
            $data_landfreight = $values;
            $landfreight_price = $values['landfreight_price_kg'];
          }
          if ($values['seafreight_min_kg'] <= $weight_fix_seafreight && $values['seafreight_max_kg'] >= $weight_fix_seafreight) {
            $data_seafreight = $values;
            $seafreight_price = $values['seafreight_price_kg'];
          }
        }
        $data['airfreight_weight'] = $weight_fix_airfreight * $airfreight_price;
        $data['landfreight_weight'] = $weight_fix_landfreight * $landfreight_price;
        $data['seafreight_weight'] = $weight_fix_seafreight * $seafreight_price;
        $data['result_airfreight'] = $data_airfreight;
        $data['result_landfreight'] = $data_landfreight;
        $data['result_seafreight'] = $data_seafreight;
        $data['status'] = "202";
        $data['type_of_shipment'] = $post['type_of_shipment'];
      } else {
        // if customer table rate not exists, get from branch
        $qry = "SELECT * FROM table_rate_domestic WHERE (('" . $weight_fix_airfreight . "' BETWEEN airfreight_min_kg AND airfreight_max_kg) OR ('" . $weight_fix_landfreight . "' BETWEEN landfreight_min_kg AND landfreight_max_kg) OR ('" . $weight_fix_seafreight . "' BETWEEN seafreight_min_kg AND seafreight_max_kg)) AND city = '" . $post['city'] . "' AND id_branch = '" . $id_branch . "' AND id_customer = 0 ";
        $query = $this->customer_mod->select_manual_query($qry);
        if ($query->num_rows() > 0) {
          $row = $query->result_array();
          $data_airfreight = [];
          $data_landfreight = [];
          $data_seafreight = [];
          $airfreight_price = 0;
          $landfreight_price = 0;
          $seafreight_price = 0;
          foreach ($row as $values) {
            if ($values['airfreight_min_kg'] <= $weight_fix_airfreight && $values['airfreight_max_kg'] >= $weight_fix_airfreight) {
              $data_airfreight = $values;
              $airfreight_price = $values['airfreight_price_kg'];
            }
            if ($values['landfreight_min_kg'] <= $weight_fix_landfreight && $values['landfreight_max_kg'] >= $weight_fix_landfreight) {
              $data_landfreight = $values;
              $landfreight_price = $values['landfreight_price_kg'];
            }
            if ($values['seafreight_min_kg'] <= $weight_fix_seafreight && $values['seafreight_max_kg'] >= $weight_fix_seafreight) {
              $data_seafreight = $values;
              $seafreight_price = $values['seafreight_price_kg'];
            }
          }
          $data['airfreight_weight'] = $weight_fix_airfreight * $airfreight_price;
          $data['landfreight_weight'] = $weight_fix_landfreight * $landfreight_price;
          $data['seafreight_weight'] = $weight_fix_seafreight * $seafreight_price;
          $data['result_airfreight'] = $data_airfreight;
          $data['result_landfreight'] = $data_landfreight;
          $data['result_seafreight'] = $data_seafreight;
          $data['status'] = "202";
          $data['type_of_shipment'] = $post['type_of_shipment'];
        } else {
          $data['result'] = NULL;
          $data['status'] = "404";
          $data['type_of_shipment'] = $post['type_of_shipment'];
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
        $where = array('id_customer' => $id_customer, 'subzone' => $subzone['sub_zone'], 'default_value' => $weight_fix_airfreight, 'rate_type' => 'fix rate', 'id_branch' => 0);
        $fix_rate = $this->customer_mod->table_rate_list_db($where);

        if ($fix_rate->num_rows() > 0) {
          //if fix rate exists
          $result = $fix_rate->row_array();
          $data['int_price'] = $result['price'];
          $data['result'] = $result;
          $data['status'] = "202";
          $data['type_of_shipment'] = $post['type_of_shipment'];
        } else {
          //if fix rate not exists
          unset($where);
          $where = array('id_customer' => $id_customer, 'subzone' => $subzone['sub_zone'], "'" . $weight_fix_airfreight . "' BETWEEN min_value AND max_value" => NULL, 'rate_type' => 'multiply rate', 'id_branch' => 0);
          $multiply_rate = $this->customer_mod->table_rate_list_db($where);
          if ($multiply_rate->num_rows() > 0) {
            //if multiply rate exists
            $result = $multiply_rate->row_array();
            $data['int_price'] = $weight_fix_airfreight * $result['price'];
            $data['result'] = $multiply_rate;
            $data['status'] = "202";
            $data['type_of_shipment'] = $post['type_of_shipment'];
          } else {
            //if multiply rate not exists, check branch fix rate
            unset($where);
            $where = array('id_branch' => $id_branch, 'subzone' => $subzone['sub_zone'], 'default_value' => $weight_fix_airfreight, 'rate_type' => 'fix rate', 'id_customer' => 0);
            $branch = $this->customer_mod->table_rate_list_db($where);
            if ($branch->num_rows() > 0) {
              // if fix rate branch is exists
              $result = $branch->row_array();
              $data['int_price'] = $result['price'];
              $data['result'] = $result;
              $data['status'] = "202";
              $data['type_of_shipment'] = $post['type_of_shipment'];
            } else {
              // if fix rate branch is not exists
              unset($where);
              $where = array('id_branch' => $id_branch, 'subzone' => $subzone['sub_zone'], "'" . $weight_fix_airfreight . "' BETWEEN min_value AND max_value" => NULL, 'rate_type' => 'multiply rate', 'id_customer' => 0);
              $branch = $this->customer_mod->table_rate_list_db($where);
              if ($branch->num_rows() > 0) {
                $result = $branch->row_array();
                $data['int_price'] = $weight_fix_airfreight * $result['price'];
                $data['result'] = $branch->row_array();
                $data['status'] = "202";
                $data['type_of_shipment'] = $post['type_of_shipment'];
              } else {
                $data['int_price'] = "0";
                $data['result'] = null;
                $data['status'] = "404";
                $data['type_of_shipment'] = $post['type_of_shipment'];
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
          $where = array('id_customer' => $id_customer, 'zone' => $zone['zone_name'], 'default_value' => $weight_fix_airfreight, 'rate_type' => 'fix rate', 'id_branch' => 0);
          $fix_rate = $this->customer_mod->table_rate_list_db($where);

          if ($fix_rate->num_rows() > 0) {
            // if fix rate exists
            $result = $fix_rate->row_array();
            $data['int_price'] = $result['price'];
            $data['result'] = $result;
            $data['status'] = "202";
            $data['type_of_shipment'] = $post['type_of_shipment'];
          } else {
            unset($where);
            $where = array('id_customer' => $id_customer, 'zone' => $zone['zone_name'], "'" . $weight_fix_airfreight . "' BETWEEN min_value AND max_value" => NULL, 'rate_type' => 'multiply rate', 'id_branch' => 0);
            $multiply_rate = $this->customer_mod->table_rate_list_db($where);
            if ($multiply_rate->num_rows() > 0) {
              //if multiply rate exists
              $result = $multiply_rate->row_array();
              $data['int_price'] = $weight_fix_airfreight * $result['price'];
              $data['result'] = $result;
              $data['status'] = "202";
              $data['type_of_shipment'] = $post['type_of_shipment'];
            } else {
              //if multiply rate not exists, check branch fix rate
              unset($where);
              $where = array('id_branch' => $id_branch, 'zone' => $zone['zone_name'], 'default_value' => $weight_fix_airfreight, 'rate_type' => 'fix rate', 'id_customer' => 0);
              $branch = $this->customer_mod->table_rate_list_db($where);
              if ($branch->num_rows() > 0) {
                // if fix rate branch is exists
                $result = $branch->row_array();
                $data['int_price'] = $result['price'];
                $data['result'] = $result;
                $data['status'] = "202";
                $data['type_of_shipment'] = $post['type_of_shipment'];
              } else {
                // if fix rate branch is not exists
                unset($where);
                $where = array('id_branch' => $id_branch, 'zone' => $zone['zone_name'], "'" . $weight_fix_airfreight . "' BETWEEN min_value AND max_value" => NULL, 'rate_type' => 'multiply rate', 'id_customer' => 0);
                $branch = $this->customer_mod->table_rate_list_db($where);
                if ($branch->num_rows() > 0) {
                  //if multiply rate exists
                  $result = $branch->row_array();
                  $data['int_price'] = $weight_fix_airfreight * $result['price'];
                  $data['result'] = $result;
                  $data['status'] = "202";
                  $data['type_of_shipment'] = $post['type_of_shipment'];
                } else {
                  $data['int_price'] = "0";
                  $data['result'] = null;
                  $data['status'] = "404";
                  $data['type_of_shipment'] = $post['type_of_shipment'];
                }
              }
            }
          }
        } else {
          $data['int_price'] = "0";
          $data['result'] = NULL;
          $data['status'] = "404";
          $data['type_of_shipment'] = "International";
        }
      }
    }

    $this->load->view('customer/load_price', $data);
  }

  public function shipment_create()
  {
    $post = $this->input->post();
    $data['subview']       = 'shipment/shipment_create';
    $data['meta_title']   = 'Create Shipment';

    $data['customer'] = $this->shipment_mod->customer_list_db(array("status_delete" => 1, "email" => $this->session->userdata('email')));
    $data['package_type'] = $this->shipment_mod->package_type_list_db();

    $data['quotation']     = [
      "type_of_shipment"        => $post['type_of_shipment'],
      "type_of_transport"       => $post['type_of_mode'],
      "shipper_city"            => $post['shipper_city'],
      "shipper_country"         => $post['shipper_country'],
      "shipper_name"            => @$data['customer'][0]['name'],
      "shipper_address"         => @$data['customer'][0]['address'],
      "shipper_contact_person"  => @$data['customer'][0]['contact_person'],
      "shipper_phone_number"    => @$data['customer'][0]['phone_number'],
      "consignee_city"          => $post['consignee_city'],
      "consignee_country"       => $post['consignee_country'],
      "act_weight"              => $post['act_weight'],
      "check_price_weight"      => $post['check_price_weight'],
      "check_price_weight_fix"  => $post['check_price_weight_fix'],
      "check_price_term"        => $post['check_price_term'],
    ];

    $data['cargo_list'] = [];
    foreach ($post['qty'] as $key => $value) {
      $data['cargo_list'][]  = [
        "qty"           => $post['qty'][$key],
        "piece_type"    => $post['piece_type'][$key],
        "length"        => $post['length'][$key],
        "size"          => $post['size'][$key],
        "width"         => $post['width'][$key],
        "container_no"  => $post['container_no'][$key],
        "height"        => $post['height'][$key],
        "seal_no"       => $post['seal_no'][$key],
        "weight"        => $post['weight'][$key],
      ];
    }

    if ($this->session->userdata('role') == 'Commercial') {
      $data['commercial_create'] = '';
    }

    $data['is_customer'] = 1;


    $datadb   = $this->home_mod->branch_list(["name" => $this->session->userdata('branch')]);
    $data["branch"] = $datadb[0];

    $data['country'] = $this->shipment_mod->country_list_db();
    $this->load->view('index', $data);
  }
}
