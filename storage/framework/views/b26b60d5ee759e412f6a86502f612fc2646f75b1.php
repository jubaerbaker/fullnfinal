<?php $__env->startSection('content'); ?>
<table class="table">
          <thead>
        <th>Name</th>
        <th>Status</th>
        <th></th>
      </thead>
        <?php
            $Approve_id = Auth::id();
        ?>
      <tbody>

            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td>
                  <?php echo e($course->name); ?>

          </td>
            <?php 
            $flag=0;
            $flag1=0;
             ?>
            
            <?php if(Auth::id()!== $course->user_id): ?>
            <?php $__currentLoopData = $courseApprovals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courseApproval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            
            <?php if($courseApproval->course_id === $course->id && Auth::id()=== $courseApproval->user_id && $courseApproval->status === 0): ?>
           
            <td>
              <form method="POST" action="<?php echo e(route('courseApproval.destroy', $courseApproval->id)); ?>">
                 <?php echo e(csrf_field()); ?>

                  <?php echo e(method_field('DELETE')); ?>

                   <button type="submit" class="btn btn-danger btn-sm">Cencel Request</button>
            </form>
             <?php 
            $flag=1;
            break;
             ?>
            </td>
            <?php endif; ?>
            <?php if($courseApproval->course_id === $course->id && Auth::id()=== $courseApproval->user_id && $courseApproval->status === 1): ?>
           
            <td>
              <form method="POST" action="<?php echo e(route('courseApproval.destroy', $courseApproval->id)); ?>">
                 <?php echo e(csrf_field()); ?>

                  <?php echo e(method_field('DELETE')); ?>

                   <button type="submit" class="btn btn-danger btn-sm">Exit</button>
            </form>
             <?php 
            $flag1=1;
            break;
             ?>
            </td>
            <?php endif; ?>
            
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php if($flag!==1 && $flag1!==1 ): ?>
             <td>
             <form method="POST" action="<?php echo e(route('courseApprove.approveMe',$course->id)); ?>">
                 <?php echo e(csrf_field()); ?>

                 <div class="form-group">
                  <input type="hidden" id="name" class="form-control" name="courseId" value="<?php echo e($course->id); ?>">
                </div>
                <div class="form-group">
                  <input type="hidden" id="name" class="form-control" name="ApproveId" value="<?php echo e($Approve_id); ?>">
                </div>
                <div class="form-group">
                  <input type="hidden" id="name" class="form-control" name="courseUserId" value="<?php echo e($course->user_id); ?>">
                </div>
                   <button type="submit" class="btn btn-success btn-sm">Add me</button>
            </form>
            
             <?php 
            $flag=0;
            $flag1=0;
             ?>
                 <?php endif; ?>
             <?php endif; ?>
            </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        
        </table>   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>