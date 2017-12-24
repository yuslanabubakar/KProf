<!DOCTYPE html>

<?php
  if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $idKaryawan = ($this->session->userdata['logged_in']['idKaryawan']);
    $nama = ($this->session->userdata['logged_in']['nama']);
  }
?>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Coffee Shop</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect. -->
        <!-- <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css"> -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">

        <!-- Datatable -->
        <link href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/bower_components/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/select.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url("assets/bower_components/bootstrap-datepicker/dist/css/datepicker.min.css"); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url("assets/bower_components/bootstrap-datepicker/dist/css/datepicker.css"); ?>" rel="stylesheet" />
        <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <!-- <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
    </head>
    <!--
    BODY TAG OPTIONS:
    =================
    Apply one or more of the following classes to get the
    desired effect
    |---------------------------------------------------------|
    | SKINS         | skin-blue                               |
    |               | skin-black                              |
    |               | skin-purple                             |
    |               | skin-yellow                             |
    |               | skin-red                                |
    |               | skin-green                              |
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |
    |               | sidebar-mini                            |
    |---------------------------------------------------------|
    -->
    <body class="hold-transition skin-green sidebar-mini">
        <div class="wrapper">

            <!-- Main Header -->
            <header class="main-header">

                <!-- Logo -->
                <a href="<?php echo base_url(); ?>petugas/Home" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>C</b>S</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>BMAN </b>Coffee Shop</span>
                </a>

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <img src="<?php echo base_url(); ?>assets/dist/img/avatar5.png" class="user-image" alt="User Image">
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs"><?php echo $nama; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- The user image in the menu -->
                                    <li class="user-header">
                                        <img src="<?php echo base_url(); ?>assets/dist/img/avatar5.png" class="img-circle" alt="User Image">

                                        <p>
                                            <?php echo $nama; ?> - Coffee Shop
                                            <small>Bandung Juara</small>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <a href="<?php echo base_url(); ?>petugas/login/logout" class="btn btn-danger btn-flat">Keluar</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">

                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">

                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url(); ?>assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $nama; ?></p>
                            <!-- Status -->
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MENU UTAMA</li>
                        <!-- Optionally, you can add icons to the links -->
                        <li><a href="<?php echo base_url(); ?>petugas/Home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-shopping-bag"></i> <span>Transaksi</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="active"><a href="<?php echo base_url(); ?>petugas/Penjualan"><i class="fa fa-circle-o"></i> Penjualan</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-list-alt"></i> <span>Menu</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>petugas/Menu/Add"><i class="fa fa-circle-o"></i> Buat Menu</a></li>
                                <li><a href="<?php echo base_url(); ?>petugas/Menu"><i class="fa fa-circle-o"></i> Daftar Menu</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-book"></i> <span>Laporan</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>petugas/Laporan"><i class="fa fa-circle-o"></i> Laporan Penjualan</a></li>
                                <li><a href="<?php echo base_url(); ?>petugas/LaporanPerhari"><i class="fa fa-circle-o"></i> Laporan Perhari</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            </aside>
