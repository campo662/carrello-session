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
<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css.css">
	</head>
    <div class="esempio">
            A cura di:
            <br>
            Tommaso Camponogara
            <br>
            Simone Trizzino
        </div>
</html>
