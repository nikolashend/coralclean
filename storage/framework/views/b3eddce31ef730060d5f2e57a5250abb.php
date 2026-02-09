<!DOCTYPE html>
<html lang="<?php echo e($locale ?? 'ru'); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(__('home.meta_title')); ?></title>
    <meta name="description" content="<?php echo e(__('home.meta_description')); ?>">
    <meta name="keywords" content="<?php echo e(__('home.meta_keywords')); ?>">
    <meta name="robots" content="index, follow, max-image-preview:large">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo e(__('home.meta_title')); ?>">
    <meta property="og:description" content="<?php echo e(__('home.meta_description')); ?>">
    <meta property="og:url" content="<?php echo e(url('/' . $locale)); ?>">
    <meta property="og:image" content="<?php echo e(asset('img/coralclean/services/home clean.png')); ?>">
    <meta property="og:site_name" content="CoralClean">
    <meta property="og:locale" content="<?php echo e($locale == 'et' ? 'et_EE' : ($locale == 'en' ? 'en_US' : 'ru_RU')); ?>">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo e(__('home.meta_title')); ?>">
    <meta name="twitter:description" content="<?php echo e(__('home.meta_description')); ?>">
    <meta name="twitter:image" content="<?php echo e(asset('img/coralclean/services/home clean.png')); ?>">

    <!-- hreflang -->
    <link rel="alternate" hreflang="ru" href="<?php echo e(url('/ru')); ?>" />
    <link rel="alternate" hreflang="en" href="<?php echo e(url('/en')); ?>" />
    <link rel="alternate" hreflang="et" href="<?php echo e(url('/et')); ?>" />
    <link rel="alternate" hreflang="x-default" href="<?php echo e(url('/et')); ?>" />
    <link rel="canonical" href="<?php echo e(url('/' . $locale)); ?>" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>" media="all" />
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>" media="all" />
    <link rel="stylesheet" href="<?php echo e(asset('css/fancybox.min.css')); ?>" media="all" />
    <link rel="stylesheet" href="<?php echo e(asset('css/swiper.min.css')); ?>" media="all" />
    <link rel="stylesheet" href="<?php echo e(asset('css/odometer.min.css')); ?>" media="all" />
    <link rel="stylesheet" href="<?php echo e(asset('css/flaticon.css')); ?>" media="all" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo e(asset('img/coralclean/favicon.png')); ?>?v=<?php echo e(filemtime(public_path('img/coralclean/favicon.png'))); ?>">
    <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('img/coralclean/favicon.png')); ?>?v=<?php echo e(filemtime(public_path('img/coralclean/favicon.png'))); ?>">

    <?php echo $__env->make('partials.styles', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php
    $jsonFlags = JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT;
    $ctx = '@' . 'context';
    $typ = '@' . 'type';

    // LocalBusiness
    $schemaLocalBusiness = json_encode([
        $ctx => 'https://schema.org',
        $typ => 'LocalBusiness',
        'name' => 'CoralClean',
        'legalName' => 'PUHASTUS KORAL OÜ',
        'url' => 'https://coralclean.ee',
        'logo' => 'https://coralclean.ee/img/coralclean/logo.png',
        'image' => 'https://coralclean.ee/img/coralclean/services/home clean.png',
        'description' => __('home.meta_description'),
        'telephone' => '+37258301348',
        'email' => 'info@coralclean.ee',
        'priceRange' => '€€',
        'address' => [
            $typ => 'PostalAddress',
            'addressLocality' => 'Tallinn',
            'addressRegion' => 'Harjumaa',
            'addressCountry' => 'EE',
        ],
        'geo' => [
            $typ => 'GeoCoordinates',
            'latitude' => '59.4370',
            'longitude' => '24.7536',
        ],
        'areaServed' => [
            [$typ => 'City', 'name' => 'Tallinn'],
            [$typ => 'AdministrativeArea', 'name' => 'Harju County'],
        ],
        'openingHoursSpecification' => [
            $typ => 'OpeningHoursSpecification',
            'dayOfWeek' => ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'],
            'opens' => '08:00',
            'closes' => '20:00',
        ],
        'aggregateRating' => [
            $typ => 'AggregateRating',
            'ratingValue' => '4.9',
            'reviewCount' => '47',
            'bestRating' => '5',
        ],
        'sameAs' => [],
    ], $jsonFlags);

    // WebSite
    $schemaWebSite = json_encode([
        $ctx => 'https://schema.org',
        $typ => 'WebSite',
        'name' => 'CoralClean',
        'url' => 'https://coralclean.ee',
        'inLanguage' => ['ru','en','et'],
        'potentialAction' => [
            $typ => 'SearchAction',
            'target' => 'https://coralclean.ee/search?q={search_term_string}',
            'query-input' => 'required name=search_term_string',
        ],
    ], $jsonFlags);

    // Service + OfferCatalog
    $offerItems = [
        ['name' => 'Quick Clean — Regular Cleaning', 'description' => 'Regular apartment and house cleaning from €45'],
        ['name' => 'Deep Clean — Thorough Cleaning', 'description' => 'Deep cleaning of all surfaces from €2/m²'],
        ['name' => 'Move-In/Move-Out — Moving Cleaning', 'description' => 'Cleaning for rental handover from €60'],
        ['name' => 'Office Care — Office Cleaning', 'description' => 'Regular office cleaning from €0.07/m²'],
        ['name' => 'Urgent Clean — Same-Day Cleaning', 'description' => 'Urgent cleaning service, today or tomorrow'],
    ];
    $itemListElement = [];
    foreach ($offerItems as $item) {
        $itemListElement[] = [
            $typ => 'Offer',
            'itemOffered' => [$typ => 'Service', 'name' => $item['name'], 'description' => $item['description']],
        ];
    }
    $schemaService = json_encode([
        $ctx => 'https://schema.org',
        $typ => 'Service',
        'serviceType' => 'Cleaning Service',
        'provider' => [$typ => 'LocalBusiness', 'name' => 'CoralClean'],
        'areaServed' => ['Tallinn', 'Harjumaa'],
        'hasOfferCatalog' => [
            $typ => 'OfferCatalog',
            'name' => 'Cleaning Services',
            'itemListElement' => $itemListElement,
        ],
    ], $jsonFlags);

    // FAQPage
    $faqEntities = [];
    for ($i = 1; $i <= 7; $i++) {
        $faqEntities[] = [
            $typ => 'Question',
            'name' => __('home.faq'.$i.'_q'),
            'acceptedAnswer' => [$typ => 'Answer', 'text' => __('home.faq'.$i.'_a')],
        ];
    }
    $schemaFAQ = json_encode([
        $ctx => 'https://schema.org',
        $typ => 'FAQPage',
        'mainEntity' => $faqEntities,
    ], $jsonFlags);

    // Reviews
    $reviewEntities = [];
    for ($i = 1; $i <= 5; $i++) {
        $reviewEntities[] = [
            $typ => 'Review',
            'author' => [$typ => 'Person', 'name' => __('home.review'.$i.'_name')],
            'reviewBody' => __('home.review'.$i.'_text'),
            'reviewRating' => [$typ => 'Rating', 'ratingValue' => '5', 'bestRating' => '5'],
        ];
    }
    $schemaReviews = json_encode([
        $ctx => 'https://schema.org',
        $typ => 'LocalBusiness',
        'name' => 'CoralClean',
        'review' => $reviewEntities,
    ], $jsonFlags);
    ?>

    <!-- Schema.org LocalBusiness -->
    <script type="application/ld+json"><?php echo $schemaLocalBusiness; ?></script>

    <!-- Schema.org WebSite + SearchAction -->
    <script type="application/ld+json"><?php echo $schemaWebSite; ?></script>

    <!-- Schema.org Service -->
    <script type="application/ld+json"><?php echo $schemaService; ?></script>

    <!-- Schema.org FAQPage -->
    <script type="application/ld+json"><?php echo $schemaFAQ; ?></script>

    <!-- Schema.org Reviews -->
    <script type="application/ld+json"><?php echo $schemaReviews; ?></script>
</head>
<body>
    <!-- Preloader -->
    <div class="preloader">
        <figure><img src="<?php echo e(asset('img/coralclean/favicon.png')); ?>" alt="CoralClean"></figure>
    </div>
    <div class="page-transition"></div>

    <!-- Side Widget -->
    <aside class="side-widget">
        <div class="inner">
            <div class="logo"><a href="<?php echo e(url('/' . $locale)); ?>"><img src="<?php echo e(asset('img/coralclean/logo1.png')); ?>?v=<?php echo e(filemtime(public_path('img/coralclean/logo1.png'))); ?>" alt="CoralClean"></a></div>
            <div class="hide-mobile">
                <div class="or"><h2 class="h2-baslik-hizmetler-2"><?php echo e(__('home.nav_contacts')); ?></h2></div>
                <div class="bosluksv"></div>
                <div class="iconsv"><i class="flaticon-call"></i></div>
                <address class="address">
                    +372 5830 1348
                    <div class="bosluksv"></div>
                    <div class="iconsv"><i class="flaticon-email"></i></div>
                    info@coralclean.ee
                    <div class="bosluksv"></div>
                    <div class="iconsv"><i class="flaticon-location"></i></div>
                    <?php echo e(__('home.footer_location')); ?>

                    <div class="bosluksv"></div>
                    <div class="or" style="display: flex; gap: 10px; justify-content: center;">
                        <a href="<?php echo e(url('/ru')); ?>" style="color: <?php echo e($locale == 'ru' ? '#2ec4c6' : '#666'); ?>; font-weight: <?php echo e($locale == 'ru' ? 'bold' : 'normal'); ?>; text-decoration: none;">RU</a>
                        <span style="color: #ccc;">|</span>
                        <a href="<?php echo e(url('/en')); ?>" style="color: <?php echo e($locale == 'en' ? '#2ec4c6' : '#666'); ?>; font-weight: <?php echo e($locale == 'en' ? 'bold' : 'normal'); ?>; text-decoration: none;">EN</a>
                        <span style="color: #ccc;">|</span>
                        <a href="<?php echo e(url('/et')); ?>" style="color: <?php echo e($locale == 'et' ? '#2ec4c6' : '#666'); ?>; font-weight: <?php echo e($locale == 'et' ? 'bold' : 'normal'); ?>; text-decoration: none;">ET</a>
                    </div>
                </address>
            </div>
            <div class="show-mobile">
                <div class="site-menu">
                    <ul id="mobile-menu" style="list-style: none; padding: 0; margin: 20px 0;">
                        <li style="margin: 15px 0;"><a href="<?php echo e(url('/' . $locale)); ?>" style="color: #333; text-decoration: none; font-size: 18px;"><?php echo e(__('home.nav_home')); ?></a></li>
                        <li style="margin: 15px 0;"><a href="#about" style="color: #333; text-decoration: none; font-size: 18px;"><?php echo e(__('home.nav_about')); ?></a></li>
                        <li style="margin: 15px 0;"><a href="#packages" style="color: #333; text-decoration: none; font-size: 18px;"><?php echo e(__('home.nav_packages')); ?></a></li>
                        <li style="margin: 15px 0;"><a href="#reviews" style="color: #333; text-decoration: none; font-size: 18px;"><?php echo e(__('home.nav_reviews')); ?></a></li>
                        <li style="margin: 15px 0;"><a href="#faq" style="color: #333; text-decoration: none; font-size: 18px;"><?php echo e(__('home.nav_faq')); ?></a></li>
                        <li style="margin: 15px 0;"><a href="#contact" style="color: #333; text-decoration: none; font-size: 18px;"><?php echo e(__('home.nav_contacts')); ?></a></li>
                    </ul>
                    <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd;">
                        <p style="text-align: center; color: #666; font-size: 14px; margin-bottom: 10px;"><?php echo e(__('home.language')); ?></p>
                        <div style="display: flex; gap: 15px; justify-content: center; align-items: center;">
                            <a href="<?php echo e(url('/ru')); ?>" style="color: <?php echo e($locale == 'ru' ? '#2ec4c6' : '#666'); ?>; font-weight: <?php echo e($locale == 'ru' ? 'bold' : 'normal'); ?>; text-decoration: none; font-size: 16px;">🇷🇺 RU</a>
                            <span style="color: #ccc;">|</span>
                            <a href="<?php echo e(url('/en')); ?>" style="color: <?php echo e($locale == 'en' ? '#2ec4c6' : '#666'); ?>; font-weight: <?php echo e($locale == 'en' ? 'bold' : 'normal'); ?>; text-decoration: none; font-size: 16px;">🇬🇧 EN</a>
                            <span style="color: #ccc;">|</span>
                            <a href="<?php echo e(url('/et')); ?>" style="color: <?php echo e($locale == 'et' ? '#2ec4c6' : '#666'); ?>; font-weight: <?php echo e($locale == 'et' ? 'bold' : 'normal'); ?>; text-decoration: none; font-size: 16px;">🇪🇪 ET</a>
                        </div>
                    </div>
                </div>
            </div>
            <small>© 2026 CoralClean</small>
        </div>
    </aside>

    <?php echo $__env->make('partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- SLIDE-IN CONTACT FORM PANEL -->
    <aside class="contact-panel" id="contactPanel">
        <div class="contact-panel-inner">
            <div class="contact-panel-close" onclick="closeContactPanel()">&times;</div>
            <div class="callbackform">
                <h2 class="h2-baslik-popup h-yazi-margin-kucuk"><?php echo e(__('home.form_panel_title')); ?></h2>
                <p class="paragraf-popup"><?php echo e(__('home.form_panel_subtitle')); ?></p>
                <div class="bosluk1"></div>
                <form action="<?php echo e(url('/' . $locale . '/contact')); ?>" method="POST" class="form-popup">
                    <?php echo csrf_field(); ?>
                    <div class="form-popup__grup">
                        <input type="text" name="name" class="form-popup__input" placeholder="<?php echo e(__('home.form_name')); ?>" required>
                    </div>
                    <div class="form-popup__grup">
                        <input type="tel" name="phone" class="form-popup__input" placeholder="<?php echo e(__('home.form_phone')); ?>" required>
                    </div>
                    <div class="form-popup__grup">
                        <input type="email" name="email" class="form-popup__input" placeholder="<?php echo e(__('home.form_email')); ?>">
                    </div>
                    <div class="form-popup__grup">
                        <select name="service_type" class="form-popup__input" style="background: transparent; cursor: pointer;">
                            <option value=""><?php echo e(__('home.form_select_service')); ?></option>
                            <option value="quick-clean">Quick Clean</option>
                            <option value="deep-clean">Deep Clean</option>
                            <option value="move-in-out">Move-In / Move-Out</option>
                            <option value="office-care">Office Care</option>
                            <option value="urgent-clean">Urgent Clean</option>
                        </select>
                    </div>
                    <div class="form-popup__grup">
                        <input type="date" name="preferred_date" class="form-popup__input" placeholder="<?php echo e(__('home.form_preferred_date')); ?>">
                    </div>
                    <div class="form-popup__grup">
                        <div class="or">
                            <input type="submit" class="custom-button12" value="<?php echo e(__('home.form_submit')); ?>">
                        </div>
                    </div>
                </form>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
                    <div class="alert alert-success mt-3"><?php echo e(session('success')); ?></div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
                    <div class="alert alert-danger mt-3">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p><?php echo e($error); ?></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </aside>
    <div class="contact-panel-overlay" id="contactOverlay" onclick="closeContactPanel()"></div>

    <!-- HERO SECTION -->
    <header class="slider">
        <div class="main-slider">
            <div class="swiper-wrapper">
                <!-- Slide 1: Main -->
                <div class="swiper-slide" data-background="<?php echo e(asset('img/Hero.png')); ?>">
                    <div class="hero-overlay"></div>
                    <div class="container">
                        <div class="hero-badge"><?php echo e(__('home.hero_badge')); ?></div>
                        <h1><?php echo e(__('home.hero_title')); ?></h1>
                        <p><?php echo e(__('home.hero_subtitle')); ?></p>
                        <div class="bosluk1"></div>
                        <a href="javascript:void(0)" onclick="openContactPanel()"><?php echo e(__('home.btn_order')); ?> →</a>
                    </div>
                </div>
                <!-- Slide 2: Deep Clean -->
                <div class="swiper-slide" data-background="<?php echo e(asset('img/Deep-Clean.png')); ?>">
                    <div class="hero-overlay"></div>
                    <div class="container">
                        <h1><?php echo e(__('home.hero_slide2_title')); ?></h1>
                        <p><?php echo e(__('home.hero_slide2_text')); ?></p>
                        <div class="bosluk1"></div>
                        <a href="#packages"><?php echo e(__('home.hero_slide2_btn')); ?></a>
                    </div>
                </div>
                <!-- Slide 3: Move-In -->
                <div class="swiper-slide" data-background="<?php echo e(asset('img/Move-In-Out.png')); ?>">
                    <div class="hero-overlay"></div>
                    <div class="container">
                        <h1><?php echo e(__('home.hero_slide3_title')); ?></h1>
                        <p><?php echo e(__('home.hero_slide3_text')); ?></p>
                        <div class="bosluk1"></div>
                        <a href="#packages"><?php echo e(__('home.hero_slide3_btn')); ?></a>
                    </div>
                </div>
                <!-- Slide 4: Office -->
                <div class="swiper-slide" data-background="<?php echo e(asset('img/Office-Care.png')); ?>">
                    <div class="hero-overlay"></div>
                    <div class="container">
                        <h1><?php echo e(__('home.hero_slide4_title')); ?></h1>
                        <p><?php echo e(__('home.hero_slide4_text')); ?></p>
                        <div class="bosluk1"></div>
                        <a href="#packages"><?php echo e(__('home.hero_slide4_btn')); ?></a>
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
            <?php $values = [
                ['icon' => 'flaticon-stopwatch', 'key' => 'value1'],
                ['icon' => 'flaticon-badge', 'key' => 'value2'],
                ['icon' => 'flaticon-team-1', 'key' => 'value3'],
                ['icon' => 'flaticon-settings', 'key' => 'value4'],
            ]; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="tablo--1-ve-4">
                <div class="paketler wow flipInY" data-wow-delay="<?php echo e(0.6 + $i * 0.1); ?>s">
                    <div class="paketler__on paketler__on--onyazi">
                        <div class="paketler__icerik">
                            <div class="icon"><i class="<?php echo e($val['icon']); ?>"></i></div>
                            <h3 class="baslik-3 h-yazi-margin-kucuk"><?php echo e(__('home.' . $val['key'] . '_title')); ?></h3>
                        </div>
                    </div>
                    <div class="paketler__on paketler__on--arkayazi paketler__on--arkayazi-1">
                        <div class="paketler__pr">
                            <div class="paketler__pr-kutu">
                                <h3 class="baslik-sol h-yazi-margin-kucuk"><?php echo e(__('home.' . $val['key'] . '_title')); ?></h3>
                                <p class="services-kutu2--yazi wow fade"><?php echo e(__('home.' . $val['key'] . '_desc')); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>

    <!-- SERVICES BLOCK -->
    <div class="bosluk4"></div>
    <section class="content-section2" id="services">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="wow fadeInUp" data-wow-delay="0.3s">
                        <div class="icon"><i class="flaticon-mop"></i></div>
                        <h2 class="h2-baslik-hizmetler-2 wow fadeInRight" data-wow-delay="0.4s"><?php echo e(__('home.services_title')); ?></h2>
                        <p class="h2-baslik-hizmetler-2__paragraf wow fadeInUp" data-wow-delay="0.5s"><?php echo e(__('home.services_subtitle')); ?></p>
                    </div>
                </div>
            </div>
            <div class="bosluk3"></div>
            <div class="row">
                <?php $serviceCards = [
                    ['slug' => 'glass-cleaning', 'key' => 'glass', 'icon' => 'flaticon-clean-1'],
                    ['slug' => 'garden-cleaning', 'key' => 'garden', 'icon' => 'flaticon-agriculture'],
                    ['slug' => 'renovation-cleaning', 'key' => 'renovation', 'icon' => 'flaticon-brush'],
                    ['slug' => 'office-cleaning', 'key' => 'office', 'icon' => 'flaticon-clean'],
                    ['slug' => 'carpet-cleaning', 'key' => 'carpet', 'icon' => 'flaticon-vacuum'],
                    ['slug' => 'home-cleaning', 'key' => 'home', 'icon' => 'flaticon-house'],
                ]; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $serviceCards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $svc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="<?php echo e(0.5 + $i * 0.1); ?>s">
                    <a href="<?php echo e(url('/' . $locale . '/services/' . $svc['slug'])); ?>" class="service-card-link" style="text-decoration: none; color: inherit;">
                        <div class="paketler2" data-tilt>
                            <div class="paketler2__on paketler2__on--onyazi">
                                <div class="paketler2__gorsel paketler2__gorsel--1">
                                    <div class="paketler2__icerik">
                                        <div class="iconw"><i class="<?php echo e($svc['icon']); ?>"></i></div>
                                        <h3 class="baslik-3white h-yazi-margin-kucuk"><?php echo e(__('home.service_' . $svc['key'] . '_title')); ?></h3>
                                        <p class="services-kutu2--yazi wow fade"><?php echo e(__('home.service_' . $svc['key'] . '_short')); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="paketler2__on paketler2__on--arkayazi paketler2__on--arkayazi-1">
                                <div class="paketler2__pr">
                                    <div class="paketler2__pr-kutu">
                                        <h3 class="baslik-sol h-yazi-margin-kucuk"><?php echo e(__('home.service_' . $svc['key'] . '_title')); ?></h3>
                                        <p class="services-kutu2--yazi wow fade"><?php echo e(__('home.service_' . $svc['key'] . '_desc')); ?></p>
                                    </div>
                                    <span class="custom-button"><?php echo e(__('home.btn_details')); ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>

    <!-- PACKAGES SECTION -->
    <div class="bosluk4"></div>
    <section class="content-section2" id="packages">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="wow fadeInUp" data-wow-delay="0.3s">
                        <div class="icon"><i class="flaticon-checked"></i></div>
                        <h2 class="h2-baslik-hizmetler-2 wow fadeInRight" data-wow-delay="0.4s"><?php echo e(__('home.packages_title')); ?></h2>
                        <p class="h2-baslik-hizmetler-2__paragraf wow fadeInUp" data-wow-delay="0.5s"><?php echo e(__('home.packages_subtitle')); ?></p>
                    </div>
                </div>
            </div>
            <div class="bosluk3"></div>

            <div class="row">
                <?php $packages = [
                    ['key' => 'quick', 'icon' => 'flaticon-mop', 'image' => 'coralclean/packages/quick clean (1).png'],
                    ['key' => 'deep', 'icon' => 'flaticon-cleaning', 'image' => 'coralclean/packages/DEEP CLEAN (1).png'],
                    ['key' => 'movein', 'icon' => 'flaticon-clean-1', 'image' => 'coralclean/packages/MOVE-IN  MOVE-OUT.png'],
                ]; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $pkg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="<?php echo e(0.5 + $i * 0.15); ?>s" id="<?php echo e($pkg['key']); ?>-clean">
                    <a href="javascript:void(0)" onclick="openContactPanel()" class="service-card-link" style="text-decoration: none; color: inherit;">
                        <div class="paketler2" data-tilt>
                            <div class="paketler2__on paketler2__on--onyazi">
                                <div class="paketler2__gorsel paketler2__gorsel--1" style="background-image: url('<?php echo e(asset('img/' . $pkg['image'])); ?>'); background-size: cover; background-position: center;">
                                    <div class="paketler2__icerik">
                                        <div class="iconw"><i class="<?php echo e($pkg['icon']); ?>"></i></div>
                                        <h3 class="baslik-3white h-yazi-margin-kucuk"><?php echo e(__('home.package_' . $pkg['key'] . '_title')); ?></h3>
                                        <p class="services-kutu2--yazi wow fade"><?php echo e(__('home.package_' . $pkg['key'] . '_subtitle')); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="paketler2__on paketler2__on--arkayazi paketler2__on--arkayazi-1">
                                <div class="paketler2__pr">
                                    <div class="paketler2__pr-kutu">
                                        <h3 class="baslik-sol h-yazi-margin-kucuk"><?php echo e(__('home.package_' . $pkg['key'] . '_title')); ?></h3>
                                        <p class="services-kutu2--yazi wow fade"><?php echo e(__('home.package_' . $pkg['key'] . '_desc')); ?></p>
                                        <span class="package-card__price"><?php echo e(__('home.package_' . $pkg['key'] . '_price')); ?></span>
                                    </div>
                                    <span class="custom-button"><?php echo e(__('home.btn_order_' . $pkg['key'])); ?> →</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <div class="row mt-4">
                <?php $packages2 = [
                    ['key' => 'office', 'icon' => 'flaticon-clean', 'image' => 'coralclean/packages/OFFICE CARE (1).png'],
                    ['key' => 'urgent', 'icon' => 'flaticon-stopwatch', 'image' => 'coralclean/packages/URGENT CLEAN (1).png'],
                ]; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $packages2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $pkg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="<?php echo e(0.5 + $i * 0.15); ?>s" id="<?php echo e($pkg['key']); ?>-clean">
                    <a href="javascript:void(0)" onclick="openContactPanel()" class="service-card-link" style="text-decoration: none; color: inherit;">
                        <div class="paketler2" data-tilt>
                            <div class="paketler2__on paketler2__on--onyazi">
                                <div class="paketler2__gorsel paketler2__gorsel--1" style="background-image: url('<?php echo e(asset('img/' . $pkg['image'])); ?>'); background-size: cover; background-position: center;">
                                    <div class="paketler2__icerik">
                                        <div class="iconw"><i class="<?php echo e($pkg['icon']); ?>"></i></div>
                                        <h3 class="baslik-3white h-yazi-margin-kucuk"><?php echo e(__('home.package_' . $pkg['key'] . '_title')); ?></h3>
                                        <p class="services-kutu2--yazi wow fade"><?php echo e(__('home.package_' . $pkg['key'] . '_subtitle')); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="paketler2__on paketler2__on--arkayazi paketler2__on--arkayazi-1">
                                <div class="paketler2__pr">
                                    <div class="paketler2__pr-kutu">
                                        <h3 class="baslik-sol h-yazi-margin-kucuk"><?php echo e(__('home.package_' . $pkg['key'] . '_title')); ?></h3>
                                        <p class="services-kutu2--yazi wow fade"><?php echo e(__('home.package_' . $pkg['key'] . '_desc')); ?></p>
                                        <span class="package-card__price"><?php echo e(__('home.package_' . $pkg['key'] . '_price')); ?></span>
                                    </div>
                                    <span class="custom-button"><?php echo e(__('home.btn_' . ($pkg['key'] == 'urgent' ? 'urgent_package' : 'order_' . $pkg['key']))); ?> →</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>

    <!-- ABOUT SECTION -->
    <div class="bosluk4"></div>
    <section class="hakkimizda-bolumu-anasayfa mt-4" id="about">
        <div class="h-yazi-ozel h-yazi-margin-ozel"></div>
        <div class="tablo">
            <div class="tablo--1-ve-2 wow fade">
                <div class="galeri1 wow" data-wow-delay="0.5s"><img class="imagerotate" src="" alt=""></div>
                <div class="galeri wow rollIn" data-wow-delay="100ms" data-wow-duration="1500ms" data-tilt>
                    <img src="<?php echo e(asset('img/coralclean/coralclean_about.png')); ?>" alt="CoralClean" class="galeri__gorsel galeri__gorsel--3 zimage" loading="lazy">
                </div>
            </div>
            <div class="tablo--1-ve-3 wow fadeInUp" data-wow-delay="0.5s">
                <h2 class="h2-baslik-anasayfa-ozel wow fadeInUp" data-wow-delay="0.6s"><?php echo e(__('home.about_title')); ?></h2>
                <div class="bosluk333"></div>
                <p class="paragraf wow fade animated"><?php echo e(__('home.about_text')); ?></p>
                <div class="bosluk333"></div>
                <img class="divider" width="120" height="15" title="divider" alt="divider" src="<?php echo e(asset('img/divider.jpg')); ?>">
                <div class="bosluk333"></div>
                <div class="row">
                    <div class="col-sm-2 wow fadeInRight" data-wow-delay="0.7s"><div class="iconleft"><i class="flaticon-checked"></i></div></div>
                    <div class="col-sm-10 wow fadeInRight" data-wow-delay="0.8s">
                        <h3 class="baslik-3s h-yazi-margin-kucuk1"><?php echo e(__('home.about_feature1_title')); ?></h3><br>
                        <p class="paragraf-info"><?php echo e(__('home.about_feature1_desc')); ?></p><br>
                    </div>
                </div>
                <div class="bosluk13qs"></div>
                <div class="row">
                    <div class="col-sm-2 wow fadeInRight" data-wow-delay="0.9s"><div class="iconleft"><i class="flaticon-time"></i></div></div>
                    <div class="col-sm-10 wow fadeInRight" data-wow-delay="1s">
                        <h3 class="baslik-3s h-yazi-margin-kucuk1"><?php echo e(__('home.about_feature2_title')); ?></h3><br>
                        <p class="paragraf-info"><?php echo e(__('home.about_feature2_desc')); ?></p><br>
                    </div>
                </div>
                <div class="bosluk13qs"></div>
                <div class="row">
                    <div class="col-sm-2 wow fadeInRight" data-wow-delay="1.1s"><div class="iconleft"><i class="flaticon-tools"></i></div></div>
                    <div class="col-sm-10 wow fadeInRight" data-wow-delay="1.2s">
                        <h3 class="baslik-3s h-yazi-margin-kucuk1"><?php echo e(__('home.about_feature3_title')); ?></h3><br>
                        <p class="paragraf-info"><?php echo e(__('home.about_feature3_desc')); ?></p><br>
                    </div>
                </div>
                <div class="bosluk1"></div>
                <a href="javascript:void(0)" onclick="openContactPanel()" class="custom-button wow fadeInUp" data-wow-delay="1.3s"><?php echo e(__('home.btn_contact')); ?></a>
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
                        <h2 class="h2-baslik-hizmetler-2 wow fadeInRight" data-wow-delay="0.4s"><?php echo e(__('home.how_title')); ?></h2>
                        <p class="h2-baslik-hizmetler-2__paragraf wow fadeInUp" data-wow-delay="0.5s"><?php echo e(__('home.how_subtitle')); ?></p>
                    </div>
                </div>
            </div>
            <div class="bosluk3"></div>
            <div class="row">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 1; $i <= 4; $i++): ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="<?php echo e(0.4 + $i * 0.1); ?>s">
                    <div class="step-box">
                        <div class="step-number"><?php echo e($i); ?></div>
                        <h4><?php echo e(__('home.step'.$i.'_title')); ?></h4>
                        <p><?php echo e(__('home.step'.$i.'_desc')); ?></p>
                    </div>
                </div>
                <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
        <div class="boslukalt"></div>
    </section>

    <!-- REVIEWS SECTION -->
    <div class="bosluk4"></div>
    <section class="reviews-section" id="reviews">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.3s">
                    <div class="icon"><i class="flaticon-review"></i></div>
                    <h2 class="h2-baslik-hizmetler-2 wow fadeInRight" data-wow-delay="0.4s"><?php echo e(__('home.reviews_title')); ?></h2>
                    <p class="h2-baslik-hizmetler-2__paragraf wow fadeInUp" data-wow-delay="0.5s"><?php echo e(__('home.reviews_subtitle')); ?></p>
                    <div class="bosluk3"></div>
                </div>
            </div>
            <div class="row">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 1; $i <= 5; $i++): ?>
                <div class="col-lg-4 col-md-6 <?php echo e($i > 3 ? 'col-lg-6' : ''); ?> wow fadeInUp" data-wow-delay="<?php echo e(0.4 + $i * 0.1); ?>s">
                    <div class="review-card">
                        <div class="review-card__stars">★★★★★</div>
                        <p class="review-card__text">"<?php echo e(__('home.review'.$i.'_text')); ?>"</p>
                        <div class="review-card__author">
                            <strong><?php echo e(__('home.review'.$i.'_name')); ?></strong>
                            <span class="review-card__service"><?php echo e(__('home.review'.$i.'_service')); ?></span>
                        </div>
                    </div>
                </div>
                <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>

    <!-- WE WORK WITH (replaces fake logos) -->
    <div class="bosluk4"></div>
    <section class="ozellika" data-background="#f6f7f8" style="background: #f6f7f8;" id="we-work-with">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="wow fadeInUp" data-wow-delay="0.3s">
                        <div class="boslukalt"></div>
                        <div class="icon"><i class="flaticon-handshake"></i></div>
                        <h2 class="h2-baslik-hizmetler-2 wow fadeInRight" data-wow-delay="0.4s"><?php echo e(__('home.we_work_title')); ?></h2>
                        <p class="h2-baslik-hizmetler-2__paragraf wow fadeInUp" data-wow-delay="0.5s"><?php echo e(__('home.we_work_subtitle')); ?></p>
                    </div>
                </div>
            </div>
            <div class="bosluk3"></div>
            <div class="row">
                <?php $workIcons = ['flaticon-house', 'flaticon-clean', 'flaticon-calendar', 'flaticon-brush', 'flaticon-team-1', 'flaticon-shield']; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 1; $i <= 6; $i++): ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="<?php echo e(0.4 + $i * 0.1); ?>s">
                    <div class="we-work-card">
                        <div class="icon"><i class="<?php echo e($workIcons[$i-1]); ?>"></i></div>
                        <p><?php echo e(__('home.we_work_' . $i)); ?></p>
                    </div>
                </div>
                <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                    <h2 class="h2-baslik-hizmetler-2 wow fadeInUp" data-wow-delay="0.5s"><?php echo e(__('home.trust_title')); ?></h2>
                    <p class="h2-baslik-hizmetler-2__paragraf wow fadeInUp" data-wow-delay="0.6s"><?php echo e(__('home.trust_subtitle')); ?></p>
                    <div class="bosluk3"></div>
                </div>
            </div>
            <div class="row">
                <?php $trustIcons = ['flaticon-location', 'flaticon-team-1', 'flaticon-badge', 'flaticon-shield', 'flaticon-calendar', 'flaticon-review']; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 1; $i <= 6; $i++): ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="<?php echo e(0.4 + $i * 0.1); ?>s">
                    <div class="trust-card">
                        <div class="icon"><i class="<?php echo e($trustIcons[$i-1]); ?>"></i></div>
                        <h4><?php echo e(__('home.trust'.$i.'_title')); ?></h4>
                        <p><?php echo e(__('home.trust'.$i.'_desc')); ?></p>
                    </div>
                </div>
                <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                        <h2 class="h2-baslik-hizmetler-2 wow fadeInRight" data-wow-delay="0.4s"><?php echo e(__('home.faq_title')); ?></h2>
                    </div>
                </div>
            </div>
            <div class="bosluk3"></div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 1; $i <= 7; $i++): ?>
                    <div class="faq-item wow fadeInUp" data-wow-delay="<?php echo e(0.4 + $i * 0.1); ?>s">
                        <div class="faq-question">
                            <span><?php echo e(__('home.faq'.$i.'_q')); ?></span>
                            <span class="faq-icon">▼</span>
                        </div>
                        <div class="faq-answer">
                            <p><?php echo e(__('home.faq'.$i.'_a')); ?></p>
                        </div>
                    </div>
                    <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>
        <div class="boslukalt"></div>
    </section>

    <!-- CTA SECTION -->
    <section class="cta-section">
        <div class="container">
            <h2 class="wow fadeInUp" data-wow-delay="0.3s"><?php echo e(__('home.cta_title')); ?></h2>
            <p class="wow fadeInUp text-center" data-wow-delay="0.4s"><?php echo e(__('home.cta_subtitle')); ?></p>
            <div class="wow fadeInUp" data-wow-delay="0.5s">
                <a href="javascript:void(0)" onclick="openContactPanel()" class="cta-btn"><?php echo e(__('home.btn_leave_request')); ?> →</a>
                <a href="https://wa.me/37258301348" class="cta-btn secondary">WhatsApp →</a>
            </div>
        </div>
    </section>

    <!-- STATISTICS -->
    <section class="content-section" data-background="#fafafa">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 wow fadeInLeft" data-wow-delay="0.6s">
                    <div class="icon"><i class="flaticon-handshake"></i></div>
                    <div class="counter-box wow fade"><span class="odometer" data-count="2500" data-status="yes">0</span><h6><?php echo e(__('home.stat1')); ?></h6></div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInLeft" data-wow-delay="0.7s">
                    <div class="icon"><i class="flaticon-group"></i></div>
                    <div class="counter-box wow fade"><span class="odometer" data-count="450" data-status="yes">0</span><h6><?php echo e(__('home.stat2')); ?></h6></div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInRight" data-wow-delay="0.8s">
                    <div class="icon"><i class="flaticon-insurance"></i></div>
                    <div class="counter-box wow fade"><span class="odometer" data-count="500" data-status="yes">0</span><h6><?php echo e(__('home.stat3')); ?></h6></div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInRight" data-wow-delay="0.9s">
                    <div class="icon"><i class="flaticon-review"></i></div>
                    <div class="counter-box wow fade"><span class="odometer" data-count="15" data-status="yes">0</span><h6><?php echo e(__('home.stat4')); ?></h6></div>
                </div>
            </div>
        </div>
    </section>

    <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- FLOATING ACTION BUTTONS -->
    <div class="floating-buttons">
        <a href="https://wa.me/37258301348" class="floating-btn floating-btn--whatsapp" title="<?php echo e(__('home.float_whatsapp')); ?>" aria-label="WhatsApp">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="white"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        </a>
        <a href="tel:+37258301348" class="floating-btn floating-btn--call" title="<?php echo e(__('home.float_call')); ?>" aria-label="Call">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="white"><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56-.35-.12-.74-.03-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/></svg>
        </a>
    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/fancybox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/swiper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/odometer.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/scripts.js')); ?>"></script>
    <script src="<?php echo e(asset('js/3d.jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('js/pointer.js')); ?>"></script>
    <script src="<?php echo e(asset('js/yukari-cik.js')); ?>"></script>
    <script src="<?php echo e(asset('js/tabs.js')); ?>"></script>

    <script>
        // FAQ Toggle
        document.querySelectorAll('.faq-question').forEach(function(question) {
            question.addEventListener('click', function() {
                this.parentElement.classList.toggle('active');
            });
        });

        if (typeof init_pointer === 'function') { init_pointer({}); }

        // Contact Panel Functions
        function openContactPanel() {
            document.getElementById('contactPanel').classList.add('open');
            document.getElementById('contactOverlay').classList.add('open');
            document.body.style.overflow = 'hidden';
        }
        function closeContactPanel() {
            document.getElementById('contactPanel').classList.remove('open');
            document.getElementById('contactOverlay').classList.remove('open');
            document.body.style.overflow = '';
        }
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeContactPanel();
        });
    </script>
</body>
</html>
<?php /**PATH C:\Users\nikol\coralclean-laravel\resources\views/home.blade.php ENDPATH**/ ?>