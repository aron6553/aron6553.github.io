<?php
include_once 'dbhh.php';
if(isset($_POST['submit'])){
$name = mysqli_real_escape_string($connn, $_POST['name']);
$txt = mysqli_real_escape_string($connn, $_POST['txt']);


$sql = "INSERT INTO forum2(name, txt) VALUES (?, ?);";
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
mysqli_stmt_bind_param($stmt, "ss", $name, $txt);	
mysqli_stmt_execute($stmt);}


	header("Location: ../forum.php?chat = sucess");
die();}else{
header("Location: ../forum.php");
die();}