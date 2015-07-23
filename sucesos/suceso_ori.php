<?php
include_once '../connections/guayana_s.php';
$conexion=new Conexion();
	$db=$conexion->getDbConn();
	$db->debug = false;
	$db->SetFetchMode(ADODB_FETCH_ASSOC); 
	$suceso_id = $_GET['suceso_id']; 
	//$suceso_id = 3; 
	$query_sucesos = $db->Prepare("SELECT suceso_id, fecha_suceso, d.descripcion AS tipo_delito, dd.descripcion AS detalle_delito, titulo, fuente,
		otra_fuente1, otra_fuente2, nombre_victima, sexo, edad, tipo_arma,
		m.descripcion AS municipio, p.descripcion AS parroquia, sector, usuario
		FROM sucesos AS s
		INNER JOIN delitos AS d ON s.delito_id =  d.delito_id
		INNER JOIN delitos_detalles AS dd ON s.delito_detalle_id = dd.delito_detalle_id
		INNER JOIN municipios AS m ON s.municipio_id = m.municipio_id
		INNER JOIN parroquias AS p ON s.parroquia_id = p.parroquia_id
		WHERE suceso_id = $suceso_id");
	$rs_sucesos = $db->Execute($query_sucesos);

	$suceso_id = $rs_sucesos->Fields('suceso_id');
	$fecha_suceso = $rs_sucesos->Fields('fecha_suceso');
	$tipo_delito = $rs_sucesos->Fields('tipo_delito');
	$detalle_delito = $rs_sucesos->Fields('detalle_delito');
	$titulo = $rs_sucesos->Fields('titulo');
	$fuente = $rs_sucesos->Fields('fuente');
	$otra_fuente1 = $rs_sucesos->Fields('otra_fuente1');
	$otra_fuente2 = $rs_sucesos->Fields('otra_fuente2');
	$municipio = $rs_sucesos->Fields('municipio');
	$parroquia = $rs_sucesos->Fields('parroquia');
	$nombre_victima = $rs_sucesos->Fields('nombre_victima');
	$sexo = $rs_sucesos->Fields('sexo');
	$edad = $rs_sucesos->Fields('edad');
	$tipo_arma = $rs_sucesos->Fields('tipo_arma');
	$sector = $rs_sucesos->Fields('sector');
	$usuario = $rs_sucesos->Fields('usuario');
 
?>
   	   
	   
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      
	  <div class="modal-body">

		<div class="panel panel-primary">
			<div class="panel-heading">Informacion del Suceso: <?php echo $rs_sucesos->Fields('suceso_id');?>
				<button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
				<div class="panel-body">
					<h4>Fecha Suceso:<?php echo normaliza($rs_sucesos->Fields('fecha_suceso'));?></h4>
					<h4>Delito: <?php echo $tipo_delito;?></h4>
					<h4>Detalle delito: <?php echo $detalle_delito;?></h4>
					<h4>Titulo: <?php echo $titulo;?></h4>
					<h4>Fuente: <a href="<?php echo $fuente;?>" target="_blank"><?php echo $fuente;?></a></h4>
					<h4>Otra Fuente1: <a href="<?php echo $otra_fuente1;?>" target="_blank"><?php echo $otra_fuente1;?></a></h4>
					<h4>Otra Fuente2: <a href="<?php echo $otra_fuente2;?>" target="_blank"><?php echo $otra_fuente2;?></a></h4>
					<h4>Municipio: <?php echo $municipio;?></h4>
                    <h4>Parroquia: <?php echo $parroquia;?></h4>
					<h4>Nombre Victima: <?php echo $nombre_victima;?></h4>
					<h4>Sexo: <?php echo $sexo;?></h4>
					<h4>Edad: <?php echo $edad;?></h4>
					<h4>Tipo Arma: <?php echo $tipo_arma;?></h4>
					<h4>Sector: <?php echo $sector;?></h4>
					<h4>Usuario: <?php echo $usuario;?></h4> 
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

