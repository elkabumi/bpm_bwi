
<script type="text/javascript">
$(function () {
        $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Grafik Jumlah Nominal Bantuan Tiap Kecamatan'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                type: 'category',
                labels: {
                    rotation: -45,
                    align: 'right',
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Nominal Bantuan (Rp)'
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: 'Jumlah Nominal Bantaun: <b>Rp.{point.y:.1f}</b>',
            },
            series: [{
                name: 'Population',
                color: '#2ECC71',
				data: [
				<?php
					$query = select_kec();
					while($row=mysql_fetch_object($query)){
						
						$jml_nominal_bantuan = (get_nominal_bantuan($row->m_loct_id)) ? get_nominal_bantuan($row->m_loct_id) : "0";
				?>
				 		['<?=$row->m_loct_nm ?>', <?=$jml_nominal_bantuan?>],
				<?php
					}
				?>
                   
                  
                ],
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    align: 'right',
                    x: 4,
                    y: 10,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif',
                        textShadow: '0 0 3px black'
                    }
                }
            }]
        });
    });
    

		</script>
		<script type="text/javascript">
		$(function () {
        $('#container2').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Grafik Jumlah Bantuan Tiap Kecamatan'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                type: 'category',
                labels: {
                    rotation: -45,
                    align: 'right',
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Bantuan '
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: 'Jumlah Bantaun: <b>{point.y:.1f}</b>',
            },
            series: [{
                name: 'Population',
               
			    data: [
				<?php
					$query = select_kec();
					while($row=mysql_fetch_object($query)){
						
						$jml_bantuan = (get_jml_bantuan($row->m_loct_id)) ? get_jml_bantuan($row->m_loct_id) : "0";
				?>
				 		['<?=$row->m_loct_nm ?>', <?=$jml_bantuan?>],
				<?php
					}
				?>
                   
                  
                ],
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    align: 'right',
                    x: 4,
                    y: 10,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif',
                        textShadow: '0 0 3px black'
                    }
                }
            }]
        });
    });
    

		</script>

<section class="content">
	<div class="row">
		<div class="col-md-12">
            <div class="title_page"> <?= $title ?></div>
            <div class="box box-danger">
              <div id="container"></div>
            </div>
        </div>
	</div>
    <div class="row">
		<div class="col-md-12">
            
            <div class="box box-danger">
              <div id="container2"></div>
            </div>
        </div>
	</div>
</section>

        <script src="../js/highcharts.js"></script>
      
