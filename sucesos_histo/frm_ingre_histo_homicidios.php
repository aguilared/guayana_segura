<?php
include_once '../connections/guayana_s.php';

$conexion=new Conexion();
$db=$conexion->getDbConn();
$db->debug = false;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Formulario Ingreso de Historico de Homicidios por año</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS and bootstrap datepicker CSS used for styling -->
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
			<div class="panel-heading">Ingreso de Historicos Homicidios por A&ntilde;o
			<button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
	    	
	    	<div class="panel-body">
		        <form class="form-horizontal" role="form" id="contactform">
					<div class="form-group">
						<label class="control-label col-xs-2" for="ano">A&ntilde;o</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="ano" id="ano" type="text" value="">
						</div>
						<label class="control-label col-xs-2" for="usuario">Usuario:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="usuario" id="usuario" type="text" value="">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-xs-2" for="total">Total:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="total" id="total" type="text" value="">
						</div>

						<label class="control-label col-xs-2" for="total_resueltos">Resueltos:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="total_resueltos" id="total_resueltos" type="text" value="">
						</div>
					
						<label class="control-label col-xs-2" for="impunidad">Impunidad:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="impunidad" id="impunidad" type="text" value="">
						</div>
					</div> 
					
					<div class="form-group">
						<label class="control-label col-xs-2" for="hombres">Hombres:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="hombres" id="hombres" type="text" value="">
						</div>

						<label class="control-label col-xs-2" for="mujeres">Mujeres:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="mujeres" id="mujeres" type="text" value="">
						</div>
					
						<label class="control-label col-xs-2" for="menores">Menores:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="menores" id="menores" type="text" value="">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-2" for="arma_d_fuego">Arma-Fuego:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="arma_d_fuego" id="arma_d_fuego" type="text" value="">
						</div>

						<label class="control-label col-xs-2" for="arma_blanca">Blanca:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="arma_blanca" id="arma_blanca" type="text" value="">
						</div>
						<label class="control-label col-xs-2" for="arma_contusa">Contusa:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="arma_contusa" id="arma_contusa" type="text" value="">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-xs-2" for="enero">Enero:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="enero" id="enero" type="text" value="">
						</div>

						<label class="control-label col-xs-2" for="febrero">Febrero:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="febrero" id="febrero" type="text" value="">
						</div>
					
						<label class="control-label col-xs-2" for="marzo">Marzo:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="marzo" id="marzo" type="text" value="">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-xs-2" for="abril">Abril:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="abril" id="abril" type="text" value="">
						</div>

						<label class="control-label col-xs-2" for="mayo">Mayo:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="mayo" id="mayo" type="text" value="">
						</div>
					
						<label class="control-label col-xs-2" for="junio">Junio:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="junio" id="junio" type="text" value="">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-2" for="julio">Julio:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="julio" id="julio" type="text" value="">
						</div>

						<label class="control-label col-xs-2" for="agosto">Agosto:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="agosto" id="agosto" type="text" value=""> 
						</div>
					
						<label class="control-label col-xs-2" for="septiembre">Septiembre:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="septiembre" id="septiembre" type="text" value="">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-xs-2" for="octubre">Octubre:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="octubre" id="octubre" type="text" value="">
						</div>

						<label class="control-label col-xs-2" for="noviembre">Noviembre:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="noviembre" id="noviembre" type="text" value="">
						</div>
					
						<label class="control-label col-xs-2" for="diciembre">Diciembre:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="diciembre" id="diciembre" type="text" value="">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-2" for="pa_cachamay">Cachamay:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="pa_cachamay" id="pa_cachamay" type="text" value="">
						</div>

						<label class="control-label col-xs-2" for="pa_chirica">Chirica:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="pa_chirica" id="pa_chirica" type="text" value="">
						</div>
					
						<label class="control-label col-xs-2" for="pa_dalla_costa">Dalla-Costa</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="pa_dalla_costa" id="pa_dalla_costa" type="text" value="">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-2" for="pa_once_de_abril">Once-Abril:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="pa_once_de_abril" id="pa_once_de_abril" type="text" value="">
						</div>

						<label class="control-label col-xs-2" for="pa_pozo_verde">Pozo-Verde:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="pa_pozo_verde" id="pa_pozo_verde" type="text" value="">
						</div>
					
						<label class="control-label col-xs-2" for="pa_simon_bolivar">Simon-Bolivar</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="pa_simon_bolivar" id="pa_simon_bolivar" type="text" value="">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-2" for="pa_once_de_abril">Unare:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="pa_unare" id="pa_unare" type="text" value="">
						</div>

						<label class="control-label col-xs-2" for="pa_universidad">Universidad:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="pa_universidad" id="pa_universidad" type="text" value="">
						</div>
					
						<label class="control-label col-xs-2" for="pa_vista_al_sol">VistaAlsol</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="pa_vista_al_sol" id="pa_vista_al_sol" type="text" value="">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-xs-2" for="pa_yocoima">Yocoima:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="pa_yocoima" id="pa_yocoima" type="text" value="">
						</div>

					</div>

					<div class="form-group">
						<label class="control-label col-xs-2" for="fuente">Fuente:</label>
						<div class="col-xs-10">
							<input class="form-control input-sm" name="fuente" id="fuente" type="text" value="">
						</div>
					</div>
		
					<div class="form-group">
						<label class="control-label col-xs-2" for="otra_fuente1">Fuente1:</label>
						<div class="col-xs-10">
							<input class="form-control input-sm" name="otra_fuente1" id="otra_fuente1" type="text" value="">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-2" for="otra_fuente2">Fuente2:</label>
						<div class="col-xs-10">
							<input class="form-control input-sm" name="otra_fuente2" id="otra_fuente2" type="text" value="">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-3" for="fecha_ingreso_data">Fecha Ingreso:</label>
						<div class="col-xs-3">
							<input class="form-control input-sm" name="fecha_ingreso_data" id="fecha_ingreso_data" type="text" value="">
						</div>
						<label class="control-label col-xs-3" for="fecha_modifi_data">Fecha modificacion:</label>
						<div class="col-xs-3">
							<input class="form-control input-sm" name="fecha_modifi_data" id="fecha_modifi_data" type="text" value="">
						</div>
					</div>

					<div class="form-group">
						<div class="control-label col-xs-4">
							<ul class="pager">
								<li class="previous"><a href="index.php">&larr; Cancelar</a></li>
							</ul>
						</div>
						<div class="control-label col-xs-8">
								<button type="submit" class="btn btn-primary">Modificar</button>
						</div>
					</div>
					
				</form>
			</div>

		</div><!-- /. modal-body -->
	</div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="../js/bootstrap-datepicker.js"></script>

  <script src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/jquery.validate.min.js"></script>
  <script type="text/javascript">
		$(document).ready(function() {
			//alert($("select#municipio").val());
			//$("#ok").hide();
			$("#contactform").validate({
				rules: {
					ano: { required: true, minlength: 2},
					//delito_id: { required:true, minlength: 2},
					//delito_detalle_id: { required:true, minlength: 2},
					usuario: { minlength: 2, maxlength: 300},
					total: { required: true, minlength: 2},
					//municipio: { required:true, minlength: 2}
				},
				messages: {
					ano: "Debe introducir una ano.",
					//delito_id: "Debe introducir Id del delito.",
					//delito_detalle_id : "Debe introducir Detalle del delito.",
					usuario : "Debe introducir un usuario.",
					total : "Debe introducir Total.",
					//municipio : "Debe introducir un municipio.",
				},
				submitHandler: function(form){
					var dataString = 'ano='+$('#ano').val()+'&usuario='+$('#usuario').val()+'&total='+$('#total').val()
					+'&resueltos='+$('#total_resueltos').val()+'&impunidad='+$('#impunidad').val()
					+'&hombres='+$('#hombres').val()+'&menores='+$('#menores').val()+'&mujeres='+$('#mujeres').val()
					+'&arma_d_fuego='+$('#arma_d_fuego').val()+'&arma_blanca='+$('#arma_blanca').val()+'&arma_contusa='+$('#arma_contusa').val()
					+'&enero='+$('#enero').val()+'&febrero='+$('#febrero').val()+'&marzo='+$('#marzo').val()
					+'&abril='+$('#abril').val()+'&mayo='+$('#mayo').val()+'&junio='+$('#junio').val()
					+'&julio='+$('#julio').val()+'&agosto='+$('#agosto').val()+'&septiembre='+$('#septiembre').val()
					+'&octubre='+$('#octubre').val()+'&noviembre='+$('#noviembre').val()+'&diciembre='+$('#diciembre').val()
					+'&fuente='+$('#fuente').val()+'&otra_fuente1='+$('#otra_fuente1').val()+'&otra_fuente2='+$('#otra_fuente2').val();
					console.log(dataString);
					alert(dataString);
					$.ajax({
						type: "POST",
						url:"trata_ingre_histo_homicidios.php",
						data: dataString,
						success: function(data, textStatus, jqXHR){
							$("#ok").html(data);
							$("#ok").show();  //colocar manejo de errores si no guardo
							$("#contactform").hide();
							location.reload();  //recargando
						},
						  error: function(XMLHttpRequest, textStatus, errorThrown) {
							 alert("some error");
						  }
					});
				}
			});
		});
	
    
    //cargando el select 
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
		
		//cargando el select 
        function carga_parroquia(municipio_id){
            //alert(municipio_id)
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