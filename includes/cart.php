<?php
session_start();
include_once 'dbhh.php';
if(isset($_POST['add'])){
	if(isset($_SESSION["shopping_cart"])){
		if (! function_exists('array_column')) {
    function array_column(array $input, $columnKey, $indexKey = null) {
      
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["idGallery"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
		$item_array = array(
		'item_id' => $_GET["id"],
		'item_name' => $_POST["hidden_name"],
		'item_price' => $_POST["hidden_price"],
		'item_quantity' => $_POST["quantity"],
		);		
		$_SESSION["shopping_cart"][$count] = $item_array;
		}else{
		echo '<script>alert("Item Already Added")</script>';
		echo '<script>window.location="carsold.php"</script>';
		}}}
	else{
		$item_array = array(
		'item_id' => $_GET["idGallery"],
		'item_name' => $_POST["hidden_name"],
		'item_price' => $_POST["hidden_price"],
		'item_quantity' => $_POST["quantity"],
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}
	if(isset($_GET["action"])){
		if($_GET["action"] == "delete")
		{
			foreach($_SESSION["shopping_cart"] as $keys => $values)
			{
			if($values["item_id"] == $_GET["idGallery"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
						echo '<script>window.location="../carsold.php"</script>';

			}				
			}
		}
	}
}
	
 //$_SESSION['username'] = "Admin";
?>
/*$email = mysqli_real_escape_string($connn, $_POST['email']);
$passcode = mysqli_real_escape_string($connn, $_POST['password']);

// $_SESSION['name'] = 'Aron Kipkirui';
//header("Location: ../Aryenn.php");
    $dbservername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "mysignup";
    
    $conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
     $email = $_POST['email'];
    $passcode = $_POST['password'];
    //injection avoid
    $email = mysqli_real_escape_string($conn, $email);
    $passcode = mysqli_real_escape_string($conn, $passcode);
    //query db for student
	    $sql = "SELECT * FROM sellersignup WHERE email = '$email' AND pwd = '$passcode'";
		$result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if ($row['email'] == $email && $row['pwd'] == $passcode) {
		header("Location: ../carsellers.php?login = sucess");
		
    }
    else{
        header("Location: ../sellerlogin.php?Match=NotFound");
        
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
	