

	<h3>Liste des produits à vendre</h3>
	<?php 
		if($this->session->flashdata('success_msg')){
?>
	<div class="alert alert-success">
		<?= $this->session->flashdata('success_msg');?>

	</div>
	<?php 		
		}
?>
	<?php 
		if($this->session->flashdata('error_msg')){
?>
	<div class="alert alert-danger">
		<?= $this->session->flashdata('error_msg');?>

	</div>
	<?php 		
		}
?>


	<a href="<?= base_url('admin/submit'); ?>" class="btn btn-primary">Ajouter</a>
	<a href="<?php echo base_url('admin/home'); ?>" class="btn btn-default">Retour</a>
	<table class="table table-bordered table-responsive">
			<thead>
				<tr>
					<td>Nom produit</td>
					<td>Description du produit</td>
					<td>Prix du produit</td>
					<td>Poids du produit</td>
					<td>Stock</td>
					<td>Categorie</td>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
			if($produit){
				foreach ($produit as $produit){

			
			?>
				<tr>
					<td><?= $produit->titre; ?></td>
					<td><?= $produit->description; ?></td>
					<td><?= $produit->prix; ?></td>
					<td><?= $produit->poids; ?></td>
					<td><?= $produit->stock; ?></td>
					<td><?= $produit->categorie; ?></td>
					<td>
						<a href="<?= base_url('admin/modifierProduit/'.$produit->id); ?>" class="btn btn-info">Modifier</a>
						<a href="<?= base_url('admin/effacerProduit/'.$produit->id); ?>" onClick="return confirm('voulez-vous vraiment effacer??');" class="btn btn-danger">Supprimer</a>
					</td>
				</tr>
			<?php
			}
			}else{
				?>
				<div class="col-sm-16">
				<div class="alert alert-danger">
				  Y a pas de produit disponible pour le moment!! Cliquez <a href="<?= base_url('admin/ajouterProduit'); ?>">ici</a> pour ajouter
			  </div>
				</div>
				<?php
			}
			?>
			</tbody>

	</table>
	

