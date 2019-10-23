<?php $__env->startSection('content'); ?>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create course</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create course</li>
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
                            <form action="<?php echo e(isset($course) ? route('courses.update', $course->id) : route('courses.store')); ?>"
                                  method="POST">
                                <?php echo e(csrf_field()); ?>

                                <?php if(isset($course)): ?>
                                    
                                    <input type="hidden" name="_method" value="PUT">
                                <?php endif; ?>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                           value="<?php echo e(isset($course) ? $course->name : ''); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="name">Description</label>
                                    <input type="text" id="name" class="form-control" name="description"
                                           value="<?php echo e(isset($course) ? $course->description : ''); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="name">Schedule</label>
                                    <input type="text" id="name" class="form-control" name="schedule"
                                           value="<?php echo e(isset($course) ? $course->schedule : ''); ?>">
                                </div>


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