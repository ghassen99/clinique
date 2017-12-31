<?php
    if (!isset($_SESSION))
        session_start();

    include "models/rdv.classe.php";
    
    //initialisation des attributs de l’objet rdv
    $id_rdv='';
    $date_rdv='';
    $patient='';
    $maladie='';
    $employeur='';

    //instanciation de l’objet rdv
    $rdv=new rdv($id_rdv,$date_rdv,$patient,$maladie,$employeur);

    switch($action){                
        case 'index' :  $res=$rdv->liste($cnx);
                        include 'views/dashboard/index.view.php';
        break;  
    }
?>