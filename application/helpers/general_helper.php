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
		if(!$CI->session->userdata('id')){
			redirect('home/login');
		}
  }

?>