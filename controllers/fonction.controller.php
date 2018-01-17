<?php
    include "models/fonction.classe.php";
    include "models/specialite.classe.php";          
    
    //initialisation des attributs de l’objet fonction
    $id_f='';
    $lib_f='';
    $specialite='';
    //initialisation des attributs de l’objet specialite
    $id_spec='';
    $lib_spec='';
    
    //récuperation des valeurs des attributs de l’objet 
    if(isset($_REQUEST['id_f'])) 
        $id_f=$_REQUEST['id_f'];
    if(isset($_REQUEST['lib_f'])) 
        $lib_f=$_REQUEST['lib_f'];
    if(isset($_REQUEST['specialite'])) 
        $specialite=$_REQUEST['specialite'];
    
    //instanciation de l’objet fonction
    $fonction=new fonction($id_f,$lib_f,$specialite);
    
    //instanciation de l’objet specialite (clé étrangére)
    $specialite=new specialite($id_spec,$lib_spec);
    
    switch($action){
        case 'ajout1' : $res_specialite=$specialite->liste($cnx);
                        include 'views/admin/fonction/ajout.view.php';
                        break;

        case 'ajout' :  $fonction->ajout($cnx);
                        break;

        case 'liste':   $res=$fonction->liste($cnx);
                        include 'views/admin/fonction/liste.view.php';
                        break;
            
        case 'edit1':   $res_specialite=$specialite->liste($cnx);
                        $res_fonction=$fonction->listWhereId($cnx);
                        include 'views/admin/fonction/edit.view.php';
                        break;
            
        case 'edit':    $fonction->edit($cnx);
                        break;
            
        case 'delete':  $fonction->delete($cnx);
                        break;  
    }
?>