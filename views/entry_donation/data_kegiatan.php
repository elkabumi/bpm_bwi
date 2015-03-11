<?php			  
	include'../../lib/config.php';
	include'../../lib/function.php';
	$keg_id 	 = $_GET['keg_id'];	
?>
<?php 
if($keg_id == '999'){ ?>


	<div class="form-group">
     <label>Deskripsi Kegiatan</label>
         <input required type="text" name="i_desc_actv" class="form-control" placeholder="Deskripsi Kegiatan ..." value="<?=$code_desa ?>"/>
    </div>                                   
<?php }else{ ?>
          <input required type="hidden" name="i_desc_actv" class="form-control" placeholder="Deskripsi Kegiatan ..." value="<?=$code_desa ?>"/>
                                  
<?php } ?>   