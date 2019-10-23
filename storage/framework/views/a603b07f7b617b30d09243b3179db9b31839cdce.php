
<?php $__env->startSection('content'); ?>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">All course</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All course</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="content-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card card-default">
                        <div class="card-body">
                            <?php if(auth()->user()->isAdmin() || auth()->user()->isTeacher() ): ?>
                                <div><a class="btn btn-primary" href="<?php echo e(route('courses.create')); ?>">Add course</a>
                                </div>
                            <?php endif; ?>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>


                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <?php $flag = 0; ?>

                                        <?php if(auth()->user()->isAdmin() || Auth::id() === $course->user_id ): ?>
                                            <td>
                                                <a href="<?php echo e(route('courses.show', $course->id)); ?>"> <?php echo e($course->name); ?></a>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('courses.edit', $course->id)); ?>"
                                                   class="btn btn-info btn-sm">
                                                    Edit
                                                </a></td>
                                            <td>
                                                <form method="POST"
                                                      action="<?php echo e(route('courses.destroy', $course->id)); ?>">
                                                    <?php echo e(csrf_field()); ?>

                                                    <?php echo e(method_field('DELETE')); ?>

                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                            <?php
                                            $courseApproval = (object)array('id' => 0);
                                            ?>
                                            <?php $__currentLoopData = $courseApprovals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courseApproval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($courseApproval->course_id ===  $course->id && Auth::id() ===$courseApproval->user_id): ?>
                                                    <?php
                                                    $flag = 1; ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($flag=== 0): ?>

                                                <td>
                                                    <form method="POST"
                                                          action="<?php echo e(route('courseApprove.approveMyCourse',$courseApproval->id)); ?>">
                                                        <?php echo e(csrf_field()); ?>

                                                        <div class="form-group">
                                                            <input type="hidden" id="name" class="form-control"
                                                                   name="courseId"
                                                                   value="<?php echo e($course->id); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" id="name" class="form-control"
                                                                   name="ApproveId"
                                                                   value="<?php echo e(Auth::id()); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" id="name" class="form-control"
                                                                   name="courseUserId"
                                                                   value="<?php echo e($course->user_id); ?>">
                                                        </div>
                                                        <button type="submit" class="btn btn-success btn-sm">Add me
                                                        </button>
                                                    </form>
                                                </td>

                                            <?php endif; ?>
                                            
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>