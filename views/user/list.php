
                <?php
                if(isset($_GET['did']) && $_GET['did'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Simpan Berhasil
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 2){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Edit Berhasil
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 3){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
             User Berhasil di Non Aktifkan
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 4){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
             User Berhasil di Aktifkan
                </div>
           
                </section>
                <?php
                }
                ?>

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
                                                <th>User Login</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Phone</th> 
                                                <th>Config</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
                                            while($row = mysql_fetch_array($query)){
                                            	if($row['user_active_status'] == '0'){
													$style ='style="color:#F00"';
													$link = 'active';
												}else{
													$style ='';
													$link = 'inactive';
												}
											?>
                                            <tr <?=$style?> >
                                            	<td><?= $no?></td>
                                             	<td><?= $row['user_login']?></td>
                                                <td><?= $row['user_name']?></td>
                                                <?php
												$user_type = array('','Admin',"Non Admin");
												
                                                ?>
                                                <td><?= $user_type[$row['user_type_id']]?></td>
                                                 <td><?= $row['user_phone']?></td>
                                               
                                                <td style="text-align:center;">
                                                 	  <a href="javascript:void(0)" onclick="confirm_delete(<?= $row['user_id']; ?>,'user.php?page=<?=$link?>&id=')" class="btn btn-default" ><?=$link?></a>
                                                </td>
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <td colspan="10"><a href="<?= $add_button ?>" class="btn btn-success " >Add</a></td>
                                               
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->