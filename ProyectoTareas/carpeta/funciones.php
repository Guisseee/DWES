<?
session_start();
include "conexionDB.php";

function obtenerTareas($conn) {
  
  $user_id = $_SESSION['user_id'];
  $statement= $conn->prepare("SELECT tarea.id, tarea.titulo, tarea.descripcion FROM tarea 
    JOIN usuarios_tarea ON tarea.id = usuarios_tarea.tarea 
    WHERE usuarios_tarea.usuario = :user_id");
    
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $resultado=$statement->execute();
    
    if ($resultado) {
      
    return $statement->fetchAll(PDO::FETCH_OBJ);
  } else {
    return "";
  }
}


function obtenerIdUsuario($usuario, $conn) {
    $statement = $conn->prepare("SELECT id from usuarios where usuario= :usuario");
    $statement->execute(array(
      ':usuario' => $usuario,
  ));
  $id="";
  $statement->bind_result($id);
  
  if ($statement->FETCH_object()) {
    return $id;
} else {
    
    return null;
}
}
function eliminarTarea($conn, $idTarea) {
  $statement = $conn->prepare("DELETE FROM usuarios_tarea WHERE tarea = :tarea_id");
  $statement->bindParam(':tarea_id', $idTarea);
  $statement->execute();


  $statement = $conn->prepare("DELETE FROM tarea WHERE id = :tarea_id");
  $statement->bindParam(':tarea_id', $idTarea);
  $statement->execute();

    echo "Tarea eliminada correctamente.";
    }

function modificarDescripcion($conn, $idTarea, $Desc){
  $statement = $conn->prepare("UPDATE tarea SET descripcion = '$Desc' WHERE id = $idTarea");
  $statement->execute();
  
  if ($statement) {
    echo "Tarea actualizada correctamente.";
  } else {
    echo "Error al actualizar la tarea: " . $conn->error;
  }
}
