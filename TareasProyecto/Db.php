<?php

class Db
{

  private $db; 


  function __construct()
  {
    require_once("config.php");
    $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
    if ($this->db->connect_errno) return -1;
    else return 0;
  }

  function close()
  {
    if ($this->db) $this->db->close();
  }


  function consultasSelect($sql)
  {
    $resultado = $this->db->query($sql);
    $data = array();
    while ($fila = $resultado->fetch_object()) {
      $data[] = $fila;
    }
    return $data;
  }

  function consultasModificacion($sql)
  {
    $this->db->query($sql);
    return $this->db->affected_rows;
  }
}