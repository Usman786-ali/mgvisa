

<?php $__env->startSection('title', 'Manage Packages'); ?>

<?php $__env->startSection('content'); ?>
    <div style="padding: 2rem;">
        <div style="margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h1 style="font-size: 2rem; font-weight: 700; color: #1f2937;">Packages Management</h1>
                <p style="color: #6b7280; margin-top: 0.5rem;">Manage Standard and Ramadan packages</p>
            </div>
            <a href="<?php echo e(route('admin.packages.create')); ?>" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; padding: 0.75rem 1.5rem; border-radius: 8px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 0.5rem; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);">
                <i class="fas fa-plus"></i> Create New Package
            </a>
        </div>

        <?php if(session('success')): ?>
            <div style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);">
                <i class="fas fa-check-circle"></i> <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div style="display: grid; gap: 1.5rem;">
            <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $isRamadan = $package->category === 'ramadan';
                ?>
                <div style="background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); padding: 2rem; position: relative; <?php echo e($isRamadan ? 'border: 2px solid #10b981;' : ($package->type == 'gold' ? 'border: 2px solid #B8941F;' : '')); ?>">
                    <?php if($package->is_popular): ?>
                        <div style="position: absolute; top: -12px; right: 20px; background: linear-gradient(135deg, <?php echo e($isRamadan ? '#059669, #10b981' : '#B8941F, #9C7A1A'); ?> ); color: white; padding: 0.5rem 1rem; border-radius: 20px; font-weight: 600; font-size: 0.875rem; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
                            <i class="fas fa-star"></i> <?php echo e($isRamadan ? 'Ramadan Special' : 'Best Value'); ?>

                        </div>
                    <?php endif; ?>
                    
                    <?php if($isRamadan && !$package->is_popular): ?>
                         <div style="position: absolute; top: -12px; right: 20px; background: #059669; color: white; padding: 0.5rem 1rem; border-radius: 20px; font-weight: 600; font-size: 0.875rem;">
                            Ramadan
                        </div>
                    <?php endif; ?>

                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr auto; gap: 2rem; align-items: start;">
                        <!-- Package Info -->
                        <div>
                            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                                <div style="width: 60px; height: 60px; background: <?php echo e($isRamadan ? '#dcace0' : ($package->type == 'basic' ? '#f3f4f6' : ($package->type == 'gold' ? '#fef3c7' : '#f5f3ff'))); ?>; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: <?php echo e($isRamadan ? '#059669' : ($package->type == 'basic' ? '#6b7280' : ($package->type == 'gold' ? '#B8941F' : '#7c3aed'))); ?>;">
                                    <i class="<?php echo e($package->icon); ?>"></i>
                                </div>
                                <div>
                                    <h3 style="font-size: 1.5rem; font-weight: 700; color: #1f2937; margin: 0;"><?php echo e($package->name); ?></h3>
                                    <p style="color: #6b7280; margin: 0.25rem 0 0 0;"><?php echo e($package->duration); ?></p>
                                    <span style="display: inline-block; background: #eee; padding: 2px 8px; border-radius: 4px; font-size: 0.75rem; color: #555; margin-top: 4px;"><?php echo e(ucfirst($package->category)); ?> - <?php echo e($package->type); ?></span>
                                </div>
                            </div>
                        </div>

                        <!-- Price -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; color: #6b7280; margin-bottom: 0.25rem;">Price</label>
                            <div style="font-size: 2rem; font-weight: 700; color: #B8941F;">PKR <?php echo e(number_format($package->price, 0)); ?></div>
                            <div style="color: #6b7280; font-size: 0.875rem;">per person</div>
                        </div>

                        <!-- Features -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #6b7280; margin-bottom: 0.5rem;">Features</label>
                            <div style="display: flex; flex-direction: column; gap: 0.25rem;">
                                <?php $__currentLoopData = $package->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.875rem;">
                                        <?php if($feature['included']): ?>
                                            <i class="fas fa-check" style="color: #10b981;"></i>
                                        <?php else: ?>
                                            <i class="fas fa-times" style="color: #ef4444; opacity: 0.5;"></i>
                                        <?php endif; ?>
                                        <span style="<?php echo e(!$feature['included'] ? 'opacity: 0.5;' : ''); ?>"><?php echo e($feature['text']); ?></span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                            <a href="<?php echo e(route('admin.packages.edit', $package->id)); ?>" 
                               style="background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); color: white; padding: 0.75rem 1.5rem; border-radius: 8px; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; font-weight: 600; box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3); justify-content: center;">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="<?php echo e(route('admin.packages.destroy', $package->id)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this package?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" 
                                   style="width: 100%; background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); color: white; padding: 0.75rem 1.5rem; border-radius: 8px; border: none; cursor: pointer; display: inline-flex; align-items: center; gap: 0.5rem; font-weight: 600; box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3); justify-content: center;">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                            <div style="display: flex; align-items: center; gap: 0.5rem; padding: 0.5rem; background: #f9fafb; border-radius: 6px; justify-content: center;">
                                <?php if($package->is_active): ?>
                                    <i class="fas fa-check-circle" style="color: #10b981;"></i>
                                    <span style="font-size: 0.875rem; color: #10b981; font-weight: 600;">Active</span>
                                <?php else: ?>
                                    <i class="fas fa-times-circle" style="color: #ef4444;"></i>
                                    <span style="font-size: 0.875rem; color: #ef4444; font-weight: 600;">Inactive</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\mgvisa\resources\views/admin/packages/index.blade.php ENDPATH**/ ?>