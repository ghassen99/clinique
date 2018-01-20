<?php
    if (!isset($_SESSION))
        session_start();

    

    

    switch($action){                
        case 'index_client' :  
        header("location:views/client/index.php");
        //echo "kkk"; exit;
        //include 'views/client/index.view.php';
        break;  
    }
?>