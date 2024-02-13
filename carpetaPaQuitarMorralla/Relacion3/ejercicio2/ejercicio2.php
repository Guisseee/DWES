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
    if($num>=6 && <=12){
      echo "Buenos dias";
    }
    elseif ($num>=13&&<=21) {
      echo "Buenas tardes";
    }
    elseif($num<=5) {
      echo "Buenas noches";
    }
    elseif ($num>=21) {
      echo "Buenas noches";
    }
    elseif ($num>=25) {
      echo "Eso no es una franja horaria";
    }
    elseif ($num<=0) {
      echo "Eso no es una franja horaria";
    }
  ?>
</body>
</html>