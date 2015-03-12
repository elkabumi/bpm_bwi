<?php
include '../lib/config.php';
include '../lib/function.php';

include '../models/deskripsi_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Deskripsi");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);
		
		
		$row = read_id();
		$id=$row->deskripsi_id;
		$action = "deskripsi.php?page=edit&id=$id";
		include '../views/deskripsi/form.php';
		get_footer();
	break;
	
	


	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_kata = get_isset($i_kata);
		
					$data = "
					deskripsi_desc   = '$i_kata'
					";
				update($data, $id);
								
	header('Location: deskripsi.php?page=list&did=2');
			

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: deskripsi.php?page=list&did=3');

	break;
	
	case 'report':
		
			$query = select();
			include '../views/report/deskripsi.php';
	
		
			 

	break;
}

?>