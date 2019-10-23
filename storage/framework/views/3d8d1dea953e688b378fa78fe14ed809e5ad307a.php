<?php $__env->startSection('content'); ?>

<h1 class="text-center my-5">Create course</h1>

<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card card-default">
      <div class="card-header"><?php echo e(isset($course)? 'Update course':'Create new course'); ?></div>
      <div class="card-body">

      	 <?php if($errors->any()): ?>
          <div class="alert alert-danger">
            <ul class="list-group">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li class="list-group-item">
                    <?php echo e($error); ?>

                  </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
        <?php endif; ?>
        <form action="<?php echo e(isset($course) ? route('courses.update', $course->id) : route('courses.store')); ?>" method="POST">
          <?php echo e(csrf_field()); ?>

      <?php if(isset($course)): ?>
        <?php echo e(method_field('PUT')); ?>

      <?php endif; ?>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" class="form-control" name="name" value="<?php echo e(isset($course) ? $course->name : ''); ?>">
      </div>
      <div class="form-group">
        <label for="name">Description</label>
        <input type="text" id="name" class="form-control" name="description" value="<?php echo e(isset($course) ? $course->description : ''); ?>">
      </div>
      <div class="form-group">
        <label for="name">Schedule</label>
        <input type="text" id="name" class="form-control" name="schedule" value="<?php echo e(isset($course) ? $course->schedule : ''); ?>">
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