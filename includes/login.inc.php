<?php
if(isset($_POST['login'])){
	require 'dbhh.php';
	
	$mailadm = $_POST['username'];
	$password = $_POST['pwd'];
	
	if(empty($mailadm) || empty($password)){
		header("Location ../Aryenn.php?error=emptyfields");
	exit();
	}else{
	$sql = "SELECT * FROM student2 WHERE admission=? OR email=?;";
$stmt = mysqli_stmt_init($connn);
if(!mysqli_stmt_prepare($stmt, $sql)){
		header("Location ../Aryenn.php?error=sqlerror");
	exit();
}	else{
	mysqli_stmt_bind_param($stmt, "ss", $mailadm, $mailadm);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	if($row = mysqli_fetch_assoc($result))
		$pwdCheck = password_verify($password, $row['password']);
	if($pwdCheck == false){
			header("Location ../Aryenn.php?error=wrongpwd");
	exit();	
	}elseif($pwdCheck == true){
		session_start();
		$_SESSION['userId'] = $row['id'];
		$_SESSION['userAdm'] = $row['admission'];
		
				header("Location ../Aryenn.php?login=success");
	exit();
	}
	else{
			header("Location ../Aryenn.php?error=nouser");
	exit();
	}
	}
	}
	
}
	
else
{
	header("Location ../Aryenn.php");
	exit();
}