<?php 
include "../inc/class.php";
$obj = new siswa;
if (!empty($_GET['nis'])) {
	$obj->delete($_GET['nis'],'tbl_siswa','nis');
	header('location:?module=siswa&msg=delete');
}elseif (!empty($_GET['id_jurusan'])) {
	$obj->delete($_GET['id_jurusan'],'tbl_jurusan','id_jurusan');
	header('location:?module=jurusan&msg=delete');
}
?>