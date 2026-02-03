<!-- Footer -->
<footer class="cc-footer">
    <div class="container">
        <div class="row">
            <!-- Brand Column -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="cc-footer-brand">
                    <img src="{{ asset('img/logo-white.png') }}" alt="CoralClean" class="cc-footer-brand__logo">
                    <p class="cc-footer-brand__text">{{ __('home.footer_about') }}</p>
                    <p class="cc-footer-legal">PUHASTUS KORAL OÜ<br>Reg. nr: 16882289</p>
                    
                    <!-- Social Links -->
                    <ul class="footer-social">
                        <li><a href="https://wa.me/3725830148" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                        <li><a href="https://instagram.com/coralclean.ee" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="https://facebook.com/coralclean.ee" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    </ul>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h6>{{ __('home.footer_links') }}</h6>
                <ul class="footer-menu">
                    <li><a href="#packages">{{ __('home.nav_services') }}</a></li>
                    <li><a href="#process">{{ __('home.nav_how') }}</a></li>
                    <li><a href="#faq">{{ __('home.nav_faq') }}</a></li>
                    <li><a href="#contacts">{{ __('home.nav_contacts') }}</a></li>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h6>{{ __('home.contacts_title') }}</h6>
                <ul class="footer-menu">
                    <li><i class="fas fa-phone me-2"></i> +372 5830 1348</li>
                    <li><i class="fas fa-clock me-2"></i> 08:00 - 20:00</li>
                    <li><i class="fas fa-map-marker-alt me-2"></i> {{ __('home.area_value') }}</li>
                </ul>
            </div>
            
            <!-- Language Switcher -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h6>{{ __('home.footer_language') }}</h6>
                <div class="cc-lang-switcher">
                    <ul>
                        @foreach(['ru' => 'Русский', 'en' => 'English', 'et' => 'Eesti'] as $code => $name)
                            <li class="{{ app()->getLocale() === $code ? 'current-lang' : '' }}">
                                <a href="{{ route('home', ['locale' => $code]) }}">{{ $name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Bottom Bar -->
        <div class="cc-footer-bottom">
            <p>&copy; {{ date('Y') }} CoralClean. {{ __('home.footer_rights') }}</p>
        </div>
    </div>
</footer>
