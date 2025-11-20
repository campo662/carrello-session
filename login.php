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
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2; /* colore piatto */
			margin: 0;
			padding: 20px;
			line-height: 1.5;
			text-align: center; /* tutto centrato */
		}

		
		 h3{
			color: #333;
			margin-bottom: 20px;
		}

		
		label {
			font-size: 14px;
			display: block;
			margin-top: 10px;
		}

		
		div {
			margin-bottom: 10px;
		}

		
		hr {
			margin: 20px auto;
			border: 0;
			height: 1px;
			background-color: #ccc;
		}

		
		button {
			padding: 8px 16px;
			margin-top: 10px;
			background-color: #007bff;
			color: white;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			font-size: 14px;
			display: inline-block;
		}

		button:hover {
			background-color: #0056b3;
		}

	</style>
    
</head>
<body>
	<h3>Login</h3>
	<form action = "check_login.php" method = "POST">
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
