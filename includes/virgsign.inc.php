<?php
include_once 'virg.php';
if(isset($_POST['submit'])){
$first = mysqli_real_escape_string($connn, $_POST['first']);
$last =  mysqli_real_escape_string($connn, $_POST['last']);
$email =  mysqli_real_escape_string($connn, $_POST['email']);
$pwd = mysqli_real_escape_string($connn, $_POST['password']);
$pwd2 =mysqli_real_escape_string($connn, $_POST['confirm']);


$sql = "INSERT INTO virgsign(first, last, email, password, confirm) VALUES (?, ?, ?, ?, ?);";
		$stmt = mysqli_stmt_init($connn);
if(!mysqli_stmt_prepare($stmt, $sql))
{ 
		header("Location: ../virgsign.php?error=sqlerror");
		exit();
}
	mysqli_stmt_bind_param($stmt, "sssss", $first, $last, $email, $pwd , $pwd2);
mysqli_stmt_execute($stmt);
header("Location: ../virgsign.php?signup = success");}


else
{
	header("Location: ../virgsign.php?");
}
