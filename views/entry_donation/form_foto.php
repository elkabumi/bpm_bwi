<!-- Content Header (Page header) -->
        
                 <?php
                if(isset($_GET['did']) && $_GET['did'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
              Simpan berhasil
                </div>
           
                </section>
                <?php
                }
                ?>
                <?php
                if(isset($_GET['did']) && $_GET['did'] == 2){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Gagal !</b>
              	Data Petani sudah ada
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
                          
                          

                             <form class="cmxform" id="createForm" action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">

                            <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                    
                                   
                                        <div class="col-md-12">
                                      
                                    
                                       
                                       	<div class="form-group"> 
                                                <label>Keterangan Foto</label>
                                            <input required type="text" name="i_nm" class="form-control" placeholder="Masukkan Nama foto ..." value="<?= $row->d_pho_nm ?>" title="Nama foto Tidak boleh kosong"/>       
                                        </div>
                                     
                                          
                                        <div class="form-group"> 
                                                <label>Foto</label>
                                           <?php
                                      		  if($f_id){
											?>
                                       			 <br />
                                       		 <img src="<?= $row->d_pho_file ?>" style="width:30%; height:40%"/>
                                       			 <?php
												}
													?>
                                           <input type="file" name="i_img" id="i_img" /></div>
                                
                                         <div class="form-group"> 
                                         <label>Progres Bantuan %</label>
                                          <input required type="number" placeholder="Masukkan Progress Bantuan (%) ..." name="i_prog" class="form-control"  value="<?= $row->d_don_prog 	 ?>"  title="Progres Bantuan Tidak boleh kosong dan harus diisi dengan angka"/>
                                       
                                        </div>
    </div>
                                     
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