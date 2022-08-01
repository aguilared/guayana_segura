$(document).ready(function(){
	$.ajax({
		url : "http://localhost/chartjs/acu_x_anos.php",
		type : "GET",
		success : function(data){
			console.log(data);

			var meses = [];
			var ano1 = [];
			var ano2 = [];
			var acu_ano1 = [];
			var acu_ano2 = [];
			//meses.push("Mes ");
			
			for(var i in data) {
				meses.push(" " + data[i].mes);
				ano1.push(data[i].ano1);   
				ano2.push(data[i].ano2);
				acu_ano1.push(data[i].acu_ano1);
				acu_ano2.push(data[i].acu_ano2);
			}

			var chartdata = {
				labels: meses,
				datasets: [
					{
						label: "2017",
						fill: false,
						yAxisID: "y-axis-0",
						lineTension: 0.1,
						backgroundColor: "rgba(59, 89, 152, 0.75)",
						borderColor: "rgba(59, 89, 152, 1)",
						pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
						pointHoverBorderColor: "rgba(59, 89, 152, 1)",
						data: ano1
					},
					{
						label: "Acum_2017",
						fill: false,
						yAxisID: "y-axis-1",
						lineTension: 0.1,
						backgroundColor: "red",
						borderColor: "red",
						pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
						pointHoverBorderColor: "rgba(59, 89, 152, 1)",
						data: acu_ano1
					},
					{
						label: "2016",
						fill: false,
						yAxisID: "y-axis-0",
						lineTension: 0.1,
						backgroundColor: "rgba(29, 202, 255, 0.75)",
						borderColor: "rgba(29, 202, 255, 1)",
						pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
						pointHoverBorderColor: "rgba(29, 202, 255, 1)",
						data: ano2
					},
					{
						label: "Acum_2016",
						fill: false,
						yAxisID: "y-axis-1",
						lineTension: 0.1,
						backgroundColor: "orange",
						borderColor: "orange",
						pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
						pointHoverBorderColor: "rgba(29, 202, 255, 1)",
						data: acu_ano2
					}

				]
			};

			var ctx = $("#mycanvas");

			var LineGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata,
				options: {
                responsive: true,
                hoverMode: 'index',
                stacked: false,
                title:{
                    display: true,
                    text:'Comparacion Homicidios por Meses Municipio Caroni, Estado Bolivar'
                },
                scales: {
                    yAxes: [{
                        type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                        display: true,
                        position: "left",
                        id: "y-axis-0",
                    }, {
                        type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                        display: true,
                        position: "right",
                        id: "y-axis-1",

                        // grid line settings
                        gridLines: {
                            drawOnChartArea: false, // only want the grid lines for one axis to show up
                        },
                    }],
                }
            }
			});
		},
		error : function(data) {

		}
	});
});