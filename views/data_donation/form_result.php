<div class="row">
<?php
$title = array(
		$nama_category,
		"Jumlah Data",
		"Total Investasi",
		"Total Tenaga Kerja"
		);
$content = array($tanggal, $jumlah_data, $jumlah_investasi, $jumlah_tenaga_kerja);
for($i=0; $i<=3; $i++){
?>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div  style="background-color:#FFF;">
                                     <div class="box box-primary" style="padding:10px;">
                               		<?php if($i==2){ ?><i><strong>Rp</strong></i><?php } ?>
                                    <span style="font-size:24px; font-weight:bold;">
                                        <?= $content[$i]?>
                                    </span>
                                    <p>
                                       <?= $title[$i]?>
                                    </p>
                             
                               </div>
                               
                            </div>
                        </div><!-- ./col -->
                        
                        
                      <?php
}
					  ?>
                       
                    </div><!-- /.row -->
                    
                    