<?php

function select_kec(){
	/*if($_SESSION['user_grade_id']  = '1'){
		$where =  "AND m_loct_id ='".$_SESSION['user_loct_id']."'";
	}else if($_SESSION['user_grade_id']  = '999'){
		$where =  "";
	}*/
	$query = mysql_query("SELECT * FROM m_location where loct_t_id = '1'");
	return $query;
}

function get_nominal_bantuan($id){
	$query = mysql_query("SELECT SUM(a.d_don_nominal)AS nominal_bantaun
								FROM  d_donation a 
						LEFT 	JOIN   m_location b ON a.m_loct_id = b.m_loct_id
						where  m_loct_parent_id= '".$id."' ");
	$row=mysql_fetch_array($query);
	return $row['0'];
}

function get_jml_bantuan($id){
	$query = mysql_query("SELECT COUNT(a.d_don_id)AS nominal_bantaun
								FROM  d_donation a 
						LEFT 	JOIN   m_location b ON a.m_loct_id = b.m_loct_id
						where  m_loct_parent_id= '".$id."' ");
	$row=mysql_fetch_array($query);
	return $row['0'];
}
?>