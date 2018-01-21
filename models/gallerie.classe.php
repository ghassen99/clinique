<?php 
    class gallerie extends functions
    {
    
        private $id;
        private $lien;

        public function __construct($id,$lien){ 
            $this->id=$id;
            $this->lien=$lien;
        }

        //méthode d'ajout
        public function ajout($cnx){
        	$cnx->exec("insert into gallerie (lien) 
                values ('".$this->lien."')");
            $this->redirect("index.php?controller=gallerie&action=liste");
        }
        
        //méthode d'affichage
        public function liste($cnx){	
            $resultat=$cnx->query("select * from gallerie")->fetchAll(PDO::FETCH_OBJ) ;		
            return $resultat;
        }
        
        //méthode de suppression
        public function  delete($cnx){	
            $cnx->exec("delete from gallerie where id='".$this->id."'");
            ?>
            <META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php?controller=gallerie&action=liste">
            <?php
            //$this->redirect("index.php?controller=gallerie&action=liste");
                        
        }
        
    }
?>