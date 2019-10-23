<?php $__env->startSection('content'); ?>

<h1 class="text-center my-5">Create Category</h1>

<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card card-default">
      <div class="card-header"><?php echo e(isset($category)? 'Update Category':'Create new Category'); ?></div>
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
        <form action="<?php echo e(isset($category) ? route('categories.update', $category->id) : route('categories.store')); ?>" method="POST">
          <?php echo e(csrf_field()); ?>

      <?php if(isset($category)): ?>
        <?php echo e(method_field('PUT')); ?>

      <?php endif; ?>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" class="form-control" name="name" value="<?php echo e(isset($category) ? $category->name : ''); ?>">
      </div>
      <div class="form-group">
        <label for="course">Course</label>
        <select name="course" id="course" class="form-control">
          <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($course->id); ?>"
                <?php if(isset($category)): ?>
                  <?php if($course->id === $category->course_id): ?>
                    selected
                  <?php endif; ?>
                <?php endif; ?>
              >
              <?php echo e($course->name); ?>

            </option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
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