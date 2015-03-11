<?php

function select(){
	$query = mysql_query("select *
						 from m_location where loct_t_id = '1' order by m_loct_code");
	return $query;
}

function read_id($id){
	$query = mysql_query("select *,
								left(m_loct_code, 4) AS kode_kab,
								Substring(m_loct_code,5,3) AS kode_kec,
								right(m_loct_code, 3) AS kode_desa
							 from m_location 
							where m_loct_id = '$id'");
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

function count_code_kec($code){ 
	$query = mysql_query("select COUNT(m_loct_code) AS jml_code
							 from m_location 
							where m_loct_code = ".$code." AND loct_t_id = '1' ");
	$row = mysql_fetch_object($query);
	return $row->jml_code;
}
function get_code_kec($id){ 
	$query = mysql_query("select m_loct_code 
							 from m_location 
							where   	m_loct_id = '".$id."' ");
	$row = mysql_fetch_object($query);
	return $row->m_loct_code;
}
function update_code_desa($kec_id,$kec_code){ 
	$query = mysql_query("SELECT m_loct_id,
								right(m_loct_code, 3) AS kode_desa
							from m_location 
							where m_loct_parent_id = '".$kec_id."' ");
	while($row = mysql_fetch_object($query)){
			mysql_query("UPDATE m_location SET m_loct_code = ".$kec_code."".$row->kode_desa." 
											WHERE m_loct_id =".$row->m_loct_id."");
	}
	
}
?>