<?php

function select(){
	$query = mysql_query("select a.*, b.m_loct_nm AS nm_kecamatan
							from m_location a
							JOIN m_location b ON b.m_loct_id = a.m_loct_parent_id
							where a.loct_t_id ='2'
	 order by m_loct_code");
	return $query;
}

function read_id($id){
	$query = mysql_query("select a.*,
								left(a.m_loct_code, 4) AS kode_kab,
								Substring(a.m_loct_code,5,3) AS kode_kec,
								right(a.m_loct_code, 3) AS kode_desa,
								 b.m_loct_nm AS nm_kecamatan
							from m_location a
							JOIN m_location b ON b.m_loct_id = a.m_loct_parent_id
						where a.m_loct_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into m_location values(".$data.")");
	
}

function update($data, $id){
	mysql_query("update m_location set ".$data." where m_loct_id = '$id'");
}

function delete($id){
	mysql_query("delete from m_location  where m_loct_id = '$id'");
}
function count_code_ds($code){ 
	$query = mysql_query("select COUNT(m_loct_code) AS jml_code
							 from m_location 
							where m_loct_code = ".$code." AND loct_t_id = '2' ");
	$row = mysql_fetch_object($query);
	return $row->jml_code;
}
function get_code_ds($id){ 
	$query = mysql_query("select m_loct_code 
							 from m_location 
							where   	m_loct_id = '".$id."' ");
	$row = mysql_fetch_object($query);
	return $row->m_loct_code;
}
?>