
 <!-- Main content -->
                <section class="content">
                   
                    
                     <div class="row">
                      <div class="box box-primary">
                                <div class="box-header">
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">                                        
                                      		<button class="btn btn-success btn-sm pull-right" data-widget='collapse3' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                                    </div><!-- /. tools -->

                                
                                       <div class="title_page_2">
                                     <br />
                                       Progres 0% - 59% (Baru Berjalan)
                                       </div>
                                       <div class="table_3">
                                        <table id="siimple_table3" class="table table-bordered table-striped">
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
                               <div class="togle_3">
                                <div class="box-body no-padding">
                                   
                                    <div class="table-responsive">
                                        <!-- .table - Uses sparkline charts-->
                                       <table id="example_simple3" class="table table-bordered table-striped">
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
										   
                                            while($row = mysql_fetch_array($query3)){
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
                                       <tfoot>
                                            <tr>
                                                <td colspan="10">
													<?=$link_close_button?>
                                                    <?=$link_search_button?>
                                                </td>
                                               
                                            </tr>
                                        </tfoot>
                                    </table>
                                    </div>
                                    
                                 <div class="box-footer">
                                		<a href="<?=$download_3?>" class="btn btn-success"><i class="fa fa-download"></i> Export PDF</a></div>
                            	</div>
                                </div><!-- /.box-body-->
                               
                         </div>
                         </div>
                         </section>
                         <?php
						
						 ?>
					<script>
					<?php
					if($total_data > 0){
					?>
						$(document.getElementsByClassName("togle_2")).hide();
						$(document.getElementsByClassName("togle_3")).hide();
						
						$(document.getElementsByClassName("table_1")).hide();
						$(document.getElementsByClassName("togle_1")).show();
					<?php
					}else if($total_data == 0 and $total_data2 >0 ){
					?>
						$(document.getElementsByClassName("togle_1")).hide();
						$(document.getElementsByClassName("togle_3")).hide();
						
						$(document.getElementsByClassName("table_2")).hide();
						$(document.getElementsByClassName("togle_2")).show();
						
					<?php
					}else if($total_data == 0 and $total_data2 == 0 and $total_data3 >0 ){
					?>
					
						$(document.getElementsByClassName("togle_1")).hide();
						$(document.getElementsByClassName("togle_2")).hide();
						
						$(document.getElementsByClassName("table_3")).hide();
						$(document.getElementsByClassName("togle_3")).show();
						
					<?php
					}else{
					?>
					
							$(document.getElementsByClassName("togle_1")).hide();
							$(document.getElementsByClassName("togle_2")).hide();
				
							$(document.getElementsByClassName("togle_3")).hide();
					<?php } ?>
                    </script>