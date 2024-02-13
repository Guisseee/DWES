<?php

session_start();

$_SESSION['jugador1'] = crearCartaAleatoria();
$_SESSION['jugador2'] = crearCartaAleatoria();

header('Location: index.php');

function crearCartaAleatoria() {
    $palo = 'c';
    $numeros = rand(1, 10);

    return $palo . $numeros . '.svg';
}
session_destroy();
?>