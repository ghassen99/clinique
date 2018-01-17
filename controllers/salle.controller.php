<?php
    include "models/salle.classe.php";
    include "models/bloc.classe.php";          
    
    //initialisation des attributs de l’objet salle
    $id_salle='';
    $nb_lit='';
    $etage='';
    $id_bloc='';
    //initialisation des attributs de l’objet bloc
    $id_bloc='';
    $lib_bloc='';
    
    //récuperation des valeurs des attributs de l’objet 
    if(isset($_REQUEST['id_salle'])) 
        $id_salle=$_REQUEST['id_salle'];
    if(isset($_REQUEST['nb_lit'])) 
        $nb_lit=$_REQUEST['nb_lit'];
    if(isset($_REQUEST['etage'])) 
        $etage=$_REQUEST['etage'];
    if(isset($_REQUEST['id_bloc'])) 
        $id_bloc=$_REQUEST['id_bloc'];
    
    //instanciation de l’objet salle
    $salle=new salle($id_salle,$nb_lit,$etage,$id_bloc);
    
    //instanciation de l’objet bloc (clé étrangére)
    $bloc=new bloc($id_bloc,$lib_bloc);
    
    switch($action){
        case 'ajout1' : $res_bloc=$bloc->liste($cnx);
                        include 'views/salle/ajout.view.php';
                        break;

        case 'ajout' :  $salle->ajout($cnx);
                        break;

        case 'liste':   $res=$salle->liste($cnx);
                        include 'views/salle/liste.view.php';
                        break;
                        
        case 'edit1':   $res_bloc=$bloc->liste($cnx);
                        $res_salle=$salle->listWhereId($cnx);
                        include 'views/salle/edit.view.php';
                        break;
            
        case 'edit':    $salle->edit($cnx);
                        break;
            
        case 'delete':  $salle->delete($cnx);
                        break;  
    }
?>