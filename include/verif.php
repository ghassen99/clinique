<?php
    
    if(!isset($_SESSION['login']) || !isset($_SESSION['pass'])){
        echo "<script>window.location.href='Authentification';</script>";
        exit();
    }
    
?>