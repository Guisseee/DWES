<?php
include_once "model.php";

class Usuario extends Model {

    public function __construct() {
        $this->table = "usuarios";
        $this->idColumn = "id";
        parent::__construct();
    }

    public function getUsuarios($usuario, $password) {
        $login = $this->db->consultasSelect("SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$password' ");
        
        return $login;
    }
    
    public function getIdUsuario($usuario) {
        $resultado= $this->db->consultasSelect("SELECT id FROM usuarios WHERE usuario= '$usuario'");
        return isset($resultado[0]->id) ? $resultado[0]->id : null;
    }

    public function insertarUsuario($usuario, $password) {
        $result= $this->db->consultasModificacion("INSERT INTO usuarios (usuario, password) VALUES ('$usuario', '$password')");
        return $result;
    }
}