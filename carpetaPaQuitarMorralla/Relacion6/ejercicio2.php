<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  include 'funciones.php';
  
  echo "<b>Ejercicio 2<br></b>";

  for ($i=0; $i < 1000; $i++) { 
    if (esPrimo($i)){
      echo $i." ";
    }
  }

  ?>
</body>
</html>