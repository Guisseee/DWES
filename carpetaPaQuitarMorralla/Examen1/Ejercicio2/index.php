<!-- Crea un array asociativo con tu horario de clase y muestralo por pantalla. -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<?php

//Creacion del array asociativo.
  $Horario = array(
    "primeraHora" => array("lunes" => "DWECL", "martes" => "DWECL", "miercoles" => "DWESE", "jueves" => "DWESE", "viernes" => "DIWEB"),
    "segundaHora" => array("lunes" => "DWECL", "martes" => "DWECL", "miercoles" => "DWESE", "jueves" => "DWESE", "viernes" => "DIWEB"),
    "terceraHora" => array("lunes" => "DWECL", "martes" => "DWECL", "miercoles" => "DIWEB", "jueves" => "DWESE", "viernes" => "DIWEB"),
    "cuartaHora" => array("lunes" => "DWESE", "martes" => "DAWEB", "miercoles" => "DIWEB", "jueves" => "EMPRESA", "viernes" => "HLC"),
    "quintaHora" => array("lunes" => "DWESE", "martes" => "DAWEB", "miercoles" => "DIWEB", "jueves" => "EMPRESA", "viernes" => "HLC"),
    "sextaHora" => array("lunes" => "DWESE", "martes" => "DAWEB", "miercoles" => "EMPRESA", "jueves" => "EMPRESA", "viernes" => "HLC"),
  );
  ?>
  <!-- Creacion de la tabla y la impresion del array en esta. -->
  <table border="2px">
    <tr>
      <td> </td>
      <td>Lunes----Martes---Miercoles-Jueves--Viernes</td>
    </tr>
    <tr>
      <td>Primera Hora</td>
      <td><?php echo implode(" ",$Horario["primeraHora"])."<br>"; ?></td>
    </tr>
    <tr>
      <td>Segunda Hora</td>
      <td><?php echo implode(" ",$Horario["segundaHora"])."<br>"; ?></td>
    </tr>
    <tr>
      <td>Tercera Hora</td>
      <td><?php echo implode(" ",$Horario["terceraHora"])."<br>"; ?></td>
    </tr>
    <tr>
      <td>Cuarta Hora</td>
      <td><?php echo implode(" ",$Horario["cuartaHora"])."<br>"; ?></td>
    </tr>
    <tr>
      <td>Quinta Hora</td>
      <td><?php echo implode(" ",$Horario["quintaHora"])."<br>"; ?></td>
    </tr>
    <tr>
      <td>Sexta Hora</td>
      <td><?php echo implode(" ",$Horario["sextaHora"]); ?></td>
    </tr>
  </table>
?>

</body>
</html>