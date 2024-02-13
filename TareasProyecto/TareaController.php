<?php
include_once("models/Tarea.php");  
include_once("models/Usuarios.php");
include_once("View.php"); 

class TareaController {
        private $db;             
        private $tarea;
        private $usuario;

        public function __construct() {
            $this->tarea = new Tarea();
            $this->usuario = new usuario();
        }


        public function mostrarListaTareas() {
            if (!isset($_SESSION['usuario'])) {
                header("Location: index.php?controller=login&action=mostrarFormularioLogin");
            }
            $data["listaTareas"] = $this->tarea->getTareasPorUsuario($this->usuario->getIdUsuario($_SESSION['usuario']));
            View::render("tarea/all", $data);
        }
        


        public function formularioInsertarTarea() {
            $data["todosLosAutores"] = $this->tarea->getAll();
            $data["autoresLibro"] = array(); 
            View::render("tarea/form", $data);
        }


        public function insertarTarea() {
            $titulo = $_REQUEST["titulo"];
            $descripcion = $_REQUEST["descripcion"];           

            $result = $this->tarea->insertarTarea($titulo, $descripcion);
            if ($result == 1) {
                $usuario= $_SESSION['usuario'];
                $idUsuario= $_SESSION['idUsuario'];

                $idTarea = $this->tarea->getMaxId();

                $resultadoRelacion= $this->tarea->insertarRelacion($idTarea, array($idUsuario));
            } 
            $data["listaTareas"] = $this->tarea->getTareasPorUsuario($this->usuario->getIdUsuario($_SESSION['usuario']));
            View::render("tarea/all", $data);

        }

        public function borrarTarea() {
            $idTarea = $_REQUEST["idTarea"];
            $idUsuario= $_SESSION["idUsuario"];
            $result = $this->tarea->borrarTarea($idTarea, $idUsuario);

            $data["listaTareas"] = $this->tarea->getTareasPorUsuario($this->usuario->getIdUsuario($_SESSION['usuario']));
            View::render("tarea/all", $data);

        }

        public function formularioModificarTarea() {
            $idTarea = $_REQUEST["idTarea"];
            $data["tarea"] = $this->tarea->get($idTarea)[0];
            View::render("tarea/form", $data);
        }

        public function modificarTarea() {
            $idTarea = $_REQUEST["idTarea"];
            $titulo = $_REQUEST["titulo"];
            $descripcion= $_REQUEST["descripcion"];

            $result = $this->tarea->modificacionTarea($idTarea, $titulo, $descripcion);

            $data["listaTareas"] = $this->tarea->getTareasPorUsuario($this->usuario->getIdUsuario($_SESSION['usuario']));
            View::render("tarea/all", $data);
        }

        public function loginView(){
            View::render("loginView");
        }

        
        public function login() {
            $usuario = $_POST["usuario"];
            $password = hash('sha512',$_POST["password"]);

            $usuarioNuevo = new usuario();
            $buscaUsuario= $usuarioNuevo->getUsuarios($usuario, $password);
            if($buscaUsuario){
            $_SESSION['usuario']=$usuario;
            $_SESSION['idUsuario']= $this->usuario->getIdUsuario($usuario);
            $this->mostrarListaTareas();
            } else {
            echo "No has introducido las credenciales correctamente";
            }
    }

    public function logout(){
        session_destroy();
        $_SESSION = array();
        View::render("loginView");
        exit();
    }

    public function registro(){
    
        if (
            isset($_POST['usuario']) && isset($_POST['contraseña'])
            && isset($_POST['contraseña2'])
        ) {
        
            $usuario = strtolower($_POST['usuario']);
            $password = hash('sha512', $_POST['contraseña']);
            $password2 = hash('sha512', $_POST['contraseña2']);
        
        
            if ($password == $password2) { 
                
                try {
                    $resultado= $this->usuario->getUsuarios($usuario, $password);
                    if ($resultado) {
                        echo "el usuario ya existe";
                    } else {
                        $registro = $this->usuario->insertarUsuario($usuario, $password);
                        View::render("loginView");
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            }else {
                echo "No has introducido los datos correctamente";
            } 
        } else {
        require("./view/registro.view.php");
        }
    }

    public function registroView(){
        View::render("registro.view");
    }

}