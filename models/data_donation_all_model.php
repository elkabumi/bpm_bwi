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
function select_foto_donation($id,$limit_start,$limit_end){
	$query = mysql_query("select * from  d_photo where d_don_id = ".$id." order by d_photo_id LIMIT $limit_start,$limit_end" );
	return $query;
}
function select_video_donation($id){
	$query = mysql_query("select * from  d_video where d_don_id = ".$id." order by d_video_id");
	return $query;
}
function read_id($id){
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


function get_img($id){
	$q_img = mysql_query("select d_pho_file  from d_photo where d_photo_id  = '$id'");
	$r_img = mysql_fetch_object($q_img);
	return $r_img->d_pho_file ;
}

function create($data){
	mysql_query("insert into d_donation values(".$data.")");
	
}


function create_video($data){
	mysql_query("insert into d_video values(".$data.")");
	
}
function create_foto($data){
	mysql_query("insert into d_photo values(".$data.")");
	
}
function update($data, $id){
	mysql_query("update d_donation set ".$data." where d_don_id = '$id'");
}
function update_video($data, $id){
	mysql_query("update d_video set ".$data." where d_video_id = '$id'");
}

function update_foto($data, $id){
	mysql_query("update  d_photo set ".$data." where d_photo_id = '$id'");
}

function delete_video($id){
	mysql_query("delete from d_video  where d_video_id = '$id'");
}
function delete_foto($id){
	mysql_query("delete from d_photo  where d_photo_id = '$id'");
}
function get_id_desa($id){
	$q=mysql_query("SELECT  m_loct_id  FROM d_donation WHERE  	d_don_id = ".$id."");
	$r=mysql_fetch_object($q);
	
	return $r->m_loct_id;
}
function count_foto($id){
	$q=mysql_query("SELECT  COUNT(d_photo_id)AS jml_foto  FROM d_photo WHERE d_don_id = ".$id."");
	$r=mysql_fetch_object($q);
	
	return $r->jml_foto;
}
function get_progres($id){
	$q=mysql_query("SELECT d_don_prog  FROM d_donation WHERE d_don_id = ".$id."");
	$r=mysql_fetch_object($q);
	
	return $r->d_don_prog;
}
?>