<?php
	include_once '../connections/guayana_s.php';
	$conexion=new Conexion();
	$db=$conexion->getDbConn();
	$db->debug = true;
	$delito_id = 1;
	$estado_id = 7;

	$query_delitos = $db->Prepare("SELECT delito_id, descripcion
						FROM delitos");
	$query_delitos_deta = $db->Prepare("SELECT delito_detalle_id, delito_id, descripcion
						FROM delitos_detalles
						WHERE delito_id = $delito_id");

	$query_municipios = $db->Prepare("SELECT municipio_id, descripcion, estado_id
						FROM municipios
						WHERE estado_id = $estado_id");

	$query_parroquias = $db->Prepare("SELECT parroquia_id, descripcion FROM parroquias WHERE estado_id= 7 AND municipio_id = 3");

	$query_profesiones = $db->Prepare("SELECT profesion_id, descripcion FROM profesiones");

	$db->SetFetchMode(ADODB_FETCH_ASSOC);
	//Recorset
	$rs_delitos = $db->Execute($query_delitos);
	$rs_delitos_deta = $db->Execute($query_delitos_deta);
	$rs_municipios = $db->Execute($query_municipios);
	$rs_parroquias = $db->Execute($query_parroquias);
	$rs_profesiones = $db->Execute($query_profesiones);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Formulario Ingreso de un Suceso</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/datepicker.css">

		<style>
			.form-group {
			margin-bottom: 7px;
			}
			.pager{
				margin-top:0px !important;
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
									<input class="form-control input-sm" name="usuario" id="usuario" type="text" value="9504">
								</div>
							</div>

							<input name="delito_id" id="delito_id" type="hidden" value="<?php echo 1; ?>">
							<div class="form-group">
								<label class="control-label col-xs-2" for="detalle_delito">Detalle:</label>
								<div class="col-xs-10">
									<select class="form-control input-sm" name="delito_detalle_id" id="delito_detalle_id">
										<option selected value="" ></option>
										<?php while(!$rs_delitos_deta->EOF){ ?>
										<option value="<?php echo $rs_delitos_deta->Fields('delito_detalle_id'); ?>"><?php echo $rs_delitos_deta->Fields('descripcion'); ?></option>
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
										<option selected value="" ></option>
										<?php while(!$rs_municipios->EOF){ ?>
										<option value="<?php echo $rs_municipios->Fields('municipio_id'); ?>"><?php echo $rs_municipios->Fields('descripcion'); ?></option>
										<?php $rs_municipios->MoveNext();
													}
										$rs_municipios->MoveFirst();?>
									</select>
								</div>

								<label class="control-label col-xs-2" for="parroquia">Parroquia:</label>
								<div class="col-xs-4">
									<select class="form-control input-sm" name="parroquia" id="parroquia" onchange="carga_lati_y_longi($('#parroquia').val());return false;">>
										<option selected value="" ></option>
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
										<option selected value="" ></option>
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
								<label class="control-label col-xs-2" for="profesion">Profesion:</label>
								<div class="col-xs-4">
									<select class="form-control input-sm" name="profesion" id="profesion">
										<option selected value="0" ></option>
										<?php while(!$rs_profesiones->EOF){ ?>
										<option value="<?php echo $rs_profesiones->Fields('profesion_id'); ?>"><?php echo $rs_profesiones->Fields('descripcion'); ?></option>
										<?php $rs_profesiones->MoveNext();
										}
										$rs_profesiones->MoveFirst();?>
									</select>
								</div>

								<label class="control-label col-xs-2" for="tipo_arma">Arma:</label>
								<div class="col-xs-4">
									<select class="form-control input-sm" id="tipo_arma" name="tipo_arma" >
										<option selected value="" ></option>
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
							  <label for="resena">Resena:</label>
							  <textarea class="form-control" rows="5" id="resena"></textarea>
							</div>

							<div class="form-group">
								<label class="control-label col-xs-2" for="latitud">Latitud:</label>
								<div class="col-xs-4">
									<input class="form-control input-sm" name="latitud" id="latitud" type="text" value="8.326327007649128">
								</div>
								<label class="control-label col-xs-2" for="longitud">Longitud:</label>
								<div class="col-xs-4">
									<input class="form-control input-sm" name="longitud" id="longitud" type="text" value="-62.7044677734375">
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

							<div class="link-map"></div>

						</form>

					</div>
				</div>
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	//$("#ok").hide();
	$("#contactform").validate({
		rules: {
			fecha: { required: true, minlength: 2},
			//delito_id: { required:true},
			//delito_detalle_id: { required:true, minlength: 2},
			titulo: { required: true, minlength: 2},
			fuente: { required: true, minlength: 2},
			parroquia: { required:true }
		},
		messages: {
			fecha: "Debe introducir una fecha.",
			//delito_id: "Debe introducir Id del delito.",
			//delito_detalle_id : "Debe introducir un Detalle del delito.",
			titulo : "Debe introducir un Titulo.",
			fuente : "Debe introducir la Fuente.",
			parroquia : "Debe introducir una parroquia.",
		},
		submitHandler: function(form){
			//alert("Value: " + $("#delito_detalle_id").val());
			var dataString = 'fecha='+$('#fecha').val()+'&delito_id='+$('#delito_id').val()
			+'&delito_detalle_id='+$("select#delito_detalle_id").val()+'&titulo='+$('#titulo').val()+'&fuente='+$('#fuente').val()
			+'&otra_fuente1='+$('#otra_fuente1').val()+'&otra_fuente2='+$('#otra_fuente2').val()
			+'&municipio='+$("select#municipio").val()+'&parroquia='+$("select#parroquia").val()
			+'&nombre_victima='+$('#nombre_victima').val()+'&sexo='+$("select#sexo").val()+'&edad='+$('#edad').val()
			+'&profesion='+$("select#profesion").val()+'&tipo_arma='+$("select#tipo_arma").val()
			+'&sector='+$('#sector').val()+'&resena='+$('#resena').val()+
			+'&latitud='+$('#latitud').val()+'&longitud='+$('#longitud').val()
			+'&usuario='+$('#usuario').val();
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
$('.date').datepicker();
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


	$('#myModal').modal('show');

	$("#parroquia").bind("change", function(e){
	    $.getJSON("carga_lati_y_longi.php?parroquia_id=" + $("#parroquia").val(),
			function(data){
			    $.each(data, function(i,item){
					if (item.field == "latitud") {
					  $("#latitud").val(item.value);
					} else if (item.field == "longitud") {
					  $("#longitud").val(item.value);
					}
			  	});
			  	$(".link-map").html('<div class="alert alert-info"><a  target="_blank" class="text-center" href="maps.php?latitud='+$("#latitud").val()+'&longitud='+$("#longitud").val()+'">Map</a></div>');
			}
		);
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

//cargando el select parroquia
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

//cargando la latitud y longitud por defecto el de la parroquia
function carga_lati_y_longi_(parroquia_id){
	var parametros = {
	"parroquia_id" : parroquia_id
	};
	$.ajax({
		data: parametros,
		url: 'carga_lati_y_longi.php',
		type: 'post',
		beforeSend: function () {
			$("#latitud").empty();
			$("#latitud").html("Procesando, espere por favor...");
		},
		success: function (response) {
			$("#latitud").val(latitud);
			$("#longitud").val(longitud);

		}
	});

}

//cargando la latitud y longitud por defecto el de la parroquia
function carga_lati_y_longi__(parroquia_id){
	var parametros = {
	"parroquia_id" : parroquia_id
	};
	$.ajax({
		data: parametros,
		dataType : 'json',
		url: 'carga_lati_y_longi.php',
		type: 'post',
		beforeSend: function () {
			$("#parroquia").empty();
			$("#parroquia").html("Procesando, espere por favor...");
		},

		success: function (response) {
			$.each(data, function(i,item){
			if (item.field == "first_name") {
			  $("#first_name").val(item.value);
			} else if (item.field == "last_name") {
			  $("#last_name").val(item.value);
			}
			});
		}

	});

}

</script>




</body>
</html>
