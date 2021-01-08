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
        $data['branch_list']    = $this->zone_mod->branch_list_db();
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
            'id_branch'                 => $post['branch'],
            'zone_name'                 => $post['zone_name'],
            'category'             => $post['category'],
            'created_by'         => $this->session->userdata('id')
        );
        $id_zone = $this->zone_mod->zone_create_process_db($form_data);

        unset($form_data);

        foreach ($post['country'] as $value) {
            $form_data[] = array("id_zone" => $id_zone,"country" => $value);
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
            // $this->session->set_flashdata('error', 'Agent Not Found!');
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['zone_list']     = $zone_list[0];
        $data['branch_list']    = $this->zone_mod->branch_list_db();
        $data['country']        = $this->zone_mod->country_list_db();
        $detail_loop         = $this->zone_mod->zone_detail_list_db(array('id_zone' => $id));
        $data_detail = array();
        foreach($detail_loop as $datas){
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
            'id_branch'                 => $post['branch'],
            'zone_name'                 => $post['zone_name'],
            'category'             => $post['category'],
        );
        $where['id'] = $id;
        $this->zone_mod->zone_update_process_db($form_data, $where);

        unset($form_data);

        $delete = $this->zone_mod->zone_detail_delete_process_db(array('id_zone' => $id));

        foreach ($post['country'] as $value) {
            $form_data[] = array("id_zone" => $id,"country" => $value);
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

        $this->session->set_flashdata('success', 'Your Zone data has been Deleted!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function table_rate_list($id)
    {
        $where['id_zone']                 = $id;
        $table_rate_list                  = $this->zone_mod->table_rate_list_db($where);
        if (count($table_rate_list) < 1) {
            // $this->session->set_flashdata('error', 'Agent Not Found!');
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['table_rate_list']     = $table_rate_list;

        $data['subview']            = 'zone/table_rate_list';
        $data['meta_title']         = 'Table Rate List';
        $this->load->view('index', $data);
    }
}
