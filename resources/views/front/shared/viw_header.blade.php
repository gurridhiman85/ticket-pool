<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{ asset('/') }}">
    <title>Product-details</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="/front/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/front/assets/css/style.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/20dd01c86d.js" crossorigin="anonymous"></script>
</head>

<body>
    <!--============================== Header Start ==============================-->
    <header id="header">
        <nav class="navbar navbar-expand-xl">
            <div class="container container1">
                <div class="nav-inside d-flex align-items-center justify-content-between">
                    <div class="navbar-brand"><img src="/front/assets/images/facebook-icon.png" alt="Logo"></div>
                    <button class="navbar-toggler collapsed d-flex align-items-center justify-content-start d-xl-none"
                        type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        <span class="nav-text">
                            <span class="nav-text-menu">Menu</span>
                            <span class="nav-text-close">Close</span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="mainNav">
                        <div class="navbar-inside ms-auto">
                            <ul class="navbar-nav">
                            <li class="nav-item active"><a class="nav-link" href="">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About us</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('product') }}">Products</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('customer-experience') }}">Customer Experience</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('viewcart') }}">View Cart </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="header-right d-flex align-items-center align-items-center">
                        <div class="nic-item d-flex flex-wrap">
                            <div class="nic-num-icon"> <img src="/front/assets/images/message-icon.png" alt="" /> </div>
                            <a class="header-page-link" href="tel: 1300 258 487"> 1300 258 487</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!--============================== Header End ==============================-->

    <!--============================== Main Start ==============================-->
    <main id="main">


        <!--==============================  Container Start ==============================-->
        <div class="content-container bg-medium-gray p-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 px-0">
                        <div class="card-shop d-flex flex-wrap align-items-center justify-content-between">
                            <div class="card-shop-logo">
                                <a class="logo" href="#!"> <img src="/front/assets/images/logo.png" alt="" /> </a>
                                <div class="card-shop-search-box">
                                    <div class="card-shop-search">
                                        <input type="text" class="searchTerm" placeholder="search...">
                                        <button type="submit" class="searchButton">
                                            <img src="/front/assets/images/search-icon.png" alt="" />
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-shop-box-2">
                                <div class="card-shop-tab">
                                    <ul class="cst-list d-flex flex-wrap align-items-center">
                                        <li class="cst-item d-flex flex-wrap align-items-center">
                                            <div class="cst-img"> <img src="/front/assets/images/person-icon.png" alt="" />
                                            </div> account
                                        </li>
                                        <li class="cst-item d-flex flex-wrap align-items-center">
                                            <div class="cst-img"> <img src="/front/assets/images/map-icon.png" alt="" />
                                            </div> order <br> tracker
                                        </li>
                                        <li class="cst-item d-flex flex-wrap align-items-center">
                                            <div class="cst-img"> <img src="/front/assets/images/shop-icon.png" alt="" />
                                            </div> (0)item
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============================== Content Container Start ==============================-->

        <!--==============================  Container Start ==============================-->
        <div class="content-container bg-gray p-0">
            <div class="card-text">
                <h5> Brands WE WORK WITH </h5>
            </div>
            <div class="container">
                <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
                    <div class="col-lg-12">
                        <div class="swiper card-image-slider d-flex flex-wrap justify-content-between align-items-baseline">
                            <div class="swiper-wrapper card-img-list ">
                                <div class="swiper-slide card-img-item"> <div class="card-img"> <img src="/front/assets/images/card-img-1.png" alt="" /> </div> </div>
                                <div class="swiper-slide card-img-item"> <div class="card-img"> <img src="/front/assets/images/card-img-2.png" alt="" /> </div> </div>
                                <div class="swiper-slide card-img-item"> <div class="card-img"> <img src="/front/assets/images/card-img-3.png" alt="" /> </div> </div>
                                <div class="swiper-slide card-img-item"> <div class="card-img"> <img src="/front/assets/images/card-img-4.png" alt="" /> </div> </div>
                                <div class="swiper-slide card-img-item"> <div class="card-img"> <img src="/front/assets/images/card-img-1.png" alt="" /> </div> </div>
                                <div class="swiper-slide card-img-item"> <div class="card-img"> <img src="/front/assets/images/card-img-2.png" alt="" /> </div> </div>
                                <div class="swiper-slide card-img-item"> <div class="card-img"> <img src="/front/assets/images/card-img-3.png" alt="" /> </div> </div>
                                <div class="swiper-slide card-img-item"> <div class="card-img"> <img src="/front/assets/images/card-img-4.png" alt="" /> </div> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============================== Content Container Start ==============================-->
