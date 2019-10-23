<?php $__env->startSection('content'); ?>
<div class="container">
<p>
<h1 class="text-center my-2">All Post</h1>
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card card-defult">
  <?php if($posts->count() > 0): ?>
<table class="table">
      <thead>
        <th>Title</th>
          <th>Description</th>
        <th></th>
      </thead>
      <tbody>
      

        <?php $__currentLoopData = $courseApprovals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courseApproval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(Auth::id()===$courseApproval->user_id): ?>
        
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <?php if($courseApproval->course_id === $category->course_id): ?>
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($post->category_id=== $category->id): ?>
         <tr>
        <td>
          <?php echo e($post->title); ?>

        </td>
        <td>
          <?php echo e($post->description); ?>

        </td>
         </tr>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


      
      </tbody>
    </table>
</ul>
</p>
<?php else: ?>
      <h3 class="text-center">No Posts Yet</h3>
    <?php endif; ?>
				</div>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>