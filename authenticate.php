<?php
    if (!isset($_SESSION['auth'])) {
       header('Location:login.php');
       $_SESSION['message']="Eoo! Connectez-vous pour continuer.";
    }
?>