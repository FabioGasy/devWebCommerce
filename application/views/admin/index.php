<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <a href="<?= base_url('admin/produit'); ?>" >  
        <div class="info-box blue-bg">
            <i class="fa fa-graduation-cap"></i>
            <div class="count"><?php echo $count = $this->db->count_all('produit'); ?></div>
            <div class="title"><?php echo" Produit"; ?></div>           
          </div><!--/.info-box-->  </a>   
        </div><!--/.col-->
        
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <a href="<?= base_url('admin/categorie'); ?>" >
          <div class="info-box orange-bg">
            <i class="fa fa-institution"></i>
            <div class="count"><?php echo $count = $this->db->count_all('categorie');; ?></div>
            <div class="title"><?php echo "Categorie"; ?></div>            
          </div><!--/.info-box-->     
          </a>
        </div><!--/.col-->  
        
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="info-box red-bg">
            <i class="fa fa-group"></i>
            <div class="count"><?php echo "10"; ?></div>
            <div class="title"><?php echo "Options"; ?></div>            
          </div><!--/.info-box-->     
        </div><!--/.col-->
        
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="info-box green-bg">
            <i class="fa fa-file-text-o"></i>
            <div class="count"><?php echo "5"; ?></div>
            <div class="title"><?php echo "Panier"; ?></div>            
          </div><!--/.info-box-->     
        </div><!--/.col-->

</div>