<!DOCTYPE html>
<html lang="en">

<head>
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#buku').click(function(){
                $('#isi').load("buku.php");
            })
            $('#donasi').click(function(){
        				$('#isi').load("donasi.php");
        		});
            $('#anggota').click(function(){
                $('#isi').load("anggota.php");
            })
            $('#petugas').click(function(){
                $('#isi').load("petugas.php");
            })
            $('#transaksi').click(function(){
                $('#isi').load("transaksi.php");
            })
            $('#transaksi_pinjam').click(function(){
                $('#isi').load("transaksi_pinjam.php");
            })
            $('#transaksi_kembali').click(function(){
                $('#isi').load("transaksi_kembali.php");
            })
            $('#custom_select').click(function(){
                $('#isi').load("custom_select.php");
            })
            $('#join_tabel').click(function(){
                $('#isi').load("join_tabel.php");
            })
            $('#union').click(function(){
                $('#isi').load("union.php");
            })
            $('#having').click(function(){
                $('#isi').load("having.php");
            })
            $('#report').click(function(){
                $('#isi').load("report.php");
            })
            $('#fail').click(function(){
                $('#isi').load("hoams_fail.php");
            })
        })
    </script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <title>Sistem Informasi Perpustakaan</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">

    <!--[endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="index.php">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon--><img src="plugins/images/admin-logo.png" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="plugins/images/admin-logo-dark.png" alt="home" class="light-logo" />
                     </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text--><img src="plugins/images/admin-text.png" alt="home" class="dark-logo" /><!--This is light logo text--><img src="plugins/images/admin-text-dark.png" alt="home" class="light-logo" />
                     </span> </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                    </li>
                    <li>
                        <a class="profile-pic" href="#"> <img src="plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">Harli</b></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="index.html" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#" id="buku" class="waves-effect"><i class="fa fa-book fa-fw" aria-hidden="true"></i><span class="fa arrow"></span>Buku</a>
                        <ul class="nav nav-second-level">
                          <li>
                              <a href="#" id="donasi" class="waves-effect"><i class="fa fa-book fa-fw" aria-hidden="true"></i>Donasi</a>
                          </li>
												</ul>
                    </li>
                    <li>
                        <a href="#" id="anggota" class="waves-effect"><i class="fa fa-users fa-fw" aria-hidden="true"></i>Anggota</a>
                    </li>
                    <li>
                        <a href="#" id="petugas" class="waves-effect"><i class="fa fa-user-secret fa-fw" aria-hidden="true"></i>Petugas</a>
                    </li>
                    <li>
                        <a href="#" id="transaksi" class="waves-effect"><i class="fa fa-exchange fa-fw" aria-hidden="true"></i><span class="fa arrow"></span>Transaksi</a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#" id="transaksi_pinjam" class="waves-effect"><span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;&nbsp;Pinjam</a>
                            </li>
                            <li>
                                <a href="#" id="transaksi_kembali" class="waves-effect"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;&nbsp;Kembali</a>
                            </li>
												</ul>
                    </li>
                    <!--<li>
                        <a href="#" id="custom_select" class="waves-effect"><i class="fa fa-wrench fa-fw" aria-hidden="true"></i>Custom Select</a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#" id="join_tabel" class="waves-effect"><span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;&nbsp;Join Tabel</a>
                            </li>
                            <li>
                                <a href="#" id="union" class="waves-effect"><span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;&nbsp;Union</a>
                            </li>
                            <li>
                                <a href="#" id="having" class="waves-effect"><span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;&nbsp;Having</a>
                            </li>
                            <li>
                                <a href="#" id="fail" class="waves-effect"><span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;&nbsp;FAIL</a>
                            </li>
												</ul>
                    </li>
                    <li>
                        <a href="#" id="report" class="waves-effect"><i class="fa fa-wrench fa-fw" aria-hidden="true"></i>Report</a>
                    </li>-->

                </ul>

            </div>

        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">


                <div id="isi">
                  <!-- CONTENT -->
                </div>

            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->




    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Counter js -->
    <script src="plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!-- chartist chart -->
    <script src="plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <!--<script src="js/dashboard1.js"></script>-->
    <script src="plugins/bower_components/toast-master/js/jquery.toast.js"></script>
</body>

</html>
