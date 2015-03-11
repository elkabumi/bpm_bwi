<?php

function select(){
	$query = mysql_query("SELECT * FROM m_activity  WHERE m_activity_id <> '999'
							 ORDER BY m_activity_nm");
	return $query;
}

function read_id($id){
	$query = mysql_query("SELECT * FROM m_activity  WHERE m_activity_id <> '0' AND  m_activity_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into m_activity values(".$data.")");
	
}

function update($data, $id){
	mysql_query("update m_activity set ".$data." where m_activity_id = '$id'");
}

function delete($id){
	mysql_query("delete from m_activity  where m_activity_id = '$id'");
}


?>