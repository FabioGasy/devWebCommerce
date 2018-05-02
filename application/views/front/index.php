<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="<?php echo base_url('assets/img/banner01.jpg'); ?>" alt="Image">
        <div class="carousel-caption">
        </div>      
      </div>

      <div class="item">
        <img src="<?php echo base_url('assets/img/banner03.jpg') ?>" alt="Image">
        <div class="carousel-caption">
          <h3>More Sell $</h3>
          <p>Lorem ipsum...</p>
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
  
<div class="container text-center">    
  <h3>Listes des categories</h3><br>
 
  <div class="row">
  <?php
  $cat=$this->db->query('SELECT * FROM categorie LIMIT 0,3');
  $resultat=$cat->result();
  if($resultat){
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
  }else{
    ?>
    <div class="col-sm-16">
    <div class="alert alert-danger">
      Y a pas de categories disponible pour le moment!!
  </div>
    </div><br><br><br>
    <?php
  }
    ?>

      <h3>Nos derniers produits</h3>
      <?php 
      $req=$this->db->query('select * from produit order by id limit 0,3');
      $res=$req->result();
      if($res){
        foreach($res as $result){
        ?>
        <div class="col-sm-4">
         <img src="<?php echo base_url() ?>" class="img-responsive" alt="" style="width:50%">
        <p><?=$result->titre ;?></p>
        <p><?=$result->description ;?></p>
        <p><?=$result->prix ;?></p>
        </div>
        <?php
        }
        }else{
          ?>
       <div class="col-sm-16">
    <div class="alert alert-danger">
      Y a pas de produits disponible pour le moment!!
  </div>
    </div>
         <?php 
        }
      ?>
     </div>
    </div>
  </div>
</div><br>