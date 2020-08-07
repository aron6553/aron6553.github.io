<?php
if(isset($_POST["submit"])){
include_once 'dbhh.php';
require 'dbhh.php';
$first = mysqli_real_escape_string($connn, $_POST['first']);
$last =  mysqli_real_escape_string($connn, $_POST['last']);
$adm =  mysqli_real_escape_string($connn, $_POST['adm']);
$course =  mysqli_real_escape_string($connn, $_POST['course']);
$email =  mysqli_real_escape_string($connn, $_POST['email']);
$pwd = mysqli_real_escape_string($connn, $_POST['password']);
$pwd2 =mysqli_real_escape_string($connn, $_POST['confirm']);


$sql = "INSERT INTO student2(first, last, admission, course, email, password, confirm) VALUES (?, ?, ?, ?, ?, ?, ?);";
$stmt = mysqli_stmt_init($connn);
if(!mysqli_stmt_prepare($stmt, $sql))
{
echo "SQL error";
}else{
mysqli_stmt_bind_param($stmt, "sssssss", $first, $last, $adm, $course, $email, $pwd, $pwd2);	
mysqli_stmt_execute($stmt);}
	if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last) || !preg_match("/^[a-zA-Z]*$/", $user)){
		header("Location: ../assignmentsignup.php?signup = char");
die();
}else{
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: ../assignmentsignup.php?signup=email&first=$first&last=$last&adm=$adm&course=$course");
	die();
	}else{
	header("Location: ../assignmentsignup.php?signup = sucess");
die();}}}else{
header("Location: ../assignmentsignup.php.php");
die();
}