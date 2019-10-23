<?php $__env->startSection('content'); ?>
<h1 class="text-center my-5">Course Details</h1>

<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card card-default">
     <div class="card-body">
        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="form-group">
        <label for="name">Name</label>
        <p class="form-control"><?php echo e($course->name); ?></p>
        </div>
      	<div class="form-group">
        <label for="name">Description</label>
        <p class="form-control"><?php echo e($course->description); ?></p>
        </div>
        <div class="form-group">
        <label for="name">Schedule</label>
        <p class="form-control"><?php echo e($course->schedule); ?></p>
        </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
      </div>
         
      </div>
    </div>
  </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>