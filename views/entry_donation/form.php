<script type="application/javascript">
function load_desc_kegiatan(str)
{
	
	if (str=="" || str == 0)
	{
		document.getElementById("desc_kegiatan").innerHTML="";
		return;
	} 
	<?php if($id != '' and  $row->m_activity_id == '999'){ ?>
	if(str != 999 )
	{
		$(document.getElementById("desc_kegiatan_input")).hide();
		return;
	}else  if(str == 999 )
	{
		$(document.getElementById("desc_kegiatan_input")).show();
		return;
	}
	<?php } ?>
	if (window.XMLHttpRequest)
	{// kode for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
	}
	else
	
	{// kode for IE6, IE5
	
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
	if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		
		document.getElementById("desc_kegiatan").innerHTML=xmlhttp.responseText;
	
		}
	}
		xmlhttp.open("GET","../views/entry_donation/data_kegiatan.php?keg_id="+str,true);
		xmlhttp.send();

	
	}
	
	function valid(){
         	var i_year=form.i_year.value;
			var i_prog=form.i_prog.value;
			var year_now =new Date().getFullYear();
			if(i_year > year_now){
				alert("Tahun Anggaran tidak boleh lebih dari tahun Sekarang");
			}
			if(i_prog > 100){
				alert("Progres Bantuan tidak boleh lebih dari 100%");
			}
			  return true; 
	}
	

	

