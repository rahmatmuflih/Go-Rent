<?php 
  include('./inc/customer/header.php');
  include('./inc/customer/koneksi.php');
  function rupiah($angka){
	
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
     
  }
  $vhid=intval($_GET['vhid']);
  $related_cars='car';
  $query=$con->prepare("SELECT kendaraan.id,gambar_kendaraan,
  Nama_kendaraan,Harga_perhari,NamaMerek,AirConditioner,
  Bahanbakar,transmisi,Multimedia,Deskripsi,Tahun_kendaraan FROM kendaraan,merek 
  WHERE kendaraan.Merek_kendaraan=merek.id AND kendaraan.id=?");
  $query->bind_param('i',$vhid);
  $query->execute();
  $result=$query->get_result();
  while($res=$result->fetch_assoc()){
    $related_cars=$res['NamaMerek'];
?>
<img src="./admin/img/mobil/<?php echo $res['gambar_kendaraan']; ?>" alt=""class='image-detail'>
<!--Listing-detail-->
<section class="listing-detail">
  <div class="container">
    <div class="listing_detail_head row">
      <div class="col-md-6">
        <h2><?php echo $res['Nama_kendaraan']; ?>, <?php echo $res['NamaMerek']; ?></h2>
      </div>
      <div class="col-md-6">
        <div class="price_info">
          <p> <?php echo rupiah($res['Harga_perhari']); ?> </p>Per Hari
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <div class="main_features">
          <ul>
            <li> 
              <i class="fa fa-calendar" aria-hidden="true"></i>
              <p>Tahun Produksi</p>
              <h5><?php echo $res['Tahun_kendaraan']; ?></h5>
            </li>
            <li> 
              <i class="fa fa-cogs" aria-hidden="true"></i>
              <p>Bahan Bakar</p>
              <h5><?php echo $res['Bahanbakar']; ?></h5>
            </li>
            <li> 
            <i class="fa fa-cogs" aria-hidden="true"></i>
              <p>Transmisi</p>
              <h5><?php echo $res['transmisi']; ?></h5>
            </li>
          </ul>
        </div>
        <div class="listing_more_info">
          <div class="listing_detail_wrap"> 
            <!-- Nav tabs -->
            <ul class="nav nav-tabs gray-bg" role="tablist">
              <li role="presentation" style='margin-left:0px; z-index:0;' class="active"><a href="#vehicle-overview " aria-controls="vehicle-overview" role="tab" data-toggle="tab">Deskripsi Kendaraan </a></li>
              <li role="presentation" style='margin-left:-420px;z-index:0;'><a href="#accessories" aria-controls="accessories" role="tab" data-toggle="tab">Aksesoris</a></li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content"> 
              <!-- vehicle-overview -->
              <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                <p><?php echo $res['Deskripsi']; ?></p>
              </div>
              
              <!-- Accessories -->
              <div role="tabpanel" class="tab-pane" id="accessories"> 
                <!--Accessories-->
                <table>
                  <thead>
                    <tr>
                      <th colspan="2">Aksesoris</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Air Conditioner</td>
                      <?php if ($res['AirConditioner']==1) {?>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <?php } else {?>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                    </tr>
                    <tr>
                      <td>Multimedia</td>
                      <?php if ($res['Multimedia']==1) {?>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <?php } else {?>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      <?php } ?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php }?>
      <!--Side-Bar-->
      <aside class="col-md-3">
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-envelope" aria-hidden="true"></i>Rental Sekarang</h5>
          </div>
          <form method="post">
            <div class="form-group">
              <input type="text" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)" required>
            </div>
            <div class="form-group">
              <textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
            </div>
            <div class="form-group">
              <input type="submit" class="btn"  name="submit" value="Rental Sekarang">
            </div>   
            <a href="" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Masuk Untuk Rental</a>
          </form>
        </div>
      </aside>
      <!--/Side-Bar--> 
    </div>
    
    <div class="space-20"></div>
    <div class="divider"></div>
    
    <!--Similar-Cars-->
    <div class="similar_cars">
      <h3>Mobil Dengan Merek Serupa</h3>
      <div class="row">
        <?php
          $query=$con->prepare("SELECT kendaraan.id,gambar_kendaraan,
          Nama_kendaraan,Harga_perhari,NamaMerek,Bahanbakar,transmisi,Tahun_kendaraan FROM kendaraan,merek 
          WHERE kendaraan.Merek_kendaraan=merek.id AND NamaMerek=? AND kendaraan.id!=?");
          $query->bind_param('si',$related_cars,$vhid);
          $query->execute();
          $result=$query->get_result();
          if (mysqli_num_rows($result)>0) {
            while($res=$result->fetch_assoc()){
        ?>
        <div class="col-md-4 grid_listing">
          <div class="product-listing-m gray-bg">
            <div class="product-listing-img">
              <img src="admin/img/mobil/<?php echo $res['gambar_kendaraan']; ?>" class="img-responsive" alt="image" style='height:200px;'/>
            </div>
            <div class="product-listing-content">
              <h5><?php echo $res['Nama_kendaraan']; ?>, <?php echo $res['NamaMerek']; ?></a></h5>
              <p class="list-price"><?php echo rupiah($res['Harga_perhari']); ?></p>
              <ul class="features_list">
                <li><i class="fa fa-cogs" aria-hidden="true"></i>transmisi <?php echo $res['transmisi']; ?></li>
                <li><i class="fa fa-calendar" aria-hidden="true"></i>model <?php echo $res['Tahun_kendaraan']; ?></li>
                <li><i class="fa fa-car" aria-hidden="true"></i> <?php echo $res['Bahanbakar']; ?></li>
              </ul>
              <div style='background-color:white;margin:0 -20px; padding:0 0 10px 10px;'>
                <a href="detail_mobil.php?vhid=<?php echo $res['id']; ?>" class="rent-btn">Detail</a>
              </div>
            </div>
          </div>
        </div>
        <?php }} else {?>
        <p style='margin-left:30px;'>Kami belum memiliki mobil dengan merek serupa.</p>
        <?php } ?>
      </div>
    </div>
    <!--/Similar-Cars--> 
  </div>
</section>
<!--/Listing-detail--> 

<?php include('./inc/customer/footer.php');?>