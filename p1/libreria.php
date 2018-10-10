<?php

function obtenerNombreCompleto ( $nombre, $apellido ) {
  return $nombre . ' ' . $apellido;
}

function validarEspaciosVacios($texto) {
  return trim($texto) === "";
}

$productos = array();

function inicializarTabla(){
  global $productos;
  $productos[] = array(
    "id" => "C001",
    "nombre" => "Plato Típico Hondureño",
    "precio" => 150.00,
    "iva" => 0.15
  );
  $productos[] = array(
    "id" => "C002",
    "nombre" => "Pincho de Cerdo",
    "precio" => 180.00,
    "iva" => 0.15
  );
  $productos[] = array(
    "id" => "C003",
    "nombre" => "Pincho de Pollo",
    "precio" => 180.00,
    "iva" => 0.15
  );
  $productos[] = array(
    "id" => "C004",
    "nombre" => "Pincho Mixto",
    "precio" => 200.00,
    "iva" => 0.15
  );
}

inicializarTabla();

function obtenerProductoPorCodigo($codigo){
  global $productos;
  $selProducto = array();
  foreach($productos as $producto){
    if($producto["id"] === $codigo){
      $selProducto = $producto;
      break;
    }
  }
  return $selProducto;
}

function generarCombo($arreglo, $codigo, $campoCodigo, $campoDescripcion, $idCombo){
  $htmlCombo = '<select name="'.$idCombo.'" id="'.$idCombo.'" >';
  foreach( $arreglo as $item){
    $htmlCombo .= '<option value="'.$item[$campoCodigo].'"';
    if($item[$campoCodigo] === $codigo){
      $htmlCombo .= ' selected';
    }
    $htmlCombo .= '>' . $item[$campoDescripcion] . '</option>';
  }
  $htmlCombo .= '</select>';
  return $htmlCombo;
}
/*
// scope  alcance  contexto
$a = "Hola"; // ABF010123
function modificarA(){
  global $a;
  $a = "Adios"; // ABF010123
}

$a = "Mundo";  //ABF010123
echo $a;
// Adios 9
// Hola 5 <<< ----
*/


?>
