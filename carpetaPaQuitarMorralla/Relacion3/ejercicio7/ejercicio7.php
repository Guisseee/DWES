<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php 
  $nota1= $_GET['nota1'];
  $nota2= $_GET['nota2'];
  $nota3= $_GET['nota3'];
  $media= ($nota1+$nota2+$nota3)/3;
  echo "La media de las 3 notas es: ".$media;
  ?>
</body>
</html>