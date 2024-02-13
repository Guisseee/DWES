<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <!-- <?php $dado1= rand(1,6);
  switch ($dado1) {
    case '1':
      ?><img src="fotosdado\1.svg" alt=""><?php
      break;
    case '2':
      ?><img src="fotosdado\2.svg" alt=""><?php
      break;
    case '3':
      ?><img src="fotosdado\3.svg" alt=""><?php
      break;
    case '4':
      ?><img src="fotosdado\4.svg" alt=""><?php
      break;
    case '5':
      ?><img src="fotosdado\5.svg" alt=""><?php
      break;
    case '6':
      ?><img src="fotosdado\6.svg" alt=""><?php
      break;
  }
  ?>
  <?php $dado2= rand(1,6);
  switch ($dado2) {
    case '1':
      ?><img src="fotosdado\1.svg" alt=""><?php
      break;
    case '2':
      ?><img src="fotosdado\2.svg" alt=""><?php
      break;
    case '3':
      ?><img src="fotosdado\3.svg" alt=""><?php
      break;
    case '4':
      ?><img src="fotosdado\4.svg" alt=""><?php
      break;
    case '5':
      ?><img src="fotosdado\5.svg" alt=""><?php
      break;
    case '6':
      ?><img src="fotosdado\6.svg" alt=""><?php
      break;
  }
  ?><br>
  La suma total de los dados es:  <?php echo $total=$dado1+$dado2 ?> -->

  <?php $dado1= rand(1,6);
  $dado2= rand(1,6);
  echo "<img src=\"./fotosdado/"  . $dado1 .  ".svg\" />";
  echo "<img src=\"./fotosdado/"  . $dado2 .  ".svg\" />";
  echo $total=$dado1+$dado2;
  ?>

</body>
</html>