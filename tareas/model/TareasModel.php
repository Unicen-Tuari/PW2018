<?php

class TareasModel {

  private $db;

  function __construct(){
    $this->db = new PDO('mysql:host=localhost;'
               .'dbname=db_tareas;charset=utf8'
            , 'root', '');
  }

  function obtenerTareas()
  {
    $sentencia = $this->db->prepare( "SELECT * from tarea");
    $sentencia->execute();
    return $sentencia->fetchAll();
  }

  function obtenerTarea($id_tarea)
  {
    $sentencia = $this->db->prepare( "SELECT * from tarea where id=?");
    $sentencia->execute([$id_tarea]);
    return $sentencia->fetch();
  }

  //tarea ['titulo' = > 'lalal', 'descrpcion'=> 'lalala']
  function insertarTarea($tarea)
  {
    $this->db->beginTransaction();
    $sentencia = $this->db->prepare("INSERT INTO tarea (titulo, descripcion) VALUES (?,?)");
    $sentencia->execute([$tarea['titulo'], $tarea['descripcion']]);
    $this->db->commit();
    return $this->db->lastInsertId();
  }

  function deleteTarea($id_tarea)
  {
    $sentencia = $this->db->prepare("DELETE from tarea where id=?");
    $sentencia->execute([$id_tarea]);
  }

  function finalizarTarea($id_tarea)
  {
    $sentencia = $this->db->prepare("UPDATE tarea SET finalizada=1 where id=?");
    $sentencia->execute([$id_tarea]);
  }
}
?>
