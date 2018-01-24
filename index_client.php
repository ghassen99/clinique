<?php
    if (!isset($_SESSION))
    session_start();

    include "include/connexion.php" ; 
    include "models/fonctions.classe.php" ; 

    $controller="client";
    $action="index_client";
    if(isset($_REQUEST['controller']))
    {
        $controller=$_REQUEST['controller'];
    }
    if(isset($_REQUEST['action']))
    {
        $action=$_REQUEST['action'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clinique</title>

    <!-- Bootstrap Core CSS -->
    <link href="asset_client/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="asset_client/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="asset_client/css/animate.css" rel="stylesheet" />
    <!-- Squad theme CSS -->
    <link href="asset_client/css/style.css" rel="stylesheet">
    <link href="asset_client/color/default.css" rel="stylesheet">

    <!-- =======================================================
    Theme Name: Squadfree
    Theme URL: https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->

    <!-- __________________________________________ carousel _________________________________________________________ --> 
    <link rel="apple-touch-icon" href="https://www.bootply.com/bootstrap/img/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="https://www.bootply.com/bootstrap/img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="https://www.bootply.com/bootstrap/img/apple-touch-icon-114x114.png">
        <link rel="stylesheet" href="asset_client/carousel/style.css">
    <!-- __________________________________________ carousel _________________________________________________________ -->    
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
    <!-- Preloader -->
    <div id="preloader">
        <div id="load"></div>
    </div>

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="">
                    <h1>Clinique</h1>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">

                    <li class="active"><a href="#intro">Accueil</a></li>
                    <li><a href="#Presentation">Présentation</a></li>
                    <li><a href="#departement">Nos Département</a></li>
                    <li><a href="#specialite">Nos spécialités</a></li>
                    <li><a href="#contact">Contact</a></li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <?php
        include "controllers/".$controller.".controller.php";
    ?>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="wow shake" data-wow-delay="0.4s">
                        <div class="page-scroll marginbot-30">
                            <a href="#intro" id="totop" class="btn btn-circle">
                                <i class="fa fa-angle-double-up animated"></i>
                            </a>
                        </div>
                    </div>
                    <p>&copy;2017 : Projet réalisé par <strong>Ghassen MALLOULI</strong></p>
                    <div class="credits">
                        <!--
                            All the links in the footer should remain intact. 
                            You can delete the links only if you purchased the pro version.
                            Licensing information: https://bootstrapmade.com/license/
                            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Squadfree
                        -->
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Core JavaScript Files -->
    <script src="asset_client/js/jquery.min.js"></script>
    <script src="asset_client/js/bootstrap.min.js"></script>
    <script src="asset_client/js/jquery.easing.min.js"></script>
    <script src="asset_client/js/jquery.scrollTo.js"></script>
    <script src="asset_client/js/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="asset_client/js/custom.js"></script>
    <script src="asset_client/contactform/contactform.js"></script>

</body>

</html>