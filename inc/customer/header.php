<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="./assets/img/logo-light-favicon.png" type="image/x-icon" />

    <title>Go! Rent - Rental Mobil</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!--=== Bootstrap CSS ===-->
    <link href="./assets/shop/css/bootstrap.min.css" rel="stylesheet">
    <!--=== Vegas Min CSS ===-->
    <link href="./assets/shop/css/plugins/vegas.min.css" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="./assets/shop/css/plugins/slicknav.min.css" rel="stylesheet">
    <!--=== Magnific Popup CSS ===-->
    <link href="./assets/shop/css/plugins/magnific-popup.css" rel="stylesheet">
    <!--=== Owl Carousel CSS ===-->
    <link href="./assets/shop/css/plugins/owl.carousel.min.css" rel="stylesheet">
    <!--=== Gijgo CSS ===-->
    <link href="./assets/shop/css/plugins/gijgo.css" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="./assets/shop/css/font-awesome.css" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="./assets/shop/css/reset.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link type="text/css" href="./assets/shop/style.css" rel="stylesheet" >
    <!--=== Responsive CSS ===-->
    <link href="./assets/shop/css/responsive.css" rel="stylesheet">


    <!--Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <!--Custome Style -->
    <link rel="stylesheet" href="assets/css/customer.css" type="text/css">
    <!--OWL Carousel slider-->
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
    <!--slick-slider -->
    <link href="assets/css/slick.css" rel="stylesheet">
    <!--bootstrap-slider -->
    <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
    <!--FontAwesome Font Style -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
</head>
<body class="loader-active">

    <!--== Preloader Area Start ==-->
    <div class="preloader">
        <div class="preloader-spinner">
            <div class="loader-content">
                <img src="./assets/shop/img/preloader.gif" alt="JSOFT">
            </div>
        </div>
    </div>
    <!--== Preloader Area End ==-->

    <!--== Header Area Start ==-->
    <header id="header-area" class="fixed-top">
        <!--== Header Top Start ==-->
        <!--== Header Top End ==-->

        <!--== Header Bottom Start ==-->
        <div id="header-bottom" style='background-color:rgba(103, 119, 239,1);z-index:1;'>
            <div class="container">
                <div class="row">
                    <!--== Logo Start ==-->
                    <div class="col-lg-4">
                        <a href="index.php" class="logo">
                            <img src="./assets/img/logo-light-0.png" alt="" style='width:150px;height:50px;'>
                        </a>
                    </div>
                    <!--== Logo End ==-->

                    <!--== Main Menu Start ==-->
                    <div class="col-lg-8 d-none d-xl-block">
                        <nav class="mainmenu alignright">
                            <ul>
                                <li><a href='index.php'>Beranda</a></li>
                                <li><a href='data_mobil.php'>Mobil</a></li>
                                <?php
                                    if (isset($_SESSION['id_user'])){
                                        $nama = $_SESSION['NamaLengkap'];
                                        $nama_split=explode(' ',$nama);
                                        echo '
                                        <li><a href="">Hai, '.$nama_split[0].'</a>
                                            <ul>
                                                <li><a href="profile.php">Profil</a></li>
                                                <li><a href="logout.php?location='.urlencode($_SERVER['REQUEST_URI']).'">Logout</a></li>
                                            </ul>
                                        </li> 
                                        ';
                                    } else{
                                        echo '
                                            <li><a href="">Daftar</a></li>
                                            <li><a href="login.php?location='.urlencode($_SERVER['REQUEST_URI']).'">Masuk</a></li>
                                        ';
                                    }
                                ?>
                            </ul>
                        </nav>
                    </div>
                    <!--== Main Menu End ==-->
                </div>
            </div>
        </div>
        <!--== Header Bottom End ==-->
    </header>
    <!--== Header Area End ==-->