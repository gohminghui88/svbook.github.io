
<html lang="en" class="no-js demo-1">
<head>
<meta charset="utf-8">
<meta name="description" content="SVBook has published a easy to learn book "Learn By Examples - A Guide To C# Programming", best programming books teaching to develop C# programs in an easy way through practical approaches. Learners will walk away with a self developed web browser C# program.">
<meta name="keywords" content="SVBook, python programming, data mining with python, pandas with python, scikit learn with python, data science with python, c sharp programming, c# programs, c# programming guide, best programming books, free programming books, technical book, free technical books, eric goh, eric goh ming hui ">
<meta name="author" content="Eric M. H. Goh">

<title>SVBook - Learn By Examples and Affordable Programming Books</title>
</head>


<?php

$geoplugin = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $_SERVER['REMOTE_ADDR']) );

if ( is_numeric($geoplugin['geoplugin_latitude']) && is_numeric($geoplugin['geoplugin_longitude']) ) {

    $lat = $geoplugin['geoplugin_latitude'];
    $long = $geoplugin['geoplugin_longitude'];

	if ($geoplugin['geoplugin_countryCode'] == 'SG') {

		//echo 'SG';   
		$URL="http://www.svbook.com/index2.html";
		echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
		echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
	} 
	
	
	$URL="http://www.svbook.com/index1.html";
	echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
	echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
	
  }
     
?>

</html>