<?php

function select(){
	$query = mysql_query("select * from m_location where loct_t_id = '1' order by m_loct_code");
	return $query;
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
/*
function update($data, $id){
	mysql_query("update m_unit set ".$data." where m_unit_id = '$id'");
}*/

/*
*/


?>