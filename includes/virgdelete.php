<?php
include_once 'virgg.php';
session_start();
$email = $_SESSION['email'];

$sql = "DELETE FROM gallery WHERE idGallery='$_GET[id]'";
if(mysqli_query($con, $sql)){
	header("Location: ../virgadmin.php?delete = sucess");
	}else{
	
		header("Location: ../virgadmin.php?delete = unsuccesssful");
}