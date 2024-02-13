<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 8</title>
    </head>
    <body>
      <?
        $my_list = array(1, 9, 3, 8, 5, 7);

        for ($i = 0; $i < count($my_list); $i++) {
          echo $my_list[$i] * 2 . "<br />";
        }
      ?>
    </body>
  </html>