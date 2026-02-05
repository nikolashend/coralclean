<!DOCTYPE html>
<html lang="{{ $locale }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('home.service_' . $serviceKey . '_title') }} — CoralClean</title>
    <meta name="description" content="{{ __('home.service_' . $serviceKey . '_desc') }}">

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

    @include('partials.styles')
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
                    info@@coralclean.ee
                    <div class="bosluksv"></div>
                    <div class="iconsv"><i class="flaticon-location"></i></div>
                    {{ __('home.footer_location') }}
                </address>
            </div>
            <div class="show-mobile">
                <div class="site-menu">
                    <ul id="mobile-menu" style="list-style: none; padding: 0; margin: 20px 0;">
                        <li style="margin: 15px 0;"><a href="{{ url('/' . $locale) }}" style="color: #333; text-decoration: none; font-size: 18px;">{{ $locale == 'en' ? 'Home' : ($locale == 'et' ? 'Avaleht' : 'Главная') }}</a></li>
                        @foreach($services as $svc)
                        @php $sKey = str_replace('-', '_', str_replace('-cleaning', '', $svc)); @endphp
                        <li style="margin: 15px 0;"><a href="{{ url('/' . $locale . '/services/' . $svc) }}" style="color: {{ $slug === $svc ? '#2ec4c6' : '#333' }}; text-decoration: none; font-size: 18px;">{{ __('home.service_' . $sKey . '_title') }}</a></li>
                        @endforeach
                    </ul>
                    <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd;">
                        <div style="display: flex; gap: 15px; justify-content: center; align-items: center;">
                            <a href="{{ url('/ru/services/' . $slug) }}" style="color: {{ $locale == 'ru' ? '#25aae2' : '#666' }}; font-weight: {{ $locale == 'ru' ? 'bold' : 'normal' }}; text-decoration: none; font-size: 16px;">🇷🇺 RU</a>
                            <span style="color: #ccc;">|</span>
                            <a href="{{ url('/en/services/' . $slug) }}" style="color: {{ $locale == 'en' ? '#25aae2' : '#666' }}; font-weight: {{ $locale == 'en' ? 'bold' : 'normal' }}; text-decoration: none; font-size: 16px;">🇬🇧 EN</a>
                            <span style="color: #ccc;">|</span>
                            <a href="{{ url('/et/services/' . $slug) }}" style="color: {{ $locale == 'et' ? '#25aae2' : '#666' }}; font-weight: {{ $locale == 'et' ? 'bold' : 'normal' }}; text-decoration: none; font-size: 16px;">🇪🇪 ET</a>
                        </div>
                    </div>
                </div>
            </div>
            <small>© 2026 CoralClean</small>
        </div>
    </aside>

    @include('partials.header')    <!-- SLIDE-IN CONTACT FORM PANEL (Right Side) -->
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
                        <input type="email" name="email" class="form-popup__input" placeholder="{{ __('home.form_email') }}">
                    </div>
                    <div class="form-popup__grup">
                        <input type="tel" name="phone" class="form-popup__input" placeholder="{{ __('home.form_phone') }}" required>
                    </div>
                    <div class="form-popup__grup">
                        <div class="or">
                            <input type="submit" class="custom-button12" value="{{ __('home.form_submit') }}">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </aside>
    <div class="contact-panel-overlay" id="contactOverlay" onclick="closeContactPanel()"></div>

    <!-- PAGE HEADER / BREADCRUMBS -->
    <header class="page-header wow fadeInUp" data-wow-delay="0.5s" data-background="{{ asset('img/page-header-cleaningo.jpg') }}">
        <div class="container">
            <h2>{{ __('home.service_' . $serviceKey . '_title') }}</h2>
            <div class="bosluk3"></div>
            <p>
                <a href="{{ url('/' . $locale) }}" class="headerbreadcrumb">{{ $locale == 'en' ? 'Home' : ($locale == 'et' ? 'Avaleht' : 'Главная') }}</a>
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
                                    <input type="email" name="email" class="form-popup__input" placeholder="{{ __('home.form_email') }}">
                                </div>
                                <div class="form-popup__grup">
                                    <input type="tel" name="phone" class="form-popup__input" placeholder="{{ __('home.form_phone') }}" required>
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
                        </div>
                    </div>

                    <!-- RIGHT CONTENT -->
                    <div class="col-lg-8">
                        <div class="bosluk333"></div>
                        <!-- Service Hero Image -->
                        <div class="galeri wow fadeInRight" data-wow-delay="0.7s">
                            <img src="{{ asset('img/' . __('home.service_' . $serviceKey . '_image')) }}" class="galeri__gorsel galeri__gorsel--3" alt="{{ __('home.service_' . $serviceKey . '_title') }}">
                        </div>

                        <div class="bosluk3"></div>

                        <!-- Service Title -->
                        <h2 class="h2-baslik-anasayfa-ozel wow fade">{{ __('home.service_' . $serviceKey . '_title') }}</h2>
                        <div class="bosluk333"></div>

                        <!-- Service Description Paragraphs -->
                        <p class="paragraf wow fade" data-wow-delay="0.5s">{{ __('home.service_' . $serviceKey . '_text1') }}</p>
                        <div class="bosluk1"></div>

                        <img class="divider" src="{{ asset('img/divider.jpg') }}" alt="divider">
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
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4">
                    <div class="logo wow animated fadeInUp" data-wow-delay="0.5s">
                        <img src="{{ asset('img/logo-footer-cleaningo.png') }}" alt="CoralClean">
                    </div>
                    <div class="footer-info wow animated fadeInUp" data-wow-delay="0.5s">
                        <p>{{ __('home.footer_description') }}</p>
                        <br>
                        <p><i class="flaticon-pin iconpfooter1"></i>&nbsp;&nbsp;{{ __('home.footer_location') }}</p>
                        <p class="fic"><i class="flaticon-call iconpfooter2"></i>&nbsp;&nbsp;&nbsp;<a href="tel:+37258301348">+372 5830 1348</a></p><br>
                        <p><i class="flaticon-email iconpfooter3"></i>&nbsp;&nbsp;&nbsp;<a href="mailto:info@coralclean.ee">info@@coralclean.ee</a></p><br>
                        <p><i class="flaticon-time iconpfooter3"></i>&nbsp;&nbsp;&nbsp;{{ __('home.footer_hours') }}</p>
                    </div>
                    <ul class="footer-social wow animated fadeInUp" data-wow-delay="0.5s">
                        <li><a href="#"><i class="icon-social-facebook iconsociaf"></i></a></li>
                        <li><a href="#"><i class="icon-social-instagram iconsociaf"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-4 offset-xl-1 col-sm-6 wow animated fadeInUp" data-wow-delay="0.5s">
                    <h6 class="widget-title">{{ __('home.footer_services_title') }}</h6>
                    <div class="footer-menu">
                        <ul class="menu">
                            @foreach($services as $svc)
                            @php $sKey = str_replace('-', '_', str_replace('-cleaning', '', $svc)); @endphp
                            <li><a href="{{ url('/' . $locale . '/services/' . $svc) }}">{{ __('home.service_' . $sKey . '_title') }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow animated fadeInUp" data-wow-delay="0.5s">
                    <h6 class="widget-title">{{ $locale == 'en' ? 'Quick Links' : ($locale == 'et' ? 'Kiirlingid' : 'Быстрые ссылки') }}</h6>
                    <div class="footer-menu">
                        <ul class="menu">
                            <li><a href="{{ url('/' . $locale) }}">{{ $locale == 'en' ? 'Home' : ($locale == 'et' ? 'Avaleht' : 'Главная') }}</a></li>
                            <li><a href="{{ url('/' . $locale . '/#packages') }}">{{ $locale == 'en' ? 'Packages' : ($locale == 'et' ? 'Paketid' : 'Пакеты') }}</a></li>
                            <li><a href="{{ url('/' . $locale . '/#faq') }}">FAQ</a></li>
                            <li><a href="javascript:void(0)" onclick="openContactPanel()">{{ __('home.nav_contacts') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="copyright">
                        © 2026 CoralClean. {{ $locale == 'en' ? 'All rights reserved.' : ($locale == 'et' ? 'Kõik õigused kaitstud.' : 'Все права защищены.') }}<br>
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
