<?php
class Tarea{
  public $id;
  public $titulo;
  public $descripcion;


  public function __construct($id, $titulo, $descripcion) {
  $this->id= $id;
  $this->titulo=$titulo;
  $this->descripcion=$descripcion;
  }

  public function get_id(){
    return $this->id;
  }
  public function get_titulo(){
    return $this->titulo;
  }
  public function get_descripcion(){
    return $this->descripcion;
  }
  
}
?>