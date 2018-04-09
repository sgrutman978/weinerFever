<?php
 		  include 'zzzzz.php';
		  $stats = array();
		  $id = addslashes($_POST['id']);
		  // $id = 'B1';
			$result = mysqli_query($con, "SELECT * FROM ".$id." INNER JOIN players ON ".$id.".player=players.id;");
			while($row = mysqli_fetch_array($result))
			{
				array_push($stats, array(substr($row['last'], 0, 1), $row['first'], $row['team'], $row['pts'], $row['ft'], $row['2p'], $row['3p'], $row['fouls'], $row['id'], $row['number']));
			}
			echo json_encode($stats);
?>