<?php
$host = "127.0.0.1";
$user = "root";
$pswd = "root";
$db = "nw201803";
$txtNom = "";
$cmbEstado = "";
$mode = "";
$asgcod = 0;
$conexion = new mysqli($host, $user, $pswd, $db);
//errno = 0 Si to es exitoso (coneccion establecido)
// errno > 0 Si hay algun error
if( $conexion->errno ){
  //die($conexion->error);
  error_log( $conexion->error );
  die();
}

if (isset($_POST["btnIngresar"])){
      $insSql = "INSERT INTO `asignaturas`
      (`asgnom`,`asgest`) VALUES ('%s', '%s');";
      $txtNom = $conexion->real_escape_string($_POST["txtNom"]);
      $cmbEstado = $conexion->real_escape_string($_POST["cmbEstado"]);
      // De esta forma evitamos la inyección de sql
      $conexion->query(sprintf($insSql,$txtNom,$cmbEstado));
}

if(isset($_POST["btnEnterUpdate"])){
  $asgcod = $_POST["asgcod"];
  $mode = "UPD";
  $oneSql = "select * from asignaturas where asgcod=%d;";
  $crsOne = $conexion->query(sprintf($oneSql, $asgcod));
  foreach ($crsOne as $asig){
    $txtNom = $asig["asgnom"];
    $cmbEstado= $asig["asgest"];
  }
}
if(isset($_POST["btnActualizar"])){
  $asgcod = $_POST["asgcod"];
  $txtNom = $conexion->real_escape_string($_POST["txtNom"]);
  $cmbEstado = $conexion->real_escape_string($_POST["cmbEstado"]);
  $updsql = "update asignaturas set asgnom='%s', asgest='%s' where asgcod=%d;";
  $rst = $conexion->query(sprintf($updsql,$txtNom, $cmbEstado,$asgcod));
}

if(isset($_POST["btnDelete"])){
  $asgcod = $_POST["asgcod"];
  $delsql = "delete from asignaturas where asgcod=%d;";
  $rslt = $conexion->query(sprintf($delsql,$asgcod));
}

if($mode != "UPD"){
  $sqlstr = "select * from asignaturas;";
  $crsAsignaturas = $conexion->query($sqlstr);
  $asignaturas = array();
  foreach ($crsAsignaturas as $asignatura){
    $asignaturas[] = $asignatura;
  }
}

?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <title>Primer Ejemplo de Mysqli con PHP</title>
    <meta name="viewport" content="width=device=width">
    <link rel="stylesheet" href="css/papier.css" />
  </head>
  <body>
    <h1>Ejemplo de Conectividad con Mysql</h1>
    <?php if($mode != "UPD"){ ?>
    <table>
      <thead>
        <tr>
          <th>
            Código
          </th>
          <th>
            Descripción
          </th>
          <th>
            Estado
          </th>
          <th>
            Acciones
          </th>
        </tr>
      </thead>
      <tbody class="hover">
        <?php foreach($asignaturas as $asignatura) { ?>
        <tr>
          <td><?php echo $asignatura["asgcod"];?></td>
          <td><?php echo $asignatura["asgnom"];?></td>
          <td><?php echo $asignatura["asgest"];?></td>
          <td>
          <form action="mysql_first.php" method="post">
              <input type="hidden" name="asgcod"
                  id="asgcod_<?php echo $asignatura["asgcod"]; ?>"
                  value="<?php echo $asignatura["asgcod"]; ?>"
                />
                <button type="submit" class="bg-blue" name="btnEnterUpdate">Editar</button>
                &nbsp;
                <button type="submit" class="bg-red" name="btnDelete">Eliminar</button>
          </form>
        </td>
        </tr>
      <?php } // cierre de foreach asignaturas ?>
      </tbody>
    </table>
    <hr />
  <?php } //end !mode upd ?>

    <form class="card depth-3"
    style="width:40%; min-width:380px; margin:1em auto;padding:2em;"
    action="mysql_first.php" method="post">
    <h1>Asignatura</h1>
      <?php
        if ($mode == "UPD") {
          ?>
          <input type="hidden" id="asgcod"
            name="asgcod" value="<?php echo $asgcod; ?>" />
        <?php
        }
       ?>
       <div class="row">
      <label class="col-4" for="txtNom">Asignatura</label>
      <input type="text" id="txtNom" name="txtNom"
      class="col-8"
      placeholder="Nombre de la Asignatura"
      value="<?php echo $txtNom; ?>" />
      </div>
      <br />
      <div class="row">
      <label class="col-4" for="cmbEstado">Estado</label>
      <select class="col-8" name="cmbEstado" id="cmbEstado">
        <option value="ACT" <?php echo ($cmbEstado=="ACT")?"selected":"";?>>Activo</option>
        <option value="INA" <?php echo ($cmbEstado=="INA")?"selected":"";?>>Inactivo</option>
        <option value="WRK" <?php echo ($cmbEstado=="WRK")?"selected":"";?>>En Proceso</option>
      </select>
      </div>
      <br />
      <div style="text-align:right">
      <?php if( $mode !="UPD") { ?>
      <input type="submit" value="Guardar" name="btnIngresar"
      id="btnIngresar" class="bg-green" />
    <?php } else { ?>
      <input type="submit" value="Actualizar" name="btnActualizar"
      id="btnActualizar" class="bg-green" />
    <?php } ?>
    </div>
    </form>
  </body>
</html>
