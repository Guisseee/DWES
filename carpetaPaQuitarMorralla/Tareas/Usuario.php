<?php
class Usuario {
  private $id;
  private $usuario;
  private $password;

  public function __construct($id, $usuario, $password) {
    $this->id = $id;
    $this->usuario = $usuario;
    $this->password = $password;
  }
}

?>