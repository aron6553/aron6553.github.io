<?php
include_once 'dbhh.php';
session_start();
$username = $_SESSION['username'];


$sql = "DELETE FROM usersignup WHERE username='$username'";
if(mysqli_query($connn, $sql)){
	header("Location: ../carproject.php?delete = sucess");
	}else{
	
		header("Location: ../userpage.php?delete = unsuccesssful");
}
		//$stmt = mysqli_stmt_init($connn);
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

if(!mysqli_stmt_prepare($stmt, $sql))
{
echo "SQL error";
}else{
	//$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
mysqli_stmt_bind_param($stmt, "ssssss", $first, $last, $contact, $email, $pwd, $pwd2);	
mysqli_stmt_execute($stmt);}
$sql = "SELECT * FROM usersignup WHERE first='$first' AND last='$last'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
	$userid = $row['id'];	
	$sql = "INSERT INTO imgupload(userid, status) VALUES ($userid, 1);";
	header("Location: userpage.php");
	}
}else{
	echo "You have an error";
}

	if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last) || !preg_match("/^[a-zA-Z]*$/", $user)){
		header("Location: ../usersignup.php?signup = char");
die();
}else{
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: ../usersignup.php?signup=email&first=$first&last=$last");
	die();
	}else{
	header("Location: ../usersignup.php?signup = sucess");
die();}}}else{
header("Location: ../usersignup.php");
die();}
*/
