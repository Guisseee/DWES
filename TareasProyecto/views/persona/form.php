<?php
// VISTA PARA INSERCIÓN DE Personas

if (isset($persona)) {   
    echo "<h1>Modificación de libros</h1>";
} else {
    echo "<h1>Inserción de personas</h1>";
}

echo "<form action = 'index.php' method = 'get'>
        Nombre:<input type='text' name='nombre' value=''><br>
        Apellidos:<input type='text' name='apellidos' value=''><br>";
    

    echo "  <input type='hidden' name='action' value='insertarPersona'>";

echo "	<input type='submit'></form>";
echo "<p><a href='index.php'>Volver</a></p>";