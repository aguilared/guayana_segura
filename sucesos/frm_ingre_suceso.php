<?php
include_once '../connections/guayana_s.php';
$conexion=new Conexion();
$db=$conexion->getDbConn();
$db->debug = false;
	
$query_delitos = $db->Prepare("SELECT delito_id, descripcion
					FROM delitos");
$query_delitos_deta = $db->Prepare("SELECT delito_detalle_id, delito_id, descripcion
					FROM delitos_detalles");
				
$query_municipios = $db->Prepare("SELECT municipio_id, descripcion, estado_id
					FROM municipios
					WHERE estado_id = 7");
$query_parroquias = $db->Prepare("SELECT parroquia_id, descripcion FROM parroquias WHERE estado_id= 7 AND municipio_id = 3");
$db->SetFetchMode(ADODB_FETCH_ASSOC);
//Recorset
$rs_delitos = $db->Execute($query_delitos);
$rs_delitos_deta = $db->Execute($query_delitos_deta);
$rs_municipios = $db->Execute($query_municipios);
$rs_parroquias = $db->Execute($query_parroquias);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Formulario Ingreso de un Suceso</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<style>
			.form-group {
			margin-bottom: 7px;
			}
		</style>
	</head>
	<body>
		<div class="modal fade" id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<div class="panel panel-primary">
							<div class="panel-heading">Ingreso de un Suceso
								<button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>
							<div class="panel-body">
								
								
								<form class="form-horizontal" role="form" id="contactform">
									<div class="form-group">
										<label class="control-label col-xs-2" for="fecha">Fecha:</label>
										<div class="col-xs-5 input-daterange" id="datepicker">
											<input type="text" class="input-small" name="fecha" id="fecha" value=""/>
											<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
										</div>
										<label class="control-label col-xs-2" for="usuario">Usuario:</label>
										<div class="col-xs-3">
											<input class="form-control input-sm" name="usuario" id="usuario" type="text">
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-xs-2" for="delito">Delito:</label>
										<div class="col-xs-4">
											<select class="form-control input-sm" name="delito_id" id="delito_id" onchange="carga_deta_delito($('#delito_id').val());return false;">
												<option selected value="0" >Seleccione</option>
												<?php while(!$rs_delitos->EOF){ ?>
												<option value="<?php echo $rs_delitos->Fields('delito_id'); ?>"><?php echo $rs_delitos->Fields('descripcion'); ?></option>
												<?php $rs_delitos->MoveNext();
															}
												$rs_delitos->MoveFirst();?>
											</select>
										</div>
									
										<label class="control-label col-xs-2" for="detalle_delito">Detalle:</label>
										<div class="col-xs-4">
											<select class="form-control input-sm" name="delito_detalle_id" id="delito_detalle_id">
												<option selected value="0" >Seleccione</option>
												<?php while(!$rs_delitos_deta->EOF){ ?>
												<option value="<?php echo $rs_delitos_deta->Fields('delito_id'); ?>"><?php echo $rs_delitos_deta->Fields('descripcion'); ?></option>
												<?php $rs_delitos_deta->MoveNext();
												}
												$rs_delitos_deta->MoveFirst();?>
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-xs-2" for="titulo">Titulo:</label>
										<div class="col-xs-10">
											<input class="form-control input-sm" name="titulo" id="titulo" type="text">
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-xs-2" for="fuente">Fuente:</label>
										<div class="col-xs-10">
											<input class="form-control input-sm" name="fuente" id="fuente" type="text">
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-xs-2" for="otra_fuente1">Fuente1:</label>
										<div class="col-xs-10">
											<input class="form-control input-sm" name="otra_fuente1" id="otra_fuente1" type="text">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-xs-2" for="otra_fuente2">Fuente2:</label>
										<div class="col-xs-10">
											<input class="form-control input-sm" name="otra_fuente2" id="otra_fuente2" type="text">
										</div>
									</div>


									<div class="form-group">
										<label class="control-label col-xs-2" for="municipio">Municipio:</label>
										<div class="col-xs-4">
											<select class="form-control input-sm" name="municipio" id="municipio" onchange="carga_parroquia($('#municipio').val());return false;">>
												<option selected value="0" >Seleccione</option>
												<?php while(!$rs_municipios->EOF){ ?>
												<option value="<?php echo $rs_municipios->Fields('municipio_id'); ?>"><?php echo $rs_municipios->Fields('descripcion'); ?></option>
												<?php $rs_municipios->MoveNext();
															}
												$rs_municipios->MoveFirst();?>
											</select>
										</div>
									
										<label class="control-label col-xs-2" for="parroquia">Parroquia:</label>
										<div class="col-xs-4">
											<select class="form-control input-sm" name="parroquia" id="parroquia">
												<option selected value="0" >Seleccione</option>
												<?php while(!$rs_parroquias->EOF){ ?>
												<option value="<?php echo $rs_parroquias->Fields('parroquia_id'); ?>"><?php echo $rs_parroquias->Fields('descripcion'); ?></option>
												<?php $rs_parroquias->MoveNext();
															}
												$rs_parroquias->MoveFirst();?>
											</select>
										</div>
									</div>
									
									
									<div class="form-group">
										<label class="control-label col-xs-2" for="nombre_victima">Victima:</label>
										<div class="col-xs-10">
											<input class="form-control input-sm" name="nombre_victima" id="nombre_victima" type="text">
										</div>
									</div>
									
									
									<div class="form-group">
										<label class="control-label col-xs-2" for="sexo">Sexo:</label>
										<div class="col-xs-4">
											<select class="form-control input-sm" id="sexo" name="sexo" >
												<option selected value="0" >Seleccione</option>
												<option>M</option>
												<option>F</option>
											</select>
										</div>
										<label class="control-label col-xs-2" for="edad">Edad:</label>
										<div class="col-xs-4">
											<input class="form-control input-sm" name="edad" id="edad" type="text">
										</div>
									</div>
																		
									<div class="form-group">
										<label class="control-label col-xs-2" for="tipo_arma">Arma:</label>
										<div class="col-xs-10">
											<select class="form-control input-sm" id="tipo_arma" name="tipo_arma" >
												<option selected value="0" >Seleccione</option>
												<option>1</option>
												<option>2</option>
											</select>
										</div>
									</div>
																		
									
									<div class="form-group">
										<label class="control-label col-xs-2" for="sector">Sector:</label>
										<div class="col-xs-10">
											<input class="form-control input-sm" name="sector" id="sector" type="text">
										</div>
									</div>
									
									
									<div class="form-group">
										<label class="control-label col-xs-2" for="latitud">Latitud:</label>
										<div class="col-xs-4">
											<input class="form-control input-sm" name="latitud" id="latitud" type="text">
										</div>
										<label class="control-label col-xs-2" for="longitud">Longitud:</label>
										<div class="col-xs-4">
											<input class="form-control input-sm" name="longitud" id="longitud" type="text">
										</div>
									</div>
									
									<div class="form-group">
										<div class="control-label col-xs-4">
											<ul class="pager">
												<li class="previous"><a href="index.php">&larr; Cancelar</a></li>
											</ul>
										</div>
										<div class="control-label col-xs-8">
												<button type="submit" class="btn btn-primary">Ingresar</button>
										</div>
									</div>
									
								</form>
							
							</div>
						</div>
					</div>
					
					
					</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
					<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
					<script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
					<script type="text/javascript">
							$(document).ready(function() {
								//$("#ok").hide();
								$("#contactform").validate({
									rules: {
										fecha: { required: true, minlength: 2},
										//delito_id: { required:true, minlength: 2},
										//delito_detalle_id: { required:true, minlength: 2},
										titulo: { required: true, minlength: 2},
										fuente: { required: true, minlength: 2},
										//municipio: { required:true, minlength: 2}
									},
									messages: {
										fecha: "Debe introducir una fecha.",
										//delito_id: "Debe introducir Id del delito.",
										//delito_detalle_id : "Debe introducir Detalle del delito.",
										titulo : "Debe introducir un Titulo.",
										fuente : "Debe introducir la Fuente.",
										//municipio : "Debe introducir un municipio.",
									},
									submitHandler: function(form){
										var dataString = 'fecha='+$('#fecha').val()+'&delito_id='+$("select#delito_id").val()+'&delito_detalle_id='
										+$("select#delito_detalle_id").val()+'&titulo='+$('#titulo').val()+'&fuente='+$('#fuente').val()
										+'&otra_fuente1='+$('#otra_fuente1').val()+'&otra_fuente2='+$('#otra_fuente2').val()
										+'&municipio='+$("select#municipio").val()+'&parroquia='+$("select#parroquia").val()
										+'&nombre_victima='+$('#nombre_victima').val()+'&sexo='+$("select#sexo").val()+'&edad='+$('#edad').val()
										+'&sector='+$('#sector').val()+'&usuario='+$('#usuario').val();
										//alert(dataString);
										$.ajax({
											type: "POST",
											url:"trata_ingre_sucesos.php",
											data: dataString,
											success: function(data){
												$("#ok").html(data);
												$("#ok").show();
												$("#contactform").hide();
												location.reload();
											}
										});
									}
								});
							});
						
					
					//cargando el select detalle delito
					function carga_deta_delito(valorCaja1){
					var parametros = {
					"valorCaja1" : valorCaja1
					};
					$.ajax({
					data: parametros,
					url: 'carga_deta_delito.php',
					type: 'post',
					beforeSend: function () {
					$("#delito_detalle_id").empty();
					$("#delito_detalle_id").html("Procesando, espere por favor...");
					},
					success: function (response) {
					$("#delito_detalle_id").html(response);
					}
					});
					}
							
							//cargando el select detalle delito
					function carga_parroquia(municipio_id){
					var parametros = {
					"municipio_id" : municipio_id
					};
					$.ajax({
					data: parametros,
					url: 'carga_parroquia.php',
					type: 'post',
					beforeSend: function () {
					$("#parroquia").empty();
					$("#parroquia").html("Procesando, espere por favor...");
					},
					success: function (response) {
					$("#parroquia").html(response);
					}
					});
					}
					</script>
					<script type="text/javascript">
						// When the document is ready
						$(document).ready(function () {
							
							$.fn.datepicker.dates['en'] = {
								days: ["Sundays", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
								daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
								daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
								months: ["Enero", "Febrero", "Marzo", "April", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
								monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dec"],
								today: "Hoy",
								clear: "Clear",
								format: "dd/mm/yyyy"
								
							};
					
							$('.input-daterange').datepicker({
								autoclose: true,
								todayBtn: "linked"
							});
					
					});
							
						
						
					</script>
					<script>
					$( document ).ready(function() {
							//carga el modal al abrirse
					$('#myModal').modal('show');
					});
					</script>
				</body>
			</html>