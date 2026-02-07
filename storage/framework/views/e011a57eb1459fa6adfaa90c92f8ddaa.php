

<?php $__env->startSection('title', 'Our Services - MG Visa Consultant'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">Our <span class="gradient-text">Services</span></h1>
            <p class="page-subtitle">Comprehensive visa consultation services tailored to your needs</p>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-page">
        <div class="container">
            <div class="services-grid">
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas <?php echo e($service->icon); ?>"></i>
                        </div>
                        <h3 class="service-title"><?php echo e($service->title); ?></h3>
                        <p class="service-description"><?php echo e($service->short_description); ?></p>
                        <a href="https://wa.me/923002194957" target="_blank" class="service-link">
                            Get Started
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\mgvisa\resources\views/pages/services.blade.php ENDPATH**/ ?>