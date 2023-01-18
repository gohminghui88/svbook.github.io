<?

require_once "pChart/class/pDraw.class.php";
require_once "pChart/class/pImage.class.php";
require_once "pChart/class/pData.class.php";
require_once "pChart/class/pBubble.class.php";
require_once "pChart/class/pPie.class.php";
require_once "pChart/class/pScatter.class.php";


$myData = new pData();  

for ($i=0;$i<=360;$i=$i+10) { $myData->addPoints(cos(deg2rad($i))*20,"Probe 1"); }
for ($i=0;$i<=360;$i=$i+10) { $myData->addPoints(sin(deg2rad($i))*20,"Probe 2"); }
$myData->setAxisName(0,"Index");
$myData->setAxisXY(0,AXIS_X);

for ($i=0;$i<=360;$i=$i+10) { $myData->addPoints($i,"Probe 3"); }
$myData->setSerieOnAxis("Probe 3",1);
$myData->setAxisName(1,"Degree");
$myData->setAxisXY(1,AXIS_Y);

$myData->setScatterSerie("Probe 1","Probe 3",0);
$myData->setScatterSerieDescription(0,"This year");
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
$myImage->Render(null);

?>