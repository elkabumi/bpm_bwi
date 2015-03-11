<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/search_donation_model.php';

$page = null;

	$page = (isset($_GET['page'])) ? $_GET['page'] : "search";


$_SESSION['menu_active'] = 3;
switch ($page) {
	case 'search':
			get_header();
			$title2 = ucfirst("Search Data Bantuan");
			$id = (isset($_GET['id'])) ? $_GET['id'] : null;
			if($_SESSION['user_grade_id']  == '999'){
				
				$close_button  = "data_donation.php?page=list";
			}else{
			
				$close_button  = "data_donation.php?page=list_desa&id_kec=".$_SESSION['user_loct_id']."";
			}
			$action = "search_donation.php?page=form_result&preview=1";
			
				$i_cari = "";
				$i_nominal1 = "";
				$i_nominal2 = "";
			
			if(isset($_GET['preview'])){
				$i_cari = get_isset($_GET['cari']);
				$i_nominal1 = get_isset($_GET['nominal1']);
				$i_nominal2 = get_isset($_GET['nominal2']);
			}
			
			
			include '../views/search_donation/form.php';
			
			
			if(isset($_GET['preview'])){
			
			
				$link_search_button = "";
				$link_close_button = "";
				$link_detail= "&cari=".$i_cari."&nominal1=".$i_nominal1."&nominal2=".$i_nominal2."&type_akses=".$type_akses."";
				
				
				$i_cari = get_isset($_GET['cari']);
				$i_nominal1 = get_isset($_GET['nominal1']);
				$i_nominal2 = get_isset($_GET['nominal2']);
				
				
				$type_akses=2;//type_akses 2  dicari dari menu search
				$query_item = select_search($i_cari, $i_nominal1, $i_nominal2);
				$title = ucfirst("Data Bantuan Desa");
				include '../views/search_donation/list_detail.php';
			}
			
			
			get_footer();
		break;
		
		case 'form_result':
			
	
			$id = (isset($_GET['id'])) ? $_GET['id'] : null;
			
			//if(isset($_GET['preview'])){
				$i_cari = (isset($_POST['i_cari'])) ? $_POST['i_cari'] : null;
				$i_nominal1 = (isset($_POST['i_nominal1'])) ? $_POST['i_nominal1'] : null;
				$i_nominal2 = (isset($_POST['i_nominal2'])) ? $_POST['i_nominal2'] : null;
			//}
			
			header("Location: search_donation.php?page=search&preview=1&cari=$i_cari&nominal1=$i_nominal1&nominal2=$i_nominal2");
		break;
		}
?>