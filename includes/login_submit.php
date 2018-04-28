<?php  
//---------test_code---------
/*
<html>
    <head>
        <title>Login_Submit</title>
    </head>
    <body>
        <hr>
        <a href="test.php">Link To Test</a>
        <hr>
    </body>
</html>
*/

//--------Session Starting-------------
session_start();

//------------------------------------

//------Connection to DataBase----------

	require_once 'dbh.con.php';

//--------------------------------------

if (isset($_POST['submit'])) {
	//--Getting the user data--------
	$uid=$_POST['uname'];
	$pass=$_POST['pwd'];

	//Error handling...
	//Check for empty fields...
	if (empty($uid)||empty($pass)) {
		echo("Username or Password is empty");
		$link_up="../index.html";
		echo('<meta http-equiv="refresh" content="3; url='.$link_up.'">');
		exit();
	} else {
		//Check if the DataBase connection is established.
		if (!$conn) {
			echo("Error  in DB Connection");
			$link_dbError="../index.html";
			echo('<meta http-equiv="refresh" content="3; url='.$link_dbError.'">');
			exit();
		} 
		else {
			//Check if user exist in DataBase.
		$sql="SELECT * FROM users WHERE uname='$uid';";
		$result=mysqli_query($conn,$sql);
		$result_check=mysqli_num_rows($result);
		if ($result_check<1) {
			echo("Invalid user : ".$uid.'<br>'."Rolling Back..." );
			$link_user="../index.html";
			echo('<meta http-equiv="refresh" content="3; url='.$link_user.'">');
			exit();

		} 
		else {
			//Checks the password in DataBase
			if ($row=mysqli_fetch_assoc($result)) {
				$pwd_dehash=password_verify($pass,$row['pwd']);
				if ($pwd_dehash==false) {
					echo("Invalid password");
					$link_pass="../index.html";
				echo('<meta http-equiv="refresh" content="3; url='.$link_pass.'">');
					exit();
				} 
				elseif($pwd_dehash==true) {
					echo('<hr>'."<center><h1>Login Success</h1>".'<br>'."<h2>"." Welcome :".$uid."</h2>".'<hr>');
					$_SESSION['uname']=$row['uname'];
					$_SESSION['fname']=$row['fname'];
					$_SESSION['lname']=$row['lname'];
					$_SESSION['uid']=$row['uid'];
					$URL="home.php";
					echo '<META HTTP-EQUIV="refresh" content="3;URL='.$URL.'">';
					exit();
				}
				else{
				    echo "Login fails : ERR=ERR IN DB FETCH";
				    $link_db_fetch="../index.html";
					echo('<meta http-equiv="refresh" content="3; url='.$link_db_fetch.'">');
					exit();
				}
				
												}
		

		}
		
			}
		}
	}
else {
	echo("Un Authorised Access");
	$link_access="../index.html";
	echo('<meta http-equiv="refresh" content="3; url='.$link_access.'">');
	exit();
	  }


?>
