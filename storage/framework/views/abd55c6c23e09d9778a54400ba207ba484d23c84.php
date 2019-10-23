<?php $__env->startSection('content'); ?>

    <div class="login-box">
        <div class="login-logo">
            <h4>Sign in to start your session</h4>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <form class="form-horizontal" method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo e(csrf_field()); ?>


                    <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>"
                               required
                               placeholder="E-Mail Address" autofocus>

                        <?php if($errors->has('email')): ?>
                            <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                        <input id="password" type="password" class="form-control" placeholder="Password" name="password"
                               required>

                        <?php if($errors->has('password')): ?>
                            <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember
                                Me
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>