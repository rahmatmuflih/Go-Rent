    <?php
        session_start();
        include('./inc/customer/koneksi.php');
        include('./inc/customer/header.php');
    ?>
    
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
                                $batas=6;
                                $pages=isset($_GET['halaman'])?(int)$_GET['halaman']:1;
                                $mulai=($pages>1)?($pages*$batas)-$batas:0;
                                $query=$con->prepare("SELECT kendaraan.id,gambar_kendaraan,
                                Nama_kendaraan,Harga_perhari,NamaMerek,AirConditioner,
                                Bahanbakar,transmisi,Multimedia,status FROM kendaraan,merek 
                                WHERE kendaraan.Merek_kendaraan=merek.id ORDER BY kendaraan.id ASC LIMIT ?,?");
                                $query->bind_param('ii',$mulai,$batas);
                                $query->execute();
                                $result=$query->get_result();
                                $total_query=mysqli_query($con,'SELECT id FROM kendaraan');
                                $total=mysqli_num_rows($total_query);
                                $pages=ceil($total/$batas);
                                while($res=$result->fetch_assoc()){

                            ?>
                            <div class="col-lg-6 col-md-6">
                                <div class="single-car-wrap">
                                    <img class="car-list-thumb" src="./admin/img/mobil/<?php echo $res['gambar_kendaraan']; ?>" alt="ga bisa tampil euy" width='768px' height='432px'>
                                    <div class="car-list-info without-bar">
                                        <h2><?php echo $res['Nama_kendaraan']; ?></h2>
                                        <h5><?php echo rupiah($res['Harga_perhari']); ?>/hari</h5>
                                        <ul class="car-info-list">
                                            <li> Merek <br>
                                                <span class='car-info-value'><?php echo $res['NamaMerek'] ?></span>
                                            </li>
                                            <li> AC <br>
                                                <span class='car-info-value'>
                                                    <?php 
                                                        if($res['AirConditioner']==1){
                                                            echo 'Tersedia';
                                                        } else{
                                                            echo 'Tidak Tersedia';
                                                        }
                                                    ?>
                                                </span>
                                            </li>
                                            <li style='font-size:11pt;'> Bahan Bakar <br>
                                                <span class='car-info-value'style='font-size:10pt;'><?php echo $res['Bahanbakar']; ?></span>
                                            </li>
                                            <li> Transmisi <br>
                                                <span class='car-info-value'><?php echo $res['transmisi']; ?></span>
                                            </li>
                                            <li> Multimedia <br>
                                                <span class='car-info-value'>
                                                    <?php 
                                                        if($res['Multimedia']==1){
                                                            echo 'Tersedia';
                                                        } else{
                                                            echo 'Tidak Tersedia';
                                                        }
                                                    ?>
                                                </span>
                                            </li>
                                        </ul>
                                        <?php 
                                            if($res['status']==1){
                                                echo '<div class="badge bg-success status">Tersedia</div>';
                                            } else{
                                                echo '<div class="badge bg-danger status">Tidak Tersedia</div>';
                                            }
                                        ?>
                                        <a href="detail_mobil.php?vhid=<?php echo $res['id'];?>" class="rent-btn">Detail</a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
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
                        <li class="page-item"><a class="page-link" href="?halaman=
                        <?php
                            if(($_GET['halaman'])>1){
                                echo $_GET['halaman']-1;
                            }else{
                                echo 1;
                            }
                        ?>">Previous</a></li>
                        <?php for ($i=1; $i <= $pages ; $i++) { ?>
                            <li 
                            <?php
                                if(isset($_GET['halaman'])){
                                    if ($_GET['halaman']==$i) {
                                        echo'class="page-item active"';
                                    } else{
                                        echo'class="page-item"';
                                    }
                                } else{
                                    $_GET['halaman']=1;
                                    echo'class="page-item active"';
                                }
                            ?>
                            ><a class="page-link data-toggle='tab'" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php } ?>
                        <li class="page-item"><a class="page-link" href="?halaman=
                        <?php
                            if(($_GET['halaman'])>=1 && ($_GET['halaman'])<$pages) {
                                echo $_GET['halaman']+1;
                            } else{
                                echo $pages;
                            }
                        ?>">Next</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Page Pagination End -->
        </div>
    </section>
    <!--== Car List Area End ==-->
    <?php include('./inc/customer/footer.php');?>