<?php
	$game = $_POST['id'];
	$away = $_POST['away'];
	$home = $_POST['home'];
include 'zzzzz.php';
	$sql = "UPDATE games SET score_away = $away WHERE id = '$game';";
	mysqli_query($con, $sql);
	$sql = "UPDATE games SET score_home = $home WHERE id = '$game';";
	mysqli_query($con, $sql);
	$sql = "UPDATE games SET reliable = 0 WHERE id = '$game';";
	mysqli_query($con, $sql);
	header("Location: ../game_edit.php?id=$game&status=New score reflected below.");
?>