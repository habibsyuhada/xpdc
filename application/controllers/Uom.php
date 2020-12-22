<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uom extends CI_Controller
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
        $this->load->model('uom_mod');
    }

    public function index()
    {
        redirect("uom/uom_list");
    }

    public function uom_list()
    {
        $data['uom_list']     = $this->uom_mod->uom_list_db();

        $data['subview']                 = 'uom/uom_list';
        $data['meta_title']         = 'Uom List';
        $this->load->view('index', $data);
    }

    public function uom_create()
    {
        $data['subview']                 = 'uom/uom_create';
        $data['meta_title']         = 'Uom Create';
        $this->load->view('index', $data);
    }

    public function uom_create_process()
    {
        $post = $this->input->post();

        $where["name = '" . $post['name'] . "'"]         = NULL;
        $uom_list             = $this->uom_mod->uom_list_db($where);
        if (count($uom_list) > 0) {
            $this->session->set_flashdata('error', 'Duplicate UOM!');
            redirect($_SERVER['HTTP_REFERER']);
        }

        $form_data = array(
            'name'               => $post['name'],
            'calc'               => $post['calc'],
            'created_by'         => $this->session->userdata('id')
        );
        $id_uom = $this->uom_mod->uom_create_process_db($form_data);

        $this->session->set_flashdata('success', 'Your Uom data has been Created!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function uom_update($id)
    {
        $where['id']                 = $id;
        $uom_list                     = $this->uom_mod->uom_list_db($where);
        if (count($uom_list) < 1) {
            // $this->session->set_flashdata('error', 'Agent Not Found!');
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['uom_list']     = $uom_list[0];

        $data['subview']                 = 'uom/uom_update';
        $data['meta_title']         = 'Uom Update';
        $this->load->view('index', $data);
    }

    public function uom_update_process($id)
    {
        $post = $this->input->post();

        $form_data = array(
            'name'  => $post['name'],
            'calc'  => $post['calc'],
        );
        $where['id'] = $id;
        $id_uom = $this->uom_mod->uom_update_process_db($form_data, $where);

        $this->session->set_flashdata('success', 'Your Uom data has been Updated!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function uom_delete_process($id)
    {
        $where['id'] = $id;
        $this->uom_mod->uom_delete_process_db($where);

        $this->session->set_flashdata('success', 'Your Uom data has been Deleted!');
        redirect($_SERVER['HTTP_REFERER']);
    }
}
