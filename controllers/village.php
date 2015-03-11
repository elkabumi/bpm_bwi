<?php
include '../lib/config.php';
include '../lib/function.php';

include '../models/village_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Kelurahan/Desa");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);
		
		$query = select();
		$add_button = "village.php?page=form";
		$download = "village.php?page=report";

		include '../views/village/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "village.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
			$kab_code = $row->kode_kab;
			$kec_code = $row->kode_kec;

			$kode_desa = $row->kode_desa;
			$action = "village.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();
			$get_code  = get_village_code();
			
			$kab_code = 3510;
			$kec_code = false;
			$kode_desa = $get_code;
			
			$row->m_loct_parent_id = false ;
			//$row->m_loct_code 	= false;
			$row->m_loct_nm 		= false;
			$row->m_loct_desc = false;

			$action = "village.php?page=save";
		}

		include '../views/village/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);
		$i_kec_id = get_isset($i_kec_id);
		$i_name = get_isset($i_name);
		$i_ds_cod=valid_code(get_isset($i_ds_cod));
	
		$i_code = get_isset($i_kab_cod)."".get_isset($i_kec_cod)."".$i_ds_cod."";
		
		$i_descripton = get_isset($i_descripton);
		$type = 2; //type 2  karena desa
		$count_code_ds  = count_code_ds($i_code);
		if($count_code_ds > 0){
			show_message("Mohon Maaf Kode Desa Telah digunakan",'village.php?page=form');
		}else{
			
			
			
			$data = "'',
					'$type',
					'$i_code', 
					'$i_name', 
					'$i_description',
					'$i_kec_id'
			";
			
			
			//echo $data
			create($data);
			
			edit_village_code();

			header('Location: village.php?page=list&did=1');
		}
	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_name = get_isset($i_name);
		$i_kec_id=valid_code(get_isset($i_kec_id));
		$i_kec_cod=valid_code(get_isset($i_kec_cod));
		
		$i_code = get_isset($i_kab_cod)."".$i_kec_cod."".get_isset($i_ds_cod)."";
		$i_description = get_isset($i_description);
		$get_code_ds	= get_code_ds($id);
		
		if($get_code_ds != $i_code){
			$count_code_ds  = count_code_ds($i_code);
			if($count_code_ds > 0){
				show_message("Mohon Maaf Kode Desa Telah digunakan",'village.php?page=form&id='.$id.'');
			}else{
					$data = "
					m_loct_parent_id  = '$i_kec_id',
					m_loct_code  = '$i_code',
					m_loct_nm = '$i_name',
					m_loct_desc = '$i_description'
					";
					update($data, $id);
						
					header('Location: village.php?page=list&did=2');
			}
		}else{
					$data = "
					m_loct_nm = '$i_name',
					m_loct_desc = '$i_description'
					";
					update($data, $id);
						
					header('Location: village.php?page=list&did=2');
		}

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: village.php?page=list&did=3');

	break;
	
	case 'report':
		
			$query = select();
			include '../views/report/village.php';
	
		
			 

	break;
}

?>