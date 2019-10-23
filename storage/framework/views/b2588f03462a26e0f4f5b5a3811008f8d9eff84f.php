<?php $__env->startSection('mainContent'); ?>
    <h1 class="my-4">
        All Posts
    </h1>

    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- Blog Post -->
        <div class="card mb-4">
            <img class="card-img-top" src="<?php echo e(asset('images/'.$post->image)); ?>" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title"><?php echo e($post->title); ?></h2>
                <p class="card-text"><?php echo e($post->content); ?></p>
                <a href="<?php echo e(url('/single-post/'.$post->id)); ?>" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
                Posted on <?php echo e($post->created_at); ?>

            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>