<?php
include 'zzzzw.php';
$stringE = $_GET['gameTime'];
$stringA = urldecode($stringE);
			mysqli_query($con,"UPDATE games SET gameTime = '" . $stringA . "' WHERE id = " . $_GET['ids']);	
				mysqli_query($con,"UPDATE games SET live = 1 WHERE id = " . $_GET['ids']);	
			?>
			