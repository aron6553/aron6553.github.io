<?php
include_once 'virg.php';
if(isset($_POST['submit'])){
	session_start();
$_SESSION['email'] = $_POST['email'];
$email = mysqli_real_escape_string($connn, $_POST['email']);
$password = mysqli_real_escape_string($connn, $_POST['password']);

    //injection avoid
    $email = mysqli_real_escape_string($connn, $email);
    $passcode = mysqli_real_escape_string($connn, $password);
    //query db for student
	    $sql = "SELECT * FROM virgsign WHERE email = '$email' AND password = '$password'";
		$result = mysqli_query($connn, $sql);
    $row = mysqli_fetch_array($result);
    if ( $row['email'] == $email && $row['password'] == $password) {
		header("Location: ../virguser.php?login = sucess");
		
    }
    else{
        header("Location: ../virglogin.php?Match=NotFound");
        
} }  
	