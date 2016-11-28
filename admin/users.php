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
            <li><a href="?module=siswa"><i class="glyphicon glyphicon-user"></i> Data Siswa</a></li>
            <li><a href="?module=jurusan"><i class="glyphicon glyphicon-th"></i> Data Jurusan</a></li>
            <li class="active"><a href="?module=users"><i class="glyphicon glyphicon-list"></i> Data Users</a></li>
  				</ul>
  			</div>

  			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  				
          <div class="col-sm-12">
            <h2>Data Users</h2>
            <hr>
          </div>

          <div id="loginbox" style="margin-top: ;" class="mainbox col-md-12">
            <div class="panel panel-info">
              <div class="panel-heading">
                <a class="btn btn-success" href="?module=users_input"><span class="glyphicon glyphicon-plus"></span> Tambah Users</a>
               <!--  <div class="pull-right col-md-4">
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
                </div> -->

              </div>
              <div style="padding-top: 10px" class="panel-body">
                <br>
                <?php 
          if (isset($_GET['msg'])) {
            if ($_GET['msg']=="success") {
              $msg="
              <div class=\"alert alert-success\">
              <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
              <strong>Success!</strong> Data berhasil di tambah.
              </div>
              ";
            }elseif ($_GET['msg']=="delete") {
              $msg="
              <div class=\"alert alert-danger\">
              <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
              <strong>Success!</strong> Data berhasil di hapus.
              </div>
              ";
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
                      <th>ID Users</th>
                      <th>Username</th>
                      <th>Nama Users</th>
                      <th>Level</th>
                      <th style="text-align: center;" colspan="2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  include_once '../inc/class.php';
                  $siswa = new siswa;
                  $records_per_page=5;
                  $query = "SELECT * FROM users";
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
                      <td><?=$value['id_user']; ?></td>
                      <td><?=$value['username']; ?></td>
                      <td><?=$value['nama']; ?></td>
                      <td><?=$value['level']; ?></td>
                      <td>
                        <a href="?module=users_edit&id=<?=$value['id_user']?>" title="edit"><span class="glyphicon glyphicon-edit"></span></a>
                      </td>
                      <td>
                        <a href="?module=delete&id_user=<?php print($value['id_user']) ?>" onclick="return confirm('Anda yakin ingin menghapus data user <?php echo $value['nama']; ?> ?')" title="Hapus"><span class="glyphicon glyphicon-remove"></span></a>
                      </td>
                    </tr>
                    <?php
                    $no++;
                  }

                  ?>
                  </tbody>
                  <tr>
                    <td colspan="7" align="center">
                      <div class="pagination-wrap">
                        <?php $siswa->paginglink($query,$records_per_page); ?>
                      </div>
                    </td>
                  </tr>
                </table>
                <?php 
                $query = "SELECT * FROM users";
                echo "Jumlah Data Users : ";
                $siswa->jumlah($query); 
                ?>

              </div>
            </div>
          </div>

  			</div>

  		</div>
  	</div>

  </body>