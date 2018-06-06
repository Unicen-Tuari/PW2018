<?php
require_once "./model/UsuariosModel.php";
require_once "./view/LoginView.php";

class LoginController {

  private $usuariosModel;
  private $loginView;

  function __construct(){
    $this->usuariosModel = new UsuariosModel();
    $this->loginView = new LoginView();
  }

  function login($params = [])
  {
    $this->loginView->mostrarLogin();
  }

  function logout($params = [])
  {
    session_start();
    session_destroy();
    PageHelpers::loginPage();
  }

  function validarLogin($params = [])
  {
    $usuario = $this->usuariosModel->obtenerUsuario($_POST['email']);
    if(password_verify($_POST['password'], $usuario['password'])){
      session_start();
      $_SESSION['email'] = $_POST['email'];
      $_SESSION['ultima_conexion'] = time();
      PageHelpers::homePage();
    }
    else {
      PageHelpers::loginPage();
    }
  }
}
 ?>
