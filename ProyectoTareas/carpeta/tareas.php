<?
include "funciones.php";
include "conexionDB.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Listado de tareas</h1>
  <h3>usuario: <?echo $usuarioSesion=$_SESSION['usuario']; ?></h3>
<?
if (isset($_POST['Eliminar'])) {
  $idTarea = $_POST['eliminar_tarea'];
  eliminarTarea($conn, $idTarea);
}
if (isset($_POST['Actualizar'])){
  $Desc= $_POST['nuevaDescripcion'];
  if (strlen($Desc)>=200){
    echo "La Descripcion debe tener menos de 200 caracteres";
  }else {
  $idTarea = $_POST['ActualizarTareaId'];
  modificarDescripcion($conn, $idTarea, $Desc);
  }
}

$listaTareas=obtenerTareas($conn);
echo "<table border ='1'>";
echo "<tr><th>ID</th><th>Titulo</th><th>Descripcion</th></tr>";
foreach ($listaTareas as $tarea) {

    echo "<tr>";
    echo "<td>" . $tarea->id . "</td>";
    echo "<td>" . $tarea->titulo . "</td>";
    echo "<td>" . $tarea->descripcion . "</td>";
    echo "<td>
    <form method='post'>
        <input type='hidden' name='eliminar_tarea' value='".$tarea->id."'>
        <input type='submit' value='Eliminar' name='Eliminar'>
        </td>
        <td>
        <input type='hidden' name='ActualizarTareaId' value='".$tarea->id."'>
        <input type='text' placeholder='Nueva Descripcion' name='nuevaDescripcion'> 
        <input type='submit' value='Actualizar' name='Actualizar'>
        </td>
        </form>
  </td>";
  }    
  echo "</tr>";
  echo "</table>";
?>
<a href="insertarTareas.php">Insertar nueva tarea </a><br>
<a href="cerrarsesion.php">Cerrar sesion</a>
</body>
</html>
