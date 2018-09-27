<?php
  $intEdad = 21;
  $fltDinero = 1023.23;
  $strNombre = "Hola Mundo";
  $esMayorDeEdad = true;
  $vColores = array('blue','red','green');

  //Hungaro Camello

  $intEdad2  = "21";
  // Comparaciones

// == comparacion de valor
// === comparacion de tipo de dato y valor
  if ( $intEdad2 === $intEdad ) {
    // expression si condición == true
  } else {
    // expresion si conidicion == false
  }

  // !=  desigualdad de valor
  // !== desigualdad de tipo de dato y valor

  // >
  // <
  // >=
  // <=
  // !  negación

  // && and
  // || or

  switch ($intEdad) {
    case 21:
      $esMayorDeEdad = true;
      break;
    default:
      $esMayorDeEdad = false;
  }

  $esMayorDeEdad = ( $intEdad >= 21 ) ? true : false;

  // Operadores Aritmeticos
  // + - / *
  $intNumero1 = 100;
  $intNumero2 = 5;
  $intResultado = 0;

  $intResultado = $intNumero1 + $intNumero2;
  // 105
$intResultado = $intNumero1 - $intNumero2;
$intResultado = $intNumero1 * $intNumero2;
$intResultado = $intNumero1 / $intNumero2;

// Operadores aritmeticos medio avanzdos
$intResultado = 10;
$intResultado += 4;
//14 += acumulador
$intResultado -= 4;
//10 -= decrementa

$intResultado *= 2 ;
// 20
$intResultado /= 2;
// 10
$intResultado ++;
//11
$intResultado --;
//10
$intResultado = $intResultado ** 3;
//1000
$fltResiduo = $intResultado%3;
//.3333333333

for ( $i = 0; $i < 100; $i++) {
  // Iteracion de 100
}

$i  = 0;
while ( $i < 100) {

  $i++;
}

$i = 0;
do {

  $i++;
} while ($i < 100);

// Reglas de los arreglos en php
// Arreglos Asociativos ==== Listas dinamicamente ligadas
//$vColores

print_r($vColores);
echo '<br/>';
$vColores[] = "purple"; // PHp agrega el valor con el siguiente
//ordinal disponible al final del arreglo
print_r($vColores);
echo '<br/>';
$vColores["favorito"] = "Tornasol"; // PHp agrega el valor asociandolo
//con la llave favorito
print_r($vColores);
echo '<br/>';
$vColores[] = "orange"; // PHp agrega el valor con el siguiente
//ordinal disponible al final del arreglo
print_r($vColores);
echo '<br/>';
/*  NO SE DEBE RECORRER ASI EL ARREGLO
for ($i = 0; $i < count($vColores); $i++) {
  echo $vColores[$i] . " | ";
}
*/

foreach($vColores as $elemento){
  echo $elemento . " | ";
}


?>
