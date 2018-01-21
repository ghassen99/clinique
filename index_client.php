<?php
    if (!isset($_SESSION))
    session_start();

    include "include/connexion.php" ; 
    include "models/fonctions.classe.php" ; 
    //include "include/verif.php" ; 
/*
    define('PHP_FIREWALL_REQUEST_URI', strip_tags( $_SERVER['REQUEST_URI'] ) );
    define('PHP_FIREWALL_ACTIVATION', true );
    if ( is_file( @dirname(__FILE__).'/php-firewall/firewall.php' ) )
    include_once( @dirname(__FILE__).'/php-firewall/firewall.php' );
*/
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

<!-- caroussel -->
    <script src="asset/js_gallerie/jquery-2.1.3.min.js"></script>
    <script src="asset/js_gallerie/cycle2.js"></script>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
	<style type="text/css">
	*{
		margin:0;
		padding:0;
	}
	#container {
		width:100%;
		position:relative;s
		}
	#slideshow {
		height:100%;
		width:100%;
		}
	#slideshow img {
		height:100%;
		width:100%;
		position: absolute;
		z-index:10;
		min-width:100%;
		min-height:100%;
		}
	#pager {
		height:120px; 
		width:100%;
		background:rgba(0,0,0,0.5);
		position:absolute;
		bottom:5%;
		z-index:1000;
		text-align:center;
		opacity:0;
		transition:all .2s ease-in-out 0s;
		}
	#pager:hover {
		opacity:1;
		}
	#pager img {
		margin: 10px 5px;
		opacity:0.3;
		transition:all .3s ease-in-out 0s;
		}
	#pager img:hover {
		opacity:1;
		transform:scale(1.05);
		z-index:100;
		}
	#prev_c {
		height:100%;
		width:200px;
		position:absolute;
		left:0;
		top:0;
		z-index:100;
		}
		#prev_c img {
			height:120px;
			width:120px;
			position:absolute;
			top:0;
			bottom:0;
			left:0;
			margin:auto 0px;
			}
		
	#next_c {
		height:100%;
		width:200px;
		position:absolute;
		right:0;
		top:0;
		z-index:100;
		}
		#next_c img {
			height:120px;
			width:120px;
			position:absolute;
			top:0;
			bottom:0;
			right:0;
			margin:auto 0px;
			}
		#next #prev { visibility:hidden;}
		#next,#prev:hover {
			cursor:pointer;
			}
		#next_c,#prev_c:hover #next,#prev { visibility:visible;}
		
	</style>

<!-- caroussel -->  

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
                    <li><a href="#Présentation">Présentation</a></li>
                    <li><a href="#equipe">Nos équipe</a></li>
                    <li><a href="#specialite">Nos spécialités</a></li>
                    <li><a href="#contact">Contact</a></li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Section: Accueil -->

    <!-- /Section: Accueil -->

    <!-- Section: Présentation -->

    <!-- /Section: Présentation -->


    <!-- Section: equipe -->

    <!-- /Section: equipe -->


    <!-- Section: specialite -->

    <!-- /Section: specialite -->

    <!-- Section: contact -->

    <!-- /Section: contact -->
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
                    <p>&copy;Projet réalisé par <strong>Ghassen MALLOULI</strong></p>
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