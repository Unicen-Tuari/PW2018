<?php

$acciones = [
  "" => "LoginController#login",
  "login" => "LoginController#validarLogin",
  "logout" => "LoginController#logout",
  "ver" => "TareasController#mostrarTareas",
  "crear" => "TareasController#crearTarea",
  "guardar" => "TareasController#guardarTarea",
  "borrar" => "TareasController#borrarTarea",
  "finalizar" => "TareasController#finalizaTarea",
  "detalle" => "TareasController#mostrarDetalle"
];
?>
