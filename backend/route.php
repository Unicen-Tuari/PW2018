<?php
  require_once "pi.php";
  require_once "sumar.php";

  $params = explode("/", $_GET["action"]);
  $action = $params[0];
  $others = array_slice($params, 1, count($params));
  $funcion = "error";
  switch ($action) {
    case "sumar":
      $funcion = "sumar";
      break;
    case "pi":
      $funcion = "mostrarpi";
      break;
    default:
      $funcion = "error";
      break;

  }
  $funcion($others);
?>
