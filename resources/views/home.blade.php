<!DOCTYPE html>
<html lang="{{ $locale ?? 'ru' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('home.meta_title') }}</title>
    <meta name="description" content="{{ __('home.meta_description') }}">
    <meta name="keywords" content="{{ __('home.meta_keywords') }}">
    <meta name="robots" content="index, follow, max-image-preview:large">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ __('home.meta_title') }}">
    <meta property="og:description" content="{{ __('home.meta_description') }}">
    <meta property="og:url" content="{{ url('/' . $locale) }}">
    <meta property="og:image" content="{{ asset('img/coralclean/services/home clean.png') }}">
    <meta property="og:site_name" content="CoralClean">
    <meta property="og:locale" content="{{ $locale == 'et' ? 'et_EE' : ($locale == 'en' ? 'en_US' : 'ru_RU') }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ __('home.meta_title') }}">
    <meta name="twitter:description" content="{{ __('home.meta_description') }}">
    <meta name="twitter:image" content="{{ asset('img/coralclean/services/home clean.png') }}">

    <!-- hreflang -->
    <link rel="alternate" hreflang="ru" href="{{ url('/ru') }}" />
    <link rel="alternate" hreflang="en" href="{{ url('/en') }}" />
    <link rel="alternate" hreflang="et" href="{{ url('/et') }}" />
    <link rel="alternate" hreflang="x-default" href="{{ url('/et') }}" />
    <link rel="canonical" href="{{ url('/' . $locale) }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" media="all" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" media="all" />
    <link rel="stylesheet" href="{{ asset('css/fancybox.min.css') }}" media="all" />
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}" media="all" />
    <link rel="stylesheet" href="{{ asset('css/odometer.min.css') }}" media="all" />
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}" media="all" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('img/coralclean/favicon.png') }}?v={{ filemtime(public_path('img/coralclean/favicon.png')) }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/coralclean/favicon.png') }}?v={{ filemtime(public_path('img/coralclean/favicon.png')) }}">

    @include('partials.styles')

    @php
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
        'telephone' => $contact->phone_clean ?? '+37258301348',
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
    $itemListElement = [];
    foreach ($services as $svc) {
        $sTrans = $svc->translations->first();
        if ($sTrans) {
            $itemListElement[] = [
                $typ => 'Offer',
                'itemOffered' => [$typ => 'Service', 'name' => $sTrans->title, 'description' => $sTrans->short_desc ?? $sTrans->description],
            ];
        }
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
    @endphp

    <!-- Schema.org LocalBusiness -->
    <script type="application/ld+json">{!! $schemaLocalBusiness !!}</script>

    <!-- Schema.org WebSite + SearchAction -->
    <script type="application/ld+json">{!! $schemaWebSite !!}</script>

    <!-- Schema.org Service -->
    <script type="application/ld+json">{!! $schemaService !!}</script>

    <!-- Schema.org FAQPage -->
    <script type="application/ld+json">{!! $schemaFAQ !!}</script>

    <!-- Schema.org Reviews -->
    <script type="application/ld+json">{!! $schemaReviews !!}</script>
</head>
<body>
    <!-- Preloader -->
    <div class="preloader">
        <figure><img src="{{ asset('img/coralclean/favicon.png') }}" alt="CoralClean"></figure>
    </div>
    <div class="page-transition"></div>

    <!-- Side Widget -->
    <aside class="side-widget">
        <div class="inner">
            <div class="logo"><a href="{{ url('/' . $locale) }}"><img src="{{ asset('img/coralclean/logo1.png') }}?v={{ filemtime(public_path('img/coralclean/logo1.png')) }}" alt="CoralClean"></a></div>
            <div class="hide-mobile">
                <div class="or"><h2 class="h2-baslik-hizmetler-2">{{ __('home.nav_contacts') }}</h2></div>
                <div class="bosluksv"></div>
                <div class="iconsv"><i class="flaticon-call"></i></div>
                <address class="address">
                    {{ $contact->phone ?? '+372 5830 1348' }}
                    <div class="bosluksv"></div>
                    <div class="iconsv"><i class="flaticon-email"></i></div>
                    info@coralclean.ee
                    <div class="bosluksv"></div>
                    <div class="iconsv"><i class="flaticon-location"></i></div>
                    {{ __('home.footer_location') }}
                    <div class="bosluksv"></div>
                    <div class="or" style="display: flex; gap: 10px; justify-content: center;">
                        <a href="{{ url('/ru') }}" style="color: {{ $locale == 'ru' ? '#2ec4c6' : '#666' }}; font-weight: {{ $locale == 'ru' ? 'bold' : 'normal' }}; text-decoration: none;">RU</a>
                        <span style="color: #ccc;">|</span>
                        <a href="{{ url('/en') }}" style="color: {{ $locale == 'en' ? '#2ec4c6' : '#666' }}; font-weight: {{ $locale == 'en' ? 'bold' : 'normal' }}; text-decoration: none;">EN</a>
                        <span style="color: #ccc;">|</span>
                        <a href="{{ url('/et') }}" style="color: {{ $locale == 'et' ? '#2ec4c6' : '#666' }}; font-weight: {{ $locale == 'et' ? 'bold' : 'normal' }}; text-decoration: none;">ET</a>
                    </div>
                </address>
            </div>
            <div class="show-mobile">
                <div class="site-menu">
                    <ul id="mobile-menu" style="list-style: none; padding: 0; margin: 10px 0;">
                        <li style="margin: 8px 0;"><a href="{{ url('/' . $locale) }}" style="color: #333; text-decoration: none; font-size: 18px;">{{ __('home.nav_home') }}</a></li>
                        <li style="margin: 8px 0;"><a href="#about" style="color: #333; text-decoration: none; font-size: 18px;">{{ __('home.nav_about') }}</a></li>
                        <li style="margin: 8px 0;"><a href="#services" style="color: #333; text-decoration: none; font-size: 18px;">{{ __('home.nav_services') }}</a></li>
                        <li style="margin: 8px 0;"><a href="#packages" style="color: #333; text-decoration: none; font-size: 18px;">{{ __('home.nav_packages') }}</a></li>
                        <li style="margin: 8px 0;"><a href="#faq" style="color: #333; text-decoration: none; font-size: 18px;">{{ __('home.nav_faq') }}</a></li>
                        <li style="margin: 8px 0;"><a href="#contact" style="color: #333; text-decoration: none; font-size: 18px;">{{ __('home.nav_contacts') }}</a></li>
                    </ul>
                    <div style="margin-top: 15px; padding-top: 15px; border-top: 1px solid #ddd;">
                        <p style="text-align: center; color: #666; font-size: 14px; margin-bottom: 10px;">{{ __('home.language') }}</p>
                        <div style="display: flex; gap: 15px; justify-content: center; align-items: center;">
                            <a href="{{ url('/ru') }}" style="color: {{ $locale == 'ru' ? '#2ec4c6' : '#666' }}; font-weight: {{ $locale == 'ru' ? 'bold' : 'normal' }}; text-decoration: none; font-size: 16px;">RU</a>
                            <span style="color: #ccc;">|</span>
                            <a href="{{ url('/en') }}" style="color: {{ $locale == 'en' ? '#2ec4c6' : '#666' }}; font-weight: {{ $locale == 'en' ? 'bold' : 'normal' }}; text-decoration: none; font-size: 16px;">EN</a>
                            <span style="color: #ccc;">|</span>
                            <a href="{{ url('/et') }}" style="color: {{ $locale == 'et' ? '#2ec4c6' : '#666' }}; font-weight: {{ $locale == 'et' ? 'bold' : 'normal' }}; text-decoration: none; font-size: 16px;">ET</a>
                        </div>
                    </div>
                </div>
            </div>
            <small>© 2026 CoralClean</small>
        </div>
    </aside>

    @include('partials.header')

    <!-- SLIDE-IN CONTACT FORM PANEL -->
    <aside class="contact-panel" id="contactPanel">
        <div class="contact-panel-inner">
            <div class="contact-panel-close" onclick="closeContactPanel()">&times;</div>
            <div class="callbackform">
                <h2 class="h2-baslik-popup h-yazi-margin-kucuk">{{ __('home.form_panel_title') }}</h2>
                <p class="paragraf-popup">{{ __('home.form_panel_subtitle') }}</p>
                <div class="bosluk1"></div>
                <form action="{{ url('/' . $locale . '/contact') }}" method="POST" class="form-popup">
                    @csrf
                    <div class="form-popup__grup">
                        <input type="text" name="name" class="form-popup__input" placeholder="{{ __('home.form_name') }}" required>
                    </div>
                    <div class="form-popup__grup">
                        <input type="tel" name="phone" class="form-popup__input" placeholder="{{ __('home.form_phone') }}" required>
                    </div>
                    <div class="form-popup__grup">
                        <input type="email" name="email" class="form-popup__input" placeholder="{{ __('home.form_email') }}">
                    </div>
                    <div class="form-popup__grup">
                        <select name="service_type" class="form-popup__input" style="background: transparent; cursor: pointer;">
                            <option value="">{{ __('home.form_select_service') }}</option>
                            @if(isset($allServices))
                            @foreach($allServices as $navSvc)
                            @php $navTrans = $navSvc->translations->first(); @endphp
                            <option value="{{ $navSvc->slug }}">{{ $navTrans->title ?? $navSvc->slug }}</option>
                            @endforeach
                            @endif
                            @foreach($packages as $pkg)
                            @php $pkgTrans = $pkg->translations->first(); @endphp
                            <option value="{{ $pkg->slug }}">📦 {{ $pkgTrans->title ?? $pkg->slug }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-popup__grup">
                        <input type="date" name="preferred_date" class="form-popup__input" placeholder="{{ __('home.form_preferred_date') }}">
                    </div>
                    <div class="form-popup__grup">
                        <div class="or">
                            <input type="submit" class="custom-button12" value="{{ __('home.form_submit') }}">
                        </div>
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
        </div>
    </aside>
    <div class="contact-panel-overlay" id="contactOverlay" onclick="closeContactPanel()"></div>

    <!-- HERO SECTION -->
    <header class="slider">
        <div class="main-slider">
            <div class="swiper-wrapper">
                <!-- Slide 1: Main -->
                <div class="swiper-slide" data-background="{{ asset('img/Hero.png') }}">
                    <div class="hero-overlay"></div>
                    <div class="container">
                        <div class="hero-badge">{{ __('home.hero_badge') }}</div>
                        <h1>{{ __('home.hero_title') }}</h1>
                        <p>{{ __('home.hero_subtitle') }}</p>
                        <div class="bosluk1"></div>
                        <a href="javascript:void(0)" onclick="openContactPanel()">{{ __('home.btn_order') }} →</a>
                    </div>
                </div>
                <!-- Slide 2: Deep Clean -->
                <div class="swiper-slide" data-background="{{ asset('img/Deep-Clean.png') }}">
                    <div class="hero-overlay"></div>
                    <div class="container">
                        <h1>{{ __('home.hero_slide2_title') }}</h1>
                        <p>{{ __('home.hero_slide2_text') }}</p>
                        <div class="bosluk1"></div>
                        <a href="#packages">{{ __('home.hero_slide2_btn') }}</a>
                    </div>
                </div>
                <!-- Slide 3: Move-In -->
                <div class="swiper-slide" data-background="{{ asset('img/Move-In-Out.png') }}">
                    <div class="hero-overlay"></div>
                    <div class="container">
                        <h1>{{ __('home.hero_slide3_title') }}</h1>
                        <p>{{ __('home.hero_slide3_text') }}</p>
                        <div class="bosluk1"></div>
                        <a href="#packages">{{ __('home.hero_slide3_btn') }}</a>
                    </div>
                </div>
                <!-- Slide 4: Office -->
                <div class="swiper-slide" data-background="{{ asset('img/Office-Care.png') }}">
                    <div class="hero-overlay"></div>
                    <div class="container">
                        <h1>{{ __('home.hero_slide4_title') }}</h1>
                        <p>{{ __('home.hero_slide4_text') }}</p>
                        <div class="bosluk1"></div>
                        <a href="#packages">{{ __('home.hero_slide4_btn') }}</a>
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
            @php $values = [
                ['icon' => 'flaticon-stopwatch', 'key' => 'value1'],
                ['icon' => 'flaticon-badge', 'key' => 'value2'],
                ['icon' => 'flaticon-team-1', 'key' => 'value3'],
                ['icon' => 'flaticon-settings', 'key' => 'value4'],
            ]; @endphp
            @foreach($values as $i => $val)
            <div class="tablo--1-ve-4">
                <div class="paketler wow flipInY" data-wow-delay="{{ 0.6 + $i * 0.1 }}s">
                    <div class="paketler__on paketler__on--onyazi">
                        <div class="paketler__icerik">
                            <div class="icon"><i class="{{ $val['icon'] }}"></i></div>
                            <h3 class="baslik-3 h-yazi-margin-kucuk">{{ __('home.' . $val['key'] . '_title') }}</h3>
                        </div>
                    </div>
                    <div class="paketler__on paketler__on--arkayazi paketler__on--arkayazi-1">
                        <div class="paketler__pr">
                            <div class="paketler__pr-kutu">
                                <h3 class="baslik-sol h-yazi-margin-kucuk">{{ __('home.' . $val['key'] . '_title') }}</h3>
                                <p class="services-kutu2--yazi wow fade">{{ __('home.' . $val['key'] . '_desc') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- SERVICES BLOCK -->
    <div class="bosluk4"></div>
    <section class="content-section2" id="services">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="wow fadeInUp" data-wow-delay="0.3s">
                        <div class="icon"><i class="flaticon-clean"></i></div>
                        <h2 class="h2-baslik-hizmetler-2 wow fadeInRight" data-wow-delay="0.4s">{{ __('home.services_title') }}</h2>
                        <p class="h2-baslik-hizmetler-2__paragraf wow fadeInUp" data-wow-delay="0.5s">{{ __('home.services_subtitle') }}</p>
                    </div>
                </div>
            </div>
            <div class="bosluk3"></div>
            <div class="row">
                @foreach($services as $i => $svc)
                @php $trans = $svc->translations->first(); @endphp
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.5 + $i * 0.1 }}s">
                    <a href="{{ url('/' . $locale . '/services/' . $svc->slug) }}" class="service-card-link" style="text-decoration: none; color: inherit;">
                        <div class="paketler2" data-tilt>
                            <div class="paketler2__on paketler2__on--onyazi">
                                <div class="paketler2__gorsel paketler2__gorsel--1">
                                    <div class="paketler2__icerik">
                                        <div class="iconw"><i class="{{ $svc->icon }}"></i></div>
                                        <h3 class="baslik-3white h-yazi-margin-kucuk">{{ $trans->title ?? '' }}</h3>
                                        @if($trans->price_anchor)
                                        <div class="service-card-price">{{ $trans->price_anchor }}</div>
                                        @else
                                        <p class="services-kutu2--yazi wow fade">{{ $trans->short_desc ?? '' }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="paketler2__on paketler2__on--arkayazi paketler2__on--arkayazi-1">
                                <div class="paketler2__pr">
                                    <div class="paketler2__pr-kutu">
                                        <h3 class="baslik-sol h-yazi-margin-kucuk">{{ $trans->title ?? '' }}</h3>
                                        <p class="services-kutu2--yazi wow fade">{{ $trans->description ?? '' }}</p>
                                    </div>
                                    <span class="custom-button">{{ __('home.btn_details') }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-4 wow fadeInUp" data-wow-delay="0.7s">
                <a href="{{ url('/' . $locale . '/services') }}" class="custom-button">{{ __('home.all_services_btn') ?? __('home.btn_details') }} →</a>
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
                        <div class="icon"><i class="flaticon-badge"></i></div>
                        <h2 class="h2-baslik-hizmetler-2 wow fadeInRight" data-wow-delay="0.4s">{{ __('home.packages_title') }}</h2>
                        <p class="h2-baslik-hizmetler-2__paragraf wow fadeInUp" data-wow-delay="0.5s">{{ __('home.packages_subtitle') }}</p>
                    </div>
                </div>
            </div>
            <div class="bosluk3"></div>

            <div class="row">
                @foreach($packages as $i => $pkg)
                @php $trans = $pkg->translations->first(); @endphp
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.5 + $i * 0.15 }}s" id="{{ $pkg->slug }}-clean">
                    <a href="javascript:void(0)" onclick="openContactPanel('{{ $pkg->slug }}-clean')" class="service-card-link" style="text-decoration: none; color: inherit;">
                        <div class="paketler2" data-tilt>
                            <div class="paketler2__on paketler2__on--onyazi">
                                <div class="paketler2__gorsel paketler2__gorsel--1" style="background-image: url('{{ asset('img/' . $pkg->image) }}'); background-size: cover; background-position: center;">
                                    <div class="paketler2__icerik">
                                        <div class="iconw"><i class="{{ $pkg->icon }}"></i></div>
                                        <h3 class="baslik-3white h-yazi-margin-kucuk">{{ $trans->title ?? '' }}</h3>
                                        <p class="services-kutu2--yazi wow fade">{{ $trans->subtitle ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="paketler2__on paketler2__on--arkayazi paketler2__on--arkayazi-1">
                                <div class="paketler2__pr">
                                    <div class="paketler2__pr-kutu">
                                        <h3 class="baslik-sol h-yazi-margin-kucuk">{{ $trans->title ?? '' }}</h3>
                                        <p class="services-kutu2--yazi wow fade">{{ $trans->description ?? '' }}</p>
                                        <span class="package-card__price">{{ $trans->price ?? '' }}</span>
                                    </div>
                                    <span class="custom-button">{{ $trans->btn_text ?? __('home.btn_order_package') }} →</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- PARTNERS SECTION -->
    <section class="markalar">
        <div class="h-yazi-ortalama h-yazi-margin-orta-3 wow animated fadeInUp animated" data-wow-delay="0.5s">
            <div class="iconw wow fadeInUp" data-wow-delay="0.6s"><i class="flaticon-badge"></i></div>
            <h2 class="h2-baslik-hizmetler-21 wow fadeInUp" data-wow-delay="0.6s"> {{ __('home.partners_title') }} </h2>
        </div>
        <p class="h2-baslik-hizmetler-21__paragraf wow fadeInUp" data-wow-delay="0.6s">
            {{ __('home.partners_subtitle') }}
        </p>
        <div class="bosluk3"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="h-yazi-ortalama h-yazi-margin-kucuk-21 wow animated fadeInUp animated" data-wow-delay="0.5s">
                        <img src="{{ asset('img/coralclean/partners/bolt.png') }}" alt="Bolt" class="marka">
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="h-yazi-ortalama h-yazi-margin-kucuk-21 wow animated fadeInUp animated" data-wow-delay="0.5s">
                        <img src="{{ asset('img/coralclean/partners/swedbank.png') }}" alt="Swedbank" class="marka">
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="h-yazi-ortalama h-yazi-margin-kucuk-21 wow animated fadeInUp animated" data-wow-delay="0.5s">
                        <img src="{{ asset('img/coralclean/partners/telia.png') }}" alt="Telia" class="marka">
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="h-yazi-ortalama h-yazi-margin-kucuk-21 wow animated fadeInUp animated" data-wow-delay="0.5s">
                        <img src="{{ asset('img/coralclean/partners/wise.png') }}" alt="Wise" class="marka">
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="h-yazi-ortalama h-yazi-margin-kucuk-21 wow animated fadeInUp animated" data-wow-delay="0.5s">
                        <img src="{{ asset('img/coralclean/partners/lhv.png') }}" alt="LHV" class="marka">
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="h-yazi-ortalama h-yazi-margin-kucuk-21 wow animated fadeInUp animated" data-wow-delay="0.5s">
                        <img src="{{ asset('img/coralclean/partners/pipedrive.png') }}" alt="Pipedrive" class="marka">
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="h-yazi-ortalama h-yazi-margin-kucuk-21 wow animated fadeInUp animated" data-wow-delay="0.5s">
                        <img src="{{ asset('img/coralclean/partners/Veriff.png') }}" alt="Veriff" class="marka">
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="h-yazi-ortalama h-yazi-margin-kucuk-21 wow animated fadeInUp animated" data-wow-delay="0.5s">
                        <img src="{{ asset('img/coralclean/partners/omniva.png') }}" alt="Omniva" class="marka">
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="h-yazi-ortalama h-yazi-margin-kucuk-21 wow animated fadeInUp animated" data-wow-delay="0.5s">
                        <img src="{{ asset('img/coralclean/partners/coop.png') }}" alt="Coop" class="marka">
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="h-yazi-ortalama h-yazi-margin-kucuk-21 wow animated fadeInUp animated" data-wow-delay="0.5s">
                        <img src="{{ asset('img/coralclean/partners/seb.png') }}" alt="SEB" class="marka">
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="h-yazi-ortalama h-yazi-margin-kucuk-21 wow animated fadeInUp animated" data-wow-delay="0.5s">
                        <img src="{{ asset('img/coralclean/partners/nordea.png') }}" alt="Nordea" class="marka">
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="h-yazi-ortalama h-yazi-margin-kucuk-21 wow animated fadeInUp animated" data-wow-delay="0.5s">
                        <img src="{{ asset('img/coralclean/partners/enefit.png') }}" alt="Enefit" class="marka">
                    </div>
                </div>
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
                    <img src="{{ asset('img/coralclean/coralclean_about.png') }}" alt="CoralClean" class="galeri__gorsel galeri__gorsel--3 zimage" loading="lazy">
                </div>
            </div>
            <div class="tablo--1-ve-3 wow fadeInUp" data-wow-delay="0.5s">
                <h2 class="h2-baslik-anasayfa-ozel wow fadeInUp" data-wow-delay="0.6s">{{ __('home.about_title') }}</h2>
                <div class="bosluk333"></div>
                <p class="paragraf wow fade animated">{{ __('home.about_text') }}</p>
                <div class="bosluk333"></div>
                <img class="divider" width="120" height="15" title="divider" alt="divider" src="{{ asset('img/divider.jpg') }}">
                <div class="bosluk333"></div>
                <div class="row">
                    <div class="col-sm-2 wow fadeInRight" data-wow-delay="0.7s"><div class="iconleft"><i class="flaticon-shield"></i></div></div>
                    <div class="col-sm-10 wow fadeInRight" data-wow-delay="0.8s">
                        <h3 class="baslik-3s h-yazi-margin-kucuk1">{{ __('home.about_feature1_title') }}</h3><br>
                        <p class="paragraf-info">{{ __('home.about_feature1_desc') }}</p><br>
                    </div>
                </div>
                <div class="bosluk13qs"></div>
                <div class="row">
                    <div class="col-sm-2 wow fadeInRight" data-wow-delay="0.9s"><div class="iconleft"><i class="flaticon-time"></i></div></div>
                    <div class="col-sm-10 wow fadeInRight" data-wow-delay="1s">
                        <h3 class="baslik-3s h-yazi-margin-kucuk1">{{ __('home.about_feature2_title') }}</h3><br>
                        <p class="paragraf-info">{{ __('home.about_feature2_desc') }}</p><br>
                    </div>
                </div>
                <div class="bosluk13qs"></div>
                <div class="row">
                    <div class="col-sm-2 wow fadeInRight" data-wow-delay="1.1s"><div class="iconleft"><i class="flaticon-tools"></i></div></div>
                    <div class="col-sm-10 wow fadeInRight" data-wow-delay="1.2s">
                        <h3 class="baslik-3s h-yazi-margin-kucuk1">{{ __('home.about_feature3_title') }}</h3><br>
                        <p class="paragraf-info">{{ __('home.about_feature3_desc') }}</p><br>
                    </div>
                </div>
                <div class="bosluk1"></div>
                <a href="javascript:void(0)" onclick="openContactPanel()" class="custom-button wow fadeInUp" data-wow-delay="1.3s">{{ __('home.btn_contact') }}</a>
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
                        <div class="icon"><i class="flaticon-clipboard"></i></div>
                        <h2 class="h2-baslik-hizmetler-2 wow fadeInRight" data-wow-delay="0.4s">{{ __('home.how_title') }}</h2>
                        <p class="h2-baslik-hizmetler-2__paragraf wow fadeInUp" data-wow-delay="0.5s">{{ __('home.how_subtitle') }}</p>
                    </div>
                </div>
            </div>
            <div class="bosluk3"></div>
            <div class="row">
                @for($i = 1; $i <= 4; $i++)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.4 + $i * 0.1 }}s">
                    <div class="step-box">
                        <div class="step-number">{{ $i }}</div>
                        <h4>{{ __('home.step'.$i.'_title') }}</h4>
                        <p>{{ __('home.step'.$i.'_desc') }}</p>
                    </div>
                </div>
                @endfor
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
                    <h2 class="h2-baslik-hizmetler-2 wow fadeInRight" data-wow-delay="0.4s">{{ __('home.reviews_title') }}</h2>
                    <p class="h2-baslik-hizmetler-2__paragraf wow fadeInUp" data-wow-delay="0.5s" style="margin-bottom: 0px;">{{ __('home.reviews_subtitle') }}</p>
                    <div class="bosluk3"></div>
                </div>
            </div>
            <div class="row">
                @for($i = 1; $i <= 5; $i++)
                <div class="col-lg-4 col-md-6 {{ $i > 3 ? 'col-lg-6' : '' }} wow fadeInUp" data-wow-delay="{{ 0.4 + $i * 0.1 }}s">
                    <div class="review-card">
                        <div class="review-card__stars">★★★★★</div>
                        <p class="review-card__text">"{{ __('home.review'.$i.'_text') }}"</p>
                        <div class="review-card__author">
                            <strong>{{ __('home.review'.$i.'_name') }}</strong>
                            <span class="review-card__service">{{ __('home.review'.$i.'_service') }}</span>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
            <div class="row">
                <div class="col-12 text-center mt-4 wow fadeInUp" data-wow-delay="0.9s">
                    <a href="https://www.google.com/search?sca_esv=8507e84e939e1a00&authuser=0&hl=ru&gl=ee&sxsrf=ANbL-n60u1wP_3NoOXrAhrsS9HUx78PZZQ:1771162270158&si=AL3DRZEsmMGCryMMFSHJ3StBhOdZ2-6yYkXd_doETEE1OR-qOYsjGpLq_LQ6lWlPWQ4uJy5xghM61rI3NtV4BfLYGd18O7BpLARczwPDzLY3xuQ4dxC21MrZnn_Bdcbh90FkyUrxE3yQjL46OREAQhWf7lfWpIf8tg%3D%3D&q=Coral+Clean+%D0%9E%D1%82%D0%B7%D1%8B%D0%B2%D1%8B&sa=X&ved=2ahUKEwiO787PzduSAxXOORAIHZptF-cQ0bkNegQIMRAH&cshid=1771162304560494&biw=1600&bih=689&dpr=1.2" target="_blank" class="google-review-btn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" style="margin-right: 8px; vertical-align: middle;">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                        </svg>
                        {{ __('home.reviews_google_btn') }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- PORTFOLIO SECTION -->
    <div class="bosluk4"></div>
    <section class="portfolio-section" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.3s">
                    <div class="icon"><i class="flaticon-clean"></i></div>
                    <h2 class="h2-baslik-hizmetler-2 wow fadeInRight" data-wow-delay="0.4s">{{ __('home.portfolio_title') }}</h2>
                    <p class="h2-baslik-hizmetler-2__paragraf wow fadeInUp" style="margin-bottom: 0px;" data-wow-delay="0.5s">{{ __('home.portfolio_subtitle') }}</p>
                    <div class="bosluk3"></div>
                </div>
            </div>
            <div class="row">
                @php
                $portfolioItems = [
                    ['before' => '1.holodolnik_do.png', 'after' => '1.holodolnik_posle.png'],
                    ['before' => '2.duhovka_do.png',    'after' => '2.duhovka_posle.png'],
                    ['before' => '3.rakovina_do.png',   'after' => '3.rakovina_posle.png'],
                    ['before' => '4.kuhnja_do.png',     'after' => '4.kuhnja_posle.png'],
                    ['before' => '5.plita_do.png',      'after' => '5.plita_posle.png'],
                    ['before' => '6.tualet_do.png',     'after' => '6.tualet_posle.png'],
                    ['before' => '7.dush_do.png',       'after' => '7.dush_posle.png'],
                    ['before' => '8.duhovka_do.png',    'after' => '8.duhovka_posle.png'],
                    ['before' => '9.vytjazka_do.png',   'after' => '9.vytjazka_posle.png'],
                ];
                @endphp
                @foreach($portfolioItems as $i => $item)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.3 + $i * 0.08 }}s">
                    <a href="{{ asset('img/coralclean/portfolio/' . $item['after']) }}" data-fancybox="portfolio" data-caption="{{ __('home.portfolio_after') }} {{ $i + 1 }}" style="text-decoration: none; color: inherit; display: block;">
                        <div class="portfolio-flip">
                            <div class="portfolio-flip__inner">
                                <div class="portfolio-flip__front">
                                    <img src="{{ asset('img/coralclean/portfolio/' . $item['after']) }}" alt="{{ __('home.portfolio_after') }} {{ $i + 1 }}" loading="lazy">
                                    <div class="portfolio-flip__badge portfolio-flip__badge--after">{{ __('home.portfolio_after') }}</div>
                                </div>
                                <div class="portfolio-flip__back">
                                    <img src="{{ asset('img/coralclean/portfolio/' . $item['before']) }}" alt="{{ __('home.portfolio_before') }} {{ $i + 1 }}" loading="lazy">
                                    <div class="portfolio-flip__badge portfolio-flip__badge--before">{{ __('home.portfolio_before') }}</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ asset('img/coralclean/portfolio/' . $item['before']) }}" data-fancybox="portfolio" data-caption="{{ __('home.portfolio_before') }} {{ $i + 1 }}" style="display: none;"></a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- WHY CORALCLEAN SECTION -->
    <div class="bosluk4"></div>
    <section class="ozellika" data-background="#f6f7f8" style="background: #f6f7f8;" id="why-coralclean">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="wow fadeInUp" data-wow-delay="0.3s">
                        <div class="boslukalt"></div>
                        <div class="icon"><i class="flaticon-handshake"></i></div>
                        <h2 class="h2-baslik-hizmetler-2 wow fadeInRight" data-wow-delay="0.4s">{{ __('home.why_title') }}</h2>
                        <p class="h2-baslik-hizmetler-2__paragraf wow fadeInUp" style="margin-bottom: 0px" data-wow-delay="0.5s">{{ __('home.why_subtitle') }}</p>
                    </div>
                </div>
            </div>
            <div class="bosluk3"></div>
            <div class="row">
                @php
                $whyCards = [
                    ['icon' => 'flaticon-clipboard', 'key' => 'why_card1'],
                    ['icon' => 'flaticon-money', 'key' => 'why_card2'],
                    ['icon' => 'flaticon-team-1', 'key' => 'why_card3'],
                    ['icon' => 'flaticon-shield', 'key' => 'why_card4'],
                    ['icon' => 'flaticon-medal', 'key' => 'why_card5'],
                    ['icon' => 'flaticon-stopwatch', 'key' => 'why_card6'],
                ];
                @endphp
                @foreach($whyCards as $i => $card)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.3 + $i * 0.08 }}s">
                    <div class="why-card">
                        <div class="why-card__icon"><i class="{{ $card['icon'] }}"></i></div>
                        <h4 class="why-card__title">{{ __('home.' . $card['key'] . '_title') }}</h4>
                        <p class="why-card__text">{{ __('home.' . $card['key'] . '_desc') }}</p>
                    </div>
                </div>
                @endforeach
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
                    <h2 class="h2-baslik-hizmetler-2 wow fadeInUp" data-wow-delay="0.5s">{{ __('home.trust_title') }}</h2>
                    <p class="h2-baslik-hizmetler-2__paragraf wow fadeInUp" data-wow-delay="0.6s">{{ __('home.trust_subtitle') }}</p>
                    <div class="bosluk3"></div>
                </div>
            </div>
            <div class="row">
                @php $trustIcons = ['flaticon-location', 'flaticon-team-1', 'flaticon-badge', 'flaticon-shield', 'flaticon-calendar', 'flaticon-review']; @endphp
                @for($i = 1; $i <= 6; $i++)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.4 + $i * 0.1 }}s">
                    <div class="trust-card">
                        <div class="icon"><i class="{{ $trustIcons[$i-1] }}"></i></div>
                        <h4>{{ __('home.trust'.$i.'_title') }}</h4>
                        <p>{{ __('home.trust'.$i.'_desc') }}</p>
                    </div>
                </div>
                @endfor
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
                        <h2 class="h2-baslik-hizmetler-2 wow fadeInRight" data-wow-delay="0.4s">{{ __('home.faq_title') }}</h2>
                    </div>
                </div>
            </div>
            <div class="bosluk3"></div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @for($i = 1; $i <= 7; $i++)
                    <div class="faq-item wow fadeInUp" data-wow-delay="{{ 0.4 + $i * 0.1 }}s">
                        <div class="faq-question">
                            <span>{{ __('home.faq'.$i.'_q') }}</span>
                            <span class="faq-icon">▼</span>
                        </div>
                        <div class="faq-answer">
                            <p>{{ __('home.faq'.$i.'_a') }}</p>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
        <div class="boslukalt"></div>
    </section>

    <!-- CTA SECTION -->
    <section class="cta-section">
        <div class="container">
            <h2 class="wow fadeInUp" data-wow-delay="0.3s">{{ __('home.cta_title') }}</h2>
            <p class="wow fadeInUp text-center" data-wow-delay="0.4s">{{ __('home.cta_subtitle') }}</p>
            <div class="wow fadeInUp" data-wow-delay="0.5s">
                <a href="javascript:void(0)" onclick="openContactPanel()" class="cta-btn">{{ __('home.btn_leave_request') }} →</a>
                <a href="{{ $contact->whatsapp ?? 'https://wa.me/37258301348' }}" class="cta-btn secondary" target="_blank">WhatsApp →</a>
                <a href="{{ $contact->messenger ?? 'https://m.me/coralclean.ee' }}" class="cta-btn secondary" target="_blank" style="background: #0084FF;">Messenger →</a>
            </div>
        </div>
    </section>

    <!-- STATISTICS -->
    <section class="content-section" data-background="#fafafa">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 wow fadeInLeft" data-wow-delay="0.6s">
                    <div class="icon"><i class="flaticon-handshake"></i></div>
                    <div class="counter-box wow fade"><span class="odometer" data-count="2500" data-status="yes">0</span><h6>{{ __('home.stat1') }}</h6></div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInLeft" data-wow-delay="0.7s">
                    <div class="icon"><i class="flaticon-group"></i></div>
                    <div class="counter-box wow fade"><span class="odometer" data-count="450" data-status="yes">0</span><h6>{{ __('home.stat2') }}</h6></div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInRight" data-wow-delay="0.8s">
                    <div class="icon"><i class="flaticon-insurance"></i></div>
                    <div class="counter-box wow fade"><span class="odometer" data-count="500" data-status="yes">0</span><h6>{{ __('home.stat3') }}</h6></div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInRight" data-wow-delay="0.9s">
                    <div class="icon"><i class="flaticon-review"></i></div>
                    <div class="counter-box wow fade"><span class="odometer" data-count="15" data-status="yes">0</span><h6>{{ __('home.stat4') }}</h6></div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')

    <!-- FLOATING ACTION BUTTONS -->
    <div class="floating-buttons">
        <a href="{{ $contact->whatsapp ?? 'https://wa.me/37258301348' }}" target="_blank" class="floating-btn floating-btn--whatsapp" title="{{ __('home.float_whatsapp') }}" aria-label="WhatsApp">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="white"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        </a>
        <a href="{{ $contact->messenger ?? 'https://m.me/coralclean.ee' }}" target="_blank" class="floating-btn floating-btn--messenger" title="Messenger" aria-label="Messenger">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="white"><path d="M12 2C6.477 2 2 6.145 2 11.243c0 2.895 1.45 5.479 3.715 7.162V22l3.48-1.908c.93.256 1.915.393 2.932.393 5.523 0 10-4.145 10-9.242C22 6.145 17.523 2 12 2zm.993 12.416l-2.558-2.73-4.993 2.73 5.491-5.833 2.622 2.73 4.928-2.73-5.49 5.833z"/></svg>
        </a>
        <a href="tel:{{ $contact->phone_clean ?? '+37258301348' }}" class="floating-btn floating-btn--call" title="{{ __('home.float_call') }}" aria-label="Call">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="white"><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56-.35-.12-.74-.03-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/></svg>
        </a>
    </div>

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
    <script src="{{ asset('js/contact-form.js') }}"></script>

    <script>
        // FAQ Toggle
        document.querySelectorAll('.faq-question').forEach(function(question) {
            question.addEventListener('click', function() {
                this.parentElement.classList.toggle('active');
            });
        });

        if (typeof init_pointer === 'function') { init_pointer({}); }

        // Portfolio Fancybox
        if (typeof Fancybox !== 'undefined') {
            Fancybox.bind('[data-fancybox="portfolio"]', {
                Thumbs: { type: 'classic' },
                Toolbar: {
                    display: { left: [], middle: [], right: ['close'] }
                }
            });
        }

        // Contact Panel Functions
        function openContactPanel(serviceType) {
            document.getElementById('contactPanel').classList.add('open');
            document.getElementById('contactOverlay').classList.add('open');
            document.body.style.overflow = 'hidden';
            
            // Pre-select service if provided
            if (serviceType) {
                const serviceSelect = document.querySelector('select[name="service_type"]');
                if (serviceSelect) {
                    serviceSelect.value = serviceType;
                }
            }
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
