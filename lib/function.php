<?php


function get_sub_district_code(){
	//$code_kab = 351;//35i untuk kab banyuwangi
	$query = mysql_query("select counter_subdistrict_code from counter");
	$result = mysql_fetch_array($query);
	$code = ($result['counter_subdistrict_code']) ? $result['counter_subdistrict_code'] + 1 : 1;
	
	if(strlen($code) == 1){
		$code = "00".$code;
	}else if(strlen($code) == 2){
		$code = "0".$code;
	}else if(strlen($code) == 3){
		$code = $code;
	}
	
	return $code;
}
function edit_sub_district_code(){
	mysql_query("update counter set counter_subdistrict_code = counter_subdistrict_code + 1");
}
function get_donation_no(){

	$query = mysql_query("select counter_donation_no  from counter");
	$result = mysql_fetch_array($query);
	$code = ($result['counter_donation_no']) ? $result['counter_donation_no'] + 1 : 1;
	$year = date('Y');
	if(strlen($code) == 1){
		$code = "0000".$code;
	}else if(strlen($code) == 2){
		$code = "000".$code;
	}else if(strlen($code) == 3){
		$code = "00".$code;
	}else if(strlen($code) == 4){
		$code = "0".$code;
	}
	
	return $year."-".$code;
}
function edit_donation_no(){
	mysql_query("update counter set counter_donation_no = counter_donation_no + 1");
}
function get_village_code(){
	
	$query = mysql_query("select counter_village_code  from counter");
	$result = mysql_fetch_array($query);
	$code = ($result['counter_village_code']) ? $result['counter_village_code'] + 1 : 1;
	
	if(strlen($code) == 1){
		$code = "00".$code;
	}else if(strlen($code) == 2){
		$code = "0".$code;
	}else if(strlen($code) == 3){
		$code = $code;
	}
	
	return $code;
}
function edit_village_code(){
	mysql_query("update counter set counter_village_code = counter_village_code + 1");
}
function format_rupiah($angka){
  $rupiah=number_format($angka,0,',','.');
  return $rupiah;
}
function get_event_code(){
	$query = mysql_query("select event_code from config");
	$row = mysql_fetch_object($query);
	$result = $row->event_code + 1;
	return $result;
}
function new_date(){
	$new_date = date("Y-m-d H:m:s");
	return $new_date;
}

function get_header($title = ""){
	include '../views/layout/header.php';
}

function get_footer(){
	include '../views/layout/footer.php';
}

function get_isset($data){
	$result = (isset($data)) ? $data : null;
	return $result;
}

function format_date($date){
	if($date == "0000-00-00"){
		return "-";
	}else{
		$date = explode("-", $date);
		$new_date = $date[2]."/".$date[1]."/".$date[0];
	
		return $new_date;
	}

}
function get_hour($data){
	$data = explode(" ", $data);
	$hour = $data[1];
	$h = explode(":", $hour);
	$new_hour = $h[0].":".$h[1];
	return $new_hour;
}
function format_back_date($date){

	$date = explode("/", $date);
	$back_date =  $date[2]."-".$date[1]."-".$date[0];

	return $back_date;

}
function format_back_date2($date){

	$date = explode("/", $date);
	if($date[0] < 10){
		$date[0] = '0'.$date[0];
	}

	if($date[1] < 10){
		$date[1] = '0'.$date[1];
	}
	$back_date =  $date[2]."-".$date[0]."-".$date[1];

	return $back_date;

}
function format_back_date3($date){

	$date = explode("-", $date);
	$back_date =  $date[2]."-".$date[1]."-".$date[0];

	return $back_date;

}
function format_back_date4($date){

	$date = explode("-", $date);
	$back_date =  $date[2]."/".$date[1]."/".$date[0];

	return $back_date;

}
function format_back_date_upload($date){

	$date = explode("/", $date);
	$back_date =  $date[2]."-".$date[0]."-".$date[1];

	return $back_date;

}

function cek_type_file($tipe_file){
	   $hasil = 0; //false 
	   $tipe  = $tipe_file;
	   if (($tipe == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") or ($tipe == "application/vnd.ms-excel") ) {
		  $hasil = 1; //true
	   }
	   
	   return $hasil;
}
function format_date_xl($date_xl){
	$month=array('Jan'=>'01','Feb'=>'02','Mar'=>'03','Apr'=>'04','May'=>'05','Jun'=>'06','Jul'=>'07','Aug'=>'08','Sep'=>'09','Oct'=>'10','Nov'=>'11','Dec'=>'12');
	$date_xl = explode("-", $date_xl);
	$back_date =  $date_xl[2]."-".$month[$date_xl[1]]."-".$date_xl[0];
	
	return $back_date;
}

function get_user_data(){
	$query_user = mysql_query("SELECT a.*, b.loct_t_nm, c.m_loct_nm FROM 
								users a
							
							LEFT JOIN location_t b ON  a.user_grade_id = b.loct_t_id
							LEFT JOIN m_location c ON a.user_loct_id = c.m_loct_id 
						 where a.user_id = '".$_SESSION['user_id']."'");
	$row_user = mysql_fetch_object($query_user);

	$name = ucfirst($row_user->user_name);

	switch($row_user->user_type_id){
		case 1: $type = "Admin"; break;
		case 2: $type = "Supervisor "; break;
		case 3: $type = "Pengguna"; break;
	}
	
	$user_img = $row_user->user_img;
	$user_grade = $row_user->loct_t_nm;	
	$user_loct = $row_user->m_loct_nm;	
	
	return array($name, $type, $user_img,$user_grade,$user_loct);
}

function create_report($title) {
				$format =			header("Pragma: public");
									header("Expires: 0");
									header("Cache-Control : must-revalidate, post-check=0, pre-check=0");
									header("Content-type: application/force-download");
								    header("Content-type: application/octet-stream");
									header("Content-type: application/download");
								    header("Content-Disposition: attachment; filename=$title.xls");
								    header("Content-transfer-encoding: binary");
									
return $format;
}

function tool_format_number($data){
	$data = number_format($data, 0);
	$data = "<div style='text-align:right'>".$data."</div>";
	return $data;
}
function tool_format_number_report($data){
	$data = number_format($data, 2);
	$data = "<div style='text-align:right; font-size:26px;'>".$data."</div>";
	return $data;
}
function format_report($data){
	$data = "<div style='text-align:right; font-size:26px;'>".$data."</div>";
	return $data;
}

function show_message($message, $link){
	?>
    <script type="text/javascript">
    alert("<?= $message ?>");
	window.location = "<?= $link ?>";
    </script>
    <?php
	
}
function valid_code($code){
		if(strlen($code) == 1){
			$code= "00".$code;
		}else if(strlen($code) == 2){
			$code= "0".$code;
		}else if(strlen($code) == 3){
			$code = $code;
		}
	return $code;
}
function nm_bulan(){
	$nama_bulan=array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
	$bulan = date('m') -1;
	$get_bulan = $nama_bulan[$bulan];
	return $get_bulan;	
}
function nm_bulan_2(){
	$nama_bulan=array(1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',5=>'Mei',6=>'Juni',7=>'Juli',8=>'Agustus',9=>'September',10=>'Oktober',11=>'November',12=>'Desember');

	return $nama_bulan;	
}

?>