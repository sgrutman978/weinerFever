<?php

include 'zzzzw.php';
if($_POST['passcode'] != "magic"){
header("Location: index.php?wrong=1");
}else{
setcookie("password", "magic");
}


for($ii = 1; $ii < 5; $ii++){
echo "<div style='font-size:45px;font:bold'>12/" . ($ii + 3) . "/13</div>";
$result = mysqli_query($con,"SELECT * FROM games WHERE day = " . $ii);
                while ($row = mysqli_fetch_array($result)) {
	echo "<form action='backEnd.php' method='GET'><input style='left:-10000px;position:absolute' name='gameNumb' value='" . $row['gameNumb'] . "' /><input style='left:-10000px;position:absolute' name='ids' value='" . $row['id'] . "' /><input style='float:left' type='submit' value='" . $row['team1'] . " vs. " . $row['team2'] . " at " . $row['time'] . "' /></form>";
 }
 echo "</br></br></br>";
 }

?>

