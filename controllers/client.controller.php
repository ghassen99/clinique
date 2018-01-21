<?php
    if (!isset($_SESSION))
        session_start();

    include "models/gallerie.classe.php";

    //initialisation des attributs de l’objet gallerie
    $id='';
    $lien='';

    //instanciation de l’objet gallerie
    $gallerie=new gallerie($id,$lien);

    switch($action){                
        //case 'index_client' :  
        //header("location:views/client/index.php");
        //echo "kkk"; exit;
        //include 'views/client/index.view.php';
       // break;  

        case 'index_client' :   $res=$gallerie->liste($cnx);
                                include 'views/client/accueil.view.php';
                                include 'views/client/presentation.view.php';
                                include 'views/client/equipe.view.php';
                                include 'views/client/specialite.view.php';
                                include 'views/client/contact.view.php';
                                break;
    }
?>