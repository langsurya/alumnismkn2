<?php include_once 'header.php'; 
include_once '../inc/class.php';
$siswa = new siswa;

if (isset($_POST['btn-save'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $nama = $_POST['nama'];
  $level = $_POST['level'];

  if ($siswa->users_tambah($username,$password,$nama,$level)) {
    header('location:?module=users&msg=success');
  }
}
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
  					<li><a href="#">MENU UTAMA <span class="sr-only">(current)</span></a></li>
            <div class="page"></div>
  					<li><a href="?module=home"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li><a href="?module=siswa"><i class="glyphicon glyphicon-user"></i> Data Siswa</a></li>
            <li><a href="?module=jurusan"><i class="glyphicon glyphicon-th"></i> Data Jurusan</a></li>
            <li class="active"><a href="?module=users"><i class="glyphicon glyphicon-list"></i> Data Users</a></li>
  				</ul>
  			</div>

  			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  				
          <div class="col-sm-12">
            <h2>Tambah Data Users</h2>
            <hr>
          </div>

          <div class="col-md-12">
            <form method="POST" enctype="multipart/form-data" action="">
              <table class="table table-bordered">
                <tr>
                  <td>USERNAME</td>
                  <td><input class="form-control" type="text" name="username" placeholder="NIP GURU.." required></td>
                </tr>
                <tr>
                  <td>PASSWORD</td>
                  <td><input class="form-control" type="text" name="password" placeholder="PASSWORD.." required></td>
                </tr>
                <tr>
                  <td>NAMA</td>
                  <td><input class="form-control" type="text" name="nama" placeholder="NAMA.." required></td>
                </tr>
                <tr>
                  <td>LEVEL</td>
                  <td>
                  <select class="form-control" name="level">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                  </select>
                  </td>
                </tr>

                <tr>
                  <td colspan="2" align="center">
                    <button type="submit" class="btn btn-primary" name="btn-save">
                      <span class="glyphicon glyphicon-plus"></span> Simpan
                    </button>
                    <a href="?module=jurusan" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp;Kembali</a>
                  </td>
                </tr>

              </table>
            </form>
          </div>

  			</div>

  		</div>
  	</div>

  </body>