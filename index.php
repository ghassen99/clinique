<?php
    if (!isset($_SESSION))
    session_start();

    include "include/connexion.php" ; 
    include "models/fonctions.classe.php" ; 
    include "include/verif.php" ; 
/*
    define('PHP_FIREWALL_REQUEST_URI', strip_tags( $_SERVER['REQUEST_URI'] ) );
    define('PHP_FIREWALL_ACTIVATION', true );
    if ( is_file( @dirname(__FILE__).'/php-firewall/firewall.php' ) )
    include_once( @dirname(__FILE__).'/php-firewall/firewall.php' );
*/
    $controller="index";
    $action="index";
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
<script>
    function fn(y) {        
        if (window.XMLHttpRequest) 
        {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else 
        {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() 
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
            {
                document.getElementById("txtHintv").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","index.php?controller=gallerie&action=delete&id="+y);
        xmlhttp.send();
      
    }
   </script>
    </head>
    
    <body class="nav-md">
        <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
            <div class="left_col scroll-view">


                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">

                <div class="profile_info">
                    <h2>
                        <span style="font-size: 25px;color:#FFFFFF"><b>Bienvenue</b></span>
                        <span style="font-size: 15px;"><b>
                            <?php
                                if (!isset($_SESSION))
                                    session_start();
                                echo $_SESSION['nom_emp'].' '.$_SESSION['pren_emp'];
                            ?>
                            </b>
                        </span>
                    </h2>
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
                
                        <li><a href="Dashboard"><i class="fa fa-home"></i> Dashboard</a></li>                      
                        <?php 
                            if ($_SESSION['fonction'] == 'administrateur'){
                        ?>
                        <li><a href="Gallerie"><i class="fa fa-stethoscope"></i> Gallerie</a></li>

                        <li><a href="Departement"><i class="fa fa-university"></i> Département</a></li>

                        <li><a href="Salle"><i class="fa  fa-bank"></i> Salle</a></li>

                        <li><a href="Employeur"><i class="fa fa-user"></i> Employeur</a></li>
                        
                        <li><a href="Specialite"><i class="fa fa-user-md"></i> Specialite</a></li>

                        <li><a href="Fonction"><i class="fa fa-briefcase"></i> Fonction</a></li>
                        
                        <li><a href="Maladie"><i class="fa fa-stethoscope"></i> Maladie</a></li>
                                                
                        <?php 
                          }
                        ?>
                        <li><a href="Patient"><i class="fa fa-wheelchair"></i>    Patient</a></li>
                        
                        <li><a href="Randez-vous"><i class="fa fa-calendar"></i> Randez-vous</a></li>
                        
                    
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
                        <?php
                            if (!isset($_SESSION))
                                session_start();
                                echo $_SESSION['nom_emp'].' '.$_SESSION['pren_emp'];
                        ?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="log_out"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
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
                Projet réalisé par <strong>Ghassen MALLOULI</strong>
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

    <!-- Filtre -->
    <script>
    $(document).ready(function(){
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    });
    </script>

    <script>
    $(document).ready(function(){
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".dropdown-menu li").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    });
    </script>

    <!-- choisir un fichier -->
    <script>
        function bs_input_file() {
            $(".input-file").before(
                function() {
                    if ( ! $(this).prev().hasClass('input-ghost') ) {
                        var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
                        element.attr("name",$(this).attr("name"));
                        element.change(function(){
                            element.next(element).find('input').val((element.val()).split('\\').pop());
                        });
                        $(this).find("button.btn-choose").click(function(){
                            element.click();
                        });
                        $(this).find("button.btn-reset").click(function(){
                            element.val(null);
                            $(this).parents(".input-file").find('input').val('');
                        });
                        $(this).find('input').css("cursor","pointer");
                        $(this).find('input').mousedown(function() {
                            $(this).parents('.input-file').prev().click();
                            return false;
                        });
                        return element;
                    }
                }
            );
        }
        $(function() {
            bs_input_file();
        });
    </script>
    </body>


    </html>
        
    