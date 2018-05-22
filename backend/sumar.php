<?php

  function sumar($sumados)
  {
    var_dump($_SERVER);
    $baseurl = '//'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/';
    ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <base href="<?= $baseurl ?>" target="_blank">
  </head>
  <body>
    <img src="img/panda.jpg" alt="">
<?php
  $suma = 0;
  foreach ($sumados as  $val) {
    $suma += $val;
  }
  echo "<p>$suma</p>";
?>
</body>
</html>
<?php
  }
?>
