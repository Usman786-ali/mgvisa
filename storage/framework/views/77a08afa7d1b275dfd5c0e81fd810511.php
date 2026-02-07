

<?php $__env->startSection('header', 'Manage Blogs'); ?>

<?php $__env->startSection('content'); ?>
    <div
        style="background: white; padding: 20px; border-radius: 8px; margin-bottom: 30px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="margin: 0;">Recent Blogs</h3>
            <a href="<?php echo e(route('admin.blogs.create')); ?>"
                style="background: var(--secondary-color); color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; font-weight: 500;">Add
                New Blog</a>
        </div>

        <table class="recent-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php if($blog->image): ?>
                                <img src="<?php echo e(asset($blog->image)); ?>" alt=""
                                    style="width: 50px; height: 35px; object-fit: cover; border-radius: 4px;">
                            <?php else: ?>
                                <div style="width: 50px; height: 35px; background: #eee; border-radius: 4px;"></div>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($blog->title); ?></td>
                        <td><?php echo e($blog->author); ?></td>
                        <td><?php echo e($blog->published_at ? $blog->published_at->format('M d, Y') : 'Draft'); ?></td>
                        <td>
                            <span
                                style="padding: 2px 8px; border-radius: 10px; font-size: 0.8rem; background: <?php echo e($blog->is_active ? '#d1fae5' : '#fee2e2'); ?>; color: <?php echo e($blog->is_active ? '#065f46' : '#991b1b'); ?>">
                                <?php echo e($blog->is_active ? 'Published' : 'Draft'); ?>

                            </span>
                        </td>
                        <td>
                            <div style="display: flex; gap: 10px;">
                                <a href="<?php echo e(route('admin.blogs.edit', $blog->id)); ?>"
                                    style="color: blue; text-decoration: none;">Edit</a>
                                <form action="<?php echo e(route('admin.blogs.destroy', $blog->id)); ?>" method="POST"
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
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\mgvisa\resources\views/admin/blogs/index.blade.php ENDPATH**/ ?>