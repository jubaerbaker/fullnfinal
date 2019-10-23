<?php $__env->startSection('content'); ?>

    <div class="login-box">
        <div class="login-logo">
            <h4>Register as a new member</h4>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <form class="form-horizontal" method="POST" action="<?php echo e(route('register')); ?>">
                    <?php echo e(csrf_field()); ?>


                    <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                        <label for="name" class="col-md-4 control-label">Name</label>
                        <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>"
                               placeholder="Name"
                               required autofocus>

                        <?php if($errors->has('name')): ?>
                            <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>"
                               placeholder="E-Mail Address" required>

                        <?php if($errors->has('email')): ?>
                            <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                        <input id="password" placeholder="Password" type="password" class="form-control" name="password"
                               required>

                        <?php if($errors->has('password')): ?>
                            <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password"
                               name="password_confirmation" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>