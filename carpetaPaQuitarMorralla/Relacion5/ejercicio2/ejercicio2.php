<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php 
  $num=$_GET["num"];
  $num2=$_GET["num2"];
  $num3=$_GET["num3"];
  $num4=$_GET["num4"];
  $Maximo=$num;
  $Minimo=$num;

  $numeros= [$num,$num2,$num3,$num4];

  // for ($i=0; $i <4 ; $i++) { 
  //   echo $numeros[$i]." ";
  //   if ($numeros[$i]>$Maximo) {
  //     $numeros[$i]= $Maximo;
  //   }else ($numeros[$i]<$Minimo){
  //     $numeros[$i]= $Minimo;
  //   }
  // }
  

  ?>
</body>
</html>