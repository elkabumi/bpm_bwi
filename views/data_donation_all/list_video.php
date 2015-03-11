
                             <div class="title_page">Dokumentasi Video</div>
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                    <table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            	<th width="5%">No</th>
                                                <th>Nama Video</th>
                                                <th>Video</th>
                                                <th>Config</th>
                                        
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $q_video = select_video_donation($id);
											$no_video = 1;
                                            while($r_video = mysql_fetch_array($q_video)){
                                            ?>
                                            <tr>
                                            	<td><?= $no_video?></td>
                                                <td><?= $r_video['d_video_nm']?></td>
                                                <td>
                                                <?php if( $r_video['d_video_link'] != ''){ ?>
                                                	<iframe title="YouTube video player" class="youtube-player" 
                                             		   type="text/html" 
														width="400" height="244" src="http://www.youtube.com/embed/<?= $r_video['d_video_link']?>"
														frameborder="0" allowFullScreen>
                                                    
                                              	   </iframe>
                                                <?php } ?>
                                                </td>
                                              
                                                 <td style="text-align:center;">

                                                    <a href="entry_donation.php?page=form_video&v_id=<?= $r_video['d_video_id']?>&id=<?= $_GET['id']?>&type=<?=$type?>" class="btn btn-default" ><i class="fa fa-pencil"></i></a>
                                                    <a href="javascript:void(0)" onclick="confirm_delete(<?= $r_video['d_video_id']; ?>,'entry_donation.php?page=delete_video&id=<?= $_GET['id'] ?>&type=<?=$type?>&v_id=')" class="btn btn-default" ><i class="fa fa-trash-o"></i></a>

                                                </td> 
                                            </tr>
                                            <?php
											$no_foto++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <td colspan="4"><a href="entry_donation.php?page=form_video&id=<?= $_GET['id']?>&type=<?=$type?>" class="btn btn-success " >Add Video</a></td>
                                               
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
              