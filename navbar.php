<?php 
session_start();
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
  		<div class="container-fluid">
  			<div class="navbar-header">
  				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="?module=home">SMK N 2 KOTA TANGERANG</a>
  			</div>
  			<div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
            <!-- <li><a href="?module=home">Dashboard</a></li> -->
            <!-- <li><a href="#">Settings</a></li> -->
            <!-- <li><a href="#">Profile</a></li> -->
            <!-- <li><a href="#">Help</a></li> -->
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="login.php"><span class="glyphicon glyphicon-log-out"></span> Login</a></li>
          </ul>
<!-- 
          <form action="?module=cari_data" method="POST" class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
          </form> -->

        </div>
  		</div>
  	</nav>