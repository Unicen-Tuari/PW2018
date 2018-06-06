<?php

class UsuariosModel {

  private $db;

  function __construct(){
    $this->db = new PDO('mysql:host=localhost;'
               .'dbname=db_tareas;charset=utf8'
            , 'root', '');
  }

  function obtenerUsuario($email)
  {
    $sentencia = $this->db->prepare( "SELECT * from usuario where email = ?");
    $sentencia->execute([$email]);
    return $sentencia->fetch();
  }
}
?>
