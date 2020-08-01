<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  function test_var($value, $pass = 1){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    if($pass == 1){
        exit;
    }
  }

?>