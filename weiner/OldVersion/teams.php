<?php
include 'zzzzw.php';
echo "<div style='font-size:25px;font-family:Headland One;background-color:ivory;color:black;text-align:center;width:94%;position:relative;margin-left:3%;float:left;min-height:1000px'>";
echo "<span style='font-size:45px'>Boys Standings</span></br>";
echo "<table border='1'>";
echo "<tr><td>Team</td><td>Wins</td><td>Losses</td></tr>";
$result4 = mysqli_query($con,"SELECT * FROM teams WHERE gender = 1");
                while ($row4 = mysqli_fetch_array($result4)) {
				echo "<tr><td>" . $row4['name'] . "</td><td>" . $row4['wins'] . "</td><td>" . $row4['losses'] . "</td></tr>";
				}
?>
</br>

<?php
include 'zzzzw.php';
$result = mysqli_query($con,"SELECT * FROM teams");
                while ($row = mysqli_fetch_array($result)) {
echo "<span style='font-size:45px'>" . $row['name'] . " "; 
if($row['gender'] == 1){
echo 'Boys';
}else{
echo 'Girls';
}
echo "</span></br><img style='height:400px' src='" . $row['teamPic'] . "' /></br></br>";
$result2 = mysqli_query($con,"SELECT * FROM players WHERE team = '" . $row['name'] . "' AND gender = " . $row['gender']);
                while ($row2 = mysqli_fetch_array($result2)) {
				echo $row2['playerNumber'] . " " . $row2['playerName'] . "</br>";
				}
}

echo "</div>";
?>
