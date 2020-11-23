<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Branch extends CI_Controller
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
	 * @see https://codeigniter.com/branch_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		cek_login();
		$this->load->model('home_mod');
		$this->load->model('branch_mod');
	}

	public function index(){
		redirect("branch/branch_list");
	}

	public function branch_list(){
    $data['branch_list'] 	= $this->branch_mod->branch_list_db();

    $data['subview'] 				= 'branch/branch_list';
		$data['meta_title'] 		= 'Branch List';
		$this->load->view('index', $data);
  }

	public function branch_create(){
    $data['subview'] 				= 'branch/branch_create';
		$data['meta_title'] 		= 'Branch Create';
		$this->load->view('index', $data);
	}
	
	public function branch_create_process(){
		$post = $this->input->post();

		$where["name = '".$post['name']."' OR code = '".$post['code']."'"] 		= NULL;
		$branch_list 			= $this->branch_mod->branch_list_db($where);
		if(count($branch_list) > 0){
			$this->session->set_flashdata('error', 'Duplicate Code or Name Branch!');
			redirect($_SERVER['HTTP_REFERER']);
		}

    $form_data = array(
			'name' 				=> $post['name'],
			'code' 				=> $post['code'],
			'no_telp' 		=> $post['no_telp'],
			'address' 		=> $post['address'],
		);
		$id_branch = $this->branch_mod->branch_create_process_db($form_data);

		$this->session->set_flashdata('success', 'Your Branch data has been Created!');
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function branch_update($id){
		$where['id'] 				= $id;
		$branch_list 					= $this->branch_mod->branch_list_db($where);
		if(count($branch_list) < 1){
			// $this->session->set_flashdata('error', 'Branch Not Found!');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$data['branch_list'] 	= $branch_list[0];

    $data['subview'] 				= 'branch/branch_update';
		$data['meta_title'] 		= 'Branch Update';
		$this->load->view('index', $data);
	}
	
	public function branch_update_process($id){
		$post = $this->input->post();

    $form_data = array(
			'name' 				=> $post['name'],
			'code' 				=> $post['code'],
			'no_telp' 		=> $post['no_telp'],
			'address' 		=> $post['address'],
		);
		$where['id'] = $id;
		$id_branch = $this->branch_mod->branch_update_process_db($form_data, $where);

		$this->session->set_flashdata('success', 'Your Branch data has been Updated!');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function branch_delete_process($id){
		$where['id'] = $id;
		$this->branch_mod->branch_delete_process_db($where);

		$this->session->set_flashdata('success', 'Your Branch data has been Deleted!');
		redirect($_SERVER['HTTP_REFERER']);
	}
		
}
