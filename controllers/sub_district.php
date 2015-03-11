<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/sub_district_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Kecamatan");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);
		
		$query = select();
		$add_button = "sub_district.php?page=form";


		include '../views/sub_district/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "sub_district.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
			$kab_code = $row->kode_kab;
			$kec_code = $row->kode_kec;

			$kode_desa = $row->kode_desa;

			$action = "sub_district.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();
			$get_code = get_sub_district_code();
			$kab_code = 3510;
			$kec_code = $get_code;
			$kode_desa = '000';
			$row->m_loct_nm = false;
			$row->m_loct_desc = false;

			$action = "sub_district.php?page=save";
		}

		include '../views/sub_district/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);

		$i_name = get_isset($i_name);
		$i_kec_cod=valid_code(get_isset($i_kec_cod));
	
		$i_code = get_isset($i_kab_cod)."".$i_kec_cod."".get_isset($i_ds_cod)."";
		
		$i_descripton = get_isset($i_descripton);
		$type = 1; //type 1 untuk kecamatan
		$parent_id = 0; //parent_id 0 untuk kecamatan
		$count_code_kec  = count_code_kec($i_code);
	
		if($count_code_kec > 0){
			show_message("Mohon Maaf Kode Kecamatan Telah digunakan",'sub_district.php?page=form');
		}else{
			
		
			$data = "'',
					'$type ',
					'$i_code', 
					'$i_name', 
					'$i_description',
					'$parent_id'
			";
			
			//echo $data;

			create($data);
			edit_sub_district_code();

			header('Location: sub_district.php?page=list&did=1');
		}
	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		
		$i_name = get_isset($i_name);
		$i_kec_cod=valid_code(get_isset($i_kec_cod));
		$i_code = get_isset($i_kab_cod)."".$i_kec_cod."".get_isset($i_ds_cod)."";
		
		$i_descripton = get_isset($i_description);
		$get_code_kec	= get_code_kec($id);
		
		if($get_code_kec != $i_code){
			$count_code_kec  = count_code_kec($i_code);
			if($count_code_kec > 0){
				show_message("Mohon Maaf Kode Kecamatan Telah digunakan",'sub_district.php?page=form&id='.$id.'');
			}else{
				update_code_desa($id,get_isset($i_kab_cod)."".get_isset($i_kec_cod));
				$data = "
					m_loct_code	 = '$i_code',
					m_loct_nm	 = '$i_name',
					m_loct_desc	 = '$i_description'
					";	
					update($data, $id);
			
					header('Location: sub_district.php?page=list&did=2');
			}
		}else{
			$data = "
					m_loct_code	 = '$i_code',
					m_loct_nm	 = '$i_name',
					m_loct_desc	 = '$i_description'
					";	
					update($data, $id);
			
					header('Location: sub_district.php?page=list&did=2');
		}
		
				
						
			
		
		

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: sub_district.php?page=list&did=3');

	break;
}

?>