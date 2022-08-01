<?php
	include_once '../connections/guayana_s.php';
	$conexion=new Conexion();
	$db=$conexion->getDbConn();
	$db->debug = false;
	$db->SetFetchMode(ADODB_FETCH_ASSOC); 
	$suceso_id = $_GET['suceso_id']; 
	//$suceso_id = 3; 
	$query_sucesos = $db->Prepare("SELECT suceso_id, fecha_suceso, d.descripcion AS tipo_delito, dd.descripcion AS detalle_delito, titulo, fuente,
		otra_fuente1, otra_fuente2, nombre_victima, sexo, edad, p.descripcion AS profesion, tipo_arma, s.municipio_id AS municipio_id, m.descripcion AS municipio, s.parroquia_id, sector, usuario, s.latitud as latitud, s.longitud AS longitud
		FROM sucesos AS s
		INNER JOIN delitos AS d ON s.delito_id =  d.delito_id
		INNER JOIN delitos_detalles AS dd ON s.delito_detalle_id = dd.delito_detalle_id
		INNER JOIN municipios AS m ON s.municipio_id = m.municipio_id
		INNER JOIN profesiones AS p ON s.profesion_id = p.profesion_id
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
	$parroquia_id = $rs_sucesos->Fields('parroquia_id');
	$nombre_victima = $rs_sucesos->Fields('nombre_victima');
	$sexo = $rs_sucesos->Fields('sexo');
	$edad = $rs_sucesos->Fields('edad');
	$profesion = $rs_sucesos->Fields('profesion');
	$tipo_arma = $rs_sucesos->Fields('tipo_arma');
	$sector = $rs_sucesos->Fields('sector');
	$latitud = $rs_sucesos->Fields('latitud');
	$longitud = $rs_sucesos->Fields('longitud');
	$usuario = $rs_sucesos->Fields('usuario');
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
   	   
	   
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      
	  <div class="modal-body">

		<div class="panel panel-primary">
			<div class="panel-heading">Informacion del Suceso: <?php echo $suceso_id;?>
				<button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-6 col-md-3"><label>Fecha:</label> <?php echo normaliza($rs_sucesos->Fields('fecha_suceso'));?></div>
						<div class="col-xs-6 col-md-3"><label>Detalle:</label> <?php echo $detalle_delito;?></div>
						<div class="col-xs-6 col-md-3"><label>Municipio:</label> <?php echo $municipio;?></div>
						<div class="col-xs-6 col-md-3"><label>Parroquia:</label> <?php echo $parroquia;?>&nbsp;</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-12"><label>Titulo:</label> <?php echo $titulo;?></div>
					</div>
					
					<div class="row">
					  <div class="col-xs-6 col-md-4">
					  	<label class="control-label col-sm-4" for="fecha">Fuente:</label>
					    <a href="<?php echo $fuente;?>" class="thumbnail" target="_blank"><img src="img/<?php echo $img;?>" alt="..."></a>
					  </div>
					  <div class="col-xs-6 col-md-4">
					  	<label class="control-label col-sm-4" for="fecha">Fuente1:</label>
					    <a href="<?php echo $otra_fuente1;?>" class="thumbnail" target="_blank"><img src="img/<?php echo $img1;?>" alt="..."></a>
					  </div>
					  <div class="col-xs-6 col-md-4">
					  	<label class="control-label col-sm-4" for="fecha">Fuente2:</label>
					    <a href="<?php echo $otra_fuente2;?>" class="thumbnail" target="_blank"><img src="img/<?php echo $img2?>" alt="..."></a>
					  </div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-12"><label>Nombre Victima:</label> <?php echo $nombre_victima;?></div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-md-4"><label>Edad:</label> <?php echo $edad;?></div>
						<div class="col-xs-6 col-md-4"><label>Sexo:</label> <?php echo $sexo;?></div>
						<div class="col-xs-6 col-md-4"><label>Profesion: </label><?php echo $profesion;?></div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-md-4"><label>Tipo Arma: </label><?php echo $tipo_arma;?></div>
					</div>
					
					<div class="row">
						<div class="col-xs-12 col-md-12"><label>Sector:</label> <?php echo $sector;?></div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-12"><label>Maps:</label> <a target="_blank" href="maps_sin.php?latitud=<?php echo $latitud_parro;?>&longitud=<?php echo $longitud_parro;?>&homic=<?php echo $homi_mes_parroquia;?>&parroquia=<?php echo $parroquia;?>">
							<span class="glyphicon glyphicon-star"></span>Maps Parroquia</a>
						</div>
					</div>
										
					<div class="row">
						<div class="col-xs-6 col-md-6"><label>Acumulado Homicidios Parroquia <?php echo $parroquia;?> este Mes:</label>  <?php echo $homi_mes_parroquia;?></div>
						<div class="col-xs-6 col-md-6"><label>Acumulado Homicidios Parroquia <?php echo $parroquia;?> Mes Anterior:</label>  <?php echo $homi_mes_parroquia_ant;?></div>

					</div>
				</div>
		
		</div>
		
      </div><!-- /.modal-body -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

  
<script>
$( document ).ready(function() {
		//carga el modal al abrirse en pagina que lo llama
        $('#myModal').modal('show');
    });
</script>        

