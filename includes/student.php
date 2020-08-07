<?php
include_once 'dbhh.php';
if(isset($_POST['submit'])){
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
		header("Location: ../assignmentsignup.php?error=sqlerror");
		exit();
}else{
$hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);}
	mysqli_stmt_bind_param($stmt, "sssssss", $first, $last, $adm, $course, $email, $hashedPwd , $pwd2);
mysqli_stmt_execute($stmt);
header("Location: ../assignmentsignup.php?signup = sucess");}
die();

else
{
	header("Location: ../assignmentsignup.php?");
}
