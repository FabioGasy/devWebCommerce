

	<h3>Liste de toutes les categories</h3>
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


	<a href="<?= base_url('admin/ajoutCategorie'); ?>" class="btn btn-primary">Ajouter</a>
	<a href="<?php echo base_url('admin/home'); ?>" class="btn btn-default">Retour</a>
	<table class="table table-bordered table-responsive">
			<thead>
				<tr>
					<td>Nom Categorie</td>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
			if($categorie){
				foreach ($categorie as $categorie){

			
			?>
				<tr>
					<td><?= $categorie->name; ?></td>
					<td>
						<a href="<?= base_url('admin/modifierCategorie/'.$categorie->id); ?>" class="btn btn-info">Modifier</a>
						<a href="<?= base_url('admin/effacerCategorie/'.$categorie->id); ?>" onClick="return confirm('voulez-vous vraiment effacer??');" class="btn btn-danger">Supprimer</a>
					</td>
				</tr>
			<?php
			}
			}else{
				?>
				<div class="col-sm-16">
				<div class="alert alert-danger">
				  Y a pas de categorie disponible pour le moment!! Cliquez <a href="<?= base_url('admin/ajoutCategorie'); ?>">ici</a> pour ajouter
			  </div>
				</div>
				<?php
			}
			?>
			</tbody>

	</table>
	

