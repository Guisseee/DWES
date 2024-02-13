<?php
session_start();
include_once("Usuario.php");
include_once("Tarea.php");

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario']) || !isset($_SESSION['idUsuario'])) {
    header("Location: login.php");
    exit();
}

$idUsuario = $_SESSION['idUsuario'];

// Añade una nueva tarea
if (isset($_POST['nuevaTarea'])) {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    try {
        $host = "db";
        $dbUsername = "root";
        $dbPassword = "test";
        $dbName = "tareas";

        // Establecer conexión a la base de datos
        $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        // Preparar y ejecutar la consulta SQL
        $statement = $conn->prepare('INSERT INTO tarea (titulo, descripcion) VALUES (:titulo, :descripcion)');
        $statement->execute(array(
            ':titulo' => $titulo,
            ':descripcion' => $descripcion
        ));

        // Redirigir o mostrar un mensaje de éxito si es necesario
        header("Location: tareasvista.php");
        exit();
    } catch (PDOException $e) {
        // Manejar errores de la base de datos
        echo "Error en la conexión a la base de datos: " . $e->getMessage();
    } catch (Exception $e) {
        // Manejar otras excepciones
        echo "Error general: " . $e->getMessage();
    }
}

// Manejar la eliminación de una tarea
if (isset($_POST['borrarTarea'])) {
    $idTarea = $_POST['idTarea'];

    try {
        $host = "db";
        $dbUsername = "root";
        $dbPassword = "test";
        $dbName = "tareas";

        $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $statement = $conn->prepare('DELETE FROM usuarios_tarea WHERE tarea = :idTarea');
        $statement->execute(array(':idTarea' => $idTarea));
        $statement = $conn->prepare('DELETE FROM usuarios_tarea WHERE tarea = :idTarea AND usuario = :idUsuario');
        $statement->execute(array(':idTarea' => $idTarea, ':idUsuario' => $idUsuario));

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Obtener lista de tareas
try {
    $host = "db";
        $dbUsername = "root";
        $dbPassword = "test";
        $dbName = "tareas";

        $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $conn->prepare('SELECT t.* FROM tarea t 
            INNER JOIN usuarios_tarea ut ON t.id = ut.tarea
            INNER JOIN usuarios u ON ut.usuario = :idUsuario');

        $statement->execute(array(':idUsuario' => $idUsuario));
        $listaTarea = $statement->fetchAll();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    
// Modificar una tarea existente
if (isset($_POST['modificarTarea'])) {
    $idTarea = $_POST['idTarea'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    try {
        $host = "db";
        $dbUsername = "root";
        $dbPassword = "test";
        $dbName = "tareas";

        $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $statement = $conn->prepare('UPDATE tarea SET titulo = :titulo, descripcion = :descripcion WHERE id = :idTarea');
        $statement->execute(array(':titulo' => $titulo, ':descripcion' => $descripcion, ':idTarea' => $idTarea));

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

require("tareasvista.php");
?>