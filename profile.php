<?php 
  include('./inc/customer/header.php');
  include('./inc/customer/koneksi.php');
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
  }
  .tab-content{
    margin:30px;
  }
  .table>thead>tr>th,.table>tbody>tr>td,.table>tbody>tr>th{
    border:0;
  }
</style>

<!--Page Header-->
<section id='page-title-area' class="page-header edit" style='margin-top:80px;'>
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Profile Anda</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Profile</li>
      </ul>
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
        <img src="assets/images/dealer-logo.jpg" alt="image">
      </div>

      <div class="dealer_info">
        <h5></h5>
        <p><br>
          &nbsp;</p>
      </div>
    </div>
  
    <div class="row">
      <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
          <div class="container container-tab">
            <ul class="nav nav-tabs tab">
              <li class="active"><a href="#profile" data-toggle='tab'>Profil</a></li>
              <li><a href="#transaction" data-toggle='tab'>Transaksi</a></li>
              <li><a href="#rent" data-toggle='tab'>Rental</a></li>
              <li><a href="#history" data-toggle='tab'>Riwayat</a></li>
            </ul>
            <div class="tab-content">
              <div id="profile" class='tab-pane fade in active tab-content'>
                <h3>Profil</h3>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt 
                  ut labore et dolore magna aliqua.
                </p>
              </div>
              <div id="transaction" class='tab-pane fade tab-content'>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Kendaraan</th>
                      <th scope="col">Tanggal Pemesanan</th>
                      <th scope="col">Tanggal Kembali</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $query = mysqli_query($con,"SELECT transaksi.id,id_kendaraan,tanggal_pemesanan,
                      tanggal_kembali,status FROM transaksi, kendaraan WHERE 
                      transaksi.id_kendaraan=kendaraan.id");
                      if($query){
                        while($res=mysqli_fetch_assoc($query)){
                    ?>
                    <tr>
                      <th scope="row"><?php echo $res['id'] ?></th>
                      <td><?php echo $res['Nama_kendaraan'] ?></td>
                      <td><?php echo $res['tanggal_pemesanan'] ?></td>
                      <td><?php echo $res['tanggal_kembali'] ?></td>
                      <td><?php echo $res['status'] ?></td>
                    </tr>
                    <?php }} ?>
                  </tbody>
                </table>
              </div>
              <div id="rent" class='tab-pane fade tab-content'>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">First</th>
                      <th scope="col">Last</th>
                      <th scope="col">Handle</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Jacob</td>
                      <td>Thornton</td>
                      <td>@fat</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Larry</td>
                      <td>the Bird</td>
                      <td>@twitter</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div id="history" class='tab-pane fade tab-content'>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">First</th>
                      <th scope="col">Last</th>
                      <th scope="col">Handle</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Jacob</td>
                      <td>Thornton</td>
                      <td>@fat</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Larry</td>
                      <td>the Bird</td>
                      <td>@twitter</td>
                    </tr>
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