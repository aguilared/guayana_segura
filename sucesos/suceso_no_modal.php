<?php
	include_once '../connections/guayana_s.php';
	$conexion=new Conexion();
	$db=$conexion->getDbConn();
	$db->debug = false;
	$db->SetFetchMode(ADODB_FETCH_ASSOC);
	$db->query("SET NAMES 'utf8'");
	$suceso_id = $_GET['suceso_id'];
	//$suceso_id = 3;
	$query_sucesos = $db->Prepare("SELECT suceso_id, fecha_suceso, d.descripcion AS tipo_delito, dd.descripcion AS detalle_delito, titulo, fuente,
		otra_fuente1, otra_fuente2, nombre_victima, sexo, edad, tipo_arma, s.municipio_id AS municipio_id,
		m.descripcion AS municipio, s.parroquia_id, sector, usuario, s.latitud as latitud, s.longitud AS longitud, mi_resena
		FROM sucesos AS s
		INNER JOIN delitos AS d ON s.delito_id =  d.delito_id
		INNER JOIN delitos_detalles AS dd ON s.delito_detalle_id = dd.delito_detalle_id
		INNER JOIN municipios AS m ON s.municipio_id = m.municipio_id
		WHERE suceso_id = $suceso_id");
	$rs_sucesos = $db->Execute($query_sucesos);

	$rs_sucesos = $db->Execute($query_sucesos);
	$suceso_id = $rs_sucesos->Fields('suceso_id');
	$fecha_suceso = $rs_sucesos->Fields('fecha_suceso');
	$tipo_delito = $rs_sucesos->Fields('tipo_delito');
	$detalle_delito = $rs_sucesos->Fields('detalle_delito');
	$titulo = $rs_sucesos->Fields('titulo');
	$fuente = $rs_sucesos->Fields('fuente');
	$otra_fuente1 = $rs_sucesos->Fields('otra_fuente1');
	$otra_fuente2 = $rs_sucesos->Fields('otra_fuente2');
	$municipio_id = $rs_sucesos->Fields('municipio_id');
	$municipio = $rs_sucesos->Fields('municipio');
	$estado = "Bolivar";
	$pais = "Venezuela";
	$parroquia_id = $rs_sucesos->Fields('parroquia_id');
	$nombre_victima = $rs_sucesos->Fields('nombre_victima');
	$sexo = $rs_sucesos->Fields('sexo');
	$edad = $rs_sucesos->Fields('edad');
	$tipo_arma = $rs_sucesos->Fields('tipo_arma');
	$sector = $rs_sucesos->Fields('sector');
	$latitud = $rs_sucesos->Fields('latitud');
	$longitud = $rs_sucesos->Fields('longitud');
	$usuario = $rs_sucesos->Fields('usuario');
	$mi_resena = $rs_sucesos->Fields('mi_resena');
    $img = $suceso_id.".jpg";
    $img1 = $suceso_id."_1.jpg";
    $img2 = $suceso_id."_2.jpg";

	$query_parroquia = $db->Prepare("SELECT parroquia_id, municipio_id, descripcion,
		latitud, longitud
		FROM parroquias
		WHERE parroquia_id = '$parroquia_id'");

	$rs_parroquia  = $db->Execute($query_parroquia);
	$parroquia = $rs_parroquia->Fields('descripcion');
	$latitud_parro = $rs_parroquia->Fields('latitud');
	$longitud_parro = $rs_parroquia->Fields('longitud');


	$query_homici_mes_parr = $db->Prepare("SELECT count(*) AS acu_mes_parr
		FROM `sucesos` AS s
		WHERE s.municipio_id = $municipio_id AND year(fecha_suceso) =year(now()) AND MONTH(fecha_suceso)=Month(now())
		AND delito_detalle_id = 7 AND parroquia_id = $parroquia_id");



	$rs_homici_mes_parr  = $db->Execute($query_homici_mes_parr);
	$homi_mes_parroquia = $rs_homici_mes_parr->Fields('acu_mes_parr');


	//pendiente si es el mes 1 modificar codigo para q tome datos del mes 12 año anterior
	$query_homici_mes_parr_ant = $db->Prepare("SELECT count(*) AS acu_mes_parr_ant
		FROM `sucesos` AS s
		WHERE s.municipio_id = $municipio_id AND year(fecha_suceso) =year(now())
		AND MONTH(fecha_suceso)=MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH))
		AND delito_detalle_id = 7 AND parroquia_id = $parroquia_id");
	$rs_homici_mes_parr_ant  = $db->Execute($query_homici_mes_parr_ant);
	$homi_mes_parroquia_ant = $rs_homici_mes_parr_ant->Fields('acu_mes_parr_ant');
?>

<html>
<head>
    <title>Guayana Segura</title>
	<meta charset="utf-8">
	<meta name="description" content="Bitacora de Sucesos en Ciudad Guayana y alrededores">
	<meta name="author" content="aguilared">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="../css/main.css">


</head>

<body>

	<div class="container-fluid">
		<div class="row">
			<div class="main-image">
			  <div class="greeting">
				<img src="../images/logo.jpg" class="img-responsive" />

				<div class="quienes-somos">
				  <h3>¡Bienvenidos al sitio Web Guayana Segura!</h3>
				  <h5>Bitacora de Sucesos de Ciudad Guayana y sus alrededores!</h5>
				</div>
			  </div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="panel panel-primary">
			<div class="panel-heading">Informacion del Suceso: <?php echo $suceso_id;?>
				<button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-6 col-md-2"><label>Fecha Suceso:</label> <?php echo normaliza($rs_sucesos->Fields('fecha_suceso'));?></div>
						<div class="col-xs-6 col-md-2"><label>Suceso:</label> <?php echo $detalle_delito;?></div>
						<div class="col-xs-6 col-md-2"><label>Municipio:</label> <?php echo $municipio;?></div>
						<div class="col-xs-6 col-md-2"><label>Parroquia:</label> <?php echo $parroquia;?>&nbsp;</div>
						<div class="col-xs-6 col-md-2"><label>Estado:</label> <?php echo $estado;?>&nbsp;</div>
						<div class="col-xs-6 col-md-2"><label>Pais:</label> <?php echo $pais;?>&nbsp;</div>
					</div>

					<div class="row">
						<div class="col-xs-12 col-md-12"><label>Titulo:</label> <?php echo $titulo;?></div>
					</div>

					<div class="row">
						<div class="col-xs-6 col-md-4"><label>Nombre Victima:</label> <?php echo $nombre_victima;?></div>
						<div class="col-xs-6 col-md-2"><label>Edad:</label> <?php echo $edad;?></div>
						<div class="col-xs-6 col-md-2"><label>Sexo:</label> <?php echo $sexo;?></div>
						<div class="col-xs-6 col-md-2"><label>Tipo Arma: </label><?php echo $tipo_arma;?></div>
					</div>

					<div class="row">
					  <div class="col-xs-6 col-md-4">
						<a href="<?php echo $fuente;?>" class="thumbnail" target="_blank"><img src="../img/<?php echo $img;?>" alt="..."></a>
					  </div>
					  <div class="col-xs-6 col-md-4">
						<a href="<?php echo $otra_fuente1;?>" class="thumbnail" target="_blank"><img src="../img/<?php echo $img1;?>" alt="..."></a>
					  </div>
					  <div class="col-xs-6 col-md-4"><label>
						<a href="<?php echo $otra_fuente2;?>" class="thumbnail" target="_blank"><img src="../img/<?php echo $img2?>" alt="..."></a>
					  </div>
					</div>

					
					<div class="row">
						<div class="col-xs-12 col-md-9"><label>Resumen:</label> <?php echo $mi_resena;?></div>
					</div>
					<BR>
					<div class="row">
						<div class="col-xs-6 col-md-6"><label>Acumulado Homicidios Parroquia <?php echo $parroquia;?> este Mes:</label>  <?php echo $homi_mes_parroquia;?></div>
						<div class="col-xs-6 col-md-6"><label>Acumulado Homicidios Parroquia <?php echo $parroquia;?> Mes Anterior:</label>  <?php echo $homi_mes_parroquia_ant;?></div>

					</div>

				</div>

				<div class="row">
					<div class="col-xs-1 col-md-1">&nbsp;</div>
					<div class="col-md-10 col-md-10 mensaje alert alert-warning" style="font-size:13px;">
						<i class="fa fa-exclamation-triangle fa-lg"></i> <strong>¡Advertencia!</strong>
						Los datos y ubicaciónes mostrados son solo referenciales. No garantizamos la exactitud de estos.
						Son tomados desde varios periodicos Regionales. guayanasegura@gmail.com
					</div>
					<div class="col-xs-1 col-md-1">&nbsp;</div>
				</div>

		</div>
	</div>




	<script>
	$( document ).ready(function() {
			//carga el modal al abrirse en pagina que lo llama
			$('#myModal').modal('show');
		});
	</script>
</body>
</html>
