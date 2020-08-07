<?php
include_once 'dbhh.php';
session_start();
$username = $_SESSION['username'];

$filename="../uploads/profile".$username."*";
$fileinfo = glob($filename);
$fileext = explode(".", $fileinfo[0]);
$fileactualext = $fileext[1];

$file = "../uploads/profile".$username.".".$fileactualext;
if(!unlink($file)){
	echo "File was not deleted!";
}else{
	echo "File was deleted";
}
$sql = "UPDATE imguploadseller SET status=1 WHERE userid='$username';";
mysqli_query($connn, $sql);
header("Location: ../carsellers.php?deletesuccess");