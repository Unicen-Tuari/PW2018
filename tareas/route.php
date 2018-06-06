<?php
  DEFINE('BASEURL','//'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/');
  require_once 'config.php';
  require_once "./helpers/PageHelpers.php";
  require_once "controller/TareasController.php";
  require_once "controller/LoginController.php";

  $params = explode("/", $_GET["action"]); //[batata,1]
  $action = $params[0];
  $others = array_slice($params, 1, count($params));
  $funcion = "error";
  $controlleryfuncion = explode("#", $acciones[$action]);
// $controlleryfuncion[0] Controller
// $controlleryfuncion[1] Funcion
  $controller = $controlleryfuncion[0];
  $funcion = $controlleryfuncion[1];

  $controllerObjeto = new $controller();
  $controllerObjeto->$funcion($others);

?>
