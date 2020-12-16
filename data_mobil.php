    <?php include('./inc/koneksi.php') ?>
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
	
                                    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                                    return $hasil_rupiah;
                                     
                                }

                                $sql ='SELECT * FROM kendaraan , merek 
                                WHERE kendaraan.Merek_kendaraan=merek.id ORDER BY kendaraan.id ASC';
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
                            <?php $cnt=$cnt+1; }} ?>
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