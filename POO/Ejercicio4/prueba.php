<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  require_once ('Poligono.php');
  require_once ('Triangulo.php');
  require_once ('Cuadrado.php');
  require_once ('Rectangulo.php');

  $cuadrado = new Cuadrado(3,3);
  $rectangulo = new Rectangulo(3, 10);
  $triangulo = new Triangulo(3, 10);

  echo "Area del cuadrado: ".$cuadrado->calcularArea()."</br>";
  echo "Area del rectangulo: ".$rectangulo->calcularArea()."</br>";
  echo "Area del triangulo: ".$triangulo->calcularArea()."</br>";
  
  ?>
</body>
</html>