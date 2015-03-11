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
                                                <label>Nama Video</label>
                                            <input required type="text" name="i_nm" class="form-control" placeholder="Masukkan Nama Video ..." value="<?= $row->d_video_nm ?>" title="Luas Tanah Tidak boleh kosong dan harus diisi dengan angka"/>       
                                        </div>
                                        
                                      	<?php if($id != ''  and  $row->d_video_link != ''){ ?>
                                      	<div class="form-group"> 
                                	   			 <iframe title="YouTube video player" class="youtube-player" 
                                               	 type="text/html" 
													width="400" height="244" src="http://www.youtube.com/embed/<?= $row->d_video_link ?>"
													frameborder="0" allowFullScreen>
                                                     </iframe>
                                          </div>
                                          <?php } ?>
                                          
                                        <div class="form-group"> 
                                                <label>Link Video Youtube</label>
                                            <input required type="text" name="i_link" class="form-control" placeholder="Masukkan Link vide Youtube ..." value="<?= $row->d_video_link ?>" title="Luas Tanah Tidak boleh kosong dan harus diisi dengan angka"/>       
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