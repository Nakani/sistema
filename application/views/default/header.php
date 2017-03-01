<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- meta section -->
        <title>Sistema - Criado por Diogo Guedes</title>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
        <meta http-equiv="X-UA-Compatible" content="IE=edge" >
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" >
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" >
        <!-- ./meta section -->
        
        <!-- css styles -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets');?>/css/blue-white.css" id="dev-css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets');?>/css/main.css" id="dev-css">

        <link href='<?php echo base_url('assets');?>/css/fullcalendar.min.css' rel='stylesheet' />
        <link href='<?php echo base_url('assets');?>/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />

        <!-- ./css styles -->                                     
        
        <!--[if lte IE 9]>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets');?>/css/dev-other/dev-ie-fix.css">
        <![endif]-->
        
        <!-- javascripts -->
        <script type="text/javascript" src="<?php echo base_url('assets');?>/js/plugins/modernizr/modernizr.js"></script>
        <!-- ./javascripts -->
        
        <style>
            .dev-page{visibility: hidden;}            
        </style>
<script type="text/javascript">
var base_url='<?php echo base_url();?>'; 
</script>
    </head>
    <body>
        <!-- set loading layer -->
        <div class="dev-page-loading preloader"></div>
        <!-- ./set loading layer -->       
        
        <!-- page wrapper -->
        <div class="dev-page">
            
            <!-- page header -->    
            <div class="dev-page-header">
                
                <div class="dph-logo">
                    <a href="<?php echo base_url('dashboard')?>">Sistema</a>
                    <a class="dev-page-sidebar-collapse">
                        <div class="dev-page-sidebar-collapse-icon">
                            <span class="line-one"></span>
                            <span class="line-two"></span>
                            <span class="line-three"></span>
                        </div>
                    </a>
                </div>
                
            </div>
            <!-- ./page header -->
            
            <!-- page container -->
            <div class="dev-page-container">
                <?php include_once "menu.php" ?>

                <div class="dev-page-content">                    
                    <!-- page content container -->
                    <div class="container">
                        