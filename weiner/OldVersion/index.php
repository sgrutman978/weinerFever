<title>Weiner Fever</title>
<link rel="shortcut icon" href="ball.jpg" type="image/png">
<link rel="shortcut icon" type="image/jpg" href="ball.png" />
<style>
.tabs{
position:relative;
width:18%;
height;100%;
border-width:2px;
border-style:solid;
border-color:black;
background-color:gold;
color:black;
float:left;
padding-bottom:4px
}
#hello div:hover{
background-color:blue;
color:white;
cursor:pointer;
}
</style>
<body style="background-color:black">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46204600-1', 'weinerfever.com');
  ga('send', 'pageview');

</script>
<img src='bask.jpg' style='height:100%;width:100%;position:fixed;right:0px;top:0px'>
<div style="position:absolute;top:10px;left:0px;margin:auto;width:98%">
<script src="/jquery.js" ></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<link href='http://fonts.googleapis.com/css?family=Michroma|Russo+One|Graduate|Headland+One' rel='stylesheet' type='text/css'>
<div id="weiner" style="font-family:Graduate;color:white;text-align:center;font-size:120px;width:1000px;position:relative;opacity:0;margin:0px auto;height:200px">WEINER 2014
<div id="hello" style="position:relative;width:100%;height:40px;font-size:23px;left:4%;font-family:Michroma">
<div id="teams" class="tabs">Home</div>
<div id="day1" class="tabs">See</div>
<div id="day2" class="tabs">You</div>
<div id="day3" class="tabs">In</div>
<div id="day4" class="tabs">November</div></div>
<iframe src="http://www.spreaker.com/embed/player/standard?autoplay=false&user_id=5504932" style="margin-top:10px; width: 100%; height: 131px; min-width: 400px;" frameborder="0" scrolling="no"></iframe></div>
<div id="scores" style="opacity:0;font-family:Graduate;color:white;text-align:center;font-size:120px;width:1000px;position:relative;margin:130px auto;min-height:200px">

<?php
include 'zzzzw.php';
echo "<div style='font-size:25px;font-family:Headland One;background-color:ivory;color:black;text-align:center;width:94%;position:relative;margin-left:3%;float:left;min-height:1000px'>";

echo "<div style='width:100%;padding-top:3px;padding-bottom:3px;margin-bottom:20px auto;background-color:green;color:white;height:40px;font-size:15px'>Website created by Steven G. Broadcasting managed by Elan H. Broadcasters include: Steven G, Elan H, Cole A, Reuven B, Alex G, Chanan R, Gil K, Harris H, Dean S, Isaac L, Benji F, and Jacob S.</div>";

/*echo "<span style='font-size:40px;float:right;margin-right:10px'>Boys Standings</span></br></br>";
echo "<table border='1' style='float:right;margin-right:55px'>";
echo "<tr><td>Team</td><td>Wins</td><td>Losses</td></tr>";
$result4 = mysqli_query($con,"SELECT * FROM teams WHERE gender = 1 ORDER BY wins DESC");
                while ($row4 = mysqli_fetch_array($result4)) {
				echo "<tr><td>" . $row4['name'] . "</td><td>" . $row4['wins'] . "</td><td>" . $row4['losses'] . "</td></tr>";
				}
				echo "</table></br></br></br></br></br></br></br>";
				echo "<span style='font-size:40px;float:right;margin-right:10px'>Girls Standings</span></br></br>";
echo "<table border='1' style='float:right;margin-right:55px'>";
echo "<tr><td>Team</td><td>Wins</td><td>Losses</td></tr>";
$result4 = mysqli_query($con,"SELECT * FROM teams WHERE gender = 2 ORDER BY wins DESC");
                while ($row4 = mysqli_fetch_array($result4)) {
				echo "<tr><td>" . $row4['name'] . "</td><td>" . $row4['wins'] . "</td><td>" . $row4['losses'] . "</td></tr>";
				}
				echo "</table></br>";*/
?>
<!--<div style="position:absolute;left:.70%;top:53px;width:49%;height:700px"><a class="twitter-timeline" href="https://twitter.com/search?q=%23WeinerFever" data-widget-id="408023786613534720">Tweets about "#WeinerFever"</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>-->
<div style="position:absolute;left:50.3%;top:53px;width:49%;height:700px"><a class="twitter-timeline" href="https://twitter.com/WeinerFever" data-widget-id="408027534433857536">Tweets by @WeinerFever</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>
</br>

<?php
include 'zzzzw.php';
echo "<div style='height:630px;color:ivory'>.</div>";
echo "<span style='font-size:80px'>Teams</span></br>";
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
				$temp=$row2['playerName'];
				$first=strstr($temp, " ", true);
				$last=strstr($temp, " ");
				$last=substr($last,0, 2);
				echo $row2['playerNumber'] . " " . $first . " " . $last . ". </br>";
				}
				echo "</br>";
}
echo "</div>";
?>

</div>
<?php
include 'zzzzw.php';
mysqli_query($con,"UPDATE people SET users = users+1");
?>
<script>
var game = 1;
var other = 0;
var chose = 0;
var home = 1;
$(document).ready(function(){

				setTimeout(function() { hi(); }, 501);
				setTimeout(function() { hi2(); }, 1501);
				
getStuff();
				
	});
	
	setInterval(
	function() {
	getStuff();
	}
	, 12000);
	
	function getStuff(){
	if(home == 0){
	if(chose == 0){
	$.ajax({
		type: "GET",
		url: "desktopw.php?day=" + game,
	}).done(function( msg ) {
		$("#scores").html(msg);
		});
		}else{
		$.ajax({
		type: "GET",
		url: "gameInfow.php?ids=" + other,
	}).done(function( msg ) {
		$("#scores").html(msg);
		});
		}
		}else{
		/*$.ajax({
		type: "GET",
		url: "teams.php",
	}).done(function( msg ) {
		$("#scores").html(msg);
		});*/
		}
	}
	
	function hi(){
	$('#weiner').animate({
opacity: '1',
                }, 3000);
	}
	
	function hi2(){
	$('#scores').animate({
opacity: '.9',
                }, 2500);
	}
	
	function hi3(hey){
	other = hey;
	chose = 1;
	getStuff();
	}
	
	/*function hi4(){
	$('document').ready(function() {
   $(window).scrollTop(0);
});
}*/
	
	$("#day1").click(function() {
	game = 1;
	chose = 0;
	home = 0;
getStuff();
	});

$("#day2").click(function() {
	game = 2;
	chose = 0;
	home = 0;
getStuff();
	});
	
	$("#day3").click(function() {
	game = 3;
	chose = 0;
	home = 0;
getStuff();
	});
	
	$("#day4").click(function() {
	game = 4;
	chose = 0;
	home = 0;
getStuff();
	});
	
	
	$("#teams").click(function() {
	window.location = "index.php";
	});
	
	
	
</script>

</div>

</body>