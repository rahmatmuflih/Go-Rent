<<<<<<< HEAD
    <?php include('./inc/koneksi.php') ?>
=======
<?php 
session_start();
include('inc/customer/koneksi.php');
error_reporting(0);
?>  
   
>>>>>>> eff0eec87e37ab4060eee666d55366c338101257
    <?php include('./inc/customer/header.php');?>
    
    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
        
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Mobil Kami</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Menampilkan hasil dari mobil yang siap dirental</p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Car List Area Start ==-->
    <section id="car-list-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Car List Content Start -->
                <div class="col-lg-12">
                    <div class="car-list-content">
                        <div class="row">
                            <!-- Single Car Start -->
                            <?php
                                function rupiah($angka){
<<<<<<< HEAD
	
                                    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                                    return $hasil_rupiah;
                                     
                                }

                                $sql ='SELECT * FROM kendaraan , merek 
                                where kendaraan.Merek_kendaraan=merek.id ORDER BY kendaraan.id ASC';
                                $query=$dbh -> prepare($sql);
                                $query -> execute();
                                $results = $query -> fetchAll(PDO::FETCH_OBJ);
                                $cnt=1;
                                if($query->rowCount() > 0){
                                    foreach($results as $result){
                            ?>
                            <div class="col-lg-6 col-md-6">
                                <div class="single-car-wrap">
                                    <img class="car-list-thumb" src="./admin/img/mobil/<?php echo htmlentities($result->gambar_kendaraan); ?>" alt="ga bisa tampil euy" width='768px' height='432px'>
                                    <div class="car-list-info without-bar">
                                        <h2><?php echo htmlentities($result->Nama_kendaraan); ?></h2>
                                        <h5><?php echo rupiah($result->Harga_perhari); ?>/hari</h5>
                                        <ul class="car-info-list">
                                            <li> AC <br>
                                            <?php 
                                                if(htmlentities($result->AirConditioner)==1){
                                                    echo 'Tersedia';
                                                } else{
                                                    echo 'Tidak Tersedia';
                                                }
                                            ?>
                                            </li>
                                            <li> Bahan Bakar <br>
                                            <?php echo htmlentities($result->Bahanbakar); ?>
                                            </li>
                                            <li> Transmisi <br>
                                            <?php echo htmlentities($result->transmisi); ?>
                                            </li>
                                            <li> Multimedia <br>
                                            <?php 
                                                if(htmlentities($result->Multimedia)==1){
                                                    echo 'Tersedia';
                                                } else{
                                                    echo 'Tidak Tersedia';
                                                }
                                            ?>
=======
        
                                    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                                    return $hasil_rupiah;
                                
                                } 
                                $sql = "SELECT kendaraan.*,merek.NamaMerek,merek.id as bid  from kendaraan join merek on merek.id=kendaraan.Merek_kendaraan";
                                $query = $dbh -> prepare($sql);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $cnt=1;
                                if($query->rowCount() > 0){
                                    foreach($results as $result){  
                            ?>
                            <div class="col-lg-6 col-md-6">
                                <div class="single-car-wrap">
                                    <img class="car-list-thumb" src="admin/img/mobil/<?php echo htmlentities($result->gambar_kendaraan);?>" alt="">
                                    <div class="car-list-info without-bar">
                                        <h2></h2>
                                        <h5><?php echo rupiah($result->Harga_perhari);?>/hari</h5>
                                        <ul class="car-info-list">
                                            <li> <?php if($result->status == "1"){?><div class="badge badge-success">Tersedia</div><?php ;} else { ?><div class="badge badge-danger">Tidak Tersedia</div><?php ;} ?>
                                            </li>
                                            <li> <?php if($result->AirConditioner == "1"){?>AC<?php ;} else { ?>NON AC<?php ;} ?>
                                            </li>
                                            <li> <?php echo htmlentities($result->NamaMerek)?>
                                            </li>
                                            <li> <?php echo htmlentities($result->transmisi)?>
>>>>>>> eff0eec87e37ab4060eee666d55366c338101257
                                            </li>
                                        </ul>
                                        <p class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star unmark"></i>
                                        </p>
                                        <a href="" class="rent-btn">Detail</a>
                                    </div>
                                </div>
                            </div>
<<<<<<< HEAD
                            <?php $cnt=$cnt+1; }} ?>
=======
                            <?php }} ?>
>>>>>>> eff0eec87e37ab4060eee666d55366c338101257
                            <!-- Single Car End -->
                        </div>
                    </div>
                </div>
                <!-- Car List Content End -->
            </div>
            <!-- Page Pagination Start -->
            <div class="page-pagi">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Page Pagination End -->
        </div>
    </section>
    <!--== Car List Area End ==-->
    <?php include('./inc/customer/footer.php');?>