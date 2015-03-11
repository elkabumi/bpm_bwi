 <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="image" style="text-align:center; margin-bottom:10px; margin-top:10px;">
                        	<?php
                             $user_data = get_user_data();
							if($user_data[2]==""){
								$img = "../img/user/default.jpg";
							}else{
								$img = "../img/user/".$user_data[2];
							}
							?>
                            <img src="<?= $img ?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="success" style="text-align:center;">
                            <p style="color:#a0acbf; ">
                                        <?php
                                       
                                        echo "Welcome, ".$user_data[0];
                                        ?>
                                </p>

                            <a style="color:#a0acbf;  "><?= $user_data[1]?></a><br />
                            <a style="color:#a0acbf;  "><?= $user_data[3]?> <?= $user_data[4]?></a>
                        </div>
                    </div>
                   
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                   <?php //if(isset($_SESSION['menu_active'])) { echo $_SESSION['menu_active']; }?>
                    <ul class="sidebar-menu">
                     
                          <li class="treeview <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 1){ echo "active"; }?>">
                            <a href="#">
                                <i class="fa fa-list-alt"></i>
                                <span>Master </span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="sub_district.php?page=list"><i class="fa fa-chevron-circle-right"></i>Kecamatan</a></li>
                                 
                                <li><a href="village.php?page=list"><i class="fa fa-chevron-circle-right"></i>Kelurahan</a></li>
                                 
                                <li><a href="activity.php?page=list"><i class="fa fa-chevron-circle-right"></i>Jenis Kegiatan</a></li>
                                
                                <li><a href="unit.php?page=list"><i class="fa fa-chevron-circle-right"></i>Satuan</a></li>
                             </ul>
                  </li>
                                
                  
                    <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 2){ echo "class='active'"; } ?>>
                            <a href="entry_donation.php">
                                <i class="fa fa-user"></i>
                                <span>Entry Bantuan</span>
                               
                            </a>
                          
                 		 </li>
                      <li class="treeview <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 3){ echo "active"; }?>">
                           <a href="#">
                                <i class="fa fa-list-alt"></i>
                                <span>Data Bantuan </span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="data_donation.php?page=list"><i class="fa fa-chevron-circle-right"></i>Data Bantuan Kecamatan</a></li>
								<li><a href="data_donation_all.php?page=list"><i class="fa fa-chevron-circle-right"></i>Data Bantuan Keseluruhan</a></li>
             				
                             </ul>
                 
                       </li>
  
                       <li class="treeview <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 4){ echo "active"; }?>">
                            <a href="#">
                                <i class="fa fa-list-alt"></i>
                                <span>Evaluasi Data Bantuan </span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="grafik_donation.php?page=list"><i class="fa fa-chevron-circle-right"></i>Grafik Data Bantuan</a></li>
								<li><a href="grafik_type_donation.php?page=list"><i class="fa fa-chevron-circle-right"></i>Grafik Jenis Kegiatan Tiap Kecamatan</a></li>
             					<li><a href="grafik_kec_donation.php?page=list"><i class="fa fa-chevron-circle-right"></i>Grafik Kecamatan Tiap Jenis Kegiatan</a></li>
             				
                             </ul>
                  </li>
                      
                
                        
                    <?php
                    if($_SESSION['user_type_id'] == 1){
					?>
                 
                  
                  <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 8){ echo "class='active'"; } ?>>
                            <a href="user.php">
                                <i class="fa fa-users"></i>
                                <span>User</span>
                               
                            </a>
                            
                  </li>
                 <?php
					}
				 ?>
              
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>