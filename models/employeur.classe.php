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

        public function __construct($id_emp,$nom_emp,$pren_emp,$cin_emp,$password,$naiss_emp,$fonction){ 
            $this->id_emp=$id_emp;
            $this->nom_emp=$nom_emp;
            $this->pren_emp=$pren_emp;
            $this->cin_emp=$cin_emp;
            $this->password=$password;
            $this->naiss_emp=$naiss_emp;
            $this->fonction=$fonction;
        }

        //méthode d'ajout
        public function ajout($cnx){
        	$cnx->exec("insert into employeur (nom_emp,pren_emp,cin_emp,password,naiss_emp,fonction) 
                values ('".$this->nom_emp."','".$this->pren_emp."','".$this->cin_emp."','".$this->password."','".$this->naiss_emp."','".$this->fonction."')");
            $this->redirect("index.php?controller=employeur&action=liste");
        }
        
        //méthode d'affichage
        public function liste($cnx){	
            $resultat=$cnx->query("select * from employeur")->fetchAll(PDO::FETCH_OBJ) ;		
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
            $this->redirect("index.php?controller=employeur&action=liste");
        }
        
        //méthode de modification
        public function  edit($cnx){
            $cnx->exec("update employeur set nom_emp='".$this->nom_emp."', pren_emp='".$this->pren_emp."', cin_emp='".$this->cin_emp."', password='".$this->password."', naiss_emp='".$this->naiss_emp."', fonction='".$this->fonction."' 
                where id_emp='".$this->id_emp."'");
            $this->redirect("index.php?controller=employeur&action=liste");
        }
        
    }
?>