<!-- Navigation -->
<nav class="navbar navbar-expand-xl navbar-light bg-light">
    <div class="container">
        <div class="logo"><a href="<?php echo e(url('/' . $locale)); ?>"><img src="<?php echo e(asset('img/coralclean/logo1.png')); ?>?v=<?php echo e(filemtime(public_path('img/coralclean/logo1.png'))); ?>" alt="CoralClean"></a></div>
        <div class="site-menu">
            <div class="menueffect">
                <div id="bs-example-navbar-collapse-2" class="collapse navbar-collapse">
                    <ul id="menu-main-menu" class="nav navbar-nav">
                        <li class="menu-item nav-item <?php echo e(Request::is($locale) || Request::is('/') ? 'active' : ''); ?>"><a href="<?php echo e(url('/' . $locale)); ?>" class="nav-link"><span><?php echo e(__('home.nav_home')); ?></span></a></li>
                        <li class="menu-item nav-item"><a href="<?php echo e(url('/' . $locale . '/#about')); ?>" class="nav-link"><span><?php echo e(__('home.nav_about')); ?></span></a></li>
                        <li class="menu-item menu-item-has-children dropdown nav-item">
                            <a href="<?php echo e(url('/' . $locale . '/services')); ?>" data-toggle="dropdown" class="dropdown-toggle nav-link"><span><?php echo e(__('home.nav_services')); ?></span></a>
                            <ul class="dropdown-menu">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($allServices)): ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $allServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navSvc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $navTrans = $navSvc->translations->first(); ?>
                                <li class="menu-item nav-item"><a href="<?php echo e(url('/' . $locale . '/services/' . $navSvc->slug)); ?>" class="dropdown-item"><span><?php echo e($navTrans->title ?? $navSvc->slug); ?></span></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </ul>
                        </li>
                        <li class="menu-item nav-item"><a href="<?php echo e(url('/' . $locale . '/#packages')); ?>" class="nav-link"><span><?php echo e(__('home.nav_packages')); ?></span></a></li>
                        <li class="menu-item nav-item"><a href="<?php echo e(url('/' . $locale . '/#faq')); ?>" class="nav-link"><span><?php echo e(__('home.nav_faq')); ?></span></a></li>
                        <li class="menu-item nav-item"><a href="javascript:void(0)" onclick="openContactPanel()" class="nav-link"><span><?php echo e(__('home.nav_contacts')); ?></span></a></li>
                        <li class="menu-item menu-item-has-children dropdown nav-item">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link" style="text-transform: uppercase;"><span><?php echo e(strtoupper($locale ?? 'ru')); ?></span></a>
                            <ul class="dropdown-menu">
                                <li class="menu-item nav-item"><a href="<?php echo e(url('/ru' . (isset($slug) ? '/services/' . $slug : ''))); ?>" class="dropdown-item"><span>Русский</span></a></li>
                                <li class="menu-item nav-item"><a href="<?php echo e(url('/et' . (isset($slug) ? '/services/' . $slug : ''))); ?>" class="dropdown-item"><span>Eesti</span></a></li>
                                <li class="menu-item nav-item"><a href="<?php echo e(url('/en' . (isset($slug) ? '/services/' . $slug : ''))); ?>" class="dropdown-item"><span>English</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="hamburger-menu"><span></span><span></span><span></span></div>
        <div class="navbar-button d-flex">
            <div class="navbar-contact-btn">
                <a href="javascript:void(0)" onclick="openContactPanel()" class="btn-contact-header"><?php echo e(__('home.btn_contact_us')); ?></a>
            </div>
            <div class="telh"><i class="flaticon-call iconp"></i>&nbsp;&nbsp;&nbsp;<?php echo e($contact->phone ?? '+372 5830 1348'); ?></div>
        </div>
    </div>
</nav>

<?php /**PATH C:\Users\nikol\coralclean-laravel\resources\views/partials/header.blade.php ENDPATH**/ ?>