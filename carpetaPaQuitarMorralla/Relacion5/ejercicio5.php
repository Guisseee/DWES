<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php 
  for ($i = 0; $i < 8; $i++) {
    $num = rand();
    if ($num % 2 == 0) {
      echo "<p style='color:blue'>" . $num . "</p>";
    } else {
      echo "<p style='color:red'>" . $num . "</p>";
    }
  }
  ?>0
</body>
</html>