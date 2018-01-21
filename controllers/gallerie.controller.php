<?php
    include "models/gallerie.classe.php";
    
    //initialisation des attributs de l’objet gallerie
    $id='';
    $lien='';
    //initialisation des attributs de l’objet 
    
    //récuperation des valeurs des attributs de l’objet 
    if(isset($_REQUEST['id'])) 
        $id=$_REQUEST['id'];
    if(isset($_REQUEST['lien'])) 
        $lien=$_REQUEST['lien'];
        
    //recuperation de l'image de l'employeur
    if(isset($_FILES['lien']) && $_FILES['lien']['error']==0){
        //if(isset($_REQUEST['lien']))
        //    unlink("files/".$_REQUEST['lien']);

    $lien=$_FILES['lien']['name'];

    $tab=explode('.',$lien);
    $lien=$tab[0]."_ gallerie.".$tab[1];
    $tmp=$_FILES['lien']['tmp_name'];

    copy($tmp,"files/".$lien);
    }


    //instanciation de l’objet gallerie
    $gallerie=new gallerie($id,$lien);

    switch($action){
        case 'ajout1' : include 'views/admin/gallerie/ajout.view.php';
                        break;

        case 'ajout' :  $gallerie->ajout($cnx);
                        break;

        case 'liste':   $res=$gallerie->liste($cnx);
                        include 'views/admin/gallerie/liste.view.php';
                        break;
            
        case 'edit1':   $res_gallerie=$gallerie->listWhereId($cnx);
                        include 'views/admin/gallerie/edit.view.php';
                        break;
            
        case 'edit':    $gallerie->edit($cnx);
                        break;
            
        case 'delete':  $gallerie->delete($cnx);
                        break;  
    }
?>