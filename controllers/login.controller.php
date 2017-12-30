<?php
    if (!isset($_SESSION))
        session_start();

    include "models/login.classe.php";
    //initialisation des attributs de l’objet 
    $id_emp='';
    $nom_emp='';
    $pren_emp='';
    $cin_emp='';
    $password='';
    $naiss_emp='';
    $fonction='';

    if(isset($_REQUEST['login'])) 
      $cin_emp=$_REQUEST['login'];

    if(isset($_REQUEST['pass'])) 
      $password=$_REQUEST['pass'];

    //Instanciation de l’objet 
    $inst=new login($id_emp,$nom_emp,$pren_emp,$cin_emp,$password,$naiss_emp,$fonction);
    
    switch($action){
        
        case 'log' : include 'views/authentification/login.view.php';
        break;  

        case 'login': $inst->login($cnx);
        break;   

        case 'logout': $inst->logout();
        break;   
    }
?>