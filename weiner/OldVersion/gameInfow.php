<?php
include 'zzzzw.php';
$result = mysqli_query($con,"SELECT * FROM games WHERE id = " . $_GET['ids']);
                while ($row = mysqli_fetch_array($result)) {
				$team1 = $row['team1'];
				$team2 = $row['team2'];
echo "<div style='font-family:Headland One;background-color:ivory;text-align:left;width:94%;position:relative;margin-left:3%;float:left;height:450px'>
<div style='position:absolute;width:94%;height:17%;top:2%;margin-left:3%;font-size:28px;color:black;text-align:center'><span style='float:left'>";
if($row['live'] == 1){
echo $row['gameTime'];
}else{
echo $row['time'];
}
echo "</span>";
echo $row['team1_score'] . " " . $row['team1'] . " VS. " . $row['team2'] . " " . $row['team2_score'];
echo "<span style='float:right'>";
if($row['gender'] == 1){
echo 'Boys';
}else{
echo 'Girls';
}

echo "</span></div><div style='position:absolute;width:100%;height:1%;top:10%;left:0px;background-color:black'></div>
<div style='position:absolute;width:47%;height:84%;top:13%;left:2%;font-size:18px;color:black'>";
echo "<div style='float:left;width:48%'>Name</div><div style='float:left;width:9%'>Pts</div><div style='float:left;width:8%'>FT</div><div style='float:left;width:11%'>2Pts</div><div style='float:left;width:11%'>3Pts</div><div style='float:left;width:10%'>Fouls</div></br>";				
$result2 = mysqli_query($con,"SELECT * FROM players WHERE team = '" . $row['team1'] . "' AND gender = " . $row['gender']);
                while ($row2 = mysqli_fetch_array($result2)) {
				$temp=$row2['playerName'];
				$first=strstr($temp, " ", true);
				$last=strstr($temp, " ");
				$last=substr($last,0, 2);
				echo "<div style='float:left;width:49%'>" . $first . " " . $last . ".</div><div style='float:left;width:9%'>" . ($row2[$row['gameNumb'] . '1pt'] + ($row2[$row['gameNumb'] . '2pt']*2) + ($row2[$row['gameNumb'] . '3pt'])*3) . "</div><div style='float:left;width:10%'>" . $row2[$row['gameNumb'] . '1pt'] . "</div><div style='float:left;width:11%'>" . $row2[$row['gameNumb'] . '2pt'] . "</div><div style='float:left;width:11%'>" . $row2[$row['gameNumb'] . '3pt'] . "</div><div style='float:left;width:10%'>" . $row2[$row['gameNumb'] . 'fouls'] . "</div></br>";
				}
				echo "</div><div style='position:absolute;width:47%;height:84%;top:13%;left:51%;font-size:18px;color:black'>";
				echo "<div style='float:left;width:48%'>Name</div><div style='float:left;width:9%'>Pts</div><div style='float:left;width:8%'>FT</div><div style='float:left;width:11%'>2Pts</div><div style='float:left;width:11%'>3Pts</div><div style='float:left;width:10%'>Fouls</div></br>";
				$result3 = mysqli_query($con,"SELECT * FROM players WHERE team = '" . $row['team2'] . "' AND gender = " . $row['gender']);
                while ($row3 = mysqli_fetch_array($result3)) {
				$temp=$row3['playerName'];
				$first=strstr($temp, " ", true);
				$last=strstr($temp, " ");
				$last=substr($last,0, 2);
				echo "<div style='float:left;width:49%'>" . $first . " " . $last . ".</div><div style='float:left;width:9%'>" . ($row3[$row['gameNumb'] . '1pt'] + ($row3[$row['gameNumb'] . '2pt']*2) + ($row3[$row['gameNumb'] . '3pt'])*3) . "</div><div style='float:left;width:10%'>" . $row3[$row['gameNumb'] . '1pt'] . "</div><div style='float:left;width:11%'>" . $row3[$row['gameNumb'] . '2pt'] . "</div><div style='float:left;width:11%'>" . $row3[$row['gameNumb'] . '3pt'] . "</div><div style='float:left;width:10%'>" . $row3[$row['gameNumb'] . 'fouls'] . "</div></br>";
				}
echo "</div>";

echo "
</div>
";

}
?>

			