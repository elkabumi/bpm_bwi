     
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
                if(isset($_GET['did']) && $_GET['did'] == 2){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Edit Sukses!</b>
            	 Data Berhasil Di Edit
            	</div>
           
                </section>
                <?php
                }
                ?>
                ?>

                <!-- Main content -->
                <section class="content">

                    <div class='row'>
                        <div class='col-md-12'>
                            <div class="title_page"> <?= $title ?></div>

                             <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">

                            <div class='box box-info'>
                           
                            
                            
                             <div class='box'>
                                <div class='box-header'>
                                 
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                    </div><!-- /. tools -->
                                </div><!-- /.box-header -->
                                <div class='box-body pad'>
                                     <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">
											    <textarea name="i_kata" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$row->prakata_desc?></textarea>                      
                                     				<div class="box-footer">
                               				 <input class="btn btn-success" type="submit" value="Edit"/>
                             
                             			</div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- /.col-->
                    </div><!-- ./row -->
                        </div>
                        </div>
                        </section