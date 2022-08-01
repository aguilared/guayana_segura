$(document).ready(function () {
  $.ajax({
    url: "http://3.15.169.202/vs/charts/api_acu_x_anos.php",
    type: "GET",
    success: function (data) {
      console.log("endpointData:", data);

      var meses = [];
      var ano1 = [];
      var ano2 = [];
      var ano3 = [];
      var ano4 = [];
      var ano5 = [];
      var ano6 = [];
      var acu_ano1 = [];
      var acu_ano2 = [];
      var acu_ano3 = [];
      var acu_ano4 = [];
      var acu_ano5 = [];
      var acu_ano6 = [];
      //meses.push("Mes ");

      for (var i in data) {
        meses.push(" " + data[i].mes);
        ano1.push(data[i].ano1);
        ano2.push(data[i].ano2);
        ano3.push(data[i].ano3);
        ano4.push(data[i].ano4);
        ano5.push(data[i].ano5);
        ano6.push(data[i].ano6);
        acu_ano1.push(data[i].acu_ano1);
        acu_ano2.push(data[i].acu_ano2);
        acu_ano3.push(data[i].acu_ano3);
        acu_ano4.push(data[i].acu_ano4);
        acu_ano5.push(data[i].acu_ano5);
        acu_ano6.push(data[i].acu_ano6);
      }

      var chartdata = {
        labels: meses,
        datasets: [
          {
            label: "2021",
            fill: false,
            yAxisID: "y-axis-0",
            lineTension: 0.1,
            backgroundColor: "rgba(89, 88, 88, 0.75)",
            borderColor: "rgba(229, 227, 227, 1)",
            pointHoverBackgroundColor: "rgba(229, 227, 227, 1)",
            pointHoverBorderColor: "rgba(229, 227, 227, 1)",
            data: ano1,
          },
          {
            label: "Acum_2021",
            fill: false,
            yAxisID: "y-axis-1",
            lineTension: 0.1,
            backgroundColor: "rgba(229, 227, 227, 0.75)",
            borderColor: "rgba(229, 227, 227, 1)",
            pointHoverBackgroundColor: "rgba(229, 227, 227, 1)",
            pointHoverBorderColor: "rgba(229, 227, 227, 1)",
            data: acu_ano1,
          },
          {
            label: "2020",
            fill: false,
            yAxisID: "y-axis-0",
            lineTension: 0.1,
            backgroundColor: "rgba(149, 11, 34, 0.75)",
            borderColor: "rgba(149, 11, 34, 1)",
            pointHoverBackgroundColor: "rgba(149, 11, 34, 1)",
            pointHoverBorderColor: "rgba(149, 11, 34, 1)",
            data: ano2,
          },
          {
            label: "Acum_2020",
            fill: false,
            yAxisID: "y-axis-1",
            lineTension: 0.1,
            backgroundColor: "rgba(202, 134, 145, 0.75)",
            borderColor: "rgba(202, 134, 145, 1)",
            pointHoverBackgroundColor: "rgba(202, 134, 145, 1)",
            pointHoverBorderColor: "rgba(202, 134, 145, 1)",
            data: acu_ano2,
          },
          {
            label: "2019",
            fill: false,
            yAxisID: "y-axis-0",
            lineTension: 0.1,
            backgroundColor: "rgba(39, 174, 96, 0.75)",
            borderColor: "rgba(39, 174, 96, 1)",
            pointHoverBackgroundColor: "rgba(39, 174, 96, 1)",
            pointHoverBorderColor: "rgba(39, 174, 96, 1)",
            data: ano3,
          },
          {
            label: "Acum_2019",
            fill: false,
            yAxisID: "y-axis-1",
            lineTension: 0.1,
            backgroundColor: "rgba(171, 235, 198, 0.75)",
            borderColor: "rgba(171, 235, 198, 1)",
            pointHoverBackgroundColor: "rgba(171, 235, 198, 1)",
            pointHoverBorderColor: "rgba(171, 235, 198, 1)",
            data: acu_ano3,
          },
          {
            label: "2018",
            fill: false,
            yAxisID: "y-axis-0",
            lineTension: 0.1,
            backgroundColor: "rgba(76, 47, 41, 0.75)",
            borderColor: "rgba(76, 47, 41, 1)",
            pointHoverBackgroundColor: "rgba(76, 47, 41, 1)",
            pointHoverBorderColor: "rgba(76, 47, 41, 1)",
            data: ano4,
          },
          {
            label: "Acum_2018",
            fill: false,
            yAxisID: "y-axis-1",
            lineTension: 0.1,
            backgroundColor: "rgba(133, 84, 74, 0.75)",
            borderColor: "rgba(133, 84, 74, 1)",
            pointHoverBackgroundColor: "rgba(133, 84, 74, 1)",
            pointHoverBorderColor: "rgba(133, 84, 74, 1)",
            data: acu_ano4,
          },
          {
            label: "2017",
            fill: false,
            yAxisID: "y-axis-0",
            lineTension: 0.1,
            backgroundColor: "rgba(59, 89, 152, 0.75)",
            borderColor: "rgba(59, 89, 152, 1)",
            pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
            pointHoverBorderColor: "rgba(59, 89, 152, 1)",
            data: ano5,
          },
          {
            label: "Acum_2017",
            fill: false,
            yAxisID: "y-axis-1",
            lineTension: 0.1,
            backgroundColor: "rgba(172, 193, 236, 0.75)",
            borderColor: "rgba(172, 193, 236, 1)",
            pointHoverBackgroundColor: "rgba(172, 193, 236, 1)",
            pointHoverBorderColor: "rgba(172, 193, 236, 1)",
            data: acu_ano5,
          },
          {
            label: "2016",
            fill: false,
            yAxisID: "y-axis-0",
            lineTension: 0.1,
            backgroundColor: "rgba(241, 72, 34, 0.75)",
            borderColor: "rgba(241, 72, 34, 1)",
            pointHoverBackgroundColor: "rgba(241, 72, 34, 1)",
            pointHoverBorderColor: "rgba(241, 72, 34, 1)",
            data: ano6,
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
            data: acu_ano6,
          },
        ],
      };

      var ctx = $("#mycanvas");

      var LineGraph = new Chart(ctx, {
        type: "line",
        data: chartdata,
        options: {
          responsive: true,
          hoverMode: "index",
          stacked: false,
          title: {
            display: true,
            text: "Comparacion Homicidios por Meses Municipio Caroni, Estado Bolivar",
          },
          scales: {
            yAxes: [
              {
                type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                display: true,
                position: "left",
                id: "y-axis-0",
              },
              {
                type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                display: true,
                position: "right",
                id: "y-axis-1",

                // grid line settings
                gridLines: {
                  drawOnChartArea: false, // only want the grid lines for one axis to show up
                },
              },
            ],
          },
        },
      });
    },
    error: function (data) {},
  });
});
