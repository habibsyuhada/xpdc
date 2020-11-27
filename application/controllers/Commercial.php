<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Commercial extends CI_Controller
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
     * @see https://codeigniter.com/agent_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('home_mod');
        $this->load->model('commercial_mod');
    }

    public function index()
    {
        redirect("agent/agent_list");
    }

    public function customer_list()
    {
        $data['customer_list']     = $this->commercial_mod->customer_list_db();

        $data['subview']            = 'commercial/customer_list';
        $data['meta_title']         = 'Customer List';
        $this->load->view('index', $data);
    }

    public function customer_create()
    {
        $data['country'] = json_decode(file_get_contents("./assets/country/country.json"), true);

        $data['subview']        = 'commercial/customer_create';
        $data['meta_title']     = 'Create Customer';
        $this->load->view('index', $data);
    }

    public function customer_create_process()
    {
        $post = $this->input->post();

        $where['email'] = $post['email'];
        $customer_list      = $this->commercial_mod->customer_list_db($where);
        if (count($customer_list) > 0) {
            $this->session->set_flashdata('error', 'Duplicate Customer!');
            redirect("commercial/customer_create");
        }

        $form_data = array(
            'name'                 => $post['name'],
            'email'             => $post['email'],
            'password'         => MD5("customerxpdc"),
            'role'                 => "Customer",
            'branch'             => "NONE",
        );
        $id_user = $this->commercial_mod->customer_create_process_db($form_data);

        $form_detail_data = array(
            'customer_id' => $id_user,
            'address' => $post['address'],
            'city' => $post['city'],
            'country' => $post['country'],
            'postcode' => $post['postcode'],
            'contact_person' => $post['contact_person'],
            'phone_number' => $post['phone_number'],
            'status_delete' => 1
        );

        $id_detail = $this->commercial_mod->customer_detail_create_process_db($form_detail_data);

        $this->session->set_flashdata('success', 'Your Customer data has been Created!');
        redirect('commercial/customer_create');
    }

    public function customer_update($id)
    {
        $where['user.id']   = $id;
        $user_list             = $this->commercial_mod->customer_list_db($where);
        if (count($user_list) < 1) {
            $this->session->set_flashdata('error', 'Customer Not Found!');
            redirect("commercial/customer_list");
        }
        $data['customer_list']     = $user_list[0];
        $data['country'] = json_decode(file_get_contents("./assets/country/country.json"), true);

        $data['subview']            = 'commercial/customer_update';
        $data['meta_title']         = 'Customer Update';
        $this->load->view('index', $data);
    }

    public function customer_update_process($id)
    {
        $post = $this->input->post();

        $form_data = array(
            'name'               => $post['name'],
            'email'              => $post['email']
        );
        $where['id'] = $id;
        $id_user = $this->commercial_mod->customer_update_process_db($form_data, $where);

        $form_detail_data = array(
            'address'           => $post['address'],
            'city'              => $post['city'],
            'country'           => $post['country'],
            'postcode'          => $post['postcode'],
            'contact_person'    => $post['contact_person'],
            'phone_number'      => $post['phone_number']
        );
        $where_detail['customer_id'] = $id;
        $id_detail_customer = $this->commercial_mod->customer_detail_update_process_db($form_detail_data, $where_detail);

        $this->session->set_flashdata('success', 'Your Customer data has been Updated!');
        redirect('commercial/customer_update/' . $id);
    }

    public function customer_rest_password($id)
    {
        $form_data = array(
            'password' => MD5("123"),
        );
        $where['id'] = $id;
        $id_user = $this->commercial_mod->customer_update_process_db($form_data, $where);

        $this->session->set_flashdata('success', 'This Customer Has Been Reset<br> New Password : 123!');
        redirect('commercial/customer_list');
    }

    public function customer_delete_process($id){
		$where['id'] = $id;
		$this->commercial_mod->customer_delete_process_db($where);

		$this->session->set_flashdata('success', 'Your Customer data has been Deleted!');
		redirect('commercial/customer_list');
	}
}
