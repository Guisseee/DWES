<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
  $num=$_GET['numero'];
    if($num==1){
      echo "Lunes";
    }
    elseif ($num==2) {
      echo "Martes";
    }elseif($num==3) {
      echo "Miercoles";
    }
    elseif ($num==4) {
      echo "Jueves";
    }
    elseif ($num==5) {
      echo "Viernes";
    }
    elseif ($num==6) {
      echo "Sabado";
    }
    elseif ($num==7) {
      echo "Domingo";
    }
?>
</body>
</html>