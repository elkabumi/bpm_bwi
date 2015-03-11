
                 <?php
                if(isset($_GET['did']) && $_GET['did'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses</b>
               Simpan Berhasil 
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

                             <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">

                            <div class="box box-cokelat">
                                
                               
                         		<div class="box-body">
                                    
                                        <!-- text input -->
                                      <div class="col-md-12">
                                    	<div class="form-group">
                                            <label>No. Urut</label>
                                            <input required  readonly="readonly"type="text" name="i_no" class="form-control" placeholder="Masukkan nama ..." value="<?= $row->d_don_no  ?>"/>
                                        </div>
                                        
                                       
                                        <div class="form-group">
                                       	<label>Nama Desa</label>
                                      		  <select id="basic" name="i_kec_id" class="selectpicker show-tick form-control" data-live-search="true" onChange="load_code(this.value)" >
                                  
                                     				<?php
															$query_desa=mysql_query("SELECT m_loct_id,loct_t_id,m_loct_code,m_loct_nm 
																					FROM m_location ".$where_desa."");
                                      		  				while($row_desa = mysql_fetch_array($query_desa)){
                                       				 ?>
               <option value="<?= $row_desa['m_loct_id']?>" <?php if($row->m_loct_id == $row_desa['m_loct_id']){?> selected="selected" <?php } ?>><?= $row_desa['m_loct_code']." (".$row_desa['m_loct_nm'].")" ?></option>
                                      			  <?php
                                      			  }
                                      				  ?>
                                        </select> 
                                        </div>
                                      	<div class="form-group">
                                        <label>Jenis Kegiatan</label>
                                      		  <select id="basic" name="i_actv_id" class="selectpicker show-tick form-control" data-live-search="true" onChange="load_code(this.value)" >
                                  
                                     				<?php
															$query_activity=mysql_query("SELECT *
																					FROM m_activity");
                                      		  				while($row_activity= mysql_fetch_array($query_activity)){
                                       				 ?>
               <option value="<?= $row_activity['m_activity_id']?>"<?php if($row->m_activity_id == $row_activity['m_activity_id']){?> selected="selected" <?php } ?>><?= $row_activity['m_activity_nm'] ?></option>
                                      			  <?php
                                      			  }
                                      				  ?>
                                        </select> 
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Anggaran</label>
                                            <input required  type="text" name="i_year" class="form-control" placeholder="Masukkan Tahun Anggaran ..." value="<?= $row->d_don_year ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Penerima Bantuan</label>
                                            <input required  type="text" name="i_name" class="form-control" placeholder="Masukkan Nama Penerima Bantuan ..." value="<?= $row->d_don_nm ?>"/>
                                        </div>
                                       	<div class="form-group">
                                            <label>Alamat Penerima</label>
                                             <textarea class="form-control" name="i_addres" rows="3" placeholder="Masukkan Alamat Penerima ..."><?= $row->d_don_addres ?></textarea>
                                      	 </div>
                                       	<div class="form-group">
                                           <label>Jumlah Bantuan</label>
                                            <div class="input-group">
                                         		<span class="input-group-addon">Rp</span>
                                        			<input type="number" name="i_nominal" class="form-control" value="<?= $row->d_don_nominal ?>">
                                       			 <span class="input-group-addon">.00</span> 
                                                 </div>
                                                 </div>
                                        </div>
                                         <div class="col-md-6">
                                         <div class="form-group">
                                            <label>Bentuk Bantuan</label>
                                            <input required  type="text" name="i_type" class="form-control" placeholder="Masukkan Bentuk Bantuan ..." value="<?= $row->d_don_bentuk ?>"/>
                                        </div>
                                        </div>
                                         <div class="col-md-3">
                                          <div class="form-group">
                                            <label>jumlah</label>
                                            <input required  type="number" name="i_qty" class="form-control" placeholder="Masukkan Jumlah ..." value="<?= $row->d_don_qty ?>"/>
                                        </div>
                                        </div>
                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <label>Unit</label>
                                          <select id="basic" name="i_unit_id" class="selectpicker show-tick form-control" data-live-search="true" onChange="load_code(this.value)" >
                                  
                                     				<?php
															$query_unit=mysql_query("SELECT *
																					FROM m_unit");
                                      		  				while($row_unit= mysql_fetch_array($query_unit)){
                                       				 ?>
               <option value="<?= $row_unit['m_unit_id']?>" <?php if($row->m_unit_id == $row_unit['m_unit_id']){?> selected="selected"<?php } ?>><?= $row_unit['m_unit_nm'] ?></option>
                                      			  <?php
                                      			  }
                                      				  ?>
                                        </select>   </div>
    
                                     </div>
                                     
                                      <div class="col-md-4">
                                         <div class="form-group">
                                            <label>Dimensi Kegiatan (P)</label>
                                            <input required  type="text" name="i_p" class="form-control" placeholder="Masukkan Dimensi Kegiatan (P) ..." value="<?= $row->d_don_dim_p ?>"/>
                                        </div>
                                        </div>
                                         <div class="col-md-4">
                                          <div class="form-group">
                                            <label>Dimensi Kegiatan (L)</label>
                                            <input required  type="text" name="i_l" class="form-control" placeholder="Masukkan Dimensi Kegiatan (L) ..." value="<?= $row->d_don_dim_l ?>"/>
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label>Dimensi Kegiatan (T)</label>
                                            <input required  type="text" name="i_t" class="form-control" placeholder="Masukkan Dimensi Kegiatan (T) ..." value="<?= $row->d_don_dim_t ?>"/>
                                        </div>
                                        </div>
                                        <div class="col-md-12">
                                          <div class="form-group">
                                            <label>Keterangan</label>
    							 <textarea class="form-control" name="i_description" rows="3" placeholder="Masukkan keterangan ..."><?= $row->d_don_desc ?></textarea>
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
                     
                                  <?php
              if(isset($_GET['id'])){
			 	include 'list_foto.php';
			  	include 'list_video.php';
			  }
					?>

                </section><!-- /.content -->