<?php
include_once 'dbhh.php';
session_start();
$username = $_SESSION['username'];

$sql = "DELETE FROM sellersignup WHERE username='$username'";
if(mysqli_query($connn, $sql)){
	header("Location: ../carproject.php?delete = sucess");
	}else{
	
		header("Location: ../carsellers.php?delete = unsuccesssful");
}