

<?php $__env->startSection('header', 'Manage Services'); ?>

<?php $__env->startSection('content'); ?>
    <div style="margin-bottom: 20px; text-align: right;">
        <a href="<?php echo e(route('admin.services.create')); ?>"
            style="background: var(--secondary-color); color: white; padding: 10px 20px; border-radius: 4px; text-decoration: none; font-weight: 500;">Add
            New Service</a>
    </div>

    <div style="background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); overflow: hidden;">
        <table class="recent-table">
            <thead>
                <tr>
                    <th style="width: 50px;">Order</th>
                    <th style="width: 50px;">Icon</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($service->order); ?></td>
                        <td><i class="fas <?php echo e($service->icon); ?>" style="font-size: 1.2rem; color: var(--secondary-color);"></i>
                        </td>
                        <td>
                            <strong><?php echo e($service->title); ?></strong>
                        </td>
                        <td><?php echo e($service->short_description); ?></td>
                        <td>
                            <div style="display: flex; gap: 10px;">
                                <a href="<?php echo e(route('admin.services.edit', $service->id)); ?>"
                                    style="color: blue; text-decoration: none;">Edit</a>
                                <form action="<?php echo e(route('admin.services.destroy', $service->id)); ?>" method="POST"
                                    onsubmit="return confirm('Are you sure?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit"
                                        style="color: red; background: none; border: none; cursor: pointer; padding: 0;">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\mgvisa\resources\views/admin/services/index.blade.php ENDPATH**/ ?>