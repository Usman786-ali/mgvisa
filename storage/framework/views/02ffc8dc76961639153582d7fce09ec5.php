<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="<?php echo $__env->yieldContent('meta_description', 'Professional visa consultation services for all your travel needs'); ?>">
    <meta name="keywords" content="<?php echo $__env->yieldContent('meta_keywords', 'visa consultant, visa services, immigration, travel visa'); ?>">
    <title><?php echo $__env->yieldContent('title', 'MG Visa Consultant - Your Gateway to the World'); ?></title>
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/logo.png')); ?>">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>?v=<?php echo e(time()); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/custom_countries.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/team.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/pages.css')); ?>">

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar" id="navbar">
        <div class="container">
            <div class="nav-wrapper">
                <a href="<?php echo e(url('/')); ?>" class="logo">
                    <img src="<?php echo e(asset('images/logo.png')); ?>" alt="MG Visa Consultancy" class="logo-image">
                </a>

                <button class="mobile-menu-toggle" id="mobileMenuToggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <div class="nav-menu" id="navMenu">
                    <a href="<?php echo e(url('/')); ?>" class="nav-link <?php echo e(request()->is('/') ? 'active' : ''); ?>">Home</a>
                    <a href="<?php echo e(url('/services')); ?>"
                        class="nav-link <?php echo e(request()->is('services') ? 'active' : ''); ?>">Services</a>
                    <a href="<?php echo e(url('/countries')); ?>"
                        class="nav-link <?php echo e(request()->is('countries') ? 'active' : ''); ?>">Countries</a>
                    <a href="<?php echo e(url('/blogs')); ?>"
                        class="nav-link <?php echo e(request()->is('blogs') ? 'active' : ''); ?>">Blogs</a>
                    <a href="<?php echo e(url('/contact')); ?>"
                        class="nav-link <?php echo e(request()->is('contact') ? 'active' : ''); ?>">Contact</a>
                    <a href="tel:+923002194957" class="nav-cta">
                        <i class="fas fa-phone"></i>
                        Call Now
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="footer-grid">
                    <!-- About Column -->
                    <div class="footer-col">
                        <h3 class="footer-title">About MG Visa</h3>
                        <p class="footer-text">
                            Your trusted partner for visa consultation services. We provide expert guidance and support
                            for all your visa needs, making your travel dreams a reality.
                        </p>
                        <?php
                            $socialSettings = \App\Models\SiteSetting::where('group', 'social')->pluck('value', 'key');
                        ?>
                        <div class="social-links">
                            <?php if($socialSettings['social_facebook'] ?? false): ?>
                                <a href="<?php echo e($socialSettings['social_facebook']); ?>" class="social-link" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a>
                            <?php endif; ?>
                            <?php if($socialSettings['social_instagram'] ?? false): ?>
                                <a href="<?php echo e($socialSettings['social_instagram']); ?>" class="social-link" target="_blank"><i
                                        class="fab fa-instagram"></i></a>
                            <?php endif; ?>
                            <?php if($socialSettings['social_youtube'] ?? false): ?>
                                <a href="<?php echo e($socialSettings['social_youtube']); ?>" class="social-link" target="_blank"><i
                                        class="fab fa-youtube"></i></a>
                            <?php endif; ?>
                            <?php if($socialSettings['social_tiktok'] ?? false): ?>
                                <a href="<?php echo e($socialSettings['social_tiktok']); ?>" class="social-link" target="_blank"><i
                                        class="fab fa-tiktok"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Quick Links Column -->
                    <!-- Services Column -->
                    <div class="footer-col">
                        <h3 class="footer-title">Our Services</h3>
                        <ul class="footer-links">
                            <li><a href="#">Tourist Visa</a></li>
                            <li><a href="#">Student Visa</a></li>
                            <li><a href="#">Work Visa</a></li>
                            <li><a href="#">Business Visa</a></li>
                            <li><a href="#">Family Visa</a></li>
                        </ul>
                    </div>

                    <!-- Contact Us Column -->
                    <div class="footer-col">
                        <h3 class="footer-title">Contact Us</h3>
                        <ul class="footer-links">
                            <li>
                                <i class="fas fa-phone"></i>
                                <a href="tel:+923002194957">+92 300 2194957</a>
                            </li>
                            <li>
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:info@mgvisaconsultant.com">info@mgvisaconsultant.com</a>
                            </li>
                            <li>
                                <i class="fab fa-whatsapp"></i>
                                <a href="https://wa.me/923002194957">+92 300 2194957</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Locate Us Column -->
                    <div class="footer-col">
                        <h3 class="footer-title">Locate Us</h3>
                        <ul class="footer-contact">
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <span><strong>Head Office:</strong> L5-2B, Wisma Paradise, 63, Jalan Ampang, Kuala
                                    Lumpur, 50450 Kuala Lumpur, Malaysia</span>
                            </li>
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <span><strong>Office:</strong> Office No. 1, Mezzanine Floor, Building No. 19-C, Phase 2
                                    Extension, DHA, Karachi</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-content">
                    <p>&copy; <?php echo e(date('Y')); ?> MG Visa Consultant. All rights reserved.</p>
                    <div class="footer-bottom-links">
                        <a href="#">Privacy Policy</a>
                        <a href="#">Terms of Service</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/923002194957" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Scroll to Top Button -->
    <button class="scroll-to-top" id="scrollToTop">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Custom JavaScript -->
    <script src="<?php echo e(asset('js/script.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html><?php /**PATH C:\wamp64\www\mgvisa\resources\views/layouts/app.blade.php ENDPATH**/ ?>