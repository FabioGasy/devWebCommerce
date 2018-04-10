<html>
<head>
	<title><?= $title; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-theme.css') ?>">
</head>
<body>
<div class="container">
  <h2>Connectez-vous</h2>
  <div class="jumbotron">
  <form class="form-horizontal" action="<?= base_url(); ?>admin/login_validation" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="username">Username:</label>
      <div class="col-sm-10">
        <input type="text" name="username" class="form-control" id="username" placeholder="Entré votre nom d'utilisateur">
        <?php echo form_error('username','<span class="text-danger">','</span>') ;?>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">           
        <input type="password" name="password" class="form-control" id="pwd" placeholder="Entrée votre mot de passe">
        <?php echo form_error('password','<span class="text-danger">','</span>') ;?>
        
            <label class="text-danger"> <?= $this->session->flashdata("error");?></label>
        
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="insert" class="btn btn-primary">Connecter</button>
      </div>
    </div>
  </form>
  </div>
</div>

</body>
</html>
