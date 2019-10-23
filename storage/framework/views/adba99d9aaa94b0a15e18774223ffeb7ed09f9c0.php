<?php $__env->startSection('content'); ?>

<h1 class="text-center my-5">Create Tag</h1>

<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card card-default">
      <div class="card-header"><?php echo e(isset($tag)? 'Update Tag':'Create new Tag'); ?></div>
      <div class="card-body">

         <?php echo $__env->make('partials.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <form action="<?php echo e(isset($tag) ? route('tags.update', $tag->id) : route('tags.store')); ?>" method="POST">
          <?php echo e(csrf_field()); ?>

      <?php if(isset($tag)): ?>
        <?php echo e(method_field('PUT')); ?>

      <?php endif; ?>
               <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" class="form-control" name="name" value="<?php echo e(isset($tag) ? $tag->name : ''); ?>">
      </div>
          <div class="form-group text-center">

            <button type="submit" class="btn btn-success">Submit</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>