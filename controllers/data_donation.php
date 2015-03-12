<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/data_donation_model.php';

$page = null;

	if($_SESSION['user_grade_id']  == '999'){
		$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
	}else{
		$page = (isset($_GET['page'])) ? $_GET['page'] : "list_desa";
	}

	
$_SESSION['menu_active'] = 3;

switch ($page) {


	case 'list'://list_kec
		get_header();
		if($_SESSION['user_grade_id']  == '999'){
			$title = ucfirst("data kegiatan bantuan");
			
			$query = select_kec();
			$search_button = "search_donation.php?page=search";
		
			include '../views/data_donation/list_kec.php';
		}else{
			
			include '../views/layout/not_acces.php';
		}
		get_footer();
	break;
	
	
	case 'list_desa'://list_desa
		get_header();
		$search_button = "search_donation.php";
		$close_button = "data_donation.php?page=list";
		

		if($_SESSION['user_grade_id']  == '999'){
			$id_kec = (isset($_GET['id_kec'])) ? $_GET['id_kec'] : null;
			$link_close ="<a href='".$close_button."' class='btn btn-success' >Back</a>";
		}else{
			$id_kec = $_SESSION['user_loct_id'];
			$link_close = "";	
		}
		
		$row_loct = get_data_loct($id_kec); 
 		
		$title = ucfirst("Data Bantuan Kec. ".$row_loct->m_loct_nm."");
		
		$query = select_ds($id_kec);
		
		

		include '../views/data_donation/list_desa.php';
		get_footer();
	break;
	
	case 'list_detail':
		get_header();
		$id_ds = (isset($_GET['id_ds'])) ? $_GET['id_ds'] : null;
		
		$download = "data_donation.php?page=report&id_ds=".$id_ds."";
		$row_loct = get_data_loct($id_ds); 
 		$title = ucfirst("Data Bantuan Desa. ".$row_loct->m_loct_nm."");
	
		$search_button = "search_donation.php";
		$close_button  = "data_donation.php?page=list_desa&id_kec=".$row_loct->m_loct_parent_id."";
		
		$link_search_button =	"<a href='".$search_button."' class='btn btn-success'>Search Bantuan</a>";
		$link_close_button =	"<a href='".$close_button."' class='btn btn-success'>Back</a>";
		
		$query_item = select_detail($id_ds);

		
		include '../views/data_donation/list_detail.php';
		get_footer();
	
	break;
	
	case 'form_detail':
		get_header();
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		
		
		$id_ds = get_id_desa($id);;
		$close_button = "data_donation.php?page=list_detail&id_ds=".$id_ds."";
		$action = "data_donation.php?page=edit&id=".$id."&id_ds=".$id_ds."";
	
		
		$row = read_detail_id($id);
		
	
		include '../views/data_donation/form_detail.php';
		get_footer();
	break;

	case 'form_foto':
		get_header();
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$f_id = (isset($_GET['f_id'])) ? $_GET['f_id'] : null;
		
		
		$close_button = "data_donation.php?page=form_detail&id=".$id."";
	

		
		if($f_id){
			//$title = ucfirst("Form Edit Tanah Petani");

			$row = read_photo_id($f_id);
		
			$action = "data_donation.php?page=edit_foto&id=$id&f_id=$f_id	";
		} else{
			//$title = ucfirst("Form input Video Dokumentasi");

			//inisialisasi
			$row = new stdClass();
			
			$row->d_video_id	 = false;
			$row->d_video_nm 	 = false;
			$row->d_video_link 	 = false;
			
			$action = "data_donation.php?page=save_foto&id=$id";
		}

		include '../views/data_donation/form_foto.php';
	
	break;
	
	case 'form_video':
		get_header();
		
	
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$v_id = (isset($_GET['v_id'])) ? $_GET['v_id'] : null;
		
			
		$close_button = "data_donation.php?page=form_edit&id=".$id."";

		
		

		
		if($v_id){
			

			$row = read_video_id($v_id);
		
			$action = "entry_donation.php?page=edit_video&id=$id&v_id=$v_id	";
		} else{
			$title = ucfirst("Form input Video Dokumentasi");

			//inisialisasi
			$row = new stdClass();
			
			$row->d_video_id	 = false;
			$row->d_video_nm 	 = false;
			$row->d_video_link 	 = false;
			
			$action = "entry_donation.php?page=save_video&id=$id";
		}

		include '../views/data_donation/form_video.php';
	
	break;
	
		case 'report':
		
			$id_ds = (isset($_GET['id_ds'])) ? $_GET['id_ds'] : null;
			$row_loct = get_data_loct($id_ds); 
			
			$date =date('Y/m/d');
			$query = select_detail($id_ds);
			
			include '../views/report/data_donation.php';	
			
		//header("Location: data_donation_all.php?page=list&preview=1&month=$i_month&year=$i_year");
	break;


}
?>