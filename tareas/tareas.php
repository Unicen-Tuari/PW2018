<?php
require_once 'bbdd.php';
DEFINE('BASEURL','//'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/');

  function mostrarTareas($params = [])
  {
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/tareas.css">
  </head>
  <body>
<h1>Lista de Tareas</h1>
<ul>
    <?php

    $tareas = obtenerTareas();

    foreach ($tareas as $tarea) {
      echo '<li';
      if ($tarea['finalizada'] == 1){
        echo ' class="tachado"';
      }
      echo '><a href="detalle/'.$tarea['id'].'">'.$tarea['titulo'].'</a>: '.$tarea['descripcion'].' <a href="borrar/'.$tarea['id'].'">Borrar</a> <a href="finalizar/'.$tarea['id'].'">Finalizar</a></li>';
    }
    ?>

<?php

 ?>
</ul>
<a href="crear">Crear Tarea</a>
</body>
</html>
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
    homePage();
  }

  function borrarTarea($params = [])
  {
    deleteTarea($params[0]);
    homePage();
  }

  function finalizaTarea($params = [])
  {
    finalizarTarea($params[0]);
    homePage();
  }

  function homePage()
  {
    header("Location: ".BASEURL."ver");
  }

  function mostrarDetalle($params = [])
  {
    $tarea = obtenerTarea($params[0]);
    echo '<h1>'.$tarea['titulo'].'</h1>';
    echo '<p>'.$tarea['descripcion'].'</p>';
    if ($tarea['finalizada'] == 1)
      echo '<h2> Esta Finalizada </h2>';
    else
      echo '<h2> No esta Finalizada </h2>';
  }

?>
