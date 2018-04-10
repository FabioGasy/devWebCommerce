<html>
<head>
	<title><?= $title; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-theme.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>">
</head>
<body>

<div class="navbar navbar-default">
	<div class="container">

		<h2><a href="<?= base_url('admin/home'); ?>"><span class="fa fa-home"></a></span>&nbsp;Dashboard e-commerce</h2>
		<h2>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo 'Bienvenue '.$this->session->userdata('username'); ?>

		<a href="<?= base_url('admin/logout'); ?>"> <button type="submit" name="deco" class="btn btn-danger">Deconnecter</button></a>

	</div>
	

</div>
<div class="container">