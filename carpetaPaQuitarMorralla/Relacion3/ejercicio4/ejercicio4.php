<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php $horas=$_GET["num"];
  if ($horas<=40){
    $dinero=$horas*12;
    echo "El dinero total es: ".$dinero;
  }elseif ($horas=$_GET["num"]) {
    $horasMax=$horas-40;
    $dinero=$horasMax*16;
    $dineroTotal=480+$dinero;
    echo "El dinero total es: ".$dineroTotal;
  }
  ?>
</body>
</html>