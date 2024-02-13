<?php

$usuarios = array("usuario", "guille");
$passwords = array("usuario", "1234");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Verificar si el usuario y la contraseña coinciden
    $index = array_search($username, $usuarios);

    if ($index !== false && $password === $passwords[$index]) {
        // Usuario autenticado, redirigir a la página de éxito
        header("Location: logueado.html");
        exit();
    } else {
        // Usuario no autenticado, mostrar mensaje de error
        echo "Usuario o contraseña incorrectos. Inténtalo de nuevo.";
    }
}
?>
