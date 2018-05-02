<a href="<?= base_url('home/boutique/')?>"><button class="btn btn-default ">Explorer la boutique</button></a><br><br>

<table class="table table-bordered table-responsive">
<tr>    
        <th>Option</th>
        <th>Quantité</th>
        <th>Nom du produit</th>
        <th style="text-align:right">Prix du produit</th>
        <th style="text-align:right">Sub-Total</th>
</tr>

<?php 
$i = 1; 
$content =$this->cart->contents();
?>

<?php
if ($content){
 foreach ($content as $items): 
        ?>

        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

        <tr>    
                <td align="center"><a href="<?= base_url('shopping/delete/'.$items['rowid'])?>"><button class="btn btn-danger">Supprimer</button></a></td>
                <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
                <td>
                        <?php echo $items['name']; ?>

                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                <p>
                                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                                <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                        <?php endforeach; ?>
                                </p>

                        <?php endif; ?>

                </td>
                <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                <td style="text-align:right">Ariary<?php echo $this->cart->format_number($items['subtotal']); ?></td>
        </tr>

<?php $i++; ?>

<?php endforeach; ?>

<tr>
        <td colspan="3"> </td>
        <td class="right"><strong>Total</strong></td>
        <td class="right">Ariary<?php echo $this->cart->format_number($this->cart->total()); ?></td>
</tr>
 <?php }else{
       ?>  
    <tr>
    <td colspan="5" class="alert alert-danger"> Panier vide!!</td>
    </tr>  
          <?php   }?>

</table>
<a href="<?php echo base_url('shopping/rafraichirPanier')?>"><?php echo form_submit('', 'Rafraichir le panier',['class'=>'btn btn-primary']); ?></a>

