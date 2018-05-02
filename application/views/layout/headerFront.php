<html>
<head>
	<title><?= $title; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-theme.css') ?>">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>">
	<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-1">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?= base_url('home') ?>"><img height="40px" width="80px" src="<?php echo base_url('assets/img/logo.png') ?>"></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?= base_url('home') ?>"><span class="fa fa-home"></span>&nbsp;&nbsp;Accueil</a></li>
      <li><a href="<?= base_url('home/boutique') ?>"><span class="fa fa-credit-card"></span>&nbsp;&nbsp;Boutique</a></li>
      <li><a href="<?= base_url('shopping/afficherPanier') ?>"><span class="fa fa-shopping-cart"></span>&nbsp;&nbsp;Panier</a></li>
      <li><a href="<?= base_url('home/condition') ?>"><span class="fa fa-file-text-o"></span>&nbsp;&nbsp;Conditions generales de ventes</a></li>
    </ul>
  </div>
</nav></br></br></br>