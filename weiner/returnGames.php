<?php
 	include 'zzzzz.php';
 	$result3 = mysqli_query($con, "SELECT COUNT(*) AS count FROM games;");
	$row3 = mysqli_fetch_array($result3);
	$scores = array($row3['count']);
	if($_POST['getAll']) {
		$result = mysqli_query($con, "SELECT * FROM games WHERE editable != 0;");	
	}
	else {
		$result = mysqli_query($con, "SELECT * FROM games WHERE editable = 1;");
	}
	while($row = mysqli_fetch_array($result))
	{
		array_push($scores, array($row['score_away'], $row['score_home'], $row['time'], $row['editable'], $row['id']));
	}
	echo json_encode($scores);
?>