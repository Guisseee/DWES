<?php

include_once ('Db.php');

class Model {

  protected $table;    // Aquí guardaremos el nombre de la tabla a la que estamos accediendo
  protected $idColumn; // Aquí guardaremos el nombre de la columna que contiene el id (por defecto, "id")
  protected $db;       // Y aquí la capa de abstracción de datos

  public function __construct()  {
    $this->db = new Db();
  }

  public function getAll() {
    $list = $this->db->consultasSelect("SELECT * FROM ".$this->table);
   
    return $list;
  }

  public function get($id) {
    $record = $this->db->consultasSelect("SELECT * FROM ".$this->table." WHERE ".$this->idColumn."= $id");
    return $record;
  } 

  public function delete($id) {
    $result = $this->db->consultasModificacion("DELETE FROM ".$this->table." WHERE ".$this->idColumn." = $id");
    return $result;
  }
}