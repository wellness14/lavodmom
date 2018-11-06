<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/index.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_PATH.'/head.php');
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>라보드마망 산후조리원</title>
        
        <meta name="description" content="강동구 성내동, 산후조리, 모유수유전문, 라보드테라피, 고품질 산모케어">
        <meta property="og:type" content="website">
        <meta property="og:title" content="라보드마망 산후조리원">
        <meta property="og:description" content="강동구 성내동, 산후조리, 모유수유전문, 라보드테라피, 고품질 산모케어">
        <meta property="og:image" content="http://lavodmom.co.kr/assets/images/lavod_logo.png">
        <meta property="og:url" content="http://www.lavodmom.co.kr">
        <link rel="canonical" href="http://www.lavodmom.co.kr">
        <meta name="naver-site-verification" content="fa9979ea52cffa70583261ad2dacd019577c7c54"/>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="assets/styles/vendor/bootstrap.min.css">
        <!-- Fonts -->
        <link rel="stylesheet" href="assets/fonts/et-lineicons/css/style.css">
        <link rel="stylesheet" href="assets/fonts/linea-font/css/linea-font.css">
        <link rel="stylesheet" href="assets/fonts/fontawesome/css/font-awesome.min.css">
        <!-- Slider -->
        <link rel="stylesheet" href="assets/styles/vendor/slick.css">
        <!-- Lightbox -->
        <link rel="stylesheet" href="assets/styles/vendor/magnific-popup.css">
        <!-- Animate.css -->
        <link rel="stylesheet" href="assets/styles/vendor/animate.css">


        <!-- Definity CSS -->
        <link rel="stylesheet" href="assets/styles/main.css">
        <link rel="stylesheet" href="assets/styles/responsive.css">

        <!-- JS -->
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body id="page-top">
        
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->



        <!-- ========== Preloader ========== -->

        <div class="preloader">
          <img src="assets/images/loader.svg" alt="Loading...">
        </div>

        
        
        <!-- ========== Navigation ========== -->

        <nav class="navbar navbar-default navbar-fixed-top mega navbar-trans">
          <? include("./top_main.html");?>
        </nav><!-- / .navbar -->



        <!-- ========== Hero Cover ========== -->

        <div class="fs-slider-hero">
          <div class="fs-slider">
            
            <!-- Slide 1 -->
            <div class="fs-slider-item fs-slide-1">
              <div class="bg-overlay">
                                
                <!-- Hero Content -->
                <div class="hero-content-wrapper">
                  <div class="hero-content">
                    
                    <h2 class="h-alt hero-subheading wow fadeIn" data-wow-delay=".5s" data-wow-duration="1.5s"><span style="font-weight:bold;font-size:1.5em;">품격있는 산후조리원</span><br></h2>
					<h2 class="hero-lead wow fadeInUp" data-wow-duration="2s"> 라보드마망</h2>
                    <h3 class="h-alt hero-subheading wow fadeInUp"><span style="font-weight:bold;font-size:1.5em;">Spacious and comfortable postpartum care centers</span></h3>
                    <!--<a href="#services" class="btn wow fadeIn" data-wow-delay=".7s" data-wow-duration="2s">Learn More</a>-->

                  </div>
                </div>

              </div><!-- / .bg-overlay -->
            </div><!-- / .fs-slide-1 -->


            <!-- Slide 2 -->
            <div class="fs-slider-item fs-slide-2">
              <div class="bg-overlay">
                                
                <!-- Hero Content -->
                <div class="hero-content-wrapper">
                  <div class="hero-content">
                    
                    <h2 class="hero-lead">라보드마망<br>테라피</h2>
                    <h3 class="h-alt hero-subheading wow fadeInUp"><span style="font-weight:bold;font-size:1.5em;">Lavod maman Beauty Aestthetic Therapy</span><br>출산 전후 산모님을 위한 체계적인 산모테라피를 진행합니다.</h3>
					
                  
                  </div>
                </div>

              </div><!-- / .bg-overlay -->
            </div><!-- / .fs-slide-2 -->


            <!-- Slide 3 -->
             <div class="fs-slider-item fs-slide-3">
              <div class="bg-overlay">
                                
                <!-- Hero Content -->
                <div class="hero-content-wrapper">
                  <div class="hero-content">
                    
                    
                    <h2 class="hero-lead">라보드마망<br>감염관리 시스템</h2>
                    <h3 class="h-alt hero-subheading"><span style="font-weight:bold;font-size:1.5em;">Lavod maman Newborn baby Infection Prevention System</span><br>안심하고 맡길 수 있는 깨끗하고 쾌적한 신생아실</h3>
           
                  </div>
                </div>

              </div><!-- / .bg-overlay -->
            </div><!-- / .fs-slide-3 -->

            <!-- Slide 4 -->
            <div class="fs-slider-item fs-slide-4">
              <div class="bg-overlay">
                                
                <!-- Hero Content -->
                <div class="hero-content-wrapper">
                  <div class="hero-content">
                    
                    <h1 class="hero-lead">라보드마망<br>힐링뷰</h1>
                   
                    <h3 class="h-alt hero-subheading"><span style="font-weight:bold;font-size:1.5em;">Spacious and comfortable postpartum care centers</span><br>아름다운 자연경관이 내려다보이는 산후조리원</h3>
          
                  </div>
                </div>

              </div><!-- / .bg-overlay -->
            </div><!-- / .fs-slide-4 -->


          </div><!-- / .fs-slider -->

          <!-- Scroller -->
          <a href="#services" class="scroller">
            <span class="scroller-text" >scroll down</span>
            <span class="linea-basic-magic-mouse"></span>
          </a>

        </div><!-- / .fs-slider-hero -->



        <!-- ========== Services ========== -->
        
        <section id="services" class="container section ft-centered">

          <header class="sec-heading">
            <span style="font-size:3em; font-weight:bold;">라보드마망 산후조리원</span>
            <span class="subheading">Lavod maman Postartum care centers</span>
          </header>

          <div class="row">
            
            <!-- Item 1 -->
            <a href="./../pages/company01.html"><div class="col-md-3 col-sm-6 mb-sm-50 ft-item ft-square-frame-dark wow zoomIn" data-wow-duration=".6s" data-wow-delay=".3s">
              <span class="et-heart"></span>
              <h5 style="font-weight:bold;">LAVOD MAMAN</h5>
              <p>산모와 아기를 위한 특별한 서비스를 제공합니다.</p>
            </div></a>

            <!-- Item 2 -->
            <a href="./../pages/interior01.html"><div class="col-md-3 col-sm-6 mb-sm-50 ft-item ft-square-frame-dark wow zoomIn" data-wow-duration=".6s">
              <span class="et-desktop"></span>
              <h5 style="font-weight:bold;">INTERIOR</h5>
              <p>안심하고 맡길 수 있는 깨끗하고 쾌적한 라보드마망 시설안내 입니다.</p>
            </div></a>

            <!-- Item 3 -->
            <a href="./../pages/program01.html"><div class="col-md-3 col-sm-6 mb-sm-50 ft-item ft-square-frame-dark wow zoomIn" data-wow-duration=".6s">
              <span class="et-profile-female"></span>
              <h5 style="font-weight:bold;">PROGRAM</h5>
              <p>산모와 아기를 위한 건강한 라보드마망 프로그램</p>
            </div></a>

            <!-- Item 4 -->
            <a href="./../pages/info01.html"><div class="col-md-3 col-sm-6 mb-sm-50 ft-item ft-square-frame-dark wow zoomIn" data-wow-duration=".6s" data-wow-delay=".3s">
              <span class="et-pencil"></span>
              <h5 style="font-weight:bold;">INFOMATION</h5>
              <p>라보드마망 이용시 필요한 이용안내입니다.</p>
            </div></a>

          </div><!-- / .row -->
        </section><!-- / .ft-frames -->



        <!-- ========== Feature - Steps Numbers ========== -->

        <div class="gray-bg">
          <section class="container ft-steps-numbers">
            <div class="row section">

              <header class="sec-heading ws-s">
                <span style="font-size:3em; font-weight:bold;">라보드마망 프로그램</span>
                <span class="subheading">라보드마망의 산모와 아기를 위한 프로그램</span>
              </header>
              
              <!-- Step 1 -->
              <div class="col-lg-4 col-md-6 mb-sm-100 ft-item wow fadeIn" data-wow-duration="1s">
                <span class="ft-nbr">01</span>
                <h4>산모프로그램</h4>
                <p>수년간 운영해온 노하우를 바탕으로 한 라보드마망 전문시스템을 기반으로 출산 후 몸과 심리상태가 예민한 산모님들에게 수준높은 서비스와 전문적인 맞춤식 산모 케어서비스를 제공하고 있습니다.</p>
              </div>

              <!-- Step 2 -->
              <div class="col-lg-4 col-md-6 mb-sm-100 ft-item wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
                <span class="ft-nbr">02</span>
                <h4>신생아 프로그램</h4>
                <p>전문간호진들로 구성된 라보드마망 산후조리원은 체계적이고 효율적인 아기의 관리를 위해 위생적인 최신 시스템으로 운영되고 있습니다.</p>
              </div>

              <!-- Step 3 -->
              <div class="col-lg-4 col-md-6 ft-item wow fadeIn" data-wow-duration="1s" data-wow-delay=".6s">
                <span class="ft-nbr">03</span>
                <h4>영양식단</h4>
                <p>산모의 건강을 생각한 좋은재료를 사용하고 현장경험이 풍부한 산후조리 전문 조리사가 산후조리에 적합한 균형잡힌 식단과 정성스러운 음식을 제공합니다.</p>
              </div>

            </div><!-- / .row -->
            
            <!-- CTA Button -->
            <div class="row ws-m">
              <div class="text-center">
                <a href="./../page/program01.html" class="btn">자세히 보기</a>
              </div>
            </div><!-- / .row -->

          </section><!-- / .container -->
        </div><!-- / .gray-bg -->



        <!-- ========== Cricle Counters - Parallax ========== -->

        <div id="skillsCircles" class="circles-counters">
          <div class="container">
            <div id="counters" class="row count-wrapper">
              
              <!-- Item 1 -->
              <a href="./../pages/info01.html"><div class="col-sm-6 col-lg-3 circle-item wow zoomIn" data-wow-duration=".6s" data-wow-delay=".3s">
                <div class="chart" data-percent="75"><span class="circle-icon et-documents"></span></div>
                <span class="circle-text">이용안내</span>
              </div></a>

              <!-- Item 2 -->
              <a href="./../pages/info01.html"><div class="col-sm-6 col-lg-3 circle-item wow zoomIn" data-wow-duration=".6s">
                <div class="chart" data-percent="75"><span class="circle-icon et-lightbulb"></span></div>
                <span class="circle-text">면회안내</span>
              </div></a>

              <!-- Item 3 -->
              <a href="./../pages/info01.html"><div class="col-sm-6 col-lg-3 circle-item wow zoomIn" data-wow-duration=".6s">
                <div class="chart" data-percent="75"><span class="circle-icon et-clipboard"></span></div>
                <span class="circle-text">산후조리표준약관</span>
              </div></a>

              <!-- Item 4 -->
              <a href="./../pages/info01.html"><div class="col-sm-6 col-lg-3 circle-item wow zoomIn" data-wow-duration=".6s" data-wow-delay=".3s">
                <div class="chart" data-percent="75"><span class="circle-icon et-caution"></span></div>
                <span class="circle-text">준수사항</span>
              </div></a>

            </div><!-- / .row -->
          </div><!-- / .container -->
        </div><!-- / .circles-counters -->

        

        <!-- ========== Portfolio ========== -->

        <section class="container-fluid portfolio-layout portfolio-columns-fw">
          <div class="row">
              <header class="sec-heading ws-s">
                <span style="font-size:3em; font-weight:bold;">라보드마망 Photo</span>
                <span class="subheading">라보드마망의 산모와 아기를 위한 시설안내</span>
              </header>
          </div><!-- / .row -->
          

          <div class="row">
            <div id="pfolio">

              <!-- Item 1 -->
              <div class="col-md-4 portfolio-item print">
                <div class="p-wrapper hover-light">
                  <img src="./../images/main_port01.jpg" alt="라보드마망">
                  <div class="p-hover">
                    <div class="p-content">
                      <h4>신생아실</h4>
                      <h6 class="subheading">LAVOD MAMAN NEWBORN BABY PREVENTION SYSTEM</h6>
                    </div>
                  </div>
                  <a href="./../images/main_port01.jpg" class="open-btn open-gallery"><i class="fa fa-expand"></i></a>
                </div>
              </div><!-- / .portfolio-item -->

              <!-- Item 2 -->
              <div class="col-md-4 portfolio-item webdesing photo">
                <div class="p-wrapper hover-light">
                  <img src="./../images/main_port02.jpg" alt="라보드마망">
                  <div class="p-hover">
                    <div class="p-content">
                      <h4>신생아실</h4>
                      <h6 class="subheading">LAVOD MAMAN NEWBORN BABY PREVENTION SYSTEM</h6>
                    </div>
                  </div>
                  <a href="./../images/main_port02.jpg" class="open-btn open-gallery"><i class="fa fa-expand"></i></a>
                </div>
              </div><!-- / .portfolio-item -->

              <!-- Item 3 -->
              <div class="col-md-4 portfolio-item photo print">
                <div class="p-wrapper hover-light">
                  <img src="./../images/main_port03.jpg" alt="라보드마망">
                  <div class="p-hover">
                    <div class="p-content">
                      <h4>임산부실</h4>
                      <h6 class="subheading">LAVOD MAMAN NEWBORN BABY PREVENTION SYSTEM</h6>
                    </div>
                  </div>
                  <a href="./../images/main_port03.jpg" class="open-btn open-gallery"><i class="fa fa-expand"></i></a>
                </div>
              </div><!-- / .portfolio-item -->

              <!-- Item 4 -->
              <div class="col-md-4 portfolio-item webdesing print">
                <div class="p-wrapper hover-light">
                  <img src="./../images/main_port04.jpg" alt="라보드마망">
                  <div class="p-hover">
                    <div class="p-content">
                      <h4>라보드 테라피실</h4>
                      <h6 class="subheading">LAVOD MAMAN NEWBORN BABY PREVENTION SYSTEM</h6>
                    </div>
                  </div>
                  <a href="./../images/main_port04.jpg" class="open-btn open-gallery"><i class="fa fa-expand"></i></a>
                </div>
              </div><!-- / .portfolio-item -->

              <!-- Item 5 -->
              <div class="col-md-4 portfolio-item webdesing">
                <div class="p-wrapper hover-light">
                  <img src="./../images/main_port05.jpg" alt="라보드마망">
                  <div class="p-hover">
                    <div class="p-content">
                      <h4>면회실</h4>
                      <h6 class="subheading">LAVOD MAMAN NEWBORN BABY PREVENTION SYSTEM</h6>
                    </div>
                  </div>
                  <a href="./../images/main_port05.jpg" class="open-btn open-gallery"><i class="fa fa-expand"></i></a>
                </div>
              </div><!-- / .portfolio-item -->

              <!-- Item 6 -->
              <div class="col-md-4 portfolio-item photo print webdesing">
                <div class="p-wrapper hover-light">
                  <img src="./../images/main_port06.jpg" alt="라보드마망">
                  <div class="p-hover">
                    <div class="p-content">
                      <h4>수유실</h4>
                      <h6 class="subheading">LAVOD MAMAN NEWBORN BABY PREVENTION SYSTEM</h6>
                    </div>
                  </div>
                  <a href="./../images/main_port06.jpg" class="open-btn open-gallery"><i class="fa fa-expand"></i></a>
                </div>
              </div><!-- / .portfolio-item -->

            </div><!-- / #pfolio -->
          </div><!-- / .row -->
        </section><!-- / .portfolio-columns-fw -->







        <!-- ========== Footer Contact ========== -->
        
        <footer class="footer-widgets">
          <? include("./footer_sub.html");?>
        </footer><!-- / .footer-contact -->



        <!-- ========== Scripts ========== -->

        <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
        <script src="assets/js/vendor/google-fonts.js"></script>
        <script src="assets/js/vendor/jquery.easing.js"></script>
        <script src="assets/js/vendor/jquery.waypoints.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>
        <script src="assets/js/vendor/bootstrap-hover-dropdown.min.js"></script>
        <script src="assets/js/vendor/smoothscroll.js"></script>
        <script src="assets/js/vendor/jquery.localScroll.min.js"></script>
        <script src="assets/js/vendor/jquery.scrollTo.min.js"></script>
        <script src="assets/js/vendor/jquery.stellar.min.js"></script>
        <script src="assets/js/vendor/jquery.parallax.js"></script>
        <script src="assets/js/vendor/slick.min.js"></script>
        <script src="assets/js/vendor/jquery.easypiechart.min.js"></script>
        <script src="assets/js/vendor/countup.min.js"></script>
        <script src="assets/js/vendor/isotope.min.js"></script>
        <script src="assets/js/vendor/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/vendor/wow.min.js"></script>
        <script src="assets/js/vendor/kenburns.js"></script>
        <script src="assets/js/vendor/jquery.mb.YTPlayer.min.js"></script>
        <script src="assets/js/vendor/jquery.ajaxchimp.js"></script>

        <!-- Google Maps -->
        <script src="assets/js/gmap.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOcd7o0W0r846FC_GoHSK56xeAvP8fV4s"></script>

        <!-- Definity JS -->
        <script src="assets/js/main.js"></script>
    </body>
</html>
