<?php
$target_dir = "Files/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 1;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 900000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Redirect to new folder if images
if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "svg" || $imageFileType == "ico" || $imageFileType == "psd"
|| $imageFileType == "gif" || $imageFileType == "tif" || $imageFileType == "tiff" || $imageFileType == "bmp" || $imageFileType == "jfif" || $imageFileType == "ai") {
//    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    
	$target_dir = "Images/photos/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$target_dir = "Images/";
	$uploadOk = 1;
}

// Redirect to new folder if videos
if($imageFileType == "flv" || $imageFileType == "mov" || $imageFileType == "avi" || $imageFileType == "mkv"
|| $imageFileType == "mp4" || $imageFileType == "asf" || $imageFileType == "rmvb") {
//    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    
	$target_dir = "Videos/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
}

// Redirect to new folder if musics
if($imageFileType == "mp3" || $imageFileType == "flac" || $imageFileType == "aac" || $imageFileType == "pcm"
|| $imageFileType == "wav" || $imageFileType == "ogg" || $imageFileType == "aiff" || $imageFileType == "wma") {
//    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    
	$target_dir = "Musics/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

	// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		echo "<br />";
		echo "<br />";
		echo "<b>Link:</b> <a href='http://www.svbook.com/MyFiles/" . $target_file . "'>http://www.svbook.com/MyFiles/" . $target_file . "</a>";
		echo "<br />";
		echo "To go to the directory, <a href='http://www.svbook.com/MyFiles/" . $target_dir . "'>click here</a>";
		echo "<br />";
		
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>