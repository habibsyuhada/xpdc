<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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

	public function __construct() {
		parent::__construct();
		$this->load->model('user_mod');
		$this->load->model('shipment_mod');
		if($this->session->userdata('id') == "Guest"){
			$this->session->unset_userdata('id');
			session_destroy();
		}
	}

	public function index(){
		$data = array();
		if($this->input->get('tracking_no')){
			$tracking_no = $this->input->get('tracking_no');
			$where['tracking_no'] 	= $tracking_no;
			$shipment_list 					= $this->shipment_mod->shipment_list_db($where);
			if(count($shipment_list) > 0){
				unset($where);
				$where['id_shipment'] 	= $shipment_list[0]['id'];
				$history_list 					= $this->shipment_mod->shipment_history_list_db($where);
				$data['shipment'] 			= $shipment_list[0];
				$data['history_list'] 	= $history_list;
			}
	
			$data['tracking_no'] 		= $tracking_no;
		}

		$this->load->view('home/landing_page', $data);
	}

	public function tracking_xpdc($id){
		$where['id'] 						= $id;
		$shipment_list 					= $this->shipment_mod->shipment_list_db($where);

		unset($where);
		echo $id;
		$where['id_shipment'] 	= $id;
		$history_list 					= $this->shipment_mod->shipment_history_list_db($where);
				
		$data['shipment'] 			= $shipment_list[0];
		$data['history_list'] 	= $history_list;
		$this->load->view('home/landing_page', $data);
	}

	public function home(){
		if(!$this->session->userdata('id')){
			redirect('home/login');
		}
		redirect('shipment/shipment_list');
		// $data['subview'] 			= 'home/home';
		// $data['meta_title'] 	= 'Home';
		// $this->load->view('index', $data);
	}

	public function login(){
		if($this->session->userdata('id')){
			redirect('home/home');
		}
		$data['meta_title'] 	= 'Login';
		$this->load->view('home/login');
	}

	public function login_process(){
		$data_post 					= $this->input->post();
		$where['email'] = $data_post['email'];
		$where['password'] = MD5($data_post['password']);
		$user = $this->user_mod->user_list_db($where);

		if(count($user) > 0){
			$user = $user[0];
			$session_user = array(
				"id" 					=> $user['id'],
				"name" 				=> $user['name'],
				"email" 			=> $user['email'],
				"role" 				=> $user['role'],
			);
			$this->session->set_userdata($session_user);
			redirect('home/home');
		}
		else{
			$this->session->set_flashdata('error', 'Email or Password is Wrong!');
			redirect("home/login");
		}
	}

	public function logout(){
		if($this->session->userdata('id')){
			$this->session->unset_userdata('id');
			$this->session->unset_userdata('nama');
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('role');
			$this->session->unset_userdata('departemen');
			session_destroy();
		}

		redirect('home/login');
	}

	public function shipment_create(){
		if(!$this->session->userdata('id')){
			$session_user = array(
				"id" 					=> "Guest",
			);
			$this->session->set_userdata($session_user);
		}
		if($this->session->userdata('id') != "Guest"){
			$this->session->set_flashdata('error', 'You Cannot Access the Guest Page!');
			redirect('shipment/shipment_list');
		}
		$data['subview'] 			= 'shipment/shipment_create';
		$data['meta_title'] 	= 'Create Shipment';

		$data['country'] = json_decode(file_get_contents("./assets/country/country.json"), true);
		$this->load->view('index', $data);
	}

	function barcode_generator($tracking_no){
		$this->load->library('zend');
		$this->zend->load('Zend/Barcode');
		Zend_Barcode::render('CODE128', 'image', array('text' => $tracking_no, 'drawText' => false), array());
	}
}
