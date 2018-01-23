<?php
    include "models/information.classe.php";
    
    //initialisation des attributs de l’objet information
    $id='';
    $adresse='';
    $mail='';
    $tel='';
    $fax='';
    
    //récuperation des valeurs des attributs de l’objet 
    if(isset($_REQUEST['id'])) 
        $id=$_REQUEST['id'];
    if(isset($_REQUEST['adresse'])) 
        $adresse=$_REQUEST['adresse'];
    if(isset($_REQUEST['mail'])) 
        $mail=$_REQUEST['mail'];
    if(isset($_REQUEST['tel'])) 
        $tel=$_REQUEST['tel'];
    if(isset($_REQUEST['fax'])) 
        $fax=$_REQUEST['fax'];
    
    //instanciation de l’objet information
    $information=new information($id,$adresse,$mail,$tel,$fax);
    
    switch($action){
        case 'ajout1' : include 'views/admin/information/ajout.view.php';
                        break;

        case 'ajout' :  $information->ajout($cnx);
                        break;

        case 'liste':   $res=$information->liste($cnx);
                        include 'views/admin/information/liste.view.php';
                        break;         

        case 'edit1':   $res_information=$information->listWhereId($cnx);
                        include 'views/admin/information/edit.view.php';
                        break;
            
        case 'edit':    $information->edit($cnx);
                        break;
            
        case 'delete':  $information->delete($cnx);
                        break;  
    }
?>