<?php
abstract class Animal{
  public $nombre;

  public function __construct($nombre){
  $this->nombre=$nombre;
  }
  public function comer() {
    echo "{$this->nombre} está comiendo.<br>";
  }
  public function reir(){
    echo "{$this->nombre} está riendo.";
  }
  public function correr(){
    echo "{$this->nombre} está corriendo.";
  }
}

// class Ave extends Animal{
// }

// class Canario extends Ave{
// }

// class Pinguino extends Ave{
// }

?>