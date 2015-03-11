<!-- Content Header (Page header) -->
<script>
function load_code(str)
{
	var code_input = document.getElementById("code_input");
	if (str=="" || str == 0)
	{
	
		
		document.getElementById("code").innerHTML="";
		$(document.getElementById("code_input")).show();
		
		
	return;
	} 
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
		
		document.getElementById("code").innerHTML=xmlhttp.responseText;
		
		$(document.getElementById("code_input")).hide();
	
		
		}
	}
	
	xmlhttp.open("GET","../views/village/data_code.php?kec_id="+str,true);
	xmlhttp.send();
	
	
	}
</script>       
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

                             <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">

                            <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                    
                                        <!-- text input -->
                                        <div class="col-md-12">
                                    	<div class="form-group">
                                       	<label>Kecamatan</label>
                                      		  <select id="basic" name="i_kec_id" class="selectpicker show-tick form-control" data-live-search="true" onChange="load_code(this.value)" >
                                     				 <option value="0">---</option>
                                     				<?php
															$query_kec=mysql_query("SELECT m_loct_id,loct_t_id,m_loct_code,m_loct_nm 
																					FROM m_location WHERE loct_t_id ='1'");
                                      		  				while($row_kec = mysql_fetch_array($query_kec)){
                                       				 ?>
               <option value="<?= $row_kec['m_loct_id']?>" <?php if( $row->m_loct_parent_id == $row_kec['m_loct_id']){ ?> selected="selected"<?php } ?>><?= $row_kec['m_loct_code']." (".$row_kec['m_loct_nm'].")" ?></option>
                                      			  <?php
                                      			  }
                                      				  ?>
                                        </select> 
                                  </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                            <label>Code Kelurahan</label>
                                            <input  readonly="readonly" required type="text" name="i_kab_cod" class="form-control"  value="<?= $kab_code ?>"/>
                                        </div>
                                         </div>
                                         <div class="col-md-4">
                                  	  <div id="code_input">
                                 	  <div class="form-group">
                                          <label>&nbsp;</label>
                                             <input required readonly="readonly" type="text" name="i_kec_cod" class="form-control" placeholder="Masukkan Code ..." value="<?=$kec_code ?>"/>
                                        </div>     
                                        </div>                              
                                                        

                                          <div id="code"></div>
                                         </div>
                                         <div class="col-md-4">
                                      <div class="form-group">
                                            <label>&nbsp;</label>
                                            <input   required type="text" name="i_ds_cod" class="form-control" placeholder="Masukkan kode ..." value="<?=$kode_desa ?>"/>
                                        </div>
                                         </div>
                                  
                                   <!-- 
                                    
                                    -->
          
                                         <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Masukkan nama ..." value="<?= $row->m_loct_nm ?>"/>
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