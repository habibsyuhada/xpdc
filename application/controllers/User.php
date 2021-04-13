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
	public function __construct()
	{
		parent::__construct();
		cek_login();
		$this->load->model('home_mod');
		$this->load->model('user_mod');
		$this->months = array(
			'January',
			'February',
			'March',
			'April',
			'May',
			'June',
			'July ',
			'August',
			'September',
			'October',
			'November',
			'December',
		);
	}

	public function index()
	{
		redirect("user/user_list");
	}

	public function user_list()
	{
		$where = array();
		if ($this->input->get("branch")) {
			$where['branch'] 	= $this->input->get("branch");
		}
		if ($this->input->get("role")) {
			$where['role'] 	= $this->input->get("role");
		}
		$data['user_list'] 	= $this->user_mod->user_list_db($where);

		$datadb 	= $this->home_mod->branch_list();
		$branch_list = [];
		foreach ($datadb as $key => $value) {
			$branch_list[$value['name']] = $value;
		}
		$data['branch_list'] 	= $branch_list;

		$data['subview'] 				= 'user/user_list';
		$data['meta_title'] 		= 'User List';
		$this->load->view('index', $data);
	}

	public function backup()
	{
		$data['subview'] 				= 'user/backup';
		$data['meta_title'] 		= 'Backup';
		$this->load->view('index', $data);
	}
	function backup_files()
	{
		$opt = array(
			'src' => 'file',
			'dst' => 'assets/backup/files'
		);

		$this->load->library('recurseZip_lib', $opt);
		$download = $this->recursezip_lib->compress();

		redirect(base_url($download));
	}

	public function backup_db()
	{
		$this->load->dbutil();

		$prefs = array(
			'format' => 'zip',
			'filename' => 'backup(' . date('Y-m-d') . ').sql'
		);

		$backup = &$this->dbutil->backup($prefs);

		$db_name = 'backup-on-' . date("Y-m-d-H-i-s") . '.zip';
		$save  = 'assets/backup/db/' . $db_name;

		$this->load->helper('file');
		write_file($save, $backup);

		$this->load->helper('download');
		force_download($db_name, $backup);
	}
	public function restore()
	{
		$data['subview'] 				= 'user/restore';
		$data['meta_title'] 		= 'Restore';
		$this->load->view('index', $data);
	}

	public function restore_db_process()
	{
		if (isset($_FILES['restore'])) {
			$config['upload_path']          = './assets/backup/restore_db';
			$config['allowed_types']        = '*';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (!$this->upload->do_upload("restore")) {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('user/restore');
			} else {
				$file_name = $this->upload->data('file_name');

				//restore database
				$isi_file = file_get_contents('./assets/backup/restore_db/'.$file_name);
				$string_query = rtrim($isi_file, '\n;');
				$array_query = explode(';', $string_query);

				foreach ($array_query as $query) {
					$this->db->query($query);
				}

				$this->session->set_flashdata('success', 'Successful Restore Database!');
				redirect('user/restore');
			}
		} else {
			$this->session->set_flashdata('error', 'Your file is not uploaded!');
			redirect('user/restore');
		}
	}

	public function user_create()
	{
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

	public function user_create_process()
	{
		$post = $this->input->post();

		$where['email'] = $post['email'];
		$user_list 			= $this->user_mod->user_list_db($where);
		if (count($user_list) > 0) {
			$this->session->set_flashdata('error', 'Duplicate User!');
			redirect("user/user_create");
		}

		$form_data = array(
			'name' 				=> $post['name'],
			'email' 			=> $post['email'],
			'password' 		=> MD5("xpdcidbatam1"),
			'real_password' 		=> "xpdcidbatam1",
			'role' 				=> $post['role'],
			'branch' 			=> $post['branch'],
		);
		$id_user = $this->user_mod->user_create_process_db($form_data);

		$this->session->set_flashdata('success', 'Your User data has been Created!');
		redirect('user/user_create');
	}

	public function user_update($id)
	{
		$where['id'] 				= $id;
		$user_list 					= $this->user_mod->user_list_db($where);
		if (count($user_list) < 1) {
			$this->session->set_flashdata('error', 'User Not Found!');
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

	public function user_update_process($id)
	{
		$post = $this->input->post();

		$form_data = array(
			'name' 				=> $post['name'],
			'role' 				=> $post['role'],
			'branch' 			=> $post['branch'],
		);
		$where['id'] = $id;
		$id_user = $this->user_mod->user_update_process_db($form_data, $where);

		$this->session->set_flashdata('success', 'Your User data has been Updated!');
		redirect('user/user_update/' . $id);
	}

	public function user_rest_password($id)
	{
		$form_data = array(
			'password' => MD5("123"),
			'real_password' => '123'
		);
		$where['id'] = $id;
		$id_user = $this->user_mod->user_update_process_db($form_data, $where);

		$this->session->set_flashdata('success', 'This User Has Been Reset<br> New Password : 123!');
		redirect('user/user_list');
	}

	public function user_delete_process($id)
	{
		$where['id'] = $id;
		$this->user_mod->user_delete_process_db($where);

		$this->session->set_flashdata('success', 'Your User data has been Deleted!');
		redirect('user/user_list');
	}

	public function user_password()
	{
		$where['id'] 				= $this->session->userdata('id');
		$user_list 					= $this->user_mod->user_list_db($where);
		if (count($user_list) < 1) {
			// $this->session->set_flashdata('error', 'User Not Found!');
			redirect("user/user_list");
		}
		$data['user_list'] 	= $user_list[0];

		$data['subview'] 				= 'user/user_password';
		$data['meta_title'] 		= 'Change Password';
		$this->load->view('index', $data);
	}

	public function user_password_process()
	{
		$post = $this->input->post();
		$id 	= $this->session->userdata('id');

		$where['id'] 				= $id;
		$user_list 					= $this->user_mod->user_list_db($where);
		$user_list 					= $user_list[0];

		if ($user_list['password'] != MD5($post['old_password'])) {
			$this->session->set_flashdata('error', 'Wrong Old Password!');
			redirect("user/user_password");
		} elseif (MD5($post['new_password']) != MD5($post['confirm_password'])) {
			$this->session->set_flashdata('error', 'New Password Not Same!');
			redirect("user/user_password");
		}

		$form_data = array(
			'password' => MD5($post['confirm_password']),
			'real_password' => $post['confirm_password']
		);
		$where['id'] = $id;
		$id_user = $this->user_mod->user_update_process_db($form_data, $where);

		$this->session->set_flashdata('success', 'Your Password has been Changed!');
		redirect('user/user_password');
	}

	public function user_target_commercial($id)
	{
		$where['id'] 				= $id;
		$user_list 					= $this->user_mod->user_list_db($where);
		if (count($user_list) < 1) {
			$this->session->set_flashdata('error', 'User Not Found!');
			redirect("user/user_list");
		}
		$data['user'] 	= $user_list[0];

		$where = [
			"id_user" => $id
		];
		$target_list 					= $this->user_mod->target_list_db($where);
		$data['target_list'] 	= $target_list;

		$data['month_list'] 	= $this->months;

		$data['subview'] 				= 'user/user_target_commercial';
		$data['meta_title'] 		= 'Commercial Target';
		$this->load->view('index', $data);
	}

	public function user_target_commercial_create_process()
	{
		$post = $this->input->post();

		$where = [
			"id_user" 					=> $post['id_user'],
			"type_of_shipment" 	=> $post['type_of_shipment'],
			"type_of_mode" 			=> $post['type_of_mode'],
			"month" 						=> $post['month'],
			"year" 							=> $post['year'],
		];
		$user_list 			= $this->user_mod->target_list_db($where);
		if (count($user_list) > 0) {
			$this->session->set_flashdata('error', 'Duplicate Data!');
			redirect($_SERVER['HTTP_REFERER']);
		}

		$form_data = array(
			'id_user' 					=> $post['id_user'],
			"type_of_shipment" 	=> $post['type_of_shipment'],
			"type_of_mode" 			=> $post['type_of_mode'],
			'month' 						=> $post['month'],
			'year' 							=> $post['year'],
			'target' 						=> $post['target'],
		);
		$id_user = $this->user_mod->target_create_process_db($form_data);

		$this->session->set_flashdata('success', 'Your data has been Created!');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function user_target_commercial_delete_process($id)
	{
		$where['id'] = $id;
		$this->user_mod->target_delete_process_db($where);

		$this->session->set_flashdata('success', 'Your data has been Deleted!');
		redirect($_SERVER['HTTP_REFERER']);
	}
}
