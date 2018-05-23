<?php
require_once 'bbdd.php';
DEFINE('BASEURL','//'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/');

  function mostrarTareas($params = [])
  {
?>
<h1>Lista de Tareas</h1>
<ul>
    <?php

    $tareas = obtenerTareas();

    foreach ($tareas as $tarea) {
      echo '<li>'.$tarea['titulo'].': '.$tarea['descripcion'].' <a href="borrar/'.$tarea['id'].'">Borrar</a></li>';
    }

    //for
    ?>

<?php

 ?>
</ul>
<form … >
	...
</form>
    <?php
  }

  function crearTarea($params = [])
  {
?>
  <form action="guardar" method="post">
    <label for="titulo">Titulo</label>
    <input type="text" name="titulo" value="">
    <label for="descripcion">Descripcion</label>
    <input type="text" name="descripcion" value="">
    <button type="submit" name="button">Crear</button>
  </form>
<?php
  }

  function guardarTarea($params = [])
  {
    $tarea = [
      'titulo' => $_POST['titulo'],
      'descripcion' => $_POST['descripcion']
    ];
    insertarTarea($tarea);
    header("Location: ".BASEURL."ver");
  }

  function borrarTarea($params = [])
  {
    deleteTarea($params[0]);
    header("Location: ".BASEURL."ver");
  }

?>
