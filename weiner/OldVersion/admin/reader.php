<?php
include 'zzzzw.php';
$result = mysqli_query($con,"SELECT * FROM games WHERE id = " . $_GET['ids']);
                while ($row = mysqli_fetch_array($result)) {
				mysqli_query($con,"UPDATE players SET " . $row['gameNumb'] . $_GET['pointVal'] . " = " . $row['gameNumb'] . $_GET['pointVal'] . "+1 WHERE team = '" . $row[$_GET['team']] . "' AND gender = " . $row['gender'] . " AND playerNumber = " . $_GET['playerNumb']);
				mysqli_query($con,"UPDATE players SET total" . $_GET['pointVal'] . " = total" . $_GET['pointVal'] . "+1 WHERE team = '" . $row[$_GET['team']] . "' AND gender = " . $row['gender'] . " AND playerNumber = " . $_GET['playerNumb']);
				if($_GET['pointVal'] != 'fouls'){
				mysqli_query($con,"UPDATE players SET totalPoints = totalPoints + " . $_GET['pointVal2'] . " WHERE team = '" . $row[$_GET['team']] . "' AND gender = " . $row['gender'] . " AND playerNumber = " . $_GET['playerNumb']);
				mysqli_query($con,"UPDATE games SET " . $_GET['team'] . "_score = " . $_GET['team'] . "_score+" . $_GET['pointVal2'] . " WHERE id = " . $_GET['ids']);
				}
				}
?>