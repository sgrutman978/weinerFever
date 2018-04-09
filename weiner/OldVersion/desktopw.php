<?php
include 'zzzzw.php';
$result = mysqli_query($con,"SELECT * FROM games WHERE day = " . $_GET['day']);
                while ($row = mysqli_fetch_array($result)) {
echo "<div style='font-family:Headland One;background-color:ivory;text-align:left;width:45%;position:relative;margin:25px;float:left;height:220px'>
<div style='position:absolute;width:94%;height:17%;top:2%;margin-left:3%;font-size:28px;color:black'>
";
if($row['gender'] == 1){
echo 'Boys';
}else{
echo 'Girls';
}
echo "<span style='position:absolute;left:20%'>";
if($row['live'] == 1){
echo $row['gameTime'];
}else{
echo $row['time'];
}
echo "</span><span style='float:right;text-align:right'>" . $row['gym'] . "</span></div>
<div style='position:absolute;width:100%;height:1%;top:22%;left:0px;background-color:black'></div>
<div style='position:absolute;width:100%;height:59%;top:28%;margin-left:0%;color:black;font-size:40px'>
<div style='position:absolute;width:90%;height:50%;top:0%;margin-left:5%'>
<img src='" . $row['team1pic'] . "' style='height:80%;position:relative;float:left;top:0px'> " . $row['team1'] . "<div style='float:right'>";
if($row['live'] == 1){
echo $row['team1_score'];
} 
echo "</div></div>
<div style='position:absolute;width:90%;height:50%;top:50%;margin-left:5%'>
<img src='" . $row['team2pic'] . "' style='height:80%;position:relative;float:left;top:0px'> " . $row['team2'] . "<div style='float:right'>";
if($row['live'] == 1){
echo $row['team2_score'];
} 
echo "</div></div>
<div style='position:absolute;width:94%;height:20%;font-size:20px;top:97%;margin-left:3%;color:blue;font-size:20px;text-decoration:underline;text-align:center'>
<button onClick='hi3(" . $row['id'] . ")'>Game Stats</button>
</div>
</div>";

echo "</div>";

}
?>