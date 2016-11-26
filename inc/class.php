<?php 

class siswa
{
	private $host = "localhost";
	private $user = "root";
	private $db = "db_siswasmkn2";
	private $pass = "";

	protected $conn;

	public function __construct()
	{
		$this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->user,$this->pass);
	}

	public function showData($query){
		// $sql = "SELECT * FROM $table";
		$q = $this->conn->query($query) or die("failed!");
		while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
			$data[]=$r;
		}
		return $data;
	}

	public function jumlah($query){
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$row = $stmt->rowCount();
		print($row);
	}

	public function create($nis,$nama_siswa,$tempat_lahir,$tgl_lahir,$nama_orang_tua,$sekolah_asal,$nomor_peserta,$tahun_lulus,$kepala_sekolah,$nomor_ijazah,$nilai_rata_rata,$nama_jurusan,$nama_file){
		try {
			if (empty($nama_file)) {
				$stmt = $this->conn->prepare("INSERT INTO tbl_siswa(nis,nama_siswa,tempat_lahir,tgl_lahir,nama_orang_tua,sekolah_asal,nomor_peserta,tahun_lulus,kepala_sekolah,nomor_ijazah,nilai_rata_rata,nama_jurusan) VALUES(:nis,:nama_siswa,:tempat_lahir,:tgl_lahir,:nama_orang_tua,:sekolah_asal,:nomor_peserta,:tahun_lulus,:kepala_sekolah,:nomor_ijazah,:nilai_rata_rata,:nama_jurusan) ");
			}elseif(!empty($nama_file)){
				$stmt = $this->conn->prepare("INSERT INTO tbl_siswa(nis,nama_siswa,tempat_lahir,tgl_lahir,nama_orang_tua,sekolah_asal,nomor_peserta,tahun_lulus,kepala_sekolah,nomor_ijazah,nilai_rata_rata,nama_jurusan,foto) VALUES(:nis,:nama_siswa,:tempat_lahir,:tgl_lahir,:nama_orang_tua,:sekolah_asal,:nomor_peserta,:tahun_lulus,:kepala_sekolah,:nomor_ijazah,:nilai_rata_rata,:nama_jurusan,:nama_file) ");		
				$stmt->bindparam(':nama_file',$nama_file);		
			}
			$stmt->bindparam(':nis',$nis);
			$stmt->bindparam(':nama_siswa',$nama_siswa);
			$stmt->bindparam(':tempat_lahir',$tempat_lahir);
			$stmt->bindparam(':tgl_lahir',$tgl_lahir);
			$stmt->bindparam(':nama_orang_tua',$nama_orang_tua);
			$stmt->bindparam(':sekolah_asal',$sekolah_asal);
			$stmt->bindparam(':nomor_peserta',$nomor_peserta);
			$stmt->bindparam(':tahun_lulus',$tahun_lulus);
			$stmt->bindparam(':kepala_sekolah',$kepala_sekolah);
			$stmt->bindparam(':nomor_ijazah',$nomor_ijazah);
			$stmt->bindparam(':nilai_rata_rata',$nilai_rata_rata);
			$stmt->bindparam(':nama_jurusan',$nama_jurusan);
			
			$stmt->execute();

			return true;
		} catch (PDOException $e) {
			return false;
		}
	}

	public function jurusan_tambah($id_jurusan,$nama_jurusan)
	{
		try {
			$stmt = $this->conn->prepare('INSERT INTO tbl_jurusan(id_jurusan,nama_jurusan) VALUES(?,?)');
			$stmt->bindParam(1,$id_jurusan);
			$stmt->bindParam(2,$nama_jurusan);
			$stmt->execute();
			return true;
		} catch (PDOException $e) {
			return false;
		}
	}



	public function paging($query,$records_per_page)
	{
		$starting_position=0;
		if (isset($_GET["page_no"])) {
			$starting_position=($_GET["page_no"]-1)*$records_per_page;
		}
		$query2=$query." limit $starting_position,$records_per_page";
		return $query2;
	}

	public function paginglink($query,$records_per_page){
		$self = $_SERVER['PHP_SELF'];
		if ($_GET['module']==$_GET['module']) {
			$module = $_GET['module'];
		}

		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		$total_no_of_records = $stmt->rowCount();

		if ($total_no_of_records > 0) {
			?><ul class="pagination"><?php
			$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
			$current_page=1;

			if (isset($_GET["page_no"])) {
				$current_page=$_GET["page_no"];
			}

			if ($current_page!=1) {
				$previous = $current_page-1;
				echo "<li><a href='".$self."?module=".$module."&page_no=1'>First</a></li>";
				echo "<li><a href='".$self."?module=".$module."&page_no=".$previous."'>First</a></li>";
			}

			for ($i=1; $i<=$total_no_of_pages; $i++) { 
				if ($i==$current_page) {
					echo "<li><a href='".$self."?module=".$module."&page_no=".$i."' style='color:red;'>".$i."</a></li>";
				}else{
					echo "<li><a href='".$self."?module=".$module."&page_no=".$i."'>".$i."</a></li>";
				}
			}

			if ($current_page!=$total_no_of_pages) {
				$next=$current_page+1;
				echo "<li><a href='".$self."?module=".$module."&page_no=".$next."'>Next</a></li>";
				echo "<li><a href='".$self."?module=".$module."&page_no=".$total_no_of_pages."'>Last</a></li>";
			}
		}

	}

}

?>