<?php
DEFINE('BASEURL','//'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/');
require_once "./model/TareasModel.php";
require_once "./view/TareasView.php";

class TareasController {

  private $tareasModel;
  private $tareasView;

  function __construct(){
    $this->tareasModel = new TareasModel();
    $this->tareasView = new TareasView();
  }

  function mostrarTareas($params = [])
  {
    $tareas = $this->tareasModel->obtenerTareas();
    $this->tareasView->mostrarTareas($tareas);
  }

  function login($params = [])
  {
    $this->tareasView->mostrarLogin();
  }

  function validarLogin($params = [])
  {
    $usuario = $this->tareasModel->obtenerUsuario($_POST['email']);
    if(password_verify($_POST['password'], $usuario['password'])){
      $this->homePage();
    }
    else {
      $this->loginPage();
    }
    // $this->tareasView->mostrarLogin();
  }

  function crearTarea($params = [])
  {
    $this->tareasView->mostrarVistaCrearTarea();
  }

  function guardarTarea($params = [])
  {
    $tarea = [
      'titulo' => $_POST['titulo'],
      'descripcion' => $_POST['descripcion']
    ];
    $this->tareasModel->insertarTarea($tarea);
    $this->homePage();
  }

  function homePage()
  {
    header("Location: ".BASEURL."ver");
  }

  function loginPage()
  {
    header("Location: ".BASEURL."");
  }

  function borrarTarea($params = [])
  {
    $this->tareasModel->deleteTarea($params[0]);
    $this->homePage();
  }

  function finalizaTarea($params = [])
  {
    $this->tareasModel->finalizarTarea($params[0]);
    $this->homePage();
  }

  function mostrarDetalle($params = [])
  {
    $tarea = $this->tareasModel->obtenerTarea($params[0]);

    if ($tarea['finalizada'] == 1)
      $estado = "Esta Finalizada";
    else
      $estado = "NO Esta Finalizada";

    $this->tareasView->mostrarDetalle($tarea, $estado);
  }


}
 ?>
