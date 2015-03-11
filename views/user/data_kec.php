<?php			  
	include'../../lib/config.php';
	include'../../lib/function.php';
	$grade_id 	 = $_GET['grade_id'];	

?>

<?php
	if($grade_id == '1'){
?>
<div class="form-group">
   <label>Kecamatan</label>
	 <select id="basic" name="i_kec" class="selectpicker show-tick form-control" data-live-search="true" >                                     	
<?php
        $q=mysql_query("SELECT * FROM m_location WHERE loct_t_id = '1'");
		while($r=mysql_fetch_object($q)){
?>
		<option value="<?=$r->m_loct_id?>"><?=$r->m_loct_nm?></option>
<?php
		}
?>
        </select>   
</div>  
<?php
	}
?>

                                  
               