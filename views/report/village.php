<?php 
$content_pdf = '';
$content_pdf .= '
<table widtd="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" size=24>Kelurahan / Desa</td>
  </tr>
  
  <tr>
    <td align="center" size=18 ></td>
  </tr>
</table>';
$content_pdf .= ' <table border="1" cellpadding="0" cellpadding="0">
                                        <tdead>
                                            <tr>
                                            <td widtd="5%">No</td>
                                            <td width="5%">Kode Kelurahan</td>
                                            <td width="10%">Nama Kelurahan</td>
                                            <td width="20%">Nama Kecamatan</td>
                                            <td width="30%">Keterangan</td>
                                            </tr>';
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
									
									

