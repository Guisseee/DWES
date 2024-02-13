<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  $nota1 = $_GET['nota1'];
  $nota2 = $_GET['nota2'];
  $nota3 = $_GET['nota3'];

  if ($nota1 < 0 || $nota2 < 0 || $nota3 < 0) {
    echo "No pueden ser numeros negativos";
  }
  if ($nota1 >= 0 && $nota1 <= 10 || $nota2 >= 0 && $nota2 <= 10 || $nota3 >= 0 && $nota3 <= 10) {
    $media = ($nota1 + $nota2 + $nota3) / 3;
    $mediaNoDecimal = round($media, 0);
    if ($mediaNoDecimal <= 4) {
      echo "Has sacado: " . $mediaNoDecimal . " Eso es un insuficiente";
    }
    if ($mediaNoDecimal == 5) {
      echo "Has sacado: " . $mediaNoDecimal . " Eso es un suficiente";
    }
    if ($mediaNoDecimal == 6) {
      echo "Has sacado: " . $mediaNoDecimal . " Eso es un bien";
    }
    if ($mediaNoDecimal == 7 || $mediaNoDecimal == 8) {
      echo "Has sacado: " . $mediaNoDecimal . " Eso es un notable";
    }
    if ($mediaNoDecimal == 9 || $mediaNoDecimal == 10) {
      echo "Has sacado: " . $mediaNoDecimal . " Eso es un sobresaliente";
    }
  }
  if ($nota1 > 10 || $nota2 > 10 || $nota3 > 10) {
    echo "No puede ser mayor a 10";
  }

  ?>
</body>

</html>