
	<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        data: {
            table: document.getElementById('charttable')
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Data extracted from a HTML table in the page'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Units'
            }
        },
        tooltip: {
            formatter: function() {
                return '<b>'+ this.series.name +'</b><br/>'+
                    this.point.y +' '+ this.point.name.toLowerCase();
            }
        }
    });
});

		</script>
	

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<table id="charttable" style="display:none">
	<thead>
		<tr>
		
				<td>3</td>
			<td>4</td>
            <td>3</td>
			<td>4</td>
            <td>3</td>
			<td>4</td>
		</tr>
	</thead>
	<tbody>
		<tr>
	
			<td>3</td>
			<td>4</td>
            <td>3</td>
			<td>4</td>
            <td>3</td>
			<td>4</td>
		</tr>

	</tbody>
</table>
