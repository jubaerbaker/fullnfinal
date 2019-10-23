<?php $__env->startSection('mainContent'); ?>

    <!-- Title -->
    <h1 class="mt-4"><?php echo e($post->title); ?></h1>

    <hr>

    <!-- Date/Time -->
    <p>Posted on <?php echo e($post->created_at); ?></p>

    <hr>

    <!-- Preview Image -->
    <img class="img-fluid rounded" src="<?php echo e(asset('images/'.$post->image)); ?>" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead"><?php echo e($post->content); ?></p>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>