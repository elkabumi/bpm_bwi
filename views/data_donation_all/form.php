
                
             
		
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                      
                        <!-- right column -->
                        <div class="col-md-12">
                                                               	   

                          

                             <form name="cari" role="form" action="<?= $action?>" method="post" onSubmit="return fcari()">

                            <div class="box box-primary">
                                
                               
                                <div class="box-body">
                                       
                                           
                                       
                                     <div class="col-md-6">
                                        
											<div class="form-group">
                                              
												<label>Bulan</label>
                                                          <select id="basic" name="i_month" class="selectpicker show-tick form-control" data-live-search="true" onChange="load_code(this.value)" >
                                                  
                                                               <?php
                                                               for($bln=1; $bln<=12; $bln++){
																$nma_bulan=nm_bulan_2();  
																
															   ?>
                               <option value="<?= $bln ?>" <?php if($i_month == $bln){?> selected="selected"<?php } ?>><?= $nma_bulan[$bln] ?></option>
                                                                  <?php
                                                                  }
                                                                      ?>
                                                        </select>  
										  </div>     
                                        	  </div>   
                                          
                                           <div class="col-md-6">
                                          
											 <div class="form-group">
                                             <label>Tahun</label>
												 <select id="basic" name="i_year" class="selectpicker show-tick form-control" data-live-search="true" onChange="load_code(this.value)" >
                                                  
                                                               <?php
															   $year_now = date('Y');
															   
                                                               for($thn=$year_now-20; $thn<=$year_now+20; $thn++){
															
															   ?>
                               <option value="<?= $thn ?>" <?php if($thn == $i_year){?> selected="selected"<?php } ?>><?= $thn ?></option>
                                                                  <?php
                                                                  }
                                                                      ?>
                                                        </select>  
											  </div>
                                              </div>
                                              
                                              <div style="clear:both;"></div>

                                       
                                      
                                   
                                </div><!-- /.box-body -->
                             
                    
                    <div class="box-footer">
                                <input class="btn btn-success" type="submit" value="Preview"/>
                           		 </div>
                            
                            </div><!-- /.box -->
                             
                            
                       </form>
                      
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                 
              