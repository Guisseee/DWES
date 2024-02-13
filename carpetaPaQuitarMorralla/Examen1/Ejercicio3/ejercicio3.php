<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php

  //Variable que se recoge desde el formulario.
  $num= $_GET["num"];
  

  //Funcion para saber los primos.
  function esPrimo($num){
    $esPrimo= true;
    for($i=2; $i<$num; $i++){
      if($num % $i==0){
        $esPrimo= false;
      }
    }
    if(($num==0) || ($num==1)){
      $esPrimo=false;
    }
    return $esPrimo;
  }
    

  //Código en el que se miran las excepciones y luego se imprimen por pantalla los números.
  if ($num<=1) {
    echo "<p><a href=\"index.php\"></p>Ese número no puede ser, introduzca otro de nuevo.</a>";
  }if ($num>1000) {
    echo "<p><a href=\"index.php\"></p>Ese número no puede ser, introduzca otro de nuevo.</a>";
  }else {
    for ($i=0; $i < $num; $i++) { 
      if (esPrimo($i)){
        echo $i." ";
      }
    }
  }

  

  ?>
</body>
</html>