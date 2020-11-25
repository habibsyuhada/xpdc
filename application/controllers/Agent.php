<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agent extends CI_Controller
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
	public function __construct(){
		parent::__construct();
		cek_login();
		$this->load->model('home_mod');
		$this->load->model('agent_mod');
	}

	public function index(){
		redirect("agent/agent_list");
	}

	public function agent_list(){
    $data['agent_list'] 	= $this->agent_mod->agent_list_db();

    $data['subview'] 				= 'agent/agent_list';
		$data['meta_title'] 		= 'Agent List';
		$this->load->view('index', $data);
  }

	public function agent_create(){
    $data['subview'] 				= 'agent/agent_create';
		$data['meta_title'] 		= 'Agent Create';
		$this->load->view('index', $data);
	}
	
	public function agent_create_process(){
		$post = $this->input->post();

		$where["name = '".$post['name']."'"] 		= NULL;
		$agent_list 			= $this->agent_mod->agent_list_db($where);
		if(count($agent_list) > 0){
			$this->session->set_flashdata('error', 'Duplicate Code or Name Agent!');
			redirect($_SERVER['HTTP_REFERER']);
		}

    $form_data = array(
			'name' 				=> $post['name'],
			'no_telp' 		=> $post['no_telp'],
			'address' 		=> $post['address'],
		);
		$id_agent = $this->agent_mod->agent_create_process_db($form_data);

		$this->session->set_flashdata('success', 'Your Agent data has been Created!');
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function agent_update($id){
		$where['id'] 				= $id;
		$agent_list 					= $this->agent_mod->agent_list_db($where);
		if(count($agent_list) < 1){
			// $this->session->set_flashdata('error', 'Agent Not Found!');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$data['agent_list'] 	= $agent_list[0];

    $data['subview'] 				= 'agent/agent_update';
		$data['meta_title'] 		= 'Agent Update';
		$this->load->view('index', $data);
	}
	
	public function agent_update_process($id){
		$post = $this->input->post();

    $form_data = array(
			'name' 				=> $post['name'],
			'no_telp' 		=> $post['no_telp'],
			'address' 		=> $post['address'],
		);
		$where['id'] = $id;
		$id_agent = $this->agent_mod->agent_update_process_db($form_data, $where);

		$this->session->set_flashdata('success', 'Your Agent data has been Updated!');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function agent_delete_process($id){
		$where['id'] = $id;
		$this->agent_mod->agent_delete_process_db($where);

		$this->session->set_flashdata('success', 'Your Agent data has been Deleted!');
		redirect($_SERVER['HTTP_REFERER']);
	}
		
}
