<?php
include_once 'dbhh.php';
session_start();
$username = $_SESSION['username'];

$sql = "DELETE FROM appointments WHERE id='$_GET[id]'";
if(mysqli_query($connn, $sql)){
	header("Location: ../adminpage.php?delete = sucess");
	}else{
	
		header("Location: ../adminpage.php?delete = unsuccesssful");
}