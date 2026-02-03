<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,300,400,700,900" rel="stylesheet">
    <meta name='robots' content='max-image-preview:large' />
    
    <!-- CSS -->
    <link rel='stylesheet' href="{{ asset('css/style.css') }}" media='all' />
    <link rel='stylesheet' href="{{ asset('css/fancybox.min.css') }}" media='all' />
    <link rel='stylesheet' href="{{ asset('css/swiper.min.css') }}" media='all' />
    <link rel='stylesheet' href="{{ asset('css/bootstrap.min.css') }}" media='all' />
    <link rel='stylesheet' href="{{ asset('css/odometer.min.css') }}" media='all' />
    <link rel='stylesheet' href="{{ asset('css/flaticon.css') }}" media='all' />
    
    <style>
/* ТОЧНЫЕ inline стили из coralclean.ee WordPress (original-page.html) */
.iconsociaf {
font-size: 32px !important;
}
.member-box figcaption ul li a {
color: #fff;
float: left;
font-size: 23px !important;
}
.member-box figcaption ul li a {
margin-top: -15px;
}
.footer .footer-social li a {
width: 71px;
height: 54px !important;
}
.wpcf7 form.sent .wpcf7-response-output {
color: #000000 !important;
}
.swiper-pagination-bullet {margin-left:5px;}
.navbar-nav .nav-link:hover {color: #2ec4c6;}
.navbar .site-menu ul li a:hover {color: #ffffff;}
.slider .main-slider .swiper-slide .container a {background:#2ec4c6;}
.slider .main-slider .swiper-slide .container a:hover {background:#2ec4c6;}
.navbar .navbar-button a {background: #2ec4c6;}
.slider .button-next:hover {background: #2ec4c6;}
.custom-button{background:#2ec4c6;}
.custom-button:hover{background:#ff6f61;}
.custom-button12{background:#2ec4c6;}
.custom-button12:hover{background:#ff6f61;}
.preloader figure:after {border-top: 1px solid #2ec4c6;}
.menueffect a:hover {color: #ff6f61;}
.menueffect a:before {background-color: #fff;}
.counter-box h6:after{color: #1f2933; }
li a:hover {color: #2ec4c6;}
input#wp-block-search__input-1 {border-bottom: 0.3rem solid #2ec4c6;}
input#wp-block-search__input-2 {border-bottom: 0.3rem solid #2ec4c6;}
input#wp-block-search__input {border-bottom: 0.3rem solid #2ec4c6;}
.slider .button-prev:hover {background: #2ec4c6; border-color: transparent; }
.content-section {background: #2ec4c6 }
.content-section.bottom-dark-spacing:after {background: #2ec4c6; }
.section-title h2 {color: #2ec4c6;}
.image-box .time {color: #2ec4c6; }
.bg-light{background: #2ec4c6 }
.side-content form button[type="submit"] {color: #2ec4c6; }
.side-image .side-timetable li b { color: #2ec4c6; }
.side-member figcaption {background: #2ec4c6;}
.custom-progress span {color: #2ec4c6; }
.custom-progress .progress-bar .progress {background: #2ec4c6;}
.tab-wrapper .tab-nav li.active a {background: #2ec4c6;}
.tab-wrapper .tab-nav li.active a:hover {background: #ff6f61; }
.tab-wrapper .tab-item .tab-inner {background: #2ec4c6; }
.tab-wrapper .tab-item .tab-inner ul li span {color: #2ec4c6; }
.service-box {background: #2ec4c6; }
.service-box:before {background: #2ec4c6;}
.image-overlap-box figure {background: #2ec4c6; }
.image-overlap-box .content a:hover {color: #ff6f61; }
.video {background: #2ec4c6; }
.video a {color: #2ec4c6;}
.class-box figure {background: none;}
.dropdown-menu{background: #2ec4c6; }
.text-box h5 {color: #2ec4c6;}
.recent-news figure {background: #2ec4c6;}
.recent-news .content h3 a { color: #2ec4c6; }
.recent-news .content small span {background: #2ec4c6;}
.blog-box figure {background: #2ec4c6; }
.blog-box .content h3 a {color: #2ec4c6;}
.blog-box .content blockquote {color: #2ec4c6;}
.sidebar .widget .widget-title {color: #2ec4c6;}
.sidebar .widget .widget-title:before {background: #2ec4c6;}
.sidebar .widget form input[type="submit"] {background: #2ec4c6;}
.sidebar .widget .categories li a {color: #2ec4c6;}
.branch-box h6 {color: #2ec4c6;}
.branch-box a {color: #2ec4c6;}
.member-box figcaption {background: #2ec4c6;}
.icon {background: none; color:#2ec4c6;}
.iconsv {background: #2ec4c6;}
.iconk {color: #f5f5f5;}
.iconk:hover { color: #ff6f61; }
.sidebar-service {background: #2ec4c6;}
span.menu-service {background: #2ec4c6;}
span.menu-service:hover { background: #ff6f61; }
span.menu-service.menuactive { background: #ff6f61; }
.iconleft {color: #2ec4c6;}
.iconleft:hover { color: #ff6f61; }
a.menucolor { color: #2ec4c6; }
a.menucolor:hover { color: #ff6f61; }
.pagination .page-item .page-link { color: #2ec4c6; }
.footer {background: #2ec4c6;}
.footer .footer-info a { color: #2ec4c6; }
.footer .copyright {background: #2ec4c6;}
.footer .footer-social li a:hover {background: #ff6f61;border: 1px solid rgba(255, 255, 255, 0.3);}
.iconk { color: #2ec4c6; }
.iconk:hover { color: #ff6f61; }
.iconleft {color: #2ec4c6;}
.iconk { color: #2ec4c6;}
.iconk:hover { color: #ff6f61; }
.iconleft {color: #2ec4c6;}
span.menu-service {color: #2ec4c6;}
textarea#comment {border-bottom: 0.3rem solid #2ec4c6;}
input#author {border-bottom: 0.3rem solid #2ec4c6;}
input#email {border-bottom: 0.3rem solid #2ec4c6;}
input#url {border-bottom: 0.3rem solid #2ec4c6;}
.paketler2__on--arkayazi-1 {background: linear-gradient(to right bottom, #2ec4c6, #ff6f61d7);}
.form__input{border-bottom: 0.3rem solid #2ec4c6;}
.form__input:focus{border-bottom: 0.3rem solid #2ec4c6;}
.form__input:focus:invalid{border-bottom: 0.3rem solid #2ec4c6;}
.form__radio-buton {border: 0.5rem solid #2ec4c6;}
.form__radio-buton::after {background-color: #2ec4c6;}
.form-popup__input {border-bottom: 0.3rem solid #2ec4c6;}
.form-popup__input:focus {border-bottom: 0.3rem solid #2ec4c6;}
.form-popup__input:focus:invalid {border-bottom: 0.3rem solid #2ec4c6;}
.hizmetler-kutu--icon{background-image: linear-gradient(to right, #2ec4c6,#ff6f61);}
.ozellik-kutu--icon{background-image: linear-gradient(to right, #2ec4c6,#ff6f61);}
.post-kutu--icon {background-image: linear-gradient(to right, #2ec4c6,#ff6f61);}
.yorum-kutu--icon {background-image: linear-gradient(to right, #2ec4c6,#ff6f61);}
.ozellik-kutu-iletisim--icon {background-image: linear-gradient(to right, #2ec4c6,#ff6f61);}
.baslik-4--icon{background-image: linear-gradient(to right, #2ec4c6,#ff6f61);}
.yukaricik {background-image: linear-gradient(to right bottom, #2ec4c6,#ff6f61);}
.footer {background-image: linear-gradient(to right bottom, #2ec4c6, #ff6f61);}
.footer-404 {background-image: linear-gradient(to right bottom, #2ec4c6,#ff6f61);}
.paketler-alani {background-color: #2ec4c6;}
.form-alani {background-image: linear-gradient(to right bottom,#2ec4c6,#ff6f61);}
.markalar {background: #2ec4c6;}
.h2-baslik-hizmetler {background-image: linear-gradient(to right, #2ec4c6, #ff6f61);}
.h2-baslik-hizmetler__paragraf {color: #2ec4c6;}
.h2-baslik-hizmetler-2 {background-image: linear-gradient(to right, #2ec4c6, #ff6f61);}
.side-widget small {color: #2ec4c6;}
.swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active {background: #2ec4c6;}
::-webkit-scrollbar-thumb {background: #2ec4c6;}
.custom-buttonw1 { border-bottom: 0.3rem solid #2ec4c6;}
.iconsocia {color: #2ec4c6;}
.iconsocia:hover {color: #ff6f61;}
.paketler3__gorsel--1 { background-image: linear-gradient(to right bottom, #2ec4c6, #ff6f61)}
.paketler3__on--arkayazi-1 { background-image: linear-gradient(to right bottom, #2ec4c6, #ff6f61)}
.paketler2__gorsel--1 {background: linear-gradient(#2ec4c6, #ff6f61), transparent center center/cover no-repeat scroll;}
p.countb {background: #2ec4c6;}
.icontops {background: #2ec4c6;}
input#submit {background: #2ec4c6;}
.custom-buttonw:hover{background: #2ec4c6;}
.comment-meta.commentmetadata a:hover {color: #ff6f61; }
a.comment-edit-link:hover {color: #ff6f61; }
p.logged-in-as a:hover {color: #ff6f61; }
.menu-item a:hover {color: #ff6f61; }
li a {color: #000000; }
.tag-cloud-link {color: #2ec4c6; }
.tagcloud a:hover {color: #ff6f61; }
li#recent-posts-5 a:hover {color: #ff6f61; }
input#s {border-bottom: 0.3rem solid #ff6f61;}
.telh {background: #2ec4c6;}
.iconsociai {color: #2ec4c6; }
.iconsociai:hover {color: #ff6f61; }
::selection { background-color: #2ec4c6; }
::-webkit-scrollbar-thumb { background-color: #ff6f61; }
.ozellik-kutu-yorumlar--icon{background-image: linear-gradient(to right, #2ec4c6,#ff6f61);}
.services-kutu1--icon{background-image: linear-gradient(to right, #2ec4c6,#ff6f61);}
.services-kutu2--icon{background-image: linear-gradient(to right, #2ec4c6,#ff6f61);}
.services-kutu3--icon{background-image: linear-gradient(to right, #2ec4c6,#ff6f61);}
b.fn a:hover {color: #ff6f61; }
li a:hover {color: #ff6f61;}
.wp-block-latest-posts__list a:hover {color: #2ec4c6;}
.wp-post-image {height: 100%;}
.telh {border: 2px solid;}
.paketler__on--arkayazi-1 {background-image: linear-gradient(to right bottom, #2ec4c6, #ff6f61);}
.paketler3__icerik {padding:0rem;}
.services-kutu2--yazi1 {width:100%;}
/* text primary */
.person {color: #2ec4c6; font-family: Satoshi Regular; font-size: 18px; font-weight: 400; }
.ozellik-kutu-iletisim--yazi {color: #2ec4c6; font-family: Satoshi Regular; font-size: 18px; font-weight: 400; }
.footer-info p {font-family: Satoshi Regular; font-size: 18px; font-weight: 400; }
p {font-family: Satoshi Regular; font-size: 18px; font-weight: 400; }
.h2-baslik-hizmetler-21__paragraf {font-family: Satoshi Regular; font-size: 18px; font-weight: 400; }
.paketler3__icerik ul li {font-family: Satoshi Regular; font-size: 18px; font-weight: 400; }
body {color: #1f2933; font-family: Satoshi Regular; font-size: 18px; font-weight: 400; }
.paragraf{color: #1f2933; font-family: Satoshi Regular; font-size: 18px; font-weight: 400;  }
.paragraf-info {color: #1f2933; font-family: Satoshi Regular; font-size: 18px; font-weight: 400;  }
span.date {color: #1f2933; font-family: Satoshi Regular; font-size: 18px; } 
span.category {color: #1f2933; font-family: Satoshi Regular; font-size: 18px;}
span.tt { color: #1f2933; font-family: Satoshi Regular; font-size: 18px; font-weight: 400;  } 
.paragraf-info a {color: #1f2933; font-family: Satoshi Regular; font-size: 18px; font-weight: 400;  }
.paragraf-sol-beyaz a {color: #1f2933; font-family: Satoshi Regular; font-size: 18px; font-weight: 400; }
.paragraf-sol-beyaz-orta a {color: #1f2933; font-family: Satoshi Regular; font-size: 18px; font-weight: 400; }
.paragraf-ahp a {color: #1f2933; font-family: Satoshi Regular; font-size: 18px; font-weight: 400;  }
.paragraf-pdetay a {color: #1f2933; font-family: Satoshi Regular; font-size: 18px; font-weight: 400;  }
.paragraf-404 a {color: #1f2933; font-family: Satoshi Regular; font-size: 18px; font-weight: 400;  }
.h2-baslik-hizmetler-yorum__yorum {color: #1f2933; font-family: Satoshi Regular; font-size: 18px; font-weight: 400;  }
.testimon-text {color: #1f2933; font-family: Satoshi Regular; font-size: 18px; font-weight: 400; }
.post-kutu p {color: #1f2933; font-family: Satoshi Regular; font-size: 18px; font-weight: 400; }
.services-kutu2--yazi1 {color: #1f2933; font-family: Satoshi Regular; font-size: 18px; font-weight: 400; }
.h2-baslik-hizmetler-2__paragraf {color: #1f2933; font-family: Satoshi Regular; font-size: 18px; font-weight: 400; }
.paragraf-popup {color: #1f2933; font-family: Satoshi Regular; font-size: 18px; font-weight: 400;  }
ul.post-categories {color: #2ec4c6; font-family: Satoshi Regular; font-size: 18px;}
.services-kutu2--yazi { font-family: Satoshi Regular;  font-size: 18px;}
/* headings */
.h2-baslik-anasayfa {background-image: linear-gradient(to right, #1f2933,#ff6f61);border-bottom: .1rem solid #2ec4c6; font-family: Satoshi Black; font-size: 30px; font-weight: 700; }
.h2-baslik-anasayfa-ozel {background-image: linear-gradient(to right, #1f2933, #ff6f61); font-family: Satoshi Black; font-size: 30px; font-weight: 700; }
.h2-baslik-anasayfa-blog {background-image: linear-gradient(to right, #1f2933, #ff6f61); font-family: Satoshi Black; font-size: 30px; font-weight: 700; }
.h2-baslik-ahb{background-image: linear-gradient(to right, #1f2933, #ff6f61); font-family: Satoshi Black; font-size: 30px; font-weight: 700; }
.h2-baslik-bottom {background-image: linear-gradient(to right, #1f2933, #ff6f61); font-family: Satoshi Black; font-size: 30px; font-weight: 700; }
.h2-baslik-404{background-image: linear-gradient(to right, #1f2933, #ff6f61); font-family: Satoshi Black; font-size: 30px; font-weight: 700; }
.h2-baslik-footer{background-image: linear-gradient(to right, #1f2933, #ff6f61); font-family: Satoshi Black; font-size: 30px; font-weight: 700; }
.h2-baslik-iletisim-ozel{background-image: linear-gradient(to right, #1f2933, #ff6f61); font-family: Satoshi Black; font-size: 30px; font-weight: 700; }
.h2-baslik-popup {background-image: linear-gradient(to right, #1f2933, #ff6f61); font-family: Satoshi Black; font-size: 30px; font-weight: 700; }
.baslik-3-h {color: #1f2933; font-family: Satoshi Black; font-size: 30px; font-weight: 700; }
.baslik-33 {color: #1f2933; font-family: Satoshi Black; font-size: 30px; font-weight: 700; }
.baslik-star{color:#1f2933; font-family: Satoshi Black; font-size: 30px; font-weight: 700; }
.h2-baslik-hizmetler-yorum {background-image: linear-gradient(to right, #2ec4c6, #ff6f61); font-family: Satoshi Black; font-size: 30px; font-weight: 700; }
.baslik-3s {color:#1f2933; font-family: Satoshi Black; }
.baslik-3white {font-family: Satoshi Black; }
.counter-box .odometer {color:#1f2933; font-family: Satoshi Black;  }
.baslik-orta {font-size: 23px;color:#1f2933; font-family: Satoshi Black;font-weight: 700; }
.baslik-4 {color:#1f2933; font-family: Satoshi Black; font-weight: 700; }
.counter-box h6 {color:#1f2933; font-family: Satoshi Black; }
.slider .main-slider .swiper-slide .container h1 {color:#2ec4c6; font-family: Satoshi Black; }
.slider .main-slider .swiper-slide .container p { color:#2ec4c6;font-family: Satoshi Black; }
.slider .main-slider .swiper-slide .container a { font-family: Satoshi Black; }
.custom-button { font-family: Satoshi Black; }
.custom-buttonw { font-family: Satoshi Black; }
.baslik-sol { font-family: Satoshi Black; }
.member-box figcaption h6 { font-family: Satoshi Black; }
.member-box figcaption p { font-family: Satoshi Black; }
.h2-baslik-hizmetler-2 { font-family: Satoshi Black; font-size: 30px; font-weight: 700; }
.h2-baslik-hizmetler-21 { font-family: Satoshi Black; font-size: 30px; font-weight: 700; }
.h2-baslik-hizmetler-2111 { font-family: Satoshi Black;font-size: 30px;font-weight: 700; }
.baslik-3-service { font-family: Satoshi Black; }
.paketler3__pr-yazi { font-family: Satoshi Black; }
.paketler3__pr-degeri { font-family: Satoshi Black; font-size: 30px; font-weight: 700; }
.baslik-3 { font-size: 23px;color:#1f2933; font-family: Satoshi Black; }
.footer .widget-title { font-family: Satoshi Black; }
.page-header .container h2 { font-family: Satoshi Black; }
/* text secondary */
.reply a:hover {color: #1f2933; }
cite.fn a:hover {color: #1f2933; }
time:hover {color: #1f2933; }
.counter-box h6:after{color: #1f2933; display:none; }
/* service background */
.services1 {background: transparent url('/img/service-bg.jpg') center center/cover no-repeat scroll;}
    </style>
    
    <title>CoralClean - Professional Cleaning Services</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/ChatGPT-Image-Feb-2-2026-12_00_36-AM.png') }}">
    <meta name="description" content="Professional cleaning services in Estonia. Home cleaning, office cleaning, post-renovation cleaning and more.">
</head>
<body>
    <div class="preloader">
        <figure> <img src="{{ asset('img/ChatGPT-Image-Feb-2-2026-12_00_36-AM.png') }}" alt="CoralClean"> </figure>
    </div>
    <div class="page-transition"></div>
    <aside class="side-widget">
        <div class="inner">
            <div class="logo"> <a href="/"><img src="{{ asset('img/ChatGPT-Image-Feb-1-2026-02_13_45-PM.png') }}" alt="CoralClean"></a> </div>
            <div class="hide-mobile">
                <div class="or"><h2 class="h2-baslik-hizmetler-2"> Contact Information </h2></div>
                <div class="bosluksv"></div>
                <div class="iconsv"><i class="flaticon-call"></i></div>
                <address class="address">
                    +372 5555 5555
                    <div class="bosluksv"></div>
                    <div class="iconsv"><i class="flaticon-email"></i></div>
                    info@coralclean.ee
                    <div class="bosluksv"></div>
                    <div class="iconsv"><i class="flaticon-location"></i></div>
                    Tallinn, Estonia
                    <div class="bosluksv"></div>
                    <div class="or">
                        <a href="#"><i class="icon-social-facebook iconsocia"></i></a>
                        <a href="#"><i class="icon-social-instagram iconsociai"></i></a>
                        <a href="#"><i class="icon-social-twitter iconsocia"></i></a>
                    </div>
                </address>
            </div>
            <div class="show-mobile"><div class="site-menu"><div class="menu"></div></div></div>
            <small>© 2024 - CoralClean</small>
        </div>
    </aside>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container">
            <div class="logo"> <a href="/"><img src="{{ asset('img/ChatGPT-Image-Feb-1-2026-02_13_45-PM.png') }}" alt="CoralClean"></a> </div>
            <div class="site-menu">
                <div class="menueffect">
                    <div id="bs-example-navbar-collapse-2" class="collapse navbar-collapse">
                        <ul id="menu-main-menu" class="nav navbar-nav">
                            <li class="menu-item nav-item active"><a href="/" class="nav-link"><span>Home</span></a></li>
                            <li class="menu-item nav-item"><a href="#about" class="nav-link"><span>About Us</span></a></li>
                            <li class="menu-item menu-item-has-children dropdown nav-item">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link"><span>Services</span></a>
                                <ul class="dropdown-menu">
                                    <li class="menu-item nav-item"><a href="#services" class="dropdown-item"><span>Home Cleaning</span></a></li>
                                    <li class="menu-item nav-item"><a href="#services" class="dropdown-item"><span>Office Cleaning</span></a></li>
                                    <li class="menu-item nav-item"><a href="#services" class="dropdown-item"><span>Post-Renovation</span></a></li>
                                    <li class="menu-item nav-item"><a href="#services" class="dropdown-item"><span>All Services</span></a></li>
                                </ul>
                            </li>
                            <li class="menu-item nav-item"><a href="#packages" class="nav-link"><span>Packages</span></a></li>
                            <li class="menu-item nav-item"><a href="#clients" class="nav-link"><span>Clients</span></a></li>
                            <li class="menu-item nav-item"><a href="#contact" class="nav-link"><span>Contact</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="hamburger-menu"> <span></span> <span></span> <span></span> </div>
            <div class="navbar-button"> <div class="telh"><i class="flaticon-call iconp"></i>&nbsp;&nbsp;&nbsp;+372 5555 5555</div> </div>
        </div>
    </nav>
    <header class="slider">
        <div class="main-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="slide-image wow fadeInUp" data-wow-delay="0.3s" data-background="{{ asset('img/Deep-Clean.png') }}"></div>
                    <div class="container">
                        <h1>Detailed Cleaning <br>For Your Health </h1>
                        <p>We are at your service with our expert staff. </p>
                        <div class="bosluk1"></div>
                        <a href="#services">Learn More →</a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide-image wow fadeInUp" data-wow-delay="0.3s" data-background="{{ asset('img/Hero.png') }}"></div>
                    <div class="container">
                        <h1>Professional <br>Cleaning Services</h1>
                        <p>Quality you can trust</p>
                        <div class="bosluk1"></div>
                        <a href="#contact">Contact Us →</a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide-image wow fadeInUp" data-wow-delay="0.3s" data-background="{{ asset('img/Move-In-Out.png') }}"></div>
                    <div class="container">
                        <h1>Move In/Out <br>Cleaning</h1>
                        <p>Perfect for relocations</p>
                        <div class="bosluk1"></div>
                        <a href="#packages">View Packages →</a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide-image wow fadeInUp" data-wow-delay="0.3s" data-background="{{ asset('img/Office-Care.png') }}"></div>
                    <div class="container">
                        <h1>Office <br>Cleaning</h1>
                        <p>Keep your workplace spotless</p>
                        <div class="bosluk1"></div>
                        <a href="#services">Learn More →</a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide-image wow fadeInUp" data-wow-delay="0.3s" data-background="{{ asset('img/Quick-Clean.png') }}"></div>
                    <div class="container">
                        <h1>Quick <br>Cleaning</h1>
                        <p>Fast and efficient service</p>
                        <div class="bosluk1"></div>
                        <a href="#contact">Book Now →</a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide-image wow fadeInUp" data-wow-delay="0.3s" data-background="{{ asset('img/Urgent-Clean.png') }}"></div>
                    <div class="container">
                        <h1>Urgent <br>Cleaning</h1>
                        <p>Same day service available</p>
                        <div class="bosluk1"></div>
                        <a href="#contact">Call Us →</a>
                    </div>
                </div>
            </div>
        </div> 
        <div class="button-prev">❮</div>
        <div class="button-next">❯</div>
    </header>
    <div class="bosluk3h3"></div>
    <section class="information">
        <div class="bosluk3"></div>
        <div class="tabloozellik">
            <div class="tablo--1-ve-4">
                <div class="paketler wow flipInY" data-wow-delay="0.6s">
                    <div class="paketler__on paketler__on--onyazi">
                        <div class="paketler__icerik">
                            <div class="icon"><i class="flaticon-group"></i></div>
                            <h3 class="baslik-3 h-yazi-margin-kucuk">Happy Customers</h3>
                        </div>
                    </div>
                    <div class="paketler__on paketler__on--arkayazi paketler__on--arkayazi-1">
                        <div class="paketler__pr">
                            <div class="paketler__pr-kutu">
                                <h3 class="baslik-sol h-yazi-margin-kucuk">Happy Customers</h3>
                                <p class="services-kutu2--yazi wow fade">Our most important priority is customer satisfaction. We are proud to provide quality service.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tablo--1-ve-4">
                <div class="paketler wow flipInY" data-wow-delay="0.7s">
                    <div class="paketler__on paketler__on--onyazi">
                        <div class="paketler__icerik">
                            <div class="icon"><i class="flaticon-medal"></i></div>
                            <h3 class="baslik-3 h-yazi-margin-kucuk">Best Prices</h3>
                        </div>
                    </div>
                    <div class="paketler__on paketler__on--arkayazi paketler__on--arkayazi-1">
                        <div class="paketler__pr">
                            <div class="paketler__pr-kutu">
                                <h3 class="baslik-sol h-yazi-margin-kucuk">Best Prices</h3>
                                <p class="services-kutu2--yazi wow fade">Cleaning services at the most affordable prices with the best service guarantee.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tablo--1-ve-4">
                <div class="paketler wow flipInY" data-wow-delay="0.8s">
                    <div class="paketler__on paketler__on--onyazi">
                        <div class="paketler__icerik">
                            <div class="icon"><i class="flaticon-team-1"></i></div>
                            <h3 class="baslik-3 h-yazi-margin-kucuk">Experienced Team</h3>
                        </div>
                    </div>
                    <div class="paketler__on paketler__on--arkayazi paketler__on--arkayazi-1">
                        <div class="paketler__pr">
                            <div class="paketler__pr-kutu">
                                <h3 class="baslik-sol h-yazi-margin-kucuk">Experienced Team</h3>
                                <p class="services-kutu2--yazi wow fade">Expert staff with modern equipment, prioritizing customer satisfaction.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tablo--1-ve-4">
                <div class="paketler wow flipInY" data-wow-delay="0.9s">
                    <div class="paketler__on paketler__on--onyazi">
                        <div class="paketler__icerik">
                            <div class="icon"><i class="flaticon-stopwatch"></i></div>
                            <h3 class="baslik-3 h-yazi-margin-kucuk">Fast Service</h3>
                        </div>
                    </div>
                    <div class="paketler__on paketler__on--arkayazi paketler__on--arkayazi-1">
                        <div class="paketler__pr">
                            <div class="paketler__pr-kutu">
                                <h3 class="baslik-sol h-yazi-margin-kucuk">Fast Service</h3>
                                <p class="services-kutu2--yazi wow fade">We plan and come to your place quickly. Making your space sparkling clean.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="bosluk8"></div>
    <section class="hakkimizda-bolumu-anasayfa" id="about">
        <div class="h-yazi-ozel h-yazi-margin-ozel"></div>
        <div class="tablo">
            <div class="tablo--1-ve-2 wow fade">
                <div class="galeri1 wow" data-wow-delay="0.5s"><img class="imagerotate" src="" alt=""></div>
                <div class="galeri wow rollIn" data-wow-delay="100ms" data-wow-duration="1500ms" data-tilt>
                    <img src="{{ asset('img/cleaningo-about.png') }}" alt="About CoralClean" class="galeri__gorsel galeri__gorsel--3 zimage">
                </div>
            </div>
            <div class="tablo--1-ve-3 wow fadeInUp" data-wow-delay="0.5s">
                <h2 class="h2-baslik-anasayfa-ozel wow fadeInUp" data-wow-delay="0.6s"> Professional Cleaning </h2>
                <div class="bosluk333"></div>
                <p class="paragraf wow fade animated">We provide professionally top quality cleaning services for many years. For us, success is the priority in customer satisfaction, mutual trust, fast quality and doing the right job on time.</p>
                <div class="bosluk333"></div>
                <img class="divider" width="120" height="15" title="divider" alt="divider" src="{{ asset('img/divider.jpg') }}">
                <div class="bosluk333"></div>
                <div class="row">
                    <div class="col-sm-2 wow fadeInRight" data-wow-delay="0.7s"><div class="iconleft"><i class="flaticon-education"></i></div></div>
                    <div class="col-sm-10 wow fadeInRight" data-wow-delay="0.8s">
                        <h3 class="baslik-3s h-yazi-margin-kucuk1">Personnel Services</h3><br>
                        <p class="paragraf-info">We know cleanliness is important for your health.</p><br>
                    </div>
                </div>
                <div class="bosluk13qs"></div>
                <div class="row">
                    <div class="col-sm-2 wow fadeInRight" data-wow-delay="0.9s"><div class="iconleft"><i class="flaticon-review"></i></div></div>
                    <div class="col-sm-10 wow fadeInRight" data-wow-delay="1s">
                        <h3 class="baslik-3s h-yazi-margin-kucuk1">Cleaning services</h3><br>
                        <p class="paragraf-info">We work meticulously for the cleanliness of your workplace.</p><br>
                    </div>
                </div>
                <div class="bosluk1"></div>
                <a href="#contact" class="custom-button wow fadeInUp" data-wow-delay="1.3s">Get to know us →</a>
                <div class="bosluk3rh"></div>
            </div>
        </div>
    </section>
    <div class="bosluk4"></div>
    <section class="services1 wow fadeInUp" data-wow-delay="0.3s" id="services">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="h-yazi-ortalama h-yazi-margin-orta-3">
                        <div class="icon"><i class="flaticon-clean-1"></i></div>
                        <h2 class="h2-baslik-hizmetler-2 wow fadeInUp" data-wow-delay="0.4s"> Reliable Cleaning Services </h2>
                    </div>
                    <p class="h2-baslik-hizmetler-2__paragraf wow fadeInUp" data-wow-delay="0.5s">We are here for fast and reliable service. Quality cleaning at your doorstep.</p>
                </div>
            </div>
            <div class="ortabutton">
                <div class="bosluk1"></div>
                <a href="#contact" class="custom-button wow fadeInUp" data-wow-delay="0.6s">All Services →</a>
                <div class="bosluk3"></div>
            </div>
        </div>
        <div class="bosluk3"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="paketler2 wow rotateIn" data-wow-delay="0.6s" data-tilt>
                        <div class="paketler2__on paketler2__on--onyazi">
                            <div class="paketler2__gorsel paketler2__gorsel--1">
                                <div class="paketler2__icerik">
                                    <div class="iconw"><i class="flaticon-clean-2"></i></div>
                                    <h3 class="baslik-3white h-yazi-margin-kucuk">Window & Glass Cleaning</h3>
                                    <p class="services-kutu2--yazi wow fade">Professional window and glass cleaning for homes and businesses.</p>
                                </div>
                            </div>
                        </div>
                        <div class="paketler2__on paketler2__on--arkayazi paketler2__on--arkayazi-1">
                            <div class="paketler2__pr">
                                <div class="paketler2__pr-kutu">
                                    <h3 class="baslik-sol h-yazi-margin-kucuk">Window & Glass Cleaning</h3>
                                    <p class="services-kutu2--yazi wow fade">Professional window and glass cleaning for homes and businesses.</p>
                                </div>
                                <a href="#contact" class="custom-button">Request →</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="paketler2 wow rotateIn" data-wow-delay="0.7s" data-tilt>
                        <div class="paketler2__on paketler2__on--onyazi">
                            <div class="paketler2__gorsel paketler2__gorsel--1">
                                <div class="paketler2__icerik">
                                    <div class="iconw"><i class="flaticon-mop"></i></div>
                                    <h3 class="baslik-3white h-yazi-margin-kucuk">Deep Cleaning</h3>
                                    <p class="services-kutu2--yazi wow fade">Thorough deep cleaning service for every corner of your space.</p>
                                </div>
                            </div>
                        </div>
                        <div class="paketler2__on paketler2__on--arkayazi paketler2__on--arkayazi-1">
                            <div class="paketler2__pr">
                                <div class="paketler2__pr-kutu">
                                    <h3 class="baslik-sol h-yazi-margin-kucuk">Deep Cleaning</h3>
                                    <p class="services-kutu2--yazi wow fade">Thorough deep cleaning service for every corner of your space.</p>
                                </div>
                                <a href="#contact" class="custom-button">Request →</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="paketler2 wow rotateIn" data-wow-delay="0.8s" data-tilt>
                        <div class="paketler2__on paketler2__on--onyazi">
                            <div class="paketler2__gorsel paketler2__gorsel--1">
                                <div class="paketler2__icerik">
                                    <div class="iconw"><i class="flaticon-clean-1"></i></div>
                                    <h3 class="baslik-3white h-yazi-margin-kucuk">Post Renovation</h3>
                                    <p class="services-kutu2--yazi wow fade">Professional cleaning after construction or renovation.</p>
                                </div>
                            </div>
                        </div>
                        <div class="paketler2__on paketler2__on--arkayazi paketler2__on--arkayazi-1">
                            <div class="paketler2__pr">
                                <div class="paketler2__pr-kutu">
                                    <h3 class="baslik-sol h-yazi-margin-kucuk">Post Renovation</h3>
                                    <p class="services-kutu2--yazi wow fade">Professional cleaning after construction or renovation.</p>
                                </div>
                                <a href="#contact" class="custom-button">Request →</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="paketler2 wow rotateIn" data-wow-delay="0.9s" data-tilt>
                        <div class="paketler2__on paketler2__on--onyazi">
                            <div class="paketler2__gorsel paketler2__gorsel--1">
                                <div class="paketler2__icerik">
                                    <div class="iconw"><i class="flaticon-clean"></i></div>
                                    <h3 class="baslik-3white h-yazi-margin-kucuk">Office Cleaning</h3>
                                    <p class="services-kutu2--yazi wow fade">Keep your workplace clean and productive.</p>
                                </div>
                            </div>
                        </div>
                        <div class="paketler2__on paketler2__on--arkayazi paketler2__on--arkayazi-1">
                            <div class="paketler2__pr">
                                <div class="paketler2__pr-kutu">
                                    <h3 class="baslik-sol h-yazi-margin-kucuk">Office Cleaning</h3>
                                    <p class="services-kutu2--yazi wow fade">Keep your workplace clean and productive.</p>
                                </div>
                                <a href="#contact" class="custom-button">Request →</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="paketler2 wow rotateIn" data-wow-delay="1s" data-tilt>
                        <div class="paketler2__on paketler2__on--onyazi">
                            <div class="paketler2__gorsel paketler2__gorsel--1">
                                <div class="paketler2__icerik">
                                    <div class="iconw"><i class="flaticon-brush"></i></div>
                                    <h3 class="baslik-3white h-yazi-margin-kucuk">Carpet Cleaning</h3>
                                    <p class="services-kutu2--yazi wow fade">Professional carpet cleaning with 100% satisfaction.</p>
                                </div>
                            </div>
                        </div>
                        <div class="paketler2__on paketler2__on--arkayazi paketler2__on--arkayazi-1">
                            <div class="paketler2__pr">
                                <div class="paketler2__pr-kutu">
                                    <h3 class="baslik-sol h-yazi-margin-kucuk">Carpet Cleaning</h3>
                                    <p class="services-kutu2--yazi wow fade">Professional carpet cleaning with 100% satisfaction.</p>
                                </div>
                                <a href="#contact" class="custom-button">Request →</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="paketler2 wow rotateIn" data-wow-delay="1.1s" data-tilt>
                        <div class="paketler2__on paketler2__on--onyazi">
                            <div class="paketler2__gorsel paketler2__gorsel--1">
                                <div class="paketler2__icerik">
                                    <div class="iconw"><i class="flaticon-vacuum"></i></div>
                                    <h3 class="baslik-3white h-yazi-margin-kucuk">Home Cleaning</h3>
                                    <p class="services-kutu2--yazi wow fade">The best home cleaning service, guaranteed.</p>
                                </div>
                            </div>
                        </div>
                        <div class="paketler2__on paketler2__on--arkayazi paketler2__on--arkayazi-1">
                            <div class="paketler2__pr">
                                <div class="paketler2__pr-kutu">
                                    <h3 class="baslik-sol h-yazi-margin-kucuk">Home Cleaning</h3>
                                    <p class="services-kutu2--yazi wow fade">The best home cleaning service, guaranteed.</p>
                                </div>
                                <a href="#contact" class="custom-button">Request →</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </section>
    <section class="ozellika" data-background="#f3f3f3" style="background: #f3f3f3;">
        <div class="container">
            <div class="row align-items-center no-gutters">
                <div class="col-lg-12 text-center">
                    <div class="wow fadeInUp" data-wow-delay="0.3s">
                        <div class="boslukalt"></div>
                        <h2 class="h2-baslik-hizmetler-2 wow fadeInRight" data-wow-delay="0.4s">We Have Competent Experience</h2>
                        <p class="h2-baslik-hizmetler-2__paragraf wow fadeInUp" data-wow-delay="0.4s">With our experienced team, we provide professional cleaning service.</p>   
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-4 col-md-4 text-center wow fadeInUp" data-wow-delay="0.5s">
                    <div class="icon"><i class="flaticon-group"></i></div>
                    <h3 class="baslik-3 h-yazi-margin-kucuk mt-3">Expert Team</h3>
                    <p class="paragraf">Professional cleaning specialists with years of experience.</p>
                </div>
                <div class="col-lg-4 col-md-4 text-center wow fadeInUp" data-wow-delay="0.6s">
                    <div class="icon"><i class="flaticon-medal"></i></div>
                    <h3 class="baslik-3 h-yazi-margin-kucuk mt-3">Quality Service</h3>
                    <p class="paragraf">We guarantee the highest quality in every job.</p>
                </div>
                <div class="col-lg-4 col-md-4 text-center wow fadeInUp" data-wow-delay="0.7s">
                    <div class="icon"><i class="flaticon-stopwatch"></i></div>
                    <h3 class="baslik-3 h-yazi-margin-kucuk mt-3">Fast & Reliable</h3>
                    <p class="paragraf">Quick response and reliable service every time.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="team-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="carousel-classes">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="class-box">
                                    <div class="services-kutu2 wow fadeInLeft" data-wow-delay="0.5s">
                                        <div class="member-box wow reveal-effect">
                                            <figure><img src="{{ asset('img/teams1.png') }}" alt="Team">
                                                <figcaption><h6>Anna K.</h6><p class="paragraf-sol-beyaz-orta">Team Lead</p>
                                                    <ul class="social"><li><a href="#"><i class="icon-social-facebook"></i></a></li><li><a href="#"><i class="icon-social-twitter"></i></a></li><li><a href="#"><i class="icon-social-instagram"></i></a></li></ul>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="class-box">
                                    <div class="services-kutu2 wow fadeInLeft" data-wow-delay="0.6s">
                                        <div class="member-box wow reveal-effect">
                                            <figure><img src="{{ asset('img/teams2.png') }}" alt="Team">
                                                <figcaption><h6>Maria S.</h6><p class="paragraf-sol-beyaz-orta">Senior Cleaner</p>
                                                    <ul class="social"><li><a href="#"><i class="icon-social-facebook"></i></a></li><li><a href="#"><i class="icon-social-twitter"></i></a></li><li><a href="#"><i class="icon-social-instagram"></i></a></li></ul>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="class-box">
                                    <div class="services-kutu2 wow fadeInLeft" data-wow-delay="0.7s">
                                        <div class="member-box wow reveal-effect">
                                            <figure><img src="{{ asset('img/teams3.png') }}" alt="Team">
                                                <figcaption><h6>Elena V.</h6><p class="paragraf-sol-beyaz-orta">Specialist</p>
                                                    <ul class="social"><li><a href="#"><i class="icon-social-facebook"></i></a></li><li><a href="#"><i class="icon-social-twitter"></i></a></li><li><a href="#"><i class="icon-social-instagram"></i></a></li></ul>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="class-box">
                                    <div class="services-kutu2 wow fadeInRight" data-wow-delay="0.8s">
                                        <div class="member-box wow reveal-effect">
                                            <figure><img src="{{ asset('img/teams4.png') }}" alt="Team">
                                                <figcaption><h6>Katrin M.</h6><p class="paragraf-sol-beyaz-orta">Cleaner</p>
                                                    <ul class="social"><li><a href="#"><i class="icon-social-facebook"></i></a></li><li><a href="#"><i class="icon-social-twitter"></i></a></li><li><a href="#"><i class="icon-social-instagram"></i></a></li></ul>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="special-paket-alani" id="packages">
        <div class="h-yazi-ortalama h-yazi-margin-orta-3">
            <div class="icon wow fadeInUp" data-wow-delay="0.3s"><i class="flaticon-medal"></i></div>
            <h2 class="h2-baslik-hizmetler-2 wow fadeInUp" data-wow-delay="0.4s"> Special Packages </h2>
        </div>
        <p class="h2-baslik-hizmetler-2__paragraf wow fadeInUp" data-wow-delay="0.6s">Select a package to get more value</p>
        <div class="bosluk3"></div>
        <div class="tablo">
            <div class="tablo--1-ve-3">
                <div class="paketler3 wow flipInY" data-wow-delay="0.6s" data-tilt>
                    <div class="paketler3__on paketler3__on--onyazi">
                        <div class="paketler3__gorsel paketler3__gorsel--1">
                            <div class="iconw"><i class="flaticon-vacuum"></i></div>
                            <h3 class="baslik-sol h-yazi-margin-kucuk">Home Cleaning</h3>
                            <p class="services-kutu2--yazi wow fade">Complete home cleaning by expert team.</p>
                        </div>
                        <div class="paketler3__icerik">
                            <ul>
                                <li>★ All rooms from floor to ceiling</li>
                                <li>★ Kitchen deep cleaning</li>
                                <li>★ Bathroom sanitization</li>
                                <li>★ Window cleaning</li>
                                <li>★ Floor mopping</li>
                            </ul>
                        </div>
                    </div>
                    <div class="paketler3__on paketler3__on--arkayazi paketler3__on--arkayazi-1">
                        <div class="paketler3__pr">
                            <div class="paketler3__pr-kutu">
                                <p class="paketler3__pr-yazi">Home Cleaning</p>
                                <p class="paketler3__pr-degeri">from €80</p>
                            </div>
                            <a href="#contact" class="custom-button">Request Quote!</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tablo--1-ve-3">
                <div class="paketler3 wow flipInY" data-wow-delay="0.7s" data-tilt>
                    <div class="paketler3__on paketler3__on--onyazi">
                        <div class="paketler3__gorsel paketler3__gorsel--1">
                            <div class="iconw"><i class="flaticon-clean-1"></i></div>
                            <h3 class="baslik-sol h-yazi-margin-kucuk">Post Renovation</h3>
                            <p class="services-kutu2--yazi wow fade">Cleaning after construction or renovation.</p>
                        </div>
                        <div class="paketler3__icerik">
                            <ul>
                                <li>★ Dust and debris removal</li>
                                <li>★ Paint residue cleaning</li>
                                <li>★ Window tape removal</li>
                                <li>★ Deep floor cleaning</li>
                                <li>★ Final sanitization</li>
                            </ul>
                        </div>
                    </div>
                    <div class="paketler3__on paketler3__on--arkayazi paketler3__on--arkayazi-1">
                        <div class="paketler3__pr">
                            <div class="paketler3__pr-kutu">
                                <p class="paketler3__pr-yazi">Post Renovation</p>
                                <p class="paketler3__pr-degeri">from €150</p>
                            </div>
                            <a href="#contact" class="custom-button">Request Quote!</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tablo--1-ve-3">
                <div class="paketler3 wow flipInY" data-wow-delay="0.8s" data-tilt>
                    <div class="paketler3__on paketler3__on--onyazi">
                        <div class="paketler3__gorsel paketler3__gorsel--1">
                            <div class="iconw"><i class="flaticon-clean"></i></div>
                            <h3 class="baslik-sol h-yazi-margin-kucuk">Office Cleaning</h3>
                            <p class="services-kutu2--yazi wow fade">Professional office cleaning service.</p>
                        </div>
                        <div class="paketler3__icerik">
                            <ul>
                                <li>★ Desk and equipment cleaning</li>
                                <li>★ Floor vacuuming & mopping</li>
                                <li>★ Bathroom sanitization</li>
                                <li>★ Kitchen area cleaning</li>
                                <li>★ Window cleaning</li>
                            </ul>
                        </div>
                    </div>
                    <div class="paketler3__on paketler3__on--arkayazi paketler3__on--arkayazi-1">
                        <div class="paketler3__pr">
                            <div class="paketler3__pr-kutu">
                                <p class="paketler3__pr-yazi">Office Cleaning</p>
                                <p class="paketler3__pr-degeri">from €200</p>
                            </div>
                            <a href="#contact" class="custom-button">Request Quote!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="markalar" id="clients">
        <div class="h-yazi-ortalama h-yazi-margin-orta-3 wow animated fadeInUp" data-wow-delay="0.5s">
            <div class="iconw wow fadeInUp" data-wow-delay="0.6s"><i class="flaticon-badge"></i></div>
            <h2 class="h2-baslik-hizmetler-21 wow fadeInUp" data-wow-delay="0.6s"> Our Valued Customers </h2>
        </div>
        <p class="h2-baslik-hizmetler-21__paragraf wow fadeInUp" data-wow-delay="0.6s">We work day and night to create clean spaces.</p>
        <div class="bosluk3"></div>
        <div class="container">
            <div class="row">
                @for($i = 1; $i <= 10; $i++)
                <div class="col-lg-2">
                    <div class="h-yazi-ortalama h-yazi-margin-kucuk-21 wow animated fadeInUp" data-wow-delay="0.5s">
                        <img src="{{ asset('img/client' . $i . '.png') }}" alt="Client {{ $i }}" class="marka">
                    </div>
                </div>
                @endfor
                <div class="col-lg-2">
                    <div class="h-yazi-ortalama h-yazi-margin-kucuk-21 wow animated fadeInUp" data-wow-delay="0.5s">
                        <img src="{{ asset('img/client2.png') }}" alt="Client" class="marka">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="h-yazi-ortalama h-yazi-margin-kucuk-21 wow animated fadeInUp" data-wow-delay="0.5s">
                        <img src="{{ asset('img/client7.png') }}" alt="Client" class="marka">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="yorumlar-alani-sayfa">
        <div class="container">
            <div class="row">
                <div class="col-12 wow animated fadeIn" data-wow-delay="0.5s">
                    <div class="h-yazi-ortalama h-yazi-margin-orta-3">
                        <div class="icon wow fadeInUp" data-wow-delay="0.5s"><i class="flaticon-review"></i></div>
                        <h2 class="h2-baslik-hizmetler-yorum wow fadeInUp" data-wow-delay="0.5s"> What Our Customers Say </h2> 
                    </div>
                    <p class="h2-baslik-hizmetler-yorum__yorum wow fadeInUp" data-wow-delay="0.5s">Reviews from our satisfied customers.</p>
                    <div class="bosluk3a"></div>
                </div>
                <div class="col-12">
                    <div class="carousel-classes">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide wow animated fadeInLeft" data-wow-delay="0.5s">
                                <div class="class-box">
                                    <div class="testimonial-card">
                                        <div class="testimon-text">Excellent service! Highly recommended!<i class="fas fa-quote-right quote"></i></div>
                                        <div class="testimonialimg"><div class="testimonimg"><img src="{{ asset('img/testimonial1.png') }}" alt=""></div><h3 class='person'>Anna</h3></div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide wow animated fadeInLeft" data-wow-delay="0.5s">
                                <div class="class-box">
                                    <div class="testimonial-card">
                                        <div class="testimon-text">Very professional team. Thank you CoralClean!<i class="fas fa-quote-right quote"></i></div>
                                        <div class="testimonialimg"><div class="testimonimg"><img src="{{ asset('img/testimonial2.png') }}" alt=""></div><h3 class='person'>Michael</h3></div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide wow animated fadeInLeft" data-wow-delay="0.5s">
                                <div class="class-box">
                                    <div class="testimonial-card">
                                        <div class="testimon-text">Fast, efficient, and affordable.<i class="fas fa-quote-right quote"></i></div>
                                        <div class="testimonialimg"><div class="testimonimg"><img src="{{ asset('img/testimonial5.png') }}" alt=""></div><h3 class='person'>Katrin</h3></div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide wow animated fadeInLeft" data-wow-delay="0.5s">
                                <div class="class-box">
                                    <div class="testimonial-card">
                                        <div class="testimon-text">Arrived on time and did excellent work!<i class="fas fa-quote-right quote"></i></div>
                                        <div class="testimonialimg"><div class="testimonimg"><img src="{{ asset('img/testimonial3.png') }}" alt=""></div><h3 class='person'>Robert</h3></div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide wow animated fadeInLeft" data-wow-delay="0.5s">
                                <div class="class-box">
                                    <div class="testimonial-card">
                                        <div class="testimon-text">Best cleaning service in Tallinn!<i class="fas fa-quote-right quote"></i></div>
                                        <div class="testimonialimg"><div class="testimonimg"><img src="{{ asset('img/testimonial4.png') }}" alt=""></div><h3 class='person'>Elena</h3></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>      
                </div>
            </div>
        </div>
    </section>
    <section class="content-section" data-background="#fafafa">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 wow fadeInLeft" data-wow-delay="0.6s">
                    <div class="icon"><i class="flaticon-handshake"></i></div>
                    <div class="counter-box wow fade"><span class="odometer" data-count="2500" data-status="yes">0</span><h6>Cleanings Done</h6></div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInLeft" data-wow-delay="0.7s">
                    <div class="icon"><i class="flaticon-group"></i></div>
                    <div class="counter-box wow fade"><span class="odometer" data-count="450" data-status="yes">0</span><h6>Happy Clients</h6></div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInRight" data-wow-delay="0.8s">
                    <div class="icon"><i class="flaticon-insurance"></i></div>
                    <div class="counter-box wow fade"><span class="odometer" data-count="500" data-status="yes">0</span><h6>Finished Projects</h6></div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInRight" data-wow-delay="0.9s">
                    <div class="icon"><i class="flaticon-review"></i></div>
                    <div class="counter-box wow fade"><span class="odometer" data-count="15" data-status="yes">0</span><h6>Years Experience</h6></div>
                </div>
            </div>
        </div>
    </section>
    <section class="yorumlar-alani-sayfa">
        <div class="container">
            <div class="row">
                <div class="col-12 wowfade">
                    <div class="h-yazi-ortalama h-yazi-margin-orta-3">
                        <div class="icon wow fadeInUp" data-wow-delay="0.3s"><i class="flaticon-recommended"></i></div>
                        <h2 class="h2-baslik-hizmetler-yorum wow fadeInUp" data-wow-delay="0.4s"> Latest News & Articles </h2> 
                    </div>
                    <p class="h2-baslik-hizmetler-yorum__yorum wow fadeInUp" data-wow-delay="0.5s">Stay updated with cleaning tips.</p>
                    <div class="bosluksv5"></div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="carousel-classes">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide wow fadeInLeft" data-wow-delay="0.5s" data-tilt>
                                <div class="post-kutu">
                                    <img src="{{ asset('img/news1-banner-1.png') }}" class="wp-post-image" alt="">
                                    <div class="datesection"><span class="date">01.02.2024</span>&nbsp;<span class="tt">-</span>&nbsp;<span>Cleaning Tips</span></div>
                                    <h3 class="baslik-3 h-yazi-margin-kucuk">How to clean the kitchen</h3>
                                    <p class="post-kutu--yazi">Kitchen cleaning tips for a spotless cooking space...</p>
                                    <div class="h-yazi-ortalama h-yazi-margin-4"><a href="#" class="custom-button">Read More</a></div>
                                </div>
                            </div>
                            <div class="swiper-slide wow fadeInLeft" data-wow-delay="0.5s" data-tilt>
                                <div class="post-kutu">
                                    <img src="{{ asset('img/news3-banner-1.png') }}" class="wp-post-image" alt="">
                                    <div class="datesection"><span class="date">28.01.2024</span>&nbsp;<span class="tt">-</span>&nbsp;<span>Cleaning Tips</span></div>
                                    <h3 class="baslik-3 h-yazi-margin-kucuk">Wall cleaning techniques</h3>
                                    <p class="post-kutu--yazi">Keep your walls looking fresh...</p>
                                    <div class="h-yazi-ortalama h-yazi-margin-4"><a href="#" class="custom-button">Read More</a></div>
                                </div>
                            </div>
                            <div class="swiper-slide wow fadeInLeft" data-wow-delay="0.5s" data-tilt>
                                <div class="post-kutu">
                                    <img src="{{ asset('img/news4-banner-1.png') }}" class="wp-post-image" alt="">
                                    <div class="datesection"><span class="date">25.01.2024</span>&nbsp;<span class="tt">-</span>&nbsp;<span>Cleaning Tips</span></div>
                                    <h3 class="baslik-3 h-yazi-margin-kucuk">Laundry cleaning ideas</h3>
                                    <p class="post-kutu--yazi">Tips for keeping clothes clean...</p>
                                    <div class="h-yazi-ortalama h-yazi-margin-4"><a href="#" class="custom-button">Read More</a></div>
                                </div>
                            </div>
                            <div class="swiper-slide wow fadeInLeft" data-wow-delay="0.5s" data-tilt>
                                <div class="post-kutu">
                                    <img src="{{ asset('img/news2-banner-1.png') }}" class="wp-post-image" alt="">
                                    <div class="datesection"><span class="date">20.01.2024</span>&nbsp;<span class="tt">-</span>&nbsp;<span>Cleaning Tips</span></div>
                                    <h3 class="baslik-3 h-yazi-margin-kucuk">Quick room cleaning</h3>
                                    <p class="post-kutu--yazi">How to clean a room quickly...</p>
                                    <div class="h-yazi-ortalama h-yazi-margin-4"><a href="#" class="custom-button">Read More</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </section>
    <footer class="footer" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="logo wow animated fadeInUp" data-wow-delay="0.5s"><img src="{{ asset('img/logo-footer-cleaningo.png') }}" alt="CoralClean"></div>
                    <div class="footer-info wow animated fadeInUp" data-wow-delay="0.5s">
                        <p><i class="flaticon-pin iconpfooter1"></i>Tallinn, Estonia</p>
                        <p class="fic"><i class="flaticon-call iconpfooter2"></i>&nbsp;&nbsp;&nbsp;+372 5555 5555</p><br>
                        <p><i class="flaticon-email iconpfooter3"></i>&nbsp;&nbsp;&nbsp;info@coralclean.ee</p><br>
                    </div>
                    <ul class="footer-social wow animated fadeInUp" data-wow-delay="0.5s">
                        <li><a href="#"><i class="icon-social-facebook iconsociaf"></i></a></li>
                        <li><a href="#"><i class="icon-social-instagram iconsociaf"></i></a></li>
                        <li><a href="#"><i class="icon-social-twitter iconsociaf"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                    <h6 class="widget-title">Contact Us</h6>
                    <p class="footerp">Send us a message and we'll get back to you!</p>
                    <div class="bosluk333"></div>
                    <form action="{{ url('/en/contact') }}" method="POST">
                        @csrf
                        <div class="form__grup wow fadeInLeft" data-wow-delay="0.7s"><input type="text" name="name" class="form-popup__input" placeholder="Your Name" required></div>
                        <div class="form__grup wow fadeInLeft" data-wow-delay="0.7s"><input type="email" name="email" class="form-popup__input" placeholder="Your Email" required></div>                        
                        <div class="form__grup wow fadeInUp" data-wow-delay="0.9s"><input type="submit" class="custom-buttonw1" value="Send Message →"></div>
                    </form>
                    @if(session('success'))<div class="alert alert-success mt-3">{{ session('success') }}</div>@endif
                </div>
                <div class="col-lg-2 offset-xl-1 col-sm-6 wow animated fadeInUp" data-wow-delay="0.5s">
                    <h6 class="widget-title">Services</h6>
                    <div class="footer-menu">
                        <ul class="menu">
                            <li><a href="#services">Home Cleaning</a></li>
                            <li><a href="#services">Office Cleaning</a></li>
                            <li><a href="#services">Window Cleaning</a></li>
                            <li><a href="#services">Carpet Cleaning</a></li>
                            <li><a href="#services">Post-Renovation</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 wow animated fadeInUp" data-wow-delay="0.5s">
                    <h6 class="widget-title">Quick Links</h6>
                    <div class="footer-menu">
                        <ul class="menu">
                            <li><a href="#about">About Us</a></li>
                            <li><a href="#packages">Packages</a></li>
                            <li><a href="#clients">Clients</a></li>
                            <li><a href="#services">All Services</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12"><p class="copyright">© 2024 CoralClean - All Rights Reserved.</p></div>
            </div>
        </div>
        <div id="top" style="cursor: pointer;"><i class="flaticon-chevron icontops"></i><div class="bosluk3"></div></div>
    </footer>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/fancybox.min.js') }}"></script>
    <script src="{{ asset('js/swiper.min.js') }}"></script>
    <script src="{{ asset('js/odometer.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/3d.jquery.js') }}"></script>
    <script src="{{ asset('js/pointer.js') }}"></script>
    <script src="{{ asset('js/yukari-cik.js') }}"></script>
    <script src="{{ asset('js/tabs.js') }}"></script>
    <script src="{{ asset('js/team.js') }}"></script>
    <script>if (typeof init_pointer === 'function') { init_pointer({}); }</script>
</body>
</html>
