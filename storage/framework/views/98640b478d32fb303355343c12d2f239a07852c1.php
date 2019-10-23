<?php $__env->startSection('content'); ?>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">All Polls</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All polls</li>
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
                                    <th>Course Name</th>
                                    <th>Answer</th>
                                    <th>Total Votes</th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php $__currentLoopData = $polls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $poll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $course = \Illuminate\Support\Facades\DB::table('courses')->where('id', $poll->course_id)->first();
                                    ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo e(route('courses.show', $course->id)); ?>"> <?php echo e($course->name); ?></a>
                                        </td>
                                        <td>
                                            <?php echo e($poll->answer); ?>

                                        </td>
                                        <td>
                                            <?php echo e($poll->total_answer); ?>

                                        </td>
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