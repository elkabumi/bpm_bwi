<?php 
$content_pdf = '';
$content_pdf .= '
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" size=24>Data Bantuan Desa '.$row_loct->m_loct_nm.'</td>
  </tr>
  <tr>
    <td align="center" size=20>Tanggal '.$date.'<br></td>
  </tr>
  
</table>';
$content_pdf .= '
<table widtd="100%" border="1" cellpadding="4" cellspacing="0" >
<tr bgcolor="#dddddd"  >
   <td style=bold size="14">No <br />Urut</td>
                                                    <td style=bold size="14">Nama Kec</td>
                                                	<td style=bold size="14">Nama Desa</td>
                                                  	<td style=bold size="14">Jenis<br /> Kegiatan/Bantuan</td>
                                                  	<td style=bold size="14" >Thn <br />Anggaran</td> 
                                                    <td style=bold size="14">Nama Penerima Bantuan</td>
                                                    <td style=bold size="14" >Jumlah<br /> Nominal Bantuan</td>
                                                    <td style=bold size="14">Progress<br />Bantuan</td>
                                                    
  </tr>';
	while($row=mysql_fetch_object($query)){
  	$content_pdf .= '
	<tr>
  													<td>&nbsp;&nbsp;'.$row->d_don_no.'&nbsp;&nbsp;</td>
                                                    <td>&nbsp;&nbsp;'.$row->nama_kec.'&nbsp;&nbsp;</td>
                                                	<td>&nbsp;'.$row->m_loct_nm.'&nbsp;</td>
                                                  	<td>&nbsp;'.$row->m_activity_nm.'&nbsp;</td>
                                                  	<td>&nbsp;'.$row->d_don_year.'&nbsp;</td>
                                                    <td>&nbsp;'.$row->d_don_nm.'&nbsp;</td>
                                                    <td>&nbsp;'.$row->d_don_nominal.'&nbsp;</td>
                                                   	<td>&nbsp;'.$row->d_don_prog.'%&nbsp;</td>
                                                    
  </tr>';
   }
$content_pdf .= '</table>
';
?>
<?php
			define('FPDF_FONTPATH','../lib/pdftable/font/');
			require('../lib/pdftable/lib/pdftable.inc.php');
			$p = new PDFTable();
			$p->AddPage();
		
			$p->setfont('arial','',12);
			$p->SetMargins(20,20,20);
			$p->htmltable($content_pdf);
			$p->output('Report_summary.pdf','I');									

?>
									
									

