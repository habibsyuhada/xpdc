<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">

  <!--====== Title ======-->
  <title>XPDC</title>

  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--====== Favicon Icon ======-->
  <!-- <link rel="shortcut icon" href="<?php echo base_url() ?>assets/landing_page/images/favicon.png" type="image/png"> -->

  <!--====== Magnific Popup CSS ======-->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/landing_page/css/magnific-popup.css">

  <!--====== Slick CSS ======-->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/landing_page/css/slick.css">

  <!--====== Line Icons CSS ======-->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/landing_page/css/LineIcons.css">

  <!--====== FontAwasome CSS ======-->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/landing_page/css/fontawasome.min.css">

  <!--====== Bootstrap CSS ======-->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/landing_page/css/bootstrap.min.css">

  <!--====== Default CSS ======-->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/landing_page/css/default.css">

  <!--====== Leaflet CSS ======-->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

  <!--====== Style CSS ======-->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/landing_page/css/style.css">

  <!--====== Jquery js ======-->
  <script src="<?php echo base_url() ?>assets/landing_page/js/vendor/jquery-1.12.4.min.js"></script>
  <script src="<?php echo base_url() ?>assets/landing_page/js/vendor/modernizr-3.7.1.min.js"></script>

  <!--====== Bootstrap js ======-->
  <script src="<?php echo base_url() ?>assets/landing_page/js/popper.min.js"></script>
  <script src="<?php echo base_url() ?>assets/landing_page/js/bootstrap.min.js"></script>

  <!--====== Slick js ======-->
  <script src="<?php echo base_url() ?>assets/landing_page/js/slick.min.js"></script>

  <!--====== Magnific Popup js ======-->
  <script src="<?php echo base_url() ?>assets/landing_page/js/jquery.magnific-popup.min.js"></script>

  <!--====== Ajax Contact js ======-->
  <script src="<?php echo base_url() ?>assets/landing_page/js/ajax-contact.js"></script>

  <!--====== Isotope js ======-->
  <script src="<?php echo base_url() ?>assets/landing_page/js/imagesloaded.pkgd.min.js"></script>
  <script src="<?php echo base_url() ?>assets/landing_page/js/isotope.pkgd.min.js"></script>

  <!--====== Scrolling Nav js ======-->
  <script src="<?php echo base_url() ?>assets/landing_page/js/jquery.easing.min.js"></script>
  <script src="<?php echo base_url() ?>assets/landing_page/js/scrolling-nav.js"></script>

  <!--====== Leaflet js ======-->
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

  <!--====== Main js ======-->
  <script src="<?php echo base_url() ?>assets/landing_page/js/main.js?v=1"></script>

  <style>
    .border-2px {
      border-width: 3px !important;
    }

    .border-yellow {
      border-color: #f9ca24 !important;
    }

    .bg-yellow {
      background: #f9ca24 !important;
    }

    .bg-grey {
      background: #f4f6f7 !important;
    }

    .text-yellow {
      color: #f9ca24 !important;
    }

    .text-uncolor {
      color: unset;
    }

    .carousel-item::before {
      background: linear-gradient(rgba(240, 247, 238, 0.3) 0%, rgba(255, 189, 0, 0.3) 100%);
    }

    /*Hover Effect*/
    .hover-effect-1 {
      transition: all .1s linear;
      cursor: pointer;
    }

    .to-yellow.hover-effect-1:hover,
    .to-yellow.hover-effect-1:focus {
      animation: pulse-effect-yellow 0.2s;
      box-shadow: 0 0 0 1rem rgba(0, 0, 0, 0),
        inset 0 0 0 8rem #ffffff;
      color: #f9ca24 !important;
      /* background: #ffffff !important; */
    }

    @keyframes pulse-effect-yellow {
      0% {
        box-shadow: 0 0 0 0 #ffffff;
      }
    }

    .navbar-area .navbar .navbar-btn li a.solid {
      color: #f9ca24;
    }

    .navbar-area.sticky .navbar .navbar-btn li a.solid {
      border-color: #f9ca24;
      background-color: #f9ca24;
    }

    /* @media screen and (max-width: 992px) {
      .tracking_no {
        display: none;
      }
    } */
  </style>

</head>

