<h3>Modifier les categories</h3>
<a href="<?php echo base_url('admin/categorie'); ?>" onClick="return confirm('voulez-vous vraiment quitter la modification??');" class="btn btn-default">Retour</a>

 
<form action="<?php echo base_url('/admin/updateCategorie') ;?>" method="POST" class="form-horizontal" enctype="multipart/form-data">

	<div class="form-group">
	<input type="hidden" value="<?php echo $categorie->id; ?>" name="hidden" class="form-control">
		<label for="titre" class="col-md-2 text-right">Nom du categorie à modifier</label>
		<div class="col-md-10">
			<input type="text" name="nom" class="form-control" value="<?php echo $categorie->name ;?>" required>
			
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-2 text-right"></label>
		<div class="col-md-10">
			<input type="submit" name="update" class="btn btn-primary" value="Enregistrer">
		</div>
	</div>

</form>