</script>    

                 <?php
                if(isset($_GET['add']) && $_GET['add'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses</b>
               Data Bantuan Berhasil Disimpan
                </div>
           
                </section>
                <?php
                }if(isset($_GET['did']) && $_GET['did'] == 1){
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
                }if(isset($_GET['did']) && $_GET['did'] == 2){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses</b>
               Simpan Data Dokumentasi Berhasil 
                </div>
           
                </section>
                <?php
                }if(isset($_GET['err']) && $_GET['err'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Edit Sukses</b>
               Edit Data Dokumentasi Berhasil 
                </div>
           
                </section>
                <?php
                }
                ?>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                     	<?php
						if(!($_GET['id'])){
                       		 $type_tab = (isset($_GET['type_tab'])) ? $_GET['type_tab'] : "1";
						}else{
							$type_tab = (isset($_GET['type_tab'])) ? $_GET['type_tab'] : "2";
						}
						?>
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->
							  <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li <?php if($type_tab == 1){ ?>class="active"<?php }?> ><a href="#tab_1" data-toggle="tab">Entry Bantuan</a></li>
                                    <li <?php if($type_tab == 2){ ?>class="active"<?php }?>><a href="#tab_2" <?php if(!($_GET['id'])){?>style="pointer-events: none;" <?php } ?>data-toggle="tab">Entry Dokumentasi Bantuan</a></li>
                                </ul>
                        		<div class="tab-content">
                                  
                                    <div class="tab-pane <?php if($type_tab == 1){ ?>active<?php }?>" id="tab_1">
                               
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
                                                              <select id="basic" name="i_kec_id" class="selectpicker show-tick form-control" data-live-search="true" >
                                                  
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
                                                              <select id="basic" name="i_actv_id" class="selectpicker show-tick form-control" data-live-search="true" onChange="load_desc_kegiatan(this.value)" > >
                                                  					<option value="0">-----</option>
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
                                                                    <input required type="text" name="i_desc_actv" class="form-control" placeholder="Deskripsi Kegiatan ..." value="<?=$row->m_activity_other  ?>" title="Deskripsi Kegiatan tidak boleh kosong"/>
                                                        </div> 
                                                        </div>    
                                                        <?php
                                                        }
                                                        ?>
                                                        </div>
                                                        <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Tahun Anggaran</label>
                                                            <input required  type="number" maxlength="4" name="i_year"  id="i_year"  class="form-control" placeholder="Masukkan Tahun Anggaran ..." value="<?= $row->d_don_year ?>" title="Tahun Anggaran tidak boleh kosong dan maksimal 4 Digit"/>
                                                        
                                                        </div>
                                                        </div>
                                                          <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Progress Bantuan (%)</label>
                                                            <input required  type="number" maxlength="4" name="i_prog"  id="i_prog"  class="form-control" placeholder="Masukkan Progress Bantuan (%) ..." value="<?= $row->d_don_prog ?>" title="Progres Bantuan Tidak boleh kosong"/>
                                                        
                                                        </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Asal Bantuan</label>
                                                         		<select id="basic" name="i_from_id" class="selectpicker show-tick form-control" data-live-search="true" onChange="load_desc_kegiatan(this.value)" > >
                                                  				<?php
																	$from = array('1'=>'Dinas Sosial','2'=>'Bantuan Perusahaan','3'=>'Bantuan Perorangan');
																	for($i=1; $i<=3; $i++){
																?>
                                                                	<option value="<?=$i?>" <?php if($row->d_don_from == $i){?> selected="selected"<?php }?>><?=$from[$i];?></option>
                                                                <?php 
																	}
																?>
                                                        </select> 
                                                        </div>
                                                        </div>
                                                        
                                                
                                                        
                                                        <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Tanggal Proposal Diajukan</label>
                                                                  <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text"  class="form-control pull-right" id="date_picker1" name="i_diajukan_date" value="<?=$row->d_don_pengajuan?>" />
                                                            </div>
                                                   </div>
                              					   </div>
                                                          <div class="col-md-3">
                                                          <div class="form-group">
                                                                            <label>Tanggal Proposal Diterima</label>
                                                                     <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text"  class="form-control pull-right" id="date_picker2" name="i_diterima_date" value="<?=	$row->d_don_diterima?>" />
                                                            </div>
                                                   </div>
                                      				</div>
                                                        <div class="col-md-3">
                                                        <div class="form-group">
                                                             <label>Tanggal Proposal Disetujui</label>
                                                                    <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text"  class="form-control pull-right" id="date_picker3" name="i_disetujui_date" value="<?=$row->d_don_disetujui?>" />
                                                            </div>
                                  						 </div>
                                                        </div>
                                                                <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Tanggal Pelaksanaan</label>
                                                                  <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text"  class="form-control pull-right" id="date_picker4" name="i_implementation_date" value="<?=$row->d_don_implementation?>" />
                                                            </div>
                                                  		 </div>  
                                                 		 </div>	
                                                        
                                                        <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Nama Penerima Bantuan</label>
                                                            <input required  type="text" name="i_name" class="form-control" placeholder="Masukkan Nama Penerima Bantuan ..." value="<?= $row->d_don_nm ?>" title="Nama Penerima Bantuan tidak boleh kosong"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Alamat Penerima</label>
                                                             <textarea class="form-control" name="i_addres" rows="3" placeholder="Masukkan Alamat Penerima ..." title="Alamat Penerima tidak boleh kosong"/><?= $row->d_don_addres ?></textarea>
                                                         </div>
                                                        <div class="form-group">
                                                           <label>Jumlah Bantuan</label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">Rp</span>
                                                                    <input required type="number"name="i_nominal" class="form-control" value="<?= $row->d_don_nominal ?>"  title="Jumlah Bantuan tidak boleh kosong">
                                                                 <span class="input-group-addon">.00</span> 
                                                                 </div>
                                                                 </div>
                                                        </div>
                                                         <div class="col-md-6">
                                                         <div class="form-group">
                                                            <label>Bentuk Bantuan</label>
                                                            <input   type="text" name="i_type" class="form-control" placeholder="Masukkan Bentuk Bantuan ..." value="<?= $row->d_don_bentuk ?>"/>
                                                        </div>
                                                        </div>
                                                         <div class="col-md-3">
                                                          <div class="form-group">
                                                            <label>jumlah</label>
                                                            <input   type="number" name="i_qty" class="form-control" placeholder="Masukkan Jumlah ..." value="<?= $row->d_don_qty ?>"/>
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
                                                            <input   type="text" name="i_p" class="form-control" placeholder="Masukkan Dimensi Kegiatan (P) ..." value="<?= $row->d_don_dim_p ?>"/>
                                                        </div>
                                                        </div>
                                                         <div class="col-md-4">
                                                          <div class="form-group">
                                                            <label>Dimensi Kegiatan (L)</label>
                                                            <input   type="text" name="i_l" class="form-control" placeholder="Masukkan Dimensi Kegiatan (L) ..." value="<?= $row->d_don_dim_l ?>"/>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                          <div class="form-group">
                                                            <label>Dimensi Kegiatan (T)</label>
                                                            <input   type="text" name="i_t" class="form-control" placeholder="Masukkan Dimensi Kegiatan (T) ..." value="<?= $row->d_don_dim_t ?>"/>
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
                                                <input class="btn btn-success" type="submit" value="<?=$button?>"/>
                                                <a href="<?= $close_button?>" class="btn btn-success" >Close</a>
                                             
                                             </div>
                                            
                                            </div><!-- /.box -->
                                              
                                     	  </form>
                                     
                                 		</div><!-- /.tab-pane -->
                                   		<div class="tab-pane <?php if($type_tab == 2){ ?>active<?php }?>" id="tab_2" >
                                      	<?php
                                          if(isset($_GET['id'])){
                                            include 'list_foto.php';
                                            include 'list_video.php';
                                          }
                                        ?>
                                          	 <div style="clear:both;"></div>
                                              <div class="box-footer">
                                                  
                                                    <a href="<?= $close_button?>" class="btn btn-success" >Selesai</a>
                                              
                                             </div>
         							 	</div><!-- /.tab-pane -->
                                	</div><!-- /.tab-content -->
                          		</div><!-- nav-tabs-custom -->
                       		 </div><!-- /.col -->
                         </div>
                </section><!-- /.content -->