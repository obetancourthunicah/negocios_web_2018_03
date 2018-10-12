<?php
  require_once "lib.php";
  $txtCliente = "";
  $cmbH = "NS";
  $cmbB = "NS";
  $cmbC = "NS";
  $cmbP = "NS";

if(isset($_POST["btnOrdenar"])){
  $txtCliente = $_POST["txtCliente"];
  $cmbH = $_POST["cmbH"];
  $cmbB = $_POST["cmbB"];
  $cmbC = $_POST["cmbC"];
  $cmbP = $_POST["cmbP"];

  $nuevaOrden = array(
    "cliente" => $txtCliente,
    "H" => obtenerItemDeArreglo($hamburguesas,$cmbH,'id'),
    "B" => obtenerItemDeArreglo($bebidas,$cmbB,'id'),
    "C" => obtenerItemDeArreglo($complementos,$cmbC,'id'),
    "P" => obtenerItemDeArreglo($postres,$cmbP,'id'),
    "st"=>0,
    "iva"=>0,
    "tt"=>0
  );
  $_SESSION["ordenes"][] = $nuevaOrden;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Orden Hamburga</title>
  </head>
  <body>
      <h1>Orden Hamburga</h1>
      <form action="order.php" method="post">
        <label for="txtCliente">Cliente</label>
        <input type="text" name="txtCliente"
          id="txtCliente" value="<?php echo $txtCliente ?>"
          placeholder="Nombre Completo" />
          <br />
          <label for="cmbH">Hamburguesa</label>
          <?php echo generarCombo($hamburguesas,$cmbH,'id','dscc','cmbH');?>
          <br />
          <label for="cmbB">Bebida </label>
          <?php echo generarCombo($bebidas,$cmbB,'id','dscc','cmbB');?>
          <br />
          <label for="cmbC">Complemento</label>
          <?php echo generarCombo($complementos,$cmbC,'id','dscc','cmbC');?>
          <br />
          <label for="cmbP">Postre</label>
          <?php echo generarCombo($postres,$cmbP,'id','dscc','cmbP');?>
          <br />
          <input type="submit" value="Ordenar"
            name="btnOrdenar" id="btnOrdenar" />
      </form>
  </body>
</html>
