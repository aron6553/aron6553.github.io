<?php
if(isset($_POST["submit"])){
include_once 'dbhh.php';
$name = mysqli_real_escape_string($connn, $_POST['name']);
$adm =  mysqli_real_escape_string($connn, $_POST['adm']);
$text =  mysqli_real_escape_string($connn, $_POST['textarea']);

$sql = "INSERT INTO contact(name, adm, text) VALUES (?, ?, ?);";
$stmt = mysqli_stmt_init($connn);
if(!mysqli_stmt_prepare($stmt, $sql))
{
echo "SQL error";
}else{
mysqli_stmt_bind_param($stmt, "sss", $name, $adm, $text);	
mysqli_stmt_execute($stmt);}
	if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last) || !preg_match("/^[a-zA-Z]*$/", $user)){
		header("Location: ../CONTACT.php?signup = char");
die();
}else{
	header("Location: ../CONTACT.php?contact = sucess");
die();}}else{
header("Location: ../CONTACT.php");
die();
}

