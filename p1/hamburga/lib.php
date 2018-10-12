<?php
  // la libreria va ha ser
  // incorporado por ambos
  // scripts con html
  // El precio tiene el iva incluido
  // el precio sin impuesto  precio / (1 + iva)

// sub * (1 + iva)  || 100 * 1.15 =  115
// 115 / 1.15 = 100

session_start();

$hamburguesas = array();
$bebidas = array();
$complementos = array();
$postres = array();

function initArrays(){
  global $hamburguesas;
  global $bebidas;
  global $complementos;
  global $postres;

  // Inicializacion de Bebidas
  $hamburguesas[] = array(
    "id" => "NS",
    "dsc" => "Seleccione una Hamburguesa",
    "prc" => 0,
    "iva" => 0,
    "dscc" => "Seleccione una Hamburguesa"
  );
  $hamburguesas[] = array(
    "id" => "h001",
    "dsc" => "Hamburguesa de Queso",
    "prc" => 30.00,
    "iva" => 0.15,
    "dscc" => "Hamburguesa de Queso L30.00"
  );
  $hamburguesas[] = array(
    "id" => "h002",
    "dsc" => "Hamburguesa Monogatari",
    "prc" => 300.00,
    "iva" => 0.15,
    "dscc" => "Hamburguesa Monogatari L300.00"
  );
  // Inicializacion de Bebidas
  $bebidas[] = array(
    "id" => "NS",
    "dsc" => "Seleccione una Bebida",
    "prc" => 0,
    "iva" => 0,
    "dscc" => "Seleccione una Bebida"
  );
  $bebidas[] = array(
    "id" => "b001",
    "dsc" => "Soda",
    "prc" => 40.00,
    "iva" => 0.15,
    "dscc" => "Soda L40.00"
  );
  $bebidas[] = array(
    "id" => "b002",
    "dsc" => "Natural Sorpresa",
    "prc" => 60.00,
    "iva" => 0.15,
    "dscc" => "Natural Sorpresa L60.00"
  );
  // Inicializacion de Complementos
  $complementos[] = array(
    "id" => "NS",
    "dsc" => "Seleccione un Complemento",
    "prc" => 0,
    "iva" => 0,
    "dscc" => "Seleccione un Complemento"
  );
  $complementos[] = array(
    "id" => "c001",
    "dsc" => "Papas a la Francesa",
    "prc" => 45.00,
    "iva" => 0.15,
    "dscc" => "Papas a la Francesa L45.00"
  );
  $complementos[] = array(
    "id" => "c002",
    "dsc" => "Ensalada Ceasar",
    "prc" => 60.00,
    "iva" => 0.15,
    "dscc" => "Ensalada Ceasar L60.00"
  );
  // Inicializacion de Postres
  $postres[] = array(
    "id" => "NS",
    "dsc" => "Seleccione un Postre",
    "prc" => 0,
    "iva" => 0,
    "dscc" => "Seleccione un Postre"
  );
  $postres[] = array(
    "id" => "p001",
    "dsc" => "Flan de Coco con jarabe de fresa",
    "prc" => 75.00,
    "iva" => 0.15,
    "dscc" => "Flan de Coco con jarabe de fresa L75.00"
  );
  $postres[] = array(
    "id" => "p002",
    "dsc" => "Tiramisu de Naranja",
    "prc" => 160.00,
    "iva" => 0.15,
    "dscc" => "Tiramisu de Naranja L160.00"
  );
} //initArrays

function obtenerItemDeArreglo($arreglo, $codigo, $campoCodigo){
  $selItem = array();
  foreach($arreglo as $item){
    if($item[$campoCodigo] === $codigo){
      $selItem = $item;
      break;
    }
  }
  return $selItem;
} // obtenerItemDeArreglo

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
} // generarCombo


// Auto Init Scripts
initArrays();
?>
