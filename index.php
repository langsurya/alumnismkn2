<?php 
include_once 'inc/dbconfig.php';
include_once 'inc/class.login.php';
$login = new login($DB_con);

session_start();

if (isset($_POST['login'])) {
    echo $username = $_POST['username'];
    echo $password = md5($_POST['password']);

    $login->ceklogin($username,$password);
    // if ($login->ceklogin($username,$password)) {
    //     header('location: admin/');
    // }else{
    //     header('location: users/');
    // }
}   

?>

<?php include_once 'header.php'; ?>

<div class="container">
    <div class="form-login-group">
        <form method="post" action="" class="form-signin" role="form">
            <h2 class="form-signin-heading"><center>Halam Login</center></h2>
            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
            <input type="password" name="password" class="form-control" placeholder="Password" required>

            <button class="btn btn-lg btn-primary btn-block btn-login" name="login" type="submit">Sign in</button>
        </form>
    </div>
</div>