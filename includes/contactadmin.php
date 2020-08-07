<?php
if(isset($_POST['submit'])){
	
	$name = $_POST['name'];
	$subject = $_POST['subject'];
	$mailFrorm = $_POST['mail'];
	$message = $_POST['message'];
	
	$mailTo = "akipkiruiyegon@gmail.com";
	$headers = "From: ".$mailFrorm;
	$txt = "You have received an e-mail from ".$name.".\n\n".$message;
	
	mail($mailTo, $subject, $txt, $headers);
	header("Location: contactadmin.php?mailsend");
}
?>