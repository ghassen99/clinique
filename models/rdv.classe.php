<?php 
    class rdv extends functions
    {
    
        private $id_rdv;
        private $date_rdv;
        private $patient;
        private $maladie;
        private $employeur;

        public function __construct($id_rdv,$date_rdv,$patient,$maladie,$employeur){ 
            $this->id_rdv=$id_rdv;
            $this->date_rdv=$date_rdv;
            $this->patient=$patient;
            $this->maladie=$maladie;
            $this->employeur=$employeur;
        }

        //méthode d'ajout
        public function ajout($cnx){
        	$cnx->exec("insert into rdv (date_rdv,patient,maladie,employeur) 
                values ('".$this->date_rdv."','".$this->patient."','".$this->maladie."','".$this->employeur."')");
            $this->redirect("index.php?controller=rdv&action=liste");
        }
        
        //méthode d'affichage
        public function liste($cnx){	
            $resultat=$cnx->query("select   rdv.*, p.*, e.*, m.*, f.lib_f
                                   from     rdv, patient p, employeur e, maladie m, fonction f
                                   where    rdv.patient = p.id_p
                                   and      rdv.maladie = m.id_m
                                   and      rdv.employeur = e.id_emp
                                   and      e.fonction = f.id_f
                                  ")->fetchAll(PDO::FETCH_OBJ) ;		
            return $resultat;
        }

        
        //méthode d'affichage (par id)
        public function listWhereId($cnx){	
            $resultat=$cnx->query("select * from rdv where id_rdv='".$this->id_rdv."'")->fetch(PDO::FETCH_OBJ) ;		
            return $resultat;
        }
        
        //méthode de suppression
        public function  delete($cnx){	
            $cnx->exec("delete from rdv where id_rdv='".$this->id_rdv."'");
            $this->redirect("index.php?controller=rdv&action=liste");
        }
        
        //méthode de modification
        public function  edit($cnx){
            $cnx->exec("update rdv set date_rdv='".$this->date_rdv."', patient='".$this->patient."', maladie='".$this->maladie."', employeur='".$this->employeur."' 
                where id_rdv='".$this->id_rdv."'");
                
            $this->redirect("index.php?controller=rdv&action=liste");
        }
        
    }
?>