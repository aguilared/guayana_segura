<?php

include_once '../connections/guayana_s.php';

$conexion=new Conexion();
$db=$conexion->getDbConn();
$db->debug = false;

$delito_id = $_POST['valorCaja1'];

$query_delitos_deta = $db->Prepare("SELECT delito_detalle_id, delito_id, descripcion
					FROM delitos_detalles
					WHERE delito_id = $delito_id
					ORDER BY descripcion");

$db->SetFetchMode(ADODB_FETCH_ASSOC);

//Recorset

$rs_delitos_deta = $db->Execute($query_delitos_deta);
?>

<body>
<div class="field">
    <div class="label">Detalle:</div>
    <select name="delito_detalle_id" id="delito_detalle_id">
        <option selected value="0" >Seleccione</option>
        <?php while(!$rs_delitos_deta->EOF){ ?>
            <option value="<?php echo $rs_delitos_deta->Fields('delito_detalle_id'); ?>"><?php echo $rs_delitos_deta->Fields('delito_detalle_id') ." ".$rs_delitos_deta->Fields('descripcion'); ?></option>
        <?php $rs_delitos_deta->MoveNext();
        }
        $rs_delitos_deta->MoveFirst();?>

    </select>
</div>
</body>