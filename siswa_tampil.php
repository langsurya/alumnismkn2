<?php include_once 'header.php'; ?>

	<!-- Custom style for this template -->
	<link rel="stylesheet" href="dashboard.css">
	<!-- Custom styles for this template -->
  <link href="carousel.css" rel="stylesheet">

  </head>
  <body>
  	<?php include_once 'navbar.php'; ?>

  	<div class="container-fluid">
  		<div class="row">
  			
  			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  				
  				<div class="col-sm-12">
  					<h2><span class="glyphicon glyphicon-user"></span> Data Siswa</h2>
  					<hr>
  				</div>

  				<?php 
  				include_once 'inc/class.php';
  				$siswa = new siswa;
  				

  				if (isset($_GET['no_ijazah'])) {
  					$no_ijazah = $_GET['no_ijazah'];
  					extract($siswa->getData($no_ijazah,'tbl_siswa','nomor_ijazah'));
  				}
  				?>

  				<div class="col-md-12">
  					<form method="POST" enctype="multipart/form-data" action="">
  						<table class="table table-bordered">
  							<tr>
  								<td>NIS</td>
                  <td>
                  <input class="form-control" type="text"  value="<?=$nis?>" disabled></td>
  							</tr>
                <tr>
                  <td>NISN</td>
                  <td>
                  <input class="form-control" type="text"  value="<?=$nisn?>" disabled></td>
                </tr>
  							<tr>
                  <td>ALAMAT</td>
                  <td><textarea class="form-control" disabled><?=$alamat;?></textarea></td>
                </tr>
                <tr>
                  <td>No. TELP</td>
                  <td>
                  <input class="form-control" type="text"  value="<?=$no_telp;?>" disabled></td>
                </tr>
                <tr>
                  <td>NIS</td>
                  <td>
                  <input class="form-control" type="text"  value="<?=$nis?>" disabled></td>
                </tr>
                <tr>
                  <td>JURUSAN</td>
                  <td>
                    <select class="form-control" disabled style="width: 300px">
                      <option>-Pilih Jurusan-</option>  
                      <?php 
                      $query = "SELECT * FROM tbl_jurusan";
                      foreach ($siswa->showData($query) as $value) {
                      	if($value['nama_jurusan']==$nama_jurusan){
                      		$selected = "selected";
                      	}else{
                      		$selected = "";
                      	}
                        ?>
                        <option value="<?=$value['nama_jurusan']?>" <?php print($selected); ?>><?=$value['nama_jurusan'];?></option>
                        <?php
                      }
                      ?>                  
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Tempat Lahir</td>
                  <td><input class="form-control" type="text" value="<?=$tempat_lahir;?>" disabled></td>
                </tr>
                <tr>
                  <td> Tanggal Lahir</td>
                  <td><input class="form-control" type="date" value="<?=$tgl_lahir;?>" disabled></td>
                </tr>
                <tr>
                  <td>Nama Orang Tua</td>
                  <td><input class="form-control" type="text" value="<?=$nama_orang_tua;?>" disabled></td>
                </tr>
                <tr>
                  <td>Sekolah Asal</td>
                  <td><input class="form-control" type="text" value="<?=$sekolah_asal;?>" disabled></td>
                </tr>
                <tr>
                  <td>Nomor Peserta</td>
                  <td><input class="form-control" type="text" value="<?=$nomor_peserta;?>" disabled></td>
                </tr>
                <tr>
                  <td>Tahun Lulus</td>
                  <td><input class="form-control" type="date" value="<?=$tahun_lulus;?>" disabled></td>
                </tr>
                <tr>
                  <td>Kepala Sekolah</td>
                  <td><input class="form-control" type="text" value="<?=$kepala_sekolah;?>" disabled></td>
                </tr>
                <tr>
                  <td>Nomor Ijazah</td>
                  <td><input class="form-control" type="text" value="<?=$nomor_ijazah;?>" disabled></td>
                </tr>
                <tr>
                  <td>Nilai Rata-rata</td>
                  <td><input class="form-control" type="text" value="<?=$nilai_rata_rata;?>" disabled></td>
                </tr>
                <tr>
                  <td>KETERANGAN</td>
                  <td><textarea class="form-control" disabled><?=$keterangan;?></textarea></td>
                </tr>
                <tr>
                  <td>Foto</td>
                  <td>
                  <?php 
                  if ($foto==true) {
                  	$image = 'siswa/'.$foto;
                  }else{
                  	$image = 'profile.png';
                  }
                  ?>
                  <img src="images/<?=$image;?>" class="img-responsive" alt="Cinque Terre" width="150" height="150"><input type="hidden" name="poto_lama" value="<?=$foto;?>"><br>
                  </td>
                </tr>

                <tr>
                  <td colspan="2" align="center">
                    <a href="?module=home" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp;Kembali</a>
                  </td>
                </tr>
  						</table>
  					</form>
  				</div>

  			</div>

  		</div>
  	</div>

  </body>