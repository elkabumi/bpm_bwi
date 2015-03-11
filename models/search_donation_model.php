<?php
function select_search($i_cari, $i_nominal1, $i_nominal2){
	if($i_cari != ''){
		$param_1 = "AND (a.d_don_year LIKE '%".$i_cari."%' 
						OR a.d_don_nm LIKE '%".$i_cari."%' 
						OR b.m_loct_nm LIKE '%".$i_cari."%'
						OR a.d_don_no LIKE '%".$i_cari."%'
						OR c.m_activity_nm 	 LIKE '%".$i_cari."%' )";
	}else{
		$param_1 = "";
	}
	if($i_nominal1 != ''){
		$param_2 = " AND d_don_nominal > ".$i_nominal1."";
	}else{
		$param_2 = "";
	}
	if($i_nominal2 != ''){
		$param_3 = " AND d_don_nominal < ".$i_nominal2."";
	}else{
		$param_3 = "";
	}

	$query = mysql_query("SELECT a.*, b.*, c.*,d.m_loct_nm AS nama_kec
							FROM d_donation a
							JOIN m_location b ON a.m_loct_id = b.m_loct_id
							JOIN m_activity c ON c.m_activity_id = a.m_activity_id
						JOIN m_location d ON b.m_loct_parent_id = d.m_loct_id
						WHERE a.d_don_id <> 0 ".$param_1." ".$param_2." ".$param_3."
						");
	return $query;
}
?>