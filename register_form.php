<?php
  include('./inc/koneksi.php');
  if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $ktp = $_POST['ktp'];
    $password = md5($_POST['password']); 
    $sql = "INSERT INTO users(NamaLengkap,Email,Password,no_telepon,no_ktp,alamat) VALUES(:nama,:email,:password,:telepon,:ktp,:alamat)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':nama',$nama);
    $query->bindParam(':email',$email);
    $query->bindParam(':alamat',$alamat);
    $query->bindParam(':telepon',$telepon);
    $query->bindParam(':ktp',$ktp);
    $query->bindParam(':password',$password);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
      {
        echo "<script>alert('Pendaftaran berhasil. Silahkan login!');</script>";
      }
    else 
      {
        echo "<script>alert('Terjadi kesalahan. Coba lagi');</script>";
      }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register </title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="./assets/node_modules/selectric/public/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="./assets/img/logo.png" alt="" style="width:150px;height:50px;">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
                <form method="POST" action="">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="nama">Nama Lengkap</label>
                      <input id="nama" type="text" class="form-control" name="nama" autofocus required>
                    </div>
                    <div class="form-group col-6">
                      <label for="username">Email</label>
                      <input id="email" type="text" class="form-control" name="email" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" class="form-control" name="alamat" required></textarea>
                  </div>

                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Nomor KTP</label>
                      <input type="number" name="ktp" class="form-control" required>
                    </div>
                      <div class="form-group col-6">
                        <label for="telepon" class="d-block">Nomor Telepon</label>
                        <input id="telepon" type="number" class="form-control" name="telepon" required>
                      </div>
                  </div>
                  

                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                  <div class="mt-5 text-center">
                    Already have an account? <a href="login.php">Login.</a>
                </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Rental Mobil 2020
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="assets//assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="./assets/node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="./assets/node_modules/selectric/public/jquery.selectric.min.js"></script>

  <!-- Template JS File -->
  <script src="./assets/js/scripts.js"></script>
  <script src="./assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="./assets/js/page/auth-register.js"></script>
</body>
</html>
