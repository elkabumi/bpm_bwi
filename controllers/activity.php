<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/activity_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Jenis Kegiatan");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);
		
		$query = select();
		$add_button = "activity.php?page=form";


		include '../views/activity/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "activity.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);

			$action = "activity.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();
			//$get_code = get_activity_code();

			$row->m_activity_nm = false ;
			$row->m_activity_desc  	= false;

			$action = "activity.php?page=save";
		}

		include '../views/activity/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);
	
		$i_name = get_isset($i_name);
		$i_description = get_isset($i_description);
		
			$data = "'',
					'$i_name', 
					'$i_description'
			";
			
			//echo $data
			create($data);
			
			header('Location: activity.php?page=list&did=1');
		
	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_name = get_isset($i_name);
		$i_description = get_isset($i_description);

		
					$data = "
					m_activity_nm = '$i_name',
					m_activity_desc = '$i_description'
					";

			
			
			update($data, $id);
			
			header('Location: activity.php?page=list&did=2');

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: activity.php?page=list&did=3');

	break;
}

?>