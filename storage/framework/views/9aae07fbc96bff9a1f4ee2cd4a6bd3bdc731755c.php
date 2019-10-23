<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">Notifications</div>

    <div class="card-body">
      <ul class="list-group">
          <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item">
              <?php if($notification->type === 'App\Notifications\NewReplyAdded'): ?>
                A new reply was added to your discussion
                <strong>
                    <?php echo e($notification->data['post']['title']); ?>

                </strong>
                <a href="<?php echo e(route('post.show', $notification->data['post']['id'])); ?>" class="btn float-right btn-sm btn-info">
                  View discussion
                </a>
              <?php endif; ?>
             
            </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>