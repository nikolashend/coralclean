<!-- Navigation -->
<nav class="navbar navbar-expand-xl navbar-light bg-light">
    <div class="container">
        <div class="logo"><a href="{{ url('/' . $locale) }}"><img src="{{ asset('img/coralclean/logo1.png') }}?v={{ filemtime(public_path('img/coralclean/logo1.png')) }}" alt="CoralClean"></a></div>
        <div class="site-menu">
            <div class="menueffect">
                <div id="bs-example-navbar-collapse-2" class="collapse navbar-collapse">
                    <ul id="menu-main-menu" class="nav navbar-nav">
                        <li class="menu-item nav-item {{ Request::is($locale) || Request::is('/') ? 'active' : '' }}"><a href="{{ url('/' . $locale) }}" class="nav-link"><span>{{ __('home.nav_home') }}</span></a></li>
                        <li class="menu-item nav-item"><a href="{{ url('/' . $locale . '/#about') }}" class="nav-link"><span>{{ __('home.nav_about') }}</span></a></li>
                        <li class="menu-item menu-item-has-children dropdown nav-item">
                            <a href="{{ url('/' . $locale . '/#services') }}" data-toggle="dropdown" class="dropdown-toggle nav-link"><span>{{ __('home.nav_services') }}</span></a>
                            <ul class="dropdown-menu">
                                <li class="menu-item nav-item"><a href="{{ url('/' . $locale . '/services/home-cleaning') }}" class="dropdown-item"><span>{{ __('home.service_home_title') }}</span></a></li>
                                <li class="menu-item nav-item"><a href="{{ url('/' . $locale . '/services/renovation-cleaning') }}" class="dropdown-item"><span>{{ __('home.service_renovation_title') }}</span></a></li>
                                <li class="menu-item nav-item"><a href="{{ url('/' . $locale . '/services/office-cleaning') }}" class="dropdown-item"><span>{{ __('home.service_office_title') }}</span></a></li>
                                <li class="menu-item nav-item"><a href="{{ url('/' . $locale . '/services/glass-cleaning') }}" class="dropdown-item"><span>{{ __('home.service_glass_title') }}</span></a></li>
                                <li class="menu-item nav-item"><a href="{{ url('/' . $locale . '/services/carpet-cleaning') }}" class="dropdown-item"><span>{{ __('home.service_carpet_title') }}</span></a></li>
                                <li class="menu-item nav-item"><a href="{{ url('/' . $locale . '/services/garden-cleaning') }}" class="dropdown-item"><span>{{ __('home.service_garden_title') }}</span></a></li>
                            </ul>
                        </li>
                        <li class="menu-item nav-item"><a href="{{ url('/' . $locale . '/#packages') }}" class="nav-link"><span>{{ __('home.nav_packages') }}</span></a></li>
                        <li class="menu-item nav-item"><a href="{{ url('/' . $locale . '/#faq') }}" class="nav-link"><span>{{ __('home.nav_faq') }}</span></a></li>
                        <li class="menu-item nav-item"><a href="javascript:void(0)" onclick="openContactPanel()" class="nav-link"><span>{{ __('home.nav_contacts') }}</span></a></li>
                        <li class="menu-item menu-item-has-children dropdown nav-item">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link" style="text-transform: uppercase;"><span>{{ strtoupper($locale ?? 'ru') }}</span></a>
                            <ul class="dropdown-menu">
                                <li class="menu-item nav-item"><a href="{{ url('/ru' . (isset($slug) ? '/services/' . $slug : '')) }}" class="dropdown-item"><span>Русский</span></a></li>
                                <li class="menu-item nav-item"><a href="{{ url('/et' . (isset($slug) ? '/services/' . $slug : '')) }}" class="dropdown-item"><span>Eesti</span></a></li>
                                <li class="menu-item nav-item"><a href="{{ url('/en' . (isset($slug) ? '/services/' . $slug : '')) }}" class="dropdown-item"><span>English</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="hamburger-menu"><span></span><span></span><span></span></div>
        <div class="navbar-button d-flex">
            <div class="navbar-contact-btn">
                <a href="javascript:void(0)" onclick="openContactPanel()" class="btn-contact-header">{{ __('home.btn_contact_us') }}</a>
            </div>
            <div class="telh"><i class="flaticon-call iconp"></i>&nbsp;&nbsp;&nbsp;+372 5830 1348</div>
        </div>
    </div>
</nav>

