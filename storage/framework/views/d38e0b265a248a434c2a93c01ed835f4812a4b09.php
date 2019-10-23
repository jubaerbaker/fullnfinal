<?php $__env->startSection('content'); ?>

<div class="container">
<p>
<h1 class="text-center my-2">All course</h1>
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card card-defult">
  <?php if(auth()->user()->isAdmin() || auth()->user()->isTeacher() ): ?>
	<div> <a class="btn btn-primary" href="<?php echo e(route('courses.create')); ?>">Add course</a></div>
  <?php endif; ?>
<table class="table">
      <thead>
        <th>Name</th>
         
        <th></th>
      </thead>
       
      <tbody>
        

        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>   
          <?php $flag=0; ?>
              
              <?php if(auth()->user()->isAdmin() || Auth::id() === $course->user_id ): ?>
              <td>
                  <a href="<?php echo e(route('courses.show', $course->id)); ?>" > <?php echo e($course->name); ?></a>
                </td>
             <td> 
              <a href="<?php echo e(route('courses.edit', $course->id)); ?>" class="btn btn-info btn-sm">
                Edit
             </a></td>
             <td>
             <form method="POST" action="<?php echo e(route('courses.destroy', $course->id)); ?>">
                 <?php echo e(csrf_field()); ?>

                  <?php echo e(method_field('DELETE')); ?>

                   <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
            </td>
            
            <?php $__currentLoopData = $courseApprovals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courseApproval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($courseApproval->course_id ===  $course->id && Auth::id() ===$courseApproval->user_id): ?>
              <?php $flag=1;
               break;?>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if($flag=== 0): ?>

            <td>
            <form method="POST" action="<?php echo e(route('courseApprove.approveMyCourse',$courseApproval->id)); ?>">
                 <?php echo e(csrf_field()); ?>

                 <div class="form-group">
                  <input type="hidden" id="name" class="form-control" name="courseId" value="<?php echo e($course->id); ?>">
                </div>
                <div class="form-group">
                  <input type="hidden" id="name" class="form-control" name="ApproveId" value="<?php echo e(Auth::id()); ?>">
                </div>
                <div class="form-group">
                  <input type="hidden" id="name" class="form-control" name="courseUserId" value="<?php echo e($course->user_id); ?>">
                </div>
                   <button type="submit" class="btn btn-success btn-sm">Add me</button>
            </form>
              </td>

            <?php endif; ?>
            <?php endif; ?>  
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
</ul>
</p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>