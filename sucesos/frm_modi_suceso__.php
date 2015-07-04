<?php
include_once '../connections/guayana_s.php';

$conexion=new Conexion();
$db=$conexion->getDbConn();
$db->debug = true;
$suceso_id = $_GET['suceso_id']; 
//$suceso_id = 32;
$query_suceso = $db->Prepare("SELECT fecha_suceso, delito_id, delito_detalle_id, titulo, fuente, otra_fuente1, otra_fuente2, nombre_victima, sexo, edad, tipo_arma, estado, 
	municipio_id, parroquia_id,	latitud, longitud, sector, usuario, fecha_creado
	FROM sucesos WHERE suceso_id = $suceso_id");

$db->SetFetchMode(ADODB_FETCH_ASSOC);

$rs_suceso = $db->Execute($query_suceso);

$fecha_suceso = normaliza($rs_suceso->Fields('fecha_suceso'));
//$fecha_suceso = $rs_suceso->Fields('fecha_suceso');
$delito_id = $rs_suceso->Fields('delito_id');
$delito_detalle_id = $rs_suceso->Fields('delito_detalle_id');
$titulo = $rs_suceso->Fields('titulo');
$fuente = $rs_suceso->Fields('fuente');
$otra_fuente1 = $rs_suceso->Fields('otra_fuente1');
$otra_fuente2 = $rs_suceso->Fields('otra_fuente2');
$nombre_victima = $rs_suceso->Fields('nombre_victima');
$sexo = $rs_suceso->Fields('sexo');
$edad = $rs_suceso->Fields('edad');
$tipo_arma = $rs_suceso->Fields('tipo_arma');
$estado = $rs_suceso->Fields('estado');
$municipio_id = $rs_suceso->Fields('municipio_id');
$parroquia_id = $rs_suceso->Fields('parroquia_id');
$sector = $rs_suceso->Fields('sector');
$usuario = $rs_suceso->Fields('usuario');

$query_delitos = $db->Prepare("SELECT delito_id, descripcion
					FROM delitos");

$query_delitos_deta = $db->Prepare("SELECT delito_detalle_id, delito_id, descripcion
					FROM delitos_detalles");
					
$query_municipios = $db->Prepare("SELECT municipio_id, descripcion, estado_id
					FROM municipios
					WHERE estado_id = 7");
//$query_parroquias = $db->Prepare("SELECT parroquia_id, descripcion FROM parroquias WHERE estado_id= 7");
$query_parroquias = $db->Prepare("SELECT parroquia_id, descripcion FROM parroquias WHERE estado_id= 7 AND municipio_id = $municipio_id");
					
$rs_delitos = $db->Execute($query_delitos);
$rs_delitos_deta = $db->Execute($query_delitos_deta);
$rs_municipios = $db->Execute($query_municipios);
$rs_parroquias = $db->Execute($query_parroquias);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Formulario Modificacion de un Suceso</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS and bootstrap datepicker CSS used for styling -->
      
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
					<label class="control-label col-xs-2" for="usuario">Usuario:</label>
					<div class="col-xs-3">
						<input class="form-control input-sm" name="usuario" id="usuario" type="text" value="<?php echo $usuario; ?>">
					</div>
				</div>


				<div class="form-group">
					<label class="control-label col-xs-2" for="delito">Delito:</label>
					<div class="col-xs-4">
						<select class="form-control input-sm" name="delito_id" id="delito_id" onchange="carga_deta_delito($('#delito_id').val());return false;">
							<option selected value="0" >Seleccione</option>
							<?php while(!$rs_delitos->EOF){  
							
								if ($rs_delitos->Fields('delito_id') == $delito_id) {
									//Selecciona este registro
									echo "\t<option value=\"" . $rs_delitos->Fields('delito_id') . "\" selected=\"selected\">" . $rs_delitos->Fields('descripcion') ."</option>\n"; 
								}else{ ?>
								<option value="<?php echo $rs_delitos->Fields('delito_id'); ?>"><?php echo $rs_delitos->Fields('descripcion'); ?></option>
								<?php 
								}
							$rs_delitos->MoveNext();
							} //fin while	
						$rs_delitos->MoveFirst();?>
					  </select>
					</div>
				
					<label class="control-label col-xs-2" for="detalle_delito">Detalle:</label>
					<div class="col-xs-4">
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
							$rs_delitos_deta->MoveFirst();?>
						</select>
					</div>
				</div>

	            
                <div class="form-group"><label for="titulo">Titulo:</label>
	              	<input class="form-control" name="titulo" id="titulo" value="<?php echo $titulo; ?>" type="text">
			    </div>
			    <div class="clear"></div>
                
               <div class="form-group"><label for="fuente">Fuente:</label>
	              	<input class="form-control" name="fuente" id="fuente" value="<?php echo $fuente; ?>" type="text" >
			    </div>
			    <div class="clear"></div>
				
				<div class="form-group"><label for="fuente">Otra Fuente1:</label>
	              	<input class="form-control" name="otra_fuente1" id="otra_fuente1" value="<?php echo $otra_fuente1; ?>" type="text" >
			    </div>
			    <div class="clear"></div>
				
				<div class="form-group"><label for="fuente">Otra Fuente2:</label>
	              	<input class="form-control" name="otra_fuente1" id="otra_fuente2" value="<?php echo $otra_fuente2; ?>" type="text" >
			    </div>
			    <div class="clear"></div>
                
                <div class="form-group"><label for="municipio">Municipio</label>
	              <select class="form-control input-sm" name="municipio" id="municipio" onchange="carga_parroquia($('#municipio').val());return false;">>
					<option selected value="0" >Seleccione</option>
					<?php while(!$rs_municipios->EOF){ 
					if ($rs_municipios->Fields('municipio_id') == $municipio_id) {
						//Selecciona este registro
						echo "\t<option value=\"" . $rs_municipios->Fields('$municipio_id') . "\" selected=\"selected\">" . $rs_municipios->Fields('descripcion') ."</option>\n"; 
			 	  	}else{
					?>
					<option value="<?php echo $rs_municipios->Fields('municipio_id'); ?>"><?php echo $rs_municipios->Fields('descripcion'); ?></option>
					<?php }$rs_municipios->MoveNext();
					}	
					$rs_municipios->MoveFirst();?>
				  </select>
	            </div>
	            
	            <div class="form-group">
	              <label for="parroquia">Parroquia</label>
	              <select class="form-control input-sm" name="parroquia" id="parroquia">
					<option selected value="0" >Seleccione</option>
					<?php while(!$rs_parroquias->EOF){ 
						if ($rs_parroquias->Fields('parroquia_id') == $parroquia_id) {
							//Selecciona este registro
							echo "\t<option value=\"" . $rs_parroquias->Fields('parroquia_id') . "\" selected=\"selected\">" . $rs_parroquias->Fields('descripcion') ."</option>\n"; 
						}else{
						?>
						<option value="<?php echo $rs_parroquias->Fields('parroquia_id'); ?>"><?php echo $rs_parroquias->Fields('descripcion'); ?></option>
						<?php 
						} 
					$rs_parroquias->MoveNext();
					}	
					$rs_parroquias->MoveFirst();?>
				  </select>
	            </div>
	            <div class="clear"></div>
                
                <div class="form-group">
			    	<label for="focusedInput">Nombre victima:</label>
	              	<input class="form-control" name="nombre_victima" id="nombre_victima" value="<?php echo $nombre_victima; ?>" type="text">
			    </div>
			    <div class="clear"></div>
                
                <div class="form-group">
	              <label for="sexo">Sexo</label>
	              <select class="form-control input-sm" id="sexo" name="sexo" >
	                <option selected value="0" >Seleccione</option>
                    <?php if ($sexo=="M") { ?>
					<option selected= "selected">M</option>
	                <?php }else{ ?>
					<option selected= "selected">F</option>
					<?php }?>
	              </select>
	            
				</div>
                
                <div class="form-group">
	              <label for="focusedInput">Edad:</label>
	              <input class="form-control" name="edad" id="edad" value="<?php echo $edad; ?>" type="text">
	            </div>
                
                <div class="form-group">
	              <label for="tipo_arma">Tipo Arma</label>
	              <select class="form-control input-sm" id="tipo_arma" name="tipo_arma" >
	                <option selected value="0" >Seleccione</option>
                    <?php if ($tipo_arma=="1") { ?>
					<option selected= "selected">1</option>
	                <?php }else{ ?>
					<option selected= "selected">2</option>
					<?php }?>
	              </select>
	            </div>
                <div class="clear"></div>
                
                <div class="form-group">
	              <label for="focusedInput">Latitud:</label>
	              <input class="form-control" name="latitud" id="latitud" type="text">
	            </div>
                
                <div class="form-group">
	              <label for="focusedInput">Longitud:</label>
	              <input class="form-control" name="longitud" id="longitud" type="text">
	            </div>
                <div class="clear"></div>
                
                <div class="form-group">
			    	<label for="focusedInput">Sector:</label>
	              	<input class="form-control" name="sector" id="sector" value="<?php echo $sector; ?>" type="text">
			    </div>
			    <div class="clear"></div>
                
                <div class="form-group">
	              <label for="focusedInput">Ingresado por:</label>
	              <input class="form-control" name="usuario" id="usuario" value="<?php echo $usuario; ?>" type="text">
	            </div>
                <div class="clear"></div>
               
	            <div class="form-group">
		             <div class="row">
			            <div class="col-sm-3 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary">Modificar</button>
			            </div>
					</div>
				</div>
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
					var dataString = 'fecha='+$('#fecha').val()+'&suceso_id='+$('#suceso_id').val()+'&delito_id='+$("select#delito_id").val()+'&delito_detalle_id='
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