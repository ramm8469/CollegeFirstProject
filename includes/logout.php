<?php
if (isset($_POST['submit'])) {
	session_start();#Starts the session
	session_unset();#Unset all the variable values in session
	session_destroy();#Destroy the session variables
	echo("<center><h2>Loggin Out in 3 seconds...</p></center>");
	$url="../index.html";
	echo ('<META HTTP-EQUIV="refresh" content="3;url='.$url.'">');
	exit();
}

?>