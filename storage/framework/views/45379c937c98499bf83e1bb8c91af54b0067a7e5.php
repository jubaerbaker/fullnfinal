<?php $__env->startSection('content'); ?>
<!-- Header -->
<header class="header text-white h-fullscreen pb-80" style="background-image: url(<?php echo e(asset($post->image)); ?>);" data-overlay="9">
  <div class="container text-center">
    <div class="row h-100">
      <div class="col-lg-8 mx-auto align-self-center">

        <h1 class="display-4 mt-7 mb-8"><?php echo e($post->title); ?></h1>
        <p><span class="opacity-70 mr-1">By</span> <a class="text-white" href="#">
          <?php echo e($post->user->name); ?>

        </a></p>
        <p><img class="avatar avatar-sm" src="/images/<?php echo e($post->image); ?>" alt="..." height='100px' weight='100px'></p>
        <p><?php echo e($post->description); ?></p>
      </div>

      <div class="col-12 align-self-end text-center">
        <a class="scroll-down-1 scroll-down-white" href="#section-content"><span></span></a>
      </div>
       
    </div>

  </div>
</header><!-- /.header -->
<?php $__currentLoopData = $replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($reply->post_id === $post->id): ?>
<div class="card my-5">
    <div class="card-header">
      <div class="d-flex justify-content-between">
        <div>
          <b><?php echo e($reply->user->name); ?></b>
          <?php echo e(strip_tags($reply->content)); ?>

  </div>
    </div>
      </div>
      </div>
      <?php endif; ?> 
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <div class='card-header'>
    Add a replay
  </div>

  <div class="card-body">

    <div class="form-group">
      <form action="<?php echo e(route('replies.store',$post->id)); ?>" method="POST">
        <?php echo e(csrf_field()); ?>

      <input id="content" type="hidden" name="content"  >
        <trix-editor input="content"></trix-editor>
    <button type="submit" class="btn btn-sm my-2 btn-success">
      Add replay
    </button>
</form>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.css"> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>