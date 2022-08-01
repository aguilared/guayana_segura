<?php
	include_once '../connections/guayana_s.php';

	$conexion=new Conexion();
	$db=$conexion->getDbConn();
	$db->debug = false;
	$db->query("SET NAMES 'utf8'");

	$suceso_id = $_GET['suceso_id'];
	//$suceso_id = 1100;
	$query_suceso = $db->Prepare("SELECT fecha_suceso, hora, delito_id, delito_detalle_id, titulo, fuente, otra_fuente1, otra_fuente2, nombre_victima, sexo, edad, profesion_id, tipo_arma, movil_id, estado, municipio_id, parroquia_id,	latitud, longitud, sector, usuario, mi_resena, fecha_creado
	FROM sucesos
	WHERE suceso_id = $suceso_id");

	$db->SetFetchMode(ADODB_FETCH_ASSOC);

	$rs_suceso = $db->Execute($query_suceso);

	$fecha_suceso = normaliza($rs_suceso->Fields('fecha_suceso'));
	$hora = $rs_suceso->Fields('hora');
	$delito_id = $rs_suceso->Fields('delito_id');
	$delito_detalle_id = $rs_suceso->Fields('delito_detalle_id');
	$titulo = $rs_suceso->Fields('titulo');
	$fuente = $rs_suceso->Fields('fuente');
	$otra_fuente1 = $rs_suceso->Fields('otra_fuente1');
	$otra_fuente2 = $rs_suceso->Fields('otra_fuente2');
	$nombre_victima = $rs_suceso->Fields('nombre_victima');
	$sexo = $rs_suceso->Fields('sexo');
	$edad = $rs_suceso->Fields('edad');
	$profesion_id = $rs_suceso->Fields('profesion_id');
	$tipo_arma = $rs_suceso->Fields('tipo_arma');
	$movil_id = $rs_suceso->Fields('movil_id');
	$estado = $rs_suceso->Fields('estado');
	$municipio_id = $rs_suceso->Fields('municipio_id');
	$parroquia_id = $rs_suceso->Fields('parroquia_id');
	$sector = $rs_suceso->Fields('sector');
	$latitud = $rs_suceso->Fields('latitud');
	$longitud = $rs_suceso->Fields('longitud');
	$usuario = $rs_suceso->Fields('usuario');
	$resena = $rs_suceso->Fields('mi_resena');

	$query_delitos = $db->Prepare("SELECT delito_id, descripcion
		FROM delitos");

	$query_delitos_deta = $db->Prepare("SELECT delito_detalle_id, delito_id, descripcion
		FROM delitos_detalles
		WHERE delito_id = 1");

	$query_municipios = $db->Prepare("SELECT municipio_id, descripcion, estado_id
		FROM municipios
		WHERE estado_id = 7");
	//$query_parroquias = $db->Prepare("SELECT parroquia_id, descripcion FROM parroquias WHERE estado_id= 7");
	$query_parroquias = $db->Prepare("SELECT parroquia_id, descripcion FROM parroquias WHERE estado_id= 7 AND municipio_id = $municipio_id");

  $query_profesiones = $db->Prepare("SELECT profesion_id, descripcion FROM profesiones");
  
  $query_movil = $db->Prepare("SELECT id, descripcion FROM movil ORDER BY descripcion ASC");
  $query_arma = $db->Prepare("SELECT id, descripcion FROM arma ORDER BY descripcion ASC");
  
	$rs_delitos = $db->Execute($query_delitos);
	$rs_delitos_deta = $db->Execute($query_delitos_deta);
	$rs_municipios = $db->Execute($query_municipios);
	$rs_parroquias = $db->Execute($query_parroquias);
  $rs_profesiones = $db->Execute($query_profesiones);
  $rs_movil = $db->Execute($query_movil);
	$rs_arma = $db->Execute($query_arma);
  
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
		<div class="panel-heading">Modificacion del Suceso: <?php echo $suceso_id; ?>
			<button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
	    <div class="panel-body">

        <form class="form-horizontal" role="form" id="contactform">

          <div class="form-group">
            <label class="control-label col-xs-2" for="fecha">Fecha:</label>
            <div class="col-xs-5 input-daterange" id="datepicker">
              <input type="text" class="input-small" name="fecha" id="fecha" value="<?php echo $fecha_suceso; ?>"/>
              <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
            </div>
            <label class="control-label col-xs-2" for="hora">Hora:</label>
            <div class="col-xs-3">
              <input class="form-control input-sm" name="hora" id="hora" type="text" value="<?php echo $hora; ?>"/>
            </div>
          </div>


          <div class="form-group">

            <label class="control-label col-xs-2" for="detalle_delito">Detalle:</label>
            <input name="delito_id" id="delito_id"type="hidden" value="<?php echo 1; ?>">
            <div class="col-xs-10">
              <select class="form-control input-sm" name="delito_detalle_id" id="delito_detalle_id">
                <option selected value="0" >Seleccione</option>
                <?php while(!$rs_delitos_deta->EOF){
                    if ($rs_delitos_deta->Fields('delito_detalle_id') == $delito_detalle_id) {
                      //Selecciona este registro
                      echo "\t<option value=\"" . $rs_delitos_deta->Fields('delito_detalle_id') . "\" selected=\"selected\">" . $rs_delitos_deta->Fields('descripcion') ."</option>\n";
                    }else{ ?>
                    <option value="<?php echo $rs_delitos_deta->Fields('delito_detalle_id'); ?>"><?php echo $rs_delitos_deta->Fields('descripcion'); ?></option>
                    <?php
                    }
                  $rs_delitos_deta->MoveNext();
                  }
                  $rs_delitos_deta->MoveFirst();
                ?>
              </select>
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-xs-2" for="titulo">Titulo:</label>
            <div class="col-xs-10">
              <input class="form-control input-sm" name="titulo" id="titulo" type="text" value="<?php echo $titulo; ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-xs-2" for="fuente">Fuente:</label>
            <div class="col-xs-10">
              <input class="form-control input-sm" name="fuente" id="fuente" type="text" value="<?php echo $fuente; ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-xs-2" for="otra_fuente1">Fuente1:</label>
            <div class="col-xs-10">
              <input class="form-control input-sm" name="otra_fuente1" id="otra_fuente1" type="text" value="<?php echo $otra_fuente1; ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-xs-2" for="otra_fuente2">Fuente2:</label>
            <div class="col-xs-10">
              <input class="form-control input-sm" name="otra_fuente2" id="otra_fuente2" type="text" value="<?php echo $otra_fuente2; ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-xs-2" for="municipio">Municipio:</label>
            <div class="col-xs-4">
              <select class="form-control input-sm" name="municipio" id="municipio" onchange="carga_parroquia($('#municipio').val());return false;">>
                <option selected value="0" >Seleccione</option>
              <?php while(!$rs_municipios->EOF){
                if ($rs_municipios->Fields('municipio_id') == $municipio_id) { ?>
                <option value="<?php echo $rs_municipios->Fields('municipio_id'); ?>" selected="selected"><?php echo $rs_municipios->Fields('descripcion'); ?></option>
                <?php
                  } else { ?>
                <option value="<?php echo $rs_municipios->Fields('municipio_id'); ?>"><?php echo $rs_municipios->Fields('descripcion'); ?></option>
                <?php
                } $rs_municipios->MoveNext();
              }
              $rs_municipios->MoveFirst();?>
                </select>
            </div>

            <label class="control-label col-xs-2" for="parroquia">Parroquia:</label>
            <div class="col-xs-4">
              <select class="form-control input-sm" name="parroquia" id="parroquia" onchange="carga_lati_y_longi($('#parroquia').val());return false;">>
                <option selected value="0" >Seleccione</option>
              <?php while(!$rs_parroquias->EOF){
                if ($rs_parroquias->Fields('parroquia_id') == $parroquia_id) { ?>
                <option value="<?php echo $rs_parroquias->Fields('parroquia_id'); ?>" selected="selected"><?php echo $rs_parroquias->Fields('descripcion'); ?></option>
                <?php
                } else { ?>
                <option value="<?php echo $rs_parroquias->Fields('parroquia_id'); ?>"><?php echo $rs_parroquias->Fields('descripcion'); ?></option>
                <?php
                } $rs_parroquias->MoveNext();
              }
              $rs_parroquias->MoveFirst();?>
              </select>
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-xs-2" for="nombre_victima">Victima:</label>
            <div class="col-xs-10">
              <input class="form-control input-sm" name="nombre_victima" id="nombre_victima" type="text" value="<?php echo $nombre_victima; ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-xs-2" for="sexo">Sexo:</label>
            <div class="col-xs-4">
              <select class="form-control input-sm" id="sexo" name="sexo" >
                <option selected value="0" >Seleccione</option>
                <option <?php if ($sexo == "M") {
                      echo "\" selected=\"selected\"";}?>>M</option>
                <option <?php if ($sexo == "F") {
                      echo "\" selected=\"selected\"";}?>>F</option>
              </select>

            </div>


            <label class="control-label col-xs-2" for="edad">Edad:</label>
            <div class="col-xs-4">
              <input class="form-control input-sm" name="edad" id="edad" type="text" value="<?php echo $edad; ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-xs-2" for="profesion">Profesion:</label>
            <div class="col-xs-4">
              <select class="form-control input-sm" name="profesion" id="profesion">
                <option selected value="0" >Seleccione</option>
                <?php while(!$rs_profesiones->EOF){
                  if ($rs_profesiones->Fields('profesion_id') == $profesion_id) { ?>
                  <option value="<?php echo $rs_profesiones->Fields('profesion_id'); ?>" selected="selected"><?php echo $rs_profesiones->Fields('descripcion'); ?></option>
                  <?php
                  } else { ?>
                  <option value="<?php echo $rs_profesiones->Fields('profesion_id'); ?>"><?php echo $rs_profesiones->Fields('descripcion'); ?></option>
                  <?php
                  } $rs_profesiones->MoveNext();
                }
                $rs_profesiones->MoveFirst();?>
              </select>
            </div>

            <label class="control-label col-xs-2" for="tipo_arma">Arma:</label>
						<div class="col-xs-4">
							<select class="form-control input-sm" id="tipo_arma" name="tipo_arma" >
								<option selected value="0" >Seleccione</option>
								<?php while(!$rs_arma->EOF){
									if ($rs_arma->Fields('id') == $tipo_arma) {
										//Selecciona este registro
										echo "\t<option value=\"" . $rs_arma->Fields('id') . "\" selected=\"selected\">" . $rs_arma->Fields('descripcion') ."</option>\n";
									}else{ ?>
									<option value="<?php echo $rs_arma->Fields('id'); ?>"><?php echo $rs_arma->Fields('descripcion'); ?></option>
									<?php
									}
								$rs_arma->MoveNext();
								}
								$rs_arma->MoveFirst();?>
							</select>
						</div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-2" for="movil">Movil:</label>
            <div class="col-xs-10">
              <select class="form-control input-sm" name="movil_id" id="movil_id">
                <option selected value="0" >Seleccione</option>
                <?php while(!$rs_movil->EOF){
                  if ($rs_movil->Fields('id') == $movil_id) {
                    //Selecciona este registro
                    echo "\t<option value=\"" . $rs_movil->Fields('id') . "\" selected=\"selected\">" . $rs_movil->Fields('descripcion') ."</option>\n";
                  }else{ ?>
                  <option value="<?php echo $rs_movil->Fields('id'); ?>"><?php echo $rs_movil->Fields('descripcion'); ?></option>
                  <?php
                  }
                $rs_movil->MoveNext();
                }
                $rs_movil->MoveFirst();?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-2" for="sector">Sector:</label>
            <div class="col-xs-10">
              <input class="form-control input-sm" name="sector" id="sector" type="text" value="<?php echo $sector; ?>">
            </div>
          </div>

          <div class="form-group">
            <label for="resena">Resena:</label>
            <textarea class="form-control" rows="5" id="resena" name="resena"><?php echo $resena; ?></textarea>
          </div>

          <div class="form-group">
            <label class="control-label col-xs-2" for="latitud">Latitud:</label>
            <div class="col-xs-4">
              <input class="form-control input-sm" name="latitud" id="latitud" value="<?php echo $latitud; ?>">
            </div>
            <label class="control-label col-xs-2" for="longitud">Longitud:</label>
            <div class="col-xs-4">
              <input class="form-control input-sm" name="longitud" id="longitud" type="text" value="<?php echo $longitud; ?>">
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
          <div class="link-map"></div>

          <input name="suceso_id" id="suceso_id"type="hidden" value="<?php echo $suceso_id; ?>">

        </form>
		  </div>
	  </div>
	</div>

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
					fecha: { required: true, minlength: 2},
					//delito_id: { required:true, minlength: 2},
					//delito_detalle_id: { required:true, minlength: 2},
					titulo: { minlength: 2, maxlength: 300},
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
					//var hora=$('#hora').val();
					//console.log(resena);
					//alert(hora);
					var dataString = 'fecha='+$('#fecha').val()+'&hora='+$('#hora').val()+'&suceso_id='+$('#suceso_id').val()+'&delito_id='+$("select#delito_id").val()
					+'&delito_detalle_id='+$("select#delito_detalle_id").val()+'&titulo='+$('#titulo').val()+'&fuente='+$('#fuente').val()
					+'&otra_fuente1='+$('#otra_fuente1').val()+'&otra_fuente2='+$('#otra_fuente2').val()
					+'&municipio='+$("select#municipio").val()+'&parroquia='+$("select#parroquia").val()
					+'&nombre_victima='+$('#nombre_victima').val()+'&sexo='+$("select#sexo").val()+'&edad='+$('#edad').val()
					+'&profesion='+$("select#profesion").val()+'&tipo_arma='+$("select#tipo_arma").val()+'&movil_id='+$("select#movil_id").val()
					+'&sector='+$('#sector').val()+'&resena='+$('#resena').val()+
					'&latitud='+$('#latitud').val()+'&longitud='+$('#longitud').val()
					+'&usuario='+$('#usuario').val();
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
