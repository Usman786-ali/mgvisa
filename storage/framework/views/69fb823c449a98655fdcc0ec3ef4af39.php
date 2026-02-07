

<?php $__env->startSection('header', 'Edit Country'); ?>

<?php $__env->startSection('content'); ?>
    <div class="card"
        style="background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); overflow: hidden;">
        <div class="card-body" style="padding: 30px;">
            <form action="<?php echo e(route('admin.countries.update', $country->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label style="display:block; margin-bottom:5px; font-weight:500; color:#4b5563;">Country
                            Name</label>
                        <input type="text" name="name" value="<?php echo e($country->name); ?>" required
                            style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:4px;">
                    </div>
                    <div>
                        <label style="display:block; margin-bottom:5px; font-weight:500; color:#4b5563;">Processing
                            Time</label>
                        <input type="text" name="processing_time" value="<?php echo e($country->processing_time); ?>"
                            style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:4px;">
                    </div>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display:block; margin-bottom:5px; font-weight:500; color:#4b5563;">Short
                        Description</label>
                    <input type="text" name="short_description" value="<?php echo e($country->short_description); ?>" required
                        style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:4px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display:block; margin-bottom:5px; font-weight:500; color:#4b5563;">Full
                        Description</label>
                    <textarea name="description" required rows="4"
                        style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:4px;"><?php echo e($country->description); ?></textarea>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display:block; margin-bottom:5px; font-weight:500; color:#4b5563;">Requirements</label>
                    <textarea name="requirements" rows="3"
                        style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:4px;"><?php echo e($country->requirements); ?></textarea>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label style="display:block; margin-bottom:5px; font-weight:500; color:#4b5563;">Visa Fees
                            ($)</label>
                        <input type="number" name="fees" step="0.01" value="<?php echo e($country->fees); ?>"
                            style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:4px;">
                    </div>
                    <div>
                        <label style="display:block; margin-bottom:5px; font-weight:500; color:#4b5563;">Display
                            Order</label>
                        <input type="number" name="order" value="<?php echo e($country->order); ?>"
                            style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:4px;">
                    </div>
                    <div>
                        <label style="display:block; margin-bottom:10px; font-weight:500; color:#4b5563;">Popular
                            Country?</label>
                        <input type="checkbox" name="is_popular" value="1" <?php echo e($country->is_popular ? 'checked' : ''); ?>

                            style="width: 20px; height: 20px;">
                    </div>
                </div>

                <div style="text-align: right;">
                    <a href="<?php echo e(route('admin.countries.index')); ?>"
                        style="color: #6b7280; text-decoration: none; margin-right: 15px;">Cancel</a>
                    <button type="submit"
                        style="background: var(--secondary-color); color: white; border: none; padding: 12px 25px; border-radius: 4px; font-weight: 600; cursor: pointer;">Update
                        Country</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\mgvisa\resources\views/admin/countries/edit.blade.php ENDPATH**/ ?>