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
