<?php 
    class specialite extends functions
    {
    
        private $id_spec;
        private $lib_spec;

        public function __construct($id_spec,$lib_spec){ 
            $this->id_spec=$id_spec;
            $this->lib_spec=$lib_spec;
        }

        //méthode d'ajout
        public function ajout($cnx){
        	$cnx->exec("insert into specialite (lib_spec) 
                values ('".$this->lib_spec."')");
            $this->redirect("index.php?controller=specialite&action=liste");
        }
        
        //méthode d'affichage
        public function liste($cnx){	
            $resultat=$cnx->query("select * from specialite")->fetchAll(PDO::FETCH_OBJ) ;		
            return $resultat;
        }
        
        //méthode d'affichage (par id)
        public function listWhereId($cnx){	
            $resultat=$cnx->query("select * from specialite where id_spec='".$this->id_spec."'")->fetch(PDO::FETCH_OBJ) ;		
            return $resultat;
        }
        
        //méthode de suppression
        public function  delete($cnx){	
            $cnx->exec("delete from specialite where id_spec='".$this->id_spec."'");
            $this->redirect("index.php?controller=specialite&action=liste");
        }
        
        //méthode de modification
        public function  edit($cnx){
            $cnx->exec("update specialite set lib_spec='".$this->lib_spec."' 
                where id_spec='".$this->id_spec."'");
            $this->redirect("index.php?controller=specialite&action=liste");
        }
        
    }
?>