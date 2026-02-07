

<?php $__env->startSection('title', 'Edit Package'); ?>

<?php $__env->startSection('content'); ?>
    <div style="padding: 2rem;">
        <div style="margin-bottom: 2rem;">
            <a href="<?php echo e(route('admin.packages.index')); ?>" style="color: #3b82f6; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 1rem;">
                <i class="fas fa-arrow-left"></i> Back to Packages
            </a>
            <h1 style="font-size: 2rem; font-weight: 700; color: #1f2937;">Edit <?php echo e($package->name); ?></h1>
            <p style="color: #6b7280; margin-top: 0.5rem;">Update package details and features</p>
        </div>

        <?php if($errors->any()): ?>
            <div style="background: #fee2e2; border: 1px solid #fca5a5; color: #991b1b; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
                <strong>Please fix the following errors:</strong>
                <ul style="margin: 0.5rem 0 0 1.5rem;">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('admin.packages.update', $package->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div style="background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); padding: 2rem; margin-bottom: 2rem;">
                <h2 style="font-size: 1.5rem; font-weight: 700; color: #1f2937; margin-bottom: 1.5rem; border-bottom: 2px solid #B8941F; padding-bottom: 0.75rem;">
                    <i class="fas fa-info-circle"></i> Basic Information
                </h2>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">Package Name</label>
                        <input type="text" name="name" value="<?php echo e(old('name', $package->name)); ?>" required
                            style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;">
                    </div>

                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">Category</label>
                        <select name="category" required style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;">
                            <option value="standard" <?php echo e(old('category', $package->category) == 'standard' ? 'selected' : ''); ?>>Standard Umrah</option>
                            <option value="ramadan" <?php echo e(old('category', $package->category) == 'ramadan' ? 'selected' : ''); ?>>Ramadan Special</option>
                        </select>
                    </div>

                    <div>
                         <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">Tier / Type</label>
                         <input type="text" name="type" value="<?php echo e(old('type', $package->type)); ?>" required placeholder="e.g. Gold, Silver, Basic"
                             style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;">
                    </div>

                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">Price (USD)</label>
                        <input type="number" name="price" value="<?php echo e(old('price', $package->price)); ?>" required min="0" step="0.01"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;">
                    </div>

                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">Duration</label>
                        <input type="text" name="duration" value="<?php echo e(old('duration', $package->duration)); ?>" required
                            placeholder="e.g., 15 Days - Economy"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;">
                    </div>

                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151;">Icon Class</label>
                        <input type="text" name="icon" value="<?php echo e(old('icon', $package->icon)); ?>" required
                            placeholder="e.g., fas fa-kaaba"
                            style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;">
                        <small style="color: #6b7280; font-size: 0.875rem;">Use Font Awesome icon classes</small>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-top: 1.5rem;">
                    <div>
                        <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                            <input type="checkbox" name="is_popular" value="1" <?php echo e(old('is_popular', $package->is_popular) ? 'checked' : ''); ?>

                                style="width: 20px; height: 20px; cursor: pointer;">
                            <span style="font-weight: 600; color: #374151;">Mark as "Best Value"</span>
                        </label>
                    </div>

                    <div>
                        <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                            <input type="checkbox" name="is_active" value="1" <?php echo e(old('is_active', $package->is_active) ? 'checked' : ''); ?>

                                style="width: 20px; height: 20px; cursor: pointer;">
                            <span style="font-weight: 600; color: #374151;">Active (Show on website)</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Features Section -->
            <div style="background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); padding: 2rem; margin-bottom: 2rem;">
                <h2 style="font-size: 1.5rem; font-weight: 700; color: #1f2937; margin-bottom: 1.5rem; border-bottom: 2px solid #B8941F; padding-bottom: 0.75rem;">
                    <i class="fas fa-list"></i> Package Features
                </h2>

                <div id="features-container">
                    <?php $__currentLoopData = $package->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="feature-row" style="display: grid; grid-template-columns: 1fr auto auto; gap: 1rem; margin-bottom: 1rem; padding: 1rem; background: #f9fafb; border-radius: 8px;">
                            <div>
                                <input type="text" name="feature_text[]" value="<?php echo e($feature['text']); ?>" 
                                    placeholder="Feature description"
                                    style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 8px;">
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; white-space: nowrap;">
                                    <input type="checkbox" name="feature_included[<?php echo e($index); ?>]" value="1" <?php echo e($feature['included'] ? 'checked' : ''); ?>

                                        style="width: 20px; height: 20px; cursor: pointer;">
                                    <span style="font-weight: 600; color: #374151;">Included</span>
                                </label>
                            </div>
                            <button type="button" onclick="this.parentElement.remove()" 
                                style="background: #ef4444; color: white; padding: 0.5rem 1rem; border-radius: 8px; border: none; cursor: pointer;">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <button type="button" onclick="addFeature()" 
                    style="background: #10b981; color: white; padding: 0.75rem 1.5rem; border-radius: 8px; border: none; cursor: pointer; font-weight: 600; margin-top: 1rem;">
                    <i class="fas fa-plus"></i> Add Feature
                </button>
            </div>

            <!-- Submit -->
            <div style="position: sticky; bottom: 2rem; background: white; padding: 1.5rem; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.15); display: flex; justify-content: flex-end; gap: 1rem;">
                <a href="<?php echo e(route('admin.packages.index')); ?>" 
                   style="background: #6b7280; color: white; padding: 1rem 2rem; border-radius: 8px; text-decoration: none; font-weight: 600;">
                    Cancel
                </a>
                <button type="submit" 
                    style="background: linear-gradient(135deg, #9C7A1A 0%, #B8941F 100%); color: white; padding: 1rem 2rem; border-radius: 8px; border: none; cursor: pointer; font-weight: 600; font-size: 1rem; box-shadow: 0 4px 12px rgba(184, 148, 31, 0.3);">
                    <i class="fas fa-save"></i> Save Changes
                </button>
            </div>
        </form>
    </div>

    <script>
        let featureIndex = <?php echo e(count($package->features)); ?>;
        
        function addFeature() {
            const container = document.getElementById('features-container');
            const newRow = document.createElement('div');
            newRow.className = 'feature-row';
            newRow.style.cssText = 'display: grid; grid-template-columns: 1fr auto auto; gap: 1rem; margin-bottom: 1rem; padding: 1rem; background: #f9fafb; border-radius: 8px;';
            newRow.innerHTML = `
                <div>
                    <input type="text" name="feature_text[]" placeholder="Feature description"
                        style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 8px;">
                </div>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; white-space: nowrap;">
                        <input type="checkbox" name="feature_included[${featureIndex}]" value="1" checked
                            style="width: 20px; height: 20px; cursor: pointer;">
                        <span style="font-weight: 600; color: #374151;">Included</span>
                    </label>
                </div>
                <button type="button" onclick="this.parentElement.remove()" 
                    style="background: #ef4444; color: white; padding: 0.5rem 1rem; border-radius: 8px; border: none; cursor: pointer;">
                    <i class="fas fa-trash"></i>
                </button>
            `;
            container.appendChild(newRow);
            featureIndex++;
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\mgvisa\resources\views/admin/packages/edit.blade.php ENDPATH**/ ?>