<?php 
include "../inc/class.php";
$obj = new siswa;
if (!empty($_GET['nis'])) {
	$obj->delete($_GET['nis'],'tbl_siswa','nis');
	header('location:?module=siswa&msg=delete');
}
?>