<?php
    if (!isset($_SESSION))
    session_start();

    include "include/connexion.php" ; 
    include "models/fonctions.classe.php" ; 
    include "include/verif.php" ; 

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
                    
                    <li><a href="index.php?controller=bloc&action=liste"><i class="fa fa-chevron-circle-right"></i> bloc</a></li>
                    
                    <li><a href="index.php?controller=employeur&action=liste"><i class="fa fa-chevron-circle-right"></i> employeur</a></li>
                    
                    <li><a href="index.php?controller=fonction&action=liste"><i class="fa fa-chevron-circle-right"></i> fonction</a></li>
                    
                    <li><a href="index.php?controller=maladie&action=liste"><i class="fa fa-chevron-circle-right"></i> maladie</a></li>
                    
                    <li><a href="index.php?controller=patient&action=liste"><i class="fa fa-chevron-circle-right"></i> patient</a></li>
                    
                    <li><a href="index.php?controller=rdv&action=liste"><i class="fa fa-chevron-circle-right"></i> rdv</a></li>
                    
                    <li><a href="index.php?controller=salle&action=liste"><i class="fa fa-chevron-circle-right"></i> salle</a></li>
                    
                    <li><a href="index.php?controller=specialite&action=liste"><i class="fa fa-chevron-circle-right"></i> specialite</a></li>
                    
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
        
    