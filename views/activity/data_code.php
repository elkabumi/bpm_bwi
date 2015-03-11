<?php			  
	include'../../lib/config.php';
	include'../../lib/function.php';
	$kec_id 	 = $_GET['kec_id'];	

?>
<?php
	$q_code_kec = mysql_query("select m_loct_code FROM m_location WHERE m_loct_id = '".$kec_id ."'");
	$r_code_kec = mysql_fetch_array($q_code_kec);
	//ambil tujuh digit code dari depan
	$cut_code_kec=substr($r_code_kec['m_loct_code'],0,7);
	$urut_code_desa=get_village_code();
	
	$code_desa = $cut_code_kec.$urut_code_desa;
?>

	<div class="form-group">
     <label>Code</label>
         <input required type="text" name="i_code" class="form-control" placeholder="Masukkan Code ..." value="<?=$code_desa ?>"/>
    </div>                                   

                                  
               