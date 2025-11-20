<?php
	if (isset($_SESSION['loggato']) && $_SESSION['loggato'] === true) {
			// Reindirizza l'utente alla pagina index
			header("Location: index.php");
			exit;
		}
	
	$user="simo";
	$pass="vosso";

	// Quando viene inviato il form
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
		$username = $_POST['username'];
		$password = $_POST['password'];

		// Verifica delle credenziali 
		if ($username === $user && $password === $pass) {
				
			// Login corretto: Imposta le variabili di sessione
			$_SESSION['loggato'] = true; // Flag per lo stato di accesso
			$_SESSION['username'] = $username;
			header("Location: index.php"); // CAMBIA con il nome della tua pagina protetta
			exit;
		} 
		else {
			// Login fallito
			echo"<h3>Login Fallito</h3><hr>";
			echo"<p>Username o password errati.</p>";
			$errore_login = "Username o password errati.";
			echo "<script>alert('$errore_login')</script>";
			echo"<br><button><a href=login.php>Torna al login</a></button>";
		}
	}
?>		
