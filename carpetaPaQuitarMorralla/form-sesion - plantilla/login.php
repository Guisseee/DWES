<?
if (isset($_POST['usuario']) && isset($_POST['password'])) {

  $usuario = strtolower($_POST['usuario']);
  $password = hash('sha512', $_POST['password']);

      try {
          $host = "db";
          $dbUsername = "root";
          $dbPassword = "test";
          $dbName = "usuario";
          $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $statement = $conn->prepare('SELECT * FROM usuario WHERE usuario = :usuario AND password = :password');
          $statement->execute(array(':usuario' => $usuario, ':password' => $password));
          $resultado = $statement->fetch();

          if ($resultado) {
            $_SESSION['usuario']= $usuario;
            header("Location: contenido.php");
          } else {
            header("Location: login.php");
          }
      } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
      }
  }

require 'views/login.view.php';
?>