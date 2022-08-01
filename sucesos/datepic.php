<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Administracion de Sucesos</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/datepicker.css">
	</head>
	<body>
		<div class="panel panel-primary">
			<div class="panel-heading">Ingreso de un Suceso
				<button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
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
			</form>
		</div>
	</body>
	
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery-ui.js"></script>
	<script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>

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

</html>

