<!-- Content Header (Page header) -->
        
                 <?php
                if(isset($_GET['did']) && $_GET['did'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Simpan gagal !</b>
               Password dan confirm password tidak sama
                </div>
           
                </section>
                <?php
                }
                ?>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                      
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->

                          
                          <div class="title_page"> <?= $title ?></div>

                             <form class="cmxform" name="form" id="createForm"  action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">

                            <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                    
                                        <!-- text input -->
                                      <div class="col-md-4">
                                      <div class="form-group">
                                            <label>Code Kec</label>
                                            <input  readonly="readonly" required type="text" name="i_kab_cod" class="form-control"  value="<?= $kab_code ?>"/>
                                        </div>
                                         </div>
                                         <div class="col-md-4">
                                      <div class="form-group">
                                            <label>&nbsp;</label>
                                            <input  required type="text" name="i_kec_cod" class="form-control" title="Kode Kec tidak boleh kosong dan maksimal 3 Digit"  placeholder="Masukkan kode Kecamtan ..." value="<?= $kec_code ?>" maxlength="3"/>
                                        </div>
                                         </div>
                                         <div class="col-md-4">
                                      <div class="form-group">
                                            <label>&nbsp;</label>
                                            <input  readonly="readonly" required type="text" name="i_ds_cod" class="form-control" placeholder="Masukkan kode ..." value="<?= $kode_desa ?>" />
                                        </div>
                                         </div>
                                       <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Masukkan nama ..."   title="Nama Kec tidak boleh kosong" value="<?= $row->m_loct_nm ?>"/>
                                        </div>
                                       <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" name="i_description" rows="3" placeholder="Masukkan keterangan ..."><?= $row->m_loct_desc ?></textarea>
                                        </div>
                                        </div>
                                        <div style="clear:both;"></div>
                                     
                               	 </div><!-- /.box-body -->
                               	 
                                  <div class="box-footer">
                                <input class="btn btn-success" type="submit" value="Save"/>
                                <a href="<?= $close_button?>" class="btn btn-success" >Close</a>
                             
                             </div>
                            
                            </div><!-- /.box -->
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->