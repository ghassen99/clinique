<?php
$db_name = "clinique";
$oldPath = getcwd();//enregistrement du path actuel pour pouvoir retourner en arriére

if(!file_exists("include"))
mkdir("include", 0777, true);

if(!file_exists("controllers"))
mkdir("controllers", 0777, true);

if(!file_exists("models"))
mkdir("models", 0777, true);

if(!file_exists("views"))
mkdir("views", 0777, true);

echo "######################################################<br>
########### GENERATION DES CONTROLEURS ##########<br>
######################################################
<br>";
include "include/connexion.php";
// controlleur login ***************************************************************** */
/*
$fic=fopen("controllers/login.controller.php", "w+");
$contenu="<?php
    if (!isset(\$_SESSION))
        session_start();

    include \"models/login.classe.php\";

    //initialisation des attributs de l’objet 
    \$[variable]='';

    if(isset(\$_REQUEST['login'])) 
        \$[login]=\$_REQUEST['login'];

    if(isset(\$_REQUEST['pass'])) 
        \$[password]=\$_REQUEST['pass'];

    //anciation de l’objet 
    \$login=new login(\$[variable, ....]);
    
    switch(\$action){
        
        case 'log' : include 'views/authentification/login.view.php';
        break;  

        case 'login': \$login->login(\$cnx);
        break;   

        case 'logout': \$login->logout();
        break;   
    }
?>";
fwrite($fic,$contenu,100000000);
fclose($fic); 

echo "<font color='green'> Le controller login est créé avec succes.</font><br>";
chdir($oldPath);//revenir en arrière
*/
// *********************************************************************************** */

// controlleur dashboard ************************************************************* */
$fic=fopen("controllers/index.controller.php", "w+");
$contenu="<?php
    if (!isset(\$_SESSION))
        session_start();

    //initialisation des attributs de l’objet 

    //anciation de l’objet 

    switch(\$action){                
        case 'index' : include 'views/dashboard/index.view.php';
        break;  
    }
?>";
fwrite($fic,$contenu,100000000);
fclose($fic); 

echo "<font color='green'> Le controller dashboard est créé avec succes.</font><br>";
chdir($oldPath);//revenir en arrière
// *********************************************************************************** */

