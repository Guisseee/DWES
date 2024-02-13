<?php 

class Model{
  protected $tabla; //Guardamos la tabla que estamos utilizando
  protected $idColumna; //Guardamos la columna que es el id
  protected $db; //Guardamos la base de datos

  public function __construct(){
    $this->db = new Db();
  }

  public function getAll(){
    $list= $this->db->consultasSelect("SELECT * FROM $this->tabla");
    return $list;
  }

  public function getId($id){
    $record = $this->db->consultasSelect("SELECT * FROM $this->tabla WHERE $this->idColumna = $id");
    return $record;
  }

  public function deleteId($id){
    $result = $this->db->consultasSelect("DELETE FROM $this->tabla WHERE $this->idColumna = $id");
    return $result;
  }
}
?>