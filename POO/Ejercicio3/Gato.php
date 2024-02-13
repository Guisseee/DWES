<?php
require_once "Animal.php";
class Gato extends Animal{
  public function correr(){
    echo $this->nombre." corre poco<br>";
  }

  public function comer(){
    echo "El gato come mucho<br>";
  }

  public function jugar(){
    echo "El gato juega poco";
  }
}
?>