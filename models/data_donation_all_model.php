<?php
function select($tahap,$tahun,$bulan){
	if($_SESSION['user_grade_id']  == '999'){
		$where='';
	}else{
		$where = "AND b.m_loct_id = '".$_SESSION['user_grade_id']."'";
	}
	if($tahap == '1'){
		$where_2 = "AND d_don_prog BETWEEN 100 AND 100 ";
	}else if($tahap == '2'){ 
		$where_2 = "AND d_don_prog BETWEEN 60 AND 99 ";
	}else{
		$where_2 = "AND d_don_prog BETWEEN 0 AND 59 ";
	}
	$where_3 ="AND  YEAR(a.d_don_implementation ) = ".$tahun." AND MONTH(a.d_don_implementation ) = ".$bulan."  ";
	$query = mysql_query("SELECT a.*, b.*, c.*,d.m_loct_nm AS nm_kec 
							FROM d_donation a
							JOIN m_location b ON a.m_loct_id = b.m_loct_id
							LEFT JOIN m_activity c ON c.m_activity_id = a.m_activity_id
							JOIN m_location d ON b.m_loct_parent_id = d.m_loct_id
							WHERE a.d_don_id <> 0 ".$where." ".$where_2."".$where_3."
						");
	return $query;
}
function count_data($tahap,$tahun,$bulan){
	if($_SESSION['user_grade_id']  == '999'){
		$where='';
	}else{
		$where = "AND b.m_loct_id = '".$_SESSION['user_grade_id']."'";
	}
	if($tahap == '1'){
		$where_2 = "AND d_don_prog BETWEEN 100 AND 100 ";
	}else if($tahap == '2'){
		$where_2 = "AND d_don_prog BETWEEN 60 AND 99 ";
	}else{
		$where_2 = "AND d_don_prog BETWEEN 0 AND 59 ";
	}
	$where_3 ="AND  YEAR(a.d_don_implementation ) = ".$tahun." AND MONTH(a.d_don_implementation ) = ".$bulan."  ";
	
	$query = mysql_query("SELECT COUNT(a.d_don_id) AS jml
							FROM d_donation a
							JOIN m_location b ON a.m_loct_id = b.m_loct_id
							LEFT JOIN m_activity c ON c.m_activity_id = a.m_activity_id
							JOIN m_location d ON b.m_loct_parent_id = d.m_loct_id
							WHERE a.d_don_id <> 0 ".$where." ".$where_2."".$where_3."
						");
	$row=mysql_fetch_object($query);
	return $row->jml;
}
?>