<?php
include 'zzzzw.php';

				mysqli_query($con,"UPDATE games SET live = 1 WHERE id = " . $_GET['ids']);	
			?>
			