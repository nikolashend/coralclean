<!-- FOOTER -->
<footer class="footer" id="contact">
    <div class="container">
        <div class="row">
            <!-- Company Info -->
            <div class="col-xl-3 col-lg-4">
                <div class="logo wow animated fadeInUp" data-wow-delay="0.5s">
                    <img src="<?php echo e(asset('img/coralclean/logo1.png')); ?>?v=<?php echo e(filemtime(public_path('img/coralclean/logo1.png'))); ?>" alt="CoralClean" style="max-width: 180px;">
                </div>
                <div class="footer-info wow animated fadeInUp" data-wow-delay="0.5s">
                    <p><?php echo e(__('home.footer_description')); ?></p>
                    <br>
                    <p><i class="flaticon-pin iconpfooter1"></i>&nbsp;&nbsp;<?php echo e(__('home.footer_location')); ?></p>
                    <p style="font-size: 14px; opacity: 0.8; margin-left: 28px;"><?php echo e(__('home.footer_no_walkin')); ?></p>
                    <p class="fic"><i class="flaticon-call iconpfooter2"></i>&nbsp;&nbsp;&nbsp;<a href="tel:<?php echo e($contact->phone_clean ?? '37258301348'); ?>"><?php echo e($contact->phone ?? '+372 5830 1348'); ?></a></p><br>
                    <p><i class="flaticon-email iconpfooter3"></i>&nbsp;&nbsp;&nbsp;<a href="mailto:info@coralclean.ee">info@coralclean.ee</a></p><br>
                    <p><i class="flaticon-time iconpfooter3"></i>&nbsp;&nbsp;&nbsp;<?php echo e(__('home.footer_hours')); ?></p>
                </div>
                <ul class="footer-social mt-3 wow animated fadeInUp" data-wow-delay="0.5s">
                    <li><a href="<?php echo e($contact->facebook ?? 'https://www.facebook.com/coralclean'); ?>" target="_blank"><i class="icon-social-facebook iconsociaf"></i></a></li>
                    <li><a href="<?php echo e($contact->instagram ?? 'https://www.instagram.com/coralclean.ee/'); ?>" target="_blank"><i class="icon-social-instagram iconsociaf"></i></a></li>
                </ul>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                <h6 class="widget-title"><?php echo e(__('home.footer_contact_title')); ?></h6>
                <p class="footerp"><?php echo e(__('home.footer_contact_text')); ?></p>
                <div class="bosluk333"></div>
                <form action="<?php echo e(url('/' . ($locale ?? 'ru') . '/contact')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form__grup wow fadeInLeft" data-wow-delay="0.7s">
                        <input type="text" name="name" class="form-popup__input" placeholder="<?php echo e(__('home.form_name')); ?>" required>
                    </div>
                    <div class="form__grup wow fadeInLeft" data-wow-delay="0.8s">
                        <input type="tel" name="phone" class="form-popup__input" placeholder="<?php echo e(__('home.form_phone')); ?>" required>
                    </div>
                    <div class="form__grup wow fadeInLeft" data-wow-delay="0.85s">
                        <input type="email" name="email" class="form-popup__input" placeholder="<?php echo e(__('home.form_email')); ?>">
                    </div>
                    <div class="form__grup wow fadeInUp" data-wow-delay="0.9s">
                        <input type="submit" class="custom-buttonw1" value="<?php echo e(__('home.form_submit')); ?>">
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

            <!-- Services Links -->
            <div class="col-lg-2 offset-xl-1 col-sm-6 wow animated fadeInUp" data-wow-delay="0.5s">
                <h6 class="widget-title"><?php echo e(__('home.footer_services_title')); ?></h6>
                <div class="footer-menu">
                    <ul class="menu">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($allServices)): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $allServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navSvc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $navTrans = $navSvc->translations->first(); ?>
                        <li><a href="<?php echo e(url('/' . ($locale ?? 'ru') . '/services/' . $navSvc->slug)); ?>"><?php echo e($navTrans->title ?? $navSvc->slug); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </ul>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-sm-6 wow animated fadeInUp" data-wow-delay="0.5s">
                <h6 class="widget-title"><?php echo e(__('home.footer_quick_links')); ?></h6>
                <div class="footer-menu">
                    <ul class="menu">
                        <li><a href="#about"><?php echo e(__('home.nav_about')); ?></a></li>
                        <li><a href="#packages"><?php echo e(__('home.nav_packages')); ?></a></li>
                        <li><a href="#how-it-works"><?php echo e(__('home.nav_how')); ?></a></li>
                        <li><a href="#reviews"><?php echo e(__('home.nav_reviews')); ?></a></li>
                        <li><a href="#faq"><?php echo e(__('home.nav_faq')); ?></a></li>
                        <li><a href="javascript:void(0)" onclick="openContactPanel()"><?php echo e(__('home.nav_contacts')); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="copyright">
                    © 2026 <?php echo e(__('home.footer_copyright')); ?><br>
                    <small><?php echo e(__('home.footer_legal')); ?> • <?php echo e(__('home.footer_reg')); ?> • Tallinn, Harjumaa, Estonia</small>
                </p>
            </div>
        </div>
    </div>
    <div id="top" style="cursor: pointer;"><i class="flaticon-chevron icontops"></i><div class="bosluk3"></div></div>
</footer>
<?php /**PATH C:\Users\nikol\coralclean-laravel\resources\views/partials/footer.blade.php ENDPATH**/ ?>