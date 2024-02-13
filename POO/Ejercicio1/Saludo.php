<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
  require_once('Persona.php');

  $juan= new Persona("Juan", "Perez", 25);

  echo $juan->mayorEdad()."</br>";

  $juan->nombreCompleto();

?>
</body>
</html>
