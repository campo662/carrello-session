<?php
    session_start(); // apertura sessione
    session_unset(); 
    session_destroy(); 
    header("Location: login.php"); 
    exit();
?>
