
<?php $__env->startSection('content'); ?>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Course Approval Request</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Course Approval List</li>
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
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Course Name</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $courseApprovals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courseApproval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($courseApproval->course): ?>
                                        <?php if(Auth::id()===$courseApproval->course_user_id): ?>
                                            <tr>
                                                <td>
                                                    <?php echo e($courseApproval->user->name); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($courseApproval->course->name); ?>

                                                </td>
                                                <td>
                                                    <?php if($courseApproval->status === 0): ?>

                                                        <form action="<?php echo e(route('courseApproval.update',$courseApproval->id)); ?>"
                                                              method="POST">
                                                            <?php echo e(csrf_field()); ?>

                                                            <?php if(isset($courseApproval)): ?>
                                                                <?php echo e(method_field('PUT')); ?>

                                                            <?php endif; ?>

                                                            <button type="submit" class="btn btn-success btn-sm">Accept
                                                            </button>
                                                        </form>
                                                    <?php else: ?>
                                                        <form method="POST"
                                                              action="<?php echo e(route('courseApproval.destroy', $courseApproval->id)); ?>">
                                                            <?php echo e(csrf_field()); ?>

                                                            <?php echo e(method_field('DELETE')); ?>

                                                            <button type="submit" class="btn btn-danger btn-sm">Delete
                                                            </button>
                                                        </form>

                                                    <?php endif; ?>
                                                </td>
                                            </tr>

                                        <?php endif; ?>
                                    <?php endif; ?>
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