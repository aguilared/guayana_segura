<?php
include_once '../connections/guayana_s.php';

$conexion=new Conexion();
$db=$conexion->getDbConn();
$db->debug = false;
$histo_id = $_GET['histo_id']; 
//$histo_id = 2;
$query_suceso = $db->Prepare("SELECT histo_id, ano, total, total_vzla, total_resueltos, fuente, otra_fuente1, otra_fuente2,usuario
	FROM histo_homicidios WHERE histo_id = $histo_id");

$db->SetFetchMode(ADODB_FETCH_ASSOC);

$rs_suceso = $db->Execute($query_suceso);

$ano =$rs_suceso->Fields('ano');
//$fecha_suceso = $rs_suceso->Fields('fecha_suceso');
$ano = $rs_suceso->Fields('ano');
$total = $rs_suceso->Fields('total');
$total_vzla = $rs_suceso->Fields('total_vzla');
$total_resueltos = $rs_suceso->Fields('total_resueltos');
$inpunidad = $rs_suceso->Fields('inpunidad');
$fuente = $rs_suceso->Fields('fuente');
$otra_fuente1 = $rs_suceso->Fields('otra_fuente1');
$otra_fuente2 = $rs_suceso->Fields('otra_fuente2');
$usuario = $rs_suceso->Fields('usuario')

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Formulario Modificacion de un Suceso</title>
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
				<div class="panel-heading">Modificacion del Historico: <?php echo $histo_id; ?>
				<button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
	    	
	    	<div class="panel-body">
		        <form class="form-horizontal" role="form" id="contactform">
					<div class="form-group">
						<label class="control-label col-xs-2" for="ano">A&ntilde;o:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="ano" id="ano" type="text" value="<?php echo $ano; ?>">
						</div>
						<label class="control-label col-xs-2" for="usuario">Usuario:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="usuario" id="usuario" type="text" value="<?php echo $usuario; ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-xs-2" for="total_caroni">Total:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="total_caroni" id="total_caroni" type="text"value="<?php echo $total; ?>">
						</div>

						<label class="control-label col-xs-2" for="resueltos">Resueltos:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="resueltos" id="resueltos" type="text" value="<?php echo $total_resueltos; ?>">
						</div>
					
						<label class="control-label col-xs-2" for="impunidad">Impunidad:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="inpunidad" id="inpunidad" type="text">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-xs-2" for="hombres">Hombres:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="hombres" id="hombres" type="text">
						</div>

						<label class="control-label col-xs-2" for="mujeres">Mujeres:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="mujeres" id="mujeres" type="text">
						</div>
					
						<label class="control-label col-xs-2" for="menores">Menores:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="menores" id="menores" type="text">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-2" for="armas_fuego">Arma Fuego:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="armas_fuego" id="armas_fuego" type="text">
						</div>

						<label class="control-label col-xs-2" for="otras_armas">Blanca:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="otras_armas" id="otras_armas" type="text">
						</div>
						<label class="control-label col-xs-2" for="otras_armas">Contusa:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="otras_armas" id="otras_armas" type="text">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-4" for="ranking_n">Ranking Nacional:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="ranking_n" id="ranking_n" type="text">
						</div>

						<label class="control-label col-xs-4" for="ranking_m">Ranking Mundial:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="ranking_m" id="ranking_m" type="text">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-xs-2" for="enero">Enero:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="enero" id="enero" type="text">
						</div>

						<label class="control-label col-xs-2" for="febrero">Febrero:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="febrero" id="febrero" type="text">
						</div>
					
						<label class="control-label col-xs-2" for="marzo">Marzo:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="marzo" id="marzo" type="text">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-xs-2" for="abril">Abril:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="abril" id="abril" type="text">
						</div>

						<label class="control-label col-xs-2" for="mayo">Mayo:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="mayo" id="mayo" type="text">
						</div>
					
						<label class="control-label col-xs-2" for="junio">Junio:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="junio" id="junio" type="text">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-2" for="julio">Julio:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="julio" id="julio" type="text">
						</div>

						<label class="control-label col-xs-2" for="agosto">Agosto:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="agosto" id="agosto" type="text">
						</div>
					
						<label class="control-label col-xs-2" for="septiembre">Septiembre:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="septiembre" id="septiembre" type="text">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-xs-2" for="octubre">Octubre:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="octubre" id="octubre" type="text">
						</div>

						<label class="control-label col-xs-2" for="noviembre">Noviembre:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="noviembre" id="noviembre" type="text">
						</div>
					
						<label class="control-label col-xs-2" for="diciembre">Diciembre:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="diciembre" id="diciembre" type="text">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-2" for="fuente">Fuente:</label>
						<div class="col-xs-10">
							<input class="form-control input-sm" name="fuente" id="fuente" type="text">
						</div>
					</div>
		
					<div class="form-group">
						<label class="control-label col-xs-2" for="fuente1">Fuente1:</label>
						<div class="col-xs-10">
							<input class="form-control input-sm" name="fuente1" id="fuente1" type="text">
						</div>
					</div>

					<div class="form-group">
						<label  class="panel-heading">Ingreso Historico de Homicidios Venezuela</label>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-2" for="total_caroni">Total:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="total_caroni" id="total_caroni" type="text">
						</div>

						<label class="control-label col-xs-2" for="resueltos">Resueltos:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="resueltos" id="resueltos" type="text">
						</div>
					
						<label class="control-label col-xs-2" for="impunidad">Impunidad:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="inpunidad" id="inpunidad" type="text">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-xs-2" for="hombres">Hombres:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="hombres" id="hombres" type="text">
						</div>

						<label class="control-label col-xs-2" for="mujeres">Mujeres:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="mujeres" id="mujeres" type="text">
						</div>
					
						<label class="control-label col-xs-2" for="menores">Menores:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="menores" id="menores" type="text">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-4" for="armas_fuego">Armas de Fuego</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="armas_fuego" id="armas_fuego" type="text">
						</div>

						<label class="control-label col-xs-4" for="otras_armas">Otras Armas:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="otras_armas" id="otras_armas" type="text">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-4" for="ranking_n">Ranking Nacional:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="ranking_n" id="ranking_n" type="text">
						</div>

						<label class="control-label col-xs-4" for="ranking_m">Ranking Mundial:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="ranking_m" id="ranking_m" type="text">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-xs-2" for="enero">Enero:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="enero" id="enero" type="text">
						</div>

						<label class="control-label col-xs-2" for="febrero">Febrero:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="febrero" id="febrero" type="text">
						</div>
					
						<label class="control-label col-xs-2" for="marzo">Marzo:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="marzo" id="marzo" type="text">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-xs-2" for="abril">Abril:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="abril" id="abril" type="text">
						</div>

						<label class="control-label col-xs-2" for="mayo">Mayo:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="mayo" id="mayo" type="text">
						</div>
					
						<label class="control-label col-xs-2" for="junio">Junio:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="junio" id="junio" type="text">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-2" for="julio">Julio:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="julio" id="julio" type="text">
						</div>

						<label class="control-label col-xs-2" for="agosto">Agosto:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="agosto" id="agosto" type="text">
						</div>
					
						<label class="control-label col-xs-2" for="septiembre">Septiembre:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="septiembre" id="septiembre" type="text">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-xs-2" for="octubre">Octubre:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="octubre" id="octubre" type="text">
						</div>

						<label class="control-label col-xs-2" for="noviembre">Noviembre:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="noviembre" id="noviembre" type="text">
						</div>
					
						<label class="control-label col-xs-2" for="diciembre">Diciembre:</label>
						<div class="col-xs-2">
							<input class="form-control input-sm" name="diciembre" id="diciembre" type="text">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-2" for="fuente">Fuente:</label>
						<div class="col-xs-10">
							<input class="form-control input-sm" name="fuente" id="fuente" type="text">
						</div>
					</div>
		
					<div class="form-group">
						<label class="control-label col-xs-2" for="fuente1">Fuente1:</label>
						<div class="col-xs-10">
							<input class="form-control input-sm" name="fuente1" id="fuente1" type="text">
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
					titulo: { minlength: 2, maxlength: 300},
					fuente: { required: true, minlength: 2},
					//municipio: { required:true, minlength: 2}
				},
				messages: {
					ano: "Debe introducir una fecha.",
					//delito_id: "Debe introducir Id del delito.",
					//delito_detalle_id : "Debe introducir Detalle del delito.",
					titulo : "Debe introducir un Titulo.",
					fuente : "Debe introducir la Fuente.",
					//municipio : "Debe introducir un municipio.",
				},
				submitHandler: function(form){
					var dataString = 'ano='+$('#fecha').val()+'&histo_id='+$('#histo_id').val()+'&delito_id='+$("select#delito_id").val()+'&delito_detalle_id='
					+$("select#delito_detalle_id").val()+'&titulo='+$('#titulo').val()+'&fuente='+$('#fuente').val()
					+'&otra_fuente1='+$('#otra_fuente1').val()+'&otra_fuente2='+$('#otra_fuente2').val()
					+'&municipio='+$("select#municipio").val()
					+'&parroquia='+$("select#parroquia").val()+'&nombre_victima='+$('#nombre_victima').val()
					+'&sexo='+$("select#sexo").val()+'&edad='+$('#edad').val()+'&tipo_arma='+$("select#tipo_arma").val()
					+'&sector='+$('#sector').val()+'&usuario='+$('#usuario').val();
					//alert(dataString);
					$.ajax({
						type: "POST",
						url:"trata_modi_suceso.php",
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