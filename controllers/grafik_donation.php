<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/grafik_donation_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Grafik Data Bantuan");

$_SESSION['menu_active'] = 4;

switch ($page) {
	case 'list':
		get_header($title);

		//$query = select();
		//$add_button = "grafik_donation.php?page=form";

		include '../views/grafik_donation/list.php';
		get_footer();
	break;
	
	
}

?>