<?php
include_once 'dbhh.php';
if(isset($_POST['submit'])){
$first = mysqli_real_escape_string($connn, $_POST['first']);
$last =  mysqli_real_escape_string($connn, $_POST['last']);
$username =  mysqli_real_escape_string($connn, $_POST['username']);
$contact =  mysqli_real_escape_string($connn, $_POST['contact']);
$email =  mysqli_real_escape_string($connn, $_POST['email']);
$pwd = mysqli_real_escape_string($connn, $_POST['password']);
$pwd2 =mysqli_real_escape_string($connn, $_POST['confirm']);


 $sql = "SELECT username FROM usersignup;";
		$result = mysqli_query($connn, $sql);
    $row = mysqli_fetch_array($result);
    if ($row['username'] == $username) {
		header("Location: ../usersignup.php?Try another username");
		
    }
    else{

$sql = "INSERT INTO usersignup(first, last, username, contact, email, pwd, confirm) VALUES (?, ?, ?, ?, ?, ?, ?);";

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

die();}*/

if(!mysqli_stmt_prepare($stmt, $sql))
{
echo "SQL error";
exit();
}else{
	$hashedPwd = md5($pwd . $salt);
	$hashedPwdd = md5($pwd2 . $salt);
	//$options = [
	//'salt' =>custom_function_for_salt(),
	//'cost' =>12
	//];
	//$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT, $options);
mysqli_stmt_bind_param($stmt, "sssssss", $first, $last, $username, $contact, $email, $hashedPwd, $hashedPwdd);	
mysqli_stmt_execute($stmt);}

	/* 
if (mysqli_num_rows($result) > 0)
{
	while($row['username'] == $username){
header("Location: ../usersignup.php?Try another username");
	}}else{
		
*/
mysqli_query($connn, $sql);

$sql = "SELECT * FROM usersignup WHERE username='$username'";
$result = mysqli_query($connn, $sql);  
if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
	$userid = $row['username'];	
	$sql = "INSERT INTO imgupload(userid, status) VALUES ('$userid', 1)";
	mysqli_query($connn, $sql);
	header("Location: ../usersignup.php?signup = sucess");
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
die();}}}}else{
header("Location: ../usersignup.php?signup = sucess");
die();}

