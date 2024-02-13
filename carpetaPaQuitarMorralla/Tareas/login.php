<?
session_start();
if (!isset($_SESSION['usuario'])) {

    if (isset($_POST['usuario']) && isset($_POST['password'])) {

        $usuario = strtolower($_POST['usuario']);
        $password = hash('sha512', $_POST['password']);

        $host = "db";
        $dbUsername = "root";
        $dbPassword = "test";
        $db = "tareas";
        $conn = new PDO("mysql:host=$host;dbname=$db", $dbUsername, $dbPassword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $conn->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password LIMIT 1');
        $statement->execute(array(
            ':usuario' => $usuario,
            ':password' => $password
        ));
        $resultado = $statement->fetch();

        if ($resultado) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['idUsuario']=$resultado['id'];
            header("Location: functions.php");
            exit();
        } else {
            echo "El usuario no existe, por favor pruebe con otro.";
        }
    }
} else {
    header("Location: loginvista.php");
    exit();
}
require("loginvista.php");
?>