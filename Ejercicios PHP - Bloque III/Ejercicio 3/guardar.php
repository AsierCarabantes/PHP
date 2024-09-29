<?php 
    if (isset($_POST["tema"]) && isset($_POST["idioma"])) {
        setcookie("tema", $_POST["tema"], time() + (86400 * 365) + "/");
        setcookie("idioma", $_POST["idioma"], time() + (86400 * 365) + "/");
    }  
    
    header("Location: inicio.php");
?>