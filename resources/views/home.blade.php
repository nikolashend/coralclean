<!DOCTYPE html>
<html lang="{{ $locale ?? 'ru' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('home.meta_title') }}</title>
    <meta name="description" content="{{ __('home.meta_description') }}">
    <meta name="keywords" content="{{ __('home.meta_keywords') }}">
    <meta name="robots" content="index, follow, max-image-preview:large">
    
    <!-- hreflang -->
    <link rel="alternate" hreflang="ru-ee" href="{{ url('/ru') }}" />
    <link rel="alternate" hreflang="en-ee" href="{{ url('/en') }}" />
    <link rel="alternate" hreflang="et-ee" href="{{ url('/et') }}" />
    <link rel="alternate" hreflang="x-default" href="{{ url('/') }}" />
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,300,400,700,900" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" media="all" />
    <link rel="stylesheet" href="{{ asset('css/fancybox.min.css') }}" media="all" />
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}" media="all" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" media="all" />
    <link rel="stylesheet" href="{{ asset('css/odometer.min.css') }}" media="all" />
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}" media="all" />
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/ChatGPT-Image-Feb-2-2026-12_00_36-AM.png') }}">
    
    <style>
/* CoralClean Brand Design System — #2EC4C6 (Aqua) / #FF6F61 (Coral) / #1F2933 (Dark) */
.iconsociaf { font-size: 32px !important; }
.member-box figcaption ul li a { color: #fff; float: left; font-size: 23px !important; margin-top: -15px; }
.footer .footer-social li a { width: 71px; height: 54px !important; }
.wpcf7 form.sent .wpcf7-response-output { color: #000000 !important; }
.swiper-pagination-bullet { margin-left: 5px; }
.navbar-nav .nav-link:hover { color: #2ec4c6; }
.navbar .site-menu ul li a:hover { color: #ffffff; }
.slider .main-slider .swiper-slide .container a { background: #2ec4c6; }
.slider .main-slider .swiper-slide .container a:hover { background: #ff6f61; }
.navbar .navbar-button a { background: #2ec4c6; }
.slider .button-next:hover, .slider .button-prev:hover { background: #2ec4c6; border-color: transparent; }
.custom-button { background: #2ec4c6; font-family: Satoshi Black; }
.custom-button:hover { background: #ff6f61; }
.custom-button12 { background: #2ec4c6; }
.custom-button12:hover { background: #ff6f61; }
.preloader figure:after { border-top: 1px solid #2ec4c6; }
.menueffect a:hover { color: #ff6f61; }
.menueffect a:before { background-color: #fff; }
.counter-box h6:after { color: #1f2933; }
li a:hover { color: #2ec4c6; }
input#wp-block-search__input-1, input#wp-block-search__input-2, input#wp-block-search__input { border-bottom: 0.3rem solid #2ec4c6; }
.content-section { background: #2ec4c6; }
.content-section.bottom-dark-spacing:after { background: #2ec4c6; }
.section-title h2 { color: #2ec4c6; }
.image-box .time { color: #2ec4c6; }
.bg-light { background: #2ec4c6; }
.side-content form button[type="submit"] { color: #2ec4c6; }
.side-image .side-timetable li b { color: #2ec4c6; }
.side-member figcaption { background: #2ec4c6; }
.custom-progress span { color: #2ec4c6; }
.custom-progress .progress-bar .progress { background: #2ec4c6; }
.tab-wrapper .tab-nav li.active a { background: #2ec4c6; }
.tab-wrapper .tab-nav li.active a:hover { background: #ff6f61; }
.tab-wrapper .tab-item .tab-inner { background: #2ec4c6; }
.tab-wrapper .tab-item .tab-inner ul li span { color: #2ec4c6; }
.service-box { background: #2ec4c6; }
.service-box:before { background: #2ec4c6; }
.image-overlap-box figure { background: #2ec4c6; }
.image-overlap-box .content a:hover { color: #ff6f61; }
.video { background: #2ec4c6; }
.video a { color: #2ec4c6; }
.class-box figure { background: none; }
.dropdown-menu { background: #2ec4c6; }
.text-box h5 { color: #2ec4c6; }
.recent-news figure { background: #2ec4c6; }
.recent-news .content h3 a { color: #2ec4c6; }
.recent-news .content small span { background: #2ec4c6; }
.blog-box figure { background: #2ec4c6; }
.blog-box .content h3 a { color: #2ec4c6; }
.blog-box .content blockquote { color: #2ec4c6; }
.sidebar .widget .widget-title { color: #2ec4c6; }
.sidebar .widget .widget-title:before { background: #2ec4c6; }
.sidebar .widget form input[type="submit"] { background: #2ec4c6; }
.sidebar .widget .categories li a { color: #2ec4c6; }
.branch-box h6 { color: #2ec4c6; }
.branch-box a { color: #2ec4c6; }
.member-box figcaption { background: #2ec4c6; }
.icon { background: none; color: #2ec4c6; }
.iconsv { background: #2ec4c6; }
.iconk { color: #2ec4c6; }
.iconk:hover { color: #ff6f61; }
.sidebar-service { background: #2ec4c6; }
span.menu-service { background: #2ec4c6; color: #2ec4c6; }
span.menu-service:hover, span.menu-service.menuactive { background: #ff6f61; }
.iconleft { color: #2ec4c6; }
.iconleft:hover { color: #ff6f61; }
a.menucolor { color: #2ec4c6; }
a.menucolor:hover { color: #ff6f61; }
.pagination .page-item .page-link { color: #2ec4c6; }
.footer { background: #2ec4c6; background-image: linear-gradient(to right bottom, #2ec4c6, #ff6f61); }
.footer .footer-info a { color: #2ec4c6; }
.footer .copyright { background: #2ec4c6; }
.footer .footer-social li a:hover { background: #ff6f61; border: 1px solid rgba(255, 255, 255, 0.3); }
textarea#comment, input#author, input#email, input#url { border-bottom: 0.3rem solid #2ec4c6; }
.paketler2__on--arkayazi-1 { background: linear-gradient(to right bottom, #2ec4c6, #ff6f61d7); }
.form__input { border-bottom: 0.3rem solid #2ec4c6; }
.form__input:focus, .form__input:focus:invalid { border-bottom: 0.3rem solid #2ec4c6; }
.form__radio-buton { border: 0.5rem solid #2ec4c6; }
.form__radio-buton::after { background-color: #2ec4c6; }
.form-popup__input { border-bottom: 0.3rem solid #2ec4c6; }
.form-popup__input:focus, .form-popup__input:focus:invalid { border-bottom: 0.3rem solid #2ec4c6; }
.hizmetler-kutu--icon, .ozellik-kutu--icon, .post-kutu--icon, .yorum-kutu--icon, .ozellik-kutu-iletisim--icon, .baslik-4--icon { background-image: linear-gradient(to right, #2ec4c6, #ff6f61); }
.yukaricik { background-image: linear-gradient(to right bottom, #2ec4c6, #ff6f61); }
.footer-404 { background-image: linear-gradient(to right bottom, #2ec4c6, #ff6f61); }
.paketler-alani { background-color: #2ec4c6; }
.form-alani { background-image: linear-gradient(to right bottom, #2ec4c6, #ff6f61); }
.markalar { background: #2ec4c6; }
.h2-baslik-hizmetler { background-image: linear-gradient(to right, #2ec4c6, #ff6f61); }
.h2-baslik-hizmetler__paragraf { color: #2ec4c6; }
.h2-baslik-hizmetler-2 { background-image: linear-gradient(to right, #2ec4c6, #ff6f61); font-family: Satoshi Black; font-size: 30px; font-weight: 700; }
.side-widget small { color: #2ec4c6; }
.swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active { background: #2ec4c6; }
::-webkit-scrollbar-thumb { background: #ff6f61; }
.custom-buttonw1 { border-bottom: 0.3rem solid #2ec4c6; }
.iconsocia { color: #2ec4c6; }
.iconsocia:hover { color: #ff6f61; }
.paketler3__gorsel--1, .paketler3__on--arkayazi-1 { background-image: linear-gradient(to right bottom, #2ec4c6, #ff6f61); }
.paketler2__gorsel--1 { background: linear-gradient(#2ec4c6, #ff6f61), transparent center center/cover no-repeat scroll; }
p.countb { background: #2ec4c6; }
.icontops { background: #2ec4c6; }
input#submit { background: #2ec4c6; }
.custom-buttonw:hover { background: #2ec4c6; }
.comment-meta.commentmetadata a:hover, a.comment-edit-link:hover, p.logged-in-as a:hover, .menu-item a:hover { color: #ff6f61; }
li a { color: #000000; }
.tag-cloud-link { color: #2ec4c6; }
.tagcloud a:hover { color: #ff6f61; }
li#recent-posts-5 a:hover { color: #ff6f61; }
input#s { border-bottom: 0.3rem solid #ff6f61; }
.telh { background: #2ec4c6; border: 2px solid; }
.iconsociai { color: #2ec4c6; }
.iconsociai:hover { color: #ff6f61; }
::selection { background-color: #2ec4c6; }
.ozellik-kutu-yorumlar--icon, .services-kutu1--icon, .services-kutu2--icon, .services-kutu3--icon { background-image: linear-gradient(to right, #2ec4c6, #ff6f61); }
b.fn a:hover, li a:hover { color: #ff6f61; }
.wp-block-latest-posts__list a:hover { color: #2ec4c6; }
.wp-post-image { height: 100%; }
.paketler__on--arkayazi-1 { background-image: linear-gradient(to right bottom, #2ec4c6, #ff6f61); }
.paketler3__icerik { padding: 0rem; }
.services-kutu2--yazi1 { width: 100%; }
/* Typography */
.person { color: #2ec4c6; font-family: Satoshi Regular; font-size: 18px; font-weight: 400; }
.ozellik-kutu-iletisim--yazi { color: #2ec4c6; font-family: Satoshi Regular; font-size: 18px; font-weight: 400; }
.footer-info p, p, .h2-baslik-hizmetler-21__paragraf, .paketler3__icerik ul li { font-family: Satoshi Regular; font-size: 18px; font-weight: 400; }
body, .paragraf, .paragraf-info { color: #1f2933; font-family: Satoshi Regular; font-size: 18px; font-weight: 400; }
span.date, span.category, span.tt, .paragraf-info a, .paragraf-sol-beyaz a, .paragraf-sol-beyaz-orta a, .paragraf-ahp a, .paragraf-pdetay a, .paragraf-404 a { color: #1f2933; font-family: Satoshi Regular; font-size: 18px; }
.h2-baslik-hizmetler-yorum__yorum, .testimon-text, .post-kutu p, .services-kutu2--yazi1, .h2-baslik-hizmetler-2__paragraf, .paragraf-popup { color: #1f2933; font-family: Satoshi Regular; font-size: 18px; font-weight: 400; }
ul.post-categories { color: #2ec4c6; font-family: Satoshi Regular; font-size: 18px; }
.services-kutu2--yazi { font-family: Satoshi Regular; font-size: 18px; }
/* Headings */
.h2-baslik-anasayfa, .h2-baslik-anasayfa-ozel, .h2-baslik-anasayfa-blog, .h2-baslik-ahb, .h2-baslik-bottom, .h2-baslik-404, .h2-baslik-footer, .h2-baslik-iletisim-ozel, .h2-baslik-popup { background-image: linear-gradient(to right, #1f2933, #ff6f61); font-family: Satoshi Black; font-size: 30px; font-weight: 700; }
.h2-baslik-anasayfa { border-bottom: .1rem solid #2ec4c6; }
.baslik-3-h, .baslik-33, .baslik-star { color: #1f2933; font-family: Satoshi Black; font-size: 30px; font-weight: 700; }
.h2-baslik-hizmetler-yorum { background-image: linear-gradient(to right, #2ec4c6, #ff6f61); font-family: Satoshi Black; font-size: 30px; font-weight: 700; }
.baslik-3s, .baslik-3white { font-family: Satoshi Black; }
.baslik-3s { color: #1f2933; }
.counter-box .odometer, .baslik-orta, .baslik-4, .counter-box h6 { color: #1f2933; font-family: Satoshi Black; }
.baslik-orta, .baslik-3 { font-size: 23px; font-weight: 700; }
.baslik-3 { color: #1f2933; font-family: Satoshi Black; }
.slider .main-slider .swiper-slide .container h1, .slider .main-slider .swiper-slide .container p { color: #2ec4c6; font-family: Satoshi Black; }
.slider .main-slider .swiper-slide .container a, .custom-buttonw, .baslik-sol, .member-box figcaption h6, .member-box figcaption p { font-family: Satoshi Black; }
.h2-baslik-hizmetler-21, .h2-baslik-hizmetler-2111 { font-family: Satoshi Black; font-size: 30px; font-weight: 700; }
.baslik-3-service, .paketler3__pr-yazi { font-family: Satoshi Black; }
.paketler3__pr-degeri { font-family: Satoshi Black; font-size: 30px; font-weight: 700; }
.footer .widget-title, .page-header .container h2 { font-family: Satoshi Black; }
/* Secondary text */
.reply a:hover, cite.fn a:hover, time:hover { color: #1f2933; }
.counter-box h6:after { color: #1f2933; display: none; }
/* Service background */
.services1 { background: transparent url('/img/service-bg.jpg') center center/cover no-repeat scroll; }
/* FAQ Styles */
.faq-item { border-bottom: 1px solid #e0e0e0; padding: 20px 0; }
.faq-question { cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-family: Satoshi Black; font-size: 18px; color: #1f2933; }
.faq-question:hover { color: #2ec4c6; }
.faq-answer { display: none; padding-top: 15px; color: #1f2933; font-family: Satoshi Regular; }
.faq-item.active .faq-answer { display: block; }
.faq-icon { transition: transform 0.3s; }
.faq-item.active .faq-icon { transform: rotate(180deg); }
/* Trust cards */
.trust-card { text-align: center; padding: 30px 20px; background: #fff; border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); margin-bottom: 30px; }
.trust-card .icon { font-size: 48px; margin-bottom: 15px; }
.trust-card h4 { font-family: Satoshi Black; font-size: 20px; color: #1f2933; margin-bottom: 10px; }
.trust-card p { font-family: Satoshi Regular; font-size: 16px; color: #666; }
/* How it works */
.step-box { text-align: center; padding: 20px; }
.step-number { width: 60px; height: 60px; background: #2ec4c6; color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-family: Satoshi Black; font-size: 24px; margin: 0 auto 20px; }
.step-box h4 { font-family: Satoshi Black; font-size: 20px; color: #1f2933; margin-bottom: 10px; }
.step-box p { font-family: Satoshi Regular; font-size: 16px; color: #666; }
/* CTA Section */
.cta-section { background: linear-gradient(to right, #2ec4c6, #ff6f61); padding: 60px 0; text-align: center; }
.cta-section h2 { color: #fff; font-family: Satoshi Black; font-size: 36px; margin-bottom: 15px; }
.cta-section p { color: rgba(255,255,255,0.9); font-family: Satoshi Regular; font-size: 18px; margin-bottom: 30px; }
.cta-btn { display: inline-block; padding: 15px 40px; background: #fff; color: #2ec4c6; font-family: Satoshi Black; font-size: 18px; border-radius: 5px; margin: 0 10px; text-decoration: none; transition: all 0.3s; }
.cta-btn:hover { background: #1f2933; color: #fff; }
.cta-btn.secondary { background: transparent; border: 2px solid #fff; color: #fff; }
.cta-btn.secondary:hover { background: #fff; color: #2ec4c6; }
/* Alert Styles */
.alert { padding: 15px 20px; border-radius: 5px; margin-top: 15px; font-family: Satoshi Regular; font-size: 16px; }
.alert-success { background: #d4edda; border: 1px solid #c3e6cb; color: #155724; }
.alert-danger { background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; }
    </style>

    <!-- Schema.org LocalBusiness -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "LocalBusiness",
        "name": "CoralClean",
        "legalName": "PUHASTUS KORAL OÜ",
        "url": "https://coralclean.ee",
        "logo": "https://coralclean.ee/img/ChatGPT-Image-Feb-1-2026-02_13_45-PM.png",
        "image": "https://coralclean.ee/img/Hero.png",
        "description": "Профессиональная уборка квартир, домов и офисов в Таллине и Харьюмаа. Чисто, спокойно, без стресса.",
        "telephone": "+37258301348",
        "priceRange": "€€",
        "address": {
            "@@type": "PostalAddress",
            "addressLocality": "Tallinn",
            "addressRegion": "Harjumaa",
            "addressCountry": "EE"
        },
        "geo": {
            "@@type": "GeoCoordinates",
            "latitude": "59.4370",
            "longitude": "24.7536"
        },
        "areaServed": [
            { "@@type": "City", "name": "Tallinn" },
            { "@@type": "AdministrativeArea", "name": "Harju County" }
        ],
        "openingHoursSpecification": {
            "@@type": "OpeningHoursSpecification",
            "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
            "opens": "08:00",
            "closes": "20:00"
        },
        "sameAs": []
    }
    </script>

    <!-- Schema.org Service -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "Service",
        "serviceType": "Cleaning Service",
        "provider": {
            "@@type": "LocalBusiness",
            "name": "CoralClean"
        },
        "areaServed": ["Tallinn", "Harjumaa"],
        "hasOfferCatalog": {
            "@@type": "OfferCatalog",
            "name": "Услуги уборки",
            "itemListElement": [
                { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "Quick Clean — Обычная уборка" } },
                { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "Deep Clean — Генеральная уборка" } },
                { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "Move-In/Move-Out — Уборка при переезде" } },
                { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "Office Care — Уборка офисов" } },
                { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "Urgent Clean — Срочная уборка" } }
            ]
        }
    }
    </script>

    <!-- Schema.org FAQPage -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "FAQPage",
        "mainEntity": [
            {
                "@@type": "Question",
                "name": "Нужно ли быть дома во время уборки?",
                "acceptedAnswer": {
                    "@@type": "Answer",
                    "text": "Нет, это не обязательно. Многие клиенты передают ключи или открывают доступ заранее. Всё по договорённости."
                }
            },
            {
                "@@type": "Question",
                "name": "Сколько длится уборка?",
                "acceptedAnswer": {
                    "@@type": "Answer",
                    "text": "В среднем от 2 до 5 часов — в зависимости от типа уборки и площади помещения."
                }
            },
            {
                "@@type": "Question",
                "name": "Какие средства вы используете?",
                "acceptedAnswer": {
                    "@@type": "Answer",
                    "text": "Мы используем профессиональные и безопасные моющие средства, подходящие для жилых помещений."
                }
            },
            {
                "@@type": "Question",
                "name": "Что входит в обычную уборку?",
                "acceptedAnswer": {
                    "@@type": "Answer",
                    "text": "Полы, пыль, кухня, санузел, зеркала, вынос мусора. Полный список указан на странице услуги."
                }
            },
            {
                "@@type": "Question",
                "name": "Можно ли заказать уборку срочно?",
                "acceptedAnswer": {
                    "@@type": "Answer",
                    "text": "Да, мы предлагаем услугу срочной уборки — сегодня или на следующий день, при наличии свободных слотов."
                }
            },
            {
                "@@type": "Question",
                "name": "Как формируется цена?",
                "acceptedAnswer": {
                    "@@type": "Answer",
                    "text": "Цена зависит от площади, типа уборки и дополнительных услуг. Мы всегда подтверждаем стоимость заранее."
                }
            },
            {
                "@@type": "Question",
                "name": "Работаете ли вы с офисами?",
                "acceptedAnswer": {
                    "@@type": "Answer",
                    "text": "Да, мы предоставляем регулярную уборку офисов и коммерческих помещений по договору."
                }
            }
        ]
    }
    </script>
</head>
<body>
    <!-- Preloader -->
    <div class="preloader">
        <figure><img src="{{ asset('img/ChatGPT-Image-Feb-2-2026-12_00_36-AM.png') }}" alt="CoralClean"></figure>
    </div>
    <div class="page-transition"></div>

    <!-- Side Widget -->
    <aside class="side-widget">
        <div class="inner">
            <div class="logo"><a href="/"><img src="{{ asset('img/ChatGPT-Image-Feb-1-2026-02_13_45-PM.png') }}" alt="CoralClean"></a></div>
            <div class="hide-mobile">
                <div class="or"><h2 class="h2-baslik-hizmetler-2">Контакты</h2></div>
                <div class="bosluksv"></div>
                <div class="iconsv"><i class="flaticon-call"></i></div>
                <address class="address">
                    +372 5830 1348
                    <div class="bosluksv"></div>
                    <div class="iconsv"><i class="flaticon-email"></i></div>
                    info@coralclean.ee
                    <div class="bosluksv"></div>
                    <div class="iconsv"><i class="flaticon-location"></i></div>
                    Таллин, Эстония
                    <div class="bosluksv"></div>
                    <div class="or">
                        <a href="#"><i class="icon-social-facebook iconsocia"></i></a>
                        <a href="#"><i class="icon-social-instagram iconsociai"></i></a>
                        <a href="#"><i class="icon-social-twitter iconsocia"></i></a>
                    </div>
                    <div class="bosluksv"></div>
                    <div class="or" style="display: flex; gap: 10px; justify-content: center;">
                        <a href="{{ url('/ru') }}" style="color: {{ ($locale ?? 'ru') == 'ru' ? '#2ec4c6' : '#666' }}; font-weight: {{ ($locale ?? 'ru') == 'ru' ? 'bold' : 'normal' }}; text-decoration: none;">RU</a>
                        <span style="color: #ccc;">|</span>
                        <a href="{{ url('/en') }}" style="color: {{ ($locale ?? 'ru') == 'en' ? '#2ec4c6' : '#666' }}; font-weight: {{ ($locale ?? 'ru') == 'en' ? 'bold' : 'normal' }}; text-decoration: none;">EN</a>
                        <span style="color: #ccc;">|</span>
                        <a href="{{ url('/et') }}" style="color: {{ ($locale ?? 'ru') == 'et' ? '#2ec4c6' : '#666' }}; font-weight: {{ ($locale ?? 'ru') == 'et' ? 'bold' : 'normal' }}; text-decoration: none;">ET</a>
                    </div>
                </address>
            </div>
            <div class="show-mobile">
                <div class="site-menu">
                    <ul id="mobile-menu" style="list-style: none; padding: 0; margin: 20px 0;">
                        <li style="margin: 15px 0;"><a href="/" style="color: #333; text-decoration: none; font-size: 18px; display: block;">{{ $locale == 'en' ? 'Home' : ($locale == 'et' ? 'Avaleht' : 'Главная') }}</a></li>
                        <li style="margin: 15px 0;"><a href="#about" style="color: #333; text-decoration: none; font-size: 18px; display: block;">{{ $locale == 'en' ? 'About' : ($locale == 'et' ? 'Meist' : 'О нас') }}</a></li>
                        <li style="margin: 15px 0;"><a href="#packages" style="color: #333; text-decoration: none; font-size: 18px; display: block;">{{ $locale == 'en' ? 'Packages' : ($locale == 'et' ? 'Paketid' : 'Пакеты') }}</a></li>
                        <li style="margin: 15px 0;"><a href="#faq" style="color: #333; text-decoration: none; font-size: 18px; display: block;">{{ __('home.nav_faq') }}</a></li>
                        <li style="margin: 15px 0;"><a href="#contact" style="color: #333; text-decoration: none; font-size: 18px; display: block;">{{ __('home.nav_contacts') }}</a></li>
                    </ul>
                    <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd;">
                        <p style="text-align: center; color: #666; font-size: 14px; margin-bottom: 10px;">{{ $locale == 'en' ? 'Language' : ($locale == 'et' ? 'Keel' : 'Язык') }}</p>
                        <div style="display: flex; gap: 15px; justify-content: center; align-items: center;">
                            <a href="{{ url('/ru') }}" style="color: {{ ($locale ?? 'ru') == 'ru' ? '#25aae2' : '#666' }}; font-weight: {{ ($locale ?? 'ru') == 'ru' ? 'bold' : 'normal' }}; text-decoration: none; font-size: 16px;">🇷🇺 RU</a>
                            <span style="color: #ccc;">|</span>
                            <a href="{{ url('/en') }}" style="color: {{ ($locale ?? 'ru') == 'en' ? '#25aae2' : '#666' }}; font-weight: {{ ($locale ?? 'ru') == 'en' ? 'bold' : 'normal' }}; text-decoration: none; font-size: 16px;">🇬🇧 EN</a>
                            <span style="color: #ccc;">|</span>
                            <a href="{{ url('/et') }}" style="color: {{ ($locale ?? 'ru') == 'et' ? '#25aae2' : '#666' }}; font-weight: {{ ($locale ?? 'ru') == 'et' ? 'bold' : 'normal' }}; text-decoration: none; font-size: 16px;">🇪🇪 ET</a>
                        </div>
                    </div>
                </div>
            </div>
            <small>© 2026 CoralClean</small>
        </div>
    </aside>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container">
            <div class="logo"><a href="/"><img src="{{ asset('img/ChatGPT-Image-Feb-1-2026-02_13_45-PM.png') }}" alt="CoralClean"></a></div>
            <div class="site-menu">
                <div class="menueffect">
                    <div id="bs-example-navbar-collapse-2" class="collapse navbar-collapse">
                        <ul id="menu-main-menu" class="nav navbar-nav">
                            <li class="menu-item nav-item active"><a href="/" class="nav-link"><span>{{ $locale == 'en' ? 'Home' : ($locale == 'et' ? 'Avaleht' : 'Главная') }}</span></a></li>
                            <li class="menu-item nav-item"><a href="#about" class="nav-link"><span>{{ $locale == 'en' ? 'About' : ($locale == 'et' ? 'Meist' : 'О нас') }}</span></a></li>
                            <li class="menu-item menu-item-has-children dropdown nav-item">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link"><span>{{ __('home.nav_services') }}</span></a>
                                <ul class="dropdown-menu">
                                    <li class="menu-item nav-item"><a href="#quick-clean" class="dropdown-item"><span>Quick Clean</span></a></li>
                                    <li class="menu-item nav-item"><a href="#deep-clean" class="dropdown-item"><span>Deep Clean</span></a></li>
                                    <li class="menu-item nav-item"><a href="#move-in-out" class="dropdown-item"><span>Move-In/Out</span></a></li>
                                    <li class="menu-item nav-item"><a href="#office-care" class="dropdown-item"><span>Office Care</span></a></li>
                                    <li class="menu-item nav-item"><a href="#urgent-clean" class="dropdown-item"><span>Urgent Clean</span></a></li>
                                </ul>
                            </li>
                            <li class="menu-item nav-item"><a href="#packages" class="nav-link"><span>{{ $locale == 'en' ? 'Packages' : ($locale == 'et' ? 'Paketid' : 'Пакеты') }}</span></a></li>
                            <li class="menu-item nav-item"><a href="#faq" class="nav-link"><span>{{ __('home.nav_faq') }}</span></a></li>
                            <li class="menu-item nav-item"><a href="#contact" class="nav-link"><span>{{ __('home.nav_contacts') }}</span></a></li>
                            <li class="menu-item menu-item-has-children dropdown nav-item">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link" style="text-transform: uppercase;"><span>{{ strtoupper($locale ?? 'ru') }}</span></a>
                                <ul class="dropdown-menu">
                                    <li class="menu-item nav-item"><a href="{{ url('/ru') }}" class="dropdown-item"><span>Русский</span></a></li>
                                    <li class="menu-item nav-item"><a href="{{ url('/en') }}" class="dropdown-item"><span>English</span></a></li>
                                    <li class="menu-item nav-item"><a href="{{ url('/et') }}" class="dropdown-item"><span>Eesti</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="hamburger-menu"><span></span><span></span><span></span></div>
            <div class="navbar-button">
                <a href="tel:+37258301348" class="telh"><i class="flaticon-call iconp"></i>&nbsp;&nbsp;&nbsp;+372 5830 1348</a>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <header class="slider">
        <div class="main-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="slide-image wow fadeInUp" data-wow-delay="0.3s" data-background="{{ asset('img/Hero.png') }}"></div>
                    <div class="container">
                        <h1>{{ __('home.hero_title') }}</h1>
                        <p>{{ __('home.hero_subtitle') }}</p>
                        <div class="bosluk1"></div>
                        <p style="font-size: 16px; opacity: 0.9;">{{ $locale == 'en' ? 'Working: Tallinn • Harjumaa' : ($locale == 'et' ? 'Töötame: Tallinn • Harjumaa' : 'Работаем: Tallinn • Harjumaa') }}</p>
                        <div class="bosluk1"></div>
                        <a href="#contact">{{ __('home.btn_order') }}</a>
                        <a href="https://wa.me/37258301348" style="background: transparent; border: 2px solid #2ec4c6; margin-left: 15px;">{{ __('home.btn_whatsapp') }} →</a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide-image wow fadeInUp" data-wow-delay="0.3s" data-background="{{ asset('img/Deep-Clean.png') }}"></div>
                    <div class="container">
                        <h1>Генеральная уборка<br>для вашего здоровья</h1>
                        <p>Глубокая очистка каждого уголка вашего дома</p>
                        <div class="bosluk1"></div>
                        <a href="#packages">Узнать больше →</a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide-image wow fadeInUp" data-wow-delay="0.3s" data-background="{{ asset('img/Move-In-Out.png') }}"></div>
                    <div class="container">
                        <h1>Уборка при переезде</h1>
                        <p>Идеально для сдачи квартиры и возврата депозита</p>
                        <div class="bosluk1"></div>
                        <a href="#packages">Подготовить квартиру →</a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide-image wow fadeInUp" data-wow-delay="0.3s" data-background="{{ asset('img/Office-Care.png') }}"></div>
                    <div class="container">
                        <h1>Уборка офисов</h1>
                        <p>Чистое рабочее пространство для вашего бизнеса</p>
                        <div class="bosluk1"></div>
                        <a href="#packages">Получить предложение →</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="button-prev">❮</div>
        <div class="button-next">❯</div>
    </header>

    <!-- VALUE PROPOSITIONS -->
    <div class="bosluk3h3"></div>
    <section class="information">
        <div class="bosluk3"></div>
        <div class="tabloozellik">
            <div class="tablo--1-ve-4">
                <div class="paketler wow flipInY" data-wow-delay="0.6s">
                    <div class="paketler__on paketler__on--onyazi">
                        <div class="paketler__icerik">
                            <div class="icon"><i class="flaticon-stopwatch"></i></div>
                            <h3 class="baslik-3 h-yazi-margin-kucuk">Пунктуальность</h3>
                        </div>
                    </div>
                    <div class="paketler__on paketler__on--arkayazi paketler__on--arkayazi-1">
                        <div class="paketler__pr">
                            <div class="paketler__pr-kutu">
                                <h3 class="baslik-sol h-yazi-margin-kucuk">Пунктуальность</h3>
                                <p class="services-kutu2--yazi wow fade">Приезжаем вовремя, работаем чётко по графику. Ваше время ценно.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tablo--1-ve-4">
                <div class="paketler wow flipInY" data-wow-delay="0.7s">
                    <div class="paketler__on paketler__on--onyazi">
                        <div class="paketler__icerik">
                            <div class="icon"><i class="flaticon-badge"></i></div>
                            <h3 class="baslik-3 h-yazi-margin-kucuk">Прозрачные цены</h3>
                        </div>
                    </div>
                    <div class="paketler__on paketler__on--arkayazi paketler__on--arkayazi-1">
                        <div class="paketler__pr">
                            <div class="paketler__pr-kutu">
                                <h3 class="baslik-sol h-yazi-margin-kucuk">Прозрачные цены</h3>
                                <p class="services-kutu2--yazi wow fade">Стоимость согласовывается заранее — без скрытых доплат.</p>
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
                            <h3 class="baslik-3 h-yazi-margin-kucuk">Проверенная команда</h3>
                        </div>
                    </div>
                    <div class="paketler__on paketler__on--arkayazi paketler__on--arkayazi-1">
                        <div class="paketler__pr">
                            <div class="paketler__pr-kutu">
                                <h3 class="baslik-sol h-yazi-margin-kucuk">Проверенная команда</h3>
                                <p class="services-kutu2--yazi wow fade">Аккуратные и обученные клинеры с опытом работы.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tablo--1-ve-4">
                <div class="paketler wow flipInY" data-wow-delay="0.9s">
                    <div class="paketler__on paketler__on--onyazi">
                        <div class="paketler__icerik">
                            <div class="icon"><i class="flaticon-shield"></i></div>
                            <h3 class="baslik-3 h-yazi-margin-kucuk">Безопасные средства</h3>
                        </div>
                    </div>
                    <div class="paketler__on paketler__on--arkayazi paketler__on--arkayazi-1">
                        <div class="paketler__pr">
                            <div class="paketler__pr-kutu">
                                <h3 class="baslik-sol h-yazi-margin-kucuk">Безопасные средства</h3>
                                <p class="services-kutu2--yazi wow fade">Профессиональные и безопасные средства для вашего дома.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PACKAGES SECTION -->
    <div class="bosluk8"></div>
    <section class="special-paket-alani" id="packages">
        <div class="h-yazi-ortalama h-yazi-margin-orta-3">
            <div class="icon wow fadeInUp" data-wow-delay="0.3s"><i class="flaticon-clean-1"></i></div>
            <h2 class="h2-baslik-hizmetler-2 wow fadeInUp" data-wow-delay="0.4s">Выберите удобный пакет уборки</h2>
        </div>
        <p class="h2-baslik-hizmetler-2__paragraf wow fadeInUp" data-wow-delay="0.6s">Точная стоимость зависит от площади и объёма работ. Цена всегда согласовывается заранее.</p>
        <div class="bosluk3"></div>
        
        <div class="container">
            <div class="row">
                <!-- Quick Clean -->
                <div class="col-lg-4" id="quick-clean">
                    <div class="paketler3 wow flipInY" data-wow-delay="0.6s" data-tilt>
                        <div class="paketler3__on paketler3__on--onyazi">
                            <div class="paketler3__gorsel paketler3__gorsel--1">
                                <div class="iconw"><i class="flaticon-vacuum"></i></div>
                                <h3 class="baslik-sol h-yazi-margin-kucuk">Quick Clean</h3>
                                <p class="services-kutu2--yazi wow fade">Для занятых людей и регулярной чистоты</p>
                            </div>
                            <div class="paketler3__icerik">
                                <ul>
                                    <li>★ Квартира до 60 м²</li>
                                    <li>★ 2–3 часа работы</li>
                                    <li>★ Фиксированная цена</li>
                                    <li>★ Без лишних вопросов</li>
                                </ul>
                            </div>
                        </div>
                        <div class="paketler3__on paketler3__on--arkayazi paketler3__on--arkayazi-1">
                            <div class="paketler3__pr">
                                <div class="paketler3__pr-kutu">
                                    <p class="paketler3__pr-yazi">Quick Clean</p>
                                    <p class="paketler3__pr-degeri">от 45 €</p>
                                </div>
                                <a href="#contact" class="custom-button">Заказать быстро →</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Deep Clean -->
                <div class="col-lg-4" id="deep-clean">
                    <div class="paketler3 wow flipInY" data-wow-delay="0.7s" data-tilt>
                        <div class="paketler3__on paketler3__on--onyazi">
                            <div class="paketler3__gorsel paketler3__gorsel--1">
                                <div class="iconw"><i class="flaticon-mop"></i></div>
                                <h3 class="baslik-sol h-yazi-margin-kucuk">Deep Clean</h3>
                                <p class="services-kutu2--yazi wow fade">Когда нужна настоящая чистота</p>
                            </div>
                            <div class="paketler3__icerik">
                                <ul>
                                    <li>★ Кухня и санузел</li>
                                    <li>★ Труднодоступные зоны</li>
                                    <li>★ Детальный чек-лист</li>
                                    <li>★ Глубокая очистка</li>
                                </ul>
                            </div>
                        </div>
                        <div class="paketler3__on paketler3__on--arkayazi paketler3__on--arkayazi-1">
                            <div class="paketler3__pr">
                                <div class="paketler3__pr-kutu">
                                    <p class="paketler3__pr-yazi">Deep Clean</p>
                                    <p class="paketler3__pr-degeri">от 2 € / м²</p>
                                </div>
                                <a href="#contact" class="custom-button">Хочу идеально →</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Move-In / Move-Out -->
                <div class="col-lg-4" id="move-in-out">
                    <div class="paketler3 wow flipInY" data-wow-delay="0.8s" data-tilt>
                        <div class="paketler3__on paketler3__on--onyazi">
                            <div class="paketler3__gorsel paketler3__gorsel--1">
                                <div class="iconw"><i class="flaticon-clean-1"></i></div>
                                <h3 class="baslik-sol h-yazi-margin-kucuk">Move-In / Move-Out</h3>
                                <p class="services-kutu2--yazi wow fade">Для аренды и возврата депозита</p>
                            </div>
                            <div class="paketler3__icerik">
                                <ul>
                                    <li>★ Перед заездом / сдачей</li>
                                    <li>★ Фото-результат</li>
                                    <li>★ Максимальная чистота</li>
                                    <li>★ Возврат депозита</li>
                                </ul>
                            </div>
                        </div>
                        <div class="paketler3__on paketler3__on--arkayazi paketler3__on--arkayazi-1">
                            <div class="paketler3__pr">
                                <div class="paketler3__pr-kutu">
                                    <p class="paketler3__pr-yazi">Move-In / Out</p>
                                    <p class="paketler3__pr-degeri">от 60 €</p>
                                </div>
                                <a href="#contact" class="custom-button">Подготовить квартиру →</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-4">
                <!-- Office Care -->
                <div class="col-lg-6" id="office-care">
                    <div class="paketler3 wow flipInY" data-wow-delay="0.9s" data-tilt>
                        <div class="paketler3__on paketler3__on--onyazi">
                            <div class="paketler3__gorsel paketler3__gorsel--1">
                                <div class="iconw"><i class="flaticon-clean"></i></div>
                                <h3 class="baslik-sol h-yazi-margin-kucuk">Office Care</h3>
                                <p class="services-kutu2--yazi wow fade">Для малого и среднего бизнеса</p>
                            </div>
                            <div class="paketler3__icerik">
                                <ul>
                                    <li>★ Регулярная уборка</li>
                                    <li>★ Работа по договору</li>
                                    <li>★ Один контакт</li>
                                    <li>★ Закреплённый клинер</li>
                                </ul>
                            </div>
                        </div>
                        <div class="paketler3__on paketler3__on--arkayazi paketler3__on--arkayazi-1">
                            <div class="paketler3__pr">
                                <div class="paketler3__pr-kutu">
                                    <p class="paketler3__pr-yazi">Office Care</p>
                                    <p class="paketler3__pr-degeri">от 0.07 € / м²</p>
                                </div>
                                <a href="#contact" class="custom-button">Получить предложение →</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Urgent Clean -->
                <div class="col-lg-6" id="urgent-clean">
                    <div class="paketler3 wow flipInY" data-wow-delay="1s" data-tilt>
                        <div class="paketler3__on paketler3__on--onyazi">
                            <div class="paketler3__gorsel paketler3__gorsel--1">
                                <div class="iconw"><i class="flaticon-stopwatch"></i></div>
                                <h3 class="baslik-sol h-yazi-margin-kucuk">Urgent Clean</h3>
                                <p class="services-kutu2--yazi wow fade">Когда нужно срочно</p>
                            </div>
                            <div class="paketler3__icerik">
                                <ul>
                                    <li>★ Сегодня / завтра</li>
                                    <li>★ Без ожиданий</li>
                                    <li>★ Быстрый выезд</li>
                                    <li>★ Оперативное решение</li>
                                </ul>
                            </div>
                        </div>
                        <div class="paketler3__on paketler3__on--arkayazi paketler3__on--arkayazi-1">
                            <div class="paketler3__pr">
                                <div class="paketler3__pr-kutu">
                                    <p class="paketler3__pr-yazi">Urgent Clean</p>
                                    <p class="paketler3__pr-degeri">уточняйте</p>
                                </div>
                                <a href="tel:+37258301348" class="custom-button">Нужно срочно →</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="bosluk3"></div>
        <div class="ortabutton">
            <a href="#contact" class="custom-button wow fadeInUp" data-wow-delay="1.1s">Посмотреть все услуги →</a>
        </div>
    </section>

    <!-- ABOUT SECTION -->
    <div class="bosluk4"></div>
    <section class="hakkimizda-bolumu-anasayfa" id="about">
        <div class="h-yazi-ozel h-yazi-margin-ozel"></div>
        <div class="tablo">
            <div class="tablo--1-ve-2 wow fade">
                <div class="galeri1 wow" data-wow-delay="0.5s"><img class="imagerotate" src="" alt=""></div>
                <div class="galeri wow rollIn" data-wow-delay="100ms" data-wow-duration="1500ms" data-tilt>
                    <img src="{{ asset('img/cleaningo-about.png') }}" alt="О CoralClean" class="galeri__gorsel galeri__gorsel--3 zimage">
                </div>
            </div>
            <div class="tablo--1-ve-3 wow fadeInUp" data-wow-delay="0.5s">
                <h2 class="h2-baslik-anasayfa-ozel wow fadeInUp" data-wow-delay="0.6s">Мы занимаемся профессиональной уборкой в Таллине и Харьюмаа</h2>
                <div class="bosluk333"></div>
                <p class="paragraf wow fade animated">CoralClean — это команда профессиональных клинеров, которые ежедневно выполняют уборку квартир, домов и офисов в Таллине и Харьюмаа. Мы работаем аккуратно, спокойно и по понятному чек-листу — без спешки и сюрпризов для клиента.</p>
                <div class="bosluk333"></div>
                <img class="divider" width="120" height="15" title="divider" alt="divider" src="{{ asset('img/divider.jpg') }}">
                <div class="bosluk333"></div>
                <div class="row">
                    <div class="col-sm-2 wow fadeInRight" data-wow-delay="0.7s"><div class="iconleft"><i class="flaticon-checked"></i></div></div>
                    <div class="col-sm-10 wow fadeInRight" data-wow-delay="0.8s">
                        <h3 class="baslik-3s h-yazi-margin-kucuk1">Работаем по чек-листу</h3><br>
                        <p class="paragraf-info">Каждая уборка проходит по структурированному плану.</p><br>
                    </div>
                </div>
                <div class="bosluk13qs"></div>
                <div class="row">
                    <div class="col-sm-2 wow fadeInRight" data-wow-delay="0.9s"><div class="iconleft"><i class="flaticon-time"></i></div></div>
                    <div class="col-sm-10 wow fadeInRight" data-wow-delay="1s">
                        <h3 class="baslik-3s h-yazi-margin-kucuk1">Пунктуальны</h3><br>
                        <p class="paragraf-info">Приезжаем вовремя, уважаем ваше время.</p><br>
                    </div>
                </div>
                <div class="bosluk13qs"></div>
                <div class="row">
                    <div class="col-sm-2 wow fadeInRight" data-wow-delay="1.1s"><div class="iconleft"><i class="flaticon-tools"></i></div></div>
                    <div class="col-sm-10 wow fadeInRight" data-wow-delay="1.2s">
                        <h3 class="baslik-3s h-yazi-margin-kucuk1">Профессиональное оборудование</h3><br>
                        <p class="paragraf-info">Используем только проверенные средства и инструменты.</p><br>
                    </div>
                </div>
                <div class="bosluk1"></div>
                <a href="#contact" class="custom-button wow fadeInUp" data-wow-delay="1.3s">Связаться с нами →</a>
                <div class="bosluk3rh"></div>
            </div>
        </div>
    </section>

    <!-- HOW IT WORKS SECTION -->
    <div class="bosluk4"></div>
    <section class="ozellika" data-background="#f6f7f8" style="background: #f6f7f8;" id="how-it-works">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="wow fadeInUp" data-wow-delay="0.3s">
                        <div class="boslukalt"></div>
                        <div class="icon"><i class="flaticon-process"></i></div>
                        <h2 class="h2-baslik-hizmetler-2 wow fadeInRight" data-wow-delay="0.4s">Как проходит уборка с CoralClean</h2>
                        <p class="h2-baslik-hizmetler-2__paragraf wow fadeInUp" data-wow-delay="0.5s">Просто, спокойно и без лишних вопросов — мы берём всё на себя</p>
                    </div>
                </div>
            </div>
            <div class="bosluk3"></div>
            <div class="row">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="step-box">
                        <div class="step-number">1</div>
                        <h4>Вы оставляете заявку</h4>
                        <p>Позвоните нам или напишите в WhatsApp. Мы уточним тип уборки, площадь и удобное время.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="step-box">
                        <div class="step-number">2</div>
                        <h4>Мы подтверждаем детали</h4>
                        <p>Вы получаете чёткое подтверждение объёма работ, времени и стоимости — без сюрпризов.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="step-box">
                        <div class="step-number">3</div>
                        <h4>Профессиональная уборка</h4>
                        <p>Наши клинеры приезжают вовремя со всем необходимым оборудованием и средствами.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="step-box">
                        <div class="step-number">4</div>
                        <h4>Готово — чисто и спокойно</h4>
                        <p>Вы принимаете результат и наслаждаетесь чистым, свежим пространством.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="boslukalt"></div>
    </section>

    <!-- TRUST STACK SECTION -->
    <div class="bosluk4"></div>
    <section class="yorumlar-alani-sayfa" id="trust">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center wow animated fadeIn" data-wow-delay="0.5s">
                    <div class="icon wow fadeInUp" data-wow-delay="0.5s"><i class="flaticon-shield"></i></div>
                    <h2 class="h2-baslik-hizmetler-2 wow fadeInUp" data-wow-delay="0.5s">Почему CoralClean выбирают снова и снова</h2>
                    <p class="h2-baslik-hizmetler-2__paragraf wow fadeInUp" data-wow-delay="0.6s">Мы работаем спокойно, честно и профессионально — как ожидают в Эстонии</p>
                    <div class="bosluk3"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="trust-card">
                        <div class="icon"><i class="flaticon-location"></i></div>
                        <h4>Локальный сервис в Таллине</h4>
                        <p>Работаем в Таллине и Харьюмаа, знаем местные стандарты и ожидания клиентов.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="trust-card">
                        <div class="icon"><i class="flaticon-team-1"></i></div>
                        <h4>Проверенная команда</h4>
                        <p>Аккуратные и обученные клинеры с опытом работы в жилых и офисных помещениях.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="trust-card">
                        <div class="icon"><i class="flaticon-badge"></i></div>
                        <h4>Честная стоимость</h4>
                        <p>Цена согласовывается заранее — без скрытых доплат и неприятных сюрпризов.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="trust-card">
                        <div class="icon"><i class="flaticon-shield"></i></div>
                        <h4>Безопасно для дома</h4>
                        <p>Используем профессиональные и безопасные средства для повседневной уборки.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="trust-card">
                        <div class="icon"><i class="flaticon-calendar"></i></div>
                        <h4>Удобный формат</h4>
                        <p>Разовая уборка, регулярное обслуживание или срочный выезд — под ваш график.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="1s">
                    <div class="trust-card">
                        <div class="icon"><i class="flaticon-review"></i></div>
                        <h4>Реальные клиенты</h4>
                        <p>Мы собираем отзывы и работаем над качеством после каждого заказа.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ SECTION -->
    <div class="bosluk4"></div>
    <section class="ozellika" data-background="#fff" style="background: #fff;" id="faq">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="wow fadeInUp" data-wow-delay="0.3s">
                        <div class="icon"><i class="flaticon-question"></i></div>
                        <h2 class="h2-baslik-hizmetler-2 wow fadeInRight" data-wow-delay="0.4s">Часто задаваемые вопросы</h2>
                    </div>
                </div>
            </div>
            <div class="bosluk3"></div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="faq-item wow fadeInUp" data-wow-delay="0.5s">
                        <div class="faq-question">
                            <span>Нужно ли быть дома во время уборки?</span>
                            <span class="faq-icon">▼</span>
                        </div>
                        <div class="faq-answer">
                            <p>Нет, это не обязательно. Многие клиенты передают ключи или открывают доступ заранее. Всё по договорённости.</p>
                        </div>
                    </div>
                    <div class="faq-item wow fadeInUp" data-wow-delay="0.6s">
                        <div class="faq-question">
                            <span>Сколько длится уборка?</span>
                            <span class="faq-icon">▼</span>
                        </div>
                        <div class="faq-answer">
                            <p>В среднем от 2 до 5 часов — в зависимости от типа уборки и площади помещения.</p>
                        </div>
                    </div>
                    <div class="faq-item wow fadeInUp" data-wow-delay="0.7s">
                        <div class="faq-question">
                            <span>Какие средства вы используете?</span>
                            <span class="faq-icon">▼</span>
                        </div>
                        <div class="faq-answer">
                            <p>Мы используем профессиональные и безопасные моющие средства, подходящие для жилых помещений.</p>
                        </div>
                    </div>
                    <div class="faq-item wow fadeInUp" data-wow-delay="0.8s">
                        <div class="faq-question">
                            <span>Что входит в обычную уборку?</span>
                            <span class="faq-icon">▼</span>
                        </div>
                        <div class="faq-answer">
                            <p>Полы, пыль, кухня, санузел, зеркала, вынос мусора. Полный список указан на странице услуги.</p>
                        </div>
                    </div>
                    <div class="faq-item wow fadeInUp" data-wow-delay="0.9s">
                        <div class="faq-question">
                            <span>Можно ли заказать уборку срочно?</span>
                            <span class="faq-icon">▼</span>
                        </div>
                        <div class="faq-answer">
                            <p>Да, мы предлагаем услугу срочной уборки — сегодня или на следующий день, при наличии свободных слотов.</p>
                        </div>
                    </div>
                    <div class="faq-item wow fadeInUp" data-wow-delay="1s">
                        <div class="faq-question">
                            <span>Как формируется цена?</span>
                            <span class="faq-icon">▼</span>
                        </div>
                        <div class="faq-answer">
                            <p>Цена зависит от площади, типа уборки и дополнительных услуг. Мы всегда подтверждаем стоимость заранее.</p>
                        </div>
                    </div>
                    <div class="faq-item wow fadeInUp" data-wow-delay="1.1s">
                        <div class="faq-question">
                            <span>Работаете ли вы с офисами?</span>
                            <span class="faq-icon">▼</span>
                        </div>
                        <div class="faq-answer">
                            <p>Да, мы предоставляем регулярную уборку офисов и коммерческих помещений по договору.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="boslukalt"></div>
    </section>

    <!-- CTA SECTION -->
    <section class="cta-section">
        <div class="container">
            <h2 class="wow fadeInUp" data-wow-delay="0.3s">Готовы к чистоте без стресса?</h2>
            <p class="wow fadeInUp" data-wow-delay="0.4s">Оставьте заявку — мы всё организуем за вас</p>
            <div class="wow fadeInUp" data-wow-delay="0.5s">
                <a href="tel:+37258301348" class="cta-btn">Позвонить</a>
                <a href="https://wa.me/37258301348" class="cta-btn secondary">WhatsApp</a>
            </div>
        </div>
    </section>

    <!-- STATISTICS -->
    <section class="content-section" data-background="#fafafa">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 wow fadeInLeft" data-wow-delay="0.6s">
                    <div class="icon"><i class="flaticon-handshake"></i></div>
                    <div class="counter-box wow fade"><span class="odometer" data-count="2500" data-status="yes">0</span><h6>Уборок выполнено</h6></div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInLeft" data-wow-delay="0.7s">
                    <div class="icon"><i class="flaticon-group"></i></div>
                    <div class="counter-box wow fade"><span class="odometer" data-count="450" data-status="yes">0</span><h6>Довольных клиентов</h6></div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInRight" data-wow-delay="0.8s">
                    <div class="icon"><i class="flaticon-insurance"></i></div>
                    <div class="counter-box wow fade"><span class="odometer" data-count="500" data-status="yes">0</span><h6>Завершённых проектов</h6></div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInRight" data-wow-delay="0.9s">
                    <div class="icon"><i class="flaticon-review"></i></div>
                    <div class="counter-box wow fade"><span class="odometer" data-count="15" data-status="yes">0</span><h6>Лет опыта</h6></div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="logo wow animated fadeInUp" data-wow-delay="0.5s">
                        <img src="{{ asset('img/logo-footer-cleaningo.png') }}" alt="CoralClean">
                    </div>
                    <div class="footer-info wow animated fadeInUp" data-wow-delay="0.5s">
                        <p>CoralClean — клининговая компания, предоставляющая услуги уборки квартир, домов и офисов в Таллине и Харьюмаа.</p>
                        <br>
                        <p><i class="flaticon-pin iconpfooter1"></i>&nbsp;&nbsp;Таллин, Эстония</p>
                        <p class="fic"><i class="flaticon-call iconpfooter2"></i>&nbsp;&nbsp;&nbsp;<a href="tel:+37258301348">+372 5830 1348</a></p><br>
                        <p><i class="flaticon-email iconpfooter3"></i>&nbsp;&nbsp;&nbsp;<a href="mailto:info@coralclean.ee">info@coralclean.ee</a></p><br>
                        <p><i class="flaticon-time iconpfooter3"></i>&nbsp;&nbsp;&nbsp;08:00–20:00, ежедневно</p>
                    </div>
                    <ul class="footer-social wow animated fadeInUp" data-wow-delay="0.5s">
                        <li><a href="#"><i class="icon-social-facebook iconsociaf"></i></a></li>
                        <li><a href="#"><i class="icon-social-instagram iconsociaf"></i></a></li>
                        <li><a href="#"><i class="icon-social-twitter iconsociaf"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                    <h6 class="widget-title">{{ __('home.footer_contact_title') }}</h6>
                    <p class="footerp">{{ __('home.footer_contact_text') }}</p>
                    <div class="bosluk333"></div>
                    <form action="{{ url('/' . ($locale ?? 'ru') . '/contact') }}" method="POST">
                        @csrf
                        <div class="form__grup wow fadeInLeft" data-wow-delay="0.7s">
                            <input type="text" name="name" class="form-popup__input" placeholder="{{ __('home.form_name') }}" required>
                        </div>
                        <div class="form__grup wow fadeInLeft" data-wow-delay="0.8s">
                            <input type="email" name="email" class="form-popup__input" placeholder="{{ __('home.form_email') }}" required>
                        </div>
                        <div class="form__grup wow fadeInLeft" data-wow-delay="0.85s">
                            <input type="tel" name="phone" class="form-popup__input" placeholder="{{ __('home.form_phone') }}">
                        </div>
                        <div class="form__grup wow fadeInUp" data-wow-delay="0.9s">
                            <input type="submit" class="custom-buttonw1" value="{{ __('home.form_submit') }}">
                        </div>
                    </form>
                    @if(session('success'))
                        <div class="alert alert-success mt-3">{{ session('success') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger mt-3">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col-lg-2 offset-xl-1 col-sm-6 wow animated fadeInUp" data-wow-delay="0.5s">
                    <h6 class="widget-title">Услуги</h6>
                    <div class="footer-menu">
                        <ul class="menu">
                            <li><a href="#packages">Quick Clean</a></li>
                            <li><a href="#packages">Deep Clean</a></li>
                            <li><a href="#packages">Move-In / Out</a></li>
                            <li><a href="#packages">Office Care</a></li>
                            <li><a href="#packages">Urgent Clean</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 wow animated fadeInUp" data-wow-delay="0.5s">
                    <h6 class="widget-title">Быстрые ссылки</h6>
                    <div class="footer-menu">
                        <ul class="menu">
                            <li><a href="#about">О нас</a></li>
                            <li><a href="#packages">Пакеты</a></li>
                            <li><a href="#how-it-works">Как мы работаем</a></li>
                            <li><a href="#faq">FAQ</a></li>
                            <li><a href="#contact">Контакты</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="copyright">
                        © 2026 CoralClean. Все права защищены.<br>
                        <small>PUHASTUS KORAL OÜ • Tallinn, Harjumaa, Estonia</small>
                    </p>
                </div>
            </div>
        </div>
        <div id="top" style="cursor: pointer;"><i class="flaticon-chevron icontops"></i><div class="bosluk3"></div></div>
    </footer>

    <!-- Scripts -->
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
    
    <!-- FAQ Toggle Script -->
    <script>
        document.querySelectorAll('.faq-question').forEach(function(question) {
            question.addEventListener('click', function() {
                this.parentElement.classList.toggle('active');
            });
        });
        
        if (typeof init_pointer === 'function') { init_pointer({}); }
    </script>
</body>
</html>
