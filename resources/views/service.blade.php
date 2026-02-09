<!DOCTYPE html>
<html lang="{{ $locale }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('home.service_' . $serviceKey . '_title') }} — CoralClean | Tallinn</title>
    <meta name="description" content="{{ __('home.service_' . $serviceKey . '_desc') }}">
    <meta name="robots" content="index, follow, max-image-preview:large">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ __('home.service_' . $serviceKey . '_title') }} — CoralClean">
    <meta property="og:description" content="{{ __('home.service_' . $serviceKey . '_desc') }}">
    <meta property="og:url" content="{{ url('/' . $locale . '/services/' . $slug) }}">
    <meta property="og:image" content="{{ asset('img/' . __('home.service_' . $serviceKey . '_image')) }}">
    <meta property="og:site_name" content="CoralClean">
    <meta property="og:locale" content="{{ $locale == 'et' ? 'et_EE' : ($locale == 'en' ? 'en_US' : 'ru_RU') }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ __('home.service_' . $serviceKey . '_title') }} — CoralClean">
    <meta name="twitter:description" content="{{ __('home.service_' . $serviceKey . '_desc') }}">
    <meta name="twitter:image" content="{{ asset('img/' . __('home.service_' . $serviceKey . '_image')) }}">

    <!-- hreflang -->
    <link rel="alternate" hreflang="ru" href="{{ url('/ru/services/' . $slug) }}" />
    <link rel="alternate" hreflang="en" href="{{ url('/en/services/' . $slug) }}" />
    <link rel="alternate" hreflang="et" href="{{ url('/et/services/' . $slug) }}" />
    <link rel="alternate" hreflang="x-default" href="{{ url('/et/services/' . $slug) }}" />
    <link rel="canonical" href="{{ url('/' . $locale . '/services/' . $slug) }}" />

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

    $schemaService = json_encode([
        $ctx => 'https://schema.org',
        $typ => 'Service',
        'name' => __('home.service_' . $serviceKey . '_title'),
        'description' => __('home.service_' . $serviceKey . '_desc'),
        'provider' => [
            $typ => 'LocalBusiness',
            'name' => 'CoralClean',
            'legalName' => 'PUHASTUS KORAL OÜ',
            'telephone' => '+37258301348',
            'email' => 'info@coralclean.ee',
            'address' => [
                $typ => 'PostalAddress',
                'addressLocality' => 'Tallinn',
                'addressRegion' => 'Harjumaa',
                'addressCountry' => 'EE',
            ],
        ],
        'areaServed' => [$typ => 'City', 'name' => 'Tallinn'],
        'image' => asset('img/' . __('home.service_' . $serviceKey . '_image')),
        'url' => url('/' . $locale . '/services/' . $slug),
    ], $jsonFlags);

    $schemaBreadcrumb = json_encode([
        $ctx => 'https://schema.org',
        $typ => 'BreadcrumbList',
        'itemListElement' => [
            [$typ => 'ListItem', 'position' => 1, 'name' => __('home.nav_home'), 'item' => url('/' . $locale)],
            [$typ => 'ListItem', 'position' => 2, 'name' => __('home.service_' . $serviceKey . '_title'), 'item' => url('/' . $locale . '/services/' . $slug)],
        ],
    ], $jsonFlags);
    @endphp

    <!-- Schema.org Service -->
    <script type="application/ld+json">{!! $schemaService !!}</script>

    <!-- BreadcrumbList Schema -->
    <script type="application/ld+json">{!! $schemaBreadcrumb !!}</script>
