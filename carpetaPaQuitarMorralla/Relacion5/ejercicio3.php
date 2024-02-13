<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php 
  $array=[];
  $arrayRotado=[];

  for ($i=0; $i<15; $i++) { 
    $array[$i]=rand(0,100);
    echo $array[$i]." ";
  }
  echo " <br>";
  $arrayRotado[14]= $array[0];
  for ($i=0; $i<14; $i++) { 
      $arrayRotado[$i]= $array[$i+1];
  }
  for ($i=0; $i < 15; $i++) { 
    echo $arrayRotado[$i]." ";
  }
  echo " <br>";
  $arrayRotado[0]= $array[14];
  for ($i=1; $i<14; $i++) { 
      $arrayRotado[$i]= $array[$i-1];
  }
  for ($i=0; $i < 15; $i++) { 
    echo $arrayRotado[$i]." ";
  }
  ?>
</body>
</html>