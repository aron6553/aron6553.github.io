<?php
include_once 'dbhh.php';
if(isset($_POST['submit'])){
$first = mysqli_real_escape_string($connn, $_POST['first']);
$last =  mysqli_real_escape_string($connn, $_POST['last']);
$contact =  mysqli_real_escape_string($connn, $_POST['contact']);
$email =  mysqli_real_escape_string($connn, $_POST['email']);
$pwd = mysqli_real_escape_string($connn, $_POST['password']);
$pwd2 =mysqli_real_escape_string($connn, $_POST['confirm']);
//$file =  $_POST['avatar'];
//$file =  $_FILES[$file];
//if(isset($_POST['file'])){
//	$filee = $_POST['avatar'];
//$orig_file = $_FILES['$_POST["avatar"]']['tmp_name'];
//$ext = pathinfo($_FILES['$_POST["avatar"]']['name'], PATHINFO_EXTENSION);
$orig_file = $_FILES["avatar"]["tmp_name"];
$ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
$target_dir = '../uploadss/';
//$target_dir = 'uploads/';
$destination = "$target_dir$contact.$ext";
move_uploaded_file($orig_file,$destination);

/*$file = $_FILES["file"];
	//grab info from the file
	$fileName = $file["name"];
	$fileType = $file["type"];
	$fileTempName = $file["tmp_name"];
	$fileError = $file["error"];
	$fileSize = $file["size"];
	
	//grab the extension from uploaded file
	$fileExt = explode(".", $fileName);
	$fileActualExt = strtolower(end($fileExt));//end() grabs the last extension
	$allowed = array("jpg", "jpeg", "png", "jfif");
	//check for error handlers
	if(in_array($fileActualExt, $allowed)){
		if($fileError === 0){
			if($fileSize < 1000000){
				$imageFullName = $newFileName. "." . uniqid("", true) . "." .$fileActualExt ;//makes sure the file name is not the same
				$fileDestination = "../uploadss/Gallery/" . $imageFullName;
				//grab the connection
				include_once "dbh.inc.php";
				

		
*/
$sql = "INSERT INTO usersignup(first, last, contact, email, pwd, confirm, avatar_path) VALUES (?, ?, ?, ?, ?, ?, ?);";
		$stmt = mysqli_stmt_init($connn);
		
if(!mysqli_stmt_prepare($stmt, $sql))
{ 
		header("Location: ../assignmentsignup.php?error=sqlerror");
		exit();
}else{
//$hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);}
	mysqli_stmt_bind_param($stmt, "sssssss", $first, $last, $contact,  $email, $pwd , $pwd2, $destination );
mysqli_stmt_execute($stmt);
	header("Location: ../assignmentsignup.php?signup = sucess");}}
/*		}else
{
	header("Location: ../assignmentsignup.php?");

die();}

if(!mysqli_stmt_prepare($stmt, $sql))
{
echo "SQL error";
}else{
	//$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
mysqli_stmt_bind_param($stmt, "sssssss", $first, $last, $contact, $email, $pwd, $pwd2, $imageFullName);	
mysqli_stmt_execute($stmt);
//move_uploaded_file($fileTempName, $fileDestination);
//					header("Location: ../Aryenn.php?upload=success");}

	if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last) || !preg_match("/^[a-zA-Z]*$/", $user)){
		header("Location: ../usersignup.php?signup = char");
die();
}else{
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: ../usersignupnew.php?signup=email&first=$first&last=$last");
	die();
	}else{
	header("Location: ../usersignupnew.php?signup = sucess");
die();}}}else{
header("Location: ../usersignupnew.php");
die();}*/