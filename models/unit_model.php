<?php

function select(){
	$query = mysql_query("SELECT * FROM m_unit
							 ORDER BY m_unit_nm");
	return $query;
}

function read_id($id){
	$query = mysql_query("SELECT * FROM m_unit WHERE   m_unit_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into m_unit values(".$data.")");
	
}

function update($data, $id){
	mysql_query("update m_unit set ".$data." where m_unit_id = '$id'");
}

function delete($id){
	mysql_query("delete from m_unit  where m_unit_id = '$id'");
}


?>