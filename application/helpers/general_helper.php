<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  function test_var($value, $pass = 0){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    if($pass == 0){
        exit;
    }
  }

  function cek_login(){
    $CI =& get_instance();

    $link = explode('/', base_url(uri_string()));
		if(!$CI->session->userdata('id')){
			redirect('home/login');
    }
    if($CI->session->userdata('id') == "Guest" && !in_array($link[4].'/'.$link[5], array('home/shipment_create', 'shipment/shipment_receipt', 'shipment/shipment_create_process'))){
      redirect('home/login');
    }
  }

?>