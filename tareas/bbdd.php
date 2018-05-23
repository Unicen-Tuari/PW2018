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
?>
