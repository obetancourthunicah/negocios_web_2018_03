<?php
  $intCapital = 100000;
  $intInteres = 10;
  $intPlazo = 12;
  $tablaAmortizacion = array();

  if(isset($_POST["btnProcesar"])){
    $intCapital = floatval($_POST["intCapital"]);
    $intInteres = floatval($_POST["intInteres"]);
    $intPlazo = intval($_POST["intPlazo"]);


    // cuota = Capital * interes / ( 1 - ( 1 + interes) ^ -plazo)
    // interesPagar = saldo Capital * interes
    // abono a capital = cuota - interesPagar
    // capitalSaldo =  capital - capital-saldo - abono a capital
    $intInteresNominal = $intInteres / 12 / 100;
    $capitalSaldo = $intCapital;
    $fltCuota = round(($intCapital * $intInteresNominal) / ( 1 - ((1+ $intInteresNominal)**(-1 * $intPlazo))),4);
     for ( $i = 1; $i <= $intPlazo; $i++) {
       $cuotaItem = array();
       $cuotaItem["periodo"] = $i;
       $cuotaItem["cuota"] = $fltCuota;
       $cuotaItem["interes"] = round($capitalSaldo * $intInteresNominal, 4);
       $cuotaItem["abono"] = $cuotaItem["cuota"] - $cuotaItem["interes"];
       if ($i == $intPlazo){
         $cuotaItem["cuota"] = $capitalSaldo + $cuotaItem["interes"];
         $cuotaItem["abono"] = $capitalSaldo;
         $cuotaItem["saldo"] = 0;
       }else{
         $capitalSaldo -= $cuotaItem["abono"];
         $cuotaItem["saldo"] = $capitalSaldo;
       }

       $tablaAmortizacion[] = $cuotaItem;
     }
    // arreglo de arreglos
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Tabla de Amortizaciones</title>
    <style>
      thead{
        background-color: rgb(112, 112, 112);
        color:#FFF;
      }
      tbody tr:nth-child(2n){
        background-color:rgb(163, 163, 163);
      }
    </style>
  </head>
  <body>
    <h1>Calculadora de Tabla de Amortización</h1>
    <form action="amortizacion.php" method="post">
      <label for="intCapital">Capital Inicial</label>
      <input type="number" id="intCapital" name="intCapital"
        value="<?php echo $intCapital; ?>"
        placeholder="Capital Incial" />
        <br />
        <label for="intInteres">Interés Anual</label>
        <input type="number" id="intInteres" name="intInteres"
          min="1" max="50" step="1"
          value="<?php echo $intInteres; ?>"
          />
          <br/>
          <label for="intPlazo">PLazo de Pago</label>
          <select id="intPlazo" name="intPlazo">
              <option value="6" <?php echo ($intPlazo == 6) ? "selected" : ""; ?> >6 Meses</option>
              <option value="12"  <?php echo ($intPlazo == 12) ? "selected" : ""; ?>>12 Meses</option>
              <option value="24" <?php echo ($intPlazo == 24) ? "selected" : ""; ?>>24 Meses</option>
              <option value="36" <?php echo ($intPlazo == 36) ? "selected" : ""; ?>>36 Meses</option>
          </select>
          <br />
          <input type="submit" value="Calcular Tablar" name="btnProcesar" id="btnProcesar" />
    </form>
    <hr />
    <table>
      <thead>
        <tr>
          <th>Periodo</th>
          <th>Cuota</th>
          <th>Interez</th>
          <th>Pago a Capital</th>
          <th>Saldo Capital</th>
        </tr>
      </thead>
      <tbody>
        <?php  foreach($tablaAmortizacion as $cuota) {?>
        <tr>
          <td><?php echo $cuota["periodo"];?></td>
          <td><?php echo $cuota["cuota"];?></td>
          <td><?php echo $cuota["interes"];?></td>
          <td><?php echo $cuota["abono"];?></td>
          <td><?php echo $cuota["saldo"];?></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </body>
</html>
