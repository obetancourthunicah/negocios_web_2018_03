<?php
  session_start();
  $valor = "";
  $historia = array();
  if(isset($_POST["btnProcesar"])){
    $valor = $_POST["valor"];
    $_SESSION["valor"] = $valor;
    $_SESSION["historia"][] = $valor;
  }

  if(isset($_SESSION["valor"])){
    $valor = $_SESSION["valor"];
  }
  if(isset($_SESSION["historia"])){
    $historia = $_SESSION["historia"];
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sesiones en PHP</title>
  </head>
  <body>
    <h1>Sesiones en PHP</h1>
    <form action="session.php" method="post">
      <input type="text" name="valor"
      placeholder="Un Valor a Guardar"
      />
      <input type="submit" name="btnProcesar" value="Guardar"  />
    </form>
    <div>
      <?php  echo $valor;?>
      <hr />
      <?php
        if( count($historia) > 0 ) {
      ?>
      <ul>
        <?php
          foreach($historia as $item){
        ?>
        <li>
          <?php echo $item; ?>
        </li>
        <?php } ?>
      </ul>
      <?php } ?>
    </div>
  </body>
</html>
