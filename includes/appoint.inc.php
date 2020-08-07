<?php
include_once 'dbhh.php';
if(isset($_POST['submit'])){
$name = mysqli_real_escape_string($connn, $_POST['first']);
$model =  mysqli_real_escape_string($connn, $_POST['model']);
$contact =  mysqli_real_escape_string($connn, $_POST['contact']);
$garage =  mysqli_real_escape_string($connn, $_POST['garage']);
$problem =  mysqli_real_escape_string($connn, $_POST['problem']);


 
$sql = "INSERT INTO appointments(name, model, contact, garage, problem) VALUES (?, ?, ?, ?, ?);";
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
mysqli_stmt_bind_param($stmt, "sssss", $name, $model, $contact, $garage, $problem);	
mysqli_stmt_execute($stmt);}


	header("Location: ../appoint.php?appoinment = success");
die();}else{
header("Location: ../appoint.php");
die();}