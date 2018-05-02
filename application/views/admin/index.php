<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <a href="<?= base_url('admin/produit'); ?>" >  
        <div class="info-box blue-bg">
        <i> <img src="<?php echo base_url('assets/img/produit.png') ?>"></i>
            <div class="count"><?php echo $count = $this->db->count_all('produit'); ?></div>
            <div class="title"><?php echo" Produit"; ?></div>           
          </div><!--/.info-box-->  </a>   
        </div><!--/.col-->
        
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <a href="<?= base_url('admin/categorie'); ?>" >
          <div class="info-box orange-bg">
          <i> <img src="<?php echo base_url('assets/img/pencil.png') ?>"></i>
            <div class="count"><?php echo $count = $this->db->count_all('categorie'); ?></div>
            <div class="title"><?php echo "Categorie"; ?></div>            
          </div><!--/.info-box-->     
          </a>
        </div><!--/.col-->  
        
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <a href="">
          <div class="info-box red-bg">
          <i> <img src="<?php echo base_url('assets/img/panier.png') ?>"></i>
            <div class="count"><?php echo "10"; ?></div>
            <div class="title"><?php echo "Panier"; ?></div>            
          </div><!--/.info-box--> 
          </a>    
        </div><!--/.col-->
        
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <a href="<?= base_url('admin/options'); ?>">
          <div class="info-box green-bg">
          <i> <img src="<?php echo base_url('assets/img/settings.png') ?>"></i>
          <div class="count">3</div>
            <div class="title"><?php echo "Options"; ?></div>            
          </div><!--/.info-box-->  
          </a>   
        </div><!--/.col-->

</div>