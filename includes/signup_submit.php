<?php  
//--------------------------------------
//----------starting the session--------

session_start();

//-------------------------------------

//---Connection to DataBase------------

	require_once 'dbh.con.php';

//-------------------------------------

if(isset($_POST['submit'])) {
	//----------------------------
	//Getting the data...
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$uname=$_POST['uname'];
		$email=$_POST['email'];
		$pwd=$_POST['pwd'];
		$phone=$_POST['phone'];
	//-----------------------------

	//Error handling
	//checks for empty fields


	if(empty($fname)||empty($lname)||empty($uname)||empty($email)||empty($pwd)||empty($phone) ) {
			
		echo("Input fields are empty");
		$link_empty="../index.html";
		echo('<meta http-equiv="refresh" content="3; url='.$link_empty.'">');
		exit();

	} else {


		//checks for valid character in input fields


		if (preg_match("/^[a-zA-Z]@*$/", $fname) ||preg_match("/^[a-zA-Z]@*$/", $lname) ||preg_match("/^[a-zA-Z]@*$/", $uname) ||preg_match("/^[a-zA-Z]@*$/", $phone) ) {
			echo("Invalid Character input");
			$link_invalid_char="../index.html";
			echo('<meta http-equiv="refresh" content="3; url='.$link_invalid_char.'">');
			exit();
		} else {


			//Check for valid email
			//By php function : filter_var($var,FILTER_VALIDATE_EMAIL);
			if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
				echo("Invalid E-mail");
				$link_invalid_email="../index.html";
				echo('<meta http-equiv="refresh" content="3; url='.$link_invalid_email.'">');
				exit();
			} else {

				//First check db connection

				if (!$conn) {
				    echo " D Connection Fails";
				    $link_db_conn_fails="../index.html";
					echo('<meta http-equiv="refresh" content="3; url='.$link_db_conn_fails.'">');
					exit();
				} else {
					//Checks whether username is already taken in db or not
					$sql="SELECT * FROM users WHERE uname='$uname';";
					$result=mysqli_query($conn,$sql);
					$result_check=mysqli_num_rows($result);

					if ($result_check>0) {
						echo("UserName : ".$uname." Already taken".'<br>'."RollBack to Home");
						$link_uname="../index.html";
						echo('<meta http-equiv="refresh" content="3; url='.$link_uname.'">');
					} else {
						//Hashing the given password
						$hash_pwd=password_hash($pwd,PASSWORD_DEFAULT);

						//Inserting user data into DataBase
						$sql1="INSERT INTO users(fname,lname,uname,email,pwd,phone) VALUES('$fname','$lname','$uname','$email','$hash_pwd','$phone');";
						$result1=mysqli_query($conn,$sql1);
						if (!$result1) {
							echo("Sign_up Fails : ERR=INSR IN DB FAILS");
							$sign_fails="../index.html";
							echo('<meta http-equiv="refresh" content="3; url='.$sign_fails.'">');
							exit();
						} else {
							echo("<center><h1>Sign_up Success</h1>".'<br>'."<h3>Rolling back to Home in 5 seconds..  , please do login ! </h3>");
						$url="../index.html";
						echo('<meta http-equiv="refresh" content="5;url='.$url.'">');
						}
						

					}
					
				}
				
				
			}
			


		}
		

	}
	

} else {
	echo("Un-Authorised");
	$link_unauthorised="../index.html";
echo('<meta http-equiv="refresh" content="3; url='.$link_unauthorised.'">');
	exit();
}

?>