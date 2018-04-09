<html>
<head>
<title>Weiner Fever</title>
<link rel="shortcut icon" href="ball.jpg" type="image/png">
<link rel="shortcut icon" type="image/jpg" href="ball.png" />
<link href='http://fonts.googleapis.com/css?family=Michroma|Russo+One|Graduate|Headland+One|Arimo' rel='stylesheet' type='text/css'>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{
	background:rgb(247, 247, 247);
	background: #edb44e;
	margin:0;
	font-family: Arimo;
}
#tempMessage{
	background:white;
	width:250px;
	padding:10px;
	text-align:center;
margin:auto;
margin-top:75px;
font-family:Arimo;
font-size:20px;
}
#spreaker{
margin:auto;
width: 100%; 
height: 131px; 
min-width: 400px;
margin-top:15px;
}
#boys{
	float:left;
margin-left:15px;
}
#girls{
	float:right;
	margin-top:-55px;
}
.bigBoxes{
	width:360px;
	background:rgba(255,255,240,.9);
	margin-top:45px;
	margin-bottom:20px;
	margin-right:65px;
	border-radius:5px;
	height:262px;
	display:inline-block;
	position:relative;
	font-family:Arimo;
	overflow: hidden;
}
#nav{
	background:black; /* #25282A */
	width:100px;
	height:60px;
	position:fixed;
	left:0px;
	top:0px;
	opacity:0;
}
#weiner{
	font-family:Graduate;
	color:white;
	cursor:pointer;
	text-align:center;
	font-size:3em;
	margin:auto;
	height:58px;
	color:white;
	width:400px;
}
#bask{
	height:100%;
	width:100%;
	position:fixed;
	right:0px;
	top:0px;
}
#nextDiv{
	position:absolute;
left:0px;
top:58px;
	width:100%;
	height:100px;
	opacity:0;
	overflow-y:scroll;
	overflow-x:hidden;
	text-align:center;
	box-sizing:border-box;
	/*overflow-x:hidden;*/
}

#innerDiv {
	width:100%;
	overflow-x:visible;
	margin:auto;
	height:100px;
		margin-right:-40px;

}

.timeBoxes{
	width:100%;
	height:35px;
	font-size:30px;
}
.teamBoxes{
	width:100%;
	height:169px;
	margin-top:1px;
	border-style:solid;
	border-color:black;
		border-width:0px;
	border-top-width:1px;
	border-bottom-width:1px;
}
.gym{
width:100%;
height:25px;
font-size:21px;
}
.team{
width:240px;
height:60px;
position:absolute;
left:75px;
font-size:50px;
text-align:left;
}
#bigWeiner{
	width:100%;
	color:white;
	font-size:132px;
	font-family: Graduate;
	margin-top:61px;
	text-align: center;
}

#navigation {
height:42px;
font-size:35px;
padding:14px 4px 12px 4px;
margin:auto;
left:0;
right:0;
top:0;
width:992px;
text-align: center;
position: fixed;
font-family:Arimo;
background: #25282A;
}

#navigation li:first-child {
	margin:0;
}

#navigation li:last-child {
	border-right:0;
}

#navigation li {
position:relative;
width:198px;
height:100%;/*
border-left: 1px solid black;
border-right: 1px solid rgb(68, 68, 68);*/
color:white;
text-align: center;
margin: 0 0 0 -10px;
display: inline-block;
transition: border .5s;
border-top:solid 2px;
font-variant: small-caps;
border-bottom:solid 2px;
border-color:rgb(61, 61, 61);
}

#navigation li:hover{
border-color:white;
cursor:pointer;
}
.pic{
width:60px;
height:60px;
position:absolute;
left:10px;
font-size:50px;
text-align:left;
}
.teamScores{
width:70px;
height:60px;
position:absolute;
right:7px;
font-size:50px;
}
.uno{
top:70px;
}
.dos{
top:155px;
}
.arrows{
	height:30px;
	width:100%;
	overflow:auto;
	font-size:29px;
	margin-top:-2px;
	color:blue;
	cursor:pointer;
	position:absolute;
	bottom:0;
	background: white;
}
#menu{
	right:0px;
	position:absolute;
	top:0px;
	width: 320px;
	text-align:right;
	margin-top:4px;
	color:white;
	margin-right:5px;
	height:100%;
	font-size:45px;
	font-family:Arimo;
	cursor:pointer;
}
.menuB:hover, #weiner:hover{
	color:gold;
}
#allOfIt{
	width:980px;
	margin:auto;
	height:1000px;
	background: #25282A;
	padding: 10px;	
}
#menuBox{
	width:110px;
	height:auto;
	background:#25282A;
	display:none;
	position:fixed;
	text-align:right;
	right:24px;
	top:65px;
}
.menuB {
	margin-top:-2px;
	margin-right:15px;
	display:inline-block;
	border-bottom:2px;
	cursor:pointer;
	font-size:50px;
	color:white;
	font-family:Arimo;
}
#mainBox{
	width:80%;
	margin:auto;
	font-family:Arimo;
		margin-top:40px;
		background:rgba(255,255,240,.9);
		padding:10px;
}
@media (max-width: 849px) {
#spreaker{
	width:120px;
	left:0px;
}
 body{
	background-image: url('Basketball.jpg');
}
}
@media (max-width: 619px) {
  .bigBoxes {
    width:310px;
    margin-right: 0px;
  }
  }
