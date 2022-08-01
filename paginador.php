<!DOCTYPE html>
<html>
	<head>
		<title>Paginacion</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link rel="stylesheet" href="css/main.css">	
		<link href="css/menu.css" rel="stylesheet" id="menu-css">	
	</head>
	<body>
		<div class="panel panel-primary">
			<div class="panel-heading">este es el encabezado del panel</div>
			<div class="panel-body">
				<div class="row">
					<div id="miTabla"></div>
				</div>
				<div class="col-md-12 text-center">
					<ul class="pagination" id="paginador"></ul>
				</div>

			</div>
			<div class="panel-footer">pie del panel</div>
		</div>
	</body>
	
	<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<script type="text/javascript">

		var paginador;
		var totalPaginas
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
				console.log(data.lista);
				$("#miTabla").html("");

				$.each(lista, function(ind, elem){
					var fecha = elem.fecha_suceso;
					var titulo = elem.titulo;
					$("<div class='col-xs-3'><div class='panel panel-primary'><div class='panel-body altosuceso'>"+
					"<div class='col-xs-12 col-md-12'><a href='"+elem.fuente+"' target='_blank'><h4><small>"+fecha+" "+titulo+"</small></a></div>"+
     				"<a href='sucesos/suceso_no_modal.php?suceso_id="+elem.suceso_id+"' target='_blank'><img src='img/"+elem.suceso_id+".jpg' class='altoimagen' alt='suceso 2'></a>"+
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
</html>
