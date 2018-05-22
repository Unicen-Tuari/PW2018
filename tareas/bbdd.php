<?php
  function obtenerTareas()
  {
    $db = new PDO('mysql:host=localhost;'
                   .'dbname=db_tareas;charset=utf8'
                , 'root', '');
    $sentencia = $db->prepare( "select * from tarea");
    $sentencia->execute();
    return $sentencia->fetchAll();
  }
?>
