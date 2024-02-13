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
  $arrayCambiado=[];
  $num=$_GET['numero1'];
  $num2=$_GET['numero2'];

  for($i=0; $i<100; $i++){
    $array[$i]=rand(0,20);
    echo $array[$i]." ";
  }
  echo "<br>";
  for ($i=0; $i < 100 ; $i++) { 
    $arrayCambiado[$i]=$array[$i];
    if ($array[$i]== $num){
      echo $array[$i]=$num2." ";
    }else{
      echo $arrayCambiado[$i]." ";
    }
    
  }
  
  ?>

</body>
</html>