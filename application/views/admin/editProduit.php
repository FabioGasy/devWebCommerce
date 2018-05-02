<h3>Modifier les produits</h3>
<a href="<?php echo base_url('admin/produit'); ?>" onClick="return confirm('voulez-vous vraiment quitter la modification??');" class="btn btn-default">Retour</a>

 
<form action="<?php echo base_url('/admin/updateProduit') ;?>" method="POST" class="form-horizontal" enctype="multipart/form-data">

	<div class="form-group">
	<input type="hidden" value="<?php echo $produit->id; ?>" name="hidden" class="form-control">
		<label for="titre" class="col-md-2 text-right">Nom du produit</label>
		<div class="col-md-10">
			<input type="text" name="nom" class="form-control" value="<?php echo $produit->titre ;?>" required>
			
		</div>
	</div>

	<div class="form-group">
		<label for="description" class="col-md-2 text-right">Description du produit</label>
		<div class="col-md-10">
			<textarea name="descri" class="form-control"><?php echo $produit->description ;?></textarea>
		</div>
	</div>

	<div class="form-group">
		<label for="prix" class="col-md-2 text-right">Prix du produit</label>
		<div class="col-md-10">
		<input type="text" name="prix" value="<?php echo $produit->prix ;?>" class="form-control" required>
		</div>
	</div>

	<div class="form-group">
		<label for="stock" class="col-md-2 text-right">Stock</label>
		<div class="col-md-10">
		<input type="text" name="stock" value="<?php echo $produit->stock ;?>" class="form-control" required>
		</div>
	</div>

	<div class="form-group">
		<label for="categorie" class="col-md-2 text-right">Categorie</label>
		<div class="col-md-10">
		<select name="categorie" class="form-control">
		<?php
		$query = $this->db->get('categorie');
		foreach ($query->result() as $row){		
			?>
	<option><?= $row->name; ?></option>
	
	<?php
}
		
				?>
			
	

		</select>
		</div>
	</div>


	<div class="form-group">
		<label class="col-md-2 text-right"></label>
		<div class="col-md-10">
			<input type="submit" name="update" class="btn btn-primary" value="Enregistrer">
		</div>
	</div>

</form>