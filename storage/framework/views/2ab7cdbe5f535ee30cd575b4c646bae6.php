

<?php $__env->startSection('header', 'Manage Countries'); ?>

<?php $__env->startSection('content'); ?>
    <div style="margin-bottom: 20px; text-align: right;">
        <a href="<?php echo e(route('admin.countries.create')); ?>"
            style="background: var(--secondary-color); color: white; padding: 10px 20px; border-radius: 4px; text-decoration: none; font-weight: 500;">Add
            New Country</a>
    </div>

    <div style="background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); overflow: hidden;">
        <table class="recent-table">
            <thead>
                <tr>
                    <th style="width: 50px;">Order</th>
                    <th>Country Name</th>
                    <th>Processing Time</th>
                    <th>Fees</th>
                    <th style="width: 100px;">Popular</th>
                    <th style="width: 100px;">Status</th>
                    <th style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($country->order); ?></td>
                        <td><strong><?php echo e($country->name); ?></strong></td>
                        <td><?php echo e($country->processing_time ?? 'N/A'); ?></td>
                        <td>$<?php echo e(number_format($country->fees ?? 0, 2)); ?></td>
                        <td>
                            <span
                                style="padding: 2px 8px; border-radius: 10px; font-size: 0.8rem; <?php echo e($country->is_popular ? 'background: #fef3c7; color: #92400e' : 'background: #e5e7eb; color: #6b7280'); ?>">
                                <?php echo e($country->is_popular ? 'Yes' : 'No'); ?>

                            </span>
                        </td>
                        <td>
                            <span
                                style="padding: 2px 8px; border-radius: 10px; font-size: 0.8rem; background: <?php echo e($country->is_active ? '#d1fae5' : '#fee2e2'); ?>; color: <?php echo e($country->is_active ? '#065f46' : '#991b1b'); ?>">
                                <?php echo e($country->is_active ? 'Active' : 'Inactive'); ?>

                            </span>
                        </td>
                        <td>
                            <div style="display: flex; gap: 10px;">
                                <a href="<?php echo e(route('admin.countries.edit', $country->id)); ?>"
                                    style="color: blue; text-decoration: none;">Edit</a>
                                <form action="<?php echo e(route('admin.countries.destroy', $country->id)); ?>" method="POST"
                                    onsubmit="return confirm('Are you sure?');" style="display: inline;">
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
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\mgvisa\resources\views/admin/countries/index.blade.php ENDPATH**/ ?>