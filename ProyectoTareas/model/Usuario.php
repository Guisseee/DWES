<?php

class Usuario extends Model{
  public function __construct(){
    $this->tabla= "usuarios";
    $this->idColumna= "id";
    parent::__construct();
  }

  public function existeUsuario($usuario, $password){
    $sql = "SELECT * FROM $this->tabla WHERE usuario = '$usuario' AND password = '$password'";
    $resultado = $this->db->consultasSelect($sql);
    return $resultado->fetch_object();
  }

}

?>