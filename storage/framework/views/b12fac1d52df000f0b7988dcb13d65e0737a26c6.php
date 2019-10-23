<?php $__env->startSection('content'); ?>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create Poll</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Poll</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="content-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3"></div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="card card-default">
                        <div class="card-body">
                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <ul class="list-group">
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="list-group-item">
                                                <?php echo e($error); ?>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <form action="<?php echo e(action('PollAnswerController@store')); ?>"
                                  method="POST">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <td>Name</td>
                                            <td>Question</td>
                                            <td>Answer</td>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                                <?php $__currentLoopData = $polls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $poll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php 
                                    $course = \App\Course::where('id', $poll->course_id)->first();
                                    $options = json_decode($poll->options);
                                    if($course) {
                                    ?>
                                    <div class="form-group">
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <?= $course->name; ?>
                                                    <input type="hidden" name="course_id[]" value="<?= $poll->course_id; ?>">
                                                </td>
                                                <td><?= $poll->question; ?></td>
                                                <td>
                                                    <?php
                                                    foreach($options as $option) { ?>
                                                       <?= $option; ?> <input type="radio" name="answer[<?php echo e($poll->course_id); ?>]" value="<?= $option; ?>" >
                                                   <?php }
                                                    ?>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php } ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>