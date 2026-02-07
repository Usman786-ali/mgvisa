

<?php $__env->startSection('content'); ?>
    <div class="container" style="padding: 150px 0 100px;">
        <div class="row justify-content-center" style="display:flex; justify-content:center;">
            <div class="col-md-6" style="max-width:400px; width:100%;">
                <div class="card" style="box-shadow: 0 4px 12px rgba(0,0,0,0.1); border-radius: 10px; overflow:hidden;">
                    <div class="card-header"
                        style="background:var(--primary-color); color:white; padding: 15px; text-align:center; font-weight:bold;">
                        Admin Login</div>

                    <div class="card-body" style="padding: 30px;">
                        <form method="POST" action="<?php echo e(route('login')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="form-group mb-3" style="margin-bottom: 15px;">
                                <label for="email" class="form-label">Email Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>"
                                    required autofocus
                                    style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert" style="color:red; font-size:0.9em;">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group mb-3" style="margin-bottom: 20px;">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required
                                    style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert" style="color:red; font-size:0.9em;">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary"
                                    style="width:100%; padding: 12px; background:var(--primary-color); color:white; border:none; border-radius:5px; cursor:pointer; font-weight:bold;">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\mgvisa\resources\views/auth/login.blade.php ENDPATH**/ ?>