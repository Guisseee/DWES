<?php 
    $host = "db";
    $dbUsername = "root";
    $dbPassword = "test";
    $db = "tareas";
    $conn = new PDO("mysql:host=$host;dbname=$db", $dbUsername, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $statement = $conn->prepare('SELECT t.* FROM tarea t 
            LEFT JOIN usuarios_tarea ut ON t.id = ut.tarea
            INNER JOIN usuarios u ON ut.usuario = :idUsuario;');

        $statement->execute(array(':usuario' => $_SESSION['usuario']));
        $listaTarea = $statement->fetchAll();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        $listaTarea = [];
    }
?> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tareas</title>
</head>
<body>
    <h1>Gestión de Tareas</h1>

    <!-- Formulario para agregar nueva tarea -->
    <form action="" method="post">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required>
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required></textarea>
        <input type="submit" name="nuevaTarea" value="Agregar Tarea">
    </form>

    <!-- Lista de tareas -->
    <ul>
        <?php foreach ($listaTarea as $tarea) { ?>
            <li>
                <a href="?verDescripcion=<?php echo $tarea['id']; ?>"><?php echo $tarea['titulo']; ?></a>
                <form action="" method="post" style="display:inline;">
                    <input type="hidden" name="idTarea" value="<?php echo $tarea['id']; ?>">
                    <input type="submit" name="borrarTarea" value="Eliminar">
                </form>
                <!-- Formulario para modificar tarea -->
                <form action="" method="post" style="display:inline;">
                    <input type="hidden" name="idTarea" value="<?php echo $tarea['id']; ?>">
                    <input type="hidden" name="titulo" value="<?php echo $tarea['titulo']; ?>">
                    <input type="hidden" name="descripcion" value="<?php echo $tarea['descripcion']; ?>">
                    <input type="submit" name="modificarTarea" value="Modificar">
                </form>
            </li>
        <?php } ?>
    </ul>

<?php
if (isset($_GET['verDescripcion'])) {
    $idTareaVerDescripcion = intval($_GET['verDescripcion']);
    $host = "db";
    $dbUsername = "root";
    $dbPassword = "test";
    $db = "tareas";
    $conn = new PDO("mysql:host=$host;dbname=$db", $dbUsername, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
        $statement = $conn->prepare('SELECT * FROM tarea WHERE id = :idTarea');
        $statement->execute(array(':idTarea' => $idTareaVerDescripcion));
        $tareaSeleccionada = $statement->fetch();
        echo "<h2>Descripción de la Tarea</h2>";
        echo "<p>{$tareaSeleccionada['descripcion']}</p>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    exit();
}
?>
</body>
</html>
