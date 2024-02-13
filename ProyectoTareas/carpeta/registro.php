<?
session_start();
include "conexionDB.php";

if (
    isset($_POST['usuario']) && isset($_POST['contraseña'])
    && isset($_POST['contraseña2'])
) {

    $usuario = strtolower($_POST['usuario']);
    $password = hash('sha512', $_POST['contraseña']);
    $password2 = hash('sha512', $_POST['contraseña2']);


    if ($password == $password2) { 
        
        try {
            $statement = $conn->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
            $statement->execute(array(':usuario' => $usuario));
            $resultado = $statement->fetch();
            if ($resultado) {
                echo "el usuario ya existe";
            } else {
                $statement = $conn->prepare('INSERT INTO usuarios(usuario, password) values (:usuario, :pass)');
                $statement->execute(array(
                    ':usuario' => $usuario,
                    ':pass' => $password
                ));
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        header("Location: login.php");
    } else {
        echo "usuario incorrecto";
    }
} else {
require("./view/registro.view.php");
}

?>