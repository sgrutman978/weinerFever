<html>
<head>
<title>Weiner Fever</title>
<link rel="shortcut icon" href="http://test.webzler.com/andrewgini/wp-content/themes/ginibasketball/basket/basketball.png" type="image/png">
<link rel="shortcut icon" type="image/jpg" href="http://test.webzler.com/andrewgini/wp-content/themes/ginibasketball/basket/basketball.png" />
<link href='http://fonts.googleapis.com/css?family=Michroma|Russo+One|Graduate|Headland+One|Arimo' rel='stylesheet' type='text/css'>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.min.css">
</head>
<body style="background-repeat:none;background-size:cover">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=551804958257217&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'sdk'));</script>
	<?php
include 'zzzzz.php';
		$result3 = mysqli_query($con, "SELECT COUNT(*) AS count FROM games");
		$row3 = mysqli_fetch_array($result3);
		$gameCount = $row3['count'];
	?>
<div id="allOfIt">
	<div id="bigWeiner">WEINER 2014</div>
		<div style="width:100%;text-align:center;margin-left:22px;margin-top:140px" id="content-margin">
			<div style="width:400px;height:770px;right:5%;position:relative;float:right;margin-top:18px;display:inline-block" class="display" data-display=5> 
			
			<div class="fb-like"></div>
			<style>.ig-b- { display: inline-block; }
.ig-b- img { visibility: hidden; }
.ig-b-:hover { background-position: 0 -60px; } .ig-b-:active { background-position: 0 -120px; }
.ig-b-v-24 { width: 137px; height: 24px; background: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24.png) no-repeat 0 0; }
@media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
.ig-b-v-24 { background-image: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24@2x.png); background-size: 160px 178px; } }</style>
<a href="http://instagram.com/weiner_fever?ref=badge" class="ig-b- ig-b-v-24"><img src="//badges.instagram.com/static/images/ig-badge-view-24.png" alt="Instagram" /></a>
			</br><a class="twitter-timeline" href="https://twitter.com/WeinerFever" data-widget-id="533260691629543424">Tweets by @WeinerFever</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>
<!-- ***************************************** Standings ***************************************** -->
<div data-display="3" class="display standings">
	<span style="font-size:30px;">Boys (W - L - T)</span><hr><br/>
	<?php $sql = "SELECT * FROM teams WHERE league = 'Boys' ORDER BY position, wins DESC, losses, ties DESC;";
		  $result_boys = mysqli_query($con, $sql);
		  $i = 1;
		  while($row_boys = mysqli_fetch_array($result_boys)) {
			  echo $i . ". ".$row_boys['name']." (".$row_boys['wins']." - ".$row_boys['losses']." - ".$row_boys['ties'].")<br/>";
			  $i++;
		  }
	?>
</div>
<div data-display="3" class="display standings">
	<span style="font-size:30px;">Girls (W - L - T)</span><hr><br/>
	<?php $sql = "SELECT * FROM teams WHERE league = 'Girls' ORDER BY position, wins DESC, losses, ties DESC;";
		  $result_girls = mysqli_query($con, $sql);
		  $i = 1;
		  while($row_girls = mysqli_fetch_array($result_girls)) {
			  echo $i . ". ".$row_girls['name']." (".$row_girls['wins']." - ".$row_girls['losses']." - ".$row_girls['ties'].")<br/>";
			  $i++;
		  }
	?>
</div>
<!-- ***************************************** Games ***************************************** -->
<div data-display=5 class="display" id="liveGames">Live Games</div>
<!-- ***************************************** Teams ***************************************** -->
<div style="text-align:center;width:90%;height:auto" class="teamsRosters display" data-display=1>Website created by Avi G, Steven G, and Elan H. </br>Broadcasting Coordinaters: Cole A, Alex G, and Elan H. </br>Broadcasting team includes: Cole A, Andrew A, Zach A, Chase B, Benji F, Alex G, Steven G, Elan H, Ben L, Isaac L, Evan Q, Chanan R, Yehuda R, Jacob S, Gary Stein, Ian S, Yitzi T, Paul W, and Jacob Z</div>
<?php
$result343 = mysqli_query($con, "SELECT * FROM teams");
while($row343 = mysqli_fetch_array($result343)){
	if($row343['league'] == "Boys"){
		$tempGender = 0;
	}else{
		$tempGender = 1;
	}
	echo "<div class='display teamsRosters' data-display=1 style='height:400px'><span style='margin:auto;font-size:30px'>" . $row343['name']." ".$row343['league'] . "</span></br>";
$result20 = mysqli_query($con, "SELECT * FROM players WHERE team='" . $row343['name'] . "' AND gender=" . $tempGender . "");
echo "<b>#   Player</b></br><hr>";
echo "<table>";
while($row20 = mysqli_fetch_array($result20)){
	echo "<tr><td>".$row20['number']."</td><td>".$row20['first'] . " " . substr($row20['last'], 0, 1) . ".</td></tr>";
}
echo "</table>";

echo "</div>";
}
?>
<div style="margin:17px auto 0px auto" class="display" data-display=2>
	<span style="color:white">Sort by: </span>
	<select onchange="jump()" id="S1">
	  <option value="All">Gender (All)</option>
	  <option value="Boys">Boys</option>
	  <option value="Girls">Girls</option>
	</select>
	<select onchange="jump()" id="S2">
	  <option value="All">Status (All)</option>
	  <option value="Upcoming">Upcoming</option>
	  <option value="Live">Live</option>
	  <option value="Final">Final</option>
	</select>
	<select onchange="jump()" id="S3">
	  <option value="All">Date (All)</option>
	  <option value="December 3rd">December 3rd</option>
	  <option value="December 4th">December 4th</option>
	  <option value="December 4th">December 5th</option>
	  <option value="December 4th">December 6th</option>
	</select>
	<select onchange="jump()" id="S4">
	  <option value="All">Gym (All)</option>
	  <option value="saab">Hurwitz</option>
	  <option value="Green">Green</option>
	  <option value="Zimmerman">Zimmerman</option>
	</select>
