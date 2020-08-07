<?php
if(isset($_POST['submit'])){
	$newFileName= $_POST['filename'];
	if(empty($_POST['filename'])){
		$newFileName = "gallery";
	}else{
		$newFileName= strtolower(str_replace(" ", "-", $newFileName));
	}
	$imageTitle= $_POST['filetitle'];
	$imageDesc= $_POST['filedesc'];
	
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
	$allowed = array("jpg", "jpeg", "png", "pdf");
	//check for error handlers
	if(in_array($fileActualExt, $allowed)){
		if($fileError === 0){
			if($fileSize < 20000000){
				$imageFullName = $newFileName. "." . uniqid("", true) . "." .$fileActualExt ;//makes sure the file name is not the same
				$fileDestination = "../uploads/Gallery/" . $imageFullName;
				//grab the connection
				include_once "dbh.inc.php";
				
				if(empty($imageTitle) || empty($imageDesc)){
					header("location: ../GALLERY.php?upload=empty");
					exit();
				}else{
					//prepared statements
					$sql = "SELECT * FROM gallery;";
					$stmt = mysqli_stmt_init($con);
					if(!mysqli_stmt_prepare($stmt, $sql)){
						echo "SQL error!";
					}else{
						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);
						$rowCount = mysqli_num_rows($result);
						$setImageOrder = $rowCount + 1;

							$sql = "INSERT INTO gallery (titleGallery, descGallery, imgFullNameGallery, orderGallery) VALUES(?, ?, ?, ?);";
							if(!mysqli_stmt_prepare($stmt, $sql)){
						echo "SQL error!";
					}else{
				mysqli_stmt_bind_param($stmt, "ssss", $imageTitle, $imageDesc, $imageFullName, $setImageOrder);		
					mysqli_stmt_execute($stmt);
					//upload actual image into the server
					move_uploaded_file($fileTempName, $fileDestination);
					header("Location: ../GALLERY.php?upload=success");
					}
							
							
					}
				}
			}else{
				echo "File size is too big!";
				exit();
			}
		}else{
			echo "You had an error uploading the file!";
			exit();
		}
	}else{
		echo "You need to upload a proper file type!";
		exit();
}}