<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SIMKEU</title>

        <!-- CSS -->
        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css">
        <!-- jQuery custom content scroller -->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css">

        <!-- Custom Theme Style -->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/build/css/custom.min.css">
        
        <!-- JQ -->
        <!-- jQuery -->
        <script src="<?= base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    </head>

    <body class="nav-md">
        <!--<body class="nav-sm">-->
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="index.html" class="site_title"><i class="fa fa-line-chart"></i> <span>SIMKEU</span></a>
                        </div>
                        <div class="clearfix"></div>
                        <br />

                        <!-- sidebar menu -->
                        <?php $this->load->view('menu'); ?>
                        <!-- /sidebar menu -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav class="" role="navigation">
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;">
                                        <i>Selamat datang, </i><strong>ADMIN</strong>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    <?php $this->load->view($view); ?>
                </div>
                <!-- /page content -->

                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        Sistem Informasi Keuangan <a href="www.uij.ac.id">Universitas Islam Jember</a> &copy;2016
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>
        
        <!-- FastClick -->
        <script src="<?= base_url() ?>assets/vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="<?= base_url() ?>assets/vendors/nprogress/nprogress.js"></script>
        <!-- jQuery custom content scroller -->
        <script src="<?= base_url() ?>assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        
        <!-- Custom Theme Scripts -->
        <script src="<?= base_url() ?>assets/build/js/custom.min.js"></script>
    </body>
</html>