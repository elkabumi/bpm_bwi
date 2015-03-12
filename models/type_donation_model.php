<?php

function select(){
	$query = mysql_query("SELECT * FROM m_don_t 
							 ORDER BY m_don_t_nm");
	return $query;
}

function read_id($id){
	$query = mysql_query("SELECT * FROM m_don_t  WHERE m_don_t_id <> '0' AND  m_don_t_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into m_don_t values(".$data.")");
	
}

function update($data, $id){
	mysql_query("update m_don_t set ".$data." where m_don_t_id = '$id'");
}

function delete($id){
	mysql_query("delete from m_don_t  where m_don_t_id = '$id'");
}


?>