

<?php $__env->startSection('header', 'Manage Team'); ?>

<?php $__env->startSection('content'); ?>
    <div style="background: white; padding: 20px; border-radius: 8px; margin-bottom: 30px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
        <h3 style="margin-top: 0; margin-bottom: 20px;">Add New Member</h3>
        <form action="<?php echo e(route('admin.team.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div>
                    <label style="display: block; margin-bottom: 5px; color: #4b5563;">Name</label>
                    <input type="text" name="name" required style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 4px;">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 5px; color: #4b5563;">Position</label>
                    <input type="text" name="position" required style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 4px;">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 5px; color: #4b5563;">Photo (Optional)</label>
                    <input type="file" name="image" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 4px;">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 5px; color: #4b5563;">WhatsApp Number</label>
                    <input type="text" name="whatsapp" placeholder="+92300..." style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 4px;">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 5px; color: #4b5563;">Order</label>
                    <input type="number" name="order" value="0" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 4px;">
                </div>
                <div style="grid-column: span 2;">
                    <label style="display: block; margin-bottom: 5px; color: #4b5563;">Bio</label>
                    <textarea name="bio" rows="3" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 4px;"></textarea>
                </div>
            </div>
            <button type="submit" style="margin-top: 20px; background: var(--secondary-color); color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; font-weight: 500;">Add Member</button>
        </form>
    </div>

    <table class="recent-table">
        <thead>
            <tr>
                <th>Order</th>
                <th>Image</th>
                <th>Name</th>
                <th>Position</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $team; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($member->order); ?></td>
                    <td>
                        <?php if($member->image): ?>
                            <img src="<?php echo e(asset($member->image)); ?>" alt="" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                        <?php else: ?>
                            <div style="width: 40px; height: 40px; border-radius: 50%; background: #eee; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-user" style="color: #999;"></i>
                            </div>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($member->name); ?></td>
                    <td><?php echo e($member->position); ?></td>
                    <td>
                        <span style="padding: 2px 8px; border-radius: 10px; font-size: 0.8rem; background: <?php echo e($member->is_active ? '#d1fae5' : '#fee2e2'); ?>; color: <?php echo e($member->is_active ? '#065f46' : '#991b1b'); ?>">
                            <?php echo e($member->is_active ? 'Active' : 'Inactive'); ?>

                        </span>
                    </td>
                    <td>
                        <div style="display: flex; gap: 10px;">
                            <a href="<?php echo e(route('admin.team.edit', $member->id)); ?>" style="color: blue; text-decoration: none;">Edit</a>
                            <form action="<?php echo e(route('admin.team.delete', $member->id)); ?>" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" style="color: red; background: none; border: none; cursor: pointer; padding: 0;">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\mgvisa\resources\views/admin/team/index.blade.php ENDPATH**/ ?>