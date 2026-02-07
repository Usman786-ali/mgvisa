

<?php $__env->startSection('title', 'Homepage Settings'); ?>

<?php $__env->startSection('content'); ?>
    <div style="padding: 2rem;">
        <div style="margin-bottom: 2rem;">
            <h1 style="font-size: 2rem; font-weight: 700; color: #1f2937;">Homepage Settings</h1>
            <p style="color: #6b7280; margin-top: 0.5rem;">Edit all homepage content, images, and text from here</p>
        </div>

        <?php if(session('success')): ?>
            <div
                style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);">
                <i class="fas fa-check-circle"></i> <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('admin.settings.updateHomepage')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <!-- Hero Section -->
            <?php if(isset($settings['homepage_hero'])): ?>
                <div
                    style="background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); padding: 2rem; margin-bottom: 2rem;">
                    <h2
                        style="font-size: 1.5rem; font-weight: 700; color: #1f2937; margin-bottom: 1.5rem; border-bottom: 2px solid #B8941F; padding-bottom: 0.75rem;">
                        <i class="fas fa-home"></i> Hero Section
                    </h2>

                    <div style="display: grid; gap: 1.5rem;">
                        <?php $__currentLoopData = $settings['homepage_hero']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($setting->key == 'hero_media_type'): ?>
                                <!-- Media Type Selector -->
                                <div style="background: #f9fafb; padding: 1.5rem; border-radius: 8px; border: 2px dashed #B8941F;">
                                    <label
                                        style="display: block; margin-bottom: 0.75rem; font-weight: 700; color: #1f2937; font-size: 1.1rem;">
                                        <i class="fas fa-photo-video"></i> Hero Background Type
                                    </label>
                                    <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                                        <label
                                            style="display: flex; align-items: center; gap: 0.5rem; padding: 0.75rem 1.25rem; background: white; border: 2px solid #d1d5db; border-radius: 8px; cursor: pointer; transition: all 0.3s;">
                                            <input type="radio" name="<?php echo e($setting->key); ?>" value="image" <?php echo e($setting->value == 'image' ? 'checked' : ''); ?> onclick="updateMediaUpload('image')">
                                            <i class="fas fa-image" style="color: #3b82f6;"></i>
                                            <span style="font-weight: 600;">Single Image</span>
                                        </label>
                                        <label
                                            style="display: flex; align-items: center; gap: 0.5rem; padding: 0.75rem 1.25rem; background: white; border: 2px solid #d1d5db; border-radius: 8px; cursor: pointer; transition: all 0.3s;">
                                            <input type="radio" name="<?php echo e($setting->key); ?>" value="video" <?php echo e($setting->value == 'video' ? 'checked' : ''); ?> onclick="updateMediaUpload('video')">
                                            <i class="fas fa-video" style="color: #ef4444;"></i>
                                            <span style="font-weight: 600;">Video</span>
                                        </label>
                                        <label
                                            style="display: flex; align-items: center; gap: 0.5rem; padding: 0.75rem 1.25rem; background: white; border: 2px solid #d1d5db; border-radius: 8px; cursor: pointer; transition: all 0.3s;">
                                            <input type="radio" name="<?php echo e($setting->key); ?>" value="slideshow" <?php echo e($setting->value == 'slideshow' ? 'checked' : ''); ?>

                                                onclick="updateMediaUpload('slideshow')">
                                            <i class="fas fa-images" style="color: #10b981;"></i>
                                            <span style="font-weight: 600;">Slideshow (Multiple Images)</span>
                                        </label>
                                    </div>
                                </div>

                            <?php elseif($setting->key == 'hero_media'): ?>
                                <!-- Media Upload Field -->
                                <div id="mediaUploadField"
                                    style="background: #fef3c7; padding: 1.5rem; border-radius: 8px; border: 2px solid #B8941F;">
                                    <label
                                        style="display: block; margin-bottom: 0.75rem; font-weight: 700; color: #1f2937; font-size: 1.1rem;">
                                        <i class="fas fa-upload"></i> Upload Media
                                    </label>

                                    <!-- Preview Area -->
                                    <?php if($setting->value): ?>
                                        <div style="margin-bottom: 1rem; padding: 1rem; background: white; border-radius: 8px;">
                                            <strong style="display: block; margin-bottom: 0.5rem; color: #065f46;">Current Media:</strong>
                                            <?php
                                                $mediaType = \App\Models\SiteSetting::where('key', 'hero_media_type')->value('value') ?? 'image';
                                                $mediaValue = $setting->value;
                                            ?>

                                            <?php if($mediaType == 'video'): ?>
                                                <video src="<?php echo e(asset($mediaValue)); ?>" controls
                                                    style="max-width: 300px; border-radius: 8px;"></video>
                                            <?php elseif($mediaType == 'slideshow'): ?>
                                                <?php
                                                    $images = json_decode($mediaValue, true) ?? [];
                                                ?>
                                                <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                                                    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <img src="<?php echo e(asset($img)); ?>" alt="Slide"
                                                            style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            <?php else: ?>
                                                <img src="<?php echo e(asset($mediaValue)); ?>" alt="Hero" style="max-width: 300px; border-radius: 8px;">
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <!-- File Input -->
                                    <input type="file" id="heroMediaInput" name="<?php echo e($setting->key); ?>" accept="image/*,video/*" multiple
                                        style="width: 100%; padding: 1rem; border: 2px dashed #9C7A1A; border-radius: 8px; background: white; cursor: pointer;">

                                    <small id="mediaHint"
                                        style="display: block; margin-top: 0.5rem; color: #6b7280; font-style: italic;">
                                        💡 Select one or multiple files based on your choice above
                                    </small>
                                </div>

                            <?php elseif($setting->type == 'textarea'): ?>
                                <div>
                                    <label
                                        style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151; text-transform: capitalize;">
                                        <?php echo e(str_replace('_', ' ', str_replace('hero_', '', $setting->key))); ?>

                                    </label>
                                    <textarea name="<?php echo e($setting->key); ?>" rows="3"
                                        style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 8px; font-family: inherit;"><?php echo e($setting->value); ?></textarea>
                                </div>

                            <?php else: ?>
                                <div>
                                    <label
                                        style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151; text-transform: capitalize;">
                                        <?php echo e(str_replace('_', ' ', str_replace('hero_', '', $setting->key))); ?>

                                    </label>
                                    <input type="text" name="<?php echo e($setting->key); ?>" value="<?php echo e($setting->value); ?>"
                                        style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 8px;">
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- About Section -->
            <?php if(isset($settings['homepage_about'])): ?>
                <div
                    style="background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); padding: 2rem; margin-bottom: 2rem;">
                    <h2
                        style="font-size: 1.5rem; font-weight: 700; color: #1f2937; margin-bottom: 1.5rem; border-bottom: 2px solid #B8941F; padding-bottom: 0.75rem;">
                        <i class="fas fa-info-circle"></i> About Section
                    </h2>

                    <div style="display: grid; gap: 1.5rem;">
                        <?php $__currentLoopData = $settings['homepage_about']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div>
                                <label
                                    style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151; text-transform: capitalize;">
                                    <?php echo e(str_replace('_', ' ', str_replace('about_', '', $setting->key))); ?>

                                </label>

                                <?php if($setting->type == 'textarea'): ?>
                                    <textarea name="<?php echo e($setting->key); ?>" rows="4"
                                        style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 8px; font-family: inherit;"><?php echo e($setting->value); ?></textarea>

                                <?php elseif($setting->type == 'image'): ?>
                                    <div style="display: flex; align-items: center; gap: 1rem;">
                                        <?php if($setting->value): ?>
                                            <img src="<?php echo e(asset($setting->value)); ?>" alt="Current"
                                                style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                                        <?php endif; ?>
                                        <input type="file" name="<?php echo e($setting->key); ?>" accept="image/*"
                                            style="flex: 1; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 8px;">
                                    </div>

                                <?php else: ?>
                                    <input type="text" name="<?php echo e($setting->key); ?>" value="<?php echo e($setting->value); ?>"
                                        style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 8px;">
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Stats Section -->
            <?php if(isset($settings['homepage_stats'])): ?>
                <div
                    style="background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); padding: 2rem; margin-bottom: 2rem;">
                    <h2
                        style="font-size: 1.5rem; font-weight: 700; color: #1f2937; margin-bottom: 1.5rem; border-bottom: 2px solid #B8941F; padding-bottom: 0.75rem;">
                        <i class="fas fa-chart-line"></i> Stats/Numbers Section
                    </h2>

                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">
                        <?php $__currentLoopData = $settings['homepage_stats']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div>
                                <label
                                    style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151; text-transform: capitalize;">
                                    <?php echo e(str_replace('_', ' ', str_replace('stats_', '', $setting->key))); ?>

                                </label>
                                <input type="number" name="<?php echo e($setting->key); ?>" value="<?php echo e($setting->value); ?>"
                                    style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 8px;">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Other Sections (Services, Why Choose Us, Packages, etc.) -->
            <?php $__currentLoopData = ['homepage_services', 'homepage_why', 'homepage_packages', 'homepage_process', 'homepage_contact']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(isset($settings[$group])): ?>
                    <div
                        style="background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); padding: 2rem; margin-bottom: 2rem;">
                        <h2
                            style="font-size: 1.5rem; font-weight: 700; color: #1f2937; margin-bottom: 1.5rem; border-bottom: 2px solid #B8941F; padding-bottom: 0.75rem; text-transform: capitalize;">
                            <i class="fas fa-edit"></i> <?php echo e(str_replace('_', ' ', str_replace('homepage_', '', $group))); ?> Section
                        </h2>

                        <div style="display: grid; gap: 1.5rem;">
                            <?php $__currentLoopData = $settings[$group]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div>
                                    <label
                                        style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #374151; text-transform: capitalize;">
                                        <?php echo e(str_replace('_', ' ', str_replace($group . '_', '', $setting->key))); ?>

                                    </label>

                                    <?php if($setting->type == 'textarea'): ?>
                                        <textarea name="<?php echo e($setting->key); ?>" rows="3"
                                            style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 8px; font-family: inherit;"><?php echo e($setting->value); ?></textarea>
                                    <?php else: ?>
                                        <input type="text" name="<?php echo e($setting->key); ?>" value="<?php echo e($setting->value); ?>"
                                            style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 8px;">
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <!-- Submit Button -->
            <div
                style="position: sticky; bottom: 2rem; background: white; padding: 1.5rem; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.15); display: flex; justify-content: flex-end; gap: 1rem;">
                <button type="submit"
                    style="background: linear-gradient(135deg, #9C7A1A 0%, #B8941F 100%); color: white; padding: 1rem 2rem; border-radius: 8px; border: none; cursor: pointer; font-weight: 600; font-size: 1rem; box-shadow: 0 4px 12px rgba(184, 148, 31, 0.3); display: inline-flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-save"></i> Save All Changes
                </button>
            </div>
        </form>
    </div>

    <script>
        function updateMediaUpload(type) {
            const input = document.getElementById('heroMediaInput');
            const hint = document.getElementById('mediaHint');
            const fileCount = document.getElementById('fileCount');
            
            if (type === 'image') {
                input.accept = 'image/*';
                input.removeAttribute('multiple');
                input.name = 'hero_media';
                hint.innerHTML = '📷 Upload a single background image (JPG, PNG, WebP)';
                if(fileCount) fileCount.style.display = 'none';
            } else if (type === 'video') {
                input.accept = 'video/*';
                input.removeAttribute('multiple');
                input.name = 'hero_media';
                hint.innerHTML = '🎥 Upload a background video (MP4, WebM recommended)';
                if(fileCount) fileCount.style.display = 'none';
            } else if (type === 'slideshow') {
                input.accept = 'image/*';
                input.setAttribute('multiple', 'multiple');
                input.name = 'hero_media[]';
                hint.innerHTML = '🖼️ <b>Hold CTRL (or Command) Key</b> and click to select multiple images.<br>Select 3-5 images for best results.';
                if(fileCount) fileCount.style.display = 'block';
            }
        }
        
        // File selection counter
        document.getElementById('heroMediaInput').addEventListener('change', function() {
            const count = this.files.length;
            let msg = '';
            if (count > 0) {
                if (this.getAttribute('multiple')) {
                    msg = `<span style="color: #059669; font-weight: bold;">✅ ${count} files selected</span>`;
                } else {
                    msg = `<span style="color: #059669; font-weight: bold;">✅ File selected: ${this.files[0].name}</span>`;
                }
            }
            
            let display = document.getElementById('fileCountDisplay');
            if (!display) {
                display = document.createElement('div');
                display.id = 'fileCountDisplay';
                display.style.marginTop = '0.5rem';
                this.parentNode.insertBefore(display, this.nextSibling); // Insert after input
            }
            display.innerHTML = msg;
        });

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function () {
            const selectedType = document.querySelector('input[name="hero_media_type"]:checked');
            if (selectedType) {
                updateMediaUpload(selectedType.value);
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\mgvisa\resources\views/admin/settings/homepage.blade.php ENDPATH**/ ?>