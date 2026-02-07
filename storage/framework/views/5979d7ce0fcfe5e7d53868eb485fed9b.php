

<?php $__env->startSection('title', 'MG Visa Consultant - Your Gateway to the World'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Hero Section -->
    <section class="hero" id="home">
        <?php
            $heroMediaType = \App\Models\SiteSetting::where('key', 'hero_media_type')->value('value') ?? 'image';
            $heroMedia = \App\Models\SiteSetting::where('key', 'hero_media')->value('value') ?? '';
        ?>

        <?php if($heroMediaType == 'slideshow' && $heroMedia): ?>
            <?php
                $slideshowImages = json_decode($heroMedia, true) ?? [];
            ?>
            <!-- Slideshow Mode -->
            <div class="hero-slideshow">
                <?php $__currentLoopData = $slideshowImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="slide <?php echo e($index == 0 ? 'active' : ''); ?>" style="background-image: url('<?php echo e(asset($image)); ?>')"></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php elseif($heroMediaType == 'video' && $heroMedia): ?>
            <!-- Video Mode -->
            <div class="hero-video-wrapper">
                <video autoplay muted loop playsinline class="hero-video">
                    <source src="<?php echo e(asset($heroMedia)); ?>" type="video/mp4">
                </video>
            </div>
        <?php else: ?>
            <!-- Single Image Mode (Default) -->
            <div class="hero-slideshow">
                <div class="slide active"
                    style="background-image: url('<?php echo e($heroMedia ? asset($heroMedia) : asset('images/hero-bg-1.jpg')); ?>')"></div>
            </div>
        <?php endif; ?>

        <div class="hero-overlay"></div>
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <?php
                        $generalSettings = \App\Models\SiteSetting::where('group', 'general')->pluck('value', 'key');
                        $tagline = $generalSettings['site_tagline'] ?? 'Your Gateway to the <span class="gradient-text">World</span>';
                        // Highlight Hajj Umrah Group and dots if present
                        $tagline = preg_replace('/(Hajj Umrah( Group)?\.+)/i', '<span class="gradient-text" style="color: #bf9b30;">$1</span>', $tagline);
                        // Fallback for just Hajj Umrah if Group/Dots not there but wanted
                        if (stripos($tagline, 'Hajj Umrah') !== false && !str_contains($tagline, 'gradient-text')) {
                            $tagline = str_ireplace('Hajj Umrah', '<span class="gradient-text" style="color: #bf9b30;">Hajj Umrah</span>', $tagline);
                        }
                        // Highlight Dreams Possible
                        $tagline = str_ireplace('Dreams Possible', '<span class="gradient-text">Dreams Possible</span>', $tagline);
                    ?>
                    <h1 class="hero-title">
                        <?php echo $tagline; ?>

                    </h1>
                    <p class="hero-subtitle"><?php echo e($generalSettings['site_name'] ?? 'MG Visa Consultancy'); ?></p>
                    <p class="hero-description">
                        <?php echo e($generalSettings['site_description'] ?? 'Expert visa consultation services to make your travel dreams a reality.'); ?>

                    </p>
                    <div class="hero-buttons">
                        <?php
                            $heroButtonSettings = \App\Models\SiteSetting::whereIn('key', ['hero_button1_text', 'hero_button1_link', 'hero_button2_text', 'hero_button2_link'])->pluck('value', 'key');
                            $button1Text = $heroButtonSettings['hero_button1_text'] ?? 'Text Now';
                            $button1Link = $heroButtonSettings['hero_button1_link'] ?? 'https://wa.me/923002194957';
                            $button2Text = $heroButtonSettings['hero_button2_text'] ?? 'Our Services';
                            $button2Link = $heroButtonSettings['hero_button2_link'] ?? '#services';
                        ?>
                        <a href="<?php echo e($button1Link); ?>" class="btn btn-primary" target="_blank">
                            <i class="fab fa-whatsapp"></i>
                            <span><?php echo e($button1Text); ?></span>
                        </a>
                        <a href="<?php echo e($button2Link); ?>" class="btn btn-outline">
                            <i class="fas fa-passport"></i>
                            <span><?php echo e($button2Text); ?></span>
                        </a>
                    </div>
                </div>
                <div class="hero-image">
                    <a href="https://wa.me/923002194957" target="_blank" class="hero-card-link">
                        <div class="hero-card">
                            <div class="card-icon">
                                <i class="fas fa-passport"></i>
                            </div>
                            <h3>Hajj <span style="color: #bf9b30;">•</span> Umrah <span style="color: #bf9b30;">•</span>
                                Ticketing <span style="color: #bf9b30;">•</span> Study Visa</h3>
                            <p>Professional Visa & Travel Services</p>
                        </div>
                    </a>
                    <?php
                        $statsSettings = \App\Models\SiteSetting::where('group', 'homepage_stats')->pluck('value', 'key');
                    ?>
                    <div class="hero-stats">
                        <div class="stat">
                            <div class="stat-number"><?php echo e($statsSettings['stats_clients'] ?? '0'); ?>+</div>
                            <div class="stat-label">Happy Clients</div>
                        </div>
                        <div class="stat">
                            <div class="stat-number"><?php echo e($statsSettings['stats_countries'] ?? '0'); ?>+</div>
                            <div class="stat-label">Countries</div>
                        </div>
                        <div class="stat">
                            <div class="stat-number"><?php echo e($statsSettings['stats_success_rate'] ?? '0'); ?>%</div>
                            <div class="stat-label">Success Rate</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-scroll">
            <a href="#services">
                <span>Scroll Down</span>
                <i class="fas fa-chevron-down"></i>
            </a>
        </div>
    </section>

    <!-- Ramadan Promo Section -->
    <section class="ramadan-promo" style="padding: 4rem 0; background: #fdf6e3;">
        <div class="container">
            <div
                style="background: linear-gradient(135deg, #2C4A6B 0%, #1E3A54 100%); border-radius: 20px; padding: 4rem 2rem; text-align: center; color: white; position: relative; overflow: hidden; box-shadow: 0 10px 30px rgba(44, 74, 107, 0.3); border: 1px solid #B8941F;">
                <!-- Decorative circles -->
                <div
                    style="position: absolute; top: -50px; left: -50px; width: 150px; height: 150px; background: rgba(184, 148, 31, 0.1); border-radius: 50%;">
                </div>
                <div
                    style="position: absolute; bottom: -30px; right: -30px; width: 100px; height: 100px; background: rgba(184, 148, 31, 0.1); border-radius: 50%;">
                </div>
                <div
                    style="position: absolute; top: 20%; right: 10%; font-size: 10rem; opacity: 0.05; transform: rotate(15deg); color: #B8941F;">
                    <i class="fas fa-mosque"></i>
                </div>

                <span
                    style="background: linear-gradient(135deg, #8B6914 0%, #B8941F 100%); padding: 0.5rem 1.5rem; border-radius: 50px; font-weight: 600; font-size: 0.875rem; display: inline-block; margin-bottom: 1.5rem; letter-spacing: 1px; text-transform: uppercase;">Coming
                    Soon - Ramadan 2026</span>

                <h2
                    style="font-size: 3rem; margin-bottom: 1rem; font-weight: 800; line-height: 1.2; font-family: 'Playfair Display', serif;">
                    Exclusive Ramadan Packages</h2>
                <p
                    style="font-size: 1.25rem; margin-bottom: 2rem; opacity: 0.9; max-width: 600px; margin-left: auto; margin-right: auto; font-weight: 300;">
                    We are accepting pre-bookings for Ramadan 2026. Secure your spiritual journey now and avail special
                    early-bird discounts.
                </p>

                <!-- Countdown Timer -->
                <div id="countdown"
                    style="display: flex; gap: 1.5rem; justify-content: center; margin-bottom: 2.5rem; flex-wrap: wrap;">
                    <div class="countdown-item" style="text-align: center;">
                        <div id="months" style="font-size: 2.5rem; font-weight: 800; color: #B8941F; line-height: 1;">00
                        </div>
                        <div
                            style="font-size: 0.875rem; color: rgba(255,255,255,0.7); text-transform: uppercase; letter-spacing: 1px;">
                            Months</div>
                    </div>
                    <div style="font-size: 2rem; font-weight: 300; color: rgba(255,255,255,0.3); line-height: 1;">:</div>
                    <div class="countdown-item" style="text-align: center;">
                        <div id="days" style="font-size: 2.5rem; font-weight: 800; color: #B8941F; line-height: 1;">00</div>
                        <div
                            style="font-size: 0.875rem; color: rgba(255,255,255,0.7); text-transform: uppercase; letter-spacing: 1px;">
                            Days</div>
                    </div>
                    <div style="font-size: 2rem; font-weight: 300; color: rgba(255,255,255,0.3); line-height: 1;">:</div>
                    <div class="countdown-item" style="text-align: center;">
                        <div id="hours" style="font-size: 2.5rem; font-weight: 800; color: #B8941F; line-height: 1;">00
                        </div>
                        <div
                            style="font-size: 0.875rem; color: rgba(255,255,255,0.7); text-transform: uppercase; letter-spacing: 1px;">
                            Hours</div>
                    </div>
                    <div style="font-size: 2rem; font-weight: 300; color: rgba(255,255,255,0.3); line-height: 1;">:</div>
                    <div class="countdown-item" style="text-align: center;">
                        <div id="minutes" style="font-size: 2.5rem; font-weight: 800; color: #B8941F; line-height: 1;">00
                        </div>
                        <div
                            style="font-size: 0.875rem; color: rgba(255,255,255,0.7); text-transform: uppercase; letter-spacing: 1px;">
                            Minutes</div>
                    </div>
                    <div style="font-size: 2rem; font-weight: 300; color: rgba(255,255,255,0.3); line-height: 1;">:</div>
                    <div class="countdown-item" style="text-align: center;">
                        <div id="seconds" style="font-size: 2.5rem; font-weight: 800; color: #B8941F; line-height: 1;">00
                        </div>
                        <div
                            style="font-size: 0.875rem; color: rgba(255,255,255,0.7); text-transform: uppercase; letter-spacing: 1px;">
                            Seconds</div>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        // Set Ramadan Date (Example: Feb 18, 2026)
                        const ramadanDate = new Date("February 18, 2026 00:00:00").getTime();

                        const x = setInterval(function () {
                            const now = new Date().getTime();
                            const distance = ramadanDate - now;

                            if (distance < 0) {
                                clearInterval(x);
                                document.getElementById("countdown").innerHTML = "<div style='font-size: 2rem; font-weight: 700; color: #B8941F;'>Ramadan Mubarak!</div>";
                                return;
                            }

                            // Calculations
                            const daysTotal = Math.floor(distance / (1000 * 60 * 60 * 24));
                            const months = Math.floor(daysTotal / 30);
                            const days = daysTotal % 30;
                            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                            document.getElementById("months").innerText = months < 10 ? "0" + months : months;
                            document.getElementById("days").innerText = days < 10 ? "0" + days : days;
                            document.getElementById("hours").innerText = hours < 10 ? "0" + hours : hours;
                            document.getElementById("minutes").innerText = minutes < 10 ? "0" + minutes : minutes;
                            document.getElementById("seconds").innerText = seconds < 10 ? "0" + seconds : seconds;
                        }, 1000);
                    });
                </script>

                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="<?php echo e(route('ramadan')); ?>"
                        style="background: linear-gradient(135deg, #B8941F 0%, #9C7A1A 100%); color: white; padding: 1rem 2.5rem; border-radius: 50px; font-weight: 700; text-decoration: none; box-shadow: 0 4px 15px rgba(184, 148, 31, 0.4); transition: transform 0.2s; display: inline-flex; align-items: center; gap: 0.5rem;">
                        View Offerings <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="services">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">What We Offer</span>
                <h2 class="section-title">Our <span class="gradient-text">Services</span></h2>
                <p class="section-description">
                    Comprehensive visa consultation services tailored to your needs
                </p>
            </div>

            <div class="services-grid">
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas <?php echo e($service->icon); ?>"></i>
                        </div>
                        <h3 class="service-title"><?php echo e($service->title); ?></h3>
                        <p class="service-description"><?php echo e($service->short_description); ?></p>
                        <a href="#" class="service-link">
                            Learn More
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>


    <!-- Packages Section -->
    <section class="packages" id="packages">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">Our Pricing</span>
                <h2 class="section-title">Hajj & Umrah <span class="gradient-text">Packages</span></h2>
                <p class="section-description">
                    Choose the best package that suits your spiritual journey with complete peace of mind.
                </p>
            </div>

            <div class="packages-grid">
                <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="package-card <?php echo e($package->type); ?>-package">
                        <?php if($package->is_popular): ?>
                            <div class="package-badge">Best Value</div>
                        <?php endif; ?>
                        <div class="package-header">
                            <div class="package-icon"><i class="<?php echo e($package->icon); ?>"></i></div>
                            <h3 class="package-name"><?php echo e($package->name); ?></h3>
                            <div class="package-price">PKR <?php echo e(number_format($package->price, 0)); ?> <span>/ person</span></div>
                            <div class="package-duration"><?php echo e($package->duration); ?></div>
                        </div>
                        <ul class="package-features">
                            <?php $__currentLoopData = $package->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li style="<?php echo e(!$feature['included'] ? 'opacity: 0.5;' : ''); ?>">
                                    <i class="fas <?php echo e($feature['included'] ? 'fa-check' : 'fa-times'); ?>"></i>
                                    <?php echo e($feature['text']); ?>

                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <a href="<?php echo e(url('/contact')); ?>" class="package-btn btn-<?php echo e($package->type); ?>">Choose Plan</a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <!-- Countries Section -->
    <section class="countries" id="countries">
        <div class="container">
            <div class="section-header">
                <span class="section-badge" style="background: transparent; color: #B8941F; letter-spacing: 2px;">COUNTRIES
                    WE SERVE</span>
                <h2 class="section-title" style="font-size: 3rem; color: #000;">Countries We Help With <span
                        style="font-weight: 800;">Immigration</span></h2>
                <p class="section-description">
                    We offer expert immigration and visa consultancy services for top destinations worldwide, including
                    Australian Immigration, Canadian Immigration, USA Immigration, and more.
                </p>
            </div>

            <div class="countries-grid-simple">
                <?php
                    $flagMap = [
                        // Middle East
                        'saudi arabia' => 'sa',
                        'uae' => 'ae',
                        'dubai' => 'ae',
                        'dubai (uae)' => 'ae',
                        'abu dhabi' => 'ae',
                        'qatar' => 'qa',
                        'bahrain' => 'bh',
                        'kuwait' => 'kw',
                        'oman' => 'om',
                        'turkey' => 'tr',
                        'türkiye' => 'tr',
                        'jordan' => 'jo',
                        'lebanon' => 'lb',
                        'israel' => 'il',
                        'iraq' => 'iq',
                        'iran' => 'ir',

                        // Asia Pacific
                        'malaysia' => 'my',
                        'singapore' => 'sg',
                        'thailand' => 'th',
                        'china' => 'cn',
                        'japan' => 'jp',
                        'south korea' => 'kr',
                        'korea' => 'kr',
                        'hong kong' => 'hk',
                        'indonesia' => 'id',
                        'philippines' => 'ph',
                        'vietnam' => 'vn',
                        'australia' => 'au',
                        'new zealand' => 'nz',
                        'taiwan' => 'tw',
                        'macao' => 'mo',
                        'macau' => 'mo',
                        'cambodia' => 'kh',
                        'laos' => 'la',
                        'myanmar' => 'mm',
                        'sri lanka' => 'lk',
                        'bangladesh' => 'bd',
                        'pakistan' => 'pk',
                        'india' => 'in',
                        'nepal' => 'np',
                        'maldives' => 'mv',

                        // Europe
                        'united kingdom' => 'gb',
                        'uk' => 'gb',
                        'england' => 'gb',
                        'scotland' => 'gb',
                        'wales' => 'gb',
                        'germany' => 'de',
                        'france' => 'fr',
                        'italy' => 'it',
                        'spain' => 'es',
                        'netherlands' => 'nl',
                        'belgium' => 'be',
                        'switzerland' => 'ch',
                        'austria' => 'at',
                        'denmark' => 'dk',
                        'sweden' => 'se',
                        'norway' => 'no',
                        'finland' => 'fi',
                        'poland' => 'pl',
                        'ireland' => 'ie',
                        'portugal' => 'pt',
                        'greece' => 'gr',
                        'czech republic' => 'cz',
                        'czechia' => 'cz',
                        'hungary' => 'hu',
                        'romania' => 'ro',
                        'bulgaria' => 'bg',
                        'croatia' => 'hr',
                        'serbia' => 'rs',
                        'ukraine' => 'ua',
                        'russia' => 'ru',
                        'iceland' => 'is',
                        'luxembourg' => 'lu',
                        'malta' => 'mt',
                        'cyprus' => 'cy',
                        'estonia' => 'ee',
                        'latvia' => 'lv',
                        'lithuania' => 'lt',
                        'slovakia' => 'sk',
                        'slovenia' => 'si',

                        // Americas
                        'united states' => 'us',
                        'usa' => 'us',
                        'united states of america' => 'us',
                        'canada' => 'ca',
                        'mexico' => 'mx',
                        'brazil' => 'br',
                        'argentina' => 'ar',
                        'chile' => 'cl',
                        'colombia' => 'co',
                        'peru' => 'pe',
                        'ecuador' => 'ec',
                        'venezuela' => 've',
                        'costa rica' => 'cr',
                        'panama' => 'pa',
                        'uruguay' => 'uy',
                        'paraguay' => 'py',

                        // Africa
                        'south africa' => 'za',
                        'egypt' => 'eg',
                        'morocco' => 'ma',
                        'kenya' => 'ke',
                        'nigeria' => 'ng',
                        'ethiopia' => 'et',
                        'tanzania' => 'tz',
                        'uganda' => 'ug',
                        'algeria' => 'dz',
                        'tunisia' => 'tn',
                        'libya' => 'ly',
                        'ghana' => 'gh',
                        'rwanda' => 'rw',
                        'zimbabwe' => 'zw',
                        'zambia' => 'zm',
                        'botswana' => 'bw',
                        'namibia' => 'na',
                        'senegal' => 'sn',
                        'ivory coast' => 'ci',
                        'cameroon' => 'cm',

                        // Special/Regional
                        'schengen countries' => 'eu',
                        'schengen' => 'eu',
                        'european union' => 'eu',
                    ];

                    // Helper function to get flag code (case-insensitive)
                    function getFlagCode($countryName, $flagMap)
                    {
                        $normalized = strtolower(trim($countryName));
                        return $flagMap[$normalized] ?? null;
                    }
                ?>

                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="country-card-simple">
                        <div class="country-flag-wrapper">
                            <div class="country-flag">
                                <?php
                                    $flagCode = getFlagCode($country->name, $flagMap);
                                ?>

                                <?php if($flagCode): ?>
                                    <img src="https://flagcdn.com/w160/<?php echo e($flagCode); ?>.png" alt="<?php echo e($country->name); ?>"
                                        style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                                <?php else: ?>
                                    <i class="fas fa-flag"></i>
                                <?php endif; ?>
                            </div>
                        </div>
                        <h3 class="country-name-simple"><?php echo e(strtoupper($country->name)); ?></h3>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-us">
        <div class="container">
            <div class="why-choose-content">
                <div class="why-choose-text">
                    <span class="section-badge">Why Choose Us</span>
                    <h2 class="section-title">
                        Your Trusted <span class="gradient-text">Visa Partner</span>
                    </h2>
                    <p class="section-description">
                        In partnership with <strong>Wisdom Global Studies</strong>, we specialize in study visa processing,
                        making your educational dreams a reality with our combined expertise and proven track record.
                    </p>

                    <div class="features-list">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="feature-text">
                                <h4>Partnership Excellence</h4>
                                <p>Combined expertise with Wisdom Global Studies for study visa success</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="feature-text">
                                <h4>High Success Rate</h4>
                                <p>98% visa approval rate with our proven methods</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="feature-text">
                                <h4>Fast Processing</h4>
                                <p>Quick turnaround time for all visa applications</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="feature-text">
                                <h4>24/7 Support</h4>
                                <p>Round-the-clock customer support for all queries</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="why-choose-image">
                    <div class="image-card"
                        style="background: white; padding: 40px; display: flex; align-items: center; justify-content: center;">
                        <a href="https://wa.me/923002194957" target="_blank" style="display: block; text-decoration: none;">
                            <img src="<?php echo e(asset('images/wisdom-logo.jpg')); ?>" alt="Wisdom Global Studies - Click to WhatsApp"
                                style="max-width: 100%; height: auto; cursor: pointer; transition: transform 0.3s ease;"
                                onmouseover="this.style.transform='scale(1.05)'"
                                onmouseout="this.style.transform='scale(1)'">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="process">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">How It Works</span>
                <h2 class="section-title">Simple <span class="gradient-text">Process</span></h2>
                <p class="section-description">
                    Get your visa in just 4 easy steps
                </p>
            </div>

            <div class="process-timeline">
                <div class="process-step">
                    <div class="step-number">01</div>
                    <div class="step-content">
                        <div class="step-icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <h3>Consultation</h3>
                        <p>Free consultation to understand your visa requirements</p>
                    </div>
                </div>
                <div class="process-step">
                    <div class="step-number">02</div>
                    <div class="step-content">
                        <div class="step-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <h3>Documentation</h3>
                        <p>We help you prepare all necessary documents</p>
                    </div>
                </div>
                <div class="process-step">
                    <div class="step-number">03</div>
                    <div class="step-content">
                        <div class="step-icon">
                            <i class="fas fa-paper-plane"></i>
                        </div>
                        <h3>Application</h3>
                        <p>Submit your application with our expert guidance</p>
                    </div>
                </div>
                <div class="process-step">
                    <div class="step-number">04</div>
                    <div class="step-content">
                        <div class="step-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <h3>Approval</h3>
                        <p>Receive your visa and start your journey</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team" id="team">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">Leadership</span>
                <h2 class="section-title">Meet Our <span class="gradient-text">Experts</span></h2>
                <p class="section-description">
                    Our dedicated team of professionals, led by industry experts.
                </p>
            </div>

            <div class="team-grid">
                <?php $__currentLoopData = $team; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="team-card">
                        <div class="team-image-wrapper">
                            <?php if($member->image): ?>
                                <img src="<?php echo e(asset($member->image)); ?>" alt="<?php echo e($member->name); ?>" class="team-image">
                            <?php else: ?>
                                <div class="team-placeholder">
                                    <i class="fas fa-user"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="team-content">
                            <h3 class="team-name"><?php echo e($member->name); ?></h3>
                            <p class="team-position"><?php echo e($member->position); ?></p>
                            <p class="team-bio"><?php echo e($member->bio); ?></p>
                            <div class="team-social">
                                <?php
                                    $whatsapp = $member->whatsapp ? preg_replace('/[^0-9]/', '', $member->whatsapp) : '923002194957';
                                ?>
                                <a href="https://wa.me/<?php echo e($whatsapp); ?>" target="_blank" class="team-whatsapp-btn">
                                    <i class="fab fa-whatsapp"></i>
                                    <span>WhatsApp</span>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials" id="testimonials">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">Client Reviews</span>
                <h2 class="section-title">What Our <span class="gradient-text">Clients Say</span></h2>
                <p class="section-description">
                    Read success stories from thousands of satisfied clients
                </p>
            </div>

            <div class="testimonials-grid">
                <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="testimonial-card">
                        <div class="testimonial-rating">
                            <?php for($i = 0; $i < $testimonial->rating; $i++): ?>
                                <i class="fas fa-star"></i>
                            <?php endfor; ?>
                        </div>
                        <p class="testimonial-message">"<?php echo e($testimonial->message); ?>"</p>
                        <div class="testimonial-author">
                            <div class="author-avatar">
                                <?php echo e(substr($testimonial->client_name, 0, 1)); ?>

                            </div>
                            <div class="author-info">
                                <h4><?php echo e($testimonial->client_name); ?></h4>
                                <p><?php echo e($testimonial->position); ?><?php echo e($testimonial->company ? ', ' . $testimonial->company : ''); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Review Submission Form -->
            <div class="review-submission-section">
                <div class="review-cta">
                    <h3>Share Your Experience</h3>
                    <p>Have you worked with us? leave a review and help others.</p>
                    <button id="toggleReviewForm" class="btn btn-outline-gold">Write a Review</button>
                </div>

                <div id="reviewFormContainer" class="review-form-container" style="display: none;">
                    <?php if(session('review_success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('review_success')); ?>

                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function () { document.getElementById('reviewFormContainer').style.display = 'block'; });
                        </script>
                    <?php endif; ?>

                    <form action="<?php echo e(route('review.store')); ?>" method="POST" class="review-form">
                        <?php echo csrf_field(); ?>
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="client_name">Full Name</label>
                                <input type="text" name="client_name" id="client_name" required placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" required placeholder="Your Email">
                            </div>
                        </div>
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" name="country" id="country" placeholder="Your Country">
                            </div>
                            <div class="form-group">
                                <label>Rating</label>
                                <div class="star-rating">
                                    <input type="radio" id="star5" name="rating" value="5" checked /><label for="star5"
                                        title="5 stars"><i class="fas fa-star"></i></label>
                                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4"
                                        title="4 stars"><i class="fas fa-star"></i></label>
                                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3"
                                        title="3 stars"><i class="fas fa-star"></i></label>
                                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2"
                                        title="2 stars"><i class="fas fa-star"></i></label>
                                    <input type="radio" id="star1" name="rating" value="1" /><label for="star1"
                                        title="1 star"><i class="fas fa-star"></i></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Your Review</label>
                            <textarea name="message" id="review_message" rows="4" required
                                placeholder="Share your experience with us..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Review</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">Get In Touch</span>
                <h2 class="section-title">
                    Ready to Start Your <span class="gradient-text">Journey?</span>
                </h2>
                <p class="section-description">
                    Contact us today for a free consultation and let us help you achieve your travel dreams.
                </p>
            </div>

            <div class="contact-wrapper">
                <div class="contact-info">
                    <div class="contact-details">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-text">
                                <h4>Phone</h4>
                                <a href="tel:+923002194957">+92 300 2194957</a>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-text">
                                <h4>Email</h4>
                                <a href="mailto:info@mgvisaconsultant.com">info@mgvisaconsultant.com</a>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <div class="contact-text">
                                <h4>WhatsApp</h4>
                                <a href="https://wa.me/923002194957">+92 300 2194957</a>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-text">
                                <h4>Office</h4>
                                <p>Office No. 1, Mezzanine Floor, Building No. 19-C, Phase 2 Extension, DHA, Karachi</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="contact-form-wrapper">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success"
                            style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; padding: 1.25rem; border-radius: 0.75rem; margin-bottom: 1.5rem; text-align: center; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3); animation: slideDown 0.5s ease;">
                            <i class="fas fa-check-circle"
                                style="font-size: 1.5rem; margin-right: 0.5rem; vertical-align: middle;"></i>
                            <strong style="font-size: 1.1rem; vertical-align: middle;"><?php echo e(session('success')); ?></strong>
                        </div>
                    <?php endif; ?>
                    <form action="<?php echo e(url('/inquiry')); ?>" method="POST" class="contact-form">
                        <?php echo csrf_field(); ?>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="country">Country of Interest</label>
                                <select id="country" name="country_of_interest">
                                    <option value="">Select Country</option>
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country->name); ?>"><?php echo e($country->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="visa_type">Visa Type</label>
                            <select id="visa_type" name="visa_type">
                                <option value="">Select Visa Type</option>
                                <?php $__currentLoopData = $visaTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visaType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($visaType->name); ?>"><?php echo e($visaType->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            <span>Send Message</span>
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Locate Us Section -->
    <section class="locate-us">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">Find Us</span>
                <h2 class="section-title">Locate <span class="gradient-text">Us</span></h2>
                <p class="section-description">Visit our offices for a personal consultation</p>
            </div>

            <div class="maps-grid">
                <!-- Map 1: Head Office -->
                <div class="map-card">
                    <h3 class="map-title">Our Head Office</h3>
                    <div class="map-frame">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3620.9085657303335!2d67.0677384!3d24.832800300000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33d60eace38e1%3A0xff484eea25f9d107!2sMG%20food%20%26%20Event%20Planners!5e0!3m2!1sen!2s!4v1767711373051!5m2!1sen!2s"
                            width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy">
                        </iframe>
                    </div>
                </div>


            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Review Form Toggle (Existing)
            const toggleBtn = document.getElementById('toggleReviewForm');
            const formContainer = document.getElementById('reviewFormContainer');

            if (toggleBtn && formContainer) {
                toggleBtn.addEventListener('click', function () {
                    const isHidden = formContainer.style.display === 'none';
                    formContainer.style.display = isHidden ? 'block' : 'none';
                    toggleBtn.textContent = isHidden ? 'Cancel Review' : 'Write a Review';

                    if (isHidden) {
                        formContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });
            }

            // Hero Slideshow Logic (New)
            const slides = document.querySelectorAll('.hero-slideshow .slide');
            if (slides.length > 1) {
                let currentSlide = 0;

                // Initialize first slide as active
                slides[0].classList.add('active');

                setInterval(() => {
                    // Remove active class from current slide
                    slides[currentSlide].classList.remove('active');

                    // Move to next slide
                    currentSlide = (currentSlide + 1) % slides.length;

                    // Add active class to new slide
                    slides[currentSlide].classList.add('active');
                }, 5000); // Change slide every 5 seconds
            }
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\mgvisa\resources\views/home.blade.php ENDPATH**/ ?>