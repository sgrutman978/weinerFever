<?php
	$time = $_POST['time'];
	$id = $_POST['id'];
	if($time != null && $time != "" && $id != null && $id != "")
	{
		include 'zzzzz.php';
		$sql = "UPDATE games SET time = '".$time."' WHERE id = '".$id."';";
		if(mysqli_query($con, $sql)) {
			if($time == "FINAL" || $time == "FINAL OT" || $time == "FINAL 2OT") {
				echo json_encode(array("color" => "green", "message" => "Game $id time updated to $time", "lock" => true));
			} else {
				echo json_encode(array("color" => "green", "message" => "Game $id time updated to $time"));
			}
		}
	}
	else
	{
		echo json_encode(array("color" => "red", "message" => "Error in data passage or field was left blank"));
	}

	//Twitter
	if($time == "HALF" || $time == "FINAL" || $time == "FINAL OT" || $time == "FINAL 2OT") {
		$sql = "SELECT * FROM games WHERE id = '$id';";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		require_once('../Codebird/codebird.php');
		\Codebird\Codebird::setConsumerKey("qYKvOEgXZ2frIcxcBfMlBgECA", "ZwiXLaNtPXxUhkYaWmA1Z5sX1jjRu86SOgEizup3kDQsjhVy6i");
		$cb = \Codebird\Codebird::getInstance();
		$cb -> setToken("2207994014-kjNjxUviGl8Xhi8jybdXjE8sGfxeeZNywleoOI7", "y1xPzObolBUyL1GJ3Fpq3jno0eKhsf0pkAzjyqcCzAZox");
		switch($time) {
			//Halftime Tweet
			case "HALF":
				$status = "Halftime at ".$row['name'].". ".$row['team_away']." ".$row['score_away'].", ".$row['team_home']." ".$row['score_home'].".";
				break;
			//Final Tweet
			case "FINAL":
				$scenario = rand(1,3);
				if($row['score_away'] > $row['score_home']) {
					switch($scenario) {
						case 1:
							$status = $row['team_away']." defeats ".$row['team_home']." ".$row['score_away']." to ".$row['score_home']." in ".$row['name'];
							break;
						case 2:
							$status = $row['team_away']." comes away with a win against ".$row['team_home']." ".$row['score_away']." to ".$row['score_home']." in ".$row['name'];
							break;
						case 3:
							$status = $row['team_away']." with ".$row['score_away']." takes down ".$row['team_home']." with ".$row['score_home']." in ".$row['name'];
							break;
					}
				} else {
					switch($scenario) {
						case 1:
						$status = $row['team_home']." defeats ".$row['team_away']." ".$row['score_home']." to ".$row['score_away']." in ".$row['name'];
						break;
					case 2:
						$status = $row['team_home']." wins against ".$row['team_away']." ".$row['score_home']." to ".$row['score_away']." in ".$row['name'];
						break;
					case 3:
						$status = $row['team_home']." takes down ".$row['team_away']." ".$row['score_home']." to ".$row['score_away']." in ".$row['name'];
						break;
					}
				}
				break;
			//Final OT Tweet
			case "FINAL OT":
				if($row['score_away'] > $row['score_home']) {
					$status = $row['team_away']." defeats ".$row['team_home']." ".$row['score_away']." to ".$row['score_home']." in ".$row['name']." in overtime";
				} else {
					$status = $row['team_home']." defeats ".$row['team_away']." ".$row['score_home']." to ".$row['score_away']." in ".$row['name']." in overtime";
				}
				break;
			//Final 2OT Tweet
			case "FINAL 2OT":
				if($row['score_away'] > $row['score_home']) {
					$status = $row['team_away']." defeats ".$row['team_home']." ".$row['score_away']." to ".$row['score_home']." in ".$row['name']." in double overtime";
				} else if($row['score_home'] > $row['score_away']) {
					$status = $row['team_home']." defeats ".$row['team_away']." ".$row['score_home']." to ".$row['score_away']." in ".$row['name']." in double overtime";
				} else {
					$status = $row['team_home']." ties ".$row['team_away']." ".$row['score_home']." to ".$row['score_away']." in ".$row['name']." in double overtime";
				}
				break;
		}
		$params = array("status" => $status);
		$reply = $cb -> statuses_update($params);
	}
	
	//Update standings and set game as inactive
	if($time == "FINAL" || $time == "FINAL OT" || $time == "FINAL 2OT") {
		if($row['gender'] == 0) {
			$gender = "Boys";
		} else {
			$gender = "Girls";
		}
		mysqli_query($con, "UPDATE games SET editable = 2 WHERE id = '$id';");
		if($row['score_away'] > $row['score_home']) {
			mysqli_query($con, "UPDATE teams SET wins = wins + 1 WHERE name = '".$row['team_away']."' AND league = '$gender';");
			mysqli_query($con, "UPDATE teams SET losses = losses + 1 WHERE name = '".$row['team_home']."' AND league = '$gender';");
		} else {
			mysqli_query($con, "UPDATE teams SET wins = wins + 1 WHERE name = '".$row['team_home']."' AND league = '$gender';");
			mysqli_query($con, "UPDATE teams SET losses = losses + 1 WHERE name = '".$row['team_away']."' AND league = '$gender';");
		}
	}
?>