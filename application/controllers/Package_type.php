<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Package_type extends CI_Controller
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
        $this->load->model('package_type_mod');
    }

    public function index()
    {
        redirect("package_type/package_type_list");
    }

    public function package_type_list()
    {
        $data['package_type_list']     = $this->package_type_mod->package_type_list_db();

        $data['subview']                 = 'package_type/package_type_list';
        $data['meta_title']         = 'Package Type List';
        $this->load->view('index', $data);
    }

    public function package_type_create()
    {
        $data['subview']                 = 'package_type/package_type_create';
        $data['meta_title']         = 'Package Type Create';
        $this->load->view('index', $data);
    }

    public function package_type_create_process()
    {
        $post = $this->input->post();

        $where["name = '" . $post['name'] . "'"]         = NULL;
        $package_type_list             = $this->package_type_mod->package_type_list_db($where);
        if (count($package_type_list) > 0) {
            $this->session->set_flashdata('error', 'Duplicate Package Type!');
            redirect($_SERVER['HTTP_REFERER']);
        }

        $form_data = array(
            'name'               => $post['name'],
            'created_by'         => $this->session->userdata('id')
        );
        $id_package_type = $this->package_type_mod->package_type_create_process_db($form_data);

        $this->session->set_flashdata('success', 'Your package type data has been Created!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function package_type_update($id)
    {
        $where['id']                 = $id;
        $package_type_list                     = $this->package_type_mod->package_type_list_db($where);
        if (count($package_type_list) < 1) {
            // $this->session->set_flashdata('error', 'Agent Not Found!');
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['package_type_list']     = $package_type_list[0];

        $data['subview']                 = 'package_type/package_type_update';
        $data['meta_title']         = 'Package Type Update';
        $this->load->view('index', $data);
    }

    public function package_type_update_process($id)
    {
        $post = $this->input->post();

        $form_data = array(
            'name'  => $post['name'],
        );
        $where['id'] = $id;
        $id_package_type = $this->package_type_mod->package_type_update_process_db($form_data, $where);

        $this->session->set_flashdata('success', 'Your package type data has been Updated!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function package_type_delete_process($id)
    {
        $where['id'] = $id;
        $this->package_type_mod->package_type_delete_process_db($where);

        $this->session->set_flashdata('success', 'Your package type data has been Deleted!');
        redirect($_SERVER['HTTP_REFERER']);
    }
}
