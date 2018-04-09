<?php
	$id = $_POST['val'];
include 'zzzzz.php';
	$sql = "SELECT * FROM players WHERE id = $id;";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	echo json_encode(array(
		"id" => $id,
		"number" => $row['number'],
		"last" => $row['last'],
		"first" => $row['first'],
		"team" => $row['team']
	));
?>