<?php $__env->startSection('content'); ?>
<div class="container">
<p>
<h1 class="text-center my-2">All Tag</h1>
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card card-defult">
  <div> <a class="btn btn-primary" href="<?php echo e(route('tags.create')); ?>">Add Tag</a></div>
<table class="table">
      <thead>
        <th>Name</th>
         <th>Posts Count</th>
        <th></th>
      </thead>
      <tbody>
        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td>
              <?php echo e($tag->name); ?>

            </td>
           <td>
              <?php echo e($tag->posts->count()); ?>

            </td>
             <td> 
              <a href="<?php echo e(route('tags.edit', $tag->id)); ?>" class="btn btn-info btn-sm">
                Edit
             </a></td>
             <td>
             <form method="POST" action="<?php echo e(route('tags.destroy', $tag->id)); ?>">
                 <?php echo e(csrf_field()); ?>

                  <?php echo e(method_field('DELETE')); ?>

                   <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
            </td>
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