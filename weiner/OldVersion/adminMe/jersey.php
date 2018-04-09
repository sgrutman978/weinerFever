<?php
include 'zzzzw.php';

				mysqli_query($con,"UPDATE players SET playerNumber = " . $_GET['numb'] . " WHERE id = " . $_GET['ids']);
				
?>