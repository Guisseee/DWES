<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php 
  $num= $_GET['num'];
  for ($i=0; $i <= 10; $i++) { 
    $multiplicacion=$num*$i;
    echo "<table border=2px>
    <tr><th>Tabla de multiplicar</th></tr>
    <tr>
    <td>".$multiplicacion."</td>
    <td>X</td>
    <td>".$num."</td>
    <td>=</td>
    <td>".$multiplicacion."</td>
    </tr>
    </table>";
  }
  ?>
</body>
</html>