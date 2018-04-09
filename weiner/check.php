<?php
if($_POST['wordOfPass'] == 'chickendinner'){
 setcookie("wordOfPass", 'chickendinner');
echo "<script>window.location.href = 'game_select.php';</script>";
	}else{
		echo "<script>window.location.href = 'manager.php';</script>";
	}
	?>