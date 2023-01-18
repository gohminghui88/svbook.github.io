<!DOCTYPE html>
<html>



<head>
	<title>Business Intelligence</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	
</head>



<body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<header class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Simple Business Intelligence Dashboard (Main) </h1>
			</div>
		</div>
	</div>
</header>



		
<div class="container">

	<div class="row">
		<div class="col-3">
			<?php	generateTable();	?>
		</div>
			
		<div class="col">
			
			<div class="row">
				<div class="col">
					<?php generateBar(); ?>
				</div>
				<div class="col">
					<?php generatePie(); ?>
				</div>
			</div>
			
			<div class="row">
				<div class="col">
					<?php generateScatter(); ?>
				</div>
				<div class="col">
					<?php generateScatter2(); ?>
				</div>
			
			</div>
		</div>
	</div>	
</div>	

<?php



function generateTable() {
	$json = file_get_contents("http://www.svbook.com/test1/api.php");
	$json = utf8_encode($json);
	$results = json_decode($json, true);
	
	echo "<table border='1'>";
	echo "<tr><td><b>Sepal Length</b></td><td><b>Sepal Width</b></td><td><b>Petal Length</b></td><td><b>Petal Width</b></td><td><b>Species</b></td>";
	foreach($results as $row) {
		echo "<tr><td>" . $row["sepal_length"] . "</td><td>" . $row["sepal_width"] . "</td><td>" . $row["petal_length"] . "</td><td>" . $row["petal_width"] . "</td><td>" . $row["species"] . "</td></tr>";	
	}
	
	echo "</table>";
	
}

function generateScatter() {
	require_once "pChart/class/pDraw.class.php";
	require_once "pChart/class/pImage.class.php";
	require_once "pChart/class/pData.class.php";
	require_once "pChart/class/pBubble.class.php";
	require_once "pChart/class/pPie.class.php";
	require_once "pChart/class/pScatter.class.php";
	
	$json = file_get_contents("http://www.svbook.com/test1/api.php");
	$json = utf8_encode($json);
	$results = json_decode($json, true);
	
	$myData = new pData();
	foreach($results as $row) {
		
		$myData -> addPoints($row["sepal_length"], "Sepal_Length");
		$myData -> addPoints($row["petal_length"], "Petal_Length");
		
	}
	
	$myData->setAxisName(0,"Index");
	$myData->setAxisXY(0,AXIS_X);
	
	
	$myData->setSerieOnAxis("Petal_Length",1);
	$myData->setAxisName(1,"Petal_Length");
	$myData->setAxisXY(1,AXIS_Y);
	$myData->setScatterSerie("Sepal_Length","Petal_Length",0);
	$myData->setScatterSerieDescription(0,"");
	$myData->setScatterSerieColor(0,array("R"=>0,"G"=>0,"B"=>0));
	
	$myImage = new pImage(700, 300, $myData);
	$myImage->setFontProperties(array(
	"FontName" => "pChart/fonts/GeosansLight.ttf",
	"FontSize" => 15));
	$myImage->setGraphArea(60,40,650,250);
	
	$myScatter = new pScatter($myImage,$myData);
	$myScatter->drawScatterScale();
	$myScatter->drawScatterPlotChart();
	
	header("Content-Type: image/png");
	$myImage -> Render("scatterplot1.png");
	echo "<img src=\"" . "scatterplot1" . ".png\"" . " width='100%' height='100%'/>";

}


function generateScatter2() {
	require_once "pChart/class/pDraw.class.php";
	require_once "pChart/class/pImage.class.php";
	require_once "pChart/class/pData.class.php";
	require_once "pChart/class/pBubble.class.php";
	require_once "pChart/class/pPie.class.php";
	require_once "pChart/class/pScatter.class.php";
	
	$json = file_get_contents("http://www.svbook.com/test1/api.php");
	$json = utf8_encode($json);
	$results = json_decode($json, true);
	
	$myData = new pData();
	foreach($results as $row) {
		
		$myData -> addPoints($row["sepal_width"], "Sepal_Width");
		$myData -> addPoints($row["petal_width"], "Petal_Width");
		
	}
	
	$myData->setAxisName(0,"Index");
	$myData->setAxisXY(0,AXIS_X);
	
	
	$myData->setSerieOnAxis("Petal_Width",1);
	$myData->setAxisName(1,"Petal_Width");
	$myData->setAxisXY(1,AXIS_Y);
	$myData->setScatterSerie("Sepal_Width","Petal_Width",0);
	$myData->setScatterSerieDescription(0,"");
	$myData->setScatterSerieColor(0,array("R"=>0,"G"=>0,"B"=>0));
	
	$myImage = new pImage(700, 300, $myData);
	$myImage->setFontProperties(array(
	"FontName" => "pChart/fonts/GeosansLight.ttf",
	"FontSize" => 15));
	$myImage->setGraphArea(60,40,650,250);
	
	$myScatter = new pScatter($myImage,$myData);
	$myScatter->drawScatterScale();
	$myScatter->drawScatterPlotChart();
	
	header("Content-Type: image/png");
	$myImage -> Render("scatterplot2.png");
	echo "<img src=\"" . "scatterplot2" . ".png\"" . " width='100%' height='100%'/>";

}

function generatePie() {
	require_once "pChart/class/pDraw.class.php";
	require_once "pChart/class/pImage.class.php";
	require_once "pChart/class/pData.class.php";
	require_once "pChart/class/pBubble.class.php";
	require_once "pChart/class/pPie.class.php";
	
	$myData = new pData();  
	$myData->addPoints(array(50, 50, 50),"ScoreA");  
	$myData->addPoints(array("setosa","versicolor","virginica"),"Labels");
	$myData->setAbscissa("Labels");
	
	$myImage = new pImage(700, 300, $myData);
	$myImage->setFontProperties(array(
	"FontName" => "pChart/fonts/GeosansLight.ttf",
	"FontSize" => 15));
	$myImage->setGraphArea(60,40,650,250);
	$myImage->drawLegend(490,20,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));
	
	$PieChart = new pPie($myImage,$myData);
	$PieChart->draw3DPie(120,125,array("SecondPass"=>FALSE));
	header("Content-Type: image/png");
	
	$myImage -> Render("pie.png");
	echo "<img src=\"" . "pie" . ".png\"" . " width='100%' height='100%'/>";

}

function generateBar() {
	require_once "pChart/class/pDraw.class.php";
	require_once "pChart/class/pImage.class.php";
	require_once "pChart/class/pData.class.php";
	require_once "pChart/class/pBubble.class.php";
	require_once "pChart/class/pPie.class.php";
	
	$myData = new pData();  
	$myData->addPoints(array(50, 50, 50),"ScoreA");  
	$myData->addPoints(array("setosa","versicolor","virginica"),"Labels");
	$myData->setAxisName(0,"Y-Axis");
	$myData->setAxisName(1,"X-Axis");
	$myData->setSerieDescription("Labels","Months");
	$myData->setAbscissa("Labels");
	
	
	$myImage = new pImage(700, 300, $myData);
	$myImage->setFontProperties(array(
	"FontName" => "pChart/fonts/GeosansLight.ttf",
	"FontSize" => 15));
	
	$myImage->setGraphArea(60,40,650,250);
	$myImage->drawScale();
	$myImage->drawLegend(490,20,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));
	$myImage->drawBarChart();
	
	$myImage -> Render("barchart.png");
	echo "<img src=\"" . "barchart" . ".png\"" . " width='100%' height='100%'/>";

}


?>

</body>


</html>