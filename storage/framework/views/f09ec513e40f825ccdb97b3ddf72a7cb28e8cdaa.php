<?php $__env->startSection('content'); ?>
<h2> All Categories for <?php echo e($courses->name); ?></h2>
<table class="table">
          

            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if($category->course_id === $courses->id): ?>
            <tr>
            
              <td>
                   <a href="<?php echo e(route('categories.show', $category->id)); ?>" ><?php echo e($category->name); ?></a>
                </td>
              </tr>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        </table>   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>