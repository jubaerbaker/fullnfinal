<?php $__env->startSection('content'); ?>

<div class="container">
<p>
<h1 class="text-center my-2">My courses</h1>
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card card-defult">
<table class="table">
      <thead>
        <th>Name</th>
         
        <th></th>
      </thead>
       
      <tbody>


        <?php $__currentLoopData = $courseApprovals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courseApproval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>     
              <?php if(auth()->user()->isAdmin() || Auth::id() === $courseApproval->user_id ): ?>
              <td>
                  <a href="<?php echo e(route('courses.show', $courseApproval->course_id)); ?>" > <?php echo e($courseApproval->course->name); ?></a>
                </td>
             
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