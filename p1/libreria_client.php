<?php

  /*include
  require
  include_once
  */
require_once "libreria.php";

  $nombre = "";
  $apellido = "";
  $resultado = "";
  $producto = "C004";
    if(isset($_POST["btnProcesar"])){
      $nombre = $_POST["nombre"];
      $apellido = $_POST["apellido"];
      $producto = $_POST["producto"];
      $hasErrors = false;
      if( validarEspaciosVacios($nombre) ){
        $hasErrors = true;
        $resultado = "El nombre no puede ir vacio";
      }
      if( validarEspaciosVacios($apellido) ){
        $hasErrors = true;
        $resultado .= " El apellido no puede ir vacio";
      }
      if(!$hasErrors){
        $resultado = obtenerNombreCompleto($nombre, $apellido);
        $resultado = obtenerNombreCompleto($resultado, obtenerProductoPorCodigo($producto)["nombre"]);
      }
    }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ejemplo de Librerias y funciones</title>
  </head>
  <body>
    <h1>Uso de Librerías y Funciones</h1>
    <form action="libreria_client.php" method="post">
      <label for="nombre">Primer Nombre</label>
      <input type="text" value="<?php echo $nombre ?>"
        placeholder="Primer Nombre" name="nombre"
        id="nombre" /><br />
        <label for="apellido">Primer Apellido</label>
        <input type="text" value="<?php echo $apellido ?>"
          placeholder="Primer Apellido" name="apellido"
          id="apellido" /><br />
          <label for="producto">Producto</label>
          <?php echo generarCombo($productos, $producto, "id","nombre", "producto" ); ?>
          <br />

          <button type="submit" value="btnProcesar"
          name="btnProcesar" id="btnProcesar">Procesar</button>
    </form>
    <hr />
    <?php  echo $resultado; ?>
    <hr />

    <?php
        print_r( obtenerProductoPorCodigo("C002"));
     ?>
  </body>
</html>
