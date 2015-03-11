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
		
		$action =" data_donation_all.php?page=form_result";
		
		$year_now= date('Y');
		if(isset($_GET['preview'])){
				
				$i_month = get_isset($_GET['month']);
				$i_year = get_isset($_GET['year']);
				
				$nama_bulan = nm_bulan();
				
				
				$query 	= select(1,$i_year,$i_month); ;//tahap Selesai
				$total_data = count_data(1,$i_year,$i_month); 
				$query2 = select(2,$i_year,$i_month);//tahap sdg berjalan
				$total_data2 = count_data(2,$i_year,$i_month); 
				$query3 = select(3,$i_year,$i_month);//tahap baru berjalan
				$total_data3 = count_data(3,$i_year,$i_month); 
				
		}else{
				$nama_bulan = nm_bulan();
				$i_year= date('Y');
				$i_month= date('m');
				
				$query 	= select(1,$i_year,$i_month); ;//tahap Selesai
				$total_data = count_data(1,$i_year,$i_month); 
				$query2 = select(2,$i_year,$i_month);//tahap sdg berjalan
				$total_data2 = count_data(2,$i_year,$i_month); 
				$query3 = select(3,$i_year,$i_month);//tahap baru berjalan
				$total_data3 = count_data(3,$i_year,$i_month); 
		}
		$title = ucfirst("Data Kegiatan Bantuan Keseluruhan Bulan ".$i_bulan." ".$i_year."");
		
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
	

}
?>