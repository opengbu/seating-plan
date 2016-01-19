<?php
/*
 *  Created on :Jul 10, 2015, 12:18:54 PM
 *  Author     :Varun Garg <varun.10@live.com>
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
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="<?php echo base_url('application/views/common/favicon.ico') ?>">

        <title>
            Seating Plan | GBU
        </title>
        <link rel="stylesheet" href="<?php echo base_url() . 'application/views/common/' . 'dist/css/bootstrap-select.css' ?>">
        <link rel="stylesheet" href="<?php echo base_url() . 'application/views/common/' . 'css/bootstrap.min.css' ?>">
        <link rel="stylesheet" href="<?php echo base_url() . 'application/views/common/' . 'css/font-awesome.min.css' ?>">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="<?php echo base_url() . 'application/views/common/' . 'css/varun.css' ?>">
        <link rel="stylesheet" href="<?php echo base_url() . 'application/views/common/' . 'css/animate.min.css' ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url() . 'application/views/common/' . 'css/creative.css' ?>" type="text/css">

        <script type="text/javascript" src="<?php echo base_url() . 'application/views/common/' . 'js/jquery-2.1.3.min.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'application/views/common/' . 'dist/js/bootstrap-select.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'application/views/common/' . 'js/bootstrap.min.js' ?>"></script>

        <style>
            .navbar-nav.navbar-right:last-child {
                margin-right: 0;
            }
            .navbar {
                border-color: rgba(34,34,34,.05);
                background-color: #9932CC;
            }
            .caret-up {
                width: 0; 
                height: 0; 
                border-left: 4px solid rgba(0, 0, 0, 0);
                border-right: 4px solid rgba(0, 0, 0, 0);
                border-bottom: 4px solid;

                display: inline-block;
                margin-left: 2px;
                vertical-align: middle;
            }

            #getFixed {
                width: 234px;
            }
            hr {
                max-width: 100%;
            }
            .content {
                min-height: calc(100vh - 195px);
                /* 80px header + 40px footer = 120px  */
            }
        </style>

    </head>
    <body style="background-image: url(<?php echo base_url('application/views/common/bg_2.png') ?>); background-attachment: fixed; background-repeat: repeat;">

        <nav id="mainNav" class="navbar navbar-fixed-top navbar-default nav navbar-custom" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <button type="button" class="navbar-toggle collapsed pull-left" style="margin-left: 0; " data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="<?= base_url() ?>">Seating Plan</a>

            </div> 
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">

                </ul>

                <ul class="nav navbar-nav navbar-right">

			<li>
		            <a class="page-scroll" href="<?= base_url('Exams/List_schedules') ?>">Exam Schedules</a>
		        </li>
                    <li>
                        <a class="page-scroll" href ="<?= base_url('/login') ?>">Examination Login</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="page-content-wrapper" >
            <div class="container content">
