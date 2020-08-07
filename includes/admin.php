<?php
session_start();
include_once 'dbhh.php';
if(isset($_POST['submit'])){
	$username = mysqli_real_escape_string($connn, $_POST['fname']);
$passcode = mysqli_real_escape_string($connn, $_POST['password']);

// $_SESSION['name'] = 'Aron Kipkirui';
//header("Location: ../Aryenn.php");
    $dbservername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "mysignup";
    
    $conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
     $username = $_POST['fname'];
    $passcode = $_POST['password'];
    //injection avoid
    $username = mysqli_real_escape_string($conn, $username);
    $passcode = mysqli_real_escape_string($conn, $passcode);
    //query db for student
	    $sql = "SELECT * FROM admin WHERE Name = '$username' AND Password = '$passcode'";
		$result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if ($row['Name'] == $username && $row['Password'] == $passcode) {
		header("Location: ../class.php?login = sucess");
		
    }
    else{
        header("Location: ../Aryenn.php?Match=NotFound");
        
} }  
	/*
    
	$sql = "SELECT * FROM student2 WHERE admission=? OR email=?;";
    
$stmt = mysqli_stmt_init($connn);
if(!mysqli_stmt_prepare($stmt, $sql))
{ 
header("Location: ../Aryenn.php?error=sqlerror");
exit();
}else{
	//$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
	mysqli_stmt_bind_param($stmt, "ss", $username, $username);
mysqli_stmt_execute($stmt);
$result= mysqli_stmt_get_result($stmt);
if($row = mysqli_fetch_assoc($result)){
	$pwdCheck = password_verify($passcode, $row['password']);
	if($pwdCheck == false){
	header("Location: ../Aryenn.php?error=wrongpwd");
exit();
	}else if($pwdCheck == true){
		session_start();
		$_SESSION['userId'] = $row['id'];
		$_SESSION['userFirst'] = $row['first'];
		$_SESSION['userLast'] = $row['last'];
		$_SESSION['userAdm'] = $row['admission'];
		header("Location: ../class.php?login=success");
exit();
		
	}else{
		header("Location: ../Aryenn.php?error=wrongpwd");
exit();
	}
}
else{
header("Location: ../Aryenn.php?error=nouser");
exit();		
}
}}	
*/
	