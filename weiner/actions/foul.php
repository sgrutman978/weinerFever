<?php
	$id = $_POST['id'];
	$game = $_POST['game'];
	$val = $_POST['val'];
	if($id != null && $id != "" && $game != null && $game != "" && $val != null && $val != "")
	{
include 'zzzzz.php';
		$sql = "SELECT * FROM $game WHERE player = $id;";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		if($row['fouls'] + $val >= 0)
		{
			$sql = "UPDATE $game SET fouls = fouls + $val WHERE player = $id;";
			if(mysqli_query($con, $sql))
			{
				echo json_encode(array("color" => "green", "message" => "Player ".$id." foul ".$val));
			}
			else
			{
				echo json_encode(array("color" => "red", "message" => mysqli_error($con)));
			}
		}
		else
		{
			echo json_encode(array("color" => "red", "message" => "Fouls not changed. This action would make the fouls for this player negative."));
		}
	}
	else
	{
		echo json_encode(array("color" => "red", "message" => "Error in data passage or field was left blank"));
	}
?>