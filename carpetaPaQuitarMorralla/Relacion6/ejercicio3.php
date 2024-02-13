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

  for ($i=10; $i < 10000; $i++) { 
    if (esCapicua($i)== true){
      echo $i." ";
    }
  }
  
  ?>
</body>
</html>