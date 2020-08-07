<?php
include_once 'dbhh.php';
if(isset($_POST['submit'])){
$file =  $_POST['avatar'];
$file =  $_FILES[$file];

//if(isset($_POST['file'])){
//	$filee = $_POST['avatar'];
//$orig_file = $_FILES['$_POST["avatar"]']['tmp_name'];
//$ext = pathinfo($_FILES['$_POST["avatar"]']['name'], PATHINFO_EXTENSION);
$orig_file = $_FILES[$file]['tmp_name'];
$ext = pathinfo($_FILES[$file]['name'], PATHINFO_EXTENSION);
$target_dir = '../uploadss/Gallery/';
//$target_dir = 'uploads/';
$destination = "$target_dir$contact.$ext";
move_uploaded_file($orig_file,$destination);
exit();

$sql = "INSERT INTO profileimg2(avatar_path) VALUES (?);";
		$stmt = mysqli_stmt_init($connn);
		/*
if(!mysqli_stmt_prepare($stmt, $sql))
{ 
		header("Location: ../assignmentsignup.php?error=sqlerror");
		exit();
}else{
//$hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);}
	mysqli_stmt_bind_param($stmt, "sssssss", $first, $last, $contact, $location, $email, $pwd , $pwd2);
mysqli_stmt_execute($stmt);
header("Location: ../assignmentsignup.php?signup = sucess");}else
{
	header("Location: ../assignmentsignup.php?");

die();}
*/
if(!mysqli_stmt_prepare($stmt, $sql))
{
echo "SQL error";
}else{
	//$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
mysqli_stmt_bind_param($stmt, "s", $destination);	
mysqli_stmt_execute($stmt);}

	if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last) || !preg_match("/^[a-zA-Z]*$/", $user)){
		header("Location: ../usersignup.php?signup = char");
die();
}else{
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: ../usersignup.php?signup=email&first=$first&last=$last");
	die();
	}else{
	header("Location: ../usersignup.php?signup = sucess");
die();}}}else{
header("Location: ../usersignup.php");
die();}