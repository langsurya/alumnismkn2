<?php 
$link = mysqli_connect("localhost", "root", "", "db_siswasmkn2");
// memanggil file exel_reader
require "../excel_reader.php";

// jika tombol import di tekan
if (isset($_POST['submit'])) {
	
	$target = basename($_FILES['filesiswaall']['name']) ;
	move_uploaded_file($_FILES['filesiswaall']['tmp_name'], $target);

	// tambahkan baris berikut unutuk mencegah error is not readable
	chmod($_FILES['filesiswaall']['name'],0777);

	$data = new Spreadsheet_Excel_Reader($_FILES['filesiswaall']['name'],false);
	

	// menghitung jumlah baris file xls
	$baris = $data->rowcount($sheet_index=0);

	// jika kosongkan data dicentang jalankan kode berikut
	// $drop = isset($_POST["drop"]) ? $_POST["drop"] : 0 ;
	// if ($drop == 1) {
		# kosongkan tabel siswa
	// 	$truncate = "TRUNCATE TABLE siswa";
	// 	mysql_query($truncate);
	// }

	// import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
	for ($i=2; $i <=$baris; $i++) { 
		# membaca data (kolom ke-1 sd terakhir)
		$nis = $data->val($i, 1);
		$nisn = $data->val($i, 2);
		$nama_siswa = $data->val($i, 3);
		$alamat = $data->val($i, 4);
		$no_telp = $data->val($i, 5);
		$tempat_lahir = $data->val($i, 6);
		$tgl_lahir = $data->val($i, 7);
		$nama_orang_tua = $data->val($i, 8);
		$sekolah_asal = $data->val($i, 9);
		$nomor_peserta = $data->val($i, 10);
		$tahun_lulus = $data->val($i, 11);
		$kepala_sekolah = $data->val($i, 12);
		$nomor_ijazah = $data->val($i, 13);
		$nilai_rata_rata = $data->val($i, 14);
		$nama_jurusan = $data->val($i, 15);
		$keterangan = $data->val($i, 16);
		$foto = $data->val($i, 17);
		$guru = $data->val($i, 18);

		// setelah data dibaca, masukan ke tabel siswa sql
		$query = "INSERT INTO tbl_siswa (nis,nisn,nama_siswa,alamat,no_telp,tempat_lahir,tgl_lahir,nama_orang_tua,sekolah_asal,nomor_peserta,tahun_lulus,kepala_sekolah,nomor_ijazah,nilai_rata_rata,nama_jurusan,keterangan,foto,guru)values($nis,$nisn,$nama_siswa,$alamat,$no_telp,$tempat_lahir,$tgl_lahir,$nama_orang_tua,$sekolah_asal,$nomor_peserta,$tahun_lulus,$kepala_sekolah,$nomor_ijazah,$nilai_rata_rata,$nama_jurusan,$keterangan,$foto,$guru)";
		$hasil = mysqli_query($link,$query);
	}

	if (!$hasil) {
		# jika import gagal
		die(mysqli_error());
	}else{
		// jika import berhasil
		echo "Data berhasil diinport.";
	}
}
?>

<form name="myForm" id="myForm" onsubmit="return validateForm()" action="" method="POST" enctype="multipart/form-data">
	<input type="file" id="filesiswaall" name="filesiswaall"/>
	<input type="submit" name="submit" value="Import"/><br>
</form>