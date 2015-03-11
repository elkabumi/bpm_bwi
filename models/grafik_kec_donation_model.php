<?php

function select_kec(){
	$query = mysql_query("SELECT * FROM m_location where loct_t_id = '1' ");
	return $query;
}
function select_type_keg(){
	$query = mysql_query("SELECT * FROM m_activity ");
	return $query;
}


function get_jml_keg($kec_id,$actv_id){
	$query = mysql_query("SELECT COUNT(a.d_don_id)AS jml_kegiatan
								FROM  d_donation a 
						LEFT 	JOIN   m_location b ON a.m_loct_id = b.m_loct_id
						where  m_loct_parent_id= '".$kec_id."' AND m_activity_id= '".$actv_id."' ");
	$row=mysql_fetch_array($query);
	return $row['0'];
}
function get_nominal_keg($kec_id,$actv_id){
	$query = mysql_query("SELECT SUM(a.d_don_nominal)AS nominal_kegiatan
								FROM  d_donation a 
						LEFT 	JOIN   m_location b ON a.m_loct_id = b.m_loct_id
						where  m_loct_parent_id= '".$kec_id."' AND m_activity_id= '".$actv_id."' ");
	$row=mysql_fetch_array($query);
	return $row['0'];
}
?>