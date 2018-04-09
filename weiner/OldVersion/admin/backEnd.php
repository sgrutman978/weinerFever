<head>
<style>
.buttons {
height:100px;
width:100px;
position:relative;
margin-left:10px;
float:left;
font-size:35px
}
.green {
background-color:green;
}
.red {
background-color:red;
}
</style>
</head><script src="/jquery.js" ></script></br>
Time Updater</br>
<?php include 'zzzzw.php';
$result = mysqli_query($con,"SELECT * FROM games WHERE id = " . $_GET['ids']);
                while ($row = mysqli_fetch_array($result)) {		
?>
<input type='textarea' name='gameTime' id='gameTime' value="<?php echo $row['gameTime']; ?>" />
<input type='button' name='submitTime' id='submitTime' value='Submit Time' />
</br>
</br>
<?php
}
$result = mysqli_query($con,"SELECT * FROM games WHERE id = " . $_GET['ids']);
                while ($row = mysqli_fetch_array($result)) {
				echo "<div style='font-size:45px'>" . $row['team1'] . "</div>";
				}
?>
<select id="hi">
<?php

if($_COOKIE['password'] != "magic"){
header("Location: index.php?wrong=1");
}

$result = mysqli_query($con,"SELECT * FROM games WHERE id = " . $_GET['ids']);
                while ($row = mysqli_fetch_array($result)) {
 $result2 = mysqli_query($con,"SELECT * FROM players WHERE team = '" . $row['team1'] . "' AND gender = " . $row['gender']);
                while ($row2 = mysqli_fetch_array($result2)) {
				echo "<option>" . $row2['playerNumber'] . " " . $row2['playerName'] . "</option>";
				}
				}
				?>
</select></br>
<div id="1pt1" class="buttons green">1pt</div>
<div id="2pt1" class="buttons green">2pt</div>
<div id="3pt1" class="buttons green">3pt</div>
<div id="fouls1" class="buttons green">Foul</div>
<div id="m1pt1" class="buttons red">-1pt</div>
<div id="m2pt1" class="buttons red">-2pt</div>
<div id="m3pt1" class="buttons red">-3pt</div>
<div id="mfouls1" class="buttons red">-Foul</div>
</br>
</br>
</br></br>
</br>
</br></br>
</br>
</br></br>
<?php
$result = mysqli_query($con,"SELECT * FROM games WHERE id = " . $_GET['ids']);
                while ($row = mysqli_fetch_array($result)) {
				echo "<div style='font-size:45px'>" . $row['team2'] . "</div>";
				}
?>
<select id="hi2"><?php
include 'zzzzw.php';
if($_COOKIE['password'] != "magic"){
header("Location: index.php?wrong=1");
}

$result = mysqli_query($con,"SELECT * FROM games WHERE id = " . $_GET['ids']);
                while ($row = mysqli_fetch_array($result)) {
 $result2 = mysqli_query($con,"SELECT * FROM players WHERE team = '" . $row['team2'] . "' AND gender = " . $row['gender']);
                while ($row2 = mysqli_fetch_array($result2)) {
				echo "<option>" . $row2['playerNumber'] . " " . $row2['playerName'] . "</option>";
				}
				}
				?>
</select></br>
<div id="1pt2" class="buttons green">1pt</div>
<div id="2pt2" class="buttons green">2pt</div>
<div id="3pt2" class="buttons green">3pt</div>
<div id="fouls2" class="buttons green">Foul</div>
<div id="m1pt2" class="buttons red">-1pt</div>
<div id="m2pt2" class="buttons red">-2pt</div>
<div id="m3pt2" class="buttons red">-3pt</div>
<div id="mfouls2" class="buttons red">-Foul</div>
<script>
var ids = <?php echo $_GET['ids']; ?>;
var numb = <?php echo $_GET['gameNumb']; ?>;

$(document).ready(function(){
	
	});
	
	$("#submitTime").click(function() {
	var selected = $("#gameTime").val();
	$.ajax({
		type: "GET",
		url: "reader3.php?ids=" + ids + "&gameTime=" + selected,
	}).done(function( msg ) {
		alert("Updated");
		});
	});

