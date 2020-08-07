<?
include_once 'dbhhhh.php';

$sql = "SELECT id, name, txt FROM forum2";
$result = mysqli_query($connnn, $sql);

if (mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result)){
		echo '<h3>ID: ' . $row["id"]. '</h3>
		<h3>Name: ' . $row["name"]. '</h3><br />
		<p>' . $row["txt"]. '</p>
		';
	}}else{
		echo "<div class='font'>";
	echo "Ooops!! Machakos University have no student signed up yet!";
	echo "</div>";
?>