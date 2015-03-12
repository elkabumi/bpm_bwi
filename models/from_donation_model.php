<?php

function select(){
	$query = mysql_query("SELECT * FROM m_don_from  
							 ORDER BY m_don_f_nm");
	return $query;
}

function read_id($id){
	$query = mysql_query("SELECT * FROM m_don_from  WHERE   m_don_f_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into m_don_from values(".$data.")");
	
}

function update($data, $id){
	mysql_query("update m_don_from set ".$data." where m_don_f_id = '$id'");
}

function delete($id){
	mysql_query("delete from m_don_from  where m_don_f_id = '$id'");
}


?>