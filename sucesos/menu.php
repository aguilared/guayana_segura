<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex">

    <title>Menu Principal Guayana Segura</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
		@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700);
		body {
		  font-family: 'Open Sans', 'sans-serif';
		  background: #f0f0f0;
		  background: url(https://pcbx.us/bfjb.jpg);
		}

		h1,
		.h1 {
		  font-size: 36px;
		  text-align: center;
		  font-size: 5em;
		  color: #404041;
		}

		.navbar-nav>li>.dropdown-menu {
		  margin-top: 20px;
		  border-top-left-radius: 4px;
		  border-top-right-radius: 4px;
		}

		.navbar-default .navbar-nav>li>a {
		  width: 200px;
		  font-weight: bold;
		}

		.mega-dropdown {
		  position: static !important;
		  width: 100%;
		}

		.mega-dropdown-menu {
		  padding: 20px 0px;
		  width: 100%;
		  box-shadow: none;
		  -webkit-box-shadow: none;
		}

		.mega-dropdown-menu:before {
		  content: "";
		  border-bottom: 15px solid #fff;
		  border-right: 17px solid transparent;
		  border-left: 17px solid transparent;
		  position: absolute;
		  top: -15px;
		  left: 285px;
		  z-index: 10;
		}

		.mega-dropdown-menu:after {
		  content: "";
		  border-bottom: 17px solid #ccc;
		  border-right: 19px solid transparent;
		  border-left: 19px solid transparent;
		  position: absolute;
		  top: -17px;
		  left: 283px;
		  z-index: 8;
		}

		.mega-dropdown-menu > li > ul {
		  padding: 0;
		  margin: 0;
		}

		.mega-dropdown-menu > li > ul > li {
		  list-style: none;
		}

		.mega-dropdown-menu > li > ul > li > a {
		  display: block;
		  padding: 3px 20px;
		  clear: both;
		  font-weight: normal;
		  line-height: 1.428571429;
		  color: #999;
		  white-space: normal;
		}

		.mega-dropdown-menu > li ul > li > a:hover,
		.mega-dropdown-menu > li ul > li > a:focus {
		  text-decoration: none;
		  color: #444;
		  background-color: #f5f5f5;
		}

		.mega-dropdown-menu .dropdown-header {
		  color: #428bca;
		  font-size: 18px;
		  font-weight: bold;
		}

		.mega-dropdown-menu form {
		  margin: 3px 20px;
		}

		.mega-dropdown-menu .form-group {
		  margin-bottom: 3px;
		}
    </style>
    
</head>
<body>
	<div class="ajaxcont"></div>
	<div class="row">
	
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
								  <a href="suceso.php?suceso_id=534" target="_blank"><img src="../img/534.jpg" class="img-responsive ampliar " alt="product 1"></a>
								  <h4><small>Imprudencia de la muerte: 12 víctimas en siniestros viales -</small></h4>
								  <a href="sucesos/sucesos.php?suceso_id=534" class="btn ampliar" type="button">Ver</a>
								</div>
								<!-- End Item -->
								<div class="item">
								  <a href="suceso.php?suceso_id=535" target="_blank"><img src="../img/535.jpg" class="img-responsive" alt="product 2"></a>
								  <h4><small>Lo mataron por bailar con una mujer ajena</small></h4>
								  <button href="sucesos.php?suceso_id=535" class="btn ampliar" type="button">Ver</button>
								</div>
								<!-- End Item -->
								<div class="item">
								  <a href="suceso.php?suceso_id=536" target="_blank"><img src="../img/536.jpg" class="img-responsive" alt="product 3"></a>
								  <h4><small>Ejecutan a soldado en la UD 145</small></h4>
								  <button href="sucesos/sucesos.php?suceso_id=536" class="btn ampliar" type="button">Ver</button>
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
								<li><a href="sucesos/lis_sucesos.php" target="_blank">Listado completo</a></li> 
								<li><a href="sucesos/lis_sucesos_con_ano.php?ano=2016" target="_blank">2016</a></li>
								<li><a href="sucesos/lis_sucesos_con_ano.php?ano=2015" target="_blank">2015</a></li>
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
								  <a href="sucesos/suceso.php?suceso_id=534" target="_blank"><img src="img/534.jpg" class="img-responsive" alt="product 1"></a>
								  <h4><small>Imprudencia de la muerte: 12 víctimas en siniestros viales -</small></h4>
								  <button href="sucesos/sucesos.php?suceso_id=534" class="btn btn-primary" type="button">Ver</button>
								</div>
								<!-- End Item -->
								<div class="item">
								  <a href="sucesos/suceso.php?suceso_id=535" target="_blank"><img src="img/535.jpg" class="img-responsive" alt="product 2"></a>
								  <h4><small>Lo mataron por bailar con una mujer ajena</small></h4>
								  <button class="btn btn-primary" type="button">Ver</button>
								</div>
								<!-- End Item -->
								<div class="item">
								  <a href="sucesos/suceso.php?suceso_id=536" target="_blank"><img src="img/536.jpg" class="img-responsive" alt="product 3"></a>
								  <h4><small>Ejecutan a soldado en la UD 145</small></h4>
								  <button class="btn btn-primary" type="button">Ver</button>
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
	





	
	
	
	
	
	
	
	</div>
	
		
	<h1 class="c-text"> Guayana Segura </h1>
	<h1 class="c-text"> Menu Principal </h1>
	
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
							  <div class="carousel-inner">
								<div class="item active">
								  <a href="suceso.php?suceso_id=534" target="_blank"><img src="../img/534.jpg" class="img-responsive ampliar " alt="product 1"></a>
								  <h4><small>Imprudencia de la muerte: 12 víctimas en siniestros viales -</small></h4>
								  <a href="sucesos/sucesos.php?suceso_id=534" class="btn ampliar" type="button">Ver</a>
								</div>
								<!-- End Item -->
								<div class="item">
								  <a href="suceso.php?suceso_id=535" target="_blank"><img src="../img/535.jpg" class="img-responsive" alt="product 2"></a>
								  <h4><small>Lo mataron por bailar con una mujer ajena</small></h4>
								  <button href="sucesos.php?suceso_id=535" class="btn ampliar" type="button">Ver</button>
								</div>
								<!-- End Item -->
								<div class="item">
								  <a href="suceso.php?suceso_id=536" target="_blank"><img src="../img/536.jpg" class="img-responsive" alt="product 3"></a>
								  <h4><small>Ejecutan a soldado en la UD 145</small></h4>
								  <button href="sucesos/sucesos.php?suceso_id=536" class="btn ampliar" type="button">Ver</button>
								</div>
								<!-- End Item -->
							  </div>
							  <!-- End Carousel Inner -->
							</div>
	
	
	<script src="../js/jquery.min.js"></script>
	<script src="../js/jquery-ui.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	
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
			$.ajax({
				method: "GET",
				url: 'http://localhost/guayana_s/sucesos/suceso.php?suceso_id=535'
				//url: $(this).attr('href'),
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
