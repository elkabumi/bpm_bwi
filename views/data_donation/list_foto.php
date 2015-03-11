    <div class="row">
                        <div class="col-md-12">
                             <div class="title_page">Dokumentasi Foto</div>
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            	<th width="5%">No</th>
                                                <th>Nama Foto</th>
                                                <th>Foto</th>
                                                  <th>Config</th>
                                        
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $q_foto = select_foto_donation($id);
											$no_foto = 1;
                                            while($r_foto = mysql_fetch_array($q_foto)){
                                            ?>
                                            <tr>
                                            	<td><?= $no_foto?></td>
                                                <td><?= $r_foto['d_pho_nm']?></td>
                                                <td>
												<?php if($r_foto['d_pho_file'] != ''){ ?>
                                                <img src="<?= $r_foto['d_pho_file']?>" width="50" height="50" /></td>
												<?php
                                                }
												?>
                                                 <td style="text-align:center;">
 											
											
                                                
                                                    <a href="data_donation.php?page=form_foto&f_id=<?= $r_foto['d_photo_id']; ?><?=$link_detail?>" class="btn btn-default" >Detail</a>
                                            
                                                </td> 
                                            </tr>
                                            <?php
											$no_foto++;
                                            }
                                            ?>

                                           
                                          
                                            </tbody>
                                        
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>