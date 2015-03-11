<?php			  
	include'../../lib/config.php';
	include'../../lib/function.php';
	$kec_id 	 = $_GET['kec_id'];	

?>
<?php
	$q_code_kec = mysql_query("select Substring(m_loct_code,5,3) AS kode_kec FROM m_location WHERE m_loct_id = '".$kec_id ."'");
	$r_code_kec = mysql_fetch_array($q_code_kec);

?>

	<div class="form-group">
     <label>&nbsp;</label>
         <input required readonly="readonly" type="text" name="i_kec_cod" class="form-control" placeholder="Masukkan Code ..." value="<?=$r_code_kec['0'] ?>"/>
    </div>                                   

                                  
               