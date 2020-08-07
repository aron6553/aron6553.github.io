<?php
if(isset($_POST["submit"])){
include_once 'virgg.php';
$name = mysqli_real_escape_string($con, $_POST['name']);
$text =  mysqli_real_escape_string($con, $_POST['txt']);

$sql = "INSERT INTO contact(name, text) VALUES (?, ?);";
$stmt = mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($stmt, $sql))
{
echo "SQL error";
}else{
mysqli_stmt_bind_param($stmt, "ss", $name, $text);	
mysqli_stmt_execute($stmt);}
	if(!preg_match("/^[a-zA-Z]*$/", $name) || !preg_match("/^[a-zA-Z]*$/", $text)){
		header("Location: ../virgcontact.php?signup = char");

}else{
	header("Location: ../virgcontact.php?contact = success");
die();}}else{
header("Location: ../virgcontact.php");
die();
}

