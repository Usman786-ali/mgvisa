

<?php $__env->startSection('header', 'Client Inquiries'); ?>

<?php $__env->startSection('content'); ?>
    <div style="background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); overflow: hidden;">
        <table class="recent-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Visa Type</th>
                    <th>Country</th>
                    <th>Date</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $inquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><strong><?php echo e($inquiry->name); ?></strong></td>
                        <td><?php echo e($inquiry->visa_type ?? 'N/A'); ?></td>
                        <td><?php echo e($inquiry->country_of_interest ?? 'N/A'); ?></td>
                        <td><?php echo e($inquiry->created_at->format('M d, Y')); ?></td>
                        <td><?php echo e($inquiry->email); ?></td>
                        <td><?php echo e($inquiry->phone ?? 'N/A'); ?></td>
                        <td>
                            <form action="<?php echo e(route('admin.inquiries.destroy', $inquiry->id)); ?>" method="POST"
                                onsubmit="return confirm('Delete this inquiry?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit"
                                    style="color: red; background: none; border: none; cursor: pointer;">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" style="text-align: center; color: #6b7280; padding: 40px;">No inquiries yet.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div style="padding: 20px;">
            <?php echo e($inquiries->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\mgvisa\resources\views/admin/inquiries/index.blade.php ENDPATH**/ ?>