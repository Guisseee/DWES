<?php
class Persona{
  public $nombre;
  public $apellidos;
  public $edad;

  public function __construct($nombre, $apellidos, $edad){
    $this->nombre= $nombre;
    $this->apellidos= $apellidos;
    $this->edad= $edad;
  }

  public function setNombre($nombre){
    $this->nombre= $nombre;
  }
  public function getNombre(){
    return $this->nombre;
  }
  public function setApellidos($apellidos){
    $this->apellidos= $apellidos;
  }
  public function getApellidos(){
    return $this->apellidos;
  }
  public function setEdad($edad){
    $this->edad= $edad;
  }
  public function getEdad(){
    return $this->edad;
  }

  public function mayorEdad(){
    if ($this->edad>=18) {
      echo "Es mayor de edad";
    }else {
      echo "Es menor de edad";
    }
  }

  public function nombreCompleto(){
    echo "Hola, soy ".$this->nombre." ".$this->apellidos." y tengo ";
  }
}

?>