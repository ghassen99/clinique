<?php 
      class login extends functions
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

        //methode login
        public function login($cnx){
            $req=$cnx->query("select * 
                              from employeur 
                              where cin_emp = '".$this->cin_emp."'  
                              and password like'".$this->password."'");
            $verif=$req->rowCount();
            $res=$req->fetchAll();
            
            if($verif==1)
            {
              $_SESSION['login']=$this->cin_emp;
              $_SESSION['pass']=$this->password;
              
              foreach($res as $vs){
                $_SESSION['nom_emp'] = $vs['nom_emp'];
                $_SESSION['pren_emp'] = $vs['pren_emp'];
              }
              
              $this->redirect("index.php");
            }else
              $this->redirect("login.php");
        }

        //methode logout
        public function logout($cnx){
              session_destroy();
              $this->redirect("login.php");
        }
          
    }
?>