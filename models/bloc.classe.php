<?php 
    class bloc extends functions
    {
    
        private $id_bloc;
        private $lib_bloc;

        public function __construct($id_bloc,$lib_bloc){ 
            $this->id_bloc=$id_bloc;
            $this->lib_bloc=$lib_bloc;
        }

        //méthode d'ajout
        public function ajout($cnx){
        	$cnx->exec("insert into bloc (lib_bloc) 
                values ('".$this->lib_bloc."')");
            
            $this->redirect("Departement");
        }
        
        //méthode d'affichage
        public function liste($cnx){	
            $resultat=$cnx->query("select * from bloc")->fetchAll(PDO::FETCH_OBJ) ;		
            return $resultat;
        }
        
        //méthode d'affichage (par id)
        public function listWhereId($cnx){	
            $resultat=$cnx->query("select * from bloc where id_bloc='".$this->id_bloc."'")->fetch(PDO::FETCH_OBJ) ;		
            return $resultat;
        }
        
        //méthode de suppression
        public function  delete($cnx){	
            $cnx->exec("delete from bloc where id_bloc='".$this->id_bloc."'");
            $this->redirect("Departement");
        }
        
        //méthode de modification
        public function  edit($cnx){
            $cnx->exec("update bloc set lib_bloc='".$this->lib_bloc."' 
                where id_bloc='".$this->id_bloc."'");
            $this->redirect("Departement");
        }
        
    }
?>