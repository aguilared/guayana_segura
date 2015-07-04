<?php
include_once '../connections/guayana_s.php';
$conexion=new Conexion();
	$db=$conexion->getDbConn();
	$db->debug = false;
	$db->SetFetchMode(ADODB_FETCH_ASSOC); 
	$ano = $_GET['ano']; 
	//$suceso_id = 3; 
	$query_histo_homicidios = $db->Prepare("SELECT histo_id, ano, total, total_resueltos, impunidad, hombres, menores, mujeres, arma_d_fuego, arma_blanca,
	arma_contusa, fuente, otra_fuente1, otra_fuente2, usuario
	FROM histo_homicidios 
	WHERE ano = $ano");

	$db->SetFetchMode(ADODB_FETCH_ASSOC);

	$rs_histo_homicidios = $db->Execute($query_histo_homicidios);

	$ano = $rs_histo_homicidios->Fields('ano');
	$total = $rs_histo_homicidios->Fields('total');
	$total_resueltos = $rs_histo_homicidios->Fields('total_resueltos');
	$impunidad = $rs_histo_homicidios->Fields('impunidad');
	$hombres = $rs_histo_homicidios->Fields('hombres');
	$menores = $rs_histo_homicidios->Fields('menores');
	$mujeres = $rs_histo_homicidios->Fields('mujeres');
	$arma_d_fuego = $rs_histo_homicidios->Fields('arma_d_fuego');
	$arma_blanca = $rs_histo_homicidios->Fields('arma_blanca');
	$arma_contusa = $rs_histo_homicidios->Fields('arma_contusa');

	$fuente = $rs_histo_homicidios->Fields('fuente');
	$otra_fuente1 = $rs_histo_homicidios->Fields('otra_fuente1');
	$otra_fuente2 = $rs_histo_homicidios->Fields('otra_fuente2');
	$usuario = $rs_histo_homicidios->Fields('usuario')
 
?>
   	   
	   
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      
	  <div class="modal-body">

		<div class="panel panel-primary">
			<div class="panel-heading">Informacion del Suceso: <?php echo $rs_histo_homicidios->Fields('suceso_id');?>
				<button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
				<div class="panel-body">
					<h4>Fecha:<?php echo $ano;?></h4>
					<h4>Total: <?php echo $total?></h4>
					<h4>Resueltos: <?php echo $total_resueltos;?></h4>
					<h4>Impunidad: <?php echo $impunidad;?></h4>
					<h4>Hombres: <?php echo $hombres;?></h4>
					<h4>Mujeres: <?php echo $mujeres;?></h4>
					<h4>Menores: <?php echo $menores;?></h4>
					<h4>Por Arma de Fuego: <?php echo $arma_d_fuego;?></h4>
					<h4>Por Arma Blanca: <?php echo $arma_blanca;?></h4>
					<h4>Por Arma Contusa: <?php echo $arma_contusa;?></h4>
					<h4>Fuente: <a href="<?php echo $fuente;?>" target="_blank"><?php echo $fuente;?></a></h4>
					<h4>Otra Fuente1: <a href="<?php echo $otra_fuente1;?>" target="_blank"><?php echo $otra_fuente1;?></a></h4>
					<h4>Otra Fuente2: <a href="<?php echo $otra_fuente2;?>" target="_blank"><?php echo $otra_fuente2;?></a></h4>
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

