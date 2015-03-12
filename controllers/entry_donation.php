<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/entry_donation_model.php';
$page = null;

if($_SESSION['user_grade_id']  == '999'){
	$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
}else{
	$page = (isset($_GET['page'])) ? $_GET['page'] : "form";
}

$title = ucfirst("Entry Bantuan");

$_SESSION['menu_active'] = 2;
	
switch ($page) {

	case 'list':
		get_header($title);
		if($_SESSION['user_grade_id']  == '999'){
		
			
			$query = select();
			$add_button = "entry_donation.php?page=form";
	
	
			include '../views/entry_donation/list.php';
			get_footer();
		}else{
			
			include '../views/layout/not_acces.php';
		
		}
		get_footer();
	break;
	
	case 'form':
		get_header();
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$type = (isset($_GET['type'])) ? $_GET['type'] : null;
		
		if(isset($type) and $type == '1'){
			$id_ds = get_id_desa($id);
			$close_button = "data_donation.php?page=list_detail&id_ds=$id_ds";
		}else{
			if($_SESSION['user_grade_id']  == '999'){
				$kec_id = (isset($_GET['kec_id'])) ? $_GET['kec_id'] : null;
				$close_button = "entry_donation.php?page=list";
			}else{
				$kec_id = $_SESSION['user_loct_id'];	
				$close_button = "entry_donation.php?page=form&add=1";
			}
		}
		if($id){
			
			$row = read_id($id);
			$row->d_don_pengajuan 	 = format_back_date4($row->d_don_pengajuan);
			$row->d_don_diterima = format_back_date4($row->d_don_diterima);
			$row->d_don_disetujui = format_back_date4($row->d_don_disetujui);
			$row->d_don_implementation = format_back_date4($row->d_don_implementation);
			
			$action = "entry_donation.php?page=edit&id=".$id."&type=".$type."";
			$button = "edit";
			
		}else{
			
			
			
			//inisialisasi
			$row = new stdClass();
			
			$get_no_urut = get_donation_no();

			$row->d_don_id = false;
			$row->d_don_no = $get_no_urut;
			$row->m_loct_id = false;
			$row->m_activity_id = false;
			$row->d_don_year = date('Y');
			$row->d_don_nm = false;
			$row->d_don_addres = false;
			$row->d_don_nominal 	 = false;
			$row->d_don_bentuk = false;
			$row->d_don_qty = false;
			$row->m_unit_id = false;
			$row->d_don_dim_p 	 = false;
			$row->d_don_dim_l = false;
			$row->d_don_dim_t = false;
			
			$row->d_don_desc	 = false;
			
			$row->d_don_pengajuan 	 = false;
			$row->d_don_diterima = false;
			$row->d_don_disetujui = false;
			$row->m_don_type_id = false;
			$row->m_don_from_id = false;
			$action = "entry_donation.php?page=save&type=".$type."";
			$button = "Save";
		}
		if($kec_id){
			$where_desa = "WHERE m_loct_parent_id = ".$kec_id." AND loct_t_id ='2'";
			
		}else{
			$where_desa = "WHERE loct_t_id ='2'";
		}
		
		include '../views/entry_donation/form.php';
		get_footer();
	break;
	
	case 'form_video':
		get_header();
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$v_id = (isset($_GET['v_id'])) ? $_GET['v_id'] : null;
		$type = (isset($_GET['type'])) ? $_GET['type'] : null;
		
		$close_button = "entry_donation.php?page=form&id=$id";

		
		if($v_id){
			$title = ucfirst("Form Edit Tanah Petani");

			$row = read_video_id($v_id);
		
			$action = "entry_donation.php?page=edit_video&id=$id&v_id=$v_id&type=".$type."";
		} else{
			$title = ucfirst("Form input Video Dokumentasi");

			//inisialisasi
			$row = new stdClass();
			
			$row->d_video_id	 = false;
			$row->d_video_nm 	 = false;
			$row->d_video_link 	 = false;
			
			$action = "entry_donation.php?page=save_video&id=$id&type=".$type."";
		}

		include '../views/entry_donation/form_video.php';
	
	break;
	
		case 'form_foto':
		get_header();
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$f_id = (isset($_GET['f_id'])) ? $_GET['f_id'] : null;
		$type = (isset($_GET['type'])) ? $_GET['type'] : null;
		
		$close_button = "entry_donation.php?page=form&id=$id&type=".$type."";

		
		if($f_id){
			//$title = ucfirst("Form Edit Tanah Petani");

			$row = read_photo_id($f_id);
		
			$action = "entry_donation.php?page=edit_foto&id=$id&f_id=$f_id&type=".$type."";
		} else{
			//$title = ucfirst("Form input Video Dokumentasi");

			//inisialisasi
			$row = new stdClass();
			$progres = get_progres($id);
			$row->d_pho_id	 = false;
			$row->d_pho_nm 	 = false;
			$row->d_pho_file = false;
			$row->d_don_prog  = $progres;
			$action = "entry_donation.php?page=save_foto&id=$id&type=".$type."";
		}

		include '../views/entry_donation/form_foto.php';
	
	break;
	
	case 'save':

		extract($_POST);
		
		$type = (isset($_GET['type'])) ? $_GET['type'] : null;
		
		$i_no = get_isset($i_no);
		$i_kec_id = get_isset($i_kec_id);
		$i_actv_id = get_isset($i_actv_id);
		if($i_actv_id == 999){
			$i_desc_actv = get_isset($i_desc_actv);
		}else{
			$i_desc_actv = '';
		}
		$i_year = get_isset($i_year);
		$i_name = get_isset($i_name);
		$i_addres = get_isset($i_addres);
		$i_nominal = get_isset($i_nominal);
		
		$i_from_id = get_isset($i_from_id);
		$i_prog = get_isset($i_prog);
		
		$i_type = get_isset($i_type);
		$i_qty = get_isset($i_qty);
		$i_unit_id = get_isset($i_unit_id);
		$i_p = get_isset($i_p);
		$i_l = get_isset($i_l);
		$i_t = get_isset($i_t);
		$i_description = get_isset($i_description);
		
		$i_diajukan_date = format_back_date(get_isset($i_diajukan_date));
		$i_diterima_date = format_back_date(get_isset($i_diterima_date));
		$i_disetujui_date =format_back_date(get_isset($i_disetujui_date));
		$i_implementation_date =format_back_date(get_isset($i_implementation_date));
		$i_type_id =(get_isset($i_type_id));
		
			$data = "'',
					'$i_no', 
					'$i_kec_id',
					'$i_actv_id', 
					'$i_desc_actv', 
					'$i_year', 
					'$i_name', 
					'$i_addres', 
					'$i_nominal', 
					'$i_type', 
					'$i_qty', 
					'$i_unit_id', 
					'$i_p', 
					'$i_l', 
					'$i_t', 
					'$i_description', 
					'$i_prog', 
					'$i_from_id',
					'$i_diajukan_date', 
					'$i_diterima_date', 
					'$i_disetujui_date',
					'$i_implementation_date',
					'$i_type_id'

			";
			
			//echo $data;
			create($data);
			$id=mysql_insert_id();
			header('Location: entry_donation.php?page=form&did=1&id='.$id.'');
		
	break;
	
	case 'save_video':
	
		extract($_POST);
		$type = (isset($_GET['type'])) ? $_GET['type'] : null;
		
		$i_nm 	=	get_isset($i_nm);
		$i_link =	get_isset($i_link);
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		$data = "'',
				'$id',
				'$i_nm',
				'$i_link'
			";
		
		create_video($data);
	
		
		header("Location: entry_donation.php?page=form&did=2&id=$id");
		
		
	break;
	
	case 'save_foto':
		extract($_POST);
		$type = (isset($_GET['type'])) ? $_GET['type'] : null;
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		$i_nm = get_isset($i_nm);
		$i_prog = get_isset($i_prog);
		$i_img = get_isset($_FILES['i_img']['name']);
		$path = "../img/foto_dokumentasi/";
		
		$i_img = ($_FILES['i_img']['name']) ? $_FILES['i_img']['name'] : "";
		$i_date = date("Y-m-d-his");
		
		if($i_img != ""){
			$image = $path.$i_date."_".$_FILES['i_img']['name'];
			move_uploaded_file($_FILES['i_img']['tmp_name'], $image);
		}else{
			$image = "";
		}
			$data = "'',
					'$id',
					'$i_nm', 
					'$image',
					'$i_prog'
			";
			create_foto($data);
			
			header("Location: entry_donation.php?page=form&did=2&id=".$id."");

	break;
	
	
	case 'edit':
	
		extract($_POST);
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$type = (isset($_GET['type'])) ? $_GET['type'] : null;
		
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
		$i_from_id = get_isset($i_from_id);
		$i_prog = get_isset($i_prog);
		
		$i_unit_id = get_isset($i_unit_id);
		$i_p = get_isset($i_p);
		$i_l = get_isset($i_l);
		$i_t = get_isset($i_t);
		$i_description = get_isset($i_description);
		$i_from_id = get_isset($i_from_id);
		$i_type_id =(get_isset($i_type_id));
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
					d_don_desc = '$i_description',
					d_don_prog = '$i_prog',
					m_don_from_id = '$i_from_id',
					m_don_type_id = '$i_type_id'
					";

			
			
			update($data, $id);
			
			header("Location: entry_donation.php?page=form&id=".$id."&type=".$type."");

	break;
	case 'edit_video':

		extract($_POST);

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$v_id = (isset($_GET['v_id'])) ? $_GET['v_id'] : null;
		$type = (isset($_GET['type'])) ? $_GET['type'] : null;
		
		$i_nm 	=	get_isset($i_nm);
		$i_link =	get_isset($i_link);
			
					$data = "
					d_video_nm = '$i_nm',
					d_video_link = '$i_link'
					";

			
			
			update_video($data, $v_id);
			
			header('Location: entry_donation.php?page=form&err=1&id='.$id.'&type='.$type.'');

	break;

	case 'edit_foto':

		extract($_POST);
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$f_id = (isset($_GET['f_id'])) ? $_GET['f_id'] : null;

		$type = (isset($_GET['type'])) ? $_GET['type'] : null;

		$i_prog = get_isset($i_prog);
		$i_nm = get_isset($i_nm);
		$i_img = get_isset($_FILES['i_img']['name']);
		$path = "../img/foto_dokumentasi/";
		
		$i_img = ($_FILES['i_img']['name']) ? $_FILES['i_img']['name'] : "";
		$i_date = date("Y-m-d-his");
		
		if($i_img != ""){
			
			$r_img = get_img($f_id);
			if($r_img != ""){
				if(file_exists($r_img)){
					unlink($r_img); 
				}
			}
			$image = $path.$i_date."_".$_FILES['i_img']['name'];
			move_uploaded_file($_FILES['i_img']['tmp_name'], $image);
			
				$data = "
					 	d_pho_nm = '$i_nm',
						d_pho_file = '$image',
						d_don_prog  = '$i_prog'";
		}else{
				$data = "
						d_pho_nm = '$i_nm',
						d_don_prog  = '$i_prog'";
					
			
			
		}
			update_foto($data, $f_id);
			
		header('Location: entry_donation.php?page=form&err=1&id='.$id.'&type='.$type.'');
		

	break;
	case 'delete_foto':

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$f_id = (isset($_GET['f_id'])) ? $_GET['f_id'] : null;
		$type = (isset($_GET['type'])) ? $_GET['type'] : null;
		
		$r_img = get_img($f_id);
			if($r_img != ""){
				if(file_exists($r_img)){
					unlink($r_img); 
				}
		}
		delete_foto($f_id);
		
		header('Location: entry_donation.php?page=form&did=1&id='.$id.'&type='.$type.'');

	break;
	case 'delete_video':

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$v_id = (isset($_GET['v_id'])) ? $_GET['v_id'] : null;
		$type = (isset($_GET['type'])) ? $_GET['type'] : null;
		
		delete_video($v_id);
		
		header('Location: entry_donation.php?page=form&did=1&id='.$id.'&type='.$type.'');

	break;
}

?>