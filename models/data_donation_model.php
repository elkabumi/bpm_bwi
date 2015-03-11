<?php
function select_kec(){
	if($_SESSION['user_grade_id']  == '999'){
		$where='';
	}else{
		$where = "AND m_loct_id = '".$_SESSION['user_grade_id']."'";
	}
	$query = mysql_query("SELECT * FROM 
							m_location WHERE  loct_t_id = '1'
							".$where."
						");
	
	return $query;
}
function select_ds($id_kec){
	$query = mysql_query("SELECT * FROM 
							m_location WHERE  m_loct_parent_id = '".$id_kec."' AND loct_t_id ='2'
						");
	
	return $query;
}

function get_data_loct($id){
	$query = mysql_query("SELECT  * FROM 
							m_location WHERE   	m_loct_id = '".$id."'
						");
	$row=mysql_fetch_object($query);
	
	return $row;
}
function get_jml_bantuan($id,$type){
	if($type == '1'){
		$where ="WHERE b.m_loct_parent_id ='".$id."'";
	}else if($type == '2'){
		$where ="WHERE b.m_loct_id ='".$id."'";
	}
	$query = mysql_query("SELECT COUNT(a.d_don_id) AS jml_bantuan
							FROM d_donation a 
							JOIN m_location b ON  a.m_loct_id =  b.m_loct_id
							".$where."
						");
	$row=mysql_fetch_object($query);
	return $row->jml_bantuan;
}
function get_nominal_bantuan($id,$type){
	if($type == '1'){
		$where ="WHERE b.m_loct_parent_id ='".$id."'";
	}else if($type == '2'){
		$where ="WHERE b.m_loct_id ='".$id."'";
	}
	$query = mysql_query("SELECT SUM(a.d_don_nominal) AS jml_bantuan
							FROM d_donation a 
							JOIN m_location b ON  a.m_loct_id =  b.m_loct_id
							".$where."
						");
	$row=mysql_fetch_object($query);
	return $row->jml_bantuan;
}

function select_detail($loct_id){
	$query = mysql_query("SELECT a.*, b.*, c.* 
							FROM d_donation a
							JOIN m_location b ON a.m_loct_id = b.m_loct_id
							JOIN m_activity c ON c.m_activity_id = a.m_activity_id
							WHERE a.d_don_id <> 0 AND a.m_loct_id = ".$loct_id."
						");
	return $query;
}
function read_detail_id($id){
	$query = mysql_query("SELECT * FROM d_donation WHERE  d_don_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}
function read_video_id($id){
	$query = mysql_query("SELECT * FROM d_video WHERE  d_video_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function read_photo_id($id){
	$query = mysql_query("SELECT * FROM d_photo WHERE  d_photo_id  = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}
function select_foto_donation($id){
	$query = mysql_query("select * from  d_photo where d_don_id = ".$id." order by d_photo_id");
	return $query;
}
function select_video_donation($id){
	$query = mysql_query("select * from  d_video where d_don_id = ".$id." order by d_video_id");
	return $query;
}
function update($data, $id){
	mysql_query("update d_donation set ".$data." where d_don_id = '$id'");
}
function get_id_desa($id){
	$q=mysql_query("SELECT  m_loct_id  FROM d_donation WHERE  	d_don_id = ".$id."");
	$r=mysql_fetch_object($q);
	
	return $r->m_loct_id;
}
?>