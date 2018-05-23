<?php
  function obtenerConexion(){
    return new PDO('mysql:host=localhost;'
               .'dbname=db_tareas;charset=utf8'
            , 'root', '');
  }

  function obtenerTareas()
  {
    $db = obtenerConexion();
    $sentencia = $db->prepare( "SELECT * from tarea");
    $sentencia->execute();
    return $sentencia->fetchAll();
  }

  function obtenerTarea($id_tarea)
  {
    $db = obtenerConexion();
    $sentencia = $db->prepare( "SELECT * from tarea where id=?");
    $sentencia->execute([$id_tarea]);
    return $sentencia->fetch();
  }

  //tarea ['titulo' = > 'lalal', 'descrpcion'=> 'lalala']
  function insertarTarea($tarea)
  {
    $db = obtenerConexion();
    $db->beginTransaction();
    $sentencia = $db->prepare("INSERT INTO tarea (titulo, descripcion) VALUES (?,?)");
    $sentencia->execute([$tarea['titulo'], $tarea['descripcion']]);
    $db->commit();
    return $db->lastInsertId();
  }

  function deleteTarea($id_tarea)
  {
    $db = obtenerConexion();
    $sentencia = $db->prepare("DELETE from tarea where id=?");
    $sentencia->execute([$id_tarea]);
  }

  function finalizarTarea($id_tarea)
  {
    $db = obtenerConexion();
    $sentencia = $db->prepare("UPDATE tarea SET finalizada=1 where id=?");
    $sentencia->execute([$id_tarea]);
  }

?>
