<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">My Pofile</div>

    <div class="card-body">
      <?php echo $__env->make('partials.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <form action="<?php echo e(route('users.update-profile')); ?>" method="POST">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('PUT')); ?>


        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" id="name" value="<?php echo e($user->name); ?>">
        </div>

        <div class="form-group">
          <label for="about">About Me</label>
          <textarea name="about" id="about" cols="5" rows="5" class="form-control"><?php echo e($user->about); ?></textarea>
        </div>

        <button type="submit" class="btn btn-success">Update Profile</button>
      </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>