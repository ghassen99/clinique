<?php 
    class fonction extends functions
    {
    
        private $id_f;
        private $lib_f;
        private $specialite;

        public function __construct($id_f,$lib_f,$specialite){ 
            $this->id_f=$id_f;
            $this->lib_f=$lib_f;
            $this->specialite=$specialite;
        }

        //méthode d'ajout
        public function ajout($cnx){
        	$cnx->exec("insert into fonction (lib_f,specialite) 
                values ('".$this->lib_f."','".$this->specialite."')");
            $this->redirect("index.php?controller=fonction&action=liste");
        }
        
        //méthode d'affichage
        public function liste($cnx){	
            $resultat=$cnx->query("select * from fonction")->fetchAll(PDO::FETCH_OBJ) ;		
            return $resultat;
        }
        
        //méthode d'affichage (par id)
        public function listWhereId($cnx){	
            $resultat=$cnx->query("select * from fonction where id_f='".$this->id_f."'")->fetch(PDO::FETCH_OBJ) ;		
            return $resultat;
        }
        
        //méthode de suppression
        public function  delete($cnx){	
            $cnx->exec("delete from fonction where id_f='".$this->id_f."'");
            $this->redirect("index.php?controller=fonction&action=liste");
        }
        
        //méthode de modification
        public function  edit($cnx){
            $cnx->exec("update fonction set lib_f='".$this->lib_f."', specialite='".$this->specialite."' 
                where id_f='".$this->id_f."'");
            $this->redirect("index.php?controller=fonction&action=liste");
        }
        
    }
?>