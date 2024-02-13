<?
require_once "Usuario.php";
try {
  $host = "db";
  $dbUsername = "root";
  $dbPassword = "test";
  $dbName = "tareas";

  $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  } catch (PDOException $e) {
  echo "Error de conexion: " . $e->getMessage();
}
?>