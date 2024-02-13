<?php
session_start();
if (
    isset($_POST['usuario']) && isset($_POST['password'])
    && isset($_POST['password2'])
) {

    $usuario = strtolower($_POST['usuario']);
    $password = hash('sha512', $_POST['password']);
    $password2 = hash('sha512', $_POST['password2']);


    if ($password == $password2) { //si las pass coinciden
        //comprobamos que el usuario no existe ya en BD
        try {
            $host = "db";
            $dbUsername = "root";
            $dbPassword = "test";
            $dbName = "tareas";
            $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $conn->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
            $statement->execute(array(':usuario' => $usuario));
            $resultado = $statement->fetch();

            if ($resultado) {
                echo "el usuario ya existe";
            } else {
                //guardo en BD el usuario
                $statement = $conn->prepare('INSERT INTO usuarios(usuario, password) values (:usuario, :pass)');
                $statement->execute(array(
                    ':usuario' => $usuario,
                    ':pass' => $password
                ));
            }
        } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        }
    } else{
        echo "Las contraseñas no coinciden";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>REGISTRO</h1>
    <form action="" method="post">
        <input type="text" name="usuario" placeholder="Usuario">
        <input type="text" name="password" placeholder="Contraseña">
        <input type="text" name="password2" placeholder="Repite Contraseña">
        <input type="submit" value="Enviar">
    </form><br>
    <a href="login.php">Iniciar Sesión</a>
</body>
</html>