<?php
    session_start(); // apertura sessione
    
    if(!isset($_SESSION["controllo"])){
        header("Location: login.php");
        session_destroy();
        exit();
    }
    
    $_SESSION["lista_prodotti"] = array(
        "Banane"=>2.5, 
        "Ciliegie"=>4, 
        "Arance"=>3, 
        "Braciole"=>12, 
        "Yogurt"=>6);
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carrello della spesa - pagina principale</title>
    </head>
    <body>
        <h3>Carrello della spesa</h3>
        <hr>
        <h3>Lista dei prodotti disponibili</h3>
        <?php
            foreach($_SESSION["lista_prodotti"] as $prod => $prezzo){
                echo("Prodotto: $prod  $prezzo €<br>");
            }
        ?>
    </body>
</html>
