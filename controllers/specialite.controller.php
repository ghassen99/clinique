<?php
    include "models/specialite.classe.php";
    
    //initialisation des attributs de l’objet specialite
    $id_spec='';
    $lib_spec='';
    
    //récuperation des valeurs des attributs de l’objet 
    if(isset($_REQUEST['id_spec'])) 
        $id_spec=$_REQUEST['id_spec'];
    if(isset($_REQUEST['lib_spec'])) 
        $lib_spec=$_REQUEST['lib_spec'];
    
    //instanciation de l’objet specialite
    $specialite=new specialite($id_spec,$lib_spec);
    
    switch($action){
        case 'ajout1' : include 'views/specialite/ajout.view.php';
                        break;

        case 'ajout' :  $specialite->ajout($cnx);
                        break;

        case 'liste':   $res=$specialite->liste($cnx);
                        include 'views/specialite/liste.view.php';
                        break;
            
        case 'edit1':   $res_specialite=$specialite->listWhereId($cnx);
                        include 'views/specialite/edit.view.php';
                        break;
            
        case 'edit':    $specialite->edit($cnx);
                        break;
            
        case 'delete':  $specialite->delete($cnx);
                        break;  
    }
?>