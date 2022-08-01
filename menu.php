<?php
	include_once 'includes/db_connect.php';
	include_once 'includes/functions.php';
 	sec_session_start();
	$nivel = $_SESSION['nivel']; //echo "nivel".$nivel;
	echo $nivel."<BR>";		
		$sucesos = top_sucesos(); //array de Top sucesos
		$suceso1 = $sucesos[0]['suceso_id'];
		$suceso2 = $sucesos[1]['suceso_id'];
		$suceso3 = $sucesos[2]['suceso_id'];
		$titulo1 = $sucesos[0]['titulo'];
		$titulo2 = $sucesos[1]['titulo'];
		$titulo3 = $sucesos[2]['titulo'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex">
    <title>Guayana Segura - Menu Principal </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link href="css/menu.css" rel="stylesheet" id="menu-css">
</head>
<body>

<?php if (login_check($mysqli) == true && $_SESSION['nivel'] ==1) : ?>

	<div class="container">
		<?php 
			$nivel = $_SESSION['nivel']; //echo "nivel".$nivel;
			
			$sucesos = top_sucesos(); //array de Top sucesos
			$suceso1 = $sucesos[0]['suceso_id'];
			$suceso2 = $sucesos[1]['suceso_id'];
			$suceso3 = $sucesos[2]['suceso_id'];
			$titulo1 = $sucesos[0]['titulo'];
			$titulo2 = $sucesos[1]['titulo'];
			$titulo3 = $sucesos[2]['titulo'];
		?>
		
		<div class="row">
			<div class="col-md-11 col-sm-11  col-xs-11 titulo">
				<h1 class="text-center text-primary">Guayana Segura - Menu Principal</h1>
			</div>
			<div class="col-md-1 col-sm-1  col-xs-1 titulo">
				<a href="index.php">Logout</a>
			</div>
		</div>
		
		<nav class="navbar navbar-default">
		    
			<div class="navbar-header">
		      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
		        <span class="sr-only">Toggle navigation</span>
		        
		      </button>
		      <a class="navbar-brand" href="#">INICIO</a>
		    </div>

		    <div class="collapse navbar-collapse js-navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="dropdown mega-dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown">CONSULTAS<span class="glyphicon glyphicon-chevron-down pull-right"></span></a>

					  <ul class="dropdown-menu mega-dropdown-menu row">
						<li class="col-sm-3">
						  <ul>
							<li class="dropdown-header">News</li>
							<div id="myCarousel" class="carousel slide" data-ride="carousel">
							  <div class="carousel-inner">
								<div class="item active">
								  <a href="sucesos/suceso_.php?suceso_id=<?php echo $suceso1?>" target="_blank"><img src="img/<?php echo $suceso1?>.jpg" class="img-responsive ampliar " alt="product 1"></a>
								  <h4><small><?php echo $titulo1;?></small></h4>
								  <a href="sucesos/suceso_.php?suceso_id=<?php echo $suceso1?>" class="btn ampliar" type="button">Ver</a>
								</div>
								<!-- End Item -->
								<div class="item">
								  <a href="sucesos/suceso_.php?suceso_id=<?php echo $suceso2?>" target="_blank"><img src="img/<?php echo $suceso2?>.jpg" class="img-responsive" alt="product 2"></a>
								  <h4><small><?php echo $titulo2;?></small></h4>
								  <button href="sucesos/suceso_.php?suceso_id=<?php echo $suceso2?>" class="btn ampliar" type="button">Ver</button>
								</div>
								<!-- End Item -->
								<div class="item">
								  <a href="sucesos/suceso_.php?suceso_id=<?php echo $suceso3?>" target="_blank"><img src="img/<?php echo $suceso3?>.jpg" class="img-responsive" alt="product 3"></a>
								  <h4><small><?php echo $titulo3;?></small></h4>
								  <button href="sucesos/suceso_.php?suceso_id=<?php echo $suceso3?>" class="btn ampliar" type="button">Ver</button>
								</div>
								<!-- End Item -->
							  </div>
							  <!-- End Carousel Inner -->
							</div>
						  </ul>
						</li>
						
						<li class="col-sm-3">
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
						
						<li class="col-sm-3">
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
						<li class="col-sm-3">
						  <ul>
							<li class="dropdown-header">Historico Homicidios</li>
							<li><a href="sucesos_histo/lis_sucesos_histo.php" target="_blank">Totales Historico</a></li>
							<li><a href="#">--</a></li>
							<li><a href="#">--</a></li>
							<li class="divider"></li>
						  </ul>
						</li>
					  </ul>

					</li>
				</ul>
			
				<ul class="nav navbar-nav">	
					<li class="dropdown mega-dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown">ADMINISTRACION<span class="glyphicon glyphicon-chevron-down pull-right"></span></a>

					  <ul class="dropdown-menu mega-dropdown-menu row">
						
						<li class="col-sm-3">
						  <ul>
							<li class="dropdown-header">News</li>
							<div id="myCarousel" class="carousel slide" data-ride="carousel">
							  <div class="carousel-inner">
								<div class="item active">
								  <a href="sucesos/suceso.php?suceso_id=<?php echo $suceso1?>" target="_blank"><img src="img/<?php echo $suceso1?>.jpg" class="img-responsive ampliar " alt="product 1"></a>
								  <h4><small><?php echo $titulo1;?></small></h4>
								  <a href="sucesos/sucesos.php?suceso_id=<?php echo $suceso1?>" class="btn ampliar" type="button">Ver</a>
								</div>
								<!-- End Item -->
								<div class="item">
								  <a href="sucesos/suceso.php?suceso_id=<?php echo $suceso2?>" target="_blank"><img src="img/<?php echo $suceso2?>.jpg" class="img-responsive" alt="product 2"></a>
								  <h4><small><?php echo $titulo2;?></small></h4>
								  <button href="sucesos/sucesos.php?suceso_id=<?php echo $suceso2?>" class="btn ampliar" type="button">Ver</button>
								</div>
								<!-- End Item -->
								<div class="item">
								  <a href="sucesos/suceso.php?suceso_id=<?php echo $suceso3?>" target="_blank"><img src="img/<?php echo $suceso3?>.jpg" class="img-responsive" alt="product 3"></a>
								  <h4><small><?php echo $titulo3;?></small></h4>
								  <button href="sucesos/sucesos.php?suceso_id=<?php echo $suceso3?>" class="btn ampliar" type="button">Ver</button>
								</div>
								<!-- End Item -->
							  </div>
							  <!-- End Carousel Inner -->
							</div>
						  </ul>
						</li>
						
						<li class="col-sm-3">
						  <ul>
							<li class="dropdown-header">Sucesos</li>
							<li><a href="sucesos/" target="_blank">Listado completo</a></li> 
							<li><a href="sucesos/lis_sucesos_con_ano.php?ano=2016" target="_blank">2016</a></li>
							<li><a href="sucesos/lis_sucesos_con_ano.php?ano=2015" target="_blank">2015</a></li>
							<li><a href="#">--</a></li>
							<li><a href="#">--</a></li>
							<li class="divider"></li>
						  </ul>
						</li>
						<li class="col-sm-3">
						  <ul>
							<li class="dropdown-header">Homicidios</li>
							<li><a href="sucesos/lis_homicidios.php" target="_blank">Listado Completo</a></li>
							<li><a href="sucesos/lis_homicidios_con_ano.php?ano=2016" target="_blank">2016</a></li>
							<li><a href="sucesos/lis_homicidios_con_ano.php?ano=2015" target="_blank">2015</a></li>
							<li class="divider"></li>
						  </ul>
						</li>
						<li class="col-sm-3">
						  <ul>
							<li class="dropdown-header">Historico Homicidios</li>
							<li><a href="sucesos_histo/" target="_blank">Historico</a></li>
							<li><a href="#">--</a></li>
							<li><a href="#">--</a></li>
							<li class="divider"></li>
						  </ul>
						</li>

					  </ul>

					</li>
					
				</ul>

		    </div>
		    <!-- /.nav-collapse -->
		</nav>
		<div class="ajaxcont"></div>
		
		<div class="col-md-1 col-sm-1  col-xs-1">&nbsp;</div>
		<div class="col-md-10 col-sm-10  col-xs-10 titulo"><?php include 'maps/parroquias_caroni_.php'; ?></div>
		<div class="col-md-1 col-sm-1  col-xs-1">&nbsp;</div>
		<div class="col-md-10 col-sm-10  col-xs-10 mensaje alert alert-warning" style="font-size:13px;">
			<i class="fa fa-exclamation-triangle fa-lg"></i> <strong>¡Advertencia!</strong> 
			Las ubicaciónes y datos representadas en este mapa son solo referenciales. No garantizamos la exactitud de estas. 
			Son recopilaciones de Prensas Regionales 
		</div>
	
	</div>
			
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

	<?php else : ?>
		<p><span class="error">No está autorizado para acceder a esta página.</span> Please <a href="index1.php">login</a>.</p>
	<?php endif; ?>

</body>
</html>
