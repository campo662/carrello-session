<?php
	// Apertura Sessione 
	session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		$user="simo";
		$pass="vosso";
		
		if ($_POST["username"] == $user="simo" && $_POST["password"] == $pass="vosso") {
			$_SESSION["username"]=$_POST["username"];
			$_SESSION["password"]=$_POST["password"];
			$_SESSION["controllo"]= true;
			header("Location: index.php");
		}
		else{
			header("Location: check_login.php");
		}	
	}	
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width,initial-scale=1.0">
    <title>Login al carrello</title>
</head>
<body>
	<h3>Login</h3>
	<form action = "login.php" method = "POST">
		<div>	
			<label for ="username">Username:</label>
			<input type ="text" id ="username" name ="username" required>
		</div>
		<div>	
			<label for ="password">Password:</label>
			<input type ="password" id ="password" name ="password" required>
		</div>
		<br>
		<button type="submit">Login</button>
	</form>	
</body>
</html>	
