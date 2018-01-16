<?php
    include "models/patient.classe.php";
    
    //initialisation des attributs de l’objet patient
    $id_p='';
    $nom_p='';
    $prenom_p='';
    $cin_p='';
    $naissance_p='';
    $adresse='';
    $tel_p='';
    
    //récuperation des valeurs des attributs de l’objet 
    if(isset($_REQUEST['id_p'])) 
        $id_p=$_REQUEST['id_p'];
    if(isset($_REQUEST['nom_p'])) 
        $nom_p=$_REQUEST['nom_p'];
    if(isset($_REQUEST['prenom_p'])) 
        $prenom_p=$_REQUEST['prenom_p'];
    if(isset($_REQUEST['cin_p'])) 
        $cin_p=$_REQUEST['cin_p'];
    if(isset($_REQUEST['naissance_p'])){
        $naissance_p=$_REQUEST['naissance_p'];
        $tab = explode('/',$naissance_p);
        $naissance_p = $tab[2]."-".$tab[0]."-".$tab[1];
    }
    if(isset($_REQUEST['adresse'])) 
        $adresse=$_REQUEST['adresse'];
    if(isset($_REQUEST['tel_p'])) 
        $tel_p=$_REQUEST['tel_p'];
    
    //instanciation de l’objet patient
    $patient=new patient($id_p,$nom_p,$prenom_p,$cin_p,$naissance_p,$adresse,$tel_p);
    
    switch($action){
        case 'ajout1'   :   include 'views/patient/ajout.view.php';
                            break;

        case 'ajout'    :   $patient->ajout($cnx);
                            break;

        case 'details'  :   $res_patient=$patient->listWhereId($cnx);
                            $res=$patient->details_patient($cnx);
                            include 'views/patient/details.view.php';
                            break;
        
        case 'liste'    :   $res=$patient->liste($cnx);
                            include 'views/patient/liste.view.php';
                            break;
            
        case 'edit1'    :   $res_patient=$patient->listWhereId($cnx);
                            include 'views/patient/edit.view.php';
                            break;
            
        case 'edit'     :   $patient->edit($cnx);
                            break;
            
        case 'delete'   :   $patient->delete($cnx);
                            break;  
    }
?>