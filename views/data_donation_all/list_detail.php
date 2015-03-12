
 <!-- Main content -->
                <section class="content">
                   <div class="title_page"><?=$title ?></div>
                    
                     <div class="row">
                      <div class="box box-primary">
                                <div class="box-header">
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">                                        
                                      		<button class="btn btn-success btn-sm pull-right" data-widget='collapse1' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                                    </div><!-- /. tools -->

                                
                                       <div class="title_page_2">
                                     <br />
                                       Progres 100% (Selesai)
                                       </div>
                                       <div class="table_1">
                                        <table id="siimple_table1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                           
                                               	 	<th>No <br />Urut</th>
                                                    <th>Nama Kec</th>
                                                	<th>Nama Desa</th>
                                                  	<th>Jenis<br /> Kegiatan/Bantuan</th>
                                                  	<th>Thn <br />Anggaran</th> 
                                                    <th>Nama Penerima Bantuan</th>
                                                    <th>Jumlah<br /> Nominal Bantuan</th>
                                                    <th>Progress<br />Bantuan</th>
                                                    <th>Config</th>
                                            </tr>
                                        </thead>
                                        </table>
                                        </div>
                                </div>
                               <div class="togle_1">
                                <div class="box-body no-padding">
                                   
                                    <div class="table-responsive">
                                        <!-- .table - Uses sparkline charts-->
                                       <table id="example_simple1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                           
                                               	 	<th>No <br />Urut</th>
                                                    <th>Nama Kec</th>
                                                	<th>Nama Desa</th>
                                                  	<th>Jenis<br /> Kegiatan/Bantuan</th>
                                                  	<th>Thn <br />Anggaran</th> 
                                                    <th>Nama Penerima Bantuan</th>
                                                    <th>Jumlah<br /> Nominal Bantuan</th>
                                                    <th>Progress<br />Bantuan</th>
                                                    <th>Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
										   
                                            while($row = mysql_fetch_array($query)){
                                            ?>
                                            <tr>
                                        
                                                 <td><?= $row['d_don_no']?></td>
                                                 <td><?= $row['nm_kec']?></td>
                                                 <td><?= $row['m_loct_nm']?></td>
                                                 <td><?= $row['m_activity_nm']?></td>
                                                 <td><?= $row['d_don_year']?></td>
                                                 <td><?= $row['d_don_nm']?></td>
                                                 <td><?= $row['d_don_nominal']?></td>
                                                 <td><?= $row['d_don_prog']?>%</td>
                                              <td style="text-align:center;">
												<?php 
												if($_SESSION['user_type_id'] == '1'  or $_SESSION['user_type_id'] == '2'){
												?>
												   		<a href="data_donation_all.php?page=form_edit&id=<?= $row['d_don_id']?>&year=<?=$i_year?>&month=<?=$i_month?>" class="btn btn-default" >Edit</a>
           
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
                                       
                                    </table>
                                    </div>
                                      <div class="box-footer">
                                    <a href="<?=$download?>" class="btn btn-success"><i class="fa fa-download"></i> Export PDF</a>
								</div>
                                </div><!-- /.box-body-->
                                
                            </div>
                         </div>
                         </div>
                
						