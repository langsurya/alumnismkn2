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
            <li><a href="?module=jurusan"><i class="glyphicon glyphicon-th"></i> Data Jurusan</a></li>
            <li><a href="?module=users"><i class="glyphicon glyphicon-list"></i> Data Users</a></li>
  				</ul>
  			</div>


          <?php 
          include_once '../inc/class.php';
          $siswa = new siswa;

          if (isset($_GET['no_ijazah'])) {
            $nomor_ijazah = $_GET['no_ijazah'];
            extract($siswa->getData($nomor_ijazah,'tbl_siswa','nomor_ijazah'));
          }

          if ($foto==true) {
                    $image = 'siswa/'.$foto;
                  }else{
                    $image = 'profile.png';
                  }
          ?>

  			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  				
  				<div class="col-sm-12">
            
            <table class="" align="center">              
            <tr>
              <td>
  					<h2> <?=$nama_siswa;?></h2>
                
              </td>
            </tr>
            <tr>
              <td colspan="2"><img src="../images/<?=$image;?>" class="img-circle" alt="Cinque Terre" width="150" height="150"></td>
            </tr>
            <tr>
              <td>NIS</td>
              <td>:</td><td>&nbsp;&nbsp;</td>
              <td><?=$nis;?></td>
            </tr>
            <tr>
              <td>JURUSAN</td>
              <td>:</td><td></td>
              <td><?=$nama_jurusan;?></td>
            </tr>
            <tr>
              <td>TEMPAT LAHIR</td>
              <td>:</td><td></td>
              <td><?=$tempat_lahir;?></td>
            </tr>
            <tr>
              <td>TANGGAL LAHIR</td>
              <td>:</td><td></td>
              <td><?=$tgl_lahir;?></td>
            </tr>
            <tr>
              <td>NAMA ORANG TUA</td>
              <td>:</td><td></td>
              <td><?=$nama_orang_tua;?></td>
            </tr>
            <tr>
              <td>SEKOLAH ASAL</td>
              <td>:</td><td></td>
              <td><?=$sekolah_asal;?></td>
            </tr>
            <tr>
              <td>NOMOR PESERTA</td>
              <td>:</td><td></td>
              <td><?=$nomor_peserta;?></td>
            </tr>
            <tr>
              <td>TAHUN LULUS</td>
              <td>:</td><td></td>
              <td><?=$tahun_lulus;?></td>
            </tr>
            <tr>
              <td>KEPALA SEKOLAH</td>
              <td>:</td><td></td>
              <td><?=$kepala_sekolah;?></td>
            </tr>
            <tr>
              <td>NOMOR IJAZAH</td>
              <td>:</td><td></td>
              <td><?=$nomor_ijazah;?></td>
            </tr>
            <tr>
              <td>NILAI RATA-RATA</td>
              <td>:</td><td></td>
              <td><?=$nilai_rata_rata;?></td>
            </tr>
            <tr>
                  <td colspan="2" align="center">                   
                    <a href="?module=siswa" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp;Kembali</a>
                  </td>
                </tr>
            </table>
  					<hr>
  				</div>
  				

  			</div>

  		</div>
  	</div>

  </body>