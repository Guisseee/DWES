<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php 
  $digito=$_GET['num'];
  $cont=0;
  do {
    $digito=round($digito/10,0);
    $cont++;
  } while ($digito != 0);
  echo "Tu número tiene ".$cont." dígitos"
  ?>
</body>
</html>