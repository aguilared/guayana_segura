<?php
	include_once 'includes/db_connect.php';
	include_once 'includes/functions.php';
	include_once 'connections/guayana_s.php';

	$conexion=new Conexion();
	$db=$conexion->getDbConn();
	$db->debug = false;
	$db->SetFetchMode(ADODB_FETCH_ASSOC);
	$muni_id = 3;
	$delito_deta = 7;
	$query_sucesos = $db->Prepare("SELECT COUNT(fecha_suceso) AS tot_homi_mes, YEAR(now()) AS ano, MONTH(now()) AS mes,
		MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH))AS mes_ant
		FROM sucesos AS s
		WHERE YEAR(fecha_suceso) = YEAR(now()) AND MONTH(fecha_suceso) = MONTH(now()) AND municipio_id = $muni_id AND delito_detalle_id = $delito_deta");
	$rs_sucesos = $db->Execute($query_sucesos);

	$tot_homi_car_mes = $rs_sucesos->Fields('tot_homi_mes');
	$ano = $rs_sucesos->Fields('ano');
	$mes = $rs_sucesos->Fields('mes');
	$mes_ant = $rs_sucesos->Fields('mes_ant');

	$query_homi_ano = $db->Prepare("SELECT COUNT(fecha_suceso) AS tot_homi_ano, MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH))AS mes_ant
		FROM sucesos AS s
		WHERE YEAR(fecha_suceso) = YEAR(now()) AND municipio_id = $muni_id AND delito_detalle_id = $delito_deta");
	$rs_homi_ano = $db->Execute($query_homi_ano);
	$tot_homi_ano = $rs_homi_ano->Fields('tot_homi_ano');

	$sucesos = top_sucesos(); //array de Top sucesos
	//print_r ($sucesos)."<BR>";
	//echo json_encode($sucesos)."<BR>";
	$suceso1 = $sucesos[0]['suceso_id'];
	$suceso2 = $sucesos[1]['suceso_id'];
	$suceso3 = $sucesos[2]['suceso_id'];
	$suceso4 = $sucesos[3]['suceso_id'];
	$suceso5 = $sucesos[4]['suceso_id'];
	$suceso6 = $sucesos[5]['suceso_id'];
	$suceso7 = $sucesos[6]['suceso_id'];
	$suceso8 = $sucesos[7]['suceso_id'];
	$titulo1 = $sucesos[0]['titulo'];
	$titulo2 = $sucesos[1]['titulo'];
	$titulo3 = $sucesos[2]['titulo'];
	$titulo4 = $sucesos[3]['titulo'];
	$titulo5 = $sucesos[4]['titulo'];
	$titulo6 = $sucesos[5]['titulo'];
	$titulo7 = $sucesos[6]['titulo'];
	$titulo8 = $sucesos[7]['titulo'];
	$fecha_suceso1 = $sucesos[0]['fecha_suceso'];
	$fecha_suceso2 = $sucesos[1]['fecha_suceso'];
	$fecha_suceso3 = $sucesos[2]['fecha_suceso'];
	$fecha_suceso4 = $sucesos[3]['fecha_suceso'];
	$fecha_suceso5 = $sucesos[4]['fecha_suceso'];
	$fecha_suceso6 = $sucesos[5]['fecha_suceso'];
	$fecha_suceso7 = $sucesos[6]['fecha_suceso'];
	$fecha_suceso8 = $sucesos[7]['fecha_suceso'];
	$fuente1 = $sucesos[0]['fuente'];
	$fuente2 = $sucesos[1]['fuente'];
	$fuente3 = $sucesos[2]['fuente'];
	$fuente4 = $sucesos[3]['fuente'];
	$fuente5 = $sucesos[4]['fuente'];
	$fuente6 = $sucesos[5]['fuente'];
	$fuente7 = $sucesos[6]['fuente'];
	$fuente8 = $sucesos[7]['fuente'];

	$fecha_titulo1 = normaliza($fecha_suceso1)." ".$titulo1;
	$fecha_titulo2 = normaliza($fecha_suceso2)." ".$titulo2;
	$fecha_titulo3 = normaliza($fecha_suceso3)." ".$titulo3;

	//$tot_homi_car_mes = tot_homi_caroni_mes();
	//print_r ($tot_homi_car_mes)."<BR>";
	//$tot_homi_car_mes = $tot_homi_car_mes[0]['tot_homi_mes'];
	//$ano = $tot_homi_car_mes[0]['ano'];
	//$mes = $tot_homi_car_mes[0]['mes'];

	$tot_homi_car_mes_ant = tot_homi_caroni_mes_ant();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Guayana Segura</title>
		<meta charset="utf-8">
		<meta name="description" content="Bitacora de Sucesos en Ciudad Guayana y alrededores">
		<meta name="author" content="aguilared">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link href="css/menu.css" rel="stylesheet" id="menu-css">
		<link rel="stylesheet" href="css/main.css">
		<link href="css/bootstrap-social.css" rel="stylesheet" id="bootstrap-social">
		<link href="css/font-awesome.css" rel="stylesheet">

	</head>

	<body>


		<div class="container-fluid">
			<div class="row">
				<div class="main-image">
					<div class="greeting">
						<img src="images/logo.jpg" class="img-responsive" />
						<div class="quienes-somos">
						  <h3>¡Bienvenidos al sitio Web Guayana Segura!</h3>
						  <h5>Bitacora de Sucesos de Ciudad Guayana y sus alrededores!</h5>
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
				  <a class="navbar-brand" href="#">Guayana Segura</a>
				</div>

				<div class="collapse navbar-collapse js-navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="dropdown mega-dropdown">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown">CONSULTAS<span class="glyphicon glyphicon-chevron-down pull-right"></span></a>

							<ul class="dropdown-menu mega-dropdown-menu row">


								<li class="col-sm-4">
									<ul>
										<li class="dropdown-header">Sucesos</li>
										<li><a href="sucesos/lis_sucesos.php" target="_blank">Bolivar</a></li>
										<li><a href="sucesos/lis_sucesos_caro.php" target="_blank">Caroni</a></li>
										<li><a href="sucesos/lis_sucesos_con_ano.php?ano=2016" target="_blank">2016 Bolivar</a></li>
										<li><a href="sucesos/lis_sucesos_con_ano_caro.php?ano=2016" target="_blank">2016 Caroni</a></li>
										<li><a href="sucesos/lis_sucesos_con_ano.php?ano=2015" target="_blank">2015 Bolivar</a></li>
										<li><a href="sucesos/lis_sucesos_con_ano_caro.php?ano=2015" target="_blank">2015 Caroni</a></li>
										<li class="divider"></li>
									</ul>
								</li>

								<li class="col-sm-4">
								  <ul>
									<li class="dropdown-header">Homicidios</li>
									<li><a href="sucesos/lis_homicidios.php" target="_blank">Bolivar</a></li>
									<li><a href="sucesos/lis_homicidios_caro.php" target="_blank">Caroni</a></li>
									<li><a href="sucesos/lis_homicidios_con_ano.php?ano=2016" target="_blank">2016 Bolivar</a></li>
									<li><a href="sucesos/lis_homicidios_con_ano_caro.php?ano=2016" target="_blank">2016 Caroni</a></li>
									<li><a href="sucesos/lis_homicidios_con_ano.php?ano=2015" target="_blank">2015 Bolivar</a></li>
									<li><a href="sucesos/lis_homicidios_con_ano_caro.php?ano=2015" target="_blank">2015 Caroni</a></li>
									<li class="divider"></li>

								  </ul>
								</li>
								<li class="col-sm-4">
								  <ul>
									<li class="dropdown-header">Historico Homicidios</li>
									<li><a href="sucesos_histo/lis_sucesos_histo.php" target="_blank">Totales Historico</a></li>
									<li><a href="#">--</a></li>
									<li class="divider"></li>
								  </ul>
								</li>
							</ul>

						</li>
					</ul>

					<ul class="nav navbar-nav">
						<li><a href="recomendaciones/recomendacion_hogar.html" class="ampliar">RECOMENDACIONES</a>
						</li>

					</ul>

					<ul class="nav navbar-nav">
						<li><a href="recomendaciones/about.html" class="ampliar">ABOUT</a></li>
					</ul>

				</div><!-- /.nav-collapse -->

			</nav>   <!-- Fin menu -->

			<div class="row">   <!-- Cuerpo -->
				<div class="col-xs-4">
					<div class="panel panel-primary">

						<div class="panel-heading">News</div>
						<div class="panel-body">
							<!-- Carrousel -->
							<div id="myCarousel" class="carousel slide" data-ride="carousel">
							  <div class="carousel-inner">
								<div class="item active">
								  <img src="img/<?php echo $suceso1?>.jpg" class="img-responsive ampliar " alt="suceso 1">
								  <a href="<?php echo $fuente1;?>" target="_blank"><h4><small><?php echo $fecha_titulo1;?></small></h4></a>
								  <button href="sucesos/suceso_.php?suceso_id=<?php echo $suceso1?>" class="btn ampliar" type="button">Ver</button>
								</div><!-- End Item -->
								<div class="item">
								  <img src="img/<?php echo $suceso2?>.jpg" class="img-responsive" alt="suceso 2">
								  <a href="<?php echo $fuente2;?>" target="_blank"><h4><small><?php echo $fecha_titulo2;?></small></h4></a>
								  <button href="sucesos/suceso_.php?suceso_id=<?php echo $suceso2?>" class="btn ampliar" type="button">Ver</button>
								</div><!-- End Item -->
								<div class="item">
								  <img src="img/<?php echo $suceso3?>.jpg" class="img-responsive" alt="suceso">
								  <a href="<?php echo $fuente3;?>" target="_blank"><h4><small><?php echo $fecha_titulo3;?></small></h4></a>
								  <button href="sucesos/suceso_.php?suceso_id=<?php echo $suceso3?>" class="btn ampliar" type="button">Ver</button>
								</div><!-- End Item -->
							  </div>
							</div><!-- End Carousel Inner -->

						</div>
					</div>
				</div>

				<div class="col-xs-8">
					<div class="panel panel-primary">
						<div class="panel-heading">Mapa Distribucion Acumulada de homicidios por Parroquias,
							Municipio Caroni, Mes Actual = <a href="sucesos/lis_homicidios_con_ano_mes_caro.php?ano=<?php echo $ano;?>&mes=<?php echo $mes;?>" class = "btn-warning" target="blank"><?php echo $tot_homi_car_mes;?>,</a>
							Mes Anterior = <a href="sucesos/lis_homicidios_con_ano_mes_caro.php?ano=<?php echo $ano;?>&mes=<?php echo $mes_ant;?>" class = "btn-warning" target="blank"><?php echo $tot_homi_car_mes_ant;?></a>
							<a href="maps/parroquias_caroni_modal.php?" target="_blank" class="btn-warning" type="button">Maps mes anterior</a>. Este A&ntilde;o: <?php echo $tot_homi_ano;?>
						</div>
						<div class="panel-body" id="link-map">
							<?php include 'maps/parroquias_caroni__.php'; ?>
						</div>
					</div>
				</div>



			</div>

			<!--   Listado News fila 1-->
			<div class="row">
				<div class="col-xs-3">
					<div class="panel panel-primary">
						<div class="panel-body altosuceso">
							<div class="col-xs-12 col-md-12"><label>Fecha:</label> <?php echo normaliza($fecha_suceso1);?></div>
							<a href="sucesos/suceso_no_modal.php?suceso_id=<?php echo $suceso1?>" target="_blank"><img src="img/<?php echo $suceso1?>.jpg" class="img-responsive" alt="suceso 2"></a>
  						  	<a href="<?php echo $fuente1;?>" target="_blank"><h4><small><?php echo $titulo1;?></small></h4></a>
						</div>
					</div>
				</div>


				<div class="col-xs-3">
					<div class="panel panel-primary">
						<div class="panel-body altosuceso">
							<div class="col-xs-12 col-md-12"><label>Fecha:</label> <?php echo normaliza($fecha_suceso2);?></div>
							<a href="sucesos/suceso_no_modal.php?suceso_id=<?php echo $suceso2?>" target="_blank"><img src="img/<?php echo $suceso2?>.jpg" class="img-responsive" alt="suceso 2"></a>
  						  	<a href="<?php echo $fuente2;?>" target="_blank"><h4><small><?php echo $titulo2;?></small></h4></a>
						</div>
					</div>
				</div>

				<div class="col-xs-3">
					<div class="panel panel-primary">
						<div class="panel-body altosuceso">
							<div class="col-xs-12 col-md-12"><label>Fecha:</label> <?php echo normaliza($fecha_suceso3);?></div>
							  <a href="sucesos/suceso_no_modal.php?suceso_id=<?php echo $suceso3?>" target="_blank"><img src="img/<?php echo $suceso3?>.jpg" class="img-responsive" alt="suceso"></a>
							  <a href="<?php echo $fuente3;?>" target="_blank"><h4><small><?php echo $titulo3;?></small></h4></a>
						</div>

					</div>
				</div>

				<div class="col-xs-3">
					<div class="panel panel-primary">
						<div class="panel-body altosuceso">
							<div class="col-xs-12 col-md-12"><label>Fecha:</label> <?php echo normaliza($fecha_suceso4);?></div>
							  <a href="sucesos/suceso_no_modal.php?suceso_id=<?php echo $suceso4?>" target="_blank"><img src="img/<?php echo $suceso4?>.jpg" class="img-responsive" alt="suceso"></a>
							  <a href="<?php echo $fuente4;?>" target="_blank"><h4><small><?php echo $titulo4;?></small></h4></a>
						</div>

					</div>
				</div>

			</div>

			<!--   Listado News fila 2-->
			<div class="row">
				<div class="col-xs-3">
					<div class="panel panel-primary">
						<div class="panel-body altosuceso">
							<div class="col-xs-12 col-md-12"><label>Fecha:</label> <?php echo normaliza($fecha_suceso5);?></div>
							<a href="sucesos/suceso_no_modal.php?suceso_id=<?php echo $suceso5?>" target="_blank"><img src="img/<?php echo $suceso5?>.jpg" class="img-responsive" alt="suceso 2"></a>
							  	<a href="<?php echo $fuente5;?>" target="_blank"><h4><small><?php echo $titulo5;?></small></h4></a>
						</div>
					</div>
				</div>


				<div class="col-xs-3">
					<div class="panel panel-primary">
						<div class="panel-body altosuceso">
							<div class="col-xs-12 col-md-12"><label>Fecha:</label> <?php echo normaliza($fecha_suceso6);?></div>
							<a href="sucesos/suceso_no_modal.php?suceso_id=<?php echo $suceso6?>" target="_blank"><img src="img/<?php echo $suceso6?>.jpg" class="img-responsive" alt="suceso 2"></a>
							  	<a href="<?php echo $fuente6;?>" target="_blank"><h4><small><?php echo $titulo6;?></small></h4></a>
						</div>
					</div>
				</div>

				<div class="col-xs-3">
					<div class="panel panel-primary">
						<div class="panel-body altosuceso">
							<div class="col-xs-12 col-md-12"><label>Fecha:</label> <?php echo normaliza($fecha_suceso7);?></div>
							  <a href="sucesos/suceso_no_modal.php?suceso_id=<?php echo $suceso7?>" target="_blank"><img src="img/<?php echo $suceso7?>.jpg" class="img-responsive" alt="suceso"></a>
							  <a href="<?php echo $fuente7;?>" target="_blank"><h4><small><?php echo $titulo7;?></small></h4></a>
						</div>

					</div>
				</div>

				<div class="col-xs-3">
					<div class="panel panel-primary">
						<div class="panel-body altosuceso">
							<div class="col-xs-12 col-md-12"><label>Fecha:</label> <?php echo normaliza($fecha_suceso8);?></div>
							  <a href="sucesos/suceso_no_modal.php?suceso_id=<?php echo $suceso8?>" target="_blank"><img src="img/<?php echo $suceso8?>.jpg" class="img-responsive" alt="suceso"></a>
							  <a href="<?php echo $fuente8;?>" target="_blank"><h4><small><?php echo $titulo8;?></small></h4></a>
						</div>

					</div>
				</div>

			</div>


			<div class="row">
				<div class="col-xs-12"><?php include 'sucesos/acumu_homicidios.php'; ?></div>
			</div>

			<div class="row">
				<div class="col-xs-12"><?php include 'sucesos/lis_homicidios_caro_.php'; ?></div>
			</div>

			<div class="row">
				<div class="col-xs-1 col-md-1">&nbsp;</div>
				<div class="col-md-10 col-md-10 mensaje alert alert-warning" style="font-size:13px;">
					<i class="fa fa-exclamation-triangle fa-lg"></i> <strong>¡Advertencia!</strong>
					Los datos y ubicaciónes mostrados son solo referenciales. No garantizamos la exactitud de estos.
					Son recopilados desde varios periodicos regionales.<BR>
					Sitio Web en continuo desarrollo. A la fecha es un prototipo. Al hacer click en unos de los iconos de las parroquias se mostrara un listado mas detallado.
					guayanasegura@gmail.com
				</div>
				<div class="col-xs-1 col-md-1">&nbsp;</div>
			</div>

			<div class="ajaxcont"></div>


		</div><!-- /.container -->

		<script src="js/jquery.min.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<script type="text/javascript">
			jQuery(document).on('click', '.mega-dropdown', function(e) {
				e.stopPropagation()
			})
		</script>
		<script>
			$(".ampliar").click(function(e){
				//quita la ejecucion regular
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


	</body>
</html>
