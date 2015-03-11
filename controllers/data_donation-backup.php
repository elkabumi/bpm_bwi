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
			$title = ucfirst("Data Bantuan");
			
			$query = select_kec();
			$search_button = "data_donation.php?page=search";
		
			include '../views/data_donation/list_kec.php';
		}else{
			
			include '../views/layout/not_acces.php';
		}
		get_footer();
	break;
	
	case 'list_desa'://list_desa
		get_header();
		$search_button = "data_donation.php?page=search";
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
		
		
		$row_loct = get_data_loct($id_ds); 
 		$title = ucfirst("Data Bantuan Desa. ".$row_loct->m_loct_nm."");
	
		$search_button = "data_donation.php?page=search";
		$close_button  = "data_donation.php?page=list_desa&id_kec=".$row_loct->m_loct_parent_id."";
		
		$link_search_button =	"<a href='".$search_button."' class='btn btn-success'>Search Bantuan</a>";
		$link_close_button ="<a href='".$close_button."' class='btn btn-success'>Back</a>";
		$link_detail =	"&id_ds=".$id_ds."&type_akses=1";//type_akses 1 tidak dicari dari menu search
		
		
		$query_item = select_detail($id_ds);
		$i_cari ='';
		$i_nominal1 ='';
		$i_nominal2 ='';
		
		include '../views/data_donation/list_detail.php';
		get_footer();
	
	break;
	
	case 'search':
		get_header();
		$title2 = ucfirst("Form Data Bantuan");
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($_SESSION['user_grade_id']  == '999'){
			
			$close_button  = "data_donation.php?page=list";
		}else{
		
			$close_button  = "data_donation.php?page=list_desa&id_kec=".$_SESSION['user_loct_id']."";
		}
		$action = "data_donation.php?page=form_result&preview=1";
		
			$i_cari = "";
			$i_nominal1 = "";
			$i_nominal2 = "";
		
		if(isset($_GET['preview'])){
			$i_cari = get_isset($_GET['cari']);
			$i_nominal1 = get_isset($_GET['nominal1']);
			$i_nominal2 = get_isset($_GET['nominal2']);
		}
		
		
		include '../views/data_donation/form.php';
		
		
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
			include '../views/data_donation/list_detail.php';
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
		
		header("Location: data_donation.php?page=search&preview=1&cari=$i_cari&nominal1=$i_nominal1&nominal2=$i_nominal2");
	break;
	

	case 'form_detail':
		get_header();
		$type_akses =(isset($_GET['type_akses'])) ? $_GET['type_akses'] : null;
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($type_akses == '1'){
			$id_ds = (isset($_GET['id_ds'])) ? $_GET['id_ds'] : null;
			$close_button = "data_donation.php?page=list_detail&id_ds=".$id_ds."";
			$link_detail =	"id=".$id."&&id_ds=".$id_ds."&type_akses=1";
	
		}else{
			$i_cari = (isset($_GET['cari'])) ? $_GET['cari'] : null;
			$i_nominal1 =(isset($_GET['nominal1'])) ? $_GET['nominal1'] : null;
			$i_nominal2 =(isset($_GET['nominal2'])) ? $_GET['nominal2'] : null;
			$close_button = "data_donation.php?page=search&preview=1&cari=".$i_cari."&nominal1=".$i_nominal1."&nominal2=".$i_nominal2."";
			$link_detail= "id=".$id."&&cari=".$i_cari."&nominal1=".$i_nominal1."&nominal2=".$i_nominal2."&type_akses=".$type_akses."";
			
		}
		
		$row = read_detail_id($id);
		
	
		include '../views/data_donation/form_detail.php';
		get_footer();
	break;
	
	case 'form_edit':
		get_header();
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$type_akses =(isset($_GET['type_akses'])) ? $_GET['type_akses'] : null;
		
		
		if($type_akses == '1'){
			$id_ds = (isset($_GET['id_ds'])) ? $_GET['id_ds'] : null;
			$close_button = "data_donation.php?page=list_detail&id_ds=".$id_ds."";
			$action = "data_donation.php?page=edit&id=".$id."&id_ds=".$id_ds."&type_akses=".$type_akses."";
			$link_detail =	"id=".$id."&&id_ds=".$id_ds."&type_akses=1";
	
		}else{
			$i_cari = (isset($_GET['cari'])) ? $_GET['cari'] : null;
			$i_nominal1 =(isset($_GET['nominal1'])) ? $_GET['nominal1'] : null;
			$i_nominal2 =(isset($_GET['nominal2'])) ? $_GET['nominal2'] : null;
			$close_button = "data_donation.php?page=search&preview=1&cari=".$i_cari."&nominal1=".$i_nominal1."&nominal2=".$i_nominal2."";
			$action = "data_donation.php?page=edit&id=".$id."&cari=".$i_cari."&nominal1=".$i_nominal1."&nominal2=".$i_nominal2."&type_akses=".$type_akses."";
			$link_detail= "id=".$id."&&cari=".$i_cari."&nominal1=".$i_nominal1."&nominal2=".$i_nominal2."&type_akses=".$type_akses."";
		
		}
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		$row = read_detail_id($id);
		
	
		include '../views/data_donation/form_edit.php';
		get_footer();
	break;
	
	case 'form_foto':
		get_header();
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$f_id = (isset($_GET['f_id'])) ? $_GET['f_id'] : null;
		$type_akses =(isset($_GET['type_akses'])) ? $_GET['type_akses'] : null;
		
		if($type_akses == '1'){
			$id_ds = (isset($_GET['id_ds'])) ? $_GET['id_ds'] : null;
			$close_button = "data_donation.php?page=list_detail&id_ds=".$id_ds."";
			$action = "data_donation.php?page=edit&id=".$id."&id_ds=".$id_ds."&type_akses=".$type_akses."";
			$link_detail =	"id=".$id."&&id_ds=".$id_ds."&type_akses=1";
		}else{
			$i_cari = (isset($_GET['cari'])) ? $_GET['cari'] : null;
			$i_nominal1 =(isset($_GET['nominal1'])) ? $_GET['nominal1'] : null;
			$i_nominal2 =(isset($_GET['nominal2'])) ? $_GET['nominal2'] : null;
			$close_button = "data_donation.php?page=search&preview=1&cari=".$i_cari."&nominal1=".$i_nominal1."&nominal2=".$i_nominal2."";
			$action = "data_donation.php?page=edit&id=".$id."&cari=".$i_cari."&nominal1=".$i_nominal1."&nominal2=".$i_nominal2."&type_akses=".$type_akses."";
			$link_detail= "id=".$id."&&cari=".$i_cari."&nominal1=".$i_nominal1."&nominal2=".$i_nominal2."&type_akses=".$type_akses."";
		}	
		

		
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
		$i_cari = get_isset($_GET['cari']);
		$i_nominal1 = get_isset($_GET['nominal1']);
		$i_nominal2 = get_isset($_GET['nominal2']);
			
		$close_button = "data_donation.php?page=form_detail&id=".$id."&cari=".$i_cari."&nominal1=".$i_nominal1."&nominal2=".$i_nominal2."";

		
		

		
		if($v_id){
			$title = ucfirst("Form Edit Tanah Petani");

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
	

	
	case 'edit':
	
		extract($_POST);
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$type_akses =(isset($_GET['type_akses'])) ? $_GET['type_akses'] : null;
		if($type_akses == '1'){
			$id_ds = (isset($_GET['id_ds'])) ? $_GET['id_ds'] : null;
			$link_redirect = "data_donation.php?page=form_edit&id=".$id."&id_ds=".$id_ds."&type_akses=".$type_akses."&did=3";
		
		}else{
			$i_cari = (isset($_GET['cari'])) ? $_GET['cari'] : null;
			$i_nominal1 =(isset($_GET['nominal1'])) ? $_GET['nominal1'] : null;
			$i_nominal2 =(isset($_GET['nominal2'])) ? $_GET['nominal2'] : null;
			$link_redirect = "data_donation.php?page=form_edit&id=".$id."&cari=".$i_cari."&nominal1=".$i_nominal1."&nominal2=".$i_nominal2."&type_akses=".$type_akses."&did=3";
		
		}	
		$i_no = get_isset($i_no);
		$i_kec_id = get_isset($i_kec_id);
		$i_actv_id = get_isset($i_actv_id);
		if($i_actv_id == 999){
			$i_desc_actv = get_isset($i_desc_actv);
		}else{
			$i_desc_actv =	'';
		}
		
		$i_year = get_isset($i_year);
		$i_name = get_isset($i_name);
		$i_addres = get_isset($i_addres);
		$i_nominal = get_isset($i_nominal);
		$i_type = get_isset($i_type);
		$i_qty = get_isset($i_qty);
		$i_unit_id = get_isset($i_unit_id);
		$i_p = get_isset($i_p);
		$i_l = get_isset($i_l);
		$i_t = get_isset($i_t);
		$i_description = get_isset($i_description);
		
				$data = "
					m_loct_id = '$i_kec_id',
					m_activity_id = '$i_actv_id',
					m_activity_other = '$i_desc_actv',
					d_don_year = '$i_year',
					d_don_nm = '$i_name',
					d_don_addres = '$i_addres',
					d_don_nominal = '$i_nominal',
					d_don_bentuk = '$i_type',
					d_don_qty = '$i_qty',
					m_unit_id = '$i_unit_id',
					d_don_dim_p = '$i_p',
					d_don_dim_l = '$i_l',
					d_don_dim_t = '$i_t',
					d_don_desc = '$i_description'
					";

			
			
			update($data, $id);
			
			header("Location: $link_redirect");

	break;

	
	
}

?>