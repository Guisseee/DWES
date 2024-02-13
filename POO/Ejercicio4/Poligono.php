<?php
abstract class Poligono {
  public $lado1;
  public $lado2;

  public function __construct($lado1, $lado2) {
      $this->lado1 = $lado1;
      $this->lado2 = $lado2;
  }
}
?>