</div> </br>
	<?php
		$boyGirl = -1;
		$counterA = 0;
		$result = mysqli_query($con, "SELECT * FROM games");
		while($row = mysqli_fetch_array($result)) {
			if($row['gender'] == 0){
$boysOr = "Boys";
			}else{
				$boysOr = "Girls";
			}
			if($row['location'] == "Hurwitz"){
			$gymVar = 1;
			}else{
				if($row['location'] == "Green"){
				$gymVar = 2;
			}else{
				$gymVar = 3;
			}
			}
			$counterA++;
			echo "<div id='" . $row['id']. "' data-gym=".$gymVar." data-day=".$row['day']." data-live=" . ($row['editable']). " class='bigBoxes display' data-gender=" . ($row['gender']+1) . " data-display=2><div class='timeBoxes' id='" . $row['id'] . "T'>" . $row['time'] . "</div><div class='gym'>".$boysOr." | " . $row['location'] . " Gym</div><div class='teamBoxes'><img class='pic uno' src='teamPics/" . $row['team_away'] . ".jpg' /><div class='team uno'>" . $row['team_away'] . "</div><div class='teamScores uno' id='" . $row['id'] . "A'></div><img class='pic dos' src='teamPics/" . $row['team_home'] . ".jpg' /><div class='team dos'>" . $row['team_home'] . "</div><div class='teamScores dos' id='" . $row['id'] . "B'></div></div><div class='arrows' data-id='" . $row['id'] . "'>Stats</div></div>";
		}
	?>
</div>
	<ul id="navigation">
		<li id="mobileLogo">WEINER 2014</li>
		<li id="mobileButton"><!-- &#9776; --></li>
		<li id="day5" class="navButtons">home</li>
		<li id="day1" class="navButtons">teams</li>
		<li id="day2" class="navButtons">games</li>
		<li id="day3" class="navButtons">standings</li>
		<!-- <li id="day4" class="navButtons">social</li> -->
	</ul>
	
	<iframe src="//www.spreaker.com/embed/player/mini?show_id=728101&autoplay=false" id="spreaker" class="spreakerTop" frameborder="0" scrolling="no"></iframe>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
var gameCount = <?php echo $gameCount; ?>;
var arrayStats = [];
$(document).ready(function(){
	getGames(true);
	boyGirl(5);
	$(".display[data-live=1]").css("display", "inline-block");
});

setInterval(function(){
	getGames(false);
	arrayStats.forEach(function(entry) {
		getStats(entry);
	});
}, 10000);

function boyGirl(chose){
		$(".display[data-display="+chose+"]").css("display", "inline-block");
		$(".display[data-display!="+chose+"]").css("display", "none");
		$("#day"+chose+"").removeClass("navButtons");
		$(".active").addClass("navButtons");
		$(".active").removeClass("active");
		$("#day"+chose+"").addClass("active");
}

//  $(document).click(function(){
//     	if(!$(event.target).closest('#menu').length){
// $("#menuBox").css({
// 	"display" : "none",
// 	});
// }
// });

function jump(){
  var x1 = document.getElementById("S1").selectedIndex;
   var x2 = document.getElementById("S2").selectedIndex;
    var x3 = document.getElementById("S3").selectedIndex;
     var x4 = document.getElementById("S4").selectedIndex;
     $(".bigBoxes").css("display", "none");
     var string ="";
     if(x1 != 0){
string += "[data-gender="+x1+"]";
     }
     if(x2 != 0){
string += "[data-live="+(x2-1)+"]";
     }
     if(x3 != 0){
string += "[data-day="+x3+"]";
     }
     if(x4 != 0){
string += "[data-gym="+x4+"]";
     }
$(".bigBoxes"+string+"").css("display", "inline-block");
		


}

$("#day5").click(function(){
boyGirl(5);
$(".bigBoxes[data-live=1]").css("display", "inline-block");
});

$("#day1").click(function(){
	boyGirl(1);
});

$("#day2").click(function(){
	boyGirl(2);
});

$("#day3").click(function(){
boyGirl(3);
});

$("#day4").click(function(){
	boyGirl(4);
});


