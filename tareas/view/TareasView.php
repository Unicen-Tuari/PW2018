<?php
require_once "./libs/Smarty.class.php";
class TareasView {

  private $smarty;

  function __construct(){
    $this->smarty = new Smarty;
  }

  function mostrarTareas($tareas){
     $this->smarty->assign("tareas", $tareas);
     $this->smarty->display("mostrarTareas.tpl");
  }

  function mostrarVistaCrearTarea($params = [])
  {
    $this->smarty->display("crearTarea.tpl");
  }

  function mostrarDetalle($tarea, $estado){
    $this->smarty->assign('titulo', $tarea['titulo'] );
    $this->smarty->assign('descripcion',$tarea['descripcion'] );
    $this->smarty->assign('estado',$estado );
    $this->smarty->display("mostrarDetalle.tpl");
  }
}
 ?>
