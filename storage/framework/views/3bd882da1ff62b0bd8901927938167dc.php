

<?php $__env->startSection('title', 'Blogs - MG Visa Consultant'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">Our <span class="gradient-text">Blogs</span></h1>
            <p class="page-subtitle">Latest news, tips and updates about visa and immigration</p>
        </div>
    </section>

    <!-- Blogs Section -->
    <section class="blogs-page">
        <div class="container">
            <div class="blogs-grid">
                <?php $__empty_1 = true; $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="blog-card">
                        <div class="blog-image">
                            <?php if($blog->image): ?>
                                <img src="<?php echo e(asset($blog->image)); ?>" alt="<?php echo e($blog->title); ?>">
                            <?php else: ?>
                                <div style="height: 200px; background: #eee; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-image" style="font-size: 3rem; color: #ccc;"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="blog-content">
                            <span class="blog-category">Visa Updates</span>
                            <h3 class="blog-title"><?php echo e($blog->title); ?></h3>
                            <p class="blog-excerpt"><?php echo e(Str::limit($blog->excerpt, 100)); ?></p>
                            <div class="blog-meta">
                                <span><i class="far fa-calendar"></i> <?php echo e($blog->published_at ? $blog->published_at->format('M d, Y') : ''); ?></span>
                                <span><i class="fas fa-user"></i> <?php echo e($blog->author); ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div style="grid-column: 1 / -1; text-align: center; padding: 40px;">
                        <p style="font-size: 1.2rem; color: #666;">No blogs published yet.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\mgvisa\resources\views/pages/blogs.blade.php ENDPATH**/ ?>