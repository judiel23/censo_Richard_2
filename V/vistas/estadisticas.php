<?php
require("../../C/session.php");
if (!isset($_POST['desde'])&&!isset($_POST['hasta'])) {
   $desde="";
   $hasta="";
}else{
    $desde=$_POST['desde'];
    $hasta=$_POST['hasta'];
}

require("../CSS/css.php");
require("../../C/con_grafico.php");
 require ("menu.php");
 ?>
 <!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registro de Censo</title>
	<style>#form{
		margin-top: 0px;

		}
		input[type="text"],input[type="password"],input[type="mail"]{ width:350px;   /*decoracion dentro del formulario*/
                    height:35px;
	border-radius:3px;
}
#button{
	margin-top: 25px;

}
		</style>


		<script type="text/javascript">
$(function () {
	 Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
        return {
            radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
            stops: [
                [0, color],
                [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
            ]
        };
    });
    $('#container').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Edades de Personas Censadas'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'edades',
            data: [
                <?php edad($desde,$hasta); ?>
            ]
        }]
    });
});
		</script>
				<script type="text/javascript">
$(function () {
    $('#container2').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Sexo de Personas Censadas'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>',
              color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Sexo',
            data: [
                <?php sexo($desde,$hasta); ?>
            ]
        }]
    });
});


</script>

</head>
<body>
	<div class="container-fluid">




		<div class="row">

<div class="col-xs-12"></div>

<div class="col-xs-10"><form class="form-horizontal" role="form"  action='#' method='post'>
	<div class="col-xs-4"> <label for="">Desde</label><input name='desde' class="form-control" type="date" required></div>
	<div class="col-xs-4"><label for="">Hasta</label><input name='hasta' class="form-control" type="date" required></div>

	<div class="col-xs-4"> <div class='col-sx-2'></div><input id='button' class="btn btn-success" type="submit" value="Enviar"></div>
</form>
</div>
<div class="col-xs-12" style='height: 15px;'></div>

	<div class='col-xs-6' id="container"></div>
	   <div class='col-xs-6' id="container2"></div>
       <div class='col-xs-6' id="container3"></div>
	   <div class="col-xs-12" style='height: 15px;'></div>
   </div>

   </div>
     <?php
    require("footer.php");
 ?>

   </div>


		<script src="../highcharts/js/highcharts.js"></script>
<script src="../highcharts/js/highcharts-3d.js"></script>
<script src="../highcharts/js/modules/exporting.js"></script>

</body>


</html>