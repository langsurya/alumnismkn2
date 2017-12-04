<?php

$module = $_GET['module'];
// error_reporting(0);
switch ($module) {
	case 'siswa':
		include_once 'siswa.php';
		break;
	
	case 'siswa_tampil':
		include_once 'siswa_tampil.php';
		break;
	case 'login':
		include_once 'login.php';
		break;

	default:
		include_once 'home.php';
		break;
}
?>