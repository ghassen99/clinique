<?php
    if (!isset($_SESSION))
        session_start();

    include "models/gallerie.classe.php";
    include "models/information.classe.php";
    include "models/employeur.classe.php";
    include "models/fonction.classe.php"; 
    include "models/bloc.classe.php";
    include "models/specialite.classe.php"; 

    //initialisation des attributs de l’objet gallerie
    $id='';
    $lien='';
    //initialisation des attributs de l’objet information
    $id='';
    $adresse='';
    $mail='';
    $tel='';
    $fax='';
    $presentation='';
    //initialisation des attributs de l’objet employeur
    $id_emp='';
    $nom_emp='';
    $pren_emp='';
    $cin_emp='';
    $password='';
    $conf_password='';
    $naiss_emp='';
    $fonc='';
    $tel_emp='';
    $photo='';
    //initialisation des attributs de l’objet fonction
    $id_f='';
    $lib_f='';
    $specialite='';
    //initialisation des attributs de l’objet bloc
    $id_bloc='';
    $lib_bloc='';
    //initialisation des attributs de l’objet specialite
    $id_spec='';
    $lib_spec='';

    //initialisation des attributs de l’objet mailing
    $name='';
    $email='';
    $subject='';
    $message='';

    //récuperation des valeurs des attributs de l’objet 
    if(isset($_REQUEST['name'])) 
        $name=$_REQUEST['name'];
    if(isset($_REQUEST['email'])) 
        $email=$_REQUEST['email'];
    if(isset($_REQUEST['subject'])) 
        $subject=$_REQUEST['subject'];
    if(isset($_REQUEST['message'])) 
        $message=$_REQUEST['message'];        

    //instanciation de l’objet gallerie
    $gallerie=new gallerie($id,$lien);
    //instanciation de l’objet information
    $information=new information($id,$adresse,$mail,$tel,$fax,$presentation);
    //instanciation de l’objet employeur
    $employeur=new employeur($id_emp,$nom_emp,$pren_emp,$cin_emp,$password,$naiss_emp,$fonc,$tel_emp,$photo);
    //instanciation de l’objet fonction 
    $fonction=new fonction($id_f,$lib_f,$specialite);
    //instanciation de l’objet bloc
    $bloc=new bloc($id_bloc,$lib_bloc,$photo);    
    //instanciation de l’objet specialite
    $specialite=new specialite($id_spec,$lib_spec);

    switch($action){  

        case 'index_client' :   $res=$gallerie->liste($cnx);
                                $res_employeur=$employeur->liste($cnx);
                                $res_information=$information->liste($cnx);
                                $res_specialite=$specialite->liste_spec_med($cnx);
                                $res_bloc=$bloc->liste($cnx);
                                include 'views/client/accueil.view.php';
                                include 'views/client/presentation.view.php';
                                include 'views/client/bloc.view.php';
                                include 'views/client/specialite.view.php';
                                include 'views/client/contact.view.php';
                                break;

        case 'mailing' :        $res_information=$information->liste($cnx);
                                $header="MIME-Version: 1.0\r\n";
                                $header.='From:"'.$name.'"<'.$email.'>'."\n";
                                $header.='Content-Type:text/html; charset="uft-8"'."\n";
                                $header.='Content-Transfer-Encoding: 8bit';
                                
                                $message=$message;
                                mail($res_information[0]->mail, $subject, $message, $header);
                                
                                echo "<script type='text/javascript'>document.location.replace('http://localhost/clinique');</script>";
                                break;
    }
?>