<?php
require 'config/config.php';
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="{{ asset ('assets/dist/img/logo.jpg') }}">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" href="<?= base_url() ?>/assets/dist/img/logo.jpg">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page" >
  <div class="login-box">

    <!-- /.login-logo -->
    <div class="card">
      <div class="login-logo">
        <br>
        <h3>
          <img src="<?= base_url() ?>/assets/dist/img/logo.jpg" style="margin-top: 20px; margin-bottom: 20px;" width="150px;" height="140px;">
        <h2 style="color:khaki; font-family: system-ui;"><b>PDAM HSS</b><br></h2>
          
      </div>
      <div class="card-body login-card-body" style="background-color: white;">
        <!-- <p class="login-box-msg">Sign in to start your session</p> -->
        <?php if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') { ?>
          <div class="alert alert-danger success-alert" role="alert">
            <small><i class="fa fa-check"> <?= $_SESSION['pesan']; ?></i></small>
          </div>
        <?php $_SESSION['pesan'] = '';
        } ?>

        <form action="" method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username" required="">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user-circle"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" id="pass" placeholder="Password" required="">
            <div class="input-group-append">
              <div class="input-group-text" id="lihatpass">
                <span class="fas fa-eye" title="Lihat Password" onclick="change();"></span>
              </div>
            </div>
          </div>

          <button type="submit" name="login" class="btn btn-info btn-block btn-xm"><i class="fa fa-sign-in-alt mr-1"></i>Login</button>
          <br>
        </form>

      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>/assets/dist/js/adminlte.min.js"></script>

  <script>
    $(function() {
      setTimeout(function() {
        $(".success-alert").slideUp();
      }, 1500);
    });

    function change() {
      var x = document.getElementById('pass').type;

      if (x == 'password') {
        document.getElementById('pass').type = 'text';
        document.getElementById('lihatpass').innerHTML = '<span class="fas fa-eye" title="Lihat Password" style="color: blue;" id="lihatpass" onclick="change();"></span>';
      } else {
        document.getElementById('pass').type = 'password';
        document.getElementById('lihatpass').innerHTML = '<span class="fas fa-eye" title="Lihat Password" id="lihatpass" onclick="change();"></span>';
      }
    }
  </script>

</body>

</html>

<?php
include 'config/koneksi.php';
if (isset($_POST['login'])) {
  $user = mysqli_real_escape_string($koneksi, $_POST['username']);
  $pass = mysqli_real_escape_string($koneksi, $_POST['password']);
  $pass = md5($pass);

  $query = mysqli_query($koneksi, "SELECT * FROM user  
                     WHERE username = '$user' AND password = '$pass'");
  $row = mysqli_fetch_array($query);

  $username   = $row['username'];
  $password   = $row['password'];
  $id_user    = $row['id_user'];
  $role       = $row['role'];



  if ($user == $username && $pass == $password) {

    $_SESSION['id_user']    = $id_user;
    $_SESSION['username']   = $username;
    $_SESSION['role']       = $role;


    if ($role == "Administrator") {
      echo "<script>window.location.replace('admin/');</script>";
    } elseif ($role == "Teknisi") {
      $ptg = $koneksi->query("SELECT * FROM petugas AS p 
      LEFT JOIN user AS u ON p.id_user = u.id_user
      WHERE p.id_user = '$_SESSION[id_user]'
      ")->fetch_array();
      $_SESSION['nama_petugas']  = $ptg['nama_petugas'];
      $_SESSION['id_petugas'] = $ptg['id_petugas'];
      echo "<script>window.location.replace('teknisi/');</script>";
    } else {
    $_SESSION['pesan'] = 'Username atau Password Tidak Ditemukan';
    echo "<script>window.location.replace('login');</script>";
  }
}
}


?>