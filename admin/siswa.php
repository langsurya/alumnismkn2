<?php include_once 'header.php'; 
?>

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
            <li class="active"><a href="?module=siswa"><i class="glyphicon glyphicon-user"></i> Data Siswa</a></li>
            <li><a href="?module=kelas"><i class="glyphicon glyphicon-list"></i> Data Kelas</a></li>
            <li><a href="?module=jurusan"><i class="glyphicon glyphicon-th"></i> Data Jurusan</a></li>
  				</ul>
  			</div>

  			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  				
          <div class="col-sm-12">
            <h2>Data Siswa</h2>
            <hr>
          </div>

          <div id="loginbox" style="margin-top: ;" class="mainbox col-md-12">
            <div class="panel panel-info">
              <div class="panel-heading">
                <a class="btn btn-success" href="?module=siswa_input"><span class="glyphicon glyphicon-plus"></span> Tambah Siswa</a>
                <div class="pull-right col-md-4">
                  <form action="?module=siswa_search" method="POST">
                    <div class="input-group">
                      <input type="text" name="cari" class="form-control" placeholder="Cari NIM, Nama ..">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-default" type="button">
                          <span class="glyphicon glyphicon-search"></span>
                        </button>
                      </span>
                    </div>
                  </form>
                </div>

              </div>
              <div style="padding-top: 10px" class="panel-body">
                <br>
                <?php 
                if (isset($_GET['msg'])) {
                  if ($_GET['msg']=="success") {
                    # code...
                  }elseif ($_GET['msg']=="delete") {
                    # code...
                  }elseif ($_GET['msg']=="edit") {
                    # code...
                  }
                }

                if (isset($msg)) {
                  echo $msg;
                }
                ?>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th>NIS</th>
                      <th>Nama</th>
                      <th>Jurusan</th>
                      <th>Angkatan</th>
                      <th>Lulus Tahun</th>
                      <th style="text-align: center;" colspan="2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>


              </div>
            </div>
          </div>

  			</div>

  		</div>
  	</div>

  </body>