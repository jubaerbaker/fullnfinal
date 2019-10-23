<?php $__env->startSection('content'); ?>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
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
                            <?php if($users->count() > 0): ?>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>

                                            <td>
                                                <?php echo e($user->name); ?>

                                            </td>
                                            <td>
                                                <?php echo e($user->email); ?>

                                            </td>
                                            <td>
                                                <?php if(!$user->isAdmin()): ?>
                                                    <form action="<?php echo e(route('users.make-admin', $user->id)); ?>"
                                                          method="POST">
                                                        <?php echo e(csrf_field()); ?>

                                                        <button type="submit" class="btn btn-success btn-sm">Make
                                                            Admin
                                                        </button>
                                                    </form>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if(!$user->isTeacher()): ?>
                                                    <form action="<?php echo e(route('users.make-teacher', $user->id)); ?>"
                                                          method="POST">
                                                        <?php echo e(csrf_field()); ?>

                                                        <button type="submit" class="btn btn-success btn-sm">Make
                                                            Teacher
                                                        </button>
                                                    </form>
                                                <?php endif; ?>
                                            </td>

                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <h3 class="text-center">No Users Yet</h3>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>