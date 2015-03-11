<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/data_donation_all_model.php';

$page = null;
if($_SESSION['user_grade_id']  == '999'){
	$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
}else{
	$page = (isset($_GET['page'])) ? $_GET['page'] : "list_desa";
}

$_SESSION['menu_active'] = 3;

switch ($page) {
	case 'list'://list_desa
		get_header();
		
		$action ="data_donation_all.php?page=form_result";
		
		$year_now= date('Y');
	
		if(isset($_GET['preview'])){
				
				$i_month = get_isset($_GET['month']);
				$i_year = get_isset($_GET['year']);
				
				$nama_bulan = nm_bulan($i_month);
				
				
				$query 	= select(1,$i_year,$i_month); ;//tahap Selesai
				$total_data = count_data(1,$i_year,$i_month); 
				$query2 = select(2,$i_year,$i_month);//tahap sdg berjalan
				$total_data2 = count_data(2,$i_year,$i_month); 
				$query3 = select(3,$i_year,$i_month);//tahap baru berjalan
				$total_data3 = count_data(3,$i_year,$i_month); 
				
		}else{
				$nama_bulan = nm_bulan($i_month);
				$i_year= date('Y');
				$i_month= date('m');
				
				$query 	= select(1,$i_year,$i_month); ;//tahap Selesai
				$total_data = count_data(1,$i_year,$i_month); 
				$query2 = select(2,$i_year,$i_month);//tahap sdg berjalan
				$total_data2 = count_data(2,$i_year,$i_month); 
				$query3 = select(3,$i_year,$i_month);//tahap baru berjalan
				$total_data3 = count_data(3,$i_year,$i_month); 
		}
		$download = "data_donation_all.php?page=report&type=1&year=".$i_year."&month=".$i_month."";
		$download_2 = "data_donation_all.php?page=report&type=2&year=".$i_year."&month=".$i_month."";
		$download_3 = "data_donation_all.php?page=report&type=3&year=".$i_year."&month=".$i_month."";
		$title = ucfirst("Data Kegiatan Bantuan Keseluruhan Bulan ".$nama_bulan." ".$i_year."");
		
		include '../views/data_donation_all/form.php';	
		include '../views/data_donation_all/list_detail.php';
		include '../views/data_donation_all/list_detail2.php';
		include '../views/data_donation_all/list_detail3.php';
		get_footer();
	break;

	
	case 'form_result':
			
			//if(isset($_GET['preview'])){
				$i_month = (isset($_POST['i_month'])) ? $_POST['i_month'] : null;
				$i_year = (isset($_POST['i_year'])) ? $_POST['i_year'] : null;
				
			//}
			
			header("Location: data_donation_all.php?page=list&preview=1&month=$i_month&year=$i_year");
	break;
	case 'report':
		
			$type = (isset($_GET['type'])) ? $_GET['type'] : null;
			$year = (isset($_GET['year'])) ? $_GET['year'] : null;
			$month = (isset($_GET['month'])) ? $_GET['month'] : null;
			switch($type)
			{
			case '1': 	$progress="100%(Selesai)"; break;
			case '2':	$progress="60-99%%(Sedang Berjalan)"; break;
			case '3':	$progress="0-59%%(Baru Berjalan)"; break;
			}
			$nama_bulan = nm_bulan($month);
			$query 	= select(1,$year,$month); 
			include '../views/report/data_donation_all.php';	
			
		//header("Location: data_donation_all.php?page=list&preview=1&month=$i_month&year=$i_year");
	break;

}
?>