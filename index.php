<?php
	include_once 'includes/db_connect.php';
	include_once 'includes/functions.php';
	include_once 'connections/guayana_s.php';

	$conexion  = new Conexion();
	$db        = $conexion->getDbConn();
	$db->debug = false;
	$db->SetFetchMode(ADODB_FETCH_ASSOC);
	$db->query("SET NAMES 'utf8'");
	$site          = "Venezuela Segura";
	$muni_id       = 3;
	$muni_descri   = "Caroni";
	$estado_descri = "Bolivar";
	$delito_deta   = 7;
	$today         = date("d-m-Y");
	
	$skip = 0;
	$top  = 6; //  items en carrousel
	$ano = ano_act();
	$mes = mes_act();
	$mes_letras = mes__($mes);
	$sql_sucesos = "SELECT suceso_id, fecha_suceso As fecha_suceso, delito_id, delito_detalle_id, titulo, nombre_victima, fuente,
			m.descripcion AS municipio, p.descripcion AS parroquia
			FROM sucesos As s
			INNER JOIN municipios AS m ON s.municipio_id = m.municipio_id
			INNER JOIN parroquias AS p ON s.parroquia_id = p.parroquia_id
			ORDER BY fecha_suceso DESC
			LIMIT " . $skip . ", " . $top;

	if (!$result = mysqli_query($mysqli, $sql_sucesos)) {
			die();
	}
	//si la conexión cancelar programa

	$rawdata = array(); //creamos un array

	//guardamos en un array multidimensional todos los datos de la consulta
	$i = 0;
	while ($row = mysqli_fetch_array($result)) {
			$rawdata[$i] = $row;
			$i++;
	}

	$rawdata = json_encode($rawdata);
	$arr     = json_decode($rawdata);

	$query_sucesos = $db->Prepare("SELECT COUNT(fecha_suceso) AS tot_homi_mes, YEAR(now()) AS ano, MONTH(now()) AS mes,
			MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH))AS mes_ant
			FROM sucesos AS s
			WHERE YEAR(fecha_suceso) = YEAR(now()) AND MONTH(fecha_suceso) = MONTH(now()) AND municipio_id = $muni_id AND delito_detalle_id = $delito_deta");
	$rs_sucesos = $db->Execute($query_sucesos);

	$tot_homi_car_mes = $rs_sucesos->Fields('tot_homi_mes');
	$ano              = $rs_sucesos->Fields('ano');
	$ano_m1           = $ano; //para link homi mes anterior
	$mes              = $rs_sucesos->Fields('mes');
	$mes_ant          = $rs_sucesos->Fields('mes_ant');

  	//solo mes 1,
	if ($mes == 1) {
			$ano_m1 = $ano - 1;
	}

	$query_homi_ano = $db->Prepare("SELECT COUNT(fecha_suceso) AS tot_homi_ano, MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH))AS mes_ant
			FROM sucesos AS s
			WHERE YEAR(fecha_suceso) = YEAR(now()) AND municipio_id = $muni_id AND delito_detalle_id = $delito_deta");
	$rs_homi_ano  = $db->Execute($query_homi_ano);
	$tot_homi_ano = $rs_homi_ano->Fields('tot_homi_ano');

	//Este para el año anterior a partir del añó 2017 ya datos en tabla sucesos del 2016
	$query_homi_ano_1 = $db->Prepare("SELECT COUNT(fecha_suceso) AS tot_homi_ano_1
			FROM sucesos AS s
			WHERE YEAR(fecha_suceso) = YEAR(now())-1 AND municipio_id = $muni_id AND delito_detalle_id = $delito_deta");
	$rs_homi_ano_1  = $db->Execute($query_homi_ano_1);
	$tot_homi_ano_1 = $rs_homi_ano_1->Fields('tot_homi_ano_1');

	//no usar en el año 2017
	//$query_homici_ano_2015 = $db->Prepare("SELECT total AS acu_ano_2015 FROM histo_homicidios WHERE ano =2015");
	//$rs_homi_ano_1 = $db->Execute($query_homici_ano_2015);
	//$tot_homi_ano_1 = $rs_homi_ano_1->Fields('acu_ano_2015');

	list($homi_car_mes_ant,$acu_mes_ant_sf, $acu_mes_ant_poz) = tot_homi_caroni_mes_ant();
  //echo "ea".$homi_car_mes_ant.$acu_mes_ant_sf. $acu_mes_ant_poz;

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Venezuela Segura - Guayana Segura</title>
		<meta charset="utf-8">
		<meta name="description" content="Bitacora de Sucesos Venezuela, Ciudad Guayana y alrededores">
		<meta name="author" content="aguilared">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link href="css/menu.css" rel="stylesheet" id="menu-css">
		<link rel="stylesheet" href="css/main.css">
		<link href="css/bootstrap-social.css" rel="stylesheet" id="bootstrap-social">
		<link href="css/font-awesome.css" rel="stylesheet">
		<style>
      
  	</style>

	</head>

	<body>

		<div class="container-fluid">
			<div class="row">
				<div class="main-image">
					<div class="greeting">
						<img src="images/logo.jpg" class="img-responsive" />
						<div class="quienes-somos">
						  <h3><?php echo $site; ?> </h3>
						  <h5>Bitacora de Sucesos: Municipio <?php echo $muni_descri ?>, Estado <?php echo $estado_descri ?>!</h5>
						</div>
						<div class="social">
							<a class="btn btn-social-icon btn-twitter" href="https://twitter.com/guayana_segura" target="_blank"><span class="fa fa-twitter"></span></a>
							<a class="btn btn-social-icon btn-facebook" ><span class="fa fa-facebook"></span></a>
							<!-- <a class="btn btn-social-icon btn-instagram" ><span class="fa fa-instagram"></span></a> -->
						</div>
					</div>


			   </div>
			</div>
		</div>

		<div class="container-fluid">
			<nav class="navbar navbar-default">

				<div class="navbar-header">
				  <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
					<span class="sr-only">Toggle navigation</span>

				  </button>
				  <a class="navbar-brand" href="/"><?php echo $site ?>  </a>
				</div>

				<div class="collapse navbar-collapse js-navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="dropdown mega-dropdown">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Consultas<span class="glyphicon glyphicon-chevron-down pull-right"></span></a>

							<ul class="dropdown-menu mega-dropdown-menu row">


								<li class="col-sm-4">
									<ul>
										<li class="dropdown-header">Sucesos</li>
										<li><a href="sucesos/lis_sucesos.php" target="_blank"><?php echo $estado_descri; ?></a></li>
										<li><a href="sucesos/lis_sucesos_caro.php" target="_blank">Caroni</a></li>
										<li><a href="sucesos/lis_sucesos_con_ano.php?ano=2016" target="_blank">2016 <?php echo $estado_descri; ?></a></li>
										<li><a href="sucesos/lis_sucesos_con_ano_caro.php?ano=2016" target="_blank">2016 Caroni</a></li>
										<li><a href="sucesos/lis_sucesos_con_ano.php?ano=2015" target="_blank">2015 <?php echo $estado_descri; ?></a></li>
										<li><a href="sucesos/lis_sucesos_con_ano_caro.php?ano=2015" target="_blank">2015 Caroni</a></li>
										<li class="divider"></li>
									</ul>
								</li>

								<li class="col-sm-4">
								  <ul>
									<li class="dropdown-header">Homicidios</li>
									<li><a href="sucesos/lis_homicidios.php" target="_blank"><?php echo $estado_descri; ?></a></li>
									<li><a href="sucesos/lis_homicidios_caro.php" target="_blank">Caroni</a></li>
									<li><a href="sucesos/lis_homicidios_con_ano.php?ano=2016" target="_blank">2016 <?php echo $estado_descri; ?></a></li>
									<li><a href="sucesos/lis_homicidios_con_ano_caro.php?ano=2016" target="_blank">2016 Caroni</a></li>
									<li><a href="sucesos/lis_homicidios_con_ano.php?ano=2015" target="_blank">2015 <?php echo $estado_descri; ?></a></li>
									<li><a href="sucesos/lis_homicidios_con_ano_caro.php?ano=2015" target="_blank">2015 Caroni</a></li>
									<li class="divider"></li>

								  </ul>
								</li>
								<li class="col-sm-4">
								  <ul>
									<li class="dropdown-header">Historico Homicidios</li>
									<li><a href="sucesos_histo/lis_sucesos_histo.php" target="_blank">Totales Historico</a></li>
									<li><a href="sucesos_histo/mas_violentas_word.html" target="_blank">Mas Violentas en el mundo</a></li>
									<li><a href="sucesos_histo/mas_violentas_vene.html" target="_blank">Mas Violentas en Venezuela</a></li>
									<li><a href="#">--</a></li>
									<li class="divider"></li>
								  </ul>
								</li>
							</ul>

						</li>
					</ul>
					<ul class="nav navbar-nav">
						<li class="dropdown mega-dropdown">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Recomendaciones<span class="glyphicon glyphicon-chevron-down pull-right"></span></a>
							<ul class="dropdown-menu mega-dropdown-menu row">
								<li class="col-sm-4">
								  <ul>
									<li><a href="recomendaciones/recomendacion_hogar.html" class="ampliar">En nuestro Hogar</a>
									<li><a href="recomendaciones/recomendacion_robo.html" class="ampliar">Al enfrentar un robo</a>
									<li class="divider"></li>
								  </ul>
								</li>
							</ul>
						</li>
					</ul>

					<ul class="nav navbar-nav">
						<li><a href="recomendaciones/telefonos.html" class="ampliar">Telefonos Autoridades</a></li>
					</ul>

					<ul class="nav navbar-nav">
						<li><a href="recomendaciones/about.html" class="ampliar">About</a></li>
					</ul>

				</div><!-- /.nav-collapse -->

			</nav>   <!-- Fin menu -->
		</div>

		<div class="container-fluid">
			<div class="row">   <!-- Cuerpo -->
				
				<div class="col-md-4">
					<div class="panel panel-primary altonews">
						<div class="panel-heading">Ultimos Sucesos a esta Fecha: <?php echo $today; ?></div>
						<div class="panel-body">
							<!-- Carrousel -->
							<div id="myCarousel" class="carousel slide" data-ride="carousel">
							  <div class="carousel-inner">

								<?php
									$rs_sucesos = $db->Execute($sql_sucesos);
									$i          = 0; //Controla el item active
									while (!$rs_sucesos->EOF) {
											$suceso1       = $rs_sucesos->Fields('suceso_id');
											$fecha_suceso1 = normaliza($rs_sucesos->Fields('fecha_suceso'));
											$titulo1       = $rs_sucesos->Fields('titulo');
											$fuente1       = $rs_sucesos->Fields('fuente');
											$fecha_titulo1 = $fecha_suceso1 . " " . $titulo1;

											if ($i == 0) { //para el primer item
								?>
								<div class="item active" id="<?php echo $i; ?>">

									<p style="width: 0;height: 0;border-style: solid;position: absolute;right: 0;top: 0;border-width: 0px 120px 110px 0;border-color: transparent #337ab7 transparent transparent;"class="noanimate"></p>
									<span style="position: absolute;right: 0;width: 51px;top: 30px;color: #FFF;font-weight: bold;font-size: 18px;">News</span>
									<a href=sucesos/suceso_no_modal.php?suceso_id="<?php echo $suceso1; ?>" target="_blank">
									<img src="img/<?php echo $suceso1 ?>.jpg" class="altoimagen1"></a>
									<a href="<?php echo $fuente1; ?>" target="_blank"><h4><small><?php echo $fecha_titulo1; ?></small></h4></a>
									<a class="btn ampliarr" href="sucesos/suceso.php?suceso_id=<?php echo $suceso1 ?>" class="btn text-center"><h4><small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ver Detallado</small></h4></a>

								</div><!-- End Item -->

							<?php //  item siguientes al 0
						    } else {
						        ?>

								<div class="item" id="<?php echo $i; ?>">
									<a href=sucesos/suceso_no_modal.php?suceso_id="<?php echo $suceso1; ?>" target="_blank">
									<img src="img/<?php echo $suceso1 ?>.jpg" class="altoimagen1"></a>
									<p style="width: 0;height: 0;border-style: solid;position: absolute;right: 0;top: 0;border-width: 0px 120px 110px 0;border-color: transparent #337ab7 transparent transparent;"class="noanimate"></p>
										<span style="position: absolute;right: 0;width: 51px;top: 30px;color: #FFF;font-weight: bold;font-size: 18px;">News</span>
									<a href="<?php echo $fuente1; ?>" target="_blank"><h4><small><?php echo $fecha_titulo1; ?></small></h4></a>
									<a class="btn ampliarr" href="sucesos/suceso.php?suceso_id=<?php echo $suceso1 ?>" class="btn text-center"><h4><small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ver Detallado</small></h4></a>

								</div><!-- End Item -->

								<?php
									} //   fin cual item
											$rs_sucesos->MoveNext();
											$i = $i + 1;
									} // while    ?>

							  </div> <!-- End Carousel Inner -->
								  <!-- Left and right controls -->
								  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
								    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								    <span class="sr-only">Previous</span>
								  </a>
								  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
								    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								    <span class="sr-only">Next</span>
								  </a>
							</div><!-- End Carousel-->
						</div>
					</div>
				</div>

				<div class="col-md-8">
					<div class="panel panel-primary altonews">
						<div class="panel-heading"><?php echo $today; ?> Mapa Acumulado de homicidios por Parroquias,
							Municipio <?php echo $muni_descri; ?>, Mes Actual = <a href="sucesos/lis_homicidios_con_ano_mes_caro.php?ano=<?php echo $ano; ?>&mes=<?php echo $mes; ?>" class = "btn-warning" target="blank"><?php echo $tot_homi_car_mes; ?>,</a>
							Mes Anterior = <a href="sucesos/lis_homicidios_con_ano_mes_caro.php?ano=<?php echo $ano_m1; ?>&mes=<?php echo $mes_ant; ?>" class = "btn-warning" target="blank"><?php echo $homi_car_mes_ant; ?></a>
							<a href="maps/parroquias_caroni_mes_ant.php?" target="_blank" class="btn-warning">Maps mes anterior</a>. Este A&ntilde;o a esta fecha van: <?php echo $tot_homi_ano; ?>. Total final en todo el A&ntilde;o Anterior: <?php echo $tot_homi_ano_1; ?>

							<a href="maps/parroquias_caroni_ano.php?" target="_blank" class="btn-warning">Maps acumulado por parroquias este A&ntilde;o</a>

						</div>
						<div class="panel-body">
							<?php include 'maps/parroquias_caroni__.php';?>
						</div>
					</div>
				</div>
			</div>
		</div>		


			<!-- paginador de sucesos-->
		<div class="container-fluid">
			<div class="row">
					<div id="miTabla"></div>
			</div>
			<div class="col-md-12 text-center">
					<ul class="pagination" id="paginador"></ul>
			</div>
			<!-- Fin paginador de sucesos-->
		</div>

		<!-- Acumulado de Homicidios por Parroquias del Mes-->
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12"><?php include 'sucesos/acumu_homicidios.php';?></div>
			</div>
		</div>

		<!-- Acumulado de Homicidios del Año  por Parroquiass -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12"><?php include 'sucesos/acumu_homicidios_parro_ano.php';?></div>
			</div>
		</div>
		
    <!--Historico de Homicidios por anos-->
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12"><?php include 'sucesos/lis_homicidios_caro_front.php';?></div>
			</div>
		</div>
				
		<!--  Graficos historicos de homicidios-->
		<div class="container-fluid altosuceso">
			<div class="row">
				<div class="col-md-10 col-md-offset-1"><?php include 'charts/acu_x_anos.html';?></div>
			</div>
		</div>
		
		

		<!--  Wheather -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-1 col-md-1">&nbsp;</div>
				<div class="col-md-10 col-md-10">
					<a href="https://www.accuweather.com/es/ve/ciudad-guayana/352288/current-weather/352288" class="aw-widget-legal">
					<!--
					By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at https://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at https://www.accuweather.com/en/privacy.
					-->
					</a><div id="awtd1503991821766" class="aw-widget-36hour"  data-locationkey="352288" data-unit="c" data-language="es" data-useip="false" data-uid="awtd1503991821766" data-editlocation="false"></div><script type="text/javascript" src="https://oap.accuweather.com/launch.js"></script>
				</div>
				<div class="col-xs-1 col-md-1">&nbsp;</div>
			</div>
		</div>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-1 col-md-1">&nbsp;</div>
				<div class="col-md-10 col-md-10 mensaje alert alert-warning" style="font-size:13px;">
					<i class="fa fa-exclamation-triangle fa-lg"></i> <strong>¡Advertencia!</strong>
					Los datos y ubicaciónes mostrados son solo referenciales. No garantizamos la exactitud de estos.
					Son recopilados desde varios periodicos regionales digitales.<BR>
					Sitio Web en continuo desarrollo. A la fecha es un prototipo. Al hacer click en unos de los iconos de las parroquias se mostrara un listado mas detallado.
					guayanasegura@gmail.com
				</div>
				<div class="col-xs-1 col-md-1">&nbsp;</div>
			</div>
		</div>
		<div class="ajaxcont"></div>

		<script src="js/jquery.min.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>

		<script type="text/javascript">
			jQuery(document).on('click', '.mega-dropdown', function(e) {
				e.stopPropagation();
			});
		</script>

		<script>
			$(".ampliarr").click(function(e){
				//quita la ejecucion regular
				e.preventDefault();
				//traigo el modal
				$.ajax({
					method: "GET",
							url: $(this).attr('href'),
				}).done(function(data) {
					//asigno todo el callback en el div "ajaxcont"
					$('.ajaxcont').html(data);

				});
			});
		</script>

		<script>
			$(".ampliar").click(function(e){
				//quita la ejecucion regular
				console.log('ya');
				e.preventDefault();
				//traigo el modal
				//alert ($(this).attr('href'));
				$.ajax({
					method: "GET",
					//url: 'http://localhost/guayana_s/sucesos/suceso.php?suceso_id=535'
					url: $(this).attr('href'),
					//url:this.getAttribute('href')
				})
				.done(function(data) {
					//asigno todo el callback en el div "ajaxcont"
					$('.ajaxcont').html(data);

				});
			});
		</script>



		<script type="text/javascript">

		var paginador;
		var totalPaginas;
		var itemsPorPagina = 8;
		var numerosPorPagina = 8;

		function creaPaginador(totalItems)
		{
			paginador = $(".pagination");

			totalPaginas = Math.ceil(totalItems/itemsPorPagina);

			$('<li><a href="#" class="first_link"><</a></li>').appendTo(paginador);
			$('<li><a href="#" class="prev_link">«</a></li>').appendTo(paginador);

			var pag = 0;
			while(totalPaginas > pag)
			{
				$('<li><a href="#" class="page_link">'+(pag+1)+'</a></li>').appendTo(paginador);
				pag++;
			}


			if(numerosPorPagina > 1)
			{
				$(".page_link").hide();
				$(".page_link").slice(0,numerosPorPagina).show();
			}

			$('<li><a href="#" class="next_link">»</a></li>').appendTo(paginador);
			$('<li><a href="#" class="last_link">></a></li>').appendTo(paginador);

			paginador.find(".page_link:first").addClass("active");
			paginador.find(".page_link:first").parents("li").addClass("active");

			paginador.find(".prev_link").hide();

			paginador.find("li .page_link").click(function()
			{
				var irpagina =$(this).html().valueOf()-1;
				cargaPagina(irpagina);
				return false;
			});

			paginador.find("li .first_link").click(function()
			{
				var irpagina =0;
				cargaPagina(irpagina);
				return false;
			});

			paginador.find("li .prev_link").click(function()
			{
				var irpagina =parseInt(paginador.data("pag")) -1;
				cargaPagina(irpagina);
				return false;
			});

			paginador.find("li .next_link").click(function()
			{
				var irpagina =parseInt(paginador.data("pag")) +1;
				cargaPagina(irpagina);
				return false;
			});

			paginador.find("li .last_link").click(function()
			{
				var irpagina =totalPaginas -1;
				cargaPagina(irpagina);
				return false;
			});

			cargaPagina(0);

		}

		function cargaPagina(pagina)
		{

			var desde = pagina * itemsPorPagina;

			$.ajax({
				data:{"param1":"dame","limit":itemsPorPagina,"offset":desde},
				type:"GET",
				dataType:"json",
				url:"paginador_data.php"
			}).done(function(data,textStatus,jqXHR){

			var lista = data.lista;
			//console.log(data.lista);
			$("#miTabla").html("");

			$.each(lista, function(ind, elem){
				var fecha = elem.fecha_suceso;
				var titulo = elem.titulo;
				var fuente = encodeURI(elem.fuente);
				$("<div class='col-md-3'><div class='panel panel-primary'><div class='panel-body altosuceso'>"+
 				"<a class='btn ampliarr' href='sucesos/suceso_no_modal.php?suceso_id="+elem.suceso_id+"' class='btn text-center' target='_blank'><img src='img/"+elem.suceso_id+".jpg' class='altoimagen'></a>"+
				"<div class='col-md-12'><a href="+fuente+" target='_blank'><h4><small>"+fecha+" "+titulo+"</small></a></div>"+
 				"</div></div></div>")
				.appendTo($("#miTabla"));

			});


			}).fail(function(jqXHR,textStatus,textError){
				alert("Error al realizar la peticion dame".textError);

			});

			if(pagina >= 1)
			{
				paginador.find(".prev_link").show();

			}
			else
			{
				paginador.find(".prev_link").hide();
			}


			if(pagina <(totalPaginas- numerosPorPagina))
			{
				paginador.find(".next_link").show();
			}else
			{
				paginador.find(".next_link").hide();
			}

			paginador.data("pag",pagina);

			if(numerosPorPagina>1)
			{
				$(".page_link").hide();
				if(pagina < (totalPaginas- numerosPorPagina))
				{
					$(".page_link").slice(pagina,numerosPorPagina + pagina).show();
				}
				else{
					if(totalPaginas > numerosPorPagina)
						$(".page_link").slice(totalPaginas- numerosPorPagina).show();
					else
						$(".page_link").slice(0).show();

				}
			}

			paginador.children().removeClass("active");
			paginador.children().eq(pagina+2).addClass("active");


		}


		$(function()
		{

			$.ajax({

				data:{"param1":"cuantos"},
				type:"GET",
				dataType:"json",
				url:"paginador_data.php"
			}).done(function(data,textStatus,jqXHR){
				var total = data.total;

				creaPaginador(total);


			}).fail(function(jqXHR,textStatus,textError){
				alert("Error al realizar la peticion cuantos".textError);

			});



		});



		</script>



		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-51645712-3', 'auto');
			ga('send', 'pageview');

		</script>

		<script>
			$(".muestra").click(function(e){
				//quita la ejecucion regular
				console.log('ya');
				e.preventDefault();
				//traigo el modal
				//alert ($(this).attr('href'));
				$.ajax({
					method: "GET",
					//url: 'http://localhost/guayana_s/sucesos/suceso.php?suceso_id=535'
					url: $(this).attr('href'),
					//url:this.getAttribute('href')
				})
				.done(function(data) {
					//asigno todo el callback en el div "ajaxcont"
					$('.ajaxcont').html(data);

				});
			});
		</script>

		<script type="text/javascript">
			$(document).ready(function(){
				$('#datatables').dataTable({
					"order": [[ 1, 'asc' ]]
				});
			})
		</script>

	</body>
</html>
