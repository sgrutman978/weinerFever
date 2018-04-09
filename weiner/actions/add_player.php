<?php
	$team = $_POST['team'];
	$number = $_POST['number'];
	$last = $_POST['last'];
	$first = $_POST['first'];
	if($_POST['gender'] == 'Girl'){
$gender = 1;
	}else{
$gender = 0;
	}
		
	$id = $_POST['id'];
	if($team != null && $team != "" && $number != null && $number != "" && $last != null && $last != "" && $first != null & $first != "")
	{
include 'zzzzz.php';
		$sql = "INSERT INTO players (last, first, number, team, gender) VALUES ('$last', '$first', '$number', '$team', '$gender');";
		if(mysqli_query($con, $sql))
		{
			echo "<a href='/game_edit.php?id=$id&status=Player added'>Return</a>";
		}
	}
?>