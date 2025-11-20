<?php
	if (isset($_SESSION['controllo']) && $_SESSION['controllo'] === true) {
			// Reindirizza l'utente alla pagina index
			header("Location: index.php");
			exit;
		}
		$errore_login = "";

		// Quando viene inviato il form
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			$username = $_POST['username'];
			$password = $_POST['password'];

			// Verifica delle credenziali 
			if ($username === $username_valido && $password === $password_valida) {
				
				// Login corretto: Imposta le variabili di sessione
				$_SESSION['controllo'] = true; // Flag per lo stato di accesso
				$_SESSION['username'] = $username;

				// vai pagina index
				header("Location: index.php"); // CAMBIA con il nome della tua pagina protetta
				exit;
			} else {
				// Login fallito
				$errore_login = "Username o password errati.";
			}
		}
?>		

