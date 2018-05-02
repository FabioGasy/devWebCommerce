<h3>Ajouter nouveau categorie</h3>
<a href="<?php echo base_url('admin/categorie'); ?>" onClick="return confirm('voulez-vous vraiment quitter??');" class="btn btn-default">Retour</a>

 
<form action="<?php echo base_url('/admin/submitCategorie') ;?>" method="POST" class="form-horizontal" enctype="multipart/form-data">

	<div class="form-group">
		<label for="titre" class="col-md-2 text-right">Nom du nouveau categorie</label>
		<div class="col-md-10">
			<input type="text" name="nom" class="form-control" required>
			
		</div>
	</div>

	<div class="form-group">
		<label for="image categorie" class="col-md-2 text-right">Image</label>
		<div class="col-md-10">
		<input type="file" name="imageCat" required>
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-2 text-right"></label>
		<div class="col-md-10">
			<input type="submit" name="submit" class="btn btn-primary" value="Enregistrer">
		</div>
	</div>

</form>