<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Zone extends CI_Controller
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
        cek_login();
        $this->load->model('home_mod');
        $this->load->model('zone_mod');
    }

    public function index()
    {
        redirect("zone/zone_list");
    }

    public function zone_list()
    {
        $data['zone_list']      = $this->zone_mod->zone_list_db_query();

        $data['subview']                 = 'zone/zone_list';
        $data['meta_title']         = 'Zone List';
        $this->load->view('index', $data);
    }

    public function zone_create()
    {
        $data['country']        = $this->zone_mod->country_list_db();

        $data['subview']                 = 'zone/zone_create';
        $data['meta_title']         = 'Zone Create';
        $this->load->view('index', $data);
    }

    public function get_country()
    {
        $country        = $this->zone_mod->country_list_db();
        $list = array();

        foreach ($country as $data) {
            $list[] = $data['country'];
        }
        echo json_encode($list);
    }

    public function zone_create_process()
    {
        $post = $this->input->post();

        // print_r($post);
        // die();

        $where["zone_name = '" . $post['zone_name'] . "'"]         = NULL;
        $zone_list             = $this->zone_mod->zone_list_db($where);
        if (count($zone_list) > 0) {
            $this->session->set_flashdata('error', 'Duplicate Country!');
            redirect($_SERVER['HTTP_REFERER']);
        }

        $form_data = array(
            'zone_name'                 => $post['zone_name'],
            'created_by'         => $this->session->userdata('id')
        );
        $id_zone = $this->zone_mod->zone_create_process_db($form_data);

        unset($form_data);

        foreach ($post['country'] as $value) {
            $form_data[] = array("id_zone" => $id_zone, "country" => $value);
        }
        $this->zone_mod->zone_detail_create_process_db($form_data);

        $this->session->set_flashdata('success', 'Your Zone data has been Created!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function zone_update($id)
    {
        $where['id']                 = $id;
        $zone_list                     = $this->zone_mod->zone_list_db($where);
        if (count($zone_list) < 1) {
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['zone_list']     = $zone_list[0];
        $data['country']        = $this->zone_mod->country_list_db();
        $detail_loop         = $this->zone_mod->zone_detail_list_db(array('id_zone' => $id));
        $data_detail = array();
        foreach ($detail_loop as $datas) {
            $data_detail[] = $datas['country'];
        }
        $data['detail'] = $data_detail;

        $data['subview']                 = 'zone/zone_update';
        $data['meta_title']         = 'Zone Update';
        $this->load->view('index', $data);
    }

    public function zone_update_process($id)
    {
        $post = $this->input->post();

        $form_data = array(
            'zone_name'                 => $post['zone_name'],
        );
        $where['id'] = $id;
        $this->zone_mod->zone_update_process_db($form_data, $where);

        unset($form_data);

        $delete = $this->zone_mod->zone_detail_delete_process_db(array('id_zone' => $id));

        foreach ($post['country'] as $value) {
            $form_data[] = array("id_zone" => $id, "country" => $value);
        }
        $this->zone_mod->zone_detail_create_process_db($form_data);

        $this->session->set_flashdata('success', 'Your Zone data has been Updated!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function zone_delete_process($id)
    {
        $where['id'] = $id;
        $this->zone_mod->zone_delete_process_db($where);

        unset($where);
        $where['id_zone'] = $id;
        $this->zone_mod->zone_detail_delete_process_db($where);

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function subzone_list($id)
    {
        $where['id_zone']                 = $id;
        $subzone_list                  = $this->zone_mod->subzone_list_db($where);
        $data['id_zone'] = $id;

        $data['sub_zone'] = $subzone_list;

        $data['subview']            = 'zone/subzone_list';
        $data['meta_title']         = 'Sub Zone List';
        $this->load->view('index', $data);
    }

    public function subzone_update($id)
    {
        $where['id']                 = $id;
        $zone_list                   = $this->zone_mod->subzone_list_db($where);
        if (count($zone_list) < 1) {
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['zone_list']          = $zone_list[0];
        $data['subview']            = 'zone/subzone_update';
        $data['meta_title']         = 'Sub Zone Update';
        $this->load->view('index', $data);
    }

    public function table_rate_list($id)
    {
        $where['id_zone']                 = $id;
        $table_rate_list                  = $this->zone_mod->table_rate_list_db($where);
        $data['id_zone'] = $id;

        $data['subview']            = 'zone/table_rate_list';
        $data['meta_title']         = 'Table Rate List';
        $this->load->view('index', $data);
    }

    public function load_table_rate()
    {
        $where = array('id_zone' => $this->input->post('id_zone'), 'rate_type' => "fix rate");
        $data['table_rate_fix'] = $this->zone_mod->table_rate_list_db($where);

        unset($where);
        $where = array('id_zone' => $this->input->post('id_zone'), 'rate_type' => "multiply rate");
        $data['table_rate_multiply'] = $this->zone_mod->table_rate_list_db($where);

        $data['id_zone'] = $this->input->post('id_zone');

        $this->load->view("zone/load_table_rate", $data);
    }

    public function edit_table_rate()
    {
        $where['id'] = $this->input->post('id');
        $table_rate_list = $this->zone_mod->table_rate_list_db($where);

        $data['table_rate'] = $table_rate_list[0];

        $this->load->view('zone/edit_table_rate', $data);
    }

    public function table_rate_create_process_fix()
    {
        $post = $this->input->post();

        $data = array(
            'id_zone' => $post['id_zone'],
            'type_of_mode' => $post['type_of_mode'],
            'rate_type' => $post['rate_type'],
            'default_value' => $post['default_value'],
            'price' => $post['price']
        );

        $this->zone_mod->table_rate_create_process_db($data);
        echo "OK";
    }

    public function table_rate_create_process_multiply()
    {
        $post = $this->input->post();

        $data = array(
            'id_zone' => $post['id_zone'],
            'type_of_mode' => $post['type_of_mode'],
            'rate_type' => $post['rate_type'],
            'min_value' => $post['min_value'],
            'max_value' => $post['max_value'],
            'price' => $post['price']
        );

        $this->zone_mod->table_rate_create_process_db($data);
        echo "OK";
    }

    public function table_rate_update_process($id)
    {
        $post = $this->input->post();

        $form_data = array(
            'type_of_mode' => $post['type_of_mode'],
            'rate_type' => $post['rate_type'],
            'min_value'                 => $post['min_value'],
            'max_value'                 => $post['max_value'],
            'price'             => $post['price'],
        );
        $where['id'] = $id;
        $this->zone_mod->table_rate_update_process_db($form_data, $where);

        $this->session->set_flashdata('success', 'Your Table Rate data has been Updated!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function table_rate_delete_process($id)
    {
        $where['id'] = $id;
        $this->zone_mod->table_rate_delete_process_db($where);

        redirect($_SERVER['HTTP_REFERER']);
    }
}
