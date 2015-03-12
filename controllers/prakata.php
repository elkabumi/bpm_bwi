<?php
include '../lib/config.php';
include '../lib/function.php';

include '../models/prakata_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Prakata");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);
		
		
		$row = read_id();
		$id=$row->prakata_id;
		$action = "prakata.php?page=edit&id=$id";
		include '../views/prakata/form.php';
		get_footer();
	break;
	
	


	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_kata = get_isset($i_kata);
		
					$data = "
					prakata_desc   = '$i_kata'
					";
				update($data, $id);
								
	header('Location: prakata.php?page=list&did=2');
			

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: prakata.php?page=list&did=3');

	break;
	
	case 'report':
		
			$query = select();
			include '../views/report/prakata.php';
	
		
			 

	break;
}

?>