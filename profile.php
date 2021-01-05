<?php 
  include('./inc/customer/header.php');
  // include('./inc/customer/koneksi.php');
  include('./inc/koneksi.php');
  if ($_SESSION['id_user']=='') {
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
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
  if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];
    $ktp = $_POST['ktp'];
    $alamat = $_POST['alamat'];
    $id = $_SESSION["id_user"];
    $qquery= "UPDATE users SET NamaLengkap=:nama,Email=:email,no_telepon=:telepon,no_ktp=:ktp,alamat=:alamat WHERE id_user=:id";
    $query = $dbh->prepare($qquery);
    $query->bindParam(':email',$email);
    $query->bindParam(':nama',$nama);
    $query->bindParam(':telepon',$telepon);
    $query->bindParam(':ktp',$ktp);
    $query->bindParam(':alamat',$alamat);
    $query->bindParam(':id',$id);
    $query->execute();
    ?>
      <script>alert("Data berhasil diupdate!!");</script>
    <?php
  }
  if(isset($_POST['submitpass']))
    {
        $email = $_POST['email'];
        $password=md5($_POST['password']);
        $newpassword=md5($_POST['newpassword']);
        $sql ="SELECT Password FROM users WHERE Email=:email and Password=:password";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':email', $email, PDO::PARAM_STR);
        $query-> bindParam(':password', $password, PDO::PARAM_STR);
        $query-> execute();
        $results = $query -> fetchAll(PDO::FETCH_OBJ);
        if($query -> rowCount() > 0)
        {
            $con="update users set Password=:newpassword where Email=:email";
            $chngpwd1 = $dbh->prepare($con);
            $chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
            $chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
            $chngpwd1->execute();
            ?>
            <script>alert("Password berhasil diupdate!!");</script>
            <?php
        }
        else {
          ?>
          <script>alert("Your current password is not valid.");</script>
          <?php
        }
    }
?>

<style>
  .edit{
    height:200px;
  }
  .page-heading h1{
    margin-top:-220px;
  }
  .container-tab{
    border:#eeeeee 1px solid;
    width:972px;
    margin-left:50px;
  }
  .tab{
    background-color:#eeeeee;
    width:972px;
    height:60px;
    position:relative;
    right:15px;
  }
  .nav-tabs>li>a:hover{
    border-color:#6777ef;
    color:white;
  }
  .nav-tabs > li a{
    background: #eeeeee none repeat scroll 0 0;
    color:#555;
    height:60px;
    padding-top:20px;
    width:200px;
  }
  .tab-content{
    margin:30px;
  }
  .table>thead>tr>th,.table>tbody>tr>td,.table>tbody>tr>th{
    border:0;
  }
  .head{
    font-weight:bold;
  }
  .actions{
    position:relative;
    text-align:right;
    /* left:680px; */
  }
</style>
<script type="text/javascript">
    function valid()
    {
    if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
    {
    alert("Password baru dan konfirmasi password salah!!");
    document.chngpwd.confirmpassword.focus();
    return false;
    }
    return true;
    }
</script>

