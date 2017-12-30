<?php
    include "models/bloc.classe.php";
    
    //initialisation des attributs de l’objet bloc
    $id_bloc='';
    $lib_bloc='';
    
    //récuperation des valeurs des attributs de l’objet 
    if(isset($_REQUEST['id_bloc'])) 
        $id_bloc=$_REQUEST['id_bloc'];
    if(isset($_REQUEST['lib_bloc'])) 
        $lib_bloc=$_REQUEST['lib_bloc'];
    
    //instanciation de l’objet bloc
    $bloc=new bloc($id_bloc,$lib_bloc);
    
    switch($action){
        case 'ajout1' : include 'views/bloc/ajout.view.php';
                        break;

        case 'ajout' :  $bloc->ajout($cnx);
                        break;

        case 'liste':   $res=$bloc->liste($cnx);
                        include 'views/bloc/liste.view.php';
                        break;
            
        case 'edit1':   $res_bloc=$bloc->listWhereId($cnx);
                        include 'views/bloc/edit.view.php';
                        break;
            
        case 'edit':    $bloc->edit($cnx);
                        break;
            
        case 'delete':  $bloc->delete($cnx);
                        break;  
    }
?>