// $("#boyTeams").click(function(){
// boyGirl(2);
// $("#menu").html("Boys Teams &#9776;");
// });

// $("#girlTeams").click(function(){
// boyGirl(3);
// $("#menu").html("Girls Teams &#9776;");

// });

$(window).scroll(function(){
	if($(window).scrollTop() > 157){
	//$("#spreaker").css("position", "fixed");
	$("#navigation").css("position", "fixed");
	// $("#spreaker").css("top", "75");
	$("#navigation").css("top", "-5");
	$("#spreaker").addClass("spreakerBottom").removeClass("spreakerTop");

}else{
// $("#spreaker").css("position", "absolute");
	$("#navigation").css("position", "absolute");
	// $("#spreaker").css("bottom", "0");
	$("#spreaker").addClass("spreakerTop").removeClass("spreakerBottom");
	
	$("#navigation").css("top", "151");
}
		//$("#leftHand").css("left")
});

$(".arrows").click(function(){
	if($(this).data("expanded") == false || $(this).data("expanded") == null){
		arrayStats.push($(this).attr('data-id'));
		getStats($(this).attr('data-id'));
		$(this).data("expanded",true);
		$(this).stop().animate({
			height: "100%"
		}, 1000, function() {
		});
		
	}else{
		arrayStats.splice(arrayStats.indexOf($(this).attr('data-id')), 1);
					$(this).data("expanded",false);
		$(this).stop().animate({
			height: "33px"
		}, 1000, function() {
			$(this).children('table').remove();
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


function getGames(all){
	 $.ajax({
		  type: "POST",
		  url: "returnGames.php",
		  data: { getAll: all }
		}).done(function( msg ) {
			msg = JSON.parse(msg);
			if(msg[0] != gameCount) {
				location.reload();
			}
		for(var i = 1; i < msg.length; i++) {
			$('#'+msg[i][4]+'A').html(msg[i][0]);
			$('#'+msg[i][4]+'B').html(msg[i][1]);
			$("#"+msg[i][4]).attr("data-live", msg[i][3]);
			// if(msg[i][1] > msg[i][0]){
			// 	$('#'+msg[i][4]+'A').css("color", "red");
			// 	$('#'+msg[i][4]+'B').css("color", "green");
			// }
			// else {
			// 	$('#'+msg[i][4]+'A').css("color", "green");
			// 	$('#'+msg[i][4]+'B').css("color", "red");
			// }
			// if(msg[i][1] == msg[i][0]){
			// 	$('#'+msg[i][4]+'A').css("color", "green");
			// 	$('#'+msg[i][4]+'B').css("color", "green");
			// }
			$('#'+msg[i][4]+'T').html(msg[i][2]);
			if(msg[i][2] == "FINAL" || msg[i][2] == "FINAL OT" || msg[i][2] == "FINAL 2OT"){
				$('#'+msg[i][4]+'T').css("color", "orange");
			}else{
				$('#'+msg[i][4]+'T').css("color", "black");
			}
		}
		resizeStuffs();
	});
		
}

function getStats(id){
	 $.ajax({
		  type: "POST",
		  url: "returnStats.php",
		  data: {id:id}
		}).done(function( msg ) {
			msg = JSON.parse(msg);
			var html = $("<table style='text-align:center;padding:2px 7px 0px 7px'>");
			$("[data-id="+id+"]").html("Stats");
			html.append("<tr><th>#</th><th>Name</th><th>Team</th><th>PTS</th><th>FT</th><th>2P</th><th>3P</th><th>fouls</th></tr>");
			for (var i = 0; i < msg.length; i++) {
				html.append("<tr><td>"+msg[i][9]+"</td><td>"+msg[i][1]+" "+msg[i][0]+"</td><td>"+msg[i][2]+"</td><td>"+msg[i][3]+"</td><td>"+msg[i][4]+"</td><td>"+msg[i][5]+"</td><td>"+msg[i][6]+"</td><td>"+msg[i][7]+"</td></tr></table>");
			}
			$(this).children('table').remove();
			if ($("[data-id="+id+"]").data("expanded"))
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
	

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46204600-1', 'weinerfever.com');
  ga('send', 'pageview');

  $("#mobileButton").click(function(event) {
  	$("#navigation li:not(#mobileLogo):not(#mobileButton)").slideToggle();
  });

  $("#navigation li:not(#mobileLogo):not(#mobileButton)").click(function(event) {
  	if ($("#mobileButton").is(":visible") == true) {
  		$("#navigation li:not(#mobileLogo):not(#mobileButton)").slideToggle();
  	}
  });


  $(function() {
		var hash_url = window.location.hash;
		hash_url.toLowerCase();
		switch (hash_url) {
			case "#home":
					$("#day5").click();
				break;
			case "#teams":
					$("#day1").click();
				break;
			case "#games":
					$("#day2").click();
				break;
			case "#standings":
					$("#day3").click();
				break;
			case "#social":
					$("#day4").click();
				break;
		}
	});

	$(".navButtons").click(function(event) {
		window.location.hash = $(this).text().toLowerCase();
	});



</script>
</body>
</html>