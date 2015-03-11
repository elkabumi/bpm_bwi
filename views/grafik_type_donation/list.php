
<section class="content">
	<div class="row">
		<div class="col-md-12">
            <div class="title_page"> <?= $title ?></div>
			<?php
				$query_kec =	select_kec();
				$no = 1;
				while($row_kec=mysql_fetch_object($query_kec)){
			
			?>
			<script type="text/javascript">
            $(function () {
                var chart;
                
                $(document).ready(function () {
                    
                    // Build the chart
                    $('#container<?=$no?>').highcharts({
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false
                        },
                        title: {
                             text: 'Jenis Kegiatan Di Kecamatan <b><?=$row_kec->m_loct_nm?></b>'
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: false
                                },
                                showInLegend: true
                            }
                        },
                        series: [{
                            type: 'pie',
                         	 name: 'Persentase',
                            data: [
                                <?php
									$query_type_keg=select_type_keg();
									while($row_type_keg=mysql_fetch_object($query_type_keg)){
											$jml_keg =get_jml_keg($row_kec->m_loct_id,$row_type_keg->m_activity_id)
								?>
									
                                  		  ['<?= $row_type_keg->m_activity_nm ?> ( <?=$jml_keg?> Kegiatan )',<?=$jml_keg?>],
                                <?php
									}
								?>
                            ]
                        }]
                    });
                });
                
            });
            </script>

			<script type="text/javascript">
            $(function () {
                var chart;
                
                $(document).ready(function () {
                    
                    // Build the chart
                    $('#container2_<?=$no?>').highcharts({
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false
                        },
                        title: {
                            text: 'Jumlah Bantuan Tiap jenis kegiatan <br>di Kecamatan <b><?=$row_kec->m_loct_nm?></b>'
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: false
                                },
                                showInLegend: true
                            }
                        },
                        series: [{
                            type: 'pie',
                            name: 'Persentase',
                            data: [
                               <?php
									$query_type_keg=select_type_keg();
									while($row_type_keg=mysql_fetch_object($query_type_keg)){
										$nominal_keg = (get_nominal_keg($row_kec->m_loct_id,$row_type_keg->m_activity_id)) ? get_nominal_keg($row_kec->m_loct_id,$row_type_keg->m_activity_id) : "0";
				
								?>
									
                                  		  ['<?= $row_type_keg->m_activity_nm ?> (Rp.<?=format_rupiah($nominal_keg)?>)',<?=$nominal_keg?>],
                                <?php
									}
								?>
                            ]
                        }]
                    });
                });
                
            });
            </script>
 
            <div class="col-md-6">
           		<div class="box box-danger">
              		<div id="container<?=$no?>"></div>
              	</div>
              
           	</div>
            
            <div class="col-md-6">
           		<div class="box box-danger">
              		<div id="container2_<?=$no?>"></div>
              	</div>
           	</div>
         <?php    
			$no++;	}
		?>
         </div>
       </div>
	
</section>
  <script src="../js/highcharts.js"></script>