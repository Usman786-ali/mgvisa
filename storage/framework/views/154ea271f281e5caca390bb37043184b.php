

<?php $__env->startSection('title', 'Countries We Serve - MG Visa Consultant'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">Countries We <span class="gradient-text">Serve</span></h1>
            <p class="page-subtitle">Expert immigration and visa consultancy services for top destinations worldwide</p>
        </div>
    </section>

    <!-- Countries Section -->
    <section class="countries-page">
        <div class="container">
            <?php
                $flagMap = [
                    'United States' => 'us',
                    'Canada' => 'ca',
                    'United Kingdom' => 'gb',
                    'Australia' => 'au',
                    'Schengen Countries' => 'eu',
                    'Dubai (UAE)' => 'ae',
                    'Germany' => 'de',
                    'France' => 'fr',
                    'Italy' => 'it',
                    'Spain' => 'es',
                    'New Zealand' => 'nz',
                    'Japan' => 'jp',
                    'China' => 'cn',
                    'Singapore' => 'sg',
                    'Malaysia' => 'my',
                    'Turkey' => 'tr',
                    'Saudi Arabia' => 'sa',
                    'Qatar' => 'qa',
                    'Oman' => 'om',
                    'Bahrain' => 'bh',
                    'Kuwait' => 'kw',
                ];
            ?>

            <div class="countries-grid-page">
                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="country-card-page">
                        <div class="country-flag-large">
                            <?php if(array_key_exists($country->name, $flagMap)): ?>
                                <img src="https://flagcdn.com/w160/<?php echo e($flagMap[$country->name]); ?>.png" alt="<?php echo e($country->name); ?>">
                            <?php else: ?>
                                <i class="fas fa-flag"></i>
                            <?php endif; ?>
                        </div>
                        <h3 class="country-name"><?php echo e($country->name); ?></h3>
                        <p class="country-description">
                            <?php echo e($country->description ?? 'Expert visa consultation for ' . $country->name); ?>

                        </p>
                        <a href="https://wa.me/923002194957" target="_blank" class="country-cta">
                            <i class="fab fa-whatsapp"></i>
                            Inquire Now
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\mgvisa\resources\views/pages/countries.blade.php ENDPATH**/ ?>