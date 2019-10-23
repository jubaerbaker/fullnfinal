<?php $__env->startSection('content'); ?>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">My All Post</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">My All Post</li>
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
                            <div><a class="btn btn-primary" href="<?php echo e(url('/post/create')); ?>">Add post</a></div>
                            <?php if($posts->count() > 0): ?>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(Auth::id() === $post->user_id || auth()->user()->isAdmin()): ?>
                                            <tr>
                                                <td><a href="<?php echo e(route('post.show', $post->id)); ?>"><?php echo e($post->title); ?></a>
                                                </td>
                                                <td>

                                                    <?php echo e($post->category ? $post->category->name : ''); ?>

                                                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($post->category->course_id === $course->id): ?>
                                                    <?php echo e($course->name); ?>

                                                    <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </a>
                                                </td>
                                                <?php if($post->trashed()): ?>
                                                    <td>
                                                        <form action="<?php echo e(route('restore_posts', $post->id)); ?>"
                                                              method="POST">
                                                            <?php echo e(csrf_field()); ?>

                                                            <?php echo e(method_field('PUT')); ?>

                                                            <button type="submit" class="btn btn-info btn-sm">Restore
                                                            </button>
                                                        </form>
                                                    </td>
                                                <?php else: ?>
                                                    <td>
                                                        <a href="<?php echo e(route('post.edit', $post->id)); ?>"
                                                           class="btn btn-info btn-sm">Edit</a>
                                                    </td>
                                                <?php endif; ?>
                                                <td>
                                                    <form method="POST" action="<?php echo e(route('post.destroy', $post->id)); ?>">
                                                        <?php echo e(csrf_field()); ?>

                                                        <?php echo e(method_field('DELETE')); ?>

                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <?php echo e($post->trashed() ? 'Delete':'Trash'); ?>

                                                        </button>
                                                    </form>
                                                </td>

                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </tbody>
                                </table>
                            <?php else: ?>
                                <h3 class="text-center">No Posts Yet</h3>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>