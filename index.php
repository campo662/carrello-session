<?php
    session_start();

    if(!isset($_SESSION["controllo"])){
        session_destroy();
        header("Location: login.php");
        exit();
    }

    $_SESSION["lista_prodotti"] = [
        "Banane" => 2.5,
        "Ciliegie" => 4,
        "Arance" => 3,
        "Braciole" => 12,
        "Yogurt" => 6
    ];

    if(!isset($_SESSION["carrello"])) {
        $_SESSION["carrello"] = [];
    }

    // gestione bottoni
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(isset($_POST["aggiungi"])) {
            $prod = $_POST["aggiungi"];
            if(isset($_SESSION["carrello"][$prod])) {
                $_SESSION["carrello"][$prod] = $_SESSION["carrello"][$prod] + 1;
            } 
            else {
                $_SESSION["carrello"][$prod] = 1;
            }
        }

        if(isset($_POST["rimuovi"])) {
            $prod = $_POST["rimuovi"];
            if(isset($_SESSION["carrello"][$prod])){

                $_SESSION["carrello"][$prod]--;

                if($_SESSION["carrello"][$prod] <= 0){
                    unset($_SESSION["carrello"][$prod]);
                }
            }
            else{
                echo "<script>alert('Il prodotto $prod non è nel carrello.');</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carrello della spesa</title>
		<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2; 
			margin: 0;
			padding: 20px;
			line-height: 1.5;
			text-align: center; 
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

    <h3>Prodotti disponibili</h3>

    <?php foreach($_SESSION["lista_prodotti"] as $prod => $prezzo){
        echo"$prod - $prezzo €";
        ?>

        <form method="POST" style="display:inline;">
            <button name="aggiungi" value="<?= $prod ?>">+</button>
        </form>

        <form method="POST" style="display:inline;">
            <button name="rimuovi" value="<?= $prod ?>">-</button>
        </form>

        <br>

        <?php 
        } 
    ?>

    <br>
    <hr>

    <h3>Possibili azioni</h3>
    <form method="POST" action="carrello.php">
        <button type="submit">Visualizza riepilogo carrello</button>
    </form>
    </body>
</html>
