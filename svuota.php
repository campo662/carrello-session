<?php
    session_start(); // apertura sessione
    
    if(!isset($_SESSION["controllo"])){
        session_destroy();
        header("Location: login.php");
        exit();
    }

    session_unset();
    $_SESSION["controllo"]=true;
    header("Location: carrello.php");
?>
