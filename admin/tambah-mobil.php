<?php
session_start();
error_reporting(0);
include('../inc/koneksi.php');
if(strlen($_SESSION['alogin'])==0){	
    header('location:index.php');
}
else{
    if(isset($_POST['submit'])){
        $namamobil = $_POST['namamobil'];
        $merekmobil = $_POST['merekmobil'];
        $deskripsi = $_POST['deskripsi'];
        $harga = $_POST['harga'];
        $bahanbakar = $_POST['bahanbakar'];
        $tahun = $_POST['tahun'];
        $transmisi = $_POST['transmisi'];
        $ac = $_POST['ac'];
        $multimedia = $_POST['multimedia'];
        $gambar = $_FILES["gambar"]["name"];
        move_uploaded_file($_FILES["gambar"]["tmp_name"],"img/mobil/".$_FILES["gambar"]["name"]);

        $sql = "INSERT INTO kendaraan(Nama_kendaraan,Merek_kendaraan,Deskripsi,Bahanbakar,Tahun_kendaraan,transmisi,gambar_kendaraan,AirConditioner,Multimedia,Harga_perhari) VALUES(:namamobil,:merekmobil,:deskripsi,:bahanbakar,:tahun,:transmisi,:gambar,:ac,:multimedia,:harga)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':namamobil',$namamobil,PDO::PARAM_STR);
        $query->bindParam(':merekmobil',$merekmobil,PDO::PARAM_STR);
        $query->bindParam(':deskripsi',$deskripsi,PDO::PARAM_STR);
        $query->bindParam(':bahanbakar',$bahanbakar,PDO::PARAM_STR);
        $query->bindParam(':tahun',$tahun,PDO::PARAM_STR);
        $query->bindParam(':transmisi',$transmisi,PDO::PARAM_STR);
        $query->bindParam(':gambar',$gambar,PDO::PARAM_STR);
        $query->bindParam(':ac',$ac,PDO::PARAM_STR);
        $query->bindParam(':multimedia',$multimedia,PDO::PARAM_STR);
        $query->bindParam(':harga',$harga,PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if($lastInsertId){
            $msg="Data mobil berhasil ditambahkan!.";
        }else{
            $error="Terjadi Kesalahan, Silahkan ulang kembali";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Tambah Mobil</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="../node_modules/summernote/dist/summernote-bs4.css">
  <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <!--<li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>-->
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="../assets/img/admin.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, Administrator</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Menu</div>
              <a href="ubah-password.php" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Change Password
              </a>
              <!-- <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a> -->
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <!--SIDE BAR DISINI ⬇-->
      <?php include('../inc/sidebar.php');?>

    <!-- Main Content -->
    <div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Tambah Mobil</h1>
        </div>
        <div class="card">
            <div class="card-body">
            <?php if($error){?><div class="alert alert-danger alert-dismissible fade show" role="alert">:<?php echo htmlentities($error); ?> </div><?php } 
				    else if($msg){?><div class="alert alert-success alert-dismissible fade show" role="alert"><?php echo htmlentities($msg); ?> </div><?php }?>
            <form action="" method="post" onSubmit="return valid();" enctype="multipart/form-data">
            <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Mobil</label>
                            <input type="text" name="namamobil" class="form-control" placeholder="contoh agya,fortuner,brio dll" required>
                        </div>
                        <div class="form-group">
                            <label for="">Harga/hari</label>
                            <input type="text" name="harga" class="form-control" placeholder="Masukan harga rental perhari" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tahun Produksi</label>
                            <input type="text" name="tahun" class="form-control" placeholder="Masukan Tahun produksi kendaraan" required>
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <textarea type="text" name="deskripsi" class="form-control" row="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">AKSESORIS</label>
                            <div class="row">
                            <div class="col-md-6">
                                <select name="ac" class="form-control" required>
                                <option value="">--AC--</option>
                                <option value="1">Tersedia</option>
                                <option value="0">Tidak Tersedia</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select name="multimedia" class="form-control" required>
                                <option value="">--Multimedia--</option>
                                <option value="1">Tersedia</option>
                                <option value="0">Tidak Tersedia</option>
                                </select>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Merek Mobil</label>
                            <select name="merekmobil" class="form-control" required>
                            <option value="">--Pilih Type Mobil--</option>
                            <?php $ret="select id,NamaMerek from merek";
                                $query= $dbh -> prepare($ret);
                                //$query->bindParam(':id',$id, PDO::PARAM_STR);
                                $query-> execute();
                                $results = $query -> fetchAll(PDO::FETCH_OBJ);
                                if($query -> rowCount() > 0){
                                    foreach($results as $result)
                                {
                            ?>
                            <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->NamaMerek);?></option>
                            <?php }} ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Bahan Bakar</label>
                            <select name="bahanbakar" class="form-control" required>
                            <option value="">--Pilih Bahan Bakar--</option>
                            <option value="SOLAR">SOLAR</option>
                            <option value="PERTALITE">PERTALITE</option>
                            <option value="PERTAMAX">PERTAMAX</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Transmisi</label>
                            <select name="transmisi" class="form-control" required>
                            <option value="">--Pilih Transmisi--</option>
                            <option value="AUTO">AUTO</option>
                            <option value="MANUAL">MANUAL</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Gambar</label>
                            <input type="file" name="gambar" class="form-control" required>
                        </div>
                            <button Type="submit" name="submit" class="btn btn-primary mt-4">Simpan</button>
                            <button Type="reset" class="btn btn-danger mt-4">Reset</button>
                    </div>    
                </div>
            </form>
            </div>
        </div>
    </section>
</div>
<?php include('../inc/footer.php');?>
<?php  }?>