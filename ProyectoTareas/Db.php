<?php

class Db{
  private $db; //Variable donde se guarda la conexión.


  //Con esto se hace la conexión a la base de datos.
  function __construct(){
    require_once("config.php"); //Archivo que tiene las variables necesarias para la conexión a la base de datos.

    $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
    }

    function closeDb(){
      if ($this->db) $this->db->close();
    }

    //Funcion que realiza las consultas de Select de la base de datos.
    function consultasSelect($sql){
      $result = $this->db->query($sql);
      $data = array();
      while($fila = $result->fetch_object()){
        $data[] = $fila;
      }
      return $data;
    }

    //Funcion que realiza las consultas de modificacion de la base de datos. (Insert, Update, Delete, etc.)
    function consultasModificacion($sql){
      $this->db->query($sql);
      return $this->db->affected_rows;
    }
}

?>