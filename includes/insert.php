<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
$con= mysqli_connect("localhost", "root","","mksu5");
if(!$con)
{
die('Could not connect:' .mysql_error());	
}
mysql_select_db( $con);
$sql= "insert into entry(firstname, lastname) VALUES ('$_POST[fname]', '$_POST[lname]')";
if(!mysql_query($sql, $con))
{
die('Error:' .mysql_error());	
}
echo "1 record added";
mysql_close($con)
?>
</body>
</html>