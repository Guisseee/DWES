<?php
  session_start();

  if(isset($_POST["reset"])){
    $_SESSION["cont"]=0;
  }
  
  if(!isset($_SESSION["cont"])){
    $_SESSION["cont"]= 0;
  }else {
    $_SESSION["cont"]++;
  }
  echo $_SESSION["cont"];

  
  // session_destroy();
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="" method="post">
    <input type="submit" name="reset" value="Cerrar Sesión">
  </form>
</body>
</html>

