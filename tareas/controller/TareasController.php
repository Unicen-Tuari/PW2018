<?php
require_once "./controller/SecureController.php";
require_once "./model/TareasModel.php";
require_once "./view/TareasView.php";

class TareasController extends SecureController{

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
    PageHelpers::homePage();
  }

  function borrarTarea($params = [])
  {
    $this->tareasModel->deleteTarea($params[0]);
    PageHelpers::homePage();
  }

  function finalizaTarea($params = [])
  {
    $this->tareasModel->finalizarTarea($params[0]);
    PageHelpers::homePage();
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
