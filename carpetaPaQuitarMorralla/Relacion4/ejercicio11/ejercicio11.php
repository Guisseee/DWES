<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php 
  $num= $_GET["num"];
  for ($i=$num; $i<($num+5); $i++){
    echo $i." ".$i*$i." ".$i*$i*$i;?>
    <br><?php
  }
  ?>
</body>
</html>