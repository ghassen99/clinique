<?php
    if (!isset($_SESSION))
        session_start();

    //initialisation des attributs de l’objet 

    //anciation de l’objet 

    switch($action){                
        case 'index' : include 'views/dashboard/index.view.php';
        break;  
    }
?>