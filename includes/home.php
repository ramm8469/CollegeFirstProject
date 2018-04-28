<?php

//---------Session Start---------------
session_start();
//-------------------------------------
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>

	<!-- Welcome Greeting to User -->

		<center>
		<hr>
			<p>
		<?php 
		echo("Welocme To Home ".'<br>'." Logged in as :>>> Mr./Mrs. :".$_SESSION['uname'].'<br>');
		echo("<hr>");
		echo("Your ip is :".$_SERVER['REMOTE_ADDR']);
		?>
	</p>
	<hr>
	<br><br><br><br>
	<hr>
	<!--____________Logut_Module________-->

	<form action="logout.php" method="POST">
		<button type="submit" name="submit">Logout</button>
	</form>
	<hr>
	</center>
</body>
</html>