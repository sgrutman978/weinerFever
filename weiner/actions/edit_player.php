<?php
	$id = $_POST['player_id'];
	$number = $_POST['number'];
	$last = $_POST['last'];
	$first = $_POST['first'];
include 'zzzzz.php';
	$sql = "SELECT * FROM players WHERE id = $id;";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	if($row['number'] != $number)
	{
		$sql = "UPDATE players SET number = $number WHERE id = $id;";
		mysqli_query($con, $sql);
	}
	if($row['last'] != $last)
	{
		$sql = "UPDATE players SET last = '$last' WHERE id = $id;";
		mysqli_query($con, $sql);
	}
	if($row['first'] != $first)
	{
		$sql = "UPDATE players SET first = '$first' WHERE id = $id;";
		mysqli_query($con, $sql);
	}
	header("Location: ../game_edit.php?id=".$_POST['id']);
?>