<?php
  require_once 'config.php';
  require_once "tareas.php";

  $params = explode("/", $_GET["action"]); //[batata,1]
  $action = $params[0];
  $others = array_slice($params, 1, count($params));
  $funcion = "error";
  $funcion = $acciones[$action];
  $funcion($others);
?>
