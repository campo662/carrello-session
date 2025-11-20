<?php
    session_start(); // apertura sessione
    
    if(!isset($_SESSION["controllo"])){
        session_destroy();
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carrello della spesa - riepilogo</title>
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
    </head>
    <body>
        <h3>Riepilogo carrello</h3>
        <?php
        if(empty($_SESSION["carrello"])){
            echo "Il carrello è vuoto.";
        } else {
            $prezzo_totale = 0;
            foreach($_SESSION["carrello"] as $prodotto => $quantita){
                $prezzo = $_SESSION["lista_prodotti"][$prodotto];
                $prezzo_totale_prodotto = $prezzo* $quantita;
                $prezzo_totale = $prezzo_totale + $prezzo_totale_prodotto;
                echo "$prodotto - $prezzo € x $quantita = $prezzo_totale_prodotto €<br>";
            }
            echo "<br><h4>Prezzo totale: $prezzo_totale €</h4>";
        }
        ?>

        <br>
        <hr>
        
        <h3>Possibili azioni</h3>
        <form method="POST" action="index.php">
            <button type="submit">Torna al carrello</button>
        </form>
        <br>
        <form method="POST" action="logout.php">
            <button type="submit">Effettua il logout</button>
        </form>
        <br>
        <form method="POST" action="svuota.php">
            <button type="submit">Svuota il carrello</button>
        </form>
    </body>
</html>
