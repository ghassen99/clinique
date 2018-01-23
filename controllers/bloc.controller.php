<?php
    include "models/bloc.classe.php";
    
    //initialisation des attributs de l’objet bloc
    $id_bloc='';
    $lib_bloc='';
    $photo='';
    
    //récuperation des valeurs des attributs de l’objet 
    if(isset($_REQUEST['id_bloc'])) 
        $id_bloc=$_REQUEST['id_bloc'];
    if(isset($_REQUEST['lib_bloc'])) 
        $lib_bloc=$_REQUEST['lib_bloc'];
    if(isset($_REQUEST['photo']))
        $photo=$_REQUEST['photo'];
        
    //recuperation de l'image de l'employeur
    if(isset($_FILES['photo']) && $_FILES['photo']['error']==0){
        //if(isset($_REQUEST['photo']))
        //    unlink("files/".$_REQUEST['photo']);

    $photo=$_FILES['photo']['name'];

    $tab=explode('.',$photo);
    $photo=$tab[0]."_".$id_bloc.".".$tab[1];
    $tmp=$_FILES['photo']['tmp_name'];

    copy($tmp,"files/".$photo);
    }
    //instanciation de l’objet bloc
    $bloc=new bloc($id_bloc,$lib_bloc,$photo);
    
    switch($action){
        case 'ajout1' : include 'views/admin/bloc/ajout.view.php';
                        break;

        case 'ajout' :  $bloc->ajout($cnx);
                        break;

        case 'list':    $res=$bloc->liste($cnx);
                        include 'views/admin/bloc/liste.view.php';
                        break;
            
        case 'edit1':   $res_bloc=$bloc->listWhereId($cnx);
                        include 'views/admin/bloc/edit.view.php';
                        break;
            
        case 'edit':    $bloc->edit($cnx);
                        break;
            
        case 'delete':  $bloc->delete($cnx);
                        break;  
    }
?>