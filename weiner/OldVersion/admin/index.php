<body style="text-align:center">

</br>

<p style="color:green;font:bold;font-size:60px">Weiner Database Editor</p>

</br>

<form method="post" action="adminGames.php">
Password: <input type="password" name="passcode" />
<input type="submit" />
</form>

<?php





if(isset($_GET['wrong'])){
if($_GET['wrong'] == 1){
echo "<p style='color:red'>Wrong Password</p>";
}
}
?>

</body>