</head>
<body>

    <!-- Preloader -->
    <div class="preloader">
        <figure><img src="{{ asset('img/ChatGPT-Image-Feb-2-2026-12_00_36-AM.png') }}" alt="CoralClean"></figure>
    </div>
    <div class="page-transition"></div>

    <!-- Side Widget (Mobile) -->
    <aside class="side-widget">
        <div class="inner">
            <div class="logo"><a href="{{ url('/' . $locale) }}"><img src="{{ asset('img/ChatGPT-Image-Feb-1-2026-02_13_45-PM.png') }}" alt="CoralClean"></a></div>
            <div class="hide-mobile">
                <div class="or"><h2 class="h2-baslik-hizmetler-2">{{ __('home.nav_contacts') }}</h2></div>
                <div class="bosluksv"></div>
                <div class="iconsv"><i class="flaticon-call"></i></div>
                <address class="address">
                    +372 5830 1348
                    <div class="bosluksv"></div>
                    <div class="iconsv"><i class="flaticon-email"></i></div>
                    info@coralclean.ee
                    <div class="bosluksv"></div>
                    <div class="iconsv"><i class="flaticon-location"></i></div>
                    {{ __('home.footer_location') }}
                </address>
            </div>
            <div class="show-mobile">
                <div class="site-menu">
                    <ul id="mobile-menu" style="list-style: none; padding: 0; margin: 20px 0;">
                        <li style="margin: 15px 0;"><a href="{{ url('/' . $locale) }}" style="color: #333; text-decoration: none; font-size: 18px;">{{ __('home.nav_home') }}</a></li>
                        @foreach($services as $svc)
                        @php $sKey = str_replace('-', '_', str_replace('-cleaning', '', $svc)); @endphp
                        <li style="margin: 15px 0;"><a href="{{ url('/' . $locale . '/services/' . $svc) }}" style="color: {{ $slug === $svc ? '#2ec4c6' : '#333' }}; text-decoration: none; font-size: 18px;">{{ __('home.service_' . $sKey . '_title') }}</a></li>
                        @endforeach
                    </ul>
                    <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd;">
                        <div style="display: flex; gap: 15px; justify-content: center; align-items: center;">
                            <a href="{{ url('/ru/services/' . $slug) }}" style="color: {{ $locale == 'ru' ? '#2ec4c6' : '#666' }}; font-weight: {{ $locale == 'ru' ? 'bold' : 'normal' }}; text-decoration: none; font-size: 16px;">🇷🇺 RU</a>
                            <span style="color: #ccc;">|</span>
                            <a href="{{ url('/en/services/' . $slug) }}" style="color: {{ $locale == 'en' ? '#2ec4c6' : '#666' }}; font-weight: {{ $locale == 'en' ? 'bold' : 'normal' }}; text-decoration: none; font-size: 16px;">🇬🇧 EN</a>
                            <span style="color: #ccc;">|</span>
                            <a href="{{ url('/et/services/' . $slug) }}" style="color: {{ $locale == 'et' ? '#2ec4c6' : '#666' }}; font-weight: {{ $locale == 'et' ? 'bold' : 'normal' }}; text-decoration: none; font-size: 16px;">🇪🇪 ET</a>
                        </div>
                    </div>
                </div>
            </div>
            <small>© 2026 CoralClean</small>
        </div>
    </aside>

    @include('partials.header')

    <!-- SLIDE-IN CONTACT FORM PANEL (Right Side) -->
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
                        <select name="service_type" class="form-popup__input">
                            <option value="">{{ __('home.form_select_service') }}</option>
                            @foreach($services as $svc)
                            @php $sKey = str_replace('-', '_', str_replace('-cleaning', '', $svc)); @endphp
                            <option value="{{ $svc }}" {{ $slug === $svc ? 'selected' : '' }}>{{ __('home.service_' . $sKey . '_title') }}</option>
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
            </div>
        </div>
    </aside>
    <div class="contact-panel-overlay" id="contactOverlay" onclick="closeContactPanel()"></div>

    <!-- PAGE HEADER / BREADCRUMBS -->
    <header class="page-header wow fadeInUp" data-wow-delay="0.5s" style="background-image: url('{{ asset('img/' . __('home.service_' . $serviceKey . '_image')) }}'); background-size: cover; background-position: center;">
        <div class="container">
            <h2>{{ __('home.service_' . $serviceKey . '_title') }}</h2>
            <div class="bosluk3"></div>
            <p>
                <a href="{{ url('/' . $locale) }}" class="headerbreadcrumb">{{ __('home.nav_home') }}</a>
                <i class="flaticon-right-chevron"></i>
                {{ __('home.service_' . $serviceKey . '_title') }}
            </p>
        </div>
    </header>

    <!-- SERVICE CONTENT -->
    <main>
        <section class="hizmetlerr-bolumu">
            <div class="h-yazi-ozel h-yazi-margin-ozel"></div>
            <div class="container">
                <div class="row">
                    <!-- LEFT SIDEBAR -->
                    <div class="col-lg-4">
                        <!-- Service Navigation Menu -->
                        <div class="sidebar-service wow fadeInLeft" data-wow-delay="0.8s">
                            @foreach($services as $svc)
                            @php $sKey = str_replace('-', '_', str_replace('-cleaning', '', $svc)); @endphp
                            <span class="menu-service {{ $slug === $svc ? 'menuactive' : '' }}">
                                <a href="{{ url('/' . $locale . '/services/' . $svc) }}">
                                    <i class="flaticon-right-chevron"></i> {{ __('home.service_' . $sKey . '_title') }}
                                </a>
                            </span>
                            @endforeach
                        </div>

                        <div class="bosluk3"></div>

                        <!-- Sidebar Contact Form -->
                        <div class="callbackform wow fadeInUp" data-wow-delay="0.7s">
                            <h2 class="h2-baslik-popup h-yazi-margin-kucuk"><br>{{ __('home.form_panel_title') }}</h2>
                            <p class="paragraf-popup">{{ __('home.form_panel_subtitle') }}</p>
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
                                    <select name="service_type" class="form-popup__input">
                                        <option value="">{{ __('home.form_select_service') }}</option>
                                        @foreach($services as $svc)
                                        @php $sKey = str_replace('-', '_', str_replace('-cleaning', '', $svc)); @endphp
                                        <option value="{{ $svc }}" {{ $slug === $svc ? 'selected' : '' }}>{{ __('home.service_' . $sKey . '_title') }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-popup__grup">
                                    <input type="date" name="preferred_date" class="form-popup__input" placeholder="{{ __('home.form_preferred_date') }}">
                                </div>
                                <div class="form-popup__grup">
                                    <div class="or">
                                        <input type="submit" class="custom-button12 mb-5" value="{{ __('home.form_submit') }}">
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

                    <!-- RIGHT CONTENT -->
                    <div class="col-lg-8">
                        <div class="bosluk333"></div>

                        <div class="bosluk3"></div>

                        <!-- Service Title -->
                        <h2 class="h2-baslik-anasayfa-ozel wow fade">{{ __('home.service_' . $serviceKey . '_title') }}</h2>
                        <div class="bosluk333"></div>

                        <!-- Service Description Paragraphs -->
                        <p class="paragraf wow fade" data-wow-delay="0.5s">{{ __('home.service_' . $serviceKey . '_text1') }}</p>
                        <div class="bosluk1"></div>

                        <img class="divider" src="{{ asset('img/divider.jpg') }}" alt="divider" loading="lazy">
                        <div class="bosluk1"></div>

                        <p class="paragraf wow fade" data-wow-delay="0.6s">{{ __('home.service_' . $serviceKey . '_text2') }}</p>
                        <div class="bosluk3"></div>

                        <!-- Reliability / Loyalty Flip Cards -->
                        <div class="tabloozellik">
                            <div class="tablo--1-ve-2">
                                <div class="paketler4 wow fadeInLeft" data-wow-delay="0.7s">
                                    <div class="paketler4__on paketler4__on--onyazi">
                                        <div class="paketler4__icerik">
                                            <div class="icon"><i class="flaticon-medal"></i></div>
                                            <h3 class="baslik-3">{{ __('home.reliability_title') }}</h3>
                                        </div>
                                    </div>
                                    <div class="paketler4__on paketler4__on--arkayazi paketler4__on--arkayazi-1">
                                        <div class="paketler4__pr">
                                            <div class="paketler4__pr-kutu">
                                                <h3 class="baslik-orta">{{ __('home.reliability_title') }}</h3>
                                                <p class="services-kutu2--yazi1">{{ __('home.reliability_desc') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tablo--1-ve-2">
                                <div class="paketler4 wow fadeInRight" data-wow-delay="0.8s">
                                    <div class="paketler4__on paketler4__on--onyazi">
                                        <div class="paketler4__icerik">
                                            <div class="icon"><i class="flaticon-badge"></i></div>
                                            <h3 class="baslik-3">{{ __('home.loyalty_title') }}</h3>
                                        </div>
                                    </div>
                                    <div class="paketler4__on paketler4__on--arkayazi paketler4__on--arkayazi-1">
                                        <div class="paketler4__pr">
                                            <div class="paketler4__pr-kutu">
                                                <h3 class="baslik-orta">{{ __('home.loyalty_title') }}</h3>
                                                <p class="services-kutu2--yazi1">{{ __('home.loyalty_desc') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bosluk3"></div>

                        <!-- CTA to contact -->
                        <div class="text-center wow fadeInUp" data-wow-delay="0.9s">
                            <a href="javascript:void(0)" onclick="openContactPanel()" class="custom-button">{{ __('home.btn_order') }}</a>
                            <a href="https://wa.me/37258301348?text={{ urlencode(__('home.service_' . $serviceKey . '_title')) }}" target="_blank" class="custom-button" style="background: #25D366; margin-left: 10px;">WhatsApp</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Floating Action Buttons -->
    <div class="floating-buttons">
        <a href="https://wa.me/37258301348" target="_blank" class="floating-btn floating-btn--whatsapp" aria-label="{{ __('home.float_whatsapp') }}">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="white"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        </a>
        <a href="tel:+37258301348" class="floating-btn floating-btn--call" aria-label="{{ __('home.float_call') }}">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="white"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
        </a>
    </div>

    @include('partials.footer')

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

    <script>
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

        if (typeof init_pointer === 'function') { init_pointer({}); }
    </script>
</body>
</html>
