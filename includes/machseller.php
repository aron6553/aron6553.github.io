<?php
include_once 'dbhh.php';
if(isset($_POST['submit'])){
session_start();
$username = $_SESSION['username'];
	//$id = $_SESSION['id'];
	$file = $_FILES["file"];
	//grab info from the file
	$fileName = $file["name"];
	$fileType = $file["type"];
	$fileTempName = $file["tmp_name"];
	$fileError = $file["error"];
	$fileSize = $file["size"];
	
	//grab the extension from uploaded file
	$fileExt = explode(".", $fileName);
	$fileActualExt = strtolower(end($fileExt));//end() grabs the last extension
	$allowed = array('jpg', 'jpeg', 'png');
	//check for error handlers
	if(in_array($fileActualExt, $allowed)){
		if($fileError === 0){
			if($fileSize < 2000000){
				$fileNameNew = "profile".$username.".".$fileActualExt;//makes sure the file name is not the same
				$fileDestination = '../uploads/Galleryseller/'.$fileNameNew;
				move_uploaded_file($fileTempName, $fileDestination);
				$sql = "UPDATE imguploadseller SET status=0 WHERE userid='$username';";
				$result = mysqli_query($connn, $sql);
				header("Location: ../carsellers.php?upload=success");
			}else{
				echo "File size is too big!";
			}
		}else{
			echo "You had an error uploading the file!";
		}
	}else{
		echo "You need to upload a proper file type!";
}}