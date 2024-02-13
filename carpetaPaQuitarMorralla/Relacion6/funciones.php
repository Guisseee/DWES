<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php 

//Funcion para saber si un numero es capicuo o no.
function esCapicua($n){
  $esCapicua=false;
  if(strval($n)==strval(strrev($n))){
    $esCapicua=true;
  }
  return $esCapicua;
}

//Funcion para saber si un número es primo o no.
function esPrimo($n){
  $esPrimo= true;
  for ($i =2; $i< $n; $i++){
    if($n % $i==0){
      $esPrimo= false;
    }
  }
  if (($n==0) || ($n==1)){
    $esPrimo=false;
  }
  return $esPrimo;
}

//Funcion que devuelve el siguiente primo
function sigPrimo($n){
  for ($i=$n+1; $i >$n ; $i++) { 
    if (esPrimo($i)){
      return $i;
    }
  }
}

//Funcion que devuelve la potencia de un número.
function potencia($base, $exponente){
  return pow($base, $exponente);
}

//Funcion que cuenta cuantos digitos tiene un numero.
function digitos($num){
  return strlen(strval($num));
}

//Funcion que le da la vuelta a un numero.
function voltea($num){
  return strrev(strval($num));
}

//Funcion que 

function digitoN($num, $n) {
  $num_str = (string)$num;
  if ($n >= 0 && $n < strlen($num_str)) { // se comprueba que el n sea válido
    $digito = $num_str[$n];
    return (int)$digito;
  } else {
    return -1; // esto indica que la posición está fuera de los límites
  }
}

function posicionDeDigito($num, $digito) {
  $num_str = (string)$num;
  $posicion = -1;
  for ($i = 0; $i < strlen($num_str); $i++) {
    if ($num_str[$i] == $digito) {
      $posicion = $i;
      break;
    }
  }
  return $posicion;
}

function quitarPorDetras($num, $n) {
  $num_str = (string)$num;
  $num_str = substr($num_str, 0, -$n);
  return (int)$num_str;
}

function quitarPorDelante($num, $n) {
  $num_str = (string)$num;
  $num_str = substr($num_str, $n);
  return (int)$num_str;
}

function pegarPorDetras($num, $n) {
  return (int)($num . $n); // se tratan como strings en su paréntesis y se convierten a int depués
}


function pegarPorDelante($num, $n) {
  return (int)($n . $num);
}

function trozoDeNumero($num, $posicionInicial, $posicionFinal) {
  $num_str = (string)$num;
  $trozo = substr($num_str, $posicionInicial, $posicionFinal);
  return (int)$trozo;
}

function juntaNumeros($num1, $num2) {
  return (int)($num1 . $num2);
}

?>
</body>
</html>


