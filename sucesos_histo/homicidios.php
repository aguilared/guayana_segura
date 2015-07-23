<?php
include_once '../connections/guayana_s.php';
$conexion=new Conexion();
	$db=$conexion->getDbConn();
	$db->debug = true;
	$db->SetFetchMode(ADODB_FETCH_ASSOC); 
	$ano = $_GET['ano']; 
	//$suceso_id = 3; 
	$query_histo_homicidios = $db->Prepare("SELECT histo_id, ano, total, total_resueltos, impunidad, hombres, menores, mujeres, arma_d_fuego, arma_blanca,
	arma_contusa, fuente, 
	enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre,
	pa_cachamay, pa_chirica, pa_dalla_costa, pa_once_de_abril, pa_pozo_verde, pa_simon_bolivar, pa_unare, pa_universidad, pa_vista_al_sol, pa_yocoima,
	en_san_felix, en_puerto_ordaz, otra_fuente1, otra_fuente2, usuario
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

	$enero = $rs_histo_homicidios->Fields('enero');
	$febrero = $rs_histo_homicidios->Fields('febrero');
	$marzo = $rs_histo_homicidios->Fields('marzo');
	$abril = $rs_histo_homicidios->Fields('abril');
	$mayo = $rs_histo_homicidios->Fields('mayo');
	$junio = $rs_histo_homicidios->Fields('junio');
	$julio = $rs_histo_homicidios->Fields('julio');
	$agosto = $rs_histo_homicidios->Fields('agosto');
	$septiembre = $rs_histo_homicidios->Fields('septiembre');
	$octubre = $rs_histo_homicidios->Fields('octubre');
	$noviembre = $rs_histo_homicidios->Fields('noviembre');
	$diciembre = $rs_histo_homicidios->Fields('diciembre');

	$pa_cachamay = $rs_histo_homicidios->Fields('pa_cachamay');
	$pa_chirica = $rs_histo_homicidios->Fields('pa_chirica');
	$pa_dalla_costa = $rs_histo_homicidios->Fields('pa_dalla_costa');
	$pa_once_de_abril = $rs_histo_homicidios->Fields('pa_once_de_abril');
	$pa_pozo_verde = $rs_histo_homicidios->Fields('pa_pozo_verde');
	$pa_simon_bolivar = $rs_histo_homicidios->Fields('pa_simon_bolivar');
	$pa_unare = $rs_histo_homicidios->Fields('pa_unare');
	$pa_universidad = $rs_histo_homicidios->Fields('pa_universidad');
	$pa_vista_al_sol = $rs_histo_homicidios->Fields('pa_vista_al_sol');
	$pa_yocoima = $rs_histo_homicidios->Fields('pa_yocoima');

	$en_san_felix = $rs_histo_homicidios->Fields('en_san_felix');
	$en_puerto_ordaz = $rs_histo_homicidios->Fields('en_puerto_ordaz');

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
			<div class="panel-heading">Homicidios en Ciudad Guayana A&ntilde;o: <?php echo $ano;?>
				<button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
				<div class="panel-body">
					
					<table class="table table-striped table-bordered" id="datatables">
						
						
						<tr>
							<th>Homicidios: <?php echo $total; ?></th>
							<th>Resueltos: <?php echo $total_resueltos; ?></th>
							<th>Impunidad: <?php echo $impunidad; ?></th>
						</tr>
						<tr>
							<th>En San Felix: <?php echo $en_san_felix; ?></th>
							<th>En Puerto Ordaz: <?php echo $en_puerto_ordaz; ?></th>
							<th>...</th>
						</tr>

						<tr>
							<th>Hombres: <?php echo $hombres; ?></th>
							<th>Mujeres: <?php echo $mujeres; ?></th>
							<th>Menores: <?php echo $menores; ?></th>
						</tr>
						<tr>
							<th>Por Arma de Fuego: <?php echo $arma_d_fuego; ?></th>
							<th>Arma Blanca: <?php echo $arma_blanca; ?></th>
							<th>Arma Contusa: <?php echo $arma_contusa; ?></th>
						</tr>
						
						<tr>
							<th>Enero: <?php echo $enero; ?></th>
							<th>Febrero: <?php echo $febrero; ?></th>
							<th>Marzo: <?php echo $marzo; ?></th>
						</tr>

						<tr>
							<th>Abril: <?php echo $abril; ?></th>
							<th>Mayo: <?php echo $mayo; ?></th>
							<th>Junio: <?php echo $junio; ?></th>
						</tr>
						
						<tr>
							<th>Julio: <?php echo $julio; ?></th>
							<th>Agosto: <?php echo $agosto; ?></th>
							<th>Septiembre: <?php echo $septiembre; ?></th>
						</tr>
						
						<tr>
							<th>Octubre: <?php echo $octubre; ?></th>
							<th>Noviembre: <?php echo $noviembre; ?></th>
							<th>Diciembre: <?php echo $diciembre; ?></th>
						</tr>

						<tr>
							<th>Cachamay: <?php echo $pa_cachamay; ?></th>
							<th>Chirica: <?php echo $pa_chirica; ?></th>
							<th>Dalla Costa: <?php echo $pa_dalla_costa; ?></th>
						</tr>

						<tr>
							<th>Once de Abril: <?php echo $pa_once_de_abril; ?></th>
							<th>Pozo Verde: <?php echo $pa_pozo_verde; ?></th>
							<th>Simon Bolivar: <?php echo $pa_simon_bolivar; ?></th>
						</tr>

						<tr>
							<th>Unare: <?php echo $pa_unare; ?></th>
							<th>Universidad: <?php echo $pa_universidad; ?></th>
							<th>Vista Al Sol: <?php echo $pa_vista_al_sol; ?></th>
						</tr>
						<tr>
							<th>Yocoima: <?php echo $pa_yocoima; ?></th>
							<th>...</th>
							<th>...</th>
						</tr>
						<tr>
							<th>
							  	<label class="control-label col-sm-4" for="fecha">Fuente:</label>
							    <a href="<?php echo $fuente;?>" class="thumbnail" target="_blank"><img src="../img/<?php echo $img1;?>" alt="..."></a>
					  		</th>
					  		<th>
							  	<label class="control-label col-sm-4" for="fecha">Fuente1:</label>
							    <a href="<?php echo $otra_fuente1;?>" class="thumbnail" target="_blank"><img src="../img/<?php echo $img1;?>" alt="..."></a>
					  		</th>
					  		<th>
							  	<label class="control-label col-sm-4" for="fecha">Fuente2:</label>
							    <a href="<?php echo $otra_fuente2;?>" class="thumbnail" target="_blank"><img src="../img/<?php echo $img1;?>" alt="..."></a>
					  		</th>
					  	</tr>
					  							
					</table>
					
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

