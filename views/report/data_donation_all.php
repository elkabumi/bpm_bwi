<?php 
$content_pdf = '';
$content_pdf .= '
<table widtd="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" size="24" widtd="100%">Data Bantuan Keseluruhan Bulan '.$nama_bulan.'  Progress '.$progress.'</td>
  </tr>
  <tr>
    <td align="center" size=18 ></td>
  </tr>
</table>
<table widtd="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
   <td>No <br />Urut</td>
                                                    <td>Nama Kec</td>
                                                	<td>Nama Desa</td>
                                                  	<td>Jenis<br /> Kegiatan/Bantuan</td>
                                                  	<td>Thn <br />Anggaran</td> 
                                                    <td>Nama Penerima Bantuan</td>
                                                    <td>Jumlah<br /> Nominal Bantuan</td>
                                                    <td>Progress<br />Bantuan</td>
                                                    
  </tr>';
  ?>
  <?php
  $content_pdf .= '
	 <tr>
   <td>No <br />Urut</td>
                                                    <td>Nama Kec</td>
                                                	<td>Nama Desa</td>
                                                  	<td>Jenis<br /> Kegiatan/Bantuan</td>
                                                  	<td>Thn <br />Anggaran</td> 
                                                    <td>Nama Penerima Bantuan</td>
                                                    <td>Jumlah<br /> Nominal Bantuan</td>
                                                    <td>Progress<br />Bantuan</td>
                                                    
  </tr>
</table>
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
									
									

