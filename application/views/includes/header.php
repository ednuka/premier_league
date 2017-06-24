
﻿<!DOCTYPE html>
<html lang="en">

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

    <title>İlan Yayınlama Servisi</title>
    <?php $base = $this->config->item('base_url'); ?>
    <!-- Bootstrap Core CSS -->
    <style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
<style>
    
/* Popup container - can be anything you want */
.popup {
    position: relative;
    display: inline-block;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* The actual popup */
.popup .popuptext {
    visibility: hidden;
    width: 160px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 8px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -80px;
}

/* Popup arrow */
.popup .popuptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

/* Toggle this class - hide and show the popup */
.popup .show {
    visibility: visible;
    -webkit-animation: fadeIn 1s;
    animation: fadeIn 1s;
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
    from {opacity: 0;} 
    to {opacity: 1;}
}

@keyframes fadeIn {
    from {opacity: 0;}
    to {opacity:1 ;}
}
</style>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="<?php echo $base.'assets/js/tinymce/tinymce.js'?>"></script>
    <link href="<?php echo $base . 'assets/panel/vendor/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet">
        <link href="<?php echo $base . 'assets/css/mystyle.css' ?>" rel="stylesheet">
            <link href="<?php echo $base . 'assets/css/loginstyle.css' ?>" rel="stylesheet">
                <!-- MetisMenu CSS -->
                <link href="<?php echo $base . 'assets/panel/vendor/metisMenu/metisMenu.min.css' ?>" rel="stylesheet">

                    <!-- Custom CSS -->
                    <link href="<?php echo $base . 'assets/panel/dist/css/sb-admin-2.css' ?>" rel="stylesheet">

                        <!-- Morris Charts CSS -->
                        <link href="<?php echo $base . 'assets/panel/vendor/morrisjs/morris.css' ?>" rel="stylesheet">

                            <!-- Custom Fonts -->
                            <link href="<?php echo $base . 'assets/panel/vendor/font-awesome/css/font-awesome.min.css' ?>" rel="stylesheet" type="text/css">

                                <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
                                <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
                                <!--[if lt IE 9]>
                                    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                                    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
                                <![endif]-->
                                <script src="<?php echo $base . 'assets/js/bootstrap.min.js' ?>"></script>
                                <script src="<?php echo $base; ?>assets/js/jquery.js"></script>
                                <script src="<?php echo $base; ?>assets/js/jquery-ui.js"></script>

                                
                                </head>

                                <body >




                                <div id="wrapper" >

                                    <!-- Navigation -->
                                    <nav class="navbar navbar-default navbar-static-top " role="navigation" style="margin-bottom: 0">
                                        <div class="navbar-header">
                                            
                                            
                                             <?php echo "<a class='navbar-brand' href='index.html'>Premier League</a>";
                                           
                                            ?>
                                        </div>
                                        <!-- /.navbar-header -->

                                        <ul class="nav navbar-top-links navbar-right menu">
                                         
                                           
                                            <!-- /.dropdown -->
                                            <li class="dropdown">
                                                
                                                <ul class="dropdown-menu dropdown-user">
                                                  
                                                    <li>
                                                        <?php echo anchor('loginsignup/logout', '<i class="fa fa-sign-out fa-fw"></i> Logout'); ?>
                                                    </li>
                                                </ul>
                                                <!-- /.dropdown-user -->
                                            </li>
                                            <!-- /.dropdown -->
                                        </ul>
                                        <!-- /.navbar-top-links -->
                     <?php $this->load->view($menu);?>
                                        
                                        </div>
                                        <!-- /.navbar-static-side -->
                                    </nav>

