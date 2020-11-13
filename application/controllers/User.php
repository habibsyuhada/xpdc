<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
	public function __construct(){
		parent::__construct();
		cek_login();
		$this->load->model('home_mod');
		$this->load->model('user_mod');
	}

	public function index(){
		redirect("user/user_list");
	}

	public function user_list(){
    $data['user_list'] 	= $this->user_mod->user_list_db();

    $data['subview'] 				= 'user/user_list';
		$data['meta_title'] 		= 'User List';
		$this->load->view('index', $data);
  }

	public function user_create(){
		$datadb 	= $this->home_mod->branch_list();
		$branch_list = [];
		foreach ($datadb as $key => $value) {
			$branch_list[$value['name']] = $value;
		}
		$data['branch_list'] 	= $branch_list;

    $data['subview'] 				= 'user/user_create';
		$data['meta_title'] 		= 'User Create';
		$this->load->view('index', $data);
	}
	
	public function user_create_process(){
		$post = $this->input->post();

		$where['email'] = $post['email'];
		$user_list 			= $this->user_mod->user_list_db($where);
		if(count($user_list) > 0){
			$this->session->set_flashdata('error', 'Duplicate User!');
			redirect("user/user_create");
		}

    $form_data = array(
			'name' 				=> $post['name'],
			'email' 			=> $post['email'],
			'password' 		=> MD5("xpdcidbatam1"),
			'role' 				=> $post['role'],
			'branch' 			=> $post['branch'],
		);
		$id_user = $this->user_mod->user_create_process_db($form_data);

		$this->session->set_flashdata('success', 'Your User data has been Created!');
		redirect('user/user_create');
	}
	
	public function user_update($id){
		$where['id'] 				= $id;
		$user_list 					= $this->user_mod->user_list_db($where);
		if(count($user_list) < 1){
			// $this->session->set_flashdata('error', 'User Not Found!');
			redirect("user/user_list");
		}
		$data['user_list'] 	= $user_list[0];

		$datadb 	= $this->home_mod->branch_list();
		$branch_list = [];
		foreach ($datadb as $key => $value) {
			$branch_list[$value['name']] = $value;
		}
		$data['branch_list'] 	= $branch_list;

    $data['subview'] 				= 'user/user_update';
		$data['meta_title'] 		= 'User Update';
		$this->load->view('index', $data);
	}
	
	public function user_update_process($id){
		$post = $this->input->post();

    $form_data = array(
			'name' 				=> $post['name'],
			'role' 				=> $post['role'],
			'branch' 			=> $post['branch'],
		);
		$where['id'] = $id;
		$id_user = $this->user_mod->user_update_process_db($form_data, $where);

		$this->session->set_flashdata('success', 'Your User data has been Updated!');
		redirect('user/user_update/'.$id);
	}

	public function user_rest_password($id){
		$form_data = array(
			'password' => MD5("123"),
		);
		$where['id'] = $id;
		$id_user = $this->user_mod->user_update_process_db($form_data, $where);

		$this->session->set_flashdata('success', 'This User Has Been Reset<br> New Password : 123!');
		redirect('user/user_list');
	}

	public function user_delete_process($id){
		$where['id'] = $id;
		$this->user_mod->user_delete_process_db($where);

		$this->session->set_flashdata('success', 'Your User data has been Deleted!');
		redirect('user/user_list');
	}

	public function user_password(){
		$where['id'] 				= $this->session->userdata('id');
		$user_list 					= $this->user_mod->user_list_db($where);
		if(count($user_list) < 1){
			// $this->session->set_flashdata('error', 'User Not Found!');
			redirect("user/user_list");
		}
		$data['user_list'] 	= $user_list[0];

    $data['subview'] 				= 'user/user_password';
		$data['meta_title'] 		= 'Change Password';
		$this->load->view('index', $data);
	}

	public function user_password_process(){
		$post = $this->input->post();
		$id 	= $this->session->userdata('id');
		
		$where['id'] 				= $id;
		$user_list 					= $this->user_mod->user_list_db($where);
		$user_list 					= $user_list[0];

		if($user_list['password'] != MD5($post['old_password'])){
			$this->session->set_flashdata('error', 'Wrong Old Password!');
			redirect("user/user_password");
		}
		elseif(MD5($post['new_password']) != MD5($post['confirm_password'])){
			$this->session->set_flashdata('error', 'New Password Not Same!');
			redirect("user/user_password");
		}

    $form_data = array(
			'password' => MD5($post['confirm_password']),
		);
		$where['id'] = $id;
		$id_user = $this->user_mod->user_update_process_db($form_data, $where);

		$this->session->set_flashdata('success', 'Your Password has been Changed!');
		redirect('user/user_password');
	}
		
}
