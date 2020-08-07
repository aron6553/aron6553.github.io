<?php
if(isset($_POST["submit"])){
include_once 'dbhh.php';
$first = mysqli_real_escape_string($connn, $_POST['first']);
$last =  mysqli_real_escape_string($connn, $_POST['last']);
$user =  mysqli_real_escape_string($connn, $_POST['username']);
$email =  mysqli_real_escape_string($connn, $_POST['email']);
$pwd = mysqli_real_escape_string($connn, $_POST['password']);
$pwd2 =mysqli_real_escape_string($connn, $_POST['confirm']);

$sql = "INSERT INTO entry(firstname, lastname, username, email, password, confirm) VALUES (?, ?, ?, ?, ?, ?);";
$stmt = mysqli_stmt_init($connn);
if(!mysqli_stmt_prepare($stmt, $sql))
{
echo "SQL error";
}else{
mysqli_stmt_bind_param($stmt, "ssssss", $first, $last, $user, $email, $pwd, $pwd2);	
mysqli_stmt_execute($stmt);}

	if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last) || !preg_match("/^[a-zA-Z]*$/", $user)){
		header("Location: ../ARYENSIGNUP.php?signup = char");
die();
}else{
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: ../ARYENSIGNUP.php?signup=email&first=$first&last=$last&username=$user");
	die();
	}else{
	header("Location: ../ARYENSIGNUP.php?signup = sucess");
die();}}}else{
header("Location: ../ARYENSIGNUP.php");
die();
}
