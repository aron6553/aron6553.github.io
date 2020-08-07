<?php
include_once 'dbhh.php';
if(isset($_POST['submit'])){
$first = mysqli_real_escape_string($connn, $_POST['first']);
$last =  mysqli_real_escape_string($connn, $_POST['last']);
$username =  mysqli_real_escape_string($connn, $_POST['username']);
$contact =  mysqli_real_escape_string($connn, $_POST['contact']);
$gname =  mysqli_real_escape_string($connn, $_POST['gname']);
$location =  mysqli_real_escape_string($connn, $_POST['location']);
$services =  mysqli_real_escape_string($connn, $_POST['services']);
$email =  mysqli_real_escape_string($connn, $_POST['email']);
$pwd = mysqli_real_escape_string($connn, $_POST['password']);
$pwd2 =mysqli_real_escape_string($connn, $_POST['confirm']);

$sql = "SELECT username FROM garagesignup;";
		$result = mysqli_query($connn, $sql);
    $row = mysqli_fetch_array($result);
    if ($row['username'] == $username) {
		header("Location: ../usersignup.php?Try another username");
		
    }
    else{
$sql = "INSERT INTO garagesignup(first, last, username, contact, gname, location, services, email, pwd, confirm) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ? );";

	$stmt = mysqli_stmt_init($connn);
		
/*if(!mysqli_stmt_prepare($stmt, $sql))
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
	$hashedPwd = md5($pwd . $salt);
	$hashedPwdd = md5($pwd2 . $salt);
	//$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
mysqli_stmt_bind_param($stmt, "ssssssssss", $first, $last, $username, $contact, $gname, $location, $services, $email, $hashedPwd, $hashedPwdd);	
mysqli_stmt_execute($stmt);}
mysqli_query($connn, $sql);
$sql = "SELECT * FROM garagesignup WHERE username='$username'";
$result = mysqli_query($connn, $sql);  
if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
	$userid = $row['username'];	
	$sql = "INSERT INTO imguploadgarage(userid, status) VALUES ('$userid', 1)";
	mysqli_query($connn, $sql);
	header("Location: ../garagesign.php?signup = sucess");
	}
}else{
echo "You have an error";}

	if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last) || !preg_match("/^[a-zA-Z]*$/", $user)){
		header("Location: ../usersignup.php?signup = char");
die();
}else{
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: ../garagesign.php?signup=email&first=$first&last=$last");
	die();
	}else{
	header("Location: ../garagesign.php?signup = sucess");
die();}}}}else{
header("Location: ../garagesign.php");
die();}
