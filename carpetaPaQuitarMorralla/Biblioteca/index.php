<!-- BIBLIOTECA VERSIÓN 1
     Características de esta versión:
       - Código monolítico (sin arquitectura MVC)
       - Sin seguridad
       - Sin sesiones ni control de acceso
       - Sin reutilización de código
-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
</head>

<body>
<?php

// Conectamos a la base de datos
$db = new mysqli("localhost", "<tu_usuario>", "<tu_contraseña>", "<tu_base_de_datos>");

// Verificamos la conexión
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Miramos el valor de la variable "action", si existe. Si no, le asignamos una acción por defecto
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {
    $action = "mostrarListaLibros";  // Acción por defecto
}

if ($action == "mostrarListaLibros") {
    mostrarListaLibros();
}
if ($action == "formularioInsertarLibros") {
    formularioInsertarLibros();
}
if ($action == "insertarLibro") {
    insertarLibro();
}
if ($action == "borrarLibro") {
    borrarLibro();
}
if ($action == "formularioModificarLibro") {
    formularioModificarLibro();
}
if ($action == "modificarLibro") {
    modificarLibro();
}
if ($action == "buscarLibros") {
    buscarLibros();
}
if ($action == "formularioInsertarAutores") {
    formularioInsertarAutores();
}
if ($action == "insertarAutor") {
    insertarAutor();
}

// --------------------------------- MOSTRAR LISTA DE LIBROS ----------------------------------------
function mostrarListaLibros()
{
    echo "<h1>Biblioteca</h1>";
    //Conecta con la BD y comprueba si hay libros. Si no hay muestra un mensaje indicando que no hay libros.

    //En el caso que haya libros. Muestra los libros y además, muestra un formulario de búsqueda y que busque por el título del libro.

    $result = $db ->query("SELECT * FROM libros");
    // Buscamos todos los libros de la biblioteca
    if ($result->num_rows != 0) {
        // Mostrar los libros
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Género</th>
                    <th>País</th>
                    <th>Año</th>
                    <th>Número de páginas</th>
                    <th>Acciones</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['idLibro'] . "</td>
                    <td>" . $row['titulo'] . "</td>
                    <td>" . $row['genero'] . "</td>
                    <td>" . $row['pais'] . "</td>
                    <td>" . $row['año'] . "</td>
                    <td>" . $row['numPaginas'] . "</td>
                    <td>
                        <a href='index.php?action=borrarLibro&idLibro=" . $row['idLibro'] . "'>Borrar</a>
                        <a href='index.php?action=formularioModificarLibro&idLibro=" . $row['idLibro'] . "'>Modificar</a>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        // La consulta no contiene registros
        echo "No se encontraron datos";
    }
    echo "<p><a href='index.php?action=formularioInsertarLibros'>Nuevo</a></p>";
}

// --------------------------------- FORMULARIO ALTA DE LIBROS ----------------------------------------
function formularioInsertarLibros()
{
    echo "<h1>Modificación de libros</h1>";

    // Crear el formulario con los campos del libro
    echo "<form action='index.php' method='get'>
            Título:<input type='text' name='titulo'><br>
            Género:<input type='text' name='genero'><br>
            País:<input type='text' name='pais'><br>
            Año:<input type='text' name='ano'><br>
            Número de páginas:<input type='text' name='numPaginas'><br>";

    // Añadimos un select para seleccionar id del autor o autores
    $resultAutores = $db->query("SELECT * FROM personas");
    echo "Autores: <select name='idPersona[]' multiple>";
    while ($rowAutor = $resultAutores->fetch_assoc()) {
        echo "<option value='" . $rowAutor['idPersona'] . "'>" . $rowAutor['nombre'] . " " . $rowAutor['apellido'] . "</option>";
    }
    echo "</select><br>";

    // Finalizamos el formulario
    echo "  <input type='hidden' name='action' value='insertarLibro'>
            <input type='submit'>
        </form>";
    echo "<p><a href='index.php'>Volver</a></p>";
}

// --------------------------------- INSERTAR LIBROS ----------------------------------------
function insertarLibro()
{
    echo "<h1>Alta de libros</h1>";

    // Vamos a procesar el formulario de alta de libros
    // Primero, recuperamos todos los datos del formulario (titulo, género...)
    $titulo = $_GET['titulo'];
    $genero = $_GET['genero'];
    $pais = $_GET['pais'];
    $ano = $_GET['ano'];
    $numPaginas = $_GET['numPaginas'];

    // Lanzamos el INSERT contra la BD.
    $query = "INSERT INTO libros (titulo, genero, pais, año, numPaginas) VALUES ('$titulo', '$genero', '$pais', '$ano', '$numPaginas')";
    $db->query($query);

    // Recuperamos el idLibro que se ha asignado al libro que acabamos de insertar
    $idLibro = $db->insert_id;

    // Insertamos los autores en la tabla "escriben"
    if (isset($_GET['idPersona']) && is_array($_GET['idPersona'])) {
        foreach ($_GET['idPersona'] as $idPersona) {
            $queryEscriben = "INSERT INTO escriben (idLibro, idPersona) VALUES ($idLibro, $idPersona)";
            $db->query($queryEscriben);
        }
    }

    // Mostramos mensaje con el resultado de la operación
    echo "Libro insertado con éxito";
    echo "<p><a href='index.php'>Volver</a></p>";
}

// Resto del código...

// Cerramos la conexión a la base de datos al final del script
$db->close();
?>
</body>

</html>
