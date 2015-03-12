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
				$i_year= date('Y');
				$i_month= date('m')-1+1;
			
				$nama_bulan = nm_bulan($i_month);
				
				
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
			$query 	= select($type,$year,$month); 
			include '../views/report/data_donation_all.php';	
			
		//header("Location: data_donation_all.php?page=list&preview=1&month=$i_month&year=$i_year");
	break;


	case 'form_edit':
		get_header();
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$year = (isset($_GET['year'])) ? $_GET['year'] : null;
		$month = (isset($_GET['month'])) ? $_GET['month'] : null;
		
			$id_ds = get_id_desa($id);
			$close_button = "data_donation_all.php?page=list&year=".$year."&month=".$month."";
		
		if($id){
			
			$row = read_id($id);
			$row->d_don_pengajuan 	 = format_back_date4($row->d_don_pengajuan);
			$row->d_don_diterima = format_back_date4($row->d_don_diterima);
			$row->d_don_disetujui = format_back_date4($row->d_don_disetujui);
			$row->d_don_implementation = format_back_date4($row->d_don_implementation);
			
			$action = "data_donation_all.php?page=edit&id=".$id."&year=".$year."&month=".$month."";
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
			
			$action = "data_donation_all.php?page=save&year=".$year."&month=".$month."";
			$button = "Save";
		}
		if($kec_id){
			$where_desa = "WHERE m_loct_parent_id = ".$kec_id." AND loct_t_id ='2'";
			
		}else{
			$where_desa = "WHERE loct_t_id ='2'";
		}
		
		include '../views/data_donation_all/form_edit.php';
		get_footer();
	break;
	
	case 'form_video':
		get_header();
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$v_id = (isset($_GET['v_id'])) ? $_GET['v_id'] : null;
		$year = (isset($_GET['year'])) ? $_GET['year'] : null;
			$month = (isset($_GET['month'])) ? $_GET['month'] : null;
		
		$close_button = "data_donation_all.php?page=form&id=$id";

		
		if($v_id){
			$title = ucfirst("Form Edit Tanah Petani");

			$row = read_video_id($v_id);
		
			$action = "data_donation_all.php?page=edit_video&id=$id&v_id=$v_id&year=".$year."&month=".$month."";
		} else{
			$title = ucfirst("Form input Video Dokumentasi");

			//inisialisasi
			$row = new stdClass();
			
			$row->d_video_id	 = false;
			$row->d_video_nm 	 = false;
			$row->d_video_link 	 = false;
			
			$action = "data_donation_all.php?page=save_video&id=$id&year=".$year."&month=".$month."";;
		}

		include '../views/data_donation_all/form_video.php';
	
	break;
	
		case 'form_foto':
		get_header();
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$f_id = (isset($_GET['f_id'])) ? $_GET['f_id'] : null;
			$year = (isset($_GET['year'])) ? $_GET['year'] : null;
			$month = (isset($_GET['month'])) ? $_GET['month'] : null;
		
		$close_button = "data_donation_all.php?page=form&id=$id&year=".$year."&month=".$month."";

		
		if($f_id){
			//$title = ucfirst("Form Edit Tanah Petani");

			$row = read_photo_id($f_id);
		
			$action = "data_donation_all.php?page=edit_foto&id=$id&f_id=$f_id&year=".$year."&month=".$month."";
		} else{
			//$title = ucfirst("Form input Video Dokumentasi");

			//inisialisasi
			$row = new stdClass();
			$progres = get_progres($id);
			$row->d_pho_id	 = false;
			$row->d_pho_nm 	 = false;
			$row->d_pho_file = false;
			$row->d_don_prog  = $progres;
			$action = "data_donation_all.php?page=save_foto&id=$id&year=".$year."&month=".$month."";
		}

		include '../views/data_donation_all/form_foto.php';
	
	break;
	
	case 'save':

		extract($_POST);
			$year = (isset($_GET['year'])) ? $_GET['year'] : null;
			$month = (isset($_GET['month'])) ? $_GET['month'] : null;
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
					'$i_implementation_date'

			";
			
			//echo $data;
			create($data);
			$id=mysql_insert_id();
			header('Location: data_donation_all.php?page=form_edit&did=1&id='.$id.'&year='.$year.'&month='.$month.'');
		
	break;
	
	case 'save_video':
	
		extract($_POST);
			$year = (isset($_GET['year'])) ? $_GET['year'] : null;
			$month = (isset($_GET['month'])) ? $_GET['month'] : null;
		
		$i_nm 	=	get_isset($i_nm);
		$i_link =	get_isset($i_link);
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		$data = "'',
				'$id',
				'$i_nm',
				'$i_link'
			";
		
		create_video($data);
	
		
		header("Location: data_donation_all.php?page=form_edit&did=2&id=$id&year=".$year."&month=".$month."");
		
		
	break;
	
	case 'save_foto':
		extract($_POST);
			$year = (isset($_GET['year'])) ? $_GET['year'] : null;
			$month = (isset($_GET['month'])) ? $_GET['month'] : null;
		
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
			
			header("Location: data_donation_all.php?page=form_edit&did=2&id=".$id."&year=".$year."&month=".$month."");

	break;
	
	
	case 'edit':
	
		extract($_POST);
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
			$year = (isset($_GET['year'])) ? $_GET['year'] : null;
			$month = (isset($_GET['month'])) ? $_GET['month'] : null;
		
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
		
		$i_diajukan_date = format_back_date(get_isset($i_diajukan_date));
		$i_diterima_date = format_back_date(get_isset($i_diterima_date));
		$i_disetujui_date =format_back_date(get_isset($i_disetujui_date));
		$i_implementation_date =format_back_date(get_isset($i_implementation_date));
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
					d_don_from = '$i_from_id',
					
					d_don_pengajuan  = '$i_diajukan_date',
					d_don_diterima 	= '$i_diterima_date',
					d_don_disetujui 	= '$i_disetujui_date',
					d_don_implementation = '$i_implementation_date'
					";

			
			
			update($data, $id);
			
			header("Location: data_donation_all.php?page=form_edit&id=".$id."&year=".$year."&month=".$month."");
		
	break;
	case 'edit_video':

		extract($_POST);

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$v_id = (isset($_GET['v_id'])) ? $_GET['v_id'] : null;
		$year = (isset($_GET['year'])) ? $_GET['year'] : null;
			$month = (isset($_GET['month'])) ? $_GET['month'] : null;
		
		$i_nm 	=	get_isset($i_nm);
		$i_link =	get_isset($i_link);
			
					$data = "
					d_video_nm = '$i_nm',
					d_video_link = '$i_link'
					";

			
			
			update_video($data, $v_id);
			
			header('Location: data_donation_all.php?page=form_edit&err=1&id='.$id.'&year='.$year.'&month='.$month.'');
		

	break;

	case 'edit_foto':

		extract($_POST);
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$f_id = (isset($_GET['f_id'])) ? $_GET['f_id'] : null;

			$year = (isset($_GET['year'])) ? $_GET['year'] : null;
			$month = (isset($_GET['month'])) ? $_GET['month'] : null;

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
			
		header('Location: data_donation_all.php?page=form_edit&err=1&id='.$id.'&year='.$year.'&month='.$month.'');
		

	break;
	case 'delete_foto':

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$f_id = (isset($_GET['f_id'])) ? $_GET['f_id'] : null;
			$year = (isset($_GET['year'])) ? $_GET['year'] : null;
			$month = (isset($_GET['month'])) ? $_GET['month'] : null;
		
		$r_img = get_img($f_id);
			if($r_img != ""){
				if(file_exists($r_img)){
					unlink($r_img); 
				}
		}
		delete_foto($f_id);
		
		header('Location: data_donation_all.php?page=form_edit&did=1&id='.$id.'&year='.$year.'&month='.$month.'');
		

	break;
	case 'delete_video':

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$v_id = (isset($_GET['v_id'])) ? $_GET['v_id'] : null;
			$year = (isset($_GET['year'])) ? $_GET['year'] : null;
			$month = (isset($_GET['month'])) ? $_GET['month'] : null;
		
		delete_video($v_id);
		
		header('Location: data_donation_all.php?page=form_edit&did=1&id='.$id.'&year='.$year.'&month='.$month.'');
		

	break;
	
}
?>