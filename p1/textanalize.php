<?php
    /** Esto es un ejemplo de como usar arreglos
   * asociativos y ordinales para determinar la
   * frecuencia de uso de palabras en un texto
   * ingresado por el usuario.
   */
  $txtArticulo = "";
  $errores = array();
  $arrayFrecuencias = array();
  $maxFrecuency = 1;
  if(isset($_POST["btnProcesar"])){
    $txtArticulo = $_POST["txtArticulo"];
    if($txtArticulo === ""){
      $errores[] = "No se puede analizar el texto vacío!";
    }
    // Para Evaluar si paso todas las validaciones
    if(count($errores) == 0 ){
      $txtArticulo = preg_replace('/[^A-Za-z0-9\s]/','', $txtArticulo);
      $arrayPalabras = explode(" ", $txtArticulo);
      foreach($arrayPalabras as $palabra) {
        if(isset($arrayFrecuencias[$palabra])){
          $arrayFrecuencias[$palabra] ++ ;
        } else {
          $arrayFrecuencias[$palabra] = 1;
        }
      }// endfor $arrayPalabras
      arsort($arrayFrecuencias);
      $maxFrecuency = 0 ;
      foreach($arrayFrecuencias as $frecuencia){
          $maxFrecuency = $frecuencia;
          break;
      }

    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Analizador de Textos</title>
  </head>
  <body>
    <h1>Analizador de Textos</h1>
    <?php if(count($errores) > 0){ ?>
        <div class="errors">
          <ol>
            <?php  foreach($errores as $error ) { ?>
                <li><?php echo $error; ?></li>
            <?php }?>
          </ol>
        </div>
    <?php } ?>
    <form action="textanalize.php" method="post">
      <label for="txtArticulo">Artículo Completo a Analizar</label>
      <br/>
      <textarea name="txtArticulo" id="txtArticulo" rows="15"><?php echo $txtArticulo; ?></textarea>
      <br/>
      <input type="submit" name="btnProcesar" id="btnProcesar" value="Procesar" />
    </form>
    <hr/>

    <?php foreach( $arrayFrecuencias as $palabra => $frecuencia){?>
        <span style="font-size:<?php echo ($frecuencia/$maxFrecuency*4); ?>em"><?php echo $palabra; ?></span>
        &nbsp;
    <?php }?>
  </body>
</html>
