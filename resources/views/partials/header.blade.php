<!-- Header Navigation -->
<header class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('home', ['locale' => app()->getLocale()]) }}">
            <img src="{{ asset('img/logo.png') }}" alt="CoralClean" height="50">
        </a>
        
        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Navigation -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto me-3">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home', ['locale' => app()->getLocale()]) }}#packages">
                        {{ __('home.nav_services') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home', ['locale' => app()->getLocale()]) }}#process">
                        {{ __('home.nav_how') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home', ['locale' => app()->getLocale()]) }}#faq">
                        {{ __('home.nav_faq') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home', ['locale' => app()->getLocale()]) }}#contacts">
                        {{ __('home.nav_contacts') }}
                    </a>
                </li>
            </ul>
            
            <!-- Language Switcher -->
            <div class="cc-lang-switcher--header">
                <ul>
                    @foreach(['ru', 'en', 'et'] as $lang)
                        <li class="{{ app()->getLocale() === $lang ? 'current-lang' : '' }}">
                            <a href="{{ route('home', ['locale' => $lang]) }}">{{ strtoupper($lang) }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            
            <!-- CTA Button -->
            <a href="tel:+3725830148" class="custom-button ms-3">
                <i class="fas fa-phone"></i> {{ __('home.btn_call') }}
            </a>
        </div>
    </div>
</header>

<!-- Spacer for fixed header -->
<div style="height: 80px;"></div>
