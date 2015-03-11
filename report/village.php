
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th>Kode Kelurahan</th>
                                                <th>Nama Kelurahan</th>
                                                  <th>Nama Kecamatan</th>
                                                  <th>Keterangan</th>
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
                                                 <td><?= $row['nm_kecamatan']?></td>
                                                 <td><?= $row['m_loct_desc']?></td>
                                               
                                              <td style="text-align:center;">

                                                    <a href="village.php?page=form&id=<?= $row['m_loct_id']?>" class="btn btn-default" ><i class="fa fa-pencil"></i></a>
                                                    <a href="javascript:void(0)" onclick="confirm_delete(<?= $row['m_loct_id']; ?>,'village.php?page=delete&id=')" class="btn btn-default" ><i class="fa fa-trash-o"></i></a>

                                                </td>
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                    
                                    </table>

                 