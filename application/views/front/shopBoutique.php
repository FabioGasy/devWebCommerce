<h3>Nos derniers articles pour les <?=$name ;?></h3><br>
      <?php 
      $req=$this->db->query("select * from produit where categorie='$name'");
      $res=$req->result();
      if($res){
        foreach($res as $result){
        ?>
        <div class="col-sm-4">
         <img src="<?php echo base_url() ?>" class="img-responsive" <?=$result->description ;?> style="width:50%">
        <p><?=$result->titre ;?></p>
        <p><?=$result->description ;?></p>
        <p><?=$result->stock ;?></p>
        <p><?=$result->prix ;?> Ariary</p>
        <?php
        if($result->stock!=0){
            ?>
        <a href="<?php echo base_url('shopping/ajouterPanier/'.$result->id) ?>"><p>Ajouter au panier</p></a>
        <?php
        }else{
            ?>
    <div class="alert alert-danger">
       Stock épuisé!!
        </div>
  <?php
        }
        ?>
        </div>
        <?php
        }
        }else{
          ?>
       <div class="col-sm-16">
    <div class="alert alert-danger">
      Y a pas de produits disponible pour la categorie <?=$name ;?> !!
  </div>
    </div>
         <?php 
        }
      ?>