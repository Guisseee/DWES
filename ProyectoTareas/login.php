<?
session_start();

include_once("Db.php");

if (isset($_POST["usuario"]) && isset($_POST["password"])) {
  $usuario=$_POST["usuario"];
  $password=hash('sha512', $_POST['password']);

try {
  $user= new user();
  $existeUsuario= $user->existeUsuario($usuario,$password);
  if($existeUsuario){
    $_SESSION['usuario']=$usuario;
    header("Location: tareas.php");
  }else {
    echo "Los datos no son correctos";
  }    
  $fila = $statement->fetch();
  //$user = new User()
  //$existeUsuario= $user->existeUsuario($username,$passCifrada);
  //if($existeUsuario){
  //  $_SESSION['usuario']=$usuario;
  //  header("Location: tareas.php");
  //} else {
    //  echo "No has introducido las credenciales correctamente";
  //}
  }
  
    if ($fila) {
      $_SESSION['usuario']=$usuario;
      $_SESSION['user_id'] = $fila['id'];
      header("Location: tareas.php");
      exit();
    } else {
      echo "No has introducido las credenciales correctamente";
      
    }
    }
  catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  
} 
require("./view/login.view.php");
?>