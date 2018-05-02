
  
<div class="container text-center">    
  <h3>Listes de toutes les categories</h3><br>
 
  <div class="row">
  <?php
  $cat=$this->db->query('SELECT * FROM categorie');
  $resultat=$cat->result();
  foreach($resultat as $resultat){
  ?>
    <div class="col-sm-4">
    <a href="<?= base_url('home/Boutiqueshop/'.$resultat->name); ?>">
      <img src="<?php echo base_url('assets/img/banner03.jpg') ?>" class="img-responsive" style="width:100%" alt="<?=$resultat->name ;?>">
      <p><?=$resultat->name ;?></p>
      </a>
    </div>
    <?php
    }
    ?> 
    </div>
  </div>
</div><br>