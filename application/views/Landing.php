<?php
/*
 * Copyright (C) 2015 Varun Garg <varun.10@live.com> - All Rights Reserved
 */
$burl = base_url();
$burl_no_port = parse_url($burl, PHP_URL_HOST) . parse_url($burl, PHP_URL_PATH);
if (dirname($burl_no_port) != '.')
    $burl_no_port = dirname($burl_no_port) . '/';
$burl_with_port = parse_url($burl, PHP_URL_HOST) . ':2000/';
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="<?php echo base_url('application/views/common/favicon.ico') ?>">


        <title>Seating Plan | GBU</title>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="<?php echo base_url() . 'application/views/common/' . 'css/bootstrap.min.css' ?>" type="text/css">

        <!-- Custom Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo base_url() . 'application/views/common/' . 'css/font-awesome.min.css' ?>">

        <!-- Plugin CSS -->
        <link rel="stylesheet" href="<?php echo base_url() . 'application/views/common/' . 'css/animate.min.css' ?>" type="text/css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url() . 'application/views/common/' . 'css/creative.css' ?>" type="text/css">

        <style>
            header
            {
                background-image: url(<?php echo base_url() . 'application/views/common/' . '/img/header.jpg'; ?>);
            }

        </style>
    </head>

    <body id="page-top">

        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top">Gautam Buddha University</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="page-scroll" href="<?= base_url('Exams/List_schedules') ?>">Exam Schedules</a>
                        </li>
                          <li>
                            <a class="page-scroll" href ="<?=base_url('/login') ?>">Examination Login</a>
                        </li>

                        <li>
                            <a class="page-scroll" href="#about">About</a>
                        </li>
                        
                      
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <header>
            <div class="header-content">
                <div class="header-content-inner">
                    <h1>Access Examination Schedule from anywhere </h1>
                </div>
            </div>
        </header>
<!--
        <section class="bg-primary" id="schedules">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 text-center">
                        <h2 class="section-heading">Exam Schedules</h2>
                        <hr class="light">
                        <p class="text-faded">See Your Examination Schedules Here </p>
                        <a href="<?= base_url('Exams/List_schedules') ?>" class="btn btn-default btn-xl">Schedule List</a><br /><br />
                        
                    </div>
                </div>
            </div>
        </section>
-->


        <aside class="bg-dark" id="about">
            <div class="text-center">
                <div class="call-to-action">
                    <p>Proudly <i class="fa fa-code"></i></i> by <a href="http://www.github.com/Varun-Garg">Varun Garg,</a> <a href="http://www.github.com/Varun-Garg">Rishabh Ahuja</a>.</p>                </div>
            </div>
        </aside>

        <!-- jQuery -->
        <script type="text/javascript" src="<?php echo base_url() . 'application/views/common/' . 'js/jquery-2.1.3.min.js' ?>"></script>

        <!-- Bootstrap Core JavaScript -->
        <script type="text/javascript" src="<?php echo base_url() . 'application/views/common/' . 'js/bootstrap.min.js' ?>"></script>

        <!-- Plugin JavaScript -->
        <script type="text/javascript" src="<?php echo base_url() . 'application/views/common/' . 'js/jquery.easing.min.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'application/views/common/' . 'js/jquery.fittext.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'application/views/common/' . 'js/wow.min.js' ?>"></script>


        <!-- Custom Theme JavaScript -->
        <script type="text/javascript" src="<?php echo base_url() . 'application/views/common/' . 'js/creative.js' ?>"></script>


    </body>

</html>
