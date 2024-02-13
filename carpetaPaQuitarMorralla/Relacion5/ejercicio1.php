<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php 

  // for ($i=0; $i<20 ; $i++) { 
  //   $numero[$i]= (rand(0,100));
  //   $cuadrado[$i]= ($numero[$i]*$numero[$i]);
  //   $cubo[$i]=$numero[$i]*$numero[$i]*$numero[$i];
  //   echo ($i+1)." ".$numero[$i]." ";
  //   echo $cuadrado[$i]." ";
  //   echo $cubo[$i]."<br>";
  //   echo "<br>";
  // }

  
  $calculos= array(
    "numero" => array(),
    "cuadrado" => array(),
    "cubo" => array(),
  );
  
  for ($i=0; $i<20 ; $i++) { 
    $calculos["numero"][$i]= (rand(0,100));
    $calculos["cuadrado"][$i]= $calculos["numero"][$i]*$calculos["numero"][$i];
    $calculos["cubo"][$i]= $calculos["numero"][$i]*$calculos["numero"][$i]*$calculos["numero"][$i];

    echo $calculos["numero"][$i]." ";
    echo $calculos["cuadrado"][$i]." ";
    echo $calculos["cubo"][$i]."  <br>";
  }
  ?>
</body>
</html>