<body>
  <!--[if IE]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!--====== PRELOADER PART START ======-->

  <div class="preloader">
    <div class="loader">
      <div class="ytp-spinner">
        <div class="ytp-spinner-container">
          <div class="ytp-spinner-rotator">
            <div class="ytp-spinner-left">
              <div class="ytp-spinner-circle"></div>
            </div>
            <div class="ytp-spinner-right">
              <div class="ytp-spinner-circle"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--====== PRELOADER PART ENDS ======-->

  <!--====== NAVBAR TWO PART START ======-->

  <section class="navbar-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg">

            <a class="navbar-brand" href="#">
              <img src="<?php echo base_url() ?>assets/img/logo-fix.png" alt="Logo" width="150px">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTwo" aria-controls="navbarTwo" aria-expanded="false" aria-label="Toggle navigation">
              <span class="toggler-icon"></span>
              <span class="toggler-icon"></span>
              <span class="toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse sub-menu-bar" id="navbarTwo">
              <ul class="navbar-nav m-auto">
                <li class="nav-item active"><a class="page-scroll" href="#home">home</a></li>
                <li class="nav-item"><a class="page-scroll" href="#about">About</a></li>
                <li class="nav-item"><a class="page-scroll" href="#services">Services</a></li>
                <li class="nav-item"><a class="page-scroll" href="#contact">Contact</a></li>
              </ul>
            </div>

            <div class="navbar-btn d-none d-sm-inline-block">
              <ul>
                <li><a class="solid" href="<?php echo base_url() ?>home/login">MY XPDC</a></li>
              </ul>
            </div>
          </nav> <!-- navbar -->
        </div>
      </div> <!-- row -->
    </div> <!-- container -->
  </section>

  <!--====== NAVBAR TWO PART ENDS ======-->

  <!--====== SLIDER PART START ======-->

  <section id="home" class="slider_area">
    <div id="carouselThree" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselThree" data-slide-to="0" class="active"></li>
        <li data-target="#carouselThree" data-slide-to="1"></li>
        <!-- <li data-target="#carouselThree" data-slide-to="2"></li> -->
      </ol>

      <div class="carousel-inner">
        <div class="carousel-item active" style="height: 100vh; min-height: 640px; background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.6)), url(<?php echo base_url() ?>assets/landing_page/images/Airfreight-e1570778763730.jpg);background-position: center;background-size: cover;">
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <div class="slider-content pb-5">
                  <h1 class="title text-capitalize">XPDC</h1>
                  <p class="text text-capitalize">when delivered is just not enough. one-stop logistics solutions</p>
                  <br>
                  <div class="p-3 text-center tracking_no" style="background: rgba(255, 255, 255, 0.3);">
                    <h4 class="mb-3 text-white">XPDC Tracking Number</h4>
                    <h6 class="mb-3 text-white">Enter the Tracking No</h6>
                    <form>
                      <div class="form-row">
                        <div class="form-group col-md">
                          <input type="text" class="form-control" name="tracking_no" placeholder="Ex: 12345">
                        </div>
                        <div class="form-group col-md-auto">
                          <button class="btn btn-warning btn-block">Track Result</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div> <!-- row -->
          </div> <!-- container -->
          <!-- <div class="slider-image-box d-none d-lg-flex align-items-end">
            <div class="slider-image">
              <img src="<?php echo base_url() ?>assets/landing_page/images/slider/1.png" alt="Hero">
            </div>
          </div> -->
        </div> <!-- carousel-item -->

        <div class="carousel-item" style="height: 100vh ;min-height: 640px; background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.6)), url(<?php echo base_url() ?>assets/landing_page/images/global-sea-freight-e1570781123661.jpg);background-position: center;background-size: cover;">
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <div class="slider-content pb-5">
                  <h1 class="title">XPDC</h1>
                  <p class="text text-capitalize">a dynamic provider of comprehensive logistics company. serve with professionalism</p>
                  <br>
                  <div class="p-3 text-center tracking_no" style="background: rgba(255, 255, 255, 0.3);">
                    <h4 class="mb-3 text-white">XPDC Tracking Number</h4>
                    <h6 class="mb-3 text-white">Enter the Tracking No</h6>
                    <form>
                      <div class="form-row">
                        <div class="form-group col-md">
                          <input type="text" class="form-control" name="tracking_no" placeholder="Ex: 12345">
                        </div>
                        <div class="form-group col-md-auto">
                          <button class="btn btn-warning btn-block">Track Result</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div> <!-- slider-content -->
              </div>
            </div> <!-- row -->
          </div> <!-- container -->
          <!-- <div class="slider-image-box d-none d-lg-flex align-items-end">
            <div class="slider-image">
              <img src="<?php echo base_url() ?>assets/landing_page/images/slider/2.png" alt="Hero">
            </div>
          </div> -->
        </div> <!-- carousel-item -->
      </div>

      <a class="carousel-control-prev" href="#carouselThree" role="button" data-slide="prev">
        <i class="lni lni-arrow-left"></i>
      </a>
      <a class="carousel-control-next" href="#carouselThree" role="button" data-slide="next">
        <i class="lni lni-arrow-right"></i>
      </a>
    </div>
  </section>

  <!--====== SLIDER PART ENDS ======-->

  <!--====== ABOUT US START ======-->

  <section id="about" class="features-area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10 col-md-10 col-sm-12">
          <div class="single-features mt-40">
            <div class="features-title-icon d-flex justify-content-between">
              <h2 class="features-title">PT. XENA PRANADIPA DHIA CAKRA</h2>
            </div>
            <div class="features-content">
              <div class="row align-items-center">
                <div class="col-lg-9 col-md-9 col-sm-12">
                  <p class="text text-justify">PT. XENA PRANADIPA DHIA CAKRA (XPDC) is a dynamic provider of comprehensive logistics company with knowledge and professionalism since 2018 based in Indonesia. With many experiences in handling international and domestic airfreight and sea freight shipments, we offer a profound and personal approach to fulfill customer’s need in any size of business.Due to demand of the customers, the services of ours has expanded to land freight, customs clearance brokerage, warehousing & packaging also handcarry service that makes us become a one-stop logistics partner.
                    <br><br>
                    We diversified service offering includes unique logistic handling and services to meet our customer’s unique request. We present our customers a center of excellence they can partner with and benefit from full transparency and a sincere commitment to mutual success.
                  </p>
                </div>
                <div class="col text-center">
                  <br>
                  <img src="<?php echo base_url() ?>assets/img/logo-fix.png" alt="Logo" width="300px">
                </div>
              </div>
            </div>
          </div> <!-- single features -->
        </div>
      </div> <!-- row -->
    </div> <!-- container -->
  </section>

  <!--====== ABOUT US ENDS ======-->
  <?php if (isset($tracking_no)) : ?>
    <!--====== TRACKING NO START ======-->

    <section id="tracking" class="features-area">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10 col-md-10 col-sm-12">
            <div class="single-features mt-40">
              <div class="features-title-icon d-flex justify-content-between">
                <h2 class="features-title mb-4">XPDC TRACKING NO. <?php echo $tracking_no ?></h2>
              </div>
              <div class="features-content">
                <?php if (isset($shipment)) : ?>
                  <div class="row justify-content-center">
                    <div class="col-auto">
                      <img height="60px" src="<?php echo site_url(); ?>home/barcode_generator/<?php echo $shipment['tracking_no'] ?>">
                      <br>
                      <br>
                      <h4 class="font-weight-bold text-center"><?php echo $shipment['tracking_no'] ?></h4>
                    </div>
                  </div>
                  <!--<div class="row">-->
                  <!--  <div class="col-md-6">-->
                  <!--    <p class="m-0 py-3 border-bottom"><b>SHIPPER ADDRESS</b></p>-->
                  <!--    <p class="m-0 py-3"><b>Country : </b><?php echo $shipment['shipper_country'] ?></p>-->
                  <!--  </div>-->
                  <!--  <div class="col-md-6">-->
                  <!--    <p class="m-0 py-3 border-bottom"><b>CONSIGNEE ADDRESS</b></p>-->
                  <!--    <p class="m-0 py-3"><b>Country : </b><?php echo $shipment['consignee_country'] ?></p>-->
                  <!--  </div>-->
                  <!--</div>-->
                  <div class="mb-4 alert alert-dark text-center" role="alert">
                    <b>SHIPMENT STATUS: <?php echo strtoupper($shipment['status']) ?></b>
                  </div>
                  <p class="mt-4 pt-4 border-bottom"><b>SHIPMENT HISTORY</b></p>
                  <table class="table data_table">
                    <thead>
                      <tr class="bg-info">
                        <th class="text-white font-weight-bold">Date</th>
                        <th class="text-white font-weight-bold">Time</th>
                        <th class="text-white font-weight-bold">Location</th>
                        <th class="text-white font-weight-bold">Status</th>
                        <th class="text-white font-weight-bold">Remarks</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($history_list as $key => $value) : ?>
                        <tr>
                          <td><?php echo $value['date'] ?></td>
                          <td><?php echo date('H:i', strtotime($value['time'])) ?></td>
                          <td><?php echo $value['location'] ?></td>
                          <td><?php echo $value['status'] ?></td>
                          <td><?php echo $value['remarks'] ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                <?php else : ?>
                  <h5>Not Found</h5>
                <?php endif; ?>
              </div>
            </div> <!-- single features -->
          </div>
        </div> <!-- row -->
      </div> <!-- container -->
    </section>

    <!--====== TRACKING NO ENDS ======-->
  <?php endif; ?>
  <!--====== FEATRES TWO PART START ======-->

  <section id="services" class="features-area bg-yellow">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-10">
          <div class="section-title text-center pb-10">
            <!-- <h3 class="title">Our Services</h3> -->
            <!-- <p class="text">Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed!</p> -->
          </div> <!-- row -->
        </div>
      </div> <!-- row -->
      <div class="row justify-content-center">
        <a href="#service2" onclick="$('#headingOne a').trigger('click');" data-wow-delay="0.6s" class="page-scroll wow bounceIn m-1 col-md-3 col-sm-9 px-0">
          <div class="py-4 px-1 text-center border-2px border rounded border-white bg-yellow text-white hover-effect-1 to-yellow h-100">
            <div class="py-4">
              <h1 class="text-uncolor"><i class="fas fa-plane"></i></h1>
              <h4 class="text-uncolor">AIR FREIGHT</h4>
              <!-- <span class="text-left">Environmental Management System (EMS)</span> -->
            </div>
          </div>
        </a>
        <a href="#service2" onclick="$('#headingTwo a').trigger('click');" data-wow-delay="0.6s" class="page-scroll wow bounceIn m-1 col-md-3 col-sm-9 px-0">
          <div class="py-4 px-1 text-center border-2px border rounded border-white bg-yellow text-white hover-effect-1 to-yellow h-100">
            <div class="py-4">
              <h1 class="text-uncolor"><i class="fas fa-ship"></i></h1>
              <h4 class="text-uncolor">SEA FREIGHT</h4>
              <!-- <span class="text-left">Environmental Management System (EMS)</span> -->
            </div>
          </div>
        </a>
        <a href="#service2" onclick="$('#headingThree a').trigger('click');" data-wow-delay="0.6s" class="page-scroll wow bounceIn m-1 col-md-3 col-sm-9 px-0">
          <div class="py-4 px-1 text-center border-2px border rounded border-white bg-yellow text-white hover-effect-1 to-yellow h-100">
            <div class="py-4">
              <h1 class="text-uncolor"><i class="fas fa-truck"></i></h1>
              <h4 class="text-uncolor">LAND FREIGHT</h4>
              <!-- <span class="text-left">Environmental Management System (EMS)</span> -->
            </div>
          </div>
        </a>
        <a href="#service2" onclick="$('#headingFore a').trigger('click');" data-wow-delay="0.6s" class="page-scroll wow bounceIn m-1 col-md-3 col-sm-9 px-0">
          <div class="py-4 px-1 text-center border-2px border rounded border-white bg-yellow text-white hover-effect-1 to-yellow h-100">
            <div class="py-4">
              <h1 class="text-uncolor"><i class="fas fa-boxes"></i></h1>
              <h4 class="text-uncolor">WAREHOUSING AND PACKAGING</h4>
              <!-- <span class="text-left">Environmental Management System (EMS)</span> -->
            </div>
          </div>
        </a>
        <a href="#service2" onclick="$('#headingFive a').trigger('click');" data-wow-delay="0.6s" class="page-scroll wow bounceIn m-1 col-md-3 col-sm-9 px-0">
          <div class="py-4 px-1 text-center border-2px border rounded border-white bg-yellow text-white hover-effect-1 to-yellow h-100">
            <div class="py-4">
              <h1 class="text-uncolor"><i class="fas fa-exchange-alt"></i></h1>
              <h4 class="text-uncolor">CUSTOMS CLEARANCE BROKERAGE</h4>
              <!-- <span class="text-left">Environmental Management System (EMS)</span> -->
            </div>
          </div>
        </a>
        <a href="#service2" onclick="$('#headingSix a').trigger('click');" data-wow-delay="0.6s" class="page-scroll wow bounceIn m-1 col-md-3 col-sm-9 px-0">
          <div class="py-4 px-1 text-center border-2px border rounded border-white bg-yellow text-white hover-effect-1 to-yellow h-100">
            <div class="py-4">
              <h1 class="text-uncolor"><i class="fas fa-people-carry"></i></h1>
              <h4 class="text-uncolor">HANDCARRY SERVICES</h4>
              <!-- <span class="text-left">Environmental Management System (EMS)</span> -->
            </div>
          </div>
        </a>
      </div> <!-- row -->
    </div> <!-- container -->
  </section>

  <!--====== FEATRES TWO PART ENDS ======-->

  <!--====== ABOUT PART START ======-->

  <section id="service2" class="about-area bg-grey">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="faq-content mt-45">
            <div class="about-title">
              <!-- <h6 class="sub-title">A Little More About Us</h6> -->
              <h4 class="title">Our Services</h4>
            </div> <!-- faq title -->
            <div class="about-accordion">
              <div class="accordion" id="accordionExample">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" onclick='$("#img_about").attr("src","<?php echo base_url() ?>assets/landing_page/images/AIR-FREIGHT-600x399.jpg");'>Air Freight</a>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                      <p class="text text-justify">Airfreight can reduce the total logistics cost for urgent or time-critical logistical challenges. By combining the speed of air with the cost savings of other modes, backed by smooth and efficient customs and administrative procedures, customers can enjoy the best of both worlds; reducing inventory and improving their own service offer with faster response times at affordable cost.</p>
                    </div>
                  </div>
                </div> <!-- card -->
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <a href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" onclick='$("#img_about").attr("src","<?php echo base_url() ?>assets/landing_page/images/SEA-FREIGHT-300x189.jpg");'>Sea Freight</a>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                      <p class="text text-justify">
                        Small businesses and individual customers may not typically consider sea freight as a viable option, as it tends to be associated with larger companies exporting high volumes of commercial cargo. But sea freight services can also be a great option for transporting personal effects.<br>
                        With our LCL (Less Container Load) service, you don’t need to have enough cargo to fill a whole container in order to get a beneficial shipping rate. But if you do, we also offer FCL (Full Container Load) shipments.</p>
                    </div>
                  </div>
                </div> <!-- card -->
                <div class="card">
                  <div class="card-header" id="headingThree">
                    <a href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" onclick='$("#img_about").attr("src","<?php echo base_url() ?>assets/landing_page/images/LAND-FREIGHT-300x183.jpg");'>Land Freight</a>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                      <p class="text text-justify">Finding additional capacity during business surges, optimizing your traffic patterns, increasing efficiency and controlling costs and transportation management isn’t easy – but it’s much less complicated when you turn to us. We’re well-equipped to meet your needs for on-time, reliable and cost-effective transportation services. You’ll benefit from the reliability and quality of our ability to manage all your outbound and inbound freight.</p>
                    </div>
                  </div>
                </div> <!-- card -->
                <div class="card">
                  <div class="card-header" id="headingFore">
                    <a href="#" data-toggle="collapse" data-target="#collapseFore" aria-expanded="false" aria-controls="collapseFore" onclick='$("#img_about").attr("src","<?php echo base_url() ?>assets/landing_page/images/Storage-Rental-600x280.jpg");'>Warehousing and Packaging</a>
                  </div>
                  <div id="collapseFore" class="collapse" aria-labelledby="headingFore" data-parent="#accordionExample">
                    <div class="card-body">
                      <p class="text text-justify">We can provide storage facilities, in dry, clean and save environment. All the received goods are recorded includes the package or box number, description and packer code. This list will be used to cross check at loading and ensuring that none of your goods are left behind or mixed with other clients.</p>
                    </div>
                  </div>
                </div> <!-- card -->
                <div class="card">
                  <div class="card-header" id="headingFive">
                    <a href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" onclick='$("#img_about").attr("src","<?php echo base_url() ?>assets/landing_page/images/20180613013555840898-1.png");'>Customs Clearance Brokerage</a>
                  </div>
                  <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                    <div class="card-body">
                      <p class="text text-justify">As Batam is well-known as one of Free Trade Zone area in Indonesia which require different clearance document from any other region, for speedy custom clearance of everyday shipments, we offers personalized solutions to provide uniform, consistent & compliant trade activities, supporting your supply chain by avoiding delays, fines and penalties.</p>
                    </div>
                  </div>
                </div> <!-- card -->
                <div class="card">
                  <div class="card-header" id="headingSix">
                    <a href="#" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix" onclick='$("#img_about").attr("src","<?php echo base_url() ?>assets/landing_page/images/door-300x170.jpg");'>Handcarry Services</a>
                  </div>
                  <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                    <div class="card-body">
                      <p class="text text-justify">If you have small packages need to be at destination where the time is extremely critical, our handcarry services is the best option you need to consider. For now, this service only available in Singapore, Malaysia and Indonesia.</p>
                    </div>
                  </div>
                </div> <!-- card -->
              </div>
            </div> <!-- faq accordion -->
          </div> <!-- faq content -->
        </div>
        <div class="col-lg-7">
          <div class="about-image mt-50 h-100">
            <img id="img_about" src="<?php echo base_url() ?>assets/landing_page/images/AIR-FREIGHT-600x399.jpg" alt="about" style="height: 100%; object-fit: cover; object-position: center;">
          </div> <!-- faq image -->
        </div>
      </div> <!-- row -->
    </div> <!-- container -->
  </section>

  <!--====== ABOUT PART ENDS ======-->

  <!--================ Start Newsletter Area =================-->
  <section class="contact-area" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.6)), url(<?php echo base_url() ?>assets/landing_page/images/global-sea-freight-e1570781123661.jpg);background-attachment: fixed;background-position: center;background-size: cover;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 text-center wow fadeIn" data-wow-duration="1.5s">
          <h3 class="text-center text-white">We realize that we are part of our customer businesses as we always strive to make our customer’s goods are delivered quickly and precisely.</h3>
        </div>
      </div>
    </div>
  </section>
  <!--================ End Newsletter Area =================-->

  <!--====== CONTACT PART START ======-->

  <section id="contact" class="contact-area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-10">
          <div class="section-title text-center pb-30">
            <h3 class="title">Contact</h3>
            <!-- <p class="text">Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed!</p> -->
          </div> <!-- section title -->
        </div>
      </div> <!-- row -->
      <!-- <div class="row">
        <div class="col-lg-12">
          <div class="contact-map mt-30">
            <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=Mission%20District%2C%20San%20Francisco%2C%20CA%2C%20USA&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
          </div>
        </div>
      </div> -->
      <div class="contact-info pt-30">
        <?php foreach ($branch as $row) : ?>
          <div class="row">
            <div class="col-lg-12">
              <h4><?= $row['name'] ?></h4>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="single-contact-info contact-color-1 mt-30 d-flex ">
                <div class="contact-info-icon">
                  <i class="lni lni-map-marker"></i>
                </div>
                <div class="contact-info-content media-body">
                  <p class="text"> <?= $row['address'] ?></p>
                </div>
              </div> <!-- single contact info -->
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="single-contact-info contact-color-2 mt-30 d-flex ">
                <div class="contact-info-icon">
                  <i class="lni lni-envelope"></i>
                </div>
                <div class="contact-info-content media-body">
                  <p class="text">inquiry@xpdcid.com</p>
                  <!-- <p class="text">support@uideck.com</p> -->
                </div>
              </div> <!-- single contact info -->
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="single-contact-info contact-color-3 mt-30 d-flex ">
                <div class="contact-info-icon">
                  <i class="lni lni-phone"></i>
                </div>
                <div class="contact-info-content media-body">
                  <p class="text"><?= $row['no_telp'] ?></p>
                  <!-- <p class="text">+333 985-458-609</p> -->
                </div>
              </div> <!-- single contact info -->
            </div>
          </div> <!-- row -->
          <hr>
        <?php endforeach; ?>
      </div> <!-- contact info -->
      <div class="row">
        <div class="col-lg-12">
          <div id="mapid" style="width: 100%; height: 500px"></div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="contact-wrapper form-style-two pt-115">
            <h4 class="contact-title pb-10"><i class="lni lni-envelope"></i> Leave <span>A Message.</span></h4>

            <form id="contact-form" action="<?php echo base_url() ?>assets/landing_page/contact.php" method="post">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-input mt-25">
                    <label>Name</label>
                    <div class="input-items default">
                      <input name="name" type="text" placeholder="Name">
                      <i class="lni lni-user"></i>
                    </div>
                  </div> <!-- form input -->
                </div>
                <div class="col-md-6">
                  <div class="form-input mt-25">
                    <label>Email</label>
                    <div class="input-items default">
                      <input type="email" name="email" placeholder="Email">
                      <i class="lni lni-envelope"></i>
                    </div>
                  </div> <!-- form input -->
                </div>
                <div class="col-md-12">
                  <div class="form-input mt-25">
                    <label>Massage</label>
                    <div class="input-items default">
                      <textarea name="massage" placeholder="Massage"></textarea>
                      <i class="lni lni-pencil-alt"></i>
                    </div>
                  </div> <!-- form input -->
                </div>
                <p class="form-message"></p>
                <div class="col-md-12">
                  <div class="form-input light-rounded-buttons mt-30">
                    <button class="btn btn-warning">Send Message</button>
                  </div> <!-- form input -->
                </div>
              </div> <!-- row -->
            </form>
          </div> <!-- contact wrapper form -->
        </div>
      </div> <!-- row -->
    </div> <!-- container -->
  </section>

  <!--====== CONTACT PART ENDS ======-->

  <!--====== FOOTER PART START ======-->

  <section class="footer-area footer-dark">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="footer-logo text-center">
            <a class="mt-30" href="index.html"><img src="<?php echo base_url() ?>assets/img/logo-fix.png" alt="Logo"></a>
          </div> <!-- footer logo -->
          <ul class="social text-center mt-60">
            <li><a href="#"><i class="lni lni-facebook-filled"></i></a></li>
            <li><a href="#"><i class="lni lni-twitter-original"></i></a></li>
            <li><a href="#"><i class="lni lni-instagram-original"></i></a></li>
            <li><a href="#"><i class="lni lni-linkedin-original"></i></a></li>
          </ul> <!-- social -->
          <div class="footer-support text-center">
            <span class="number">+62 778 4089 918</span>
            <span class="mail">inquiry@xpdcid.com</span>
          </div>
          <div class="copyright text-center mt-35">
            <p class="text">Designed by <a href="#" rel="nofollow" class="text-yellow">XPDC</a> </p>
          </div> <!--  copyright -->
        </div>
      </div> <!-- row -->
    </div> <!-- container -->
  </section>

  <!--====== FOOTER PART ENDS ======-->

  <!--====== BACK TOP TOP PART START ======-->

  <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>

  <!--====== BACK TOP TOP PART ENDS ======-->

  <!--====== PART START ======-->

  <!--
  <section class="">
    <div class="container">
      <div class="row">
        <div class="col-lg-">
          
        </div>
      </div>
    </div>
  </section>
-->

  <!--====== PART ENDS ======-->
  <script>
    $(document).ready(function() {
      <?php if (isset($tracking_no)) : ?>
        $('html, body').animate({
          scrollTop: $('#tracking').offset().top,
        }, 500, 'linear');
      <?php endif; ?>
    });

    var mymap = L.map('mapid').setView([-2.548926, 118.0148634], 5);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 20,
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mymap);

    <?php foreach ($branch as $row) : ?>
      var marker = L.marker([<?= $row['latitude'] ?>, <?= $row['longitude'] ?>]).addTo(mymap);
      marker.bindPopup(`<div class="w-100">
                        <h4 class="border-bottom"><b>XPDC <?=$row['name']?></b></h4>
                        <p class="p-0"><?=$row['address']?></p>
                      </div>`);
    <?php endforeach; ?>
  </script>
</body>

</html>