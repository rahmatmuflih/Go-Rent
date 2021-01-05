<?php
session_start();
error_reporting(0);
include('../inc/koneksi.php');
if(strlen($_SESSION['alogin'])==0){	
    header('location:index.php');
}
else{
    if(isset($_POST['update'])){
    $gambar=$_FILES["gambar"]["name"];
    $id=intval($_GET['imgid']);
    move_uploaded_file($_FILES["gambar"]["tmp_name"],"img/mobil/".$_FILES["gambar"]["name"]);
    $sql="update kendaraan set gambar_kendaraan=:gambar where id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':gambar',$gambar,PDO::PARAM_STR);
    $query->bindParam(':id',$id,PDO::PARAM_STR);
    $query->execute();    
    $msg="Gambar berhasil diupdate";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Update Mobil</title>

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
            <h1>Form Update Mobil</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <?php if($error){?><div class="alert alert-danger alert-dismissible fade show" role="alert">:<?php echo htmlentities($error); ?> </div><?php } 
				    else if($msg){?><div class="alert alert-success alert-dismissible fade show" role="alert"><?php echo htmlentities($msg); ?> </div><?php }?>
                <?php 
                    $id=intval($_GET['imgid']);
                    $sql ="SELECT gambar_kendaraan from kendaraan where kendaraan.id=:id";
                    $query = $dbh -> prepare($sql);
                    $query-> bindParam(':id', $id, PDO::PARAM_STR);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=1;
                    if($query->rowCount() > 0){
                        foreach($results as $result)
                    {	
                ?>
            <form method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Gambar</label>
                            <br><img src="img/mobil/<?php echo htmlentities($result->gambar_kendaraan);?>" width="300" height="200" style="border:solid 1px #000">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Gambar</label>
                            <input type="file" name="gambar" class="form-control" required>
                        </div>
                            <button Type="submit" name="update" class="btn btn-primary mt-4">Update</button>
                            <button Type="reset" class="btn btn-danger mt-4">Reset</button>
                    </div>    
                </div>
            </form>
            <?php } }?>
            </div>
        </div>
    </section>
</div>
<?php include('../inc/footer.php');?>
<?php  } ?>