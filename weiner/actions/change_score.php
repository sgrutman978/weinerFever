<?php
	$id = $_POST['id'];
	$score = $_POST['val'];
	$game = $_POST['game'];
	$team = $_POST['team'];
	if($id != null && $id != "" && $game != null && $game != "" && $score != null && $score != "" && $team != null && $team != "")
	{
include 'zzzzz.php';
		$sql = "SELECT score_$team AS score FROM games WHERE id = '$game' LIMIT 1;";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		if($row['score'] + $score >= 0)
		{
			$sql = "UPDATE games SET score_$team = score_$team + $score WHERE id = '$game' LIMIT 1;";
			if(mysqli_query($con, $sql))
			{
				$valid = false;
				switch($score)
				{
					case 1:
						$sql = "UPDATE $game SET ft = ft + 1 WHERE player = $id;";
						$valid = true;
						break;
					case 2:
						$sql = "UPDATE $game SET 2p = 2p + 1 WHERE player = $id;";
						$valid = true;
						break;
					case 3:
						$sql = "UPDATE $game SET 3p = 3p + 1 WHERE player = $id;";
						$valid = true;
						break;
					case -1:
						$sql = "SELECT * FROM $game WHERE player = $id;";
						$result = mysqli_query($con, $sql);
						$row2 = mysqli_fetch_array($result);
						if($row2['ft'] >= 1)
						{
							$sql = "UPDATE $game SET ft = ft - 1 WHERE player = $id;";
							$valid = true;
						}
						break;
					case -2:
						$sql = "SELECT * FROM $game WHERE player = $id;";
						$result = mysqli_query($con, $sql);
						$row2 = mysqli_fetch_array($result);
						if($row2['2p'] >= 1)
						{
							$sql = "UPDATE $game SET 2p = 2p - 1 WHERE player = $id;";
							$valid = true;
						}
						break;
					case -3:
						$sql = "SELECT * FROM $game WHERE player = $id;";
						$result = mysqli_query($con, $sql);
						$row2 = mysqli_fetch_array($result);
						if($row2['3p'] >= 1)
						{
							$sql = "UPDATE $game SET 3p = 3p - 1 WHERE player = $id;";
							$valid = true;
						}
						break;
				}
				if(mysqli_query($con, $sql) && $valid)
				{
					$sql = "UPDATE $game SET pts = pts + $score WHERE player = $id;";
					if(mysqli_query($con, $sql))
					{
						$sql = "SELECT score_$team AS score FROM games WHERE id = '$game' LIMIT 1;";
						$result = mysqli_query($con, $sql);
						$row = mysqli_fetch_array($result);
						echo json_encode(array("color" => "green", "message" => "Player ".$id." score ".$score, "score" => $row['score']));
						$sql = "UPDATE players SET score = score + $score WHERE player = $id;";
						mysqli_query($con, $sql);
					}
					else
					{
						echo json_encode(array("color" => "red", "message" => mysqli_error($con)));
					}
				}
				else
				{
					echo json_encode(array("color" => "red", "message" => "Score not changed. This action would make the player's score negative."));
				}
			}
			else
			{
				echo json_encode(array("color" => "red", "message" => mysqli_error($con)));
			}
		}
		else
		{
			echo json_encode(array("color" => "red", "message" => "Score not changed. This action would make the score negative."));
		}
	}
	else
	{
		echo json_encode(array("color" => "red", "message" => "Error in data passage or field was left blank"));
	}
?>