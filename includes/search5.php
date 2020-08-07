<?php 
 include 'search.dbh.php';
 require 'headersearchadmin.php';
 ?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

 <h4>SEARCH PAGE</h4>

<?php
if(isset($_POST['submit'])){
	$search = mysqli_real_escape_string($conn, $_POST['search']);
	$sql = "SELECT idGallery, nameGallery, contactGallery, locationGallery, descGallery FROM cargallery1 WHERE idGallery LIKE '%$search%' OR nameGallery LIKE '%$search%' OR contactGallery LIKE '%$search%' OR locationGallery LIKE '%$search%' OR descGallery LIKE '%$search%'";
	$resultSet = "SELECT gname, location, services FROM garagesignup WHERE gname LIKE '%$search%' OR location LIKE '%$search%' OR services LIKE '%$search%'";
			$result = mysqli_query($conn, $sql);
	$result2 =  mysqli_query($conn, $resultSet);
echo '<table  border=3px cell padding=10px bgcolor="#4CAF50"><tr><th>Id</th><th>Name of the seller</th><th>seller contact</th><th>seller location</th><th>car description</th></tr>';
	$queryResult = mysqli_num_rows($result);
if($queryResult > 0 ){

		while($row = mysqli_fetch_assoc($result)){
			echo '<tr>
			<td>'.$row['idGallery'].'</h3></td>
			<td><p>'.$row['nameGallery'].'</p></td>
			<td><p>'.$row['contactGallery'].'</p></td>
			<td><p>'.$row['locationGallery'].'</p></td>
			<td><p>'.$row['descGallery'].'</p></td>
			</tr><br />
			';
		}

	//$resultSet = "SELECT gname, location, services FROM garagesignup WHERE gname LIKE '%$search%' OR location LIKE '%$search%' OR services LIKE '%$search%'";
	//$result2 =  mysqli_query($conn, $resultSet);

	
		}
		}

else{
	echo "No results found";
}
	
?>
</div>
</div>
</body>
</html>