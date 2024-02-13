<?

include "conexionDB.php";
include "funciones.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST['tituloTarea']) && isset($_POST['descTarea'])) {
  
  $titulo= $_POST['tituloTarea'];
  $desc= $_POST['descTarea'];
  
  $statement = $conn->prepare('SELECT * FROM tarea WHERE titulo = :titulo');
  $statement->execute(array(':titulo' => $titulo));
  $resultado = $statement->fetch();
  
  if ($resultado) {
    echo "la tarea ya existe";
  } else {
    $statement = $conn->prepare("INSERT INTO tarea(titulo, descripcion) values (:titulo, :desc)");
    $statement->execute(array(
    ':titulo' => $titulo,
    ':desc' => $desc
)); 
    $idTarea= $conn->lastInsertId();
    $idUsuario=$_SESSION['user_id'];
   
    $statement = $conn ->prepare("INSERT INTO usuarios_tarea(tarea, usuario) values (:idTarea, :idUsuario)");
    $statement->execute(array(
      ':idUsuario' => $idUsuario,
      ':idTarea' => $idTarea
  ));
  header("Location: tareas.php");
    }
  }
}
require("./view/insertarTareas.view.php");
?>