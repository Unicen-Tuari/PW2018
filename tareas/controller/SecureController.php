<?php
class SecureController {

  function __construct(){
    session_start();
    if(time() - $_SESSION['ultima_conexion'] > 30){
        PageHelpers::logoutPage();
    }
    $_SESSION['ultima_conexion'] = time();
    if(!isset($_SESSION['email'])){
      PageHelpers::loginPage();
    }
  }
}
 ?>
