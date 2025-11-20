<?php
    session_start();
    
    //vai in index
    if (isset($_SESSION["controllo"]) && $_SESSION["controllo"] === true) {
        header("Location: index.php");
        exit;
    }
    
    $user = "simo";
    $pass = "vosso";
    
    // Quando viene inviato il form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $username = $_POST["username"];
        $password = $_POST["password"];
    
        // Verifica credenziali
        if ($username === $user && $password === $pass) {
    
            $_SESSION["controllo"] = true;
            $_SESSION["username"] = $username;
    
            header("Location: index.php");
            exit;
    
        } else {
            echo "<h3>Login Fallito</h3><hr>";
            echo "<p>Username o password errati.</p>";
            $errore_login = "Username o password errati.";
            echo "<br><button><a href='login.php'>Torna al login</a></button>";
        }
    }
?>
<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
			margin: 0;
			padding: 20px;
			line-height: 1.5;
			text-align: center; 
		}
			
		h3 {
			color: #333;
			margin-bottom: 20px;
		}
	
		label {
			font-size: 14px;
			display: block;
			margin-top: 10px;
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