@media (max-width: 750px) {
  .teamScores{
right:-2px;
  }
  #innerDiv{
  	  margin-right: 0px;
  }
  .team{
  	left:7px;
  }
  .timeBoxes{
  	font-size:25px;
  }
  .pic{
  	display:none;
  }
  #nav{
  	height: 25px;
  }
  #menu, #weiner{
  	font-size:20px;
  	margin-top:1px;
 width:150px;
  }

}
</style>
</head>
<body style="background-repeat:none;background-size:cover">
	<?php
include 'zzzzz.php';
		$result3 = mysqli_query($con, "SELECT COUNT(*) AS count FROM games");
		$row3 = mysqli_fetch_array($result3);
		$gameCount = $row3['count'];
	?>
<div id="allOfIt">
	<!-- <img id="bigWeiner" src="weiner.jpg"> -->
	<ul id="navigation">
		<li id="teams">home</li>
		<li id="day1">teams</li>
		<li id="day2">games</li>
		<li id="day3">standings</li>
		<li id="day4">live video</li>
	</ul>
	<div id="bigWeiner">WEINER 2014</div>
	<iframe src="//www.spreaker.com/embed/player/standard?autoplay=false&episode_id=5171630" id="spreaker" frameborder="0" scrolling="no"></iframe>
	<?php
		$boyGirl = -1;
		$counterA = 0;
		$result = mysqli_query($con, "SELECT * FROM games");
		while($row = mysqli_fetch_array($result)) {
			$counterA++;
			echo "<div class='bigBoxes' data-gender=" . $row['gender'] . " data-display=1><div class='timeBoxes' id='" . $counterA . "T'></div><div class='gym'>" . $row['location'] . " Gym</div><div class='teamBoxes'><img class='pic uno' src='teamPics/" . $row['team_away'] . ".jpg' /><div class='team uno'>" . $row['team_away'] . "</div><div class='teamScores uno' id='" . $counterA . "A'></div><img class='pic dos' src='teamPics/" . $row['team_home'] . ".jpg' /><div class='team dos'>" . $row['team_home'] . "</div><div class='teamScores dos' id='" . $counterA . "B'></div></div><div class='arrows' data-id='" . $row['id'] . "'>Stats</div></div>";
		}
	?>



</div>
<!-- <div id="tempMessage">Construction underway...</br>See you in December!</div> -->

<!--<div style="position:absolute;left:50.3%;top:53px;width:49%;height:700px"><a class="twitter-timeline" href="https://twitter.com/WeinerFever" data-widget-id="408027534433857536">Tweets by @WeinerFever</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>-->
<script>
var gameCount = <?php echo $gameCount; ?>;
var arrayStats = [];
$(document).ready(function(){
	getGames();
		boyGirl(4);
		setTimeout(function() { hi(); }, 501);
				setTimeout(function() { hi2(); }, 1501);
	});

setInterval(function(){
getGames();
arrayStats.forEach(function(entry) {
   getStats(entry);
});
}, 10300);

function boyGirl(chose){
		$(".bigBoxes[data-display="+chose+"]").css("display", "inline-block");
		$(".bigBoxes[data-display!="+chose+"]").css("display", "none");
	$(".bigBoxes[data-gender=1]").css("background", "rgba(255, 195, 234, .9)");
	$(".bigBoxes[data-gender=0]").css("background", "rgba(195, 204, 255, .9)");
}

//  $(document).click(function(){
//     	if(!$(event.target).closest('#menu').length){
// $("#menuBox").css({
// 	"display" : "none",
// 	});
// }
// });

$("#weiner").click(function(){
	boyGirl(4);
});

$("#boys").click(function(){
	boyGirl(0);
});

$("#girls").click(function(){
boyGirl(1);

});

