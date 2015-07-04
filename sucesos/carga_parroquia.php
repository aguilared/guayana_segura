<?php

include_once '../connections/guayana_s.php';

$conexion=new Conexion();
$db=$conexion->getDbConn();
$db->debug = false;

$municipio_id = $_POST['municipio_id'];

$query_parroquias = $db->Prepare("SELECT parroquia_id, descripcion FROM parroquias WHERE estado_id= 7 AND municipio_id = '$municipio_id'");

$db->SetFetchMode(ADODB_FETCH_ASSOC);

//Recorset

$rs_parroquias = $db->Execute($query_parroquias);
?>

<body>
<div class="field">
    <div class="label">Detalle:</div>
    <select name="parroquia" id="parroquia">
        <option selected value="0" >Seleccione</option>
        <?php while(!$rs_parroquias->EOF){ ?>
            <option value="<?php echo $rs_parroquias->Fields('parroquia_id'); ?>"><?php echo $rs_parroquias->Fields('parroquia_id') ." ".$rs_parroquias->Fields('descripcion'); ?></option>
        <?php $rs_parroquias->MoveNext();
        }
        $rs_parroquias->MoveFirst();?>

    </select>
</div>
</body>