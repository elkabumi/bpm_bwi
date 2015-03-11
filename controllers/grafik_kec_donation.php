<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/grafik_kec_donation_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Grafik Kecamatan Di Tiap Jenis Kegiatan");

$_SESSION['menu_active'] = 4;

switch ($page) {
	case 'list':
		get_header($title);
		
		
		include '../views/grafik_kec_donation/list.php';
		get_footer();
	break;
	
	
}

?>