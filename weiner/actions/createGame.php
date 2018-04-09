<?php
include 'zzzzz.php';
if(isset($_POST['id']) && isset($_COOKIE['wordOfPass']) && $_POST['password'] == ){
mysqli_query($con, 
	"CREATE TABLE " . $_POST['id'] . "
(
player tinyint(3),
pts tinyint(3),
ft tinyint(3),
2p tinyint(3),
3p tinyint(3),
fouls tinyint(3)
);");
mysqli_query($con, "INSERT INTO games (id, name, location, team_away, team_home, dateTime) VALUES ('" . $_POST['id'] . "', '" . $_POST['name'] . "', '" . $_POST['location'] . "', '" . $_POST['team_away'] . "', '" . $_POST['team_home'] . "', '" . $_POST['dateTime'] . "')");
}
echo "<script>window.location.href = '/game_select.php';</script>";
?>