<!--Page Header-->
<section id='page-title-area' class="page-header edit" style='margin-top:80px;'>
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Dashboard Profile</h1>
      </div>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<section class="user_profile inner_pages">
  <div class="container">
    <div class="user_profile_info gray-bg padding_4x4_40">
      <div class="upload_user_logo"> 
        <i class="fas fa-user" style='font-size:50pt'></i>
      </div>
      <div class="dealer_info" style='position:relative;right:100px;'>
        <h4>
          <?php
            $nama = $_SESSION['NamaLengkap'];
            echo $nama;
          ?>
        </h4>
      </div>
      <marquee scrolldelay="200">Silahkan cek status pesanan, jika status pesanan terkonfirmasi silahkan datang ke gerai kami.</marquee>
    </div>
  
    <div class="row">
      <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
          <div class="container container-tab">
            <ul class="nav nav-tabs tab">
              <li class="active"><a href="#profile" data-toggle='tab'>Profil</a></li>
              <!-- <li><a href="#transaction" data-toggle='tab'>Status Pesanan</a></li> -->
              <li><a href="#history" data-toggle='tab'>Order Status</a></li>
            </ul>
            <div class="tab-content">
              <div id="profile" class='tab-pane fade in active tab-content'>
                <table class='table' style='width:300px;'>
                  <?php
                    $qprofil = "SELECT * FROM users WHERE id_user=:id_user";
                    $profil = $dbh->prepare($qprofil);
                    $profil-> bindParam(':id_user',$_SESSION['id_user'], PDO::PARAM_STR);
                    $profil->execute();
                    // $result=$profil->get_result();
                    while($res=$profil->fetch()){
                  ?>
                  <tr>
                    <td class='head'>Email</td>
                    <td><?php echo $res['Email']; ?></td>
                  </tr>
                  <tr>
                    <td class="head">No Telepon</td>
                    <td><?php echo $res['no_telepon']; ?></td>
                  </tr>
                  <tr>
                    <td class="head">No KTP</td>
                    <td><?php echo $res['no_ktp']; ?></td>
                  </tr>
                  <tr>
                    <td class="head">Alamat</td>
                    <td><?php echo $res['alamat']; ?></td>
                  </tr>
                </table>
                <div class="actions">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#MyModal<?php echo $res['id_user'];?>">Ubah Password</button> | <button class="btn btn-md-primary w-10" data-toggle="modal" data-target="#ChaneProfile<?php echo $res['id_user'];?>">Ubah Profile</button>
                </div>
              </div>
              <!-- MODAL UPDATE PASSWORD-->
              <div class="modal fade" id="MyModal<?php echo $res['id_user'];?>">
                <div class="modal-dialog" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Update Password</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form name="chngpwd" action="" role="form" method="post" onSubmit="return valid();">
                                <div class="form-group">
                                    <label for="">Password Sebelumnya</label>
                                    <input type="password" name="password" class="form-control" required>
                                    <input type="hidden" name="email" value="<?= $res['Email'];?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Password Baru</label>
                                    <input type="password" name="newpassword" class="form-control" required>
                                </div>
                                <div class="form-group">
                                        <label for="">Konfirmasi Password</label>
                                        <input type="password" name="confirmpassword" class="form-control" required>
                                </div>
                                <button Type="submit" name="submitpass" class="btn btn-primary w-100">Save</button>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.END modal UPDATE PASSWORD -->
            <!-- MODAL UPDATE PROFILE-->
            <div class="modal fade" id="ChaneProfile<?php echo $res['id_user'];?>">
                <div class="modal-dialog" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Update Profile</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" role="form" method="post" onSubmit="return valid();">
                                <div class="form-group">
                                    <label for="">Nama </label>
                                    <input type="text" name="nama" value="<?= $res['NamaLengkap'];?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" value="<?= $res['Email'];?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Telepon</label>
                                    <input type="number" name="telepon" value="<?= $res['no_telepon'];?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">KTP</label>
                                    <input type="number" name="ktp" value="<?= $res['no_ktp'];?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea type="text" name="alamat" class="form-control" required><?= $res['alamat'];?></textarea>
                                </div>
                                <button Type="submit" name="submit" class="btn btn-primary w-100">Save</button>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.END modal UPDATE -->
              <?php } ?>
              <div id="history" class='tab-pane fade tab-content'>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Mobil</th>
                      <th scope="col">Tanggal Pemesanan</th>
                      <th scope="col">Tanggal Kembali</th>
                      <th scope="col">Total</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
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
                      kendaraan.id=transaksi.id_kendaraan LEFT JOIN users ON transaksi.userEmail=users.id_user
                      WHERE id_user=:id_user";
                      $status = $dbh->prepare($qstatus);
                      $status-> bindParam(':id_user',$_SESSION['id_user'], PDO::PARAM_STR);
                      // $status-> bindParam(':tanggal',$tanggal, PDO::PARAM_STR);
                      $status->execute();
                      while($res=$status->fetch()){
                    ?>
                    <tr>
                      <th scope="row"><?php echo $nomor;?></th>
                      <td><?php echo $res['Nama_kendaraan'];?></td>
                      <td><?php echo $res['tanggal_pemesanan'];?></td>
                      <td><?php echo $res['tanggal_kembali'];?></td>
                      <td><?php
                      $pemesanan = date_create($res['tanggal_pemesanan']); 
                      $kembali = date_create($res['tanggal_kembali']); 
                      $diff  = date_diff( $kembali,$pemesanan );
                      $totalDays =  $diff->days;
                      $total = $totalDays*$res['Harga_perhari'];
                      echo rupiah($total) ;?></td>
                      <td>
                        <?php
                          if($res['status_transaksi']==1){
                            echo 'Terkonfirmasi';
                          } if($res['status_transaksi']==2){
                            echo 'Cenceled';
                          }else{
                            echo 'Tunggu Konfirmasi';
                          }
                        ?>
                      </td>
                      <td><a href="profile.php?cencel=<?php echo $res['id_transaksi'];?>" onclick="return confirm('Do you really want to Cancel this Booking')"> Cancel</a></td>
                    </tr>
                    <?php $nomor=$nomor+1;}?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include('./inc/customer/footer.php');?>