<?php $__env->startSection('content'); ?>
<h2> All Post for <?php echo e($categories->name); ?></h2>
<table class="table">
          

            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if($post->category->id === $categories->id): ?>
            <tr>
            
              <td>
                  <h4><a href="<?php echo e(route('post.show', $post->id)); ?>" > <?php echo e($post->title); ?></a></h4>
                </td>
              </tr>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        </table>   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>