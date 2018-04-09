<?php
include 'zzzzw.php';
				mysqli_query($con,"UPDATE teams SET wins = wins + 1 WHERE id = " . $_GET['ids']);	
			?>
			