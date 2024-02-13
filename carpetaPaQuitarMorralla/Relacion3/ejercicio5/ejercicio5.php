<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php 
  $a= $_GET['a'];
  $b= $_GET['b'];
  if ($a==0){
    echo "Esta operacion no se puede realizar";
  }
  if ($a!=0){
  $resultado= -$b/$a;
  echo "El resultado de la x es: ".$resultado;
  }
  ?>
</body>
</html>