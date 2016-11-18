<!DOCTYPE html>
	<html lang="pt-br">
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="">
			<meta name="author" content="">
			<title><?php echo $title; ?></title>
			
			<!-- Bootstrap core CSS -->			
			<link href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>"	rel="stylesheet">
			
                        			
			<!-- Custom styles for this template -->
			<!--link href="< ?php echo base_url ( 'bootstrap/css/theme.css' );?>" rel="stylesheet"-->
			
			<!-- Custom styles for app specific stuff -->
                        <link href="<?php echo base_url ( 'assets/css/estilo.css' );?>" rel="stylesheet">
                        <link href="<?php echo base_url ( 'assets/css/navestilo.css' );?>" rel="stylesheet">
                        <link href="<?php echo base_url ( 'assets/css/cardestilo.css' );?>" rel="stylesheet" type="text/css">
			<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
                        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
        
                        
			<script src="<?php echo base_url('assets/js/jquery/jquery.js');?>"></script>
                        <script src="<?php echo base_url('assets/js/navscript.js');?>"></script>
                        <script src="<?php echo base_url('assets/js/cardscript.js');?>"></script>
			<script src="<?php echo base_url('bootstrap/js/bootstrap.min.js');?>"></script>	
			<script src="<?php echo base_url('assets/js/jquery/jquery.tablesorter.min.js');?>"></script>
                        
		</head>
		

                
		<body role="document">
		<div class="container conteudo">
                    <?php require_once(APPPATH.'views/nav/navbar.php'); ?>
		<!-- END header.php -->