<?php
  session_start();
  error_reporting(0);
  include('../inc/koneksi.php');
  if(strlen($_SESSION['alogin'])==0)
    {	
  header('location:index.php');
  }
  else{
  if(isset($_GET['del']))
  {
  $id=$_GET['del'];
  $sql = "delete from transaksi  WHERE id_transaksi=:id";
  $query = $dbh->prepare($sql);
  $query -> bindParam(':id',$id, PDO::PARAM_STR);
  $query -> execute();
  $msg="Data Berhasil dihapus";
  }
  if(isset($_REQUEST['cencel'])){
    $eid=intval($_GET['cencel']);
    $status="2";
    $sql = "UPDATE transaksi SET status_transaksi=:status WHERE id_transaksi=:eid";
    $query = $dbh->prepare($sql);
    $query -> bindParam(':status',$status, PDO::PARAM_STR);
    $query-> bindParam(':eid',$eid, PDO::PARAM_STR);
    $query -> execute();
    $msg="Booking Successfully Cancelled";
  }
  if(isset($_REQUEST['confirm'])){
    $eid=intval($_GET['confirm']);
    $status="1";
    $sql = "UPDATE transaksi SET status_transaksi=:status WHERE id_transaksi=:eid";
    $query = $dbh->prepare($sql);
    $query -> bindParam(':status',$status, PDO::PARAM_STR);
    $query-> bindParam(':eid',$eid, PDO::PARAM_STR);
    $query -> execute();
    $msg="Booking Successfully";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Manage Mobil</title>

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
  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <style>
  .modal-backdrop{
      top:unset;
  }
  </style>
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
        <h1>Data Transaksi</h1>
        </div>
        <!-- <a href="tambah-mobil.php" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah mobil</a> -->
        <?php if($error){?><div class="alert alert-danger alert-dismissible fade show" role="alert">:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="alert alert-success alert-dismissible fade show" role="alert"><?php echo htmlentities($msg); ?> </div><?php }?>
        <table id="example1" class="table table-hover table-striped table-border">
        <thead>
          <tr>
            <th>No </th>
            <th>Nama Mobil</th>
            <th>Tgl Pesan</th>
            <th>Tgl Kembali</th>
            <th>Harga/hari</th>
            <th>Total</th>
            <th>Status</th>
            <th>Aksi </th>
          </tr>
        </thead>
        <tbody>
            <?php
                function rupiah($angka){

                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                return $hasil_rupiah;
                
                }
                $nomor=1;
                // $t=time();
                // $tanggal=date("Y-m-d",$t);
                $qstatus = "SELECT * FROM  kendaraan RIGHT JOIN transaksi ON 
                kendaraan.id=transaksi.id_kendaraan LEFT JOIN users ON transaksi.userEmail=users.id_user";
                $status = $dbh->prepare($qstatus);
                // $status-> bindParam(':id_user',$_SESSION['id_user'], PDO::PARAM_STR);
                // $status-> bindParam(':tanggal',$tanggal, PDO::PARAM_STR);
                $status->execute();
                while($res=$status->fetch()){
            ?>
            <tr>
                <td><?= $nomor;?></td>
                <td><?= $res['Nama_kendaraan'];?></td>
                <td><?= $res['tanggal_pemesanan'];?></td>
                <td><?= $res['tanggal_kembali'];?></td>
                <td><?= $res['Harga_perhari']?></td>
                <td><?php
                      $pemesanan = date_create($res['tanggal_pemesanan']); 
                      $kembali = date_create($res['tanggal_kembali']); 
                      $diff  = date_diff( $kembali,$pemesanan );
                      $totalDays =  $diff->days;
                      $total = $totalDays*$res['Harga_perhari'];
                      echo rupiah($total) ;?>
                </td>
                <td>
                    <?php
                    if($res['status_transaksi']==1){
                        echo 'Terkonfirmasi';
                    }else if($res['status_transaksi']==2){
                        echo 'Cenceled';
                    }else if($res['status_transaksi']==0){
                        echo 'Tunggu Konfirmasi';
                    }
                    ?>
                </td>
              <td>
              <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#DetailModal<?php echo $res['id_transaksi'];?>">Detail</button>
                <!-- <a href="manage-pesanan.php?confirm=<?php echo $res['id_transaksi'];?>" onclick="return confirm('Do you want to delete');" class="btn btn-sm btn-primary">Detail</a> -->
                <a href="manage-pesanan.php?confirm=<?php echo $res['id_transaksi'];?>" onclick="return confirm('Do you want to confirm?');" class="btn btn-sm btn-success">Konfirmasi</a>
                <a href="manage-pesanan.php?cencel=<?php echo $res['id_transaksi'];?>" onclick="return confirm('Do you want to cencel?');" class="btn btn-sm btn-danger">Cencel</a>
                <a href="manage-pesanan.php?del=<?php echo $res['id_transaksi'];?>" onclick="return confirm('Do you want to delete');" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
            
        </tbody>
        <!-- MODAL UPDATE PROFILE-->
        <div class="modal fade" id="DetailModal<?php echo $res['id_transaksi'];?>" style="z-index=22222;">
                <div class="modal-dialog" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Detail Transaksi</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- <form action="" role="form" method="post" onSubmit="return valid();"> -->
                                <div class="form-group">
                                    <label for="">Nama | Email</label>
                                    <input type="text" value="<?= $res['NamaLengkap'];?> | <?= $res['Email'];?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">KTP</label>
                                    <input type="number" value="<?= $res['no_ktp'];?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea type="text" name="alamat" class="form-control" readonly><?= $res['alamat'];?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Mobil</label>
                                    <input type="text" value="<?= $res['Nama_kendaraan'];?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Pesan</label>
                                    <input type="text" value="<?= $res['tanggal_pemesanan'];?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Kembali</label>
                                    <input type="text" value="<?= $res['tanggal_kembali'];?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Total</label>
                                    <input type="text" value="<?= rupiah($total);?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <input type="text" value="<?php
                    if($res['status_transaksi']==1){
                        echo 'Terkonfirmasi';
                    }else if($res['status_transaksi']==2){
                        echo 'Cenceled';
                    }else if($res['status_transaksi']==0){
                        echo 'Tunggu Konfirmasi';
                    }
                    ?>" class="form-control" readonly>
                                </div>
                                <!-- <button Type="submit" name="submit" class="btn btn-primary w-100">Save</button> -->
                            <!-- </form> -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger w-100" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div></div>
            <!-- /.END modal UPDATE -->
            <?php $nomor=$nomor+1;}?>
        </table>
    </section>
</div>

<footer class="main-footer">
        <div class="footer-left">
          Copyright &copy;2020 <div class="bullet"></div> GO! Rent
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="../node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
  <script src="../node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="../node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="../node_modules/summernote/dist/summernote-bs4.js"></script>
  <script src="../node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <!-- Datatables JS File -->
  <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="../assets/js/page/index.js"></script>
  <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
<?php } ?>