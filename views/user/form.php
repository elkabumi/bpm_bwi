<script>
function load_kec(str)
{
	
	if (str=="" || str == 0)
	{
	
		
		document.getElementById("kec").innerHTML="";
		
		
		
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
		
		document.getElementById("kec").innerHTML=xmlhttp.responseText;

	
		
		}
	}
	
	xmlhttp.open("GET","../views/user/data_kec.php?grade_id="+str,true);
	xmlhttp.send();
	
	
	}
</script> 
        
                 <?php
                if(isset($_GET['err']) && $_GET['err'] == 1){
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
               
                else if(isset($_GET['err']) && $_GET['err'] == 2){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Simpan gagal !</b>
              Mohon Gunakan User login Dengan Nama Lain
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
                                    
                                        <div class="col-md-12">
                                        
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Enter name ..." value="<?= $row->user_name ?>"/>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label>Phone</label>
                                        <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                        </div>
                                        	<input required class="form-control" type="text" name="i_phone" placeholder="Enter phone ..." value="<?= $row->user_phone?>">
                                        </div>
                                        </div>
                                      	<div class="form-group">
                                          <label>Type</label>
                                           <select id="basic" name="i_type"  class="selectpicker show-tick form-control" data-live-search="true" >
                                             <option value="1">Admin</option>
                                         	 <option value="2">Supervisor</option>   
                                             <option value="3">Pengguna</option>       
                                           </select>                                    
                                  		</div>
                                      	<div class="form-group">
                                          <label>Tingkat</label>
                                           <select id="basic" name="i_grade" class="selectpicker show-tick form-control" data-live-search="true" onChange="load_kec(this.value)" >
                                             <option value="999">Kabupaten</option>
                                         	 <option value="1">Kecamatan</option>       
                                           </select>                                    
                                  		</div>
                                        <div id="kec"></div>
                                      
										<div class="form-group">
                                            <label>User login</label>
                                            <input required type="text" name="i_login" class="form-control" placeholder="Enter user login ..." value="<?= $row->user_login ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input required type="password" name="i_password" class="form-control" placeholder="Enter password ..." value=""/>
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input required type="password" name="i_confirm_password" class="form-control" placeholder="Enter confirm password ..." value=""/>
                                        </div>
                                         <div class="form-group">
                                         <label>Images</label>
                                           <input type="file" name="i_img" id="i_img" />
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