/*
 * Elan Hamburger
 */
	//Sets the time update reminder when the page loads
	window.onload = function() {
		validate();
		set_timer();
	}
	
	//Ensures the game is editable
	function validate()
	{
		$.ajax({
			type: "POST",
			url: "actions/validate.php",
			data: { id: document.getElementById('game_id').value }
		})
		.done(function( msg ) {
			if(msg == "200")
			{
				var x = prompt("This game has been locked by the operator. To access it, enter your override key:");
				if(x == null || x != 2014)
				{
					window.location = "game_select.php";
				}
			}
		});
	}
	
	//Resets the time update reminder to 30 seconds
	function set_timer() {
		timer = setTimeout(function(){
			var x = 1;
			timer = setInterval(function(){
				if(x == 1)
				{
					document.getElementById('time_input').style.backgroundColor = "red";
					x = 0;
				}
				else if(x == 0)
				{
					document.getElementById('time_input').style.backgroundColor = "white";
					x = 1;
				}
			}, 500);
		}, 29000);
	}
	
	//Clears the red flashing on the time update reminder and then calls set_timer()
	function reset_timer() {
		clearInterval(timer);
		clearTimeout(timer);
		document.getElementById('time_input').style.backgroundColor = "white";
		set_timer();
	}
	
	//AJAX call to set the game time on the website
	//If the player has set the time as "FINAL", a confirmation is required
	function set_time(game_id) {
		var e = document.getElementById('period').value
		if(e == "FINAL" || e == "FINAL OT" || e == "FINAL 2OT")
		{
			var x = confirm("Setting the time as FINAL will publish stats to Twitter and Facebook and lock this game from further editing. Are you sure you wish to do this? (Games going into overtime should not be set as final!)");
		}
		if(x || e != "FINAL")
		{
			document.getElementById('status_bar').style.backgroundColor = "yellow";
			document.getElementById('status').innerHTML = "Saving...";
			var e = document.getElementById('period').value;
			if(e == "HALF" || e == "FINAL" || e == "FINAL OT" || e == "FINAL 2OT")
			{
				var new_time = e;
				document.getElementById('time_input').value = "";
			}
			else
			{
				var new_time = document.getElementById('time_input').value + " " + e;
			}
			$.ajax({
				type: "POST",
				url: "actions/update_time.php",
				dataType: "json",
				data: { id: game_id, time: new_time }
			})
			.done(function( msg ) {
				reset_timer();
				document.getElementById('status_bar').style.backgroundColor = msg.color;
				document.getElementById('status').innerHTML = msg.message;
				if(msg.lock == true)
				{
					window.location = "game_select.php";
				}
			});
		}
		else
		{
			document.getElementById('status_bar').style.backgroundColor = "red";
			document.getElementById('status').innerHTML = "Time change was cancelled by user.";
		}
	}
	
	//Changes the home team player selector when the away team player selector is used
	function reset_home() {
		document.getElementById('players_home').selectedIndex = 0;
	}
	
	//Changes the away team player selector when the home team player selector is used
	function reset_away() {
		document.getElementById('players_away').selectedIndex = 0;
	}
	
	/*
	 *Identifies the selected player and adds to their score and their team's score
	 *@param x the score to add to the player
	 *@param game_id the id of the game to update
	*/
	function score(x, game_id) {
		if(document.getElementById('players_home').selectedIndex == 0 && document.getElementById('players_away').selectedIndex != 0)
		{
			document.getElementById('status_bar').style.backgroundColor = "yellow";
			document.getElementById('status').innerHTML = "Saving...";
			var e = document.getElementById('players_away');
			$.ajax({
				type: "POST",
				url: "actions/change_score.php",
				dataType: "json",
				data: { val: x, id: e.value, game: game_id, team: 'away' }
			})
			.done(function( msg ) {
				document.getElementById('status_bar').style.backgroundColor = msg.color;
				document.getElementById('status').innerHTML = msg.message;
				if(msg.score != null)
				{
					document.getElementById('score_away').innerHTML = msg.score;
				}
			});
		}
		else if(document.getElementById('players_away').selectedIndex == 0 && document.getElementById('players_home').selectedIndex != 0)
		{
			document.getElementById('status_bar').style.backgroundColor = "yellow";
			document.getElementById('status').innerHTML = "Saving...";
			var e = document.getElementById('players_home');
			$.ajax({
				type: "POST",
				url: "actions/change_score.php",
				dataType: "json",
				data: { val: x, id: e.value, game: game_id, team: 'home' }
			})
			.done(function( msg ) {
				document.getElementById('status_bar').style.backgroundColor = msg.color;
				document.getElementById('status').innerHTML = msg.message;
				if(msg.score != null)
				{
					document.getElementById('score_home').innerHTML = msg.score;
				}
			});
		}
		else if(document.getElementById('players_home').selectedIndex == 0 && document.getElementById('players_away').selectedIndex == 0)
		{
			document.getElementById('status_bar').style.backgroundColor = "red";
			document.getElementById('status').innerHTML = "Score not changed. Select a player.";
		}
	}
	
	//Handles fouls for players
	function foul(x, game_id)
	{
		if(document.getElementById('players_home').selectedIndex == 0 && document.getElementById('players_away').selectedIndex != 0)
		{
			document.getElementById('status_bar').style.backgroundColor = "yellow";
			document.getElementById('status').innerHTML = "Saving...";
			var e = document.getElementById('players_away');
			$.ajax({
				type: "POST",
				url: "actions/foul.php",
				dataType: "json",
				data: { val: x, id: e.value, game: game_id }
			})
			.done(function( msg ) {
				document.getElementById('status_bar').style.backgroundColor = msg.color;
				document.getElementById('status').innerHTML = msg.message;
			});
		}
		else if(document.getElementById('players_away').selectedIndex == 0 && document.getElementById('players_home').selectedIndex != 0)
		{
			document.getElementById('status_bar').style.backgroundColor = "yellow";
			document.getElementById('status').innerHTML = "Saving...";
			var e = document.getElementById('players_home');
			$.ajax({
				type: "POST",
				url: "actions/foul.php",
				dataType: "json",
				data: { val: x, id: e.value, game: game_id }
			})
			.done(function( msg ) {
				document.getElementById('status_bar').style.backgroundColor = msg.color;
				document.getElementById('status').innerHTML = msg.message;
			});
		}
		else if(document.getElementById('players_home').selectedIndex == 0 && document.getElementById('players_away').selectedIndex == 0)
		{
			document.getElementById('status_bar').style.backgroundColor = "red";
			document.getElementById('status').innerHTML = "Fouls not changed. Select a player.";
		}
	}
	
	//Generates the popup to add a player
	function add_player_dialog()
	{
		$('#add_player').dialog();
	}
	
	//Generates the popup to edit a player
	function edit_player_dialog()
	{
		if(document.getElementById('players_home').selectedIndex == 0 && document.getElementById('players_away').selectedIndex != 0)
		{
			var e = document.getElementById('players_away');
			$.ajax({
				type: "POST",
				url: "actions/get_player_info.php",
				dataType: "json",
				data: { val: document.getElementById('players_away').value }
			})
			.done(function( msg ) {
				document.getElementById('edit_num').value = msg.number;
				document.getElementById('edit_last').value = msg.last;
				document.getElementById('edit_first').value = msg.first;
				document.getElementById('edit_id').value = document.getElementById('players_away').value;
				$('#edit_player').dialog();
			});
		}
		else if(document.getElementById('players_away').selectedIndex == 0 && document.getElementById('players_home').selectedIndex != 0)
		{
			var e = document.getElementById('players_home');
			$.ajax({
				type: "POST",
				url: "actions/get_player_info.php",
				dataType: "json",
				data: { val: document.getElementById('players_home').value }
			})
			.done(function( msg ) {
				document.getElementById('edit_num').value = msg.number;
				document.getElementById('edit_last').value = msg.last;
				document.getElementById('edit_first').value = msg.first;
				document.getElementById('edit_id').value = document.getElementById('players_home').value;
				$('#edit_player').dialog();
			});
		}
		else if(document.getElementById('players_home').selectedIndex == 0 && document.getElementById('players_away').selectedIndex == 0)
		{
			document.getElementById('status_bar').style.backgroundColor = "red";
			document.getElementById('status').innerHTML = "You must select a player to perform this action.";
		}
	}
	
	//Cancels player editing
	function cancel_edit()
	{
		document.getElementById('edit_player_form').reset();
		$('#edit_player').dialog('close');
	}
	
	//Edits players in the database
	function edit_player()
	{
		var x = confirm("This action will require the page to refresh and will edit this player's info on the public site. Are you sure?");
		return x;
	}
	
	//Adds players to the database
	function add_player()
	{
		var x = confirm("This action will require the page to refresh and will add this player's info to the public site. Are you sure?");
		return x;
	}
	
	//Manual score edit
	function score_edit_dialog()
	{
		document.getElementById('edit_away').value = document.getElementById('score_away').innerHTML;
		document.getElementById('edit_home').value = document.getElementById('score_home').innerHTML;
		$('#score_edit').dialog()
	}
	
	//Cancel manual score edit
	function cancel_score_edit()
	{
		document.getElementById('score_edit_form').reset();
		$('#score_edit').dialog('close');
	}
	
	//Manual score edit
	function score_edit()
	{
		var x = confirm("This action will require the page to refresh and will flag this game's info as unreliable. Are you sure?");
		return x;
	}