$("#1pt2").click(function() {
	var selected = $("#hi2").val().split(" ");
	$.ajax({
		type: "GET",
		url: "reader.php?ids=" + ids + "&team=team2&playerNumb=" + selected[0] + "&pointVal=1pt&pointVal2=1",
	}).done(function( msg ) {
		alert("Updated");
		});
	});
	
	$("#2pt2").click(function() {
	var selected = $("#hi2").val().split(" ");
	$.ajax({
		type: "GET",
		url: "reader.php?ids=" + ids + "&team=team2&playerNumb=" + selected[0] + "&pointVal=2pt&pointVal2=2",
	}).done(function( msg ) {
		alert("Updated");
		});
	});
	
	$("#3pt2").click(function() {
	var selected = $("#hi2").val().split(" ");
	$.ajax({
		type: "GET",
		url: "reader.php?ids=" + ids + "&team=team2&playerNumb=" + selected[0] + "&pointVal=3pt&pointVal2=3",
	}).done(function( msg ) {
		alert("Updated");
		});
	});
	
	$("#fouls2").click(function() {
	var selected = $("#hi2").val().split(" ");
	$.ajax({
		type: "GET",
		url: "reader.php?ids=" + ids + "&team=team2&playerNumb=" + selected[0] + "&pointVal=fouls&pointVal2=1",
	}).done(function( msg ) {
		alert("Updated");
		});
	});
	
	
	
	
	
	
	
	
	
	
	$("#1pt1").click(function() {
	var selected = $("#hi").val().split(" ");
	$.ajax({
		type: "GET",
		url: "reader.php?ids=" + ids + "&team=team1&playerNumb=" + selected[0] + "&pointVal=1pt&pointVal2=1",
	}).done(function( msg ) {
		alert("Updated");
		});
	});
	
	$("#2pt1").click(function() {
	var selected = $("#hi").val().split(" ");
	$.ajax({
		type: "GET",
		url: "reader.php?ids=" + ids + "&team=team1&playerNumb=" + selected[0] + "&pointVal=2pt&pointVal2=2",
	}).done(function( msg ) {
		alert("Updated");
		});
	});
	
	$("#3pt1").click(function() {
	var selected = $("#hi").val().split(" ");
	$.ajax({
		type: "GET",
		url: "reader.php?ids=" + ids + "&team=team1&playerNumb=" + selected[0] + "&pointVal=3pt&pointVal2=3",
	}).done(function( msg ) {
		alert("Updated");
		});
	});
	
	$("#fouls1").click(function() {
	var selected = $("#hi").val().split(" ");
	$.ajax({
		type: "GET",
		url: "reader.php?ids=" + ids + "&team=team1&playerNumb=" + selected[0] + "&pointVal=fouls&pointVal2=1",
	}).done(function( msg ) {
		alert("Updated");
		});
	});
	
	
	
	
	
	
	
	$("#m1pt2").click(function() {
	var selected = $("#hi2").val().split(" ");
	$.ajax({
		type: "GET",
		url: "reader2.php?ids=" + ids + "&team=team2&playerNumb=" + selected[0] + "&pointVal=1pt&pointVal2=1",
	}).done(function( msg ) {
		alert("Updated");
		});
	});
	
	$("#m2pt2").click(function() {
	var selected = $("#hi2").val().split(" ");
	$.ajax({
		type: "GET",
		url: "reader2.php?ids=" + ids + "&team=team2&playerNumb=" + selected[0] + "&pointVal=2pt&pointVal2=2",
	}).done(function( msg ) {
		alert("Updated");
		});
	});
	
	$("#m3pt2").click(function() {
	var selected = $("#hi2").val().split(" ");
	$.ajax({
		type: "GET",
		url: "reader2.php?ids=" + ids + "&team=team2&playerNumb=" + selected[0] + "&pointVal=3pt&pointVal2=3",
	}).done(function( msg ) {
		alert("Updated");
		});
	});
	
	$("#mfouls2").click(function() {
	var selected = $("#hi2").val().split(" ");
	$.ajax({
		type: "GET",
		url: "reader2.php?ids=" + ids + "&team=team2&playerNumb=" + selected[0] + "&pointVal=fouls&pointVal2=1",
	}).done(function( msg ) {
		alert("Updated");
		});
	});
	
	
	
	
	
	
	
	
	
	
	$("#m1pt1").click(function() {
	var selected = $("#hi").val().split(" ");
	$.ajax({
		type: "GET",
		url: "reader2.php?ids=" + ids + "&team=team1&playerNumb=" + selected[0] + "&pointVal=1pt&pointVal2=1",
	}).done(function( msg ) {
		alert("Updated");
		});
	});
	
	$("#m2pt1").click(function() {
	var selected = $("#hi").val().split(" ");
	$.ajax({
		type: "GET",
		url: "reader2.php?ids=" + ids + "&team=team1&playerNumb=" + selected[0] + "&pointVal=2pt&pointVal2=2",
	}).done(function( msg ) {
		alert("Updated");
		});
	});
	
	$("#m3pt1").click(function() {
	var selected = $("#hi").val().split(" ");
	$.ajax({
		type: "GET",
		url: "reader2.php?ids=" + ids + "&team=team1&playerNumb=" + selected[0] + "&pointVal=3pt&pointVal2=3",
	}).done(function( msg ) {
		alert("Updated");
		});
	});
	
	$("#mfouls1").click(function() {
	var selected = $("#hi").val().split(" ");
	$.ajax({
		type: "GET",
		url: "reader2.php?ids=" + ids + "&team=team1&playerNumb=" + selected[0] + "&pointVal=fouls&pointVal2=1",
	}).done(function( msg ) {
		alert("Updated");
		});
	});

</script>