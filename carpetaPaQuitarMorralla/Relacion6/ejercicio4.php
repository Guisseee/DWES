<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 4</title>
    </head>
    <body>
      <form method = "post">
        <label for = "num">número en binario <input type = "number" name = "num" required /></label>
        <input type = "submit" value = "submit" />
      </form>

      <?
        if (isset($_POST["num"])) {
          $num = $_POST["num"];

          echo "<p>el número en decimal es: " . bindec($num); "</p>";
        }
      ?>