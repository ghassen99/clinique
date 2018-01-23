<?php 
    class information extends functions
    {
    
        private $id;
        private $adresse;
        private $mail;
        private $tel;
        private $fax;

        public function __construct($id,$adresse,$mail,$tel,$fax){ 
            $this->id=$id;
            $this->adresse=$adresse;
            $this->mail=$mail;
            $this->tel=$tel;
            $this->fax=$fax;
        }

        //méthode d'ajout
        public function ajout($cnx){
        	$cnx->exec("insert into information (adresse,mail,tel,fax) 
                values ('".$this->adresse."','".$this->mail."','".$this->tel."','".$this->fax."')");
            $this->redirect("Informations");
        }
        
        //méthode d'affichage
        public function liste($cnx){	
            $resultat=$cnx->query("select * from information")->fetchAll(PDO::FETCH_OBJ) ;		
            return $resultat;
        }
        
        //méthode d'affichage (par id)
        public function listWhereId($cnx){	
            $resultat=$cnx->query("select * from information where id='".$this->id."'")->fetchAll(PDO::FETCH_OBJ) ;		
            return $resultat;
        }
        
        //méthode de suppression
        public function  delete($cnx){	
            $cnx->exec("delete from information where id='".$this->id."'");
            $this->redirect("Informations");
        }
        
        //méthode de modification
        public function  edit($cnx){
            $cnx->exec("update information set adresse='".$this->adresse."', mail='".$this->mail."', tel='".$this->tel."', fax='".$this->fax."' 
                where id='".$this->id."'");
            $this->redirect("Informations");
        }
        
    }
?>