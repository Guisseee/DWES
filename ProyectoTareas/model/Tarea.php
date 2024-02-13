<?php

class Tarea extends Model{
  public function __construct(){
    $this->tabla= "tarea";
    $this->idColumna= "id";
    parent::__construct();
  }

  public function insertarTarea($titulo, $descripcion){
    return $this->db->consultasModificacion($titulo, $descripcion);
  }

}
?>