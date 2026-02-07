

<?php $__env->startSection('title', 'Contact Us - MG Visa Consultant'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">Contact <span class="gradient-text">Us</span></h1>
            <p class="page-subtitle">Get in touch with our expert team for all your visa needs</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-page">
        <div class="container">
            <div class="contact-wrapper">
                <div class="contact-info">
                    <h2 class="contact-heading">Let's Start Your Journey</h2>
                    <p class="contact-text">
                        Contact us today for a free consultation and let us help you achieve your travel dreams.
                    </p>

                    <div class="contact-details">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-text">
                                <h4>Phone</h4>
                                <a href="tel:+923002194957">+92 300 2194957</a>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-text">
                                <h4>Email</h4>
                                <a href="mailto:info@mgvisaconsultant.com">info@mgvisaconsultant.com</a>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <div class="contact-text">
                                <h4>WhatsApp</h4>
                                <a href="https://wa.me/923002194957">+92 300 2194957</a>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-text">
                                <h4>Office</h4>
                                <p>Office No. 1, Mezzanine Floor, Building No. 19-C, Phase 2 Extension, DHA, Karachi</p>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="contact-form-wrapper">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success"
                            style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; padding: 1.25rem; border-radius: 0.75rem; margin-bottom: 1.5rem; text-align: center; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3); animation: slideDown 0.5s ease;">
                            <i class="fas fa-check-circle"
                                style="font-size: 1.5rem; margin-right: 0.5rem; vertical-align: middle;"></i>
                            <strong style="font-size: 1.1rem; vertical-align: middle;"><?php echo e(session('success')); ?></strong>
                        </div>
                    <?php endif; ?>
                    <form action="<?php echo e(url('/inquiry')); ?>" method="POST" class="contact-form">
                        <?php echo csrf_field(); ?>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="country">Country of Interest</label>
                                <select id="country" name="country_of_interest">
                                    <option value="">Select Country</option>
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country->name); ?>"><?php echo e($country->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="visa_type">Visa Type</label>
                            <select id="visa_type" name="visa_type">
                                <option value="">Select Visa Type</option>
                                <?php $__currentLoopData = $visaTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visaType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($visaType->name); ?>"><?php echo e($visaType->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            <span>Send Message</span>
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Locate Us Section -->
    <section class="locate-us">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Locate <span class="gradient-text">Us</span></h2>
                <p class="section-description">Detailed map locations for our head office and branch</p>
            </div>

            <div class="maps-grid">
                <!-- Map 1: Head Office -->
                <div class="map-card">
                    <h3 class="map-title">Our Head Office</h3>
                    <div class="map-frame">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3620.9085657303335!2d67.0677384!3d24.832800300000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33d60eace38e1%3A0xff484eea25f9d107!2sMG%20food%20%26%20Event%20Planners!5e0!3m2!1sen!2s!4v1767711373051!5m2!1sen!2s"
                            width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy">
                        </iframe>
                    </div>
                </div>


            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\mgvisa\resources\views/pages/contact.blade.php ENDPATH**/ ?>