<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Table_rate extends CI_Controller
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
        $this->load->model('table_rate_mod');
    }

    public function index()
    {
        redirect("table_rate/table_rate_list");
    }

    public function table_rate_list()
    {
        $data['table_rate_list']     = $this->table_rate_mod->table_rate_list_db();

        $data['subview']                 = 'table_rate/table_rate_list';
        $data['meta_title']         = 'Table Rate List';
        $this->load->view('index', $data);
    }

    public function table_rate_create()
    {
        $data['branch'] = $this->table_rate_mod->table_rate_branch_list_db();
        $data['zone'] = $this->table_rate_mod->table_rate_zone_list_db();

        $data['subview']                 = 'table_rate/table_rate_create';
        $data['meta_title']         = 'Table Rate Create';
        $this->load->view('index', $data);
    }

    public function table_rate_create_process()
    {
        $post = $this->input->post();

        $where["id_branch = '" . $post['branch'] . "' AND id_zone = '" . $post['zone'] . "'"]         = NULL;
        $zone_list             = $this->table_rate_mod->table_rate_list_db($where);
        if (count($zone_list) > 0) {
            $this->session->set_flashdata('error', 'Duplicate Branch Zone!');
            redirect($_SERVER['HTTP_REFERER']);
        }

        $form_data = array(
            'id_branch'               => $post['branch'],
            'zone'                  => $post['zone'],
            'type_of_mode'              => $post['type_of_mode'],
            'price'                 => $post['price'],
            'created_by'            => $this->session->userdata('id')
        );
        $id_table_rate = $this->table_rate_mod->table_rate_create_process_db($form_data);

        $this->session->set_flashdata('success', 'Your Table Rate data has been Created!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function table_rate_update($id)
    {
        $where['id']                 = $id;
        $table_rate_list                     = $this->table_rate_mod->table_rate_list_db($where);
        if (count($table_rate_list) < 1) {
            // $this->session->set_flashdata('error', 'Agent Not Found!');
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['branch'] = $this->table_rate_mod->table_rate_branch_list_db();
        $data['zone'] = $this->table_rate_mod->table_rate_zone_list_db();
        $data['table_rate_list']     = $table_rate_list[0];

        $data['subview']            = 'table_rate/table_rate_update';
        $data['meta_title']         = 'Table Rate Update';
        $this->load->view('index', $data);
    }

    public function table_rate_update_process($id)
    {
        $post = $this->input->post();

        $form_data = array(
            'id_branch'        => $post['branch'],
            'zone'             => $post['zone'],
            'type_of_mode'         => $post['type_of_mode'],
            'price' => $post['price']
        );
        $where['id'] = $id;
        $id_table_rate = $this->table_rate_mod->table_rate_update_process_db($form_data, $where);

        $this->session->set_flashdata('success', 'Your Table Rate data has been Updated!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function table_rate_delete_process($id)
    {
        $where['id'] = $id;
        $this->table_rate_mod->table_rate_delete_process_db($where);

        $this->session->set_flashdata('success', 'Your Table Rate data has been Deleted!');
        redirect($_SERVER['HTTP_REFERER']);
    }
}
