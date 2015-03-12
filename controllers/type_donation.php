<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/type_donation_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Jenis Bantuan");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);
		
		$query = select();
		$add_button = "type_donation.php?page=form";


		include '../views/type_donation/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "type_donation.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);

			$action = "type_donation.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();
			//$get_code = get_type_donation_code();

			$row->m_don_t_nm = false ;
			$row->m_don_t_desc  	= false;

			$action = "type_donation.php?page=save";
		}

		include '../views/type_donation/form.php';
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
			
			header('Location: type_donation.php?page=list&did=1');
		
	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_name = get_isset($i_name);
		$i_description = get_isset($i_description);

		
					$data = "
					m_don_t_nm = '$i_name',
					m_don_t_desc = '$i_description'
					";

			
			
			update($data, $id);
			
			header('Location: type_donation.php?page=list&did=2');

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: type_donation.php?page=list&did=3');

	break;
}

?>