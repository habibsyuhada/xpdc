<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment_terms extends CI_Controller
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
        $this->load->model('payment_terms_mod');
    }

    public function index()
    {
        redirect("payment_terms/payment_terms_list");
    }

    public function payment_terms_list()
    {
        $data['payment_terms_list']     = $this->payment_terms_mod->payment_terms_list_db();

        $data['subview']                 = 'payment_terms/payment_terms_list';
        $data['meta_title']         = 'Payment Terms List';
        $this->load->view('index', $data);
    }

    public function payment_terms_create()
    {
        $data['subview']                 = 'payment_terms/payment_terms_create';
        $data['meta_title']         = 'Payment Terms Create';
        $this->load->view('index', $data);
    }

    public function payment_terms_create_process()
    {
        $post = $this->input->post();

        $where["name = '" . $post['name'] . "'"]         = NULL;
        $payment_terms_list             = $this->payment_terms_mod->payment_terms_list_db($where);
        if (count($payment_terms_list) > 0) {
            $this->session->set_flashdata('error', 'Duplicate UOM!');
            redirect($_SERVER['HTTP_REFERER']);
        }

        $form_data = array(
            'name'               => $post['name'],
            'created_by'         => $this->session->userdata('id')
        );
        $st_payment_terms = $this->payment_terms_mod->payment_terms_create_process_db($form_data);

        $this->session->set_flashdata('success', 'Your Payment Terms data has been Created!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function payment_terms_update($id)
    {
        $where['id']                 = $id;
        $payment_terms_list                     = $this->payment_terms_mod->payment_terms_list_db($where);
        if (count($payment_terms_list) < 1) {
            // $this->session->set_flashdata('error', 'Agent Not Found!');
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['payment_terms_list']     = $payment_terms_list[0];

        $data['subview']                 = 'payment_terms/payment_terms_update';
        $data['meta_title']         = 'Payment Terms Update';
        $this->load->view('index', $data);
    }

    public function payment_terms_update_process($id)
    {
        $post = $this->input->post();

        $form_data = array(
            'name'  => $post['name'],
        );
        $where['id'] = $id;
        $st_payment_terms = $this->payment_terms_mod->payment_terms_update_process_db($form_data, $where);

        $this->session->set_flashdata('success', 'Your Payment Terms data has been Updated!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function payment_terms_delete_process($id)
    {
        $where['id'] = $id;
        $this->payment_terms_mod->payment_terms_delete_process_db($where);

        $this->session->set_flashdata('success', 'Your Payment Terms data has been Deleted!');
        redirect($_SERVER['HTTP_REFERER']);
    }
}
