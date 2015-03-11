
<section class="content">
	<div class="row">
		<div class="col-md-12">
            <div class="title_page"> <?= $title ?></div>
			<?php
				$query_keg =	select_type_keg();
				$no = 1;
				while($row_keg=mysql_fetch_object($query_keg)){
			
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
                            text: 'Data Kecamatan Di Kegiatan <b><?=$row_keg->m_activity_nm?></b>'
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
									$query_kec =	select_kec();
									while($row_kec=mysql_fetch_object($query_kec)){
										$jml_kec =get_jml_keg($row_kec->m_loct_id,$row_keg->m_activity_id)
								?>
									
                                  		  ['<?= $row_kec->m_loct_nm ?> (<?=$jml_kec?> Kegiatan)',<?=$jml_kec?>],
                                <?php
									}
								?>
                            ]
                        }]
                    });
                });
                
            });
                    </script>

  <div class="col-md-12">
           		<div class="box box-danger">
              		<div id="container<?=$no?>"></div>
              	</div>
              
           	</div>
         
         <?php    
			$no++;	}
		?>
         </div>
       </div>
	
</section>

  <script src="../js/highcharts.js"></script>