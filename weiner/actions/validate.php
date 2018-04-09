<?php
	$game = $_GET['id'];
	include 'zzzzz.php';
	$sql = "SELECT editable FROM games WHERE id = '$game';";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	if($row['editable'] == 1 || $row['editable'] == 0)
	{
		echo "200";
	}
	else
	{
		echo "Error";
	}
?>