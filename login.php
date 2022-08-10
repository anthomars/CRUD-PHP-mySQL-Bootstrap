<?php 

session_start();

include 'config/app.php';

// cek apakah tombol logi ditekan
if(isset($_POST['login'])) {
  //ambil input username & password
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  //cek username
  $result = mysqli_query($db, "SELECT * FROM akun WHERE username = '$username'");

  

  //jk ada user
  if(mysqli_num_rows($result) == 1){
    //cek password
    $hasil = mysqli_fetch_assoc($result);

    if(password_verify($password, $hasil['password'])) {
      //set session
      $_SESSION['login']    = true;
      $_SESSION['id_akun']  = $hasil['id_akun'];
      $_SESSION['nama']     = $hasil['nama'];
      $_SESSION['username'] = $hasil['username'];
      $_SESSION['email']    = $hasil['email'];
      $_SESSION['level']    = $hasil['level'];

      //jk login benar     
      if($_SESSION["level"] == 1 or $_SESSION["level"] == 2) {
        header("Location: index.php");
      } else {
        header("Location: mahasiswa.php");
      }
      exit;
    }
  }
  //jk tdk ada user / login salah
  $error = true;
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>
    
    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
    <main class="form-signin w-100 m-auto">
        <form action="" method="POST">
            <img class="mb-4" src="assets/img/logo.png" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">USER LOGIN</h1>

            <?php if(isset($error)) : ?>
                <div class="alert alert-danger text-center">
                    <b>Username/Password SALAH</b>
                </div>
            <?php endif; ?>
                

            <div class="form-floating">
                <input type="text" name="username" class="form-control" id="floatingInput"  placeholder="Username" required>
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>

            <!-- <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
            </div> -->
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Login</button>
            <p class="mt-5 mb-3 text-muted">Copyright &copy; Anthomars <?= date('Y') ?></p>
        </form>
    </main> 
  </body>
</html>
