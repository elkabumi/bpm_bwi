

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            
                             <div class="title_page"> <?= $title ?></div>
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th>Kode Desa</th>
                                                <th>Nama Desa</th>
                                                <th>Jummlah Bantuan</th>
                                                <th>Total Nominal Bantuan</th>
                                                <th>Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
                                            while($row = mysql_fetch_array($query)){
                                            ?>
                                            <tr>
                                            <td><?= $no?></td>
                                              <td><?= $row['m_loct_code']?></td>
                                              <td><?= $row['m_loct_nm']?></td>
                                              <td><?= $jml_bantuan = get_jml_bantuan($row['m_loct_id'],2)?></td>
                                              <td><?= $jml_bantuan = get_nominal_bantuan($row['m_loct_id'],2)?></td>
                                               
                                              <td style="text-align:center;">

                                     					  <a href="data_donation.php?page=list_detail&id_ds=<?= $row['m_loct_id']?>" class="btn btn-default" >Detail</a>
                                                  
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
                                                  	 <?=$link_close?>
                                                    <a href="<?= $search_button ?>" class="btn btn-success" >Search Bantuan</a>
                                                </td>
                                               
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->