<?php

  include_once '../connections/guayana_s.php';

  $conexion=new Conexion();
  $db=$conexion->getDbConn();
  $db->debug = false;

  $delito_detalle_id = $_POST['delito_detalle_id'];

  $query_arma = $db->Prepare("SELECT id, descripcion FROM arma WHERE suceso_detalle = '$delito_detalle_id'");

  $db->SetFetchMode(ADODB_FETCH_ASSOC);

  //Recorset

  $rs_arma = $db-> Execute($query_arma);
?>

<body>
<div class="field">
    <select class="form-control input-sm" id="tipo_arma" name="tipo_arma" >
      <option selected value="0" >Seleccione</option>
      <?php while(!$rs_arma->EOF){
        if ($rs_arma->Fields('id') == $arma_id) {
          //Selecciona este registro
          echo "\t<option value=\"" . $rs_arma->Fields('id') . "\" selected=\"selected\">" . $rs_arma->Fields('descripcion') ."</option>\n";
        }else{ ?>
        <option value="<?php echo $rs_arma->Fields('id'); ?>"><?php echo $rs_arma->Fields('descripcion'); ?></option>
        <?php
        }
      $rs_arma->MoveNext();
      }
      $rs_arma->MoveFirst();?>
    </select>
</div>
</body>