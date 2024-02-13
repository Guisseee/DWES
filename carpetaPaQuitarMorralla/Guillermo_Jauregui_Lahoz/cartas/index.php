<?php

session_start();


function crearCartaAleatoria() {
    $palo = 'c';
    $numeros = rand(1, 10);

    return $palo . $numeros . '.svg';
}

if (!isset($_SESSION['jugador1']) || !isset($_SESSION['jugador2'])) {
    $_SESSION['jugador1'] = crearCartaAleatoria();
    $_SESSION['jugador2'] = crearCartaAleatoria();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Cartas</title>
</head>
<body>

    <h1>Jugador 1</h1>
    <img src="fotos/<?php echo $_SESSION['jugador1']; ?>" alt="Jugador 1" width="150">

    <h1>Jugador 2</h1>
    <img src="fotos/<?php echo $_SESSION['jugador2']; ?>" alt="Jugador 2" width="150">

<?php
if ($_SESSION['jugador1'] > $_SESSION['jugador2']) {
    echo "<br>Jugador 1 gana";
}else if ($_SESSION['jugador1'] < $_SESSION['jugador2']) {
    echo "<br>Jugador 2 gana";
}else if ($_SESSION['jugador1'] == $_SESSION['jugador2']) {
    echo "<br>Empate";
}
session_destroy();
?>

    <form action="funcion.php" method="post">
        <input type="submit" value="Volver a jugar">
    </form>

</body>
</html>

