<html>
<head>
	<title>Game Editor</title>
	<link rel="stylesheet" href="css/game_editor.css" type="text/css" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
	<?php
		include 'zzzzz2.php';
		$id = $_GET['id'];
		$gender1 = $id[0];
		if($gender1 == 'B') {
			$gender2 = 0;
		} else {
			$gender2 = 1;
		}
		$sql = "SELECT * FROM games WHERE id = '$id';";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$away = $row['team_away'];
		$home = $row['team_home'];
		if($row['editable'] == 0 && $row['editable'] != 2)
		{
			$sql = "UPDATE games SET editable = 1 WHERE id = '$id';";
			mysqli_query($con, $sql);
		}
		$result2 = mysqli_query($con, "SELECT * FROM players WHERE team = '$away' OR team = '$home'");
		while($row2 = mysqli_fetch_array($result2))
		{
			$result3 = mysqli_query($con, "SELECT COUNT(*) AS count FROM $id WHERE player = '" . $row2['id'] . "' LIMIT 1;");
			$row3 = mysqli_fetch_array($result3);
			if($row3['count'] == 0 && $row2['gender'] == $gender2)
			{
				mysqli_query($con, "INSERT INTO $id (player, pts, ft, 2p, 3p, fouls) VALUES (" . $row2['id'] . ", 0,0,0,0,0)");
			}
		}
	?>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script src="js/javascript.js"></script>
