<?php

extract($data); 
if (isset($tarea)) {   
    echo "<h1>Modificación de Tareas</h1>";
} else {
    echo "<h1>Inserción de Tareas</h1>";
}

$action= $_REQUEST["action"];

$idTarea = $tarea->id ?? ""; 
$titulo = $tarea->titulo ?? "";
$descripcion = $tarea->descripcion ?? "";


echo "<form action = 'index.php' method = 'get'>
        <input type='hidden' name='idTarea' value='".$idTarea."'>
        Título:<input type='text' name='titulo' value='".$titulo."'><br>
        Descripción:<input type='text' name='descripcion' value='".$descripcion."'><br>
        ";

if ($action == "formularioModificarTarea") {
    echo "  <input type='hidden' name='action' value='modificarTarea'>";
} else {
    echo "  <input type='hidden' name='action' value='insertarTarea'>";
}
echo "	<input type='submit'></form>";
echo "<p><a href='index.php'>Volver</a></p>";