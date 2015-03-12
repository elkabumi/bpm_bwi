
                   <br />
                             <div class="title_page">Dokumentasi Foto</div>
                            
                            <div class="box"  style=" border: 1px solid #ddd;">
                             
                                <div class="box-body table-responsive">
                                    <table id="example_foto" class="table table-bordered ">
                                          <thead>
                                            <tr style="display:none">
                                            
                                            	<th>&nbsp;</th>
                                               
                                      			<th>&nbsp;</th>
                                        
                                       			<th>&nbsp;</th>
                                               
                                        
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $jml_foto = count_foto($id);
											$total_page=ceil($jml_foto/3);
											
											for($i=1; $i<=$total_page; $i++){
												
												
												$limit_start = ($i * 3)-3;
												$limit_end	 =  3;
												$q_foto = select_foto_donation($id,$limit_start,$limit_end);
										
											?>
                                            	<tr>
                                            <?
												
												$no_foto=($i*3)-3+1;
												
												while($r_foto = mysql_fetch_array($q_foto)){
												?>
													
													<td>
                                                 <br />  <br /> <b><?= $r_foto['d_pho_nm']?></b> <br /><br />
													<?php if($r_foto['d_pho_file'] != ''){ ?>
																<img src="<?= $r_foto['d_pho_file']?>" width="150" height="150" />
													<?php
													}
													?>
                                                   <br />
                                                    <a href="entry_donation.php?page=form_foto&f_id=<?= $r_foto['d_photo_id']?>&id=<?= $_GET['id']?>&type=<?=$type?>" class="btn btn-default" ><i class="fa fa-pencil"></i></a>
                                                    <a href="javascript:void(0)" onclick="confirm_delete(<?= $r_foto['d_photo_id']; ?>,'entry_donation.php?page=delete_foto&id=<?= $_GET['id'] ?>&type=<?=$type?>&f_id=')" class="btn btn-default" ><i class="fa fa-trash-o"></i></a>

													</td>
											   
												<?php
												$no_foto++;
												}
												
													if($i == $total_page){
														if($total_page > '1'){
															$mod_total = $jml_foto % 3;
															if($mod_total > 0){
																$colom_lebih = 3 - $mod_total;
															}else{
																	$colom_lebih = 0;
															}
														}else{
															$colom_lebih = 3- $jml_foto;
														}
													
														if($colom_lebih != 0){
															for($colom_tambahan=1;$colom_tambahan<=$colom_lebih;$colom_tambahan++){
												?>
                                                		
                                                        
                                                		<td><img src="../img/none.jpg" width="150" height="150"/></td>
                                                <?php
														}
																										
													}
												}
												
												?>
                                                </tr>
                                                <?
											}
                                            ?>

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <td colspan="4"><a href="data_donation_all.php?page=form_foto&id=<?= $_GET['id']?>&type=<?=$type?>" class="btn btn-success " >Add  Foto</a></td>
                                               
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                  
                    