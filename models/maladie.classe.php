<?php 
    class maladie extends functions
    {
    
        private $id_m;
        private $lib_m;
        private $bloc;

        public function __construct($id_m,$lib_m,$bloc){ 
            $this->id_m=$id_m;
            $this->lib_m=$lib_m;
            $this->bloc=$bloc;
        }

        //méthode d'ajout
        public function ajout($cnx){
        	$cnx->exec("insert into maladie (lib_m,bloc) 
                values ('".$this->lib_m."','".$this->bloc."')");
            $this->redirect("Maladie");
        }
        
        //méthode d'affichage
        public function liste($cnx){	
            $resultat=$cnx->query("select   m.*, b.lib_bloc
                                   from     maladie m, bloc b
                                   where    m.bloc = b.id_bloc")->fetchAll(PDO::FETCH_OBJ) ;		
            return $resultat;
        }
        
        //méthode d'affichage (par id)
        public function listWhereId($cnx){	
            $resultat=$cnx->query("select * from maladie where id_m='".$this->id_m."'")->fetch(PDO::FETCH_OBJ) ;		
            return $resultat;
        }

        //méthode de suppression
        public function  delete($cnx){	
            $cnx->exec("delete from maladie where id_m='".$this->id_m."'");
            $this->redirect("Maladie");
        }
        
        //méthode de modification
        public function  edit($cnx){
            $cnx->exec("update maladie set lib_m='".$this->lib_m."', bloc='".$this->bloc."' 
                where id_m='".$this->id_m."'");
            $this->redirect("Maladie");
        }
        
    }
?>