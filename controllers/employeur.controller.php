<?php
    include "models/employeur.classe.php";
    include "models/fonction.classe.php";          
    
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

    $decision=''; //la decision de changement de la mot de passe
    //initialisation des attributs de l’objet fonction
    $id_f='';
    $lib_f='';
    $specialite='';
    
    //récuperation des valeurs des attributs de l’objet 
    if(isset($_REQUEST['id_emp'])) 
        $id_emp=$_REQUEST['id_emp'];

    if(isset($_REQUEST['nom_emp'])) 
        $nom_emp=$_REQUEST['nom_emp'];       

    if(isset($_REQUEST['pren_emp'])) 
        $pren_emp=$_REQUEST['pren_emp'];

    if(isset($_REQUEST['decision'])) 
        $decision=$_REQUEST['decision'];

    if(isset($_REQUEST['photo']))
        $photo=$_REQUEST['photo'];

        if ($photo == null)
        $photo='user.png';
        
    //recuperation de l'image de l'employeur
    if(isset($_FILES['photo']) && $_FILES['photo']['error']==0){
        if(isset($_REQUEST['photo']))
            unlink("files/".$_REQUEST['photo']);

    $photo=$_FILES['photo']['name'];

    $tab=explode('.',$photo);
    $photo=$tab[0]."_".$nom_emp.".".$tab[1];
    $tmp=$_FILES['photo']['tmp_name'];

    copy($tmp,"files/".$photo);
    }


       
    if(isset($_REQUEST['cin_emp'])) 
        $cin_emp=$_REQUEST['cin_emp'];
    if(isset($_REQUEST['password'])) 
        $password=$_REQUEST['password'];    
    if(isset($_REQUEST['conf_password'])) 
    $conf_password=$_REQUEST['conf_password'];
    if(isset($_REQUEST['naiss_emp'])){
        $naiss_emp=$_REQUEST['naiss_emp'];
        $tab = explode('/',$naiss_emp);
        $naiss_emp = $tab[2]."-".$tab[0]."-".$tab[1];
    }
    if(isset($_REQUEST['fonction'])) 
        $fonc=$_REQUEST['fonction'];

    if ($conf_password != $password){
        ?>
            <div class="alert alert-danger alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Erreur!</strong> Les deux mots de passe ne sont pas identiques.
            </div>  
        <?php
        
        if ($action == "edit"){
            $action = "edit1";
        }else{
            $action = "ajout1";
        }
    }
    

    if(isset($_REQUEST['tel_emp'])) 
        $tel_emp=$_REQUEST['tel_emp'];

        //instanciation de l’objet employeur
        $employeur=new employeur($id_emp,$nom_emp,$pren_emp,$cin_emp,$password,$naiss_emp,$fonc,$tel_emp,$photo);
        //instanciation de l’objet fonction (clé étrangére)
        $fonction=new fonction($id_f,$lib_f,$specialite);
        
        switch($action){
            case 'ajout1' : $res_fonction=$fonction->liste($cnx);
                            include 'views/admin/employeur/ajout.view.php';
                            break;

            case 'ajout' :  $employeur->ajout($cnx);
                            break;

            case 'liste':   $res=$employeur->liste($cnx);
                            include 'views/admin/employeur/liste.view.php';
                            break;
                
            case 'edit1':   $res_fonction=$fonction->liste($cnx);
                            $res_employeur=$employeur->listWhereId($cnx);
                            include 'views/admin/employeur/edit.view.php';
                            break;
                
            case 'edit':    if ($decision == 'on')  
                                $employeur->edit($cnx);
                            else 
                                $employeur->edit_sans_changer_password($cnx);

                            break;
                
            case 'delete':  $employeur->delete($cnx);
                            break;  
        }
    
?>