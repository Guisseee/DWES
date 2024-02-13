<?php
class Triangulo extends Poligono{
  public function calcularArea(){
    return ($this->lado1 * $this->lado2)/2;
  }
}
?>