// les autres controlleurs *********************************************************** */
$req=$cnx->query("SHOW TABLES");
while($res=$req->fetch()){

    //les clé étrangére s'il y a (Recherche)
    $requete2=$cnx->query("
    SELECT  REFERENCED_TABLE_NAME, COLUMN_NAME
    FROM    INFORMATION_SCHEMA.KEY_COLUMN_USAGE
    WHERE   TABLE_NAME = '".$res[0]."'
    ")->fetchAll(PDO::FETCH_OBJ);
    

    $req1=$cnx->query("SELECT * FROM information_schema.columns WHERE table_name = '".$res[0]."' AND table_schema='".$db_name."'");
    $res1=$req1->fetchAll();

    //accéder au controolleur -------
    chdir("controllers");

    $fic=fopen($res[0].".controller.php", "w+");
    
    $contenu="<?php
    include \"models/".$res[0].".classe.php\";
    ";

    //les models des clé étrangéres
    for ($ii=1;$ii<sizeof($requete2);$ii++){ //pour chaque table trouvé
    $contenu.="include \"models/".$requete2[$ii]->REFERENCED_TABLE_NAME.".classe.php\";          
    ";
    }

    $contenu.="
    //initialisation des attributs de l’objet ".$res[0]."
    ";
    foreach($res1 as $val){
    $contenu.="$".$val['COLUMN_NAME']."='';
    ";
    }

    //les clé étrangére s'il y a 
    for ($ii=1;$ii<sizeof($requete2);$ii++){ //pour chaque table trouvé
    $r=$cnx->query("SELECT * FROM information_schema.columns WHERE table_name = '".$requete2[$ii]->REFERENCED_TABLE_NAME."' AND table_schema='".$db_name."'");
    $s=$r->fetchAll();
    $contenu.="//initialisation des attributs de l’objet ".$requete2[$ii]->REFERENCED_TABLE_NAME."
    ";
    foreach($s as $vs){
    $contenu.="$".$vs['COLUMN_NAME']."='';
    ";
    }
    }
 
    $contenu.="
    //récuperation des valeurs des attributs de l’objet 
    ";
    foreach($res1 as $val2){

        if($val2['DATA_TYPE'] == 'date'){  

        $contenu.="if(isset(\$_REQUEST['".$val2['COLUMN_NAME']."'])){"; 
        
        $contenu.="
        $".$val2['COLUMN_NAME']."=\$_REQUEST['".$val2['COLUMN_NAME']."'];";
        $contenu.="
        \$tab = explode('/',\$".$val2['COLUMN_NAME'].");";
        $contenu.="
        $".$val2['COLUMN_NAME']." = \$tab[2].\"-\".\$tab[0].\"-\".\$tab[1];";

        $contenu.="
    }
    ";

            }
            else{             
        $contenu.="if(isset(\$_REQUEST['".$val2['COLUMN_NAME']."'])) 
        \$".$val2['COLUMN_NAME']."=\$_REQUEST['".$val2['COLUMN_NAME']."'];
    ";
    }
    }
    

    $contenu.="
    //instanciation de l’objet ".$res[0]."
    \$".$res[0]."=new ".$res[0]."(";
    $i=0;
    foreach($res1 as $val){
    $contenu.="$".$val['COLUMN_NAME'];
    $i++;
    if($i<count($res1))
    $contenu.=",";
    }
    $contenu.=");
    ";
    
    //les clé étrangére s'il y a (écécution de la requete)
    for ($ii=1;$ii<sizeof($requete2);$ii++){ //pour chaque table trouvé

    $r=$cnx->query("SELECT * FROM information_schema.columns WHERE table_name = '".$requete2[$ii]->REFERENCED_TABLE_NAME."' AND table_schema='".$db_name."'");
    $s=$r->fetchAll();

    $contenu.="
    //instanciation de l’objet ".$requete2[$ii]->REFERENCED_TABLE_NAME." (clé étrangére)
    \$".$requete2[$ii]->REFERENCED_TABLE_NAME."=new ".$requete2[$ii]->REFERENCED_TABLE_NAME."(";
    $i=0;
    foreach($s as $v){
    $contenu.="$".$v['COLUMN_NAME'];
    $i++;
    if($i<count($s))
    $contenu.=",";
    }
    $contenu.=");
    ";
    }
    
    $contenu.="
    switch(\$action){
        case 'ajout1' : ";

    //les clé étrangére s'il y a (Recherche)
    $requete2=$cnx->query("
                            SELECT  REFERENCED_TABLE_NAME, COLUMN_NAME
                            FROM    INFORMATION_SCHEMA.KEY_COLUMN_USAGE
                            WHERE   TABLE_NAME = '".$res[0]."'
                            ")->fetchAll(PDO::FETCH_OBJ);
    
    //les clé étrangére s'il y a 
    for ($ii=1;$ii<sizeof($requete2);$ii++){ //pour chaque table trouvé
    $contenu.=
                "\$res_".$requete2[$ii]->REFERENCED_TABLE_NAME."=$".$requete2[$ii]->REFERENCED_TABLE_NAME."->liste(\$cnx);
                        ";
    }
 
    $contenu.="include 'views/".$res[0]."/ajout.view.php';
                        break;

        case 'ajout' :  \$".$res[0]."->ajout(\$cnx);
                        break;

        case 'liste':   \$res=\$".$res[0]."->liste(\$cnx);
                        include 'views/".$res[0]."/liste.view.php';
                        break;
            
        case 'edit1':   ";   
    //les clé étrangére s'il y a 
    for ($ii=1;$ii<sizeof($requete2);$ii++){ //pour chaque table trouvé
        $contenu.=
                "\$res_".$requete2[$ii]->REFERENCED_TABLE_NAME."=$".$requete2[$ii]->REFERENCED_TABLE_NAME."->liste(\$cnx);
                        ";
        }

    $contenu.="\$res_".$res[0]."=\$".$res[0]."->listWhereId(\$cnx);
                        include 'views/".$res[0]."/edit.view.php';
                        break;
            
        case 'edit':    \$".$res[0]."->edit(\$cnx);
                        break;
            
        case 'delete':  \$".$res[0]."->delete(\$cnx);
                        break;  
    }
?>";
fwrite($fic,$contenu,100000000);
fclose($fic); 

echo "<font color='green'>le controller ".$res[0]." est créé avec succes.</font><br>";
chdir($oldPath);//revenir en arrière
}
// *********************************************************************************** */

echo "######################################################<br>
######################################################<br>
######################################################
<br><br>######################################################<br>
############# GENERATION DES MODELES #############<br>
######################################################
<br>";

//classe fonctions ******************************************************************* */
$fic=fopen("models/fonctions.classe.php", "w+");
$contenu="<?php 
    class functions{
        public function redirect(\$url){
            echo \"<script>window.location.href='\".\$url.\"';</script>\";
        }
    }
?>";
fwrite($fic,$contenu,100000000);
fclose($fic); 

echo "<font color='green'>le model fonctions est créé avec succes.</font><br>";
chdir($oldPath);//revenir en arrière
// *********************************************************************************** */

//classe login *********************************************************************** */
/*
$fic=fopen("models/login.classe.php", "w+");
$contenu="<?php 
    class login extends functions{
    
        private [\$Variables..];

        public function __construct([\$Variables..], ....){ 
            \$this->[\$Variable]=$[\$Variable];
            ...
        }

        //methode login
        public function login(\$cnx){
            \$req=\$cnx->query(\"select  * 
                              from    [table_name] 
                              where   [login] = '\".\$this->[login].\"'  
                              and     [password] like'\".\$this->[password].\"'\");
            \$verif=\$req->rowCount();
            if(\$verif==1)
            {
                \$_SESSION['login']=\$this->[login];
                \$_SESSION['pass']=\$this->[password];
                \$this->redirect(\"index.php\");
            }else
                \$this->redirect(\"login.php\");
        }

        //methode logout
        public function logout(\$cnx){
            session_destroy();
            \$this->redirect(\"login.php\");
        }
        
    }
?>";
fwrite($fic,$contenu,100000000);
fclose($fic); 

echo "<font color='green'>le model fonctions est créé avec succes.</font><br>";
chdir($oldPath);//revenir en arrière
*/
// *********************************************************************************** */

// les autres models ***************************************************************** */
    $req=$cnx->query("SHOW TABLES");

    while($res=$req->fetch()){
    //créer un dossier pour chaque ojet dans le dossiers models/
    if(!file_exists("models"))
        mkdir("models", 0777, true);
    
    $req1=$cnx->query("SELECT * FROM information_schema.columns WHERE table_name = '".$res[0]."' AND table_schema='".$db_name."'");
    $res1=$req1->fetchAll();
    
    //accéder au model -------
    chdir("models");
    
    //generer model
    $fic=fopen($res[0].".classe.php", "w+");
    
    $contenu="<?php 
    class ".$res[0]." extends functions
    {
    ";
    
    foreach($res1 as $val){
        $contenu.="
        private $".$val['COLUMN_NAME'].";";
    }

    //constructeur
    
    $contenu.="\n";

    $contenu.="
        public function __construct(";
        $i=0;
        foreach($res1 as $val){
        $contenu.="$".$val['COLUMN_NAME'];
        $i++;
        if($i<count($res1))
        $contenu.=",";
        }
        $contenu.="){ ";
        $i=0;
        foreach($res1 as $val){
            $contenu.="
            \$this->".$val['COLUMN_NAME']."=\$".$val['COLUMN_NAME'].";";
            $i++;
            };		
        //fin du fichier
        $contenu.="
        }";

    //méthode d'ajout ****************************************************************
        $contenu.="\n
        //méthode d'ajout";
        $contenu.="
        public function ajout(\$cnx){
        ";
        // insert into 'nom_table' (les colonnes) values (
        $contenu.="	\$cnx->exec(\"insert into ".$res[0]." (";
        $i=0;
        foreach($res1 as $val){
            if ($i>0){
            $contenu.=$val['COLUMN_NAME'];
            
            if($i<count($res1)-1)
                $contenu.=",";
            }
            $i++;
            }
        $contenu.=") 
                values (";
        
        // les valeurs qui sont dans les zones de texte
        $i=0;
        foreach($res1 as $val){
            if ($i>0){
            $contenu.="'\".\$this->".$val['COLUMN_NAME'].".\"'";
            
            if($i<count($res1)-1)
            $contenu.=",";
            }
            $i++;
        }
        $contenu.=")\");";

        // redirection 
        $contenu.="
            \$this->redirect(\"index.php?controller=".$res[0]."&action=liste\");";
        $contenu.="
        }
        ";
    // **************************************************************************************

    //méthode d'affichage *******************************************************************
        $contenu.="
        //méthode d'affichage";

        $contenu.="
        public function liste(\$cnx){";
        $contenu.="	
            \$resultat=\$cnx->query(\"select * from ".$res[0]."\")->fetchAll(PDO::FETCH_OBJ) ;";
        $contenu.="		
            return \$resultat;
        }
        ";
    // **************************************************************************************

    //méthode d'affichage (par id) **********************************************************
        $contenu.="
        //méthode d'affichage (par id)";
        $contenu.="
        public function listWhereId(\$cnx){";
        $contenu.="	
            \$resultat=\$cnx->query(\"select * from ".$res[0]." where ".$res1[0]['COLUMN_NAME']."='\".\$this->".$res1[0]['COLUMN_NAME'].".\"'\")->fetch(PDO::FETCH_OBJ) ;";
        $contenu.="		
            return \$resultat;
        }
        ";
    // **************************************************************************************	

    //méthode de suppression ****************************************************************
        $contenu.="
        //méthode de suppression";
        $contenu.="
        public function  delete(\$cnx){";
        $contenu.="	
            \$cnx->exec(\"delete from ".$res[0]." where ".$res1[0]['COLUMN_NAME']."='\".\$this->".$res1[0]['COLUMN_NAME'].".\"'\");";
        // redirection 
        $contenu.="
            \$this->redirect(\"index.php?controller=".$res[0]."&action=liste\");";
        $contenu.="
        }
        ";
    // **************************************************************************************	

    //méthode de modification ***************************************************************
        $contenu.="
        //méthode de modification";
        $contenu.="
        public function  edit(\$cnx){";
            $contenu.="
            \$cnx->exec(\"update ".$res[0]." set ";
            $i=0;
            foreach($res1 as $val){
                if ($i >0){
                $contenu.=$val['COLUMN_NAME']."=";
                $contenu.="'\".\$this->".$val['COLUMN_NAME'].".\"'";
                if($i<count($res1)-1)
                    $contenu.=", ";
                }
                $i++;
            }
            $contenu.=" 
                where ".$res1[0]['COLUMN_NAME']."='\".\$this->".$res1[0]['COLUMN_NAME'].".\"'\");";
            
        // redirection 
        $contenu.="
            \$this->redirect(\"index.php?controller=".$res[0]."&action=liste\");";
        $contenu.="
        }
        ";
    // **************************************************************************************
    
    $contenu.="
    }
?>";
fwrite($fic,$contenu,100000000);
fclose($fic); 

echo "<font color='green'>le model ".$res[0]." est créé avec succes.</font><br>";
chdir($oldPath);//revenir en arrière

}
// *********************************************************************************** */

chdir($oldPath);//revenir en arrière

echo "######################################################<br>
######################################################<br>
######################################################
<br><br>######################################################<br>
############# GENERATION du dossier include ############<br>
######################################################
<br>";
 
// fichier connexion ***************************************************************** */
$fic=fopen("include/connexion.php", "w+");
$contenu="<?php
    try{
        \$cnx= new PDO('mysql:host=localhost;dbname=".$db_name."', 'root', '');
        \$cnx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    }
    catch(PDOException \$e){
        echo \"Connection a MySql impossible :\", \$e->getMessage();
        exit(); //ou die();
    }
?>";
fwrite($fic,$contenu,100000000);
fclose($fic); 

echo "<font color='green'> Le fichier connexion est créé avec succes.</font><br>";
chdir($oldPath);//revenir en arrière
// *********************************************************************************** */

// fichier vérif ********************************************************************* */
$fic=fopen("include/verif.php", "w+");
$contenu="<?php
    /*
    if(!isset(\$_SESSION['login']) || !isset(\$_SESSION['pass'])){
        echo \"<script>window.location.href='login.php';</script>\";
        exit();
    }
    */
?>";
fwrite($fic,$contenu,100000000);
fclose($fic); 

echo "<font color='green'>le fichier verif est créé avec succes.</font><br>";
chdir($oldPath);//revenir en arrière
// *********************************************************************************** */

echo "######################################################<br>
######################################################<br>
######################################################
<br><br>######################################################<br>
############### GENERATION DES VUES ###############<br>
######################################################
<br>";
 
// index ***************************************************************************** */
$fic=fopen("index.php", "w+");
$contenu='<?php
    if (!isset($_SESSION))
    session_start();

    include "include/connexion.php" ; 
    include "models/fonctions.classe.php" ; 
    include "include/verif.php" ; 

    $controller="index";
    $action="index";
    if(isset($_REQUEST[\'controller\']))
    {
        $controller=$_REQUEST[\'controller\'];
    }
    if(isset($_REQUEST[\'action\']))
    {
        $action=$_REQUEST[\'action\'];
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <title> </title>
    
        <!-- Bootstrap -->
        <link href="asset/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="asset/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="asset/vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- Datatables -->
        <link href="asset/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="asset/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="asset/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="asset/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="asset/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="asset/build/css/custom.min.css" rel="stylesheet">
    
        <!-- bootstrap-daterangepicker -->
        <link href="asset/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <!-- bootstrap-datetimepicker -->
        <link href="asset/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    
    </head>
    
    <body class="nav-md">
        <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
            <div class="left_col scroll-view">


                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                <div class="profile_pic">
                    <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                </div>
                <div class="profile_info">
                    <span>Welcome,</span>
                    <h2>John Doe</h2>
                </div>
                <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    <h3>General</h3>
                    <ul class="nav side-menu">
                    <li><a href="index.php?controller=index&action=index"><i class="fa fa-home"></i> dashboard</a></li>                      
                    ';
                    //menu à gauche

                    $req=$cnx->query("SHOW TABLES");
                    while($res=$req->fetch()){
                    $contenu.='
                    <li><a href="index.php?controller='.$res[0].'&action=liste"><i class="fa fa-chevron-circle-right"></i> '.$res[0].'</a></li>
                    ';
                    }
                    $contenu.='
                    </ul>
                </div>


                </div>
                <!-- /sidebar menu -->

            </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
            <div class="nav_menu">
                <nav>
                <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>

                <ul class="nav navbar-nav navbar-right">
                    <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="images/img.jpg" alt="">John Doe
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="javascript:;"> Profile</a></li>
                        <li>
                        <a href="javascript:;">
                            <span class="badge bg-red pull-right">50%</span>
                            <span>Settings</span>
                        </a>
                        </li>
                        <li><a href="javascript:;">Help</a></li>
                        <li><a href="index.php?controller=login&action=logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                    </li>

                    <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">6</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <li>
                        <a>
                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                            <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                            </span>
                        </a>
                        </li>

                        <li>
                        <div class="text-center">
                            <a>
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                        </li>
                    </ul>
                    </li>
                </ul>
                </nav>
            </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
            <div class="">
                <div class="page-title">

                </div>

                <div class="clearfix"></div>

                <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                    
                    <div class="x_content">
                        <?php
                            include "controllers/".$controller.".controller.php";
                        ?>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
        </div>

        <!-- jQuery -->
        <script src="asset/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="asset/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="asset/vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="asset/vendors/nprogress/nprogress.js"></script>
        
        <!-- Custom Theme Scripts -->
        <script src="asset/build/js/custom.min.js"></script>

        <!-- validator -->
        <script src="asset/vendors/validator/validator.js"></script>

        <!-- Datatables -->
        <script src="asset/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="asset/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="asset/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="asset/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
        <script src="asset/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="asset/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="asset/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="asset/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
        <script src="asset/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="asset/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="asset/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
        <script src="asset/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
        <script src="asset/vendors/jszip/dist/jszip.min.js"></script>
        <script src="asset/vendors/pdfmake/build/pdfmake.min.js"></script>
        <script src="asset/vendors/pdfmake/build/vfs_fonts.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="asset/vendors/moment/min/moment.min.js"></script>
        <script src="asset/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap-datetimepicker -->    
        <script src="asset/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

            <!-- Initialize datetimepicker -->
    <script>
        $(\.#myDatepicker\.).datetimepicker();
        
        $(\.#myDatepicker2\.).datetimepicker({
            format: \.DD.MM.YYYY\.
        });
        
        $(\.#myDatepicker3\.).datetimepicker({
            format: \.hh:mm A\.
        });
        
        $(\.#myDatepicker4\.).datetimepicker({
            ignoreReadonly: true,
            allowInputToggle: true
        });

        $(\.#datetimepicker6\.).datetimepicker();
        
        $(\.#datetimepicker7\.).datetimepicker({
            useCurrent: false
        });
        
        $("#datetimepicker6").on("dp.change", function(e) {
            $(\.#datetimepicker7\.).data("DateTimePicker").minDate(e.date);
        });
        
        $("#datetimepicker7").on("dp.change", function(e) {
            $(\.#datetimepicker6\.).data("DateTimePicker").maxDate(e.date);
        });
    </script>
    </body>


    </html>
        
    ';
fwrite($fic,$contenu,100000000);
fclose($fic); 

echo "<font color='green'> index créé avec succes.</font><br>";
chdir($oldPath);//revenir en arrière
// *********************************************************************************** */

// interface login ******************************************************************* */
$fic=fopen("login.php", "w+");
$contenu='<?php
    if (!isset($_SESSION))
        session_start();
    include "include/connexion.php" ; 
    include "models/fonctions.classe.php" ; 

    $controller="login";
    $action="log";
    if(isset($_REQUEST[\'controller\'])){
        $controller=$_REQUEST[\'controller\'];
    }
    if(isset($_REQUEST[\'action\'])){
        $action=$_REQUEST[\'action\'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Authentification</title>

    <!-- Bootstrap -->
    <link href="asset/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="asset/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="asset/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="asset/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="asset/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="asset/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="asset/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="asset/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="asset/build/css/custom.min.css" rel="stylesheet">

</head>

<body>
    <div class="container body">
    <div class="main_container">

        <!-- page content -->
        <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
            </div>

            <div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div>
                            <?php
                                include "controllers/".$controller.".controller.php";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
        <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
        </div>
        <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
    </div>

    <!-- jQuery -->
    <script src="asset/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="asset/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="asset/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="asset/vendors/nprogress/nprogress.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="asset/build/js/custom.min.js"></script>

    <!-- validator -->
    <script src="asset/vendors/validator/validator.js"></script>

    <!-- Datatables -->
    <script src="asset/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="asset/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="asset/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="asset/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="asset/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="asset/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="asset/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="asset/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="asset/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="asset/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="asset/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="asset/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="asset/vendors/jszip/dist/jszip.min.js"></script>
    <script src="asset/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="asset/vendors/pdfmake/build/vfs_fonts.js"></script>

</body>
</html>
';
fwrite($fic,$contenu,100000000);
fclose($fic); 

echo "<font color='green'> Login créé avec succes.</font><br>";
chdir($oldPath);//revenir en arrière
// *********************************************************************************** */

// interface dashboard *************************************************************** */
chdir("views");
if(!file_exists("dashboard"))
    mkdir("dashboard", 0777, true);
    
$fic=fopen("dashboard/index.view.php", "w+");
$contenu='';
fwrite($fic,$contenu,100000000);
fclose($fic); 

echo "<font color='green'> dashboard créé avec succes.</font><br>";
// *********************************************************************************** */

// interface authentification ******************************************************** */
if(!file_exists("authentification"))
    mkdir("authentification", 0777, true);

$fic=fopen("authentification/login.view.php", "w+");
$contenu=
'<div class="page-title">
    <span style="text-align:center;"><h1>Authentification</h1></span><br>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">

        <div class="x_content">

        <form  method="post" action="login.php?controllers=login&action=login" class="form-horizontal form-label-left" novalidate >
            
                <!-- Login -->
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                    Login <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="login" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="login" placeholder="Login" required="required" type="text">
                    </div>
                </div>
            
                <!-- password -->
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                    password <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="pass" type="password" class="form-control" data-validate-length-range="30" name="pass" placeholder="password" required="required">
                    </div>
                </div>
            
                <div class="ln_solid"></div>
                <div class="form-group">
                <div style="text-align:right;" class="col-md-6 col-md-offset-3">
                    <button id="send" type="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-primary">Cancel</button>
                </div>
                </div>
        </form>
        </div>
    </div>
    </div>
</div>
';
fwrite($fic,$contenu,100000000);
fclose($fic); 

echo "<font color='green'> Authentification créé avec succes.</font><br>";
chdir($oldPath);//revenir en arrière
// *********************************************************************************** */


chdir("views");
$oldPath = getcwd();

// liste ********************************************************************** */
    $req=$cnx->query("SHOW TABLES");
  
    while($res=$req->fetch()){
    

    //créer un dossier pour chaque table dans le dossiers views/
    if(!file_exists($res[0]))
        mkdir($res[0], 0777, true);
    
        chdir($res[0]);
        

        $req1=$cnx->query("SELECT * FROM information_schema.columns WHERE table_name = '".$res[0]."' AND table_schema='".$db_name."'");
        $res1=$req1->fetchAll();
    
        $fic=fopen("liste.view.php", "w+");
        $contenu='
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        <form method="post" action="index.php?controller='.$res[0].'&action=ajout1">
                            <h1>
                                Liste des '.$res[0].'s 
                                <i style="font-size:24px;color:green" class="fa"><button type="submit">&#xf067;</button></i>
                            </h1>
                        </form>
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                                <tr>
                            ';
                            //les nom des champs
                            foreach($res1 as $val){
                                $contenu.='   <th>';
                                $contenu.=$val['COLUMN_NAME'];
                                $contenu.='</th>
                            ';
                            }
                            $contenu.='   <th>';
                            $contenu.='</th>                              
                                </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                            foreach ($res as $obj) {
                            ?>
                                <tr>
                            ';
                            //les nom des champs
                            foreach($res1 as $val){
                                $contenu.='     <td><?php echo $obj->';
                                $contenu.=$val['COLUMN_NAME'];
                                $contenu.=' ?></td>
                            ';
                            }
                            $contenu.='     <td>
                                   <button type="button"> <a  href="index.php?controller='.$res[0].'&action=delete&'.$res1[0]['COLUMN_NAME'].'=<?php echo $obj->'.$res1[0]['COLUMN_NAME'].';?>"onclick="if(confirm(\'Etes vous sure de supprimer?\')) return true ;else return false"><i style="font-size:24px;color:red" class="fa">&#xf1f8;</i></a></button>
                                   <button type="button"> <a  href="index.php?controller='.$res[0].'&action=edit1&'.$res1[0]['COLUMN_NAME'].'=<?php echo $obj->'.$res1[0]['COLUMN_NAME'].';?>"><i class="fa fa-pencil-square-o" style="font-size:24px;color:blue"></i></a></button>';
                            $contenu.='</td>                              
                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                        

                        
                    </table>
                </div>
            </div>
        </div>
        </div>
        ';

        fwrite($fic,$contenu,100000000);
        fclose($fic); 

        echo "<font color='green'> page liste crée avec succes.</font><br>";
        chdir($oldPath);//revenir en arrière
    }
    chdir($oldPath);//revenir en arrière
// *************************************************************************** */
  
// ajout ********************************************************************** */
    $req=$cnx->query("SHOW TABLES");
    
    while($res=$req->fetch()){
    //créer un dossier pour chaque table dans le dossiers views/
    if(!file_exists($res[0]))
        mkdir($res[0], 0777, true);
    
        chdir($res[0]);
        
        $contenu='';   
        $req1=$cnx->query("SELECT * FROM information_schema.columns WHERE table_name = '".$res[0]."' AND table_schema='".$db_name."'");
        $res1=$req1->fetchAll();
    
        $fic=fopen("ajout.view.php", "w+");
        $contenu.='
        <?php
        if (!isset($_SESSION))
            session_start();
        ?>

        <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Nouveau '.$res[0].'</h3>
            </div>

            <div class="title_right">

            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content">

                <form  method="post" action="index.php?controller='.$res[0].'&action=ajout" class="form-horizontal form-label-left" novalidate >
                    ';
                    $i=0;
                    $ii=0;
                    //les clé étrangére s'il y a (Recherche)
                    $requete2=$cnx->query("
                    SELECT  *
                    FROM    INFORMATION_SCHEMA.KEY_COLUMN_USAGE
                    WHERE   TABLE_NAME = '".$res[0]."'
                    ")->fetchAll(PDO::FETCH_OBJ);
                    
                    //print_r($requete2);
                    foreach($res1 as $val){
                     
                    if ($i>0){
                        

                        if($val['DATA_TYPE'] == 'date'){
                            $contenu.='                         
                            <!-- '.$val['COLUMN_NAME'].' -->
                            <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                            '.$val['COLUMN_NAME'].' <span class="required">*</span>
                            </label>
                            <div class="col-md-3">
                            <div class="daterangepicker dropdown-menu ltr single opensright show-calendar picker_3 xdisplay"><div class="calendar left single" style="display: block;"><div class="daterangepicker_input"><input class="input-mini form-control active" type="text" name="daterangepicker_start" value="" style="display: none;"><i class="fa fa-calendar glyphicon glyphicon-calendar" style="display: none;"></i><div class="calendar-time" style="display: none;"><div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i></div></div><div class="calendar-table"><table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-chevron-left glyphicon glyphicon-chevron-left"></i></th><th colspan="5" class="month">Oct 2016</th><th class="next available"><i class="fa fa-chevron-right glyphicon glyphicon-chevron-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="weekend off available" data-title="r0c0">25</td><td class="off available" data-title="r0c1">26</td><td class="off available" data-title="r0c2">27</td><td class="off available" data-title="r0c3">28</td><td class="off available" data-title="r0c4">29</td><td class="off available" data-title="r0c5">30</td><td class="weekend available" data-title="r0c6">1</td></tr><tr><td class="weekend available" data-title="r1c0">2</td><td class="available" data-title="r1c1">3</td><td class="available" data-title="r1c2">4</td><td class="available" data-title="r1c3">5</td><td class="available" data-title="r1c4">6</td><td class="available" data-title="r1c5">7</td><td class="weekend available" data-title="r1c6">8</td></tr><tr><td class="weekend available" data-title="r2c0">9</td><td class="available" data-title="r2c1">10</td><td class="available" data-title="r2c2">11</td><td class="available" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="weekend available" data-title="r2c6">15</td></tr><tr><td class="weekend available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="today active start-date active end-date available" data-title="r3c2">18</td><td class="available" data-title="r3c3">19</td><td class="available" data-title="r3c4">20</td><td class="available" data-title="r3c5">21</td><td class="weekend available" data-title="r3c6">22</td></tr><tr><td class="weekend available" data-title="r4c0">23</td><td class="available" data-title="r4c1">24</td><td class="available" data-title="r4c2">25</td><td class="available" data-title="r4c3">26</td><td class="available" data-title="r4c4">27</td><td class="available" data-title="r4c5">28</td><td class="weekend available" data-title="r4c6">29</td></tr><tr><td class="weekend available" data-title="r5c0">30</td><td class="available" data-title="r5c1">31</td><td class="off available" data-title="r5c2">1</td><td class="off available" data-title="r5c3">2</td><td class="off available" data-title="r5c4">3</td><td class="off available" data-title="r5c5">4</td><td class="weekend off available" data-title="r5c6">5</td></tr></tbody></table></div></div><div class="calendar right" style="display: none;"><div class="daterangepicker_input"><input class="input-mini form-control" type="text" name="daterangepicker_end" value="" style="display: none;"><i class="fa fa-calendar glyphicon glyphicon-calendar" style="display: none;"></i><div class="calendar-time" style="display: none;"><div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i></div></div><div class="calendar-table"><table class="table-condensed"><thead><tr><th></th><th colspan="5" class="month">Nov 2016</th><th class="next available"><i class="fa fa-chevron-right glyphicon glyphicon-chevron-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="weekend off available" data-title="r0c0">30</td><td class="off available" data-title="r0c1">31</td><td class="available" data-title="r0c2">1</td><td class="available" data-title="r0c3">2</td><td class="available" data-title="r0c4">3</td><td class="available" data-title="r0c5">4</td><td class="weekend available" data-title="r0c6">5</td></tr><tr><td class="weekend available" data-title="r1c0">6</td><td class="available" data-title="r1c1">7</td><td class="available" data-title="r1c2">8</td><td class="available" data-title="r1c3">9</td><td class="available" data-title="r1c4">10</td><td class="available" data-title="r1c5">11</td><td class="weekend available" data-title="r1c6">12</td></tr><tr><td class="weekend available" data-title="r2c0">13</td><td class="available" data-title="r2c1">14</td><td class="available" data-title="r2c2">15</td><td class="available" data-title="r2c3">16</td><td class="available" data-title="r2c4">17</td><td class="available" data-title="r2c5">18</td><td class="weekend available" data-title="r2c6">19</td></tr><tr><td class="weekend available" data-title="r3c0">20</td><td class="available" data-title="r3c1">21</td><td class="available" data-title="r3c2">22</td><td class="available" data-title="r3c3">23</td><td class="available" data-title="r3c4">24</td><td class="available" data-title="r3c5">25</td><td class="weekend available" data-title="r3c6">26</td></tr><tr><td class="weekend available" data-title="r4c0">27</td><td class="available" data-title="r4c1">28</td><td class="available" data-title="r4c2">29</td><td class="available" data-title="r4c3">30</td><td class="off available" data-title="r4c4">1</td><td class="off available" data-title="r4c5">2</td><td class="weekend off available" data-title="r4c6">3</td></tr><tr><td class="weekend off available" data-title="r5c0">4</td><td class="off available" data-title="r5c1">5</td><td class="off available" data-title="r5c2">6</td><td class="off available" data-title="r5c3">7</td><td class="off available" data-title="r5c4">8</td><td class="off available" data-title="r5c5">9</td><td class="weekend off available" data-title="r5c6">10</td></tr></tbody></table></div></div><div class="ranges" style="display: none;"><div class="range_inputs"><button class="applyBtn btn btn-sm btn-success" type="button">Apply</button> <button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button></div></div></div>

                            <fieldset>
                                <div class="control-group">
                                <div class="controls">
                                    <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" id="single_cal3" name="'.$val['COLUMN_NAME'].'" value="<?php echo date(\'m/d/Y\');?>" placeholder="'.$val['COLUMN_NAME'].'" aria-describedby="inputSuccess2Status3">
                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                                    </div>
                                </div>
                                </div>
                            </fieldset>
                            </div>
                            </div>  
                            ';
                        }
                        
                        else{
                            $find=0;
                            foreach($requete2 as $vr){

                                if (($vr->COLUMN_NAME == $val['COLUMN_NAME'])){
                                    $find=1;
                                    $col = $vr->REFERENCED_COLUMN_NAME;
                                }
                            }
                                if ($find == 1){
                                $contenu.='
                                <!-- '.$val['COLUMN_NAME'].' -->
                                <div class="item form-group">
                                    <label class="control-label col-md-3" for="name">
                                    '.$val['COLUMN_NAME'].' <span class="required">*</span>
                                    </label>
                                    <span class="col-md-6">
                                        <select class="form-control col-md-7 col-xs-12" name="'.$val['COLUMN_NAME'].'" id="'.$val['COLUMN_NAME'].'">
                                        <?php
                                        foreach($res_'.$val['COLUMN_NAME'].' as $obj){
                                            echo "<option value=".$obj->'.$col.'.">".$obj->'.$col.'."</options>";   
                                        }
                                        ?>
                                        </select>   
                                    </span>

                                </div>
                            ';
                                }
                                else{
                                    $contenu.='
                                    <!-- '.$val['COLUMN_NAME'].' -->
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                        '.$val['COLUMN_NAME'].' <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="'.$val['COLUMN_NAME'].'" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="'.$val['COLUMN_NAME'].'" placeholder="'.$val['COLUMN_NAME'].'" required="required" type="text">
                                        </div>
                                    </div>
                                ';
                                    }
                                }
                    }
                    $i++;
                    }
                    
                    $contenu.='
                    <div class="ln_solid"></div>
                    <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <button id="send" type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-primary">Cancel</button>
                    </div>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
        </div>
      
        ';

        fwrite($fic,$contenu,100000000);
        fclose($fic); 

        echo "<font color='green'> page ajout crée avec succes.</font><br>";
        chdir($oldPath);//revenir en arrière
    }
    chdir($oldPath);//revenir en arrière
// *************************************************************************** */
  
// edit ********************************************************************** */
    $req=$cnx->query("SHOW TABLES");

    while($res=$req->fetch()){
    //créer un dossier pour chaque table dans le dossiers views/
        if(!file_exists($res[0]))
        mkdir($res[0], 0777, true);
        
        chdir($res[0]);
        

        $req1=$cnx->query("SELECT * FROM information_schema.columns WHERE table_name = '".$res[0]."' AND table_schema='".$db_name."'");
        $res1=$req1->fetchAll();
        
        $fic=fopen("edit.view.php", "w+");
        $contenu='
        <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Détails du '.$res[0].'</h3>
            </div>

            <div class="title_right">

            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content">

                <form  method="post" action="index.php?controller='.$res[0].'&action=edit" class="form-horizontal form-label-left" novalidate >

                    <input type="hidden" name="'.$res1[0]['COLUMN_NAME'].'" value="<?php echo $res->'.$res1[0]['COLUMN_NAME'].'; ?>"><br>
                    ';
                    foreach($res1 as $val){
                        if($val['DATA_TYPE'] == 'date'){
                        $contenu.='
                        <!-- '.$val['COLUMN_NAME'].' -->
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                            '.$val['COLUMN_NAME'].' <span class="required">*</span>
                            </label>
                            <div class="col-md-3">
                            <div class="daterangepicker dropdown-menu ltr single opensright show-calendar picker_3 xdisplay"><div class="calendar left single" style="display: block;"><div class="daterangepicker_input"><input class="input-mini form-control active" type="text" name="daterangepicker_start" value="" style="display: none;"><i class="fa fa-calendar glyphicon glyphicon-calendar" style="display: none;"></i><div class="calendar-time" style="display: none;"><div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i></div></div><div class="calendar-table"><table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-chevron-left glyphicon glyphicon-chevron-left"></i></th><th colspan="5" class="month">Oct 2016</th><th class="next available"><i class="fa fa-chevron-right glyphicon glyphicon-chevron-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="weekend off available" data-title="r0c0">25</td><td class="off available" data-title="r0c1">26</td><td class="off available" data-title="r0c2">27</td><td class="off available" data-title="r0c3">28</td><td class="off available" data-title="r0c4">29</td><td class="off available" data-title="r0c5">30</td><td class="weekend available" data-title="r0c6">1</td></tr><tr><td class="weekend available" data-title="r1c0">2</td><td class="available" data-title="r1c1">3</td><td class="available" data-title="r1c2">4</td><td class="available" data-title="r1c3">5</td><td class="available" data-title="r1c4">6</td><td class="available" data-title="r1c5">7</td><td class="weekend available" data-title="r1c6">8</td></tr><tr><td class="weekend available" data-title="r2c0">9</td><td class="available" data-title="r2c1">10</td><td class="available" data-title="r2c2">11</td><td class="available" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="weekend available" data-title="r2c6">15</td></tr><tr><td class="weekend available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="today active start-date active end-date available" data-title="r3c2">18</td><td class="available" data-title="r3c3">19</td><td class="available" data-title="r3c4">20</td><td class="available" data-title="r3c5">21</td><td class="weekend available" data-title="r3c6">22</td></tr><tr><td class="weekend available" data-title="r4c0">23</td><td class="available" data-title="r4c1">24</td><td class="available" data-title="r4c2">25</td><td class="available" data-title="r4c3">26</td><td class="available" data-title="r4c4">27</td><td class="available" data-title="r4c5">28</td><td class="weekend available" data-title="r4c6">29</td></tr><tr><td class="weekend available" data-title="r5c0">30</td><td class="available" data-title="r5c1">31</td><td class="off available" data-title="r5c2">1</td><td class="off available" data-title="r5c3">2</td><td class="off available" data-title="r5c4">3</td><td class="off available" data-title="r5c5">4</td><td class="weekend off available" data-title="r5c6">5</td></tr></tbody></table></div></div><div class="calendar right" style="display: none;"><div class="daterangepicker_input"><input class="input-mini form-control" type="text" name="daterangepicker_end" value="" style="display: none;"><i class="fa fa-calendar glyphicon glyphicon-calendar" style="display: none;"></i><div class="calendar-time" style="display: none;"><div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i></div></div><div class="calendar-table"><table class="table-condensed"><thead><tr><th></th><th colspan="5" class="month">Nov 2016</th><th class="next available"><i class="fa fa-chevron-right glyphicon glyphicon-chevron-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="weekend off available" data-title="r0c0">30</td><td class="off available" data-title="r0c1">31</td><td class="available" data-title="r0c2">1</td><td class="available" data-title="r0c3">2</td><td class="available" data-title="r0c4">3</td><td class="available" data-title="r0c5">4</td><td class="weekend available" data-title="r0c6">5</td></tr><tr><td class="weekend available" data-title="r1c0">6</td><td class="available" data-title="r1c1">7</td><td class="available" data-title="r1c2">8</td><td class="available" data-title="r1c3">9</td><td class="available" data-title="r1c4">10</td><td class="available" data-title="r1c5">11</td><td class="weekend available" data-title="r1c6">12</td></tr><tr><td class="weekend available" data-title="r2c0">13</td><td class="available" data-title="r2c1">14</td><td class="available" data-title="r2c2">15</td><td class="available" data-title="r2c3">16</td><td class="available" data-title="r2c4">17</td><td class="available" data-title="r2c5">18</td><td class="weekend available" data-title="r2c6">19</td></tr><tr><td class="weekend available" data-title="r3c0">20</td><td class="available" data-title="r3c1">21</td><td class="available" data-title="r3c2">22</td><td class="available" data-title="r3c3">23</td><td class="available" data-title="r3c4">24</td><td class="available" data-title="r3c5">25</td><td class="weekend available" data-title="r3c6">26</td></tr><tr><td class="weekend available" data-title="r4c0">27</td><td class="available" data-title="r4c1">28</td><td class="available" data-title="r4c2">29</td><td class="available" data-title="r4c3">30</td><td class="off available" data-title="r4c4">1</td><td class="off available" data-title="r4c5">2</td><td class="weekend off available" data-title="r4c6">3</td></tr><tr><td class="weekend off available" data-title="r5c0">4</td><td class="off available" data-title="r5c1">5</td><td class="off available" data-title="r5c2">6</td><td class="off available" data-title="r5c3">7</td><td class="off available" data-title="r5c4">8</td><td class="off available" data-title="r5c5">9</td><td class="weekend off available" data-title="r5c6">10</td></tr></tbody></table></div></div><div class="ranges" style="display: none;"><div class="range_inputs"><button class="applyBtn btn btn-sm btn-success" type="button">Apply</button> <button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button></div></div></div>
    
                            <fieldset>
                            <div class="control-group">
                                <div class="controls">
                                <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                <?php

                                        $'.$val['COLUMN_NAME'].'=$res_'.$res[0].'->'.$val['COLUMN_NAME'].';
                                        $tab = explode(\'-\',$'.$val['COLUMN_NAME'].');
                                        $'.$val['COLUMN_NAME'].' = $tab[1]."/".$tab[2]."/".$tab[0];
    
                                ?>
                                    <input type="text" class="form-control has-feedback-left" id="single_cal3"  value="<?php echo $'.$val['COLUMN_NAME'].'; ?>" name="'.$val['COLUMN_NAME'].'" placeholder="'.$val['COLUMN_NAME'].'" aria-describedby="inputSuccess2Status3">
                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                                </div>
                                </div>
                            </div>
                            </fieldset>
                            </div>
                        </div>      
                        ';
                        }else{
                        $contenu.='
                    <!-- '.$val['COLUMN_NAME'].' -->
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                        '.$val['COLUMN_NAME'].' <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="<?php echo $res_'.$res[0].'->'.$val['COLUMN_NAME'].'; ?>" id="'.$val['COLUMN_NAME'].'" class="form-control col-md-7 col-xs-12" data-validate-length-range="30" name="'.$val['COLUMN_NAME'].'" placeholder="'.$val['COLUMN_NAME'].'" required type="text">
                        </div>
                    </div>
                    ';
                        }
                    }
                    $contenu.='
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button id="send" type="submit" class="btn btn-success">Submit</button>
                            <button type="reset" class="btn btn-primary">Cancel</button>
                        </div>
                    </div>
                    </form>
                    ';

                    $contenu.='
                </div>
            </div>
            </div>
        </div>
        </div>

        ';
    
        fwrite($fic,$contenu,100000000);
        fclose($fic); 

        echo "<font color='green'> page edit crée avec succes.</font><br>";
        chdir($oldPath);//revenir en arrière
    }
    chdir($oldPath);//revenir en arrière
// *************************************************************************** */

  

echo "######################################################<br>
######################################################<br>
######################################################
<br>";
 
// *********************************************************************************** */
 
?>