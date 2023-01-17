<?php

	$files = glob('Files/*'); // get all file names
	
	foreach($files as $file){ // iterate files
		if(is_file($file)) {
			echo "<br />";
			echo "Deleting File: " . $file;
			unlink($file); // delete file
		}
	}
	
	
	$files2 = glob('Images/photos/*'); // get all file names
	
	foreach($files2 as $file2){ // iterate files
		if(is_file($file2)) {
			echo "<br />";
			echo "Deleting Image File: " . $file2;
			unlink($file2); // delete file
		}
	}

	
?>