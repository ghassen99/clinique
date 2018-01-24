<?php 
    class employeur extends functions
    {
    
        private $id_emp;
        private $nom_emp;
        private $pren_emp;
        private $cin_emp;
        private $password;
        private $naiss_emp;
        private $fonction;
        private $tel_emp;
        private $photo;

        public function __construct($id_emp,$nom_emp,$pren_emp,$cin_emp,$password,$naiss_emp,$fonction,$tel_emp,$photo){ 
            $this->id_emp=$id_emp;
            $this->nom_emp=$nom_emp;
            $this->pren_emp=$pren_emp;
            $this->cin_emp=$cin_emp;
            $this->password=$password;
            $this->naiss_emp=$naiss_emp;
            $this->fonction=$fonction;
            $this->tel_emp=$tel_emp;
            $this->photo=$photo;
        }

        //méthode d'ajout
        public function ajout($cnx){
            $this->password=md5(sha1($this->password));
        	$cnx->exec("insert into employeur (nom_emp,pren_emp,cin_emp,password,naiss_emp,fonction,tel_emp,photo) 
                values ('".$this->nom_emp."','".$this->pren_emp."','".$this->cin_emp."','".$this->password."','".$this->naiss_emp."','".$this->fonction."','".$this->tel_emp."','".$this->photo."')");
            $this->redirect("Employeur");
        }
        
        //méthode d'affichage
        public function liste($cnx){	
            $resultat=$cnx->query("select   e.*, f.lib_f, s.*
                                   from     employeur e, fonction f, specialite s
                                   where    e.fonction = f.id_f
                                   and      f.specialite = s.id_spec
                                  ")->fetchAll(PDO::FETCH_OBJ) ;	
            return $resultat;
        }
        
        //méthode d'affichage (par id)
        public function listWhereId($cnx){	
            $resultat=$cnx->query("select * from employeur where id_emp='".$this->id_emp."'")->fetch(PDO::FETCH_OBJ) ;		
            return $resultat;
        }
        
        //méthode de suppression
        public function  delete($cnx){	
            $cnx->exec("delete from employeur where id_emp='".$this->id_emp."'");
            $this->redirect("Employeur");
        }
        
        //méthode de modification
        public function  edit($cnx){
            $this->password=md5(sha1($this->password));
            $cnx->exec("update employeur set nom_emp='".$this->nom_emp."', pren_emp='".$this->pren_emp."', cin_emp='".$this->cin_emp."', password='".$this->password."', naiss_emp='".$this->naiss_emp."',fonction ='".$this->fonction."' , tel_emp='".$this->tel_emp."' , photo='".$this->photo."'
                where id_emp='".$this->id_emp."'");
            $this->redirect("Employeur");
        }

                
        //méthode de modification sans changer la mot de passe
        public function  edit_sans_changer_password($cnx){
            $cnx->exec("update employeur set nom_emp='".$this->nom_emp."', pren_emp='".$this->pren_emp."', cin_emp='".$this->cin_emp."', naiss_emp='".$this->naiss_emp."',fonction ='".$this->fonction."' , tel_emp='".$this->tel_emp."' , photo='".$this->photo."'
                where id_emp='".$this->id_emp."'");
            $this->redirect("Employeur");
        }
    }
?>