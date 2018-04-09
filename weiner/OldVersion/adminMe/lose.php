<?php
include 'zzzzw.php';
				mysqli_query($con,"UPDATE teams SET losses = losses + 1 WHERE id = " . $_GET['ids']);	
			?>
			