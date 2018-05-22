<?php
require_once 'bbdd.php';


  function mostrarTareas($params = [])
  {
?>
<h1>Lista de Tareas</h1>
<ul>
    <?php

    $tareas = obtenerTareas();

    foreach ($tareas as $tarea) {
      echo '<li>'.$tarea['titulo'].': '.$tarea['descripcion'].'</li>';
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
  }


  function borrarTarea($params = [])
  {
    // code...
  }

?>
