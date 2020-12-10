<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quotation extends CI_Controller
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
	}

	public function index(){
		redirect("quotation/quotation_create");
	}

	public function quotation_create(){
		$data['subview'] 			= 'quotation/quotation_create';
		$data['meta_title'] 	= 'Create Quotation';
		$this->load->view('index', $data);
	}

	public function quotation_pdf(){
    $data = [];

    $this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Quotation-" . date('Y-m-d H:i:s') . ".pdf";
    $this->pdf->load_view('quotation/quotation_pdf', $data);
	}
	
	
		
}
