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
  					<li><a href="#">MENU UTAMA <span class="sr-only">(current)</span></a></li>
            <div class="page"></div>
  					<li><a href="?module=home"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li class="active"><a href="?module=siswa"><i class="glyphicon glyphicon-user"></i> Data Siswa</a></li>
            <li><a href="?module=kelas"><i class="glyphicon glyphicon-list"></i> Data Kelas</a></li>
            <li><a href="?module=jurusan"><i class="glyphicon glyphicon-th"></i> Data Jurusan</a></li>
  				</ul>
  			</div>

  			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  				
          <div class="col-sm-12">
            <h2>Tambah Data Siswa</h2>
            <hr>
          </div>
          <?php 
          include_once '../inc/class.php';
          $siswa = new siswa;
          if (isset($_POST['btn-save'])) {
            $nis = $_POST['nis'];
            $nama_siswa = $_POST['nama_siswa'];
            $nama_jurusan = $_POST['nama_jurusan'];
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
                  <td>Nama</td>
                  <td><input class="form-control" type="text" name="nama_siswa" placeholder="Nama Siswa.." required></td>
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
                  <td><input class="form-control" type="date" name="tgl_lahir"></td>
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
                  <td><input class="form-control" type="text" placeholder="Tahun Lulus.." name="tahun_lulus"></td>
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
                  <td>Foto</td>
                  <td><input type="file" name="foto"></td>
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