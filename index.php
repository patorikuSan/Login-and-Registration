<?php
session_start();
	require('new-connection.php');

?>
<html>
<head>
	<title>Login with session</title>
	<style type="text/css">
		form{
			text-align: center;
		}
		h1{
			text-align: center;
			font-family: 'helvetica';
		}
		.reg{
			margin: 20px auto;
			padding: 10px;
			width: 350px;
			border-radius: 10px;
			border: 2px solid black;
			background-color: #71e4eF;
		}

		input[type=text], input[type=password]{
			width: 90%;
			font-size: 16px;
			padding: 5px 20px 10px 5px;
			margin-top: 10px;
			background-color: lightgrey;
			border-radius: 12px;

		}

		input[type=submit]{
			width: 90%;
			font-size: 16px;
			padding: 5px 20px 3px;
			margin-top: 25px;
		}
		.logins{
			width: 350px;
			margin: 0px auto;
			height: 250px;
			padding: 10px;
			border-radius: 10px;
			border: 2px solid black;
			background-color: #71e4eF;
		}
	</style>
</head>
<body>
	<?php
	if(isset($_SESSION['message'])){
		echo "<p class='success'>{$_SESSION['message']} </p>";
		unset($_SESSION['message']);
	}
		if(isset($_SESSION['errors'])){
			foreach($_SESSION['errors'] as $error){
				echo "<p class='error'>{$error}</p>";
			}
			unset($_SESSION['errors']);
		}
	?>
	<div class="reg">
		<h1>V88 Registration</h1>
		<form action="process.php" method="POST">
			<input type="text" name="first_name" id="tbx" placeholder="First Name">
			<input type="text" name="last_name" id="tbx" placeholder="Last Name">
			<input type="text" name="email" id="tbx" placeholder="Email">
			<input type="password" name="password" id="tbx" placeholder="Password">
			<input type="password" name="confirm_pass" id="tbx" placeholder="Confirm Password">
			<input type="hidden" name="action" value="register">
			<input type="submit" name="Register" value="register">
		</form>
	</div>
	<div class="logins">
	<h1>V88 Login</h1>
		<form action="process.php" method="POST">
			<input type="text" name="email" id="user" placeholder="Email or username">
			<input type="password" name="password" id="pass" placeholder="Password">
			<input type="hidden" name="action" value="login">
			<input type="submit" value="Log In" name="login">
		</form>
	</div>

</body>
</html>