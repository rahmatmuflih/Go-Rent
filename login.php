<?php
  session_start();
  include('./inc/customer/koneksi.php');
  if(isset($_POST['login'])){
    $email=$_POST['Email'];
    $password=md5($_POST['Password']);
    $sql ="SELECT * FROM users WHERE Email='".$email."' and Password='".$password."'";
    $query=mysqli_query($con,$sql);
    if(mysqli_num_rows($query)> 0){
      $row = mysqli_fetch_assoc($query);
      $_SESSION["id_user"]=$row["id_user"];
      $_SESSION["NamaLengkap"]=$row["NamaLengkap"];

      if(isset($_GET['location'])){
        echo "<script type='text/javascript'> document.location = '".$_GET['location']."'; </script>";
      } else{
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
      }
    } else{
      echo "<script>alert('Login Gagal. Email/Password salah!');</script>";
    }
  }
?>
<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Go! Rent &mdash; Rental Mobil</title>

  <link rel="shortcut icon" href="./assets/img/logo-light-favicon.png" type="image/x-icon" />

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Template CSS -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/components.css">
</head>

<body>
  <div id="app" style='bottom: 0px;'>
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand logo">
              <img src="./assets/img/logo.png" alt="" style="width:150px;height:50px;">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                <form method="post" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="Email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="Password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" name="login" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center" style="margin-bottom: 50px;">
              Belum Punya Akun? <a href="register_form.php">Buat Sekarang</a>
            </div>  
          </div>
        </div>
      </div>
    </section>
  </div>
</body>
</html>