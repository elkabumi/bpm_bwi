
       

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                       
                            
                             <div class="title_page"> <?= $title ?></div>
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                           
                                               	 	<th>No Urut</th>
                                                	<th>Nama Desa</th>
                                                 	<th>Jenis Kegiatan/Bantuan</th>
                                                  	<th>Tahuna Anggaran</th>
                                                    <th>Nama Penerima Bantuan</th>
                                                    <th>Jumlah Nominal Bantuan</th>
                                                    <th>Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
										   
                                            while($row = mysql_fetch_array($query_item)){
                                            ?>
                                            <tr>
                                        
                                                 <td><?= $row['d_don_no']?></td>
                                                 <td><?= $row['m_loct_nm']?></td>
                                                 <td><?= $row['m_activity_nm']?></td>
                                                 <td><?= $row['d_don_year']?></td>
                                                 <td><?= $row['d_don_nm']?></td>
                                                 <td><?= $row['d_don_nominal']?></td>
                                               
                                              <td style="text-align:center;">
												<?php 
												if($_SESSION['user_type_id'] == '1'  or $_SESSION['user_type_id'] == '2'){
												?>
												   		<a href="entry_donation.php?page=form&id=<?= $row['d_don_id']?>&type=1" class="btn btn-default" >Edit</a>
           
												<?php
                                                }else{
												?>
                                                       <a href="data_donation.php?page=form_detail&id=<?= $row['d_don_id']?>" class="btn btn-default" >Detail</a>
                                              	
                                               	<?php
											    } 
											   	?>
                                                
                                                </td>
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                       <tfoot>
                                            <tr>
                                                <td colspan="10">
													<?=$link_close_button?>
                                                    <?=$link_search_button?>
                                                </td>
                                               
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                  

                </section><!-- /.content -->