</head>
<body>
	<input type="hidden" id="game_id" value="<?= $id ?>" />
	<div class="team_away">
		<?php
			$sql = "SELECT COUNT(*) FROM players WHERE team = '$away' AND gender = '$gender2'";
			$result = mysqli_query($con, $sql);
			$row2 = mysqli_fetch_array($result);
			$num = $row2['COUNT(*)'];
		?>
		<select size="<?= $num + 1 ?>" class="players" id="players_away" onchange="reset_home()">
			<option value="0" selected><?= $away ?></option>
			<?php
				$sql = "SELECT * FROM players WHERE team = '$away' AND gender = '$gender2' ORDER BY number;";
				$result = mysqli_query($con, $sql);
				while($row2 = mysqli_fetch_array($result))
				{
					echo "<option value='".$row2['id']."'>".$row2['number']." ".$row2['last'].", ".$row2['first']."</option>";
				}
			?>
		</select>
	</div>
	<?php
		if($_GET['status_color'] != null)
		{
			$color = $_GET['status_color'];
		}
		else
		{
			$color = "green";
		}
	?>
	<div id="status_bar" style="background-color: <?= $color ?>;">
		<p id="status"><?= $_GET['status'] ?></p>
	</div>
	<div class="controls">
		<h1>Time Editor</h1>
		<?php
			if(strpos($row['time'], " ") !== false)
			{
				$time = substr($row['time'], 0, strpos($row['time'], " "));
				$period = substr($row['time'], strpos($row['time'], " ") + 1);
			}
			else
			{
				$time = "";
				$period = $row['time'];
			}
		?>
		<input type="text" id="time_input" value="<?= $time ?>" maxlength="14" />
		<select id="period">
			<option value="Q1">Q1</option>
			<option value="Q2">Q2</option>
			<option value="HALF">HALF</option>
			<option value="Q3">Q3</option>
			<option value="Q4">Q4</option>
			<option value="FINAL">FINAL</option>
			<option value="OT">OT</option>
			<option value="FINAL OT">FINAL OT</option>
			<option value="2OT">2OT</option>
			<option value="FINAL 2OT">FINAL 2OT</option>
		</select>
		<input type="button" value="Update Time" onclick="set_time('<?= $id ?>')" />
		<hr/>
		<h1>Score</h1>
		<h2><span id="score_away"><?= $row['score_away'] ?></span> - <span id="score_home"><?= $row['score_home'] ?></span></h2>
		<hr/>
		<h1>Game Editor</h1>
		<table id="button_panel" align="center">
			<tr>
				<td><input type="button" value="+1" style="background-color: green;" class="score_button" onclick="score(1, '<?= $id ?>')"/></td>
				<td><input type="button" value="+2" style="background-color: green;" class="score_button" onclick="score(2, '<?= $id ?>')"/></td>
				<td><input type="button" value="-1" style="background-color: red;" class="score_button" onclick="score(-1, '<?= $id ?>')"/></td>
				<td><input type="button" value="-2" style="background-color: red;" class="score_button" onclick="score(-2, '<?= $id ?>')"/></td>
			</tr>
			<tr>
				<td><input type="button" value="+3" style="background-color: green;" class="score_button" onclick="score(3, '<?= $id ?>')"/></td>
				<td><input type="button" value="+F" style="background-color: green;" class="score_button" onclick="foul(1, '<?= $id ?>')"/></td>
				<td><input type="button" value="-3" style="background-color: red;" class="score_button" onclick="score(-3, '<?= $id ?>')"/></td>
				<td><input type="button" value="-F" style="background-color: red;" class="score_button" onclick="foul(-1, '<?= $id ?>')"/></td>
			</tr>
		</table>
		<input type="button" value="Edit Player" onclick="edit_player_dialog()" />
		<input type="button" value="Manual Score Edit" onclick="score_edit_dialog()" />
		<input type="button" value="Add a Player" onclick="add_player_dialog()" />
	</div>
	<div class="team_home">
		<?php
			$sql = "SELECT COUNT(*) FROM players WHERE team = '$home' AND gender = '$gender2'";
			$result = mysqli_query($con, $sql);
			$row2 = mysqli_fetch_array($result);
			$num = $row2['COUNT(*)'];
		?>
		<select size="<?= $num + 1 ?>" class="players" id="players_home" onchange="reset_away()">
			<option value="0" selected><?= $home ?></option>
		<?php
			$sql = "SELECT * FROM players WHERE team = '$home' AND gender = '$gender2' ORDER BY number;";
			$result = mysqli_query($con, $sql);
			while($row2 = mysqli_fetch_array($result))
			{
				echo "<option value='".$row2['id']."'>".$row2['number']." ".$row2['last'].", ".$row2['first']."</option>";
			}
		?>
		</select>
	</div>
	<div id="edit_player" style="display:none;" title="Edit Player">
		<form id="edit_player_form" action="actions/edit_player.php" method="POST" onsubmit="return edit_player()">
			<input type="number" name="number" id="edit_num" placeholder="Number"/>
			<input type="text" name="last" id="edit_last" placeholder="Last Name"/>
			<input type="text" name="first" id="edit_first" placeholder="First Name"/>
			<input type="hidden" name="id" value="<?= $id ?>"/>
			<input type="hidden" name="player_id" id="edit_id"/>
			<input type="submit" value="Submit"/>
			<input type="button" value="Cancel" onclick="cancel_edit()"/>
		</form>
	</div>
	<div id="score_edit" style="display:none;" title="Manual Score Edit">
		<form id="score_edit_form" action="actions/score_edit.php" method="POST" onsubmit="return score_edit()">
			<?= $row['team_away'] ?>:<input type="number" name="away" id="edit_away" /><br/>
			<?= $row['team_home'] ?>:<input type="number" name="home" id="edit_home" /><br/>
			<input type="hidden" name="id" value="<?= $id ?>"/>
			<input type="submit" value="Submit" />
			<input type="button" value="Cancel" onclick="cancel_score_edit()" />
		</form>
	</div>
	<div id="add_player" style="display:none;" title="Add a Player">
		<form id="add_player_form" action="actions/add_player.php" method="POST" onsubmit="return add_player()">
			<select name="team">
				<option disabled selected>Select team</option>
				<option value="<?= $away ?>"><?= $away ?></option>
				<option value="<?= $home ?>"><?= $home ?></option>
			</select>
			<input type="number" name="number" placeholder="Number"/>
			<input type="text" name="last" placeholder="Last Name"/>
			<input type="text" name="first" placeholder="First Name"/>
			<input type="text" name="gender" placeholder="Type'Boy' or 'Girl'"/>
			<input type="hidden" name="id" value="<?= $id ?>"/>
			<input type="submit" value="Submit"/>
		</form>
	</div>
	<script>
		document.getElementById('period').value = '<?= $period ?>';
	</script>
</body>
</html>