<?php
session_start();

// Il carrello viene svuotato
if (isset($_SESSION["carrello"])) {
    unset($_SESSION["carrello"]);
}

// ritorno alla pagina del carrello
header("Location: carrello.php");
exit;
