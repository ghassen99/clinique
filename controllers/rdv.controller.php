<?php
    include "models/rdv.classe.php";
    include "models/patient.classe.php";          
    include "models/employeur.classe.php";          
    include "models/maladie.classe.php";          
    
    //initialisation des attributs de l’objet rdv
    $id_rdv='';
    $date_rdv='';
    $patient='';
    $maladie='';
    $employeur='';
    //initialisation des attributs de l’objet patient
    $id_p='';
    $nom_p='';
    $prenom_p='';
    $cin_p='';
    $naissance_p='';
    $adresse='';
    $tel_p='';
    //initialisation des attributs de l’objet employeur
    $id_emp='';
    $nom_emp='';
    $pren_emp='';
    $cin_emp='';
    $password='';
    $naiss_emp='';
    $fonction='';
    $tel_emp='';
    $photo='';
    //initialisation des attributs de l’objet maladie
    $id_m='';
    $lib_m='';
    $bloc='';
    
    //récuperation des valeurs des attributs de l’objet 
    if(isset($_REQUEST['id_rdv'])) 
        $id_rdv=$_REQUEST['id_rdv'];
    if(isset($_REQUEST['date_rdv'])){
        $date_rdv=$_REQUEST['date_rdv'];
        $tab = explode('/',$date_rdv);
        $date_rdv = $tab[2]."-".$tab[0]."-".$tab[1];
    }
    if(isset($_REQUEST['patient'])) 
        $patient=$_REQUEST['patient'];
    if(isset($_REQUEST['maladie'])) 
        $maladie=$_REQUEST['maladie'];
    if(isset($_REQUEST['employeur'])) 
        $employeur=$_REQUEST['employeur'];
    
    //instanciation de l’objet rdv
    $rdv=new rdv($id_rdv,$date_rdv,$patient,$maladie,$employeur);
    
    //instanciation de l’objet patient (clé étrangére)
    $patient=new patient($id_p,$nom_p,$prenom_p,$cin_p,$naissance_p,$adresse,$tel_p);
    
    //instanciation de l’objet employeur (clé étrangére)
    $employeur=new employeur($id_emp,$nom_emp,$pren_emp,$cin_emp,$password,$naiss_emp,$fonction,$tel_emp,$photo);
    
    //instanciation de l’objet maladie (clé étrangére)
    $maladie=new maladie($id_m,$lib_m,$bloc);
    
    switch($action){
        case 'ajout1' : $res_patient=$patient->liste($cnx);
                        $res_employeur=$employeur->liste($cnx);
                        $res_maladie=$maladie->liste($cnx);
                        include 'views/admin/rdv/ajout.view.php';
                        break;

        case 'ajout' :  $rdv->ajout($cnx);
                        break;

        case 'liste':   $res=$rdv->liste($cnx);
                        include 'views/admin/rdv/liste.view.php';
                        break;
            
        case 'edit1':   $res_patient=$patient->liste($cnx);
                        $res_employeur=$employeur->liste($cnx);
                        $res_maladie=$maladie->liste($cnx);
                        $res_rdv=$rdv->listWhereId($cnx);
                        include 'views/admin/rdv/edit.view.php';
                        break;
            
        case 'edit':    $rdv->edit($cnx);
                        break;
            
        case 'delete':  $rdv->delete($cnx);
                        break;  
    }
?>