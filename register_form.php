
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url('assets/stisla')?>/node_modules/selectric/public/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/stisla')?>/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/stisla')?>/assets/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="<?php echo base_url('assets/stisla')?>/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
                <form method="POST" action="<?php echo base_url('register')?>">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="nama">Name</label>
                      <input id="nama" type="text" class="form-control" name="nama" autofocus>
                      <?php echo form_error('nama', '<div class="text-small text-danger">','</div>');?>
                    </div>
                    <div class="form-group col-6">
                      <label for="username">Username</label>
                      <input id="username" type="text" class="form-control" name="username">
                      <?php echo form_error('username', '<div class="text-small text-danger">','</div>');?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input id="alamat" type="text" class="form-control" name="alamat">
                    <?php echo form_error('alamat', '<div class="text-small text-danger">','</div>');?>
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label class="d-block">Gender</label>
                      <select name="gender" class="form-control" id="">
                        <option value="">-- Pilih Gender --</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>
                      <?php echo form_error('gender', '<div class="text-small text-danger">','</div>');?>
                    </div>
                    <div class="form-group col-6">
                      <label for="no_telepon" class="d-block">Nomor Telepon</label>
                      <input id="no_telepon" type="number" class="form-control" name="no_telepon">
                      <?php echo form_error('no_telepon', '<div class="text-small text-danger">','</div>');?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Nomor KTP</label>
                      <input type="number" name="no_ktp" class="form-control">
                      <?php echo form_error('no_ktp', '<div class="text-small text-danger">','</div>');?>
                    </div>
                    <div class="form-group col-6">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control">
                      <?php echo form_error('password', '<div class="text-small text-danger">','</div>');?>
                    </div>
                  </div>
                  

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                  <div class="mt-5 text-center">
                    Already have an account? <a href="<?php echo base_url('auth/login') ?>">Login.</a>
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
  <script src="<?php echo base_url('assets/stisla')?>/assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="<?php echo base_url('assets/stisla')?>/node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="<?php echo base_url('assets/stisla')?>/node_modules/selectric/public/jquery.selectric.min.js"></script>

  <!-- Template JS File -->
  <script src="<?php echo base_url('assets/stisla')?>/assets/js/scripts.js"></script>
  <script src="<?php echo base_url('assets/stisla')?>/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url('assets/stisla')?>/assets/js/page/auth-register.js"></script>
</body>
</html>
