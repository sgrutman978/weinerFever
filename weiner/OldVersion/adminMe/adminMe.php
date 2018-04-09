<?php
include 'zzzzw.php';
$result4 = mysqli_query($con,"SELECT * FROM people");
                while ($row4 = mysqli_fetch_array($result4)) {
				echo $row4['users'];
				}
				
				?>