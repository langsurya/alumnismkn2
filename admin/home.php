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
  					<li><a href="?module=home"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li><a href="?module=siswa"><i class="glyphicon glyphicon-user"></i> Data Siswa</a></li>
            <li><a href="?module=jurusan"><i class="glyphicon glyphicon-th"></i> Data Jurusan</a></li>
  				</ul>
  			</div>

  			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  					
  				<!-- Wrapper for slides -->
  				<div class="carousel-inner" role="listbox">
  					<div class="item active">
  						<img src="../img/green.jpg" alt="...">
  					</div>
  					<marquee>SELAMAT DATANG DI APLIKASI PENCARIAN DATA SISWA SMK N 2 KOTA TANGERANG</marquee>
  				</div>

  				</div>

  				<!-- <h1 class="page-header">Dashboard</h1> -->

          <div id="loginbox" style="margin-top: ;" class="mainbox col-md-12">
            <div class="panel panel-info">
              <div class="panel-heading">

                <div class="pull-right col-md-12">
                  <form action="?module=home_search" method="POST">
                    <div class="input-group">
                      <input type="text" name="cari" class="form-control" placeholder="Cari NIM, Nama ..">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-default" type="button">
                          <span class="glyphicon glyphicon-search"></span>
                        </button>
                      </span>
                    </div>
                  </form>
                </div><br>
                <!-- <a class="btn btn-success" href="?module=siswa_input">> </a> --><br>

              </div>
              <div style="padding-top: 10px" class="panel-body">
                <br>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th>NIS</th>
                      <th>Nomor Ijazah</th>
                      <th>Nama</th>
                      <th>Jurusan</th>
                      <th>Lulus Tahun</th>                     
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  include_once '../inc/class.php';
                  $siswa  = new siswa;
                  $records_per_page=10;
                  if (isset($_POST['cari'])) {
                  $cari = $_POST['cari'];
                  }else{
                    $cari="";
                  }
                  $query = "SELECT * FROM tbl_siswa WHERE nama_siswa like '%$cari%' OR nomor_ijazah like '%$cari%'";
                  $newquery = $siswa->paging($query,$records_per_page);
                  // penomoran halaman data pada halaman
                  if (isset($_GET['page_no'])) {
                    $page = $_GET['page_no'];
                  }

                  if (empty($page)) {
                    $posisi = 0;
                    $halaman = 1;
                  }else{
                    $posisi = ($page - 1) * $records_per_page;
                  }
                  $no=1+$posisi;
                  foreach ($siswa->showData($newquery) as $value) {
                  ?>
                  <tr style="text-align: center;">
                    <td><?php echo $no; ?></td>
                    <td><?=$value['nis'];?></td>
                    <td><a href="?module=siswa_tampil&no_ijazah=<?=$value['nomor_ijazah']?>"><?=$value['nomor_ijazah'];?></a></td>
                    <td><?=$value['nama_siswa'];?></td>
                    <td><?=$value['nama_jurusan'];?></td>
                    <td><?=$value['tahun_lulus'];?></td>                    
                  </tr>
                  <?php
                  $no++;
                  }

                  ?>                    
                  </tbody>
                  <tr>
                    <td colspan="8" align="center">
                      <div class="pagination-wrap">
                        <?php $siswa->paginglink($query,$records_per_page); ?>
                      </div>
                    </td>
                  </tr>
                </table>
                <?php 
                $query = "SELECT * FROM tbl_siswa WHERE nama_siswa like '%$cari%'";
                echo "Jumlah Data Siswa : ";
                $siswa->jumlah($query); 
                ?>

              </div>
            </div>
          </div>

  			</div>

  		</div>
  	</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>