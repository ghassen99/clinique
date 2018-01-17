<?php 
    class patient extends functions
    {
    
        private $id_p;
        private $nom_p;
        private $prenom_p;
        private $cin_p;
        private $naissance_p;
        private $adresse;
        private $tel_p;

        public function __construct($id_p,$nom_p,$prenom_p,$cin_p,$naissance_p,$adresse,$tel_p){ 
            $this->id_p=$id_p;
            $this->nom_p=$nom_p;
            $this->prenom_p=$prenom_p;
            $this->cin_p=$cin_p;
            $this->naissance_p=$naissance_p;
            $this->adresse=$adresse;
            $this->tel_p=$tel_p;
        }

        //méthode d'ajout
        public function ajout($cnx){
        	$cnx->exec("insert into patient (nom_p,prenom_p,cin_p,naissance_p,adresse,tel_p) 
                values ('".$this->nom_p."','".$this->prenom_p."','".$this->cin_p."','".$this->naissance_p."','".$this->adresse."','".$this->tel_p."')");
            $this->redirect("Patient");
        }
        
        //méthode d'affichage
        public function liste($cnx){	
            $resultat=$cnx->query("select * from patient")->fetchAll(PDO::FETCH_OBJ) ;		
            return $resultat;
        }
        
        //méthode d'affichage (par id)
        public function listWhereId($cnx){	
            $resultat=$cnx->query("select * from patient where id_p='".$this->id_p."'")->fetch(PDO::FETCH_OBJ) ;		
            return $resultat;
        }

        //details du patient (cordonnées, rdv, ...)
        public function details_patient($cnx){
            $resultat=$cnx->query(" select  p.*, rdv.*, m.lib_m
                                    from    patient p, rdv, maladie m
                                    where   p.id_p = '".$this->id_p."'
                                    and     p.id_p = rdv.patient
                               ")->fetchAll(PDO::FETCH_OBJ) ;
            return $resultat;
        }
        
        //méthode de suppression
        public function  delete($cnx){	
            $cnx->exec("delete from patient where id_p='".$this->id_p."'");
            $this->redirect("Patient");
        }
        
        //méthode de modification
        public function  edit($cnx){
            $cnx->exec("update patient set nom_p='".$this->nom_p."', prenom_p='".$this->prenom_p."', cin_p='".$this->cin_p."', naissance_p='".$this->naissance_p."', adresse='".$this->adresse."', tel_p='".$this->tel_p."' 
                where id_p='".$this->id_p."'");
            $this->redirect("Patient");
        }
        
    }
?>