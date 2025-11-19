<?php
    session_start();
    
    // Elimino tutte le variabili di sessione
    session_unset();
    
    // Distruggo completamente la sessione
    session_destroy();
    
    // Reindirizzo al login
    header("Location: login.php");
    exit;
?>
