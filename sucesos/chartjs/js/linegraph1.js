$(document).ready(function(){
	$.ajax({
		url : "http://localhost/chartjs/followersdata1.php",
		type : "GET",
		success : function(data){
			console.log(data);

			var meses = [];
			var ene = [];
			var feb = [];
			var mar = [];
			meses.push("Meses ");
			
			for(var i in data) {
				
				ene.push(data[i].ene);   
				feb.push(data[i].feb);
				mar.push(data[i].mar);
			}

			var chartdata = {
				labels: meses,
				datasets: [
					{
						label: "Ene",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(59, 89, 152, 0.75)",
						borderColor: "rgba(59, 89, 152, 1)",
						pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
						pointHoverBorderColor: "rgba(59, 89, 152, 1)",
						data: ene
					},
					{
						label: "Feb",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(29, 202, 255, 0.75)",
						borderColor: "rgba(29, 202, 255, 1)",
						pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
						pointHoverBorderColor: "rgba(29, 202, 255, 1)",
						data: feb
					},
					{
						label: "Mar",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(211, 72, 54, 0.75)",
						borderColor: "rgba(211, 72, 54, 1)",
						pointHoverBackgroundColor: "rgba(211, 72, 54, 1)",
						pointHoverBorderColor: "rgba(211, 72, 54, 1)",
						data: mar
					}
				]
			};

			var ctx = $("#mycanvas");

			var LineGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata
			});
		},
		error : function(data) {

		}
	});
});