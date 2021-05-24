<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller
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
        $this->load->model('payment_mod');
    }

    public function index()
    {
        redirect("payment/payment_list");
    }

    public function payment_list()
    {
        $data['payment_list']     = $this->payment_mod->payment_list_db();

        $data['subview']                 = 'payment/payment_list';
        $data['meta_title']         = 'Payment List';
        $this->load->view('index', $data);
    }

    public function payment_create()
    {
        $data['branch'] = $this->home_mod->branch_list();
        $data['subview']                 = 'payment/payment_create';
        $data['meta_title']         = 'Payment Create';
        $this->load->view('index', $data);
    }

    public function payment_create_process()
    {
        $post = $this->input->post();

        $form_data = array(
            'branch'               => $post['branch'],
            'beneficiary_name'               => $post['beneficiary_name'],
            'bank_name'               => $post['bank_name'],
            'bank_address'               => $post['bank_address'],
            'account_no'               => $post['account_no'],
            'swift_code'               => $post['swift_code'],
            'created_by'         => $this->session->userdata('id')
        );
        $id_payment = $this->payment_mod->payment_create_process_db($form_data);

        $where['branch'] = $post['branch'];
        $data = $this->payment_mod->payment_list_db($where);

        if (count($data) == 1) {
            unset($form_data);
            $form_data['default_value'] = '1';
            $id_payment = $this->payment_mod->payment_update_process_db($form_data, $where);
        }

        $this->session->set_flashdata('success', 'Your Payment data has been Created!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function payment_update($id)
    {
        $where['id']                 = $id;
        $payment_list                     = $this->payment_mod->payment_list_db($where);
        if (count($payment_list) < 1) {
            // $this->session->set_flashdata('error', 'Agent Not Found!');
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['payment_list']     = $payment_list[0];

        $data['branch'] = $this->home_mod->branch_list();
        $data['subview']                 = 'payment/payment_update';
        $data['meta_title']         = 'Payment Update';
        $this->load->view('index', $data);
    }

    public function payment_update_process($id)
    {
        $post = $this->input->post();

        $form_data = array(
            'branch'               => $post['branch'],
            'beneficiary_name'               => $post['beneficiary_name'],
            'bank_name'               => $post['bank_name'],
            'bank_address'               => $post['bank_address'],
            'account_no'               => $post['account_no'],
            'swift_code'               => $post['swift_code']
        );
        $where['id'] = $id;
        $id_payment = $this->payment_mod->payment_update_process_db($form_data, $where);

        $this->session->set_flashdata('success', 'Your Payment data has been Updated!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function payment_delete_process($id)
    {
        $where['id'] = $id;
        $this->payment_mod->payment_delete_process_db($where);

        $this->session->set_flashdata('success', 'Your Payment data has been Deleted!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function payment_default_value($id)
    {
        $where['id']                 = $id;
        $payment_list                     = $this->payment_mod->payment_list_db($where);

        $branch = $payment_list[0]['branch'];

        unset($where);
        $form_data['default_value'] = '0';
        $where['branch'] = $branch;
        $id_payment = $this->payment_mod->payment_update_process_db($form_data, $where);

        unset($where);
        unset($form_data);
        $where['id'] = $id;
        $form_data['default_value'] = '1';
        $id_payment = $this->payment_mod->payment_update_process_db($form_data, $where);

        $this->session->set_flashdata('success', 'Your Payment data has been Updated!');
        redirect($_SERVER['HTTP_REFERER']);
    }
}
