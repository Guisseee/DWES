<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  $h=$_GET['h'];
  $g=9.81;
  $division=(2*$h)/$g;
  $resultado= sqrt($division);
  echo "Lo que tarda en caer es: ".$resultado;
  ?>
</body>
</html>