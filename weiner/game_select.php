<html>
<head>
	<title>Game Select</title>
</head>
<body>
	<table border="1">
		<tr>
			<td>ID</td>
			<td>Game</td>
			<td>Away</td>
			<td>Home</td>
			<td>Gym</td>
		</tr>
	<?php
include 'zzzzz2.php';
		$sql = "SELECT * FROM games;";
		$result = mysqli_query($con, $sql);
		while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>".$row['id']."</td>";
			echo "<td><a href='game_edit.php?id=".$row['id']."'>".$row['name']."</a></td>";
			echo "<td>".$row['team_away']."</td>";
			echo "<td>".$row['team_home']."</td>";
			echo "<td>".$row['location']."</td>";
			echo "</td>";
		}
	?>
	</table>
<!-- 	</br></br>
	Create New Game:</br>
<form action="actions/createGame.php" method="POST">
ID: <input type="text" name="id" /></br>
Name: <input type="text" name="name" /></br>
Location (Gym Name): <input type="text" name="location" /></br>
Away Team: <input type="text" name="team_away" /></br>
Home Team: <input type="text" name="team_home" /></br>
Date+Time: <input type="text" name="dateTime" /></br>
<input type="submit" name="submit" />
	</form> -->
</body>
</html>