// $("#boyTeams").click(function(){
// boyGirl(2);
// $("#menu").html("Boys Teams &#9776;");
// });

// $("#girlTeams").click(function(){
// boyGirl(3);
// $("#menu").html("Girls Teams &#9776;");

// });

$(".arrows").click(function(){
	if($(this).data("expanded") == false || $(this).data("expanded") == null){
			arrayStats.push($(this).attr('data-id'));
		$(this).children('table').remove();
		getStats($(this).attr('data-id'));
		$(this).stop().animate({
			height: "100%"
		}, 1000, function() {
			$(this).data("expanded",true);	
		});
		
	}else{
		arrayStats.splice(arrayStats.indexOf($(this).attr('data-id')), 1);
		$(this).stop().animate({
			height: "30px"
		}, 1000, function() {
			$(this).children('table').remove();
			$(this).data("expanded",false);
		});
	}
});

// $("#menu").click(function(){
// 	if($("#menuBox").css("display") == "none"){
// $("#menuBox").css("display", "block");
// 	}else{
// $("#menuBox").css("display", "none");
// 	}
// });


function getGames(){
	 $.ajax({
		  type: "POST",
		  url: "returnGames.php",
		  data: {  }
		}).done(function( msg ) {
		//$("#nextDivInner").html(msg);
		msg = JSON.parse(msg);
		// console.log(msgs);
		if(msg[0] != gameCount){
			location.reload();
		}
		for(var i = 1; i < msg.length;i++) {
			$('#'+i+'A').html(msg[i][0]);
			$('#'+i+'B').html(msg[i][1]);
			$('#'+i+'G').html(msg[i][3]);
			if(msg[i][1] > msg[i][0]){
					$('#'+i+'B').css("color", "green");
					$('#'+i+'A').css("color", "red");
			}else{
				if(msg[i][1] == msg[i][0]){
					$('#'+i+'A').css("color", "green");
					$('#'+i+'B').css("color", "green");
				}else{
					$('#'+i+'A').css("color", "green");
					$('#'+i+'B').css("color", "red");
				}
			}
				$('#'+i+'T').html(msg[i][2]);
				if(msg[i][2] == "FINAL" || msg[i][2] == "FINAL OT" || msg[i][2] == "FINAL 2OT"){
					$('#'+i+'T').css("color", "orange");
				}else{
										$('#'+i+'T').css("color", "black");
				}
			console.log(msg[i][0]+" "+msg[i][1]);
		}
		resizeStuffs();
		//alert(msg);
	});
		
}

function getStats(id){
	 $.ajax({
		  type: "POST",
		  url: "returnStats.php",
		  data: {id:id}
		}).done(function( msg ) {
			msg = JSON.parse(msg);
			var html = $("<table>");
			$("[data-id="+id+"]").html("Stats");
			html.append("<tr><th>Name</th><th>Team</th><th>PTS</th><th>FT</th><th>2P</th><th>3P</th><th>fouls</th></tr>");
			for (var i = 0; i < msg.length; i++) {
				html.append("<tr><td>"+msg[i][1]+" "+msg[i][0]+"</td><td>"+msg[i][2]+"</td><td>"+msg[i][3]+"</td><td>"+msg[i][4]+"</td><td>"+msg[i][5]+"</td><td>"+msg[i][6]+"</td><td>"+msg[i][7]+"</td></tr>");
			}
			$("[data-id="+id+"]").append(html);
	});
}


$(window).resize(function(){
		resizeStuffs();
});

$(document).resize(function(){
		resizeStuffs();
});

function resizeStuffs(){
	console.log($(window).width());
	if($(window).width() < 751){
		$("#nextDiv").css("top", 25);
			$("#nextDiv").css("height", $(window).height() - 25);
				$("#innerDiv").css("height", $(window).height() - 25);
								$("#nav").css("width", $(window).width());
								$("#nextDiv").css("width", $(window).width());
								$("#innerDiv").css("width", $(window).width());

			}else{
				$("#nextDiv").css("height", $(window).height() - 58);
				$("#innerDiv").css("height", $(window).height() - 58);
				$("#nextDiv").css("width", $(window).width());
				$("#innerDiv").css("width", $(window).width());
				$("#nav").css("width", $(window).width());
				$("#nextDiv").css("top", 58);
			}
}
	
function hi(){
$('#nav').animate({
	opacity: '1',
    }, 3000);
}
	
function hi2(){
$('#nextDiv').animate({
opacity: '.99',
  }, 2500);
	}

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46204600-1', 'weinerfever.com');
  ga('send', 'pageview');

</script>
</body>
</html>