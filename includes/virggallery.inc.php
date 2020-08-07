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
	$imagePrice= $_POST['fileprice'];
	
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
	$allowed = array("jpg", "jpeg", "PNG", "pdf");
	//check for error handlers
	if(in_array($fileActualExt, $allowed)){
		if($fileError === 0){
			if($fileSize < 20000000){
				$imageFullName = $newFileName. "." . uniqid("", true) . "." .$fileActualExt ;//makes sure the file name is not the same
				$fileDestination = "../uploadss/Gallery/" . $imageFullName;
				//grab the connection
				include_once 'virg.php';

				if(empty($imageTitle) || empty($imageDesc) || empty($imagePrice)){
					header("location: ../virggallery.php?upload=empty");
					exit();
				}else{
					//prepared statements
					$sql = "SELECT * FROM gallery;";
					$stmt = mysqli_stmt_init($connn);
					if(!mysqli_stmt_prepare($stmt, $sql)){
						echo "SQL error!";
					}else{
						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);
						$rowCount = mysqli_num_rows($result);
						$setImageOrder = $rowCount + 1;

							$sql = "INSERT INTO gallery (nameGallery, descGallery, priceGallery, imgFullNameGallery, orderGallery) VALUES(?, ?, ?, ?, ?);";
							if(!mysqli_stmt_prepare($stmt, $sql)){
						echo "SQL error!";
					}else{
				mysqli_stmt_bind_param($stmt, "sssss", $imageTitle, $imageDesc, $imagePrice, $imageFullName, $setImageOrder);		
					mysqli_stmt_execute($stmt);
					//upload actual image into the server
					move_uploaded_file($fileTempName, $fileDestination);
					header("Location: ../virgadmin.php?upload=success");
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