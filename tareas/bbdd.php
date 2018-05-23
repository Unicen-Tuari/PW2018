<?php
  function obtenerTareas()
  {
    $db = new PDO('mysql:host=localhost;'
                   .'dbname=db_tareas;charset=utf8'
                , 'root', '');
    $sentencia = $db->prepare( "SELECT * from tarea");
    $sentencia->execute();
    return $sentencia->fetchAll();
  }

  //tarea ['titulo' = > 'lalal', 'descrpcion'=> 'lalala']
  function insertarTarea($tarea)
  {
    $db = new PDO('mysql:host=localhost;'
                   .'dbname=db_tareas;charset=utf8'
                , 'root', '');
    $sentencia = $db->prepare("INSERT INTO tarea (titulo, descripcion) VALUES (?,?)");
    $sentencia->execute([$tarea['titulo'], $tarea['descripcion']]);
    return $db->lastInsertId();
  }

  function deleteTarea($id_tarea)
  {
    $db = new PDO('mysql:host=localhost;'
                   .'dbname=db_tareas;charset=utf8'
                , 'root', '');
    $sentencia = $db->prepare("DELETE from tarea where id=?");
    $sentencia->execute([$id_tarea]);
  }
?>
