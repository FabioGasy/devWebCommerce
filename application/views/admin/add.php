<h3>Ajouter des produits</h3>
<a href="<?php echo base_url('admin/produit'); ?>" class="btn btn-default">Retour</a>

 
<form action="<?php echo base_url('/admin/submit') ;?>" method="POST" class="form-horizontal" enctype="multipart/form-data">

	<div class="form-group">
		<label for="titre" class="col-md-2 text-right">Nom du produit</label>
		<div class="col-md-10">
			<input type="text" name="nom" class="form-control" required>
			
		</div>
	</div>

	<div class="form-group">
		<label for="description" class="col-md-2 text-right">Description du produit</label>
		<div class="col-md-10">
			<textarea name="descri" class="form-control"></textarea>
		</div>
	</div>

	<div class="form-group">
		<label for="prix" class="col-md-2 text-right">Prix du produit</label>
		<div class="col-md-10">
		<input type="text" name="prix" class="form-control" required>
		</div>
	</div>

	<div class="form-group">
		<label for="stock" class="col-md-2 text-right">Stock</label>
		<div class="col-md-10">
		<input type="text" name="stock" class="form-control" required>
		</div>
	</div>

	<div class="form-group">
		<label for="categorie" class="col-md-2 text-right">Categorie</label>
		<div class="col-md-10">
		<select name="categorie" class="form-control">
		<?php
		if($categorie){
			foreach($categorie as $categorie){
				?>
			<option><?= $categorie->name ?></option>
				<?php
			}
		}
		?>

		</select>
		</div>
	</div>

		<div class="form-group">
		<label for="image" class="col-md-2 text-right">Image</label>
		<div class="col-md-10">
		<input type="file" name="imagePro" required>
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-2 text-right"></label>
		<div class="col-md-10">
			<input type="submit" name="submit" class="btn btn-primary" value="Enregistrer">
		</div>
	</div>

</form>