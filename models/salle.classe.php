<?php 
    class salle extends functions
    {
    
        private $id_salle;
        private $nb_lit;
        private $etage;
        private $id_bloc;

        public function __construct($id_salle,$nb_lit,$etage,$id_bloc){ 
            $this->id_salle=$id_salle;
            $this->nb_lit=$nb_lit;
            $this->etage=$etage;
            $this->id_bloc=$id_bloc;
        }

        //méthode d'ajout
        public function ajout($cnx){
        	$cnx->exec("insert into salle (nb_lit,etage,id_bloc) 
                values ('".$this->nb_lit."','".$this->etage."','".$this->id_bloc."')");
            $this->redirect("index.php?controller=salle&action=liste");
        }
        
        //méthode d'affichage
        public function liste($cnx){	
            $resultat=$cnx->query("select * from salle")->fetchAll(PDO::FETCH_OBJ) ;		
            return $resultat;
        }
        
        //méthode d'affichage (par id)
        public function listWhereId($cnx){	
            $resultat=$cnx->query("select * from salle where id_salle='".$this->id_salle."'")->fetch(PDO::FETCH_OBJ) ;		
            return $resultat;
        }
        
        //méthode de suppression
        public function  delete($cnx){	
            $cnx->exec("delete from salle where id_salle='".$this->id_salle."'");
            $this->redirect("index.php?controller=salle&action=liste");
        }
        
        //méthode de modification
        public function  edit($cnx){
            $cnx->exec("update salle set nb_lit='".$this->nb_lit."', etage='".$this->etage."', id_bloc='".$this->id_bloc."' 
                where id_salle='".$this->id_salle."'");
            $this->redirect("index.php?controller=salle&action=liste");
        }
        
    }
?>