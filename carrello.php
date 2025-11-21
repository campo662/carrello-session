<?php
    session_start(); // apertura sessione
    
    if(!isset($_SESSION["controllo"])){
        session_destroy();
        header("Location: login.php");
        exit();
    }

    // gestione bottoni
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(isset($_POST["aggiungi"])) {
            $prodotto = $_POST["aggiungi"];
            if(isset($_SESSION["carrello"][$prodotto])) {
                $_SESSION["carrello"][$prodotto] = $_SESSION["carrello"][$prodotto] + 1;
            } 
            else {
                $_SESSION["carrello"][$prodotto] = 1;
            }
        }

        if(isset($_POST["rimuovi"])) {
            $prodotto = $_POST["rimuovi"];
            if(isset($_SESSION["carrello"][$prodotto])){
                $_SESSION["carrello"][$prodotto]--;
                if($_SESSION["carrello"][$prodotto] <= 0){
                    unset($_SESSION["carrello"][$prodotto]);
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css.css">
        <title>Carrello della spesa - riepilogo</title>
    </head>
    <body>
        <div id="titolo">
            <h2>Gestione carrello</h2>
        </div>
        <hr>

        <h3>Riepilogo carrello</h3>
        <?php
        if(empty($_SESSION["carrello"])){
            echo "Il carrello è vuoto.";
        } 
        else {
            $prezzo_totale = 0;
            foreach($_SESSION["carrello"] as $prodotto => $quantita){
                $prezzo = $_SESSION["lista_prodotti"][$prodotto];
                $prezzo_totale_prodotto = $prezzo* $quantita;
                $prezzo_totale = $prezzo_totale + $prezzo_totale_prodotto;
                echo "$prodotto - $prezzo € x $quantita = $prezzo_totale_prodotto €"; 
                ?>

                <form method="POST" style="display:inline;">
                    <button name="aggiungi" value="<?= $prodotto ?>">+</button>
                </form>

                <form method="POST" style="display:inline;">
                    <button name="rimuovi" value="<?= $prodotto ?>">-</button>
                </form>
                <br>

                <?php
            }
            echo "<br><h4>Prezzo totale: $prezzo_totale €</h4>";
        }
        ?>

        <br>
        <hr>
        
        <h3>Possibili azioni</h3>
        <form method="POST" action="index.php" style="display:inline;">
            <button type="submit">Torna al carrello</button>
        </form>
        <form method="POST" action="logout.php" style="display:inline;">
            <button type="submit">Effettua il logout</button>
        </form>
        <form method="POST" action="svuota.php" style="display:inline;">
            <button type="submit">Svuota il carrello</button>
        </form>

        <div class="esempio">
            A cura di:
            <br>
            Tommaso Camponogara
            <br>
            Simone Trizzino
        </div>
    </body>
</html>
