<?php
if(isset($_POST['submit'])){

			$newFileName= strtolower(str_replace(" ", "-", $newFileName));

	
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
				$fileDestination = "../uploadss/Gallery/" . $imageFullName;
				//grab the connection
				include_once "dbh.inc.php";
				
				
				
					//prepared statements
					

							$sql = "INSERT INTO profile ( image) VALUES(?);";
							if(!mysqli_stmt_prepare($stmt, $sql)){
						echo "SQL error!";
					}else{
				mysqli_stmt_bind_param($stmt, "s", $imageFullName);		
					mysqli_stmt_execute($stmt);
					//upload actual image into the server
					move_uploaded_file($fileTempName, $fileDestination);
					header("Location: ../userpage.php?upload=success");
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