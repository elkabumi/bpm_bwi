<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/grafik_type_donation_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Grafik Jenis Kegiatan Tiap Kecamatan");

$_SESSION['menu_active'] = 4;

switch ($page) {
	case 'list':
		get_header($title);
		
		
		include '../views/grafik_type_donation/list.php';
		get_footer();
	break;
	
	
}

?>