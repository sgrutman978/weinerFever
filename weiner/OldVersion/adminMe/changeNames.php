<?php
include 'zzzzw.php';
      if (isset($_GET['id'])) {
     
        mysqli_query($con,"UPDATE games SET team1='".$_GET['team1']."', team2='".$_GET['team2']."', team1pic='".$_GET['team1_pic']."', team2pic='".$_GET['team2_pic']."' WHERE id=".$_GET['id']);
      }
     
    ?>
    <form>
      Game id: <input type="number" name='id'><br/>
      Team 1: <input type="text" name="team1"><br/>
      Team 2: <input type="text" name="team2"><br/>
	    Team 1 Pic: <input type="text" name="team1_pic"><br/>
      Team 2 Pic: <input type="text" name="team2_pic"><br/>
      <input type='submit' value='update'>
    </form>
   
  