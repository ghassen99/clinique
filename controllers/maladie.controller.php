<?php
    include "models/maladie.classe.php";
    include "models/bloc.classe.php";          
    
    //initialisation des attributs de l’objet maladie
    $id_m='';
    $lib_m='';
    $bloc='';
    //initialisation des attributs de l’objet bloc
    $id_bloc='';
    $lib_bloc='';
    
    //récuperation des valeurs des attributs de l’objet 
    if(isset($_REQUEST['id_m'])) 
        $id_m=$_REQUEST['id_m'];
    if(isset($_REQUEST['lib_m'])) 
        $lib_m=$_REQUEST['lib_m'];
    if(isset($_REQUEST['bloc'])) 
        $bloc=$_REQUEST['bloc'];
    
    //instanciation de l’objet maladie
    $maladie=new maladie($id_m,$lib_m,$bloc);
    
    //instanciation de l’objet bloc (clé étrangére)
    $bloc=new bloc($id_bloc,$lib_bloc);
    
    switch($action){
        case 'ajout1' : $res_bloc=$bloc->liste($cnx);
                        include 'views/maladie/ajout.view.php';
                        break;

        case 'ajout' :  $maladie->ajout($cnx);
                        break;

        case 'liste':   $res=$maladie->liste($cnx);
                        include 'views/maladie/liste.view.php';
                        break;
            
        case 'edit1':   $res_bloc=$bloc->liste($cnx);
                        $res_maladie=$maladie->listWhereId($cnx);
                        include 'views/maladie/edit.view.php';
                        break;
            
        case 'edit':    $maladie->edit($cnx);
                        break;
            
        case 'delete':  $maladie->delete($cnx);
                        break;  
    }
?>