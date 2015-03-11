<!-- Content Header (Page header) -->
<script type="text/javascript">
		function fcari(){
         	var x=cari.i_nominal1.value;
            var x1=parseInt(x);
			var y=cari.i_nominal2.value;
            var y1=parseInt(y);
			if(cari.i_nominal2.value != ''){
			  	if(cari.i_nominal1.value > cari.i_nominal2.value ){
							alert("Jumlah nominal Bantuan Lebih Dari (>)  Tidak boleh lebih bernilai lebih besar dari Jumlah nominal Bantuan Kurang Dari (<)  ");
							cari.i_nominal1	.focus();
							return false;
				}
			}
			  return true; 
		}
</script>

                
             
		
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                      
                        <!-- right column -->
                        <div class="col-md-12">
                                                               	   

                            <!-- general form elements disabled -->

                          <div class="title_page"> <?= $title2 ?></div>

                          

                             <form name="cari" role="form" action="<?= $action?>" method="post" onSubmit="return fcari()">

                            <div class="box box-primary">
                                
                               
                                <div class="box-body">
                                        <div class="col-md-12">
                                        
											<div class="form-group">
												<label>Cari Cepat</label>
											    <input  type="text" name="i_cari" class="form-control"  value="<?= $i_cari ?>"/>
                                        
											  </div>
                                              
										  </div>    
                                       
                                     <div class="col-md-6">
                                        
											<div class="form-group">
                                              
												<label>Jumlah nominal Bantuan Lebih Dari (&gt;)   </label>
                                                 <div class="input-group">
                                         		<span class="input-group-addon">Rp</span>
											<input  type="number" name="i_nominal1" id="i_nominal1" class="form-control" value="<?= $i_nominal1 ?>"/>
                                        	 		<span class="input-group-addon">.00</span> 
                                                 </div>
											  </div>
                                              
										  </div>     
                                          
                                           <div class="col-md-6">
                                          
											 <div class="form-group">
												<label>Jumlah nominal Bantuan Kurang Dari (&lt;) </label>
                                                <div class="input-group">
                                         		<span class="input-group-addon">Rp</span>
												<input  type="number" name="i_nominal2" id="i_nominal2" class="form-control"  value="<?= $i_nominal2?>" />
                           	<span class="input-group-addon">.00</span> 
                                                 </div>
											  </div>
                                              </div>
                                              
                                              <div style="clear:both;"></div>

                                       
                                      
                                   
                                </div><!-- /.box-body -->
                             
                    
                    <div class="box-footer">
                                <input class="btn btn-success" type="submit" value="Preview"/>
                           		<a href='<?=$close_button?>' class='btn btn-success'>Close</a>
                                </div>
                            
                            </div><!-- /.box -->
                             
                            
                       </form>
                      
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
              