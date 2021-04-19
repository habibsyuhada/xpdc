<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  function test_var($value, $pass = 0){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    if($pass == 0){
        exit;
    }
  }

  function dump_var($value, $pass = 0){
    $CI =& get_instance();
    if($CI->session->userdata('id') == 1){
      echo '<pre>';
      print_r($value);
      echo '</pre>';
      if($pass == 0){
          exit;
      }
    }
  }

  function cek_login(){
    $CI =& get_instance();

    $link = explode('/', base_url(uri_string()));
		if(!$CI->session->userdata('id')){
			redirect('home/login');
    }
    
    if($CI->session->userdata('id') == "Guest"){
      if($link[2] == "localhost"){
        $link_check = $link[4].'/'.$link[5];
      }
      else{
        $link_check = $link[3].'/'.$link[4];
      }
    } 
    if($CI->session->userdata('id') == "Guest" && !in_array($link_check, array('home/shipment_create', 'customer/check_price', 'customer/check_price_process', 'customer/shipment_create', 'shipment/shipment_receipt', 'shipment/shipment_create_process', 'country/city_autocomplete', "shipment/check_custumer", "shipment/shipment_receipt_pdf", "shipment/shipment_autobill", "shipment/shipment_autobill_process", "shipment/shipment_autobill_complete", "shipment/shipment_tracking_label_pdf", "shipment/pickup_price", "shipment/shipment_invoice_pdf"))){
      redirect('home/login');
    }
  }

  function user_data($query){
    $CI =& get_instance();
    $CI->load->model('home_mod');
  
    // if(is_string($query)){
    //   $data = $this->general_mod->manual_query_db($query);
    //   $id_user = array();
    //   foreach ($data as $key => $value) {
    //     $id_user[] = $value['id_user'];
    //   }
    // }
    // elseif(is_array($query)){
    //   $id_user = $query;
    // }
    $id_user = $query;
    $result = array();
    if(sizeof($id_user) > 0){
  
      $data = $CI->home_mod->user_list_by_id($id_user);
      if($data){
        foreach ($data as $key => $value) {
          $result[$value['id']] = $value;
        }			
      }
    }
    
    return $result;
  }

  function set_barcode($code){
    $CI =& get_instance();
    //load library
    $CI->load->library('zend');
    //load in folder Zend
    $CI->zend->load('Zend/Barcode');

    $file = Zend_Barcode::draw('CODE128', 'image', array('text' => $code, 'drawText' => false), array());
    $code = time().$code;
    $path = "file/barcode/{$code}.png";
    $store_image = imagepng($file,$path);
    // return $code.'.png';

    /* if you want to permanently store your barcode image, and 
       save the path into your database, 
       just return this path. */
    // return $path

    //convert image into base64
    $code_img_base64 = base64_encode(file_get_contents($path));

    //if you want, remove the temporary barcode image
    unlink($path);

    return $code_img_base64;
}

?>