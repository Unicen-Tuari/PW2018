<?php
require_once 'bbdd.php';
require("./libs/Smarty.class.php");

DEFINE('BASEURL','//'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/');

  function mostrarTareas($params = [])
  {
    $smarty=new Smarty;

    $tareas = obtenerTareas();

    $smarty->assign("tareas", $tareas);
    $smarty->display("mostrarTareas.tpl");
  }

  function crearTarea($params = [])
  {
    $smarty=new Smarty;

    $smarty->display("crearTarea.tpl");
  }

  function guardarTarea($params = [])
  {
    $tarea = [
      'titulo' => $_POST['titulo'],
      'descripcion' => $_POST['descripcion']
    ];
    insertarTarea($tarea);
    homePage();
  }

  function borrarTarea($params = [])
  {
    deleteTarea($params[0]);
    homePage();
  }

  function finalizaTarea($params = [])
  {
    finalizarTarea($params[0]);
    homePage();
  }

  function homePage()
  {
    header("Location: ".BASEURL."ver");
  }

  function mostrarDetalle($params = [])
  {
    $tarea = obtenerTarea($params[0]);
    $smarty=new Smarty;

    $smarty->assign('titulo', $tarea['titulo'] );
    $smarty->assign('descripcion',$tarea['descripcion'] );

    if ($tarea['finalizada'] == 1)
      $smarty->assign('estado',"Esta Finalizada" );
    else
      $smarty->assign('estado',"NO Esta Finalizada" );

    $smarty->display("mostrarDetalle.tpl");
  }

?>
