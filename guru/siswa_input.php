<?php include_once 'header.php'; ?>

	<!-- Custom style for this template -->
	<link rel="stylesheet" href="../dashboard.css">
	<!-- Custom styles for this template -->
  <link href="../carousel.css" rel="stylesheet">

  </head>
  <body>
  	<?php include_once 'navbar.php'; ?>

  	<div class="container-fluid">
  		<div class="row">
  			<div class="col-sm-3 col-md-2 sidebar">
  				<ul class="nav nav-sidebar">
  					<li class="active"><a href="#">MENU UTAMA <span class="sr-only">(current)</span></a></li>
            <div class="page"></div>
  					<li><a href="?module=home"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li class="active"><a href="?module=siswa"><i class="glyphicon glyphicon-user"></i> Data Siswa</a></li>
  				</ul>
  			</div>

  			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  				
          <div class="col-sm-12">
            <h2>Tambah Data Siswa</h2>
            <hr>
          </div>
          <?php 
          include_once '../inc/dbconfig.php';
          include_once '../inc/class.php';
          $siswa = new siswa;
          if (isset($_POST['btn-save'])) {
            $nis = $_POST['nis'];
            $nisn = $_POST['nisn'];
            $nama_siswa = $_POST['nama_siswa'];
            $alamat = $_POST['alamat'];
            $no_telp = $_POST['no_telp'];
            $nama_jurusan = $_POST['nama_jurusan'];
            $tempat_lahir = $_POST['tempat_lahir'];
            $tgl_lahir = $_POST['tgl_lahir'];
            $nama_orang_tua = $_POST['nama_orang_tua'];
            $sekolah_asal = $_POST['sekolah_asal'];
            $nomor_peserta = $_POST['nomor_peserta'];
            $tahun_lulus = $_POST['tahun_lulus'];
            $kepala_sekolah = $_POST['kepala_sekolah'];
            $nomor_ijazah = $_POST['nomor_ijazah'];
            $nilai_rata_rata = $_POST['nilai_rata_rata'];
            $keterangan = $_POST['keterangan'];
            $guru = $_SESSION['nama'];

            // Ambil data gambar dari form
            $nama_file = $_FILES['foto']['name'];
            $ukuran_file = $_FILES['foto']['size'];
            $tipe_file = $_FILES['foto']['type'];
            $tmp_file = $_FILES['foto']['tmp_name'];

            // set path folder tempat menyimpan gambar
            $path = "../images/siswa/".$nama_file;

            $stmt = $DB_con->prepare('SELECT * FROM tbl_siswa WHERE nomor_peserta=:nomor_peserta OR nomor_ijazah=:nomor_ijazah');
            $stmt->bindparam(':nomor_peserta',$nomor_peserta);
            $stmt->bindparam(':nomor_ijazah',$nomor_ijazah);
            $stmt->execute();
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            if (count($results)>0 && $nomor_peserta == $results['nomor_peserta'] || $nomor_ijazah == $results['nomor_ijazah']) {
                echo "<script> alert('Nomer peserta ($nomor_peserta) atau ijazah ($nomor_ijazah) sudah ada') </script>";
                echo "<meta http-equiv='refresh' content='0; url=?module=siswa_input'>";
            }else{
            
              if (!empty($nama_file)) {
                                  
              // Cek apakah tipe file yang di upload adalah JPG/JPEG/PNG
                if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {
                  # jika tipe file JPEG/JPEG/PNG, maka lakukan:
                  // cek apakah ukuran file sama atau lebih kecil dari 1MB
                  if ($ukuran_file <= 1000000) {
                    # jika ukuran file kurang dari sama dengan 1MB, lakukan:
                    
                      // cek data nis 
                      $stmt = $DB_con->prepare('SELECT * FROM tbl_siswa WHERE nis=:nis');
                      $stmt->bindparam(':nis',$_POST['nis']);
                      $stmt->execute();
                      $result = $stmt->fetch(PDO::FETCH_ASSOC);
                      if ($result['nis']==$nis) {
                          echo "<script> alert('Nomer NIS ($nis) sudah ada') </script>";
                          echo "<meta http-equiv='refresh' content='0; url=?module=siswa_input'>";
                      }else{
                        // proses upload
                        if (move_uploaded_file($tmp_file, $path)) { // cek apakah gambar berhasil di upload
                          # jika gambar berhasil di upload, lakukan:
                          // proses simpan ke database
                        $siswa->create($nis,$nisn,$nama_siswa,$alamat,$no_telp,$tempat_lahir,$tgl_lahir,$nama_orang_tua,$sekolah_asal,$nomor_peserta,$tahun_lulus,$kepala_sekolah,$nomor_ijazah,$nilai_rata_rata,$nama_jurusan,$keterangan,$nama_file,$guru);
                        echo "<script> alert('Data Berhasil di tambah') </script>";
                        echo "<meta http-equiv='refresh' content='0; url=?module=siswa&msg=success'>";
                        // header('location:?module=siswa&msg=success');
                        }else{
                          // jika gambar gagal di upload
                          echo "<script> alert('Gambar Gagal di upload') </script>";
                        echo "<meta http-equiv='refresh' content='0; url=?module=siswa_input'>";
                        }

                      }
                    
                  }
                }
              }elseif(empty($nama_file)){              
                // cek data nis 
                $stmt = $DB_con->prepare('SELECT * FROM tbl_siswa WHERE nis=:nis');
                $stmt->bindparam(':nis',$_POST['nis']);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($result['nis']==$nis) {
                    echo "<script> alert('Nomer NIS ($nis) sudah ada') </script>";
                    echo "<meta http-equiv='refresh' content='0; url=?module=siswa_input'>";
                }else{

                  $siswa->create($nis,$nisn,$nama_siswa,$alamat,$no_telp,$tempat_lahir,$tgl_lahir,$nama_orang_tua,$sekolah_asal,$nomor_peserta,$tahun_lulus,$kepala_sekolah,$nomor_ijazah,$nilai_rata_rata,$nama_jurusan,$keterangan,$nama_file,$guru);
                  echo "<script> alert('Data Berhasil di tambah') </script>";
                  echo "<meta http-equiv='refresh' content='0; url=?module=siswa&msg=success'>";
                  // header('location:?module=siswa&msg=success');

                }
              }

            }
          }
          ?>

          <div class="col-md-12">
            <form method="POST" enctype="multipart/form-data" action="">
              <table class="table table-bordered">
                <tr>
                  <td>NIS</td>
                  <td><input class="form-control" type="text" name="nis" placeholder="Nomor Induk Siswa.." required></td>
                </tr>
                <tr>
                  <td>NISN</td>
                  <td><input class="form-control" type="text" name="nisn" placeholder="Nomor Induk Siswa Nasional.." required></td>
                </tr>
                <tr>
                  <td>Nama</td>
                  <td><input class="form-control" type="text" name="nama_siswa" placeholder="Nama Siswa.." required></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td><textarea class="form-control" name="alamat"></textarea></td>
                </tr>
                <tr>
                  <td>No. Telp</td>
                  <td><input class="form-control" type="text" name="no_telp" placeholder="Nomor Telp.." required></td>
                </tr>
                <tr>
                  <td>Jurusan</td>
                  <td>
                    <select class="form-control" name="nama_jurusan" style="width: 300px">
                      <option>-Pilih Jurusan-</option>  
                      <?php 
                      $query = "SELECT * FROM tbl_jurusan";
                      foreach ($siswa->showData($query) as $value) {
                        ?>
                        <option value="<?=$value['nama_jurusan']?>"><?=$value['nama_jurusan'];?></option>
                        <?php
                      }
                      ?>                  
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Tempat Lahir</td>
                  <td><input class="form-control" type="text" placeholder="Tempat Lahir.." name="tempat_lahir"></td>
                </tr>
                <tr>
                  <td> Tanggal Lahir</td>
                  <td><input class="form-control" type="date" name="tgl_lahir" placeholder="tttt/bb/hh"></td>
                </tr>
                <tr>
                  <td>Nama Orang Tua</td>
                  <td><input class="form-control" type="text" placeholder="Nama Orang Tua.." name="nama_orang_tua"></td>
                </tr>
                <tr>
                  <td>Sekolah Asal</td>
                  <td><input class="form-control" type="text" placeholder="Sekolah Asal.." name="sekolah_asal"></td>
                </tr>
                <tr>
                  <td>Nomor Peserta</td>
                  <td><input class="form-control" type="text" placeholder="Nomor Peserta.." name="nomor_peserta"></td>
                </tr>
                <tr>
                  <td>Tahun Lulus</td>
                  <td><input class="form-control" type="date" placeholder="tttt/bb/hh" name="tahun_lulus"></td>
                </tr>
                <tr>
                  <td>Kepala Sekolah</td>
                  <td><input class="form-control" type="text" placeholder="Kepala Sekolah.." name="kepala_sekolah"></td>
                </tr>
                <tr>
                  <td>Nomor Ijazah</td>
                  <td><input class="form-control" type="text" placeholder="No. DN-XX Mk XXXXXXXX" name="nomor_ijazah"></td>
                </tr>
                <tr>
                  <td>Nilai Rata-rata</td>
                  <td><input class="form-control" type="text" placeholder="Nilai Rata-rata" name="nilai_rata_rata"></td>
                </tr>
                <tr>
                  <td>Keterangan</td>
                  <td><textarea class="form-control" name="keterangan"></textarea></td>
                </tr>
                <tr>
                  <td>Foto</td>
                  <td><input type="file" name="foto">
                  <font color="red"> *contoh format nama file: tahunlulus_jurusan_nama.jpg/png</font></td>
                </tr>

                <tr>
                  <td colspan="2" align="center">
                    <button type="submit" class="btn btn-primary" name="btn-save">
                      <span class="glyphicon glyphicon-plus"></span> Simpan
                    </button>
                    <a href="?module=siswa" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp;Kembali</a>
                  </td>
                </tr>
              </table>
            </form>
          </div>

  			</div>

  		</div>
  	</div>

  </body>