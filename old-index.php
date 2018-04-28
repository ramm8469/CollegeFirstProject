<!DOCTYPE html>
<html>
<head>
	<title>Login_Sign-up_System</title>
</head>
<body>
		<center>

			<!--_____________SignUp_Module_______________-->


			<form action="includes/signup_submit.php" method="POST">
				<legend><b><u>Sign-up</u></b></legend>
				<table>
					<tr>
						<th>
							<td><input type="text" name="fname" placeholder="Enter your first name" maxlength="50" required="required"><br></td>
						</th>
					</tr>
					<tr>
						<th>
							<td><input type="text" name="lname" placeholder="Enter your last name" maxlength="50" required="required"><br></td>
						</th>
					</tr>
					<tr>
						<th>
							<td><input type="text" name="uname" placeholder="Enter user name" maxlength="50" required="required"><br></td>
						</th>
					</tr>
					<tr>
						<th>
							<td><input type="email" name="email" placeholder="Enter your E-mail" required="required"><br></td>
						</th>
					</tr>
					<tr>
						<th>
							<td><input type="password" name="pwd" placeholder="Enter your Password" required="required"><br></td>
						</th>
					</tr>
					<tr>
						<th>
							<td><input type="number" name="phone" placeholder="Enter your Mobile Number" maxlength="15" required="required"><br></td>
						</th>
					</tr>
					<tr>
						<th>
							<td><input type="submit" name="submit" value="SignUp"></td>
						</th>
					</tr>
				</table>

			</form>
			<br><hr><p><strong>>OR<</strong></p><hr><br>

			<!--___________Login_Module_________________-->


			<form action="includes/login_submit.php" method="POST">
				<legend><b><u>Login</u></b></legend>
				<table>
					<tr>
						<th>
							<td>
								<input type="text" name="uname" placeholder="Enter Username or Email id" required="required">								
							</td>
						</th>
					</tr>

					<tr>
						<th>
							<td>
								<input type="password" name="pwd" placeholder="Enter Password" required="required">								
							</td>
						</th>
					</tr>

					<tr>
						<th>
							<td>
								<input type="submit" name="submit" value="Login" >								
							</td>
						</th>
					</tr>
				</table>
				
			</form>
		</center>
</body>
</html>