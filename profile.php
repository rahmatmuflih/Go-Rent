<?php 
  include('./inc/customer/header.php');
  include('./inc/customer/koneksi.php');
  if ($_SESSION['id_user']=='') {
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
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
    left:680px;
  }
</style>

<!--Page Header-->
<section id='page-title-area' class="page-header edit" style='margin-top:80px;'>
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Profile Anda</h1>
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
        <h5>
          <?php
            $nama = $_SESSION['NamaLengkap'];
            echo $nama;
          ?>
        </h5>
      </div>
    </div>
  
    <div class="row">
      <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
          <div class="container container-tab">
            <ul class="nav nav-tabs tab">
              <li class="active"><a href="#profile" data-toggle='tab'>Profil</a></li>
              <li><a href="#transaction" data-toggle='tab'>Belum Dibayar</a></li>
              <li><a href="#rent" data-toggle='tab'>Sudah Dibayar</a></li>
              <li><a href="#history" data-toggle='tab'>Riwayat Pesan</a></li>
            </ul>
            <div class="tab-content">
              <div id="profile" class='tab-pane fade in active tab-content'>
                <table class='table' style='width:300px;'>
                  <?php
                    $query = $con->prepare("SELECT id_user,NamaLengkap,no_telepon,
                    no_ktp,alamat FROM users WHERE id_user=?");
                    $query->bind_param('i',$_SESSION['id_user']);
                    $query->execute();
                    $result=$query->get_result();
                    while($res=$result->fetch_assoc()){
                  ?>
                  <tr>
                    <td class='head'>Nama Akun</td>
                    <td><?php echo $res['NamaLengkap']; ?></td>
                  </tr>
                  <tr>
                    <td class="head">Nomor Telepon</td>
                    <td><?php echo $res['no_telepon']; ?></td>
                  </tr>
                  <tr>
                    <td class="head">Nomor KTP</td>
                    <td><?php echo $res['no_ktp']; ?></td>
                  </tr>
                  <tr>
                    <td class="head">Alamat</td>
                    <td><?php echo $res['alamat']; ?></td>
                  </tr>
                  <?php } ?>
                </table>
                <div class="actions">
                  <a href="">Ubah Password</a> | <a href="">Edit Profil</a>
                </div>
              </div>
              <div id="transaction" class='tab-pane fade tab-content'>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Kendaraan</th>
                      <th scope="col">Tanggal Pemesanan</th>
                      <th scope="col">Tanggal Kembali</th>
                      <th scope="col">Pesan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $nomor=1;
                      $sql = 'SELECT * FROM  kendaraan RIGHT JOIN transaksi ON 
                      kendaraan.id=transaksi.id_kendaraan LEFT JOIN users ON transaksi.userEmail=users.id_user
                      WHERE id_user="'.$_SESSION['id_user'].'"AND status_transaksi=0';
                      $query = mysqli_query($con,$sql);
                      if($query){
                        while($res=mysqli_fetch_assoc($query)){
                    ?>
                    <tr>
                      <th scope="row"><?php echo $nomor; ?></th>
                      <td><?php echo $res['Nama_kendaraan']; ?></td>
                      <td><?php echo $res['tanggal_pemesanan']; ?></td>
                      <td><?php echo $res['tanggal_kembali']; ?></td>
                      <td><?php echo $res['pesan']; ?></td>
                    </tr>
                    <?php $nomor=$nomor+1; }} ?>
                  </tbody>
                </table>
              </div>
              <div id="rent" class='tab-pane fade tab-content'>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Mobil</th>
                      <th scope="col">Tanggal Kembali</th>
                      <th scope="col">Pesan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $nomor=1;
                      $sql = 'SELECT * FROM  kendaraan RIGHT JOIN transaksi ON 
                      kendaraan.id=transaksi.id_kendaraan LEFT JOIN users ON transaksi.userEmail=users.id_user
                      WHERE id_user="'.$_SESSION['id_user'].'"AND status_transaksi=1';
                      $query = mysqli_query($con,$sql);
                      if($query){
                        while($res=mysqli_fetch_assoc($query)){
                    ?>
                    <tr>
                    <th scope="row"><?php echo $nomor; ?></th>
                      <td><?php echo $res['Nama_kendaraan']; ?></td>
                      <td><?php echo $res['tanggal_kembali']; ?></td>
                      <td><?php echo $res['pesan']; ?></td>
                    </tr>
                    <?php $nomor=$nomor+1; }}?>
                  </tbody>
                </table>
              </div>
              <div id="history" class='tab-pane fade tab-content'>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Mobil</th>
                      <th scope="col">Mulai Sewa</th>
                      <th scope="col">Tanggal Kembali</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $nomor=1;
                      $t=time();
                      $tanggal=date("Y-m-d",$t);
                      $sql = 'SELECT * FROM  kendaraan RIGHT JOIN transaksi ON 
                      kendaraan.id=transaksi.id_kendaraan LEFT JOIN users ON transaksi.userEmail=users.id_user
                      WHERE id_user="'.$_SESSION['id_user'].'"AND tanggal_kembali<="'.$tanggal.'"';
                      $query = mysqli_query($con,$sql);
                      if($query){
                        while($res=mysqli_fetch_assoc($query)){
                    ?>
                    <tr>
                      <th scope="row"><?php echo $nomor;?></th>
                      <td><?php echo $res['Nama_kendaraan'];?></td>
                      <td><?php echo $res['tanggal_pemesanan'];?></td>
                      <td><?php echo $res['tanggal_kembali'];?></td>
                      <td>
                        <?php
                          if($res['status_transaksi']==1){
                            echo 'Sudah Dibayar';
                          } else {
                            echo 'Belum Dibayar, Pesan lagi';
                          }
                        ?>
                      </td>
                    </tr>
                    <?php $nomor=$nomor+1;}}?>
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