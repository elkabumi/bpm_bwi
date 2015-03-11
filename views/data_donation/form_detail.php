

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                     	<?php
					
                       		 $type = (isset($_GET['type'])) ? $_GET['type'] : "1";
						
						
						?>
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->
							  <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li <?php if($type == 1){ ?>class="active"<?php }?> ><a href="#tab_1" data-toggle="tab">Entry Bantuan</a></li>
                                    <li <?php if($type == 2){ ?>class="active"<?php }?>><a href="#tab_2" data-toggle="tab">Entry Dokumentasi Bantuan</a></li>
                                </ul>
                        		<div class="tab-content">
                                  
                                    <div class="tab-pane <?php if($type == 1){ ?>active<?php }?>" id="tab_1">
                               
                                          <div class="title_page"> <?= $title ?></div>
                
                      						<form  class="cmxform" name="form" id="createForm" action="<?= $action?>" method="post" enctype="multipart/form-data" role="form" onSubmit="return valid()">
                					
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
                                                              <select id="basic" name="i_kec_id" class="selectpicker show-tick form-control" data-live-search="true"  disabled="disabled">
                                                  
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
                                                              <select id="basic" name="i_actv_id" class="selectpicker show-tick form-control" data-live-search="true" disabled="disabled"> 
                                                  
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
                                                             <div id="desc_kegiatan">
                                                        </div>
                                                        <?php
                                                        if($row->m_activity_id == '999'){
                                                        ?>
                                                        <div id="desc_kegiatan_input">
                                                        <div class="form-group">
                                                            <label>Deskripsi Kegiatan</label>
                                                                    <input readonly="readonly"  required type="text" name="i_desc_actv" class="form-control" placeholder="Deskripsi Kegiatan ..." value="<?=$row->m_activity_other  ?>" title="Deskripsi Kegiatan tidak boleh kosong"/>
                                                        </div> 
                                                        </div>    
                                                        <?php
                                                        }
                                                        ?>
                                                        <div class="form-group">
                                                            <label>Tahun Anggaran</label>
                                                            <input readonly="readonly"  required  type="number" maxlength="4" name="i_year"  id="i_year"  class="form-control" placeholder="Masukkan Tahun Anggaran ..." value="<?= $row->d_don_year ?>" title="Tahun Anggaran tidak boleh kosong dan maksimal 4 Digit"/>
                                                        
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama Penerima Bantuan</label>
                                                            <input readonly="readonly"  required  type="text" name="i_name" class="form-control" placeholder="Masukkan Nama Penerima Bantuan ..." value="<?= $row->d_don_nm ?>" title="Nama Penerima Bantuan tidak boleh kosong"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Alamat Penerima</label>
                                                             <textarea readonly="readonly"  class="form-control" name="i_addres" rows="3" placeholder="Masukkan Alamat Penerima ..." title="Alamat Penerima tidak boleh kosong"/><?= $row->d_don_addres ?></textarea>
                                                         </div>
                                                        <div class="form-group">
                                                           <label>Jumlah Bantuan</label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">Rp</span>
                                                                    <input readonly="readonly"  required type="number"name="i_nominal" class="form-control" value="<?= $row->d_don_nominal ?>"  title="Jumlah Bantuan tidak boleh kosong">
                                                                 <span class="input-group-addon">.00</span> 
                                                                 </div>
                                                                 </div>
                                                        </div>
                                                         <div class="col-md-6">
                                                         <div class="form-group">
                                                            <label>Bentuk Bantuan</label>
                                                            <input readonly="readonly"   type="text" name="i_type" class="form-control" placeholder="Masukkan Bentuk Bantuan ..." value="<?= $row->d_don_bentuk ?>"/>
                                                        </div>
                                                        </div>
                                                         <div class="col-md-3">
                                                          <div class="form-group">
                                                            <label>jumlah</label>
                                                            <input  readonly="readonly"  type="number" name="i_qty" class="form-control" placeholder="Masukkan Jumlah ..." value="<?= $row->d_don_qty ?>"/>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                          <div class="form-group">
                                                            <label>Unit</label>
                                                          <select id="basic" name="i_unit_id" class="selectpicker show-tick form-control" data-live-search="true" disabled="disabled" >
                                                  
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
                                                            <input  readonly="readonly"  type="text" name="i_p" class="form-control" placeholder="Masukkan Dimensi Kegiatan (P) ..." value="<?= $row->d_don_dim_p ?>"/>
                                                        </div>
                                                        </div>
                                                         <div class="col-md-4">
                                                          <div class="form-group">
                                                            <label>Dimensi Kegiatan (L)</label>
                                                            <input  readonly="readonly" type="text" name="i_l" class="form-control" placeholder="Masukkan Dimensi Kegiatan (L) ..." value="<?= $row->d_don_dim_l ?>"/>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                          <div class="form-group">
                                                            <label>Dimensi Kegiatan (T)</label>
                                                            <input readonly="readonly"  type="text" name="i_t" class="form-control" placeholder="Masukkan Dimensi Kegiatan (T) ..." value="<?= $row->d_don_dim_t ?>"/>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                          <div class="form-group">
                                                            <label>Keterangan</label>
                                                 <textarea  readonly="readonly" class="form-control" name="i_description" rows="3" placeholder="Masukkan keterangan ..."><?= $row->d_don_desc ?></textarea>
                                                        </div>
                    
                                                     </div>
                                              
                                                        <div style="clear:both;"></div>
                                                     
                                                </div><!-- /.box-body -->
                                                
                                                  <div class="box-footer">
                                              
                                                <a href="<?= $close_button?>" class="btn btn-success" >Close</a>
                                             
                                             </div>
                                            
                                            </div><!-- /.box -->
                                              
                                     	  </form>
                                     
                                 		</div><!-- /.tab-pane -->
                                   		<div class="tab-pane <?php if($type == 2){ ?>active<?php }?>" id="tab_2" >
                                      	<?php
                                          if(isset($_GET['id'])){
                                            include 'list_foto.php';
                                            include 'list_video.php';
                                          }
                                        ?>
                                          	 <div style="clear:both;"></div>
                                              <div class="box-footer">
                                                  
                                                    <a href="<?= $close_button?>" class="btn btn-success" >close</a>
                                              
                                             </div>
         							 	</div><!-- /.tab-pane -->
                                	</div><!-- /.tab-content -->
                          		</div><!-- nav-tabs-custom -->
                       		 </div><!-- /.col -->
                         </div>
                </section><!-- /.content -->