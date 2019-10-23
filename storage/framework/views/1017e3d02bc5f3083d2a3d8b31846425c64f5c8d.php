
<?php $__env->startSection('content'); ?>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo e(isset($post) ? 'Edit Post': 'Create Post'); ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo e(isset($post) ? 'Edit Post': 'Create Post'); ?></li>
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
                            <form action="<?php echo e(isset($post) ? route('post.update', $post->id) : route('post.store')); ?>"
                                  method="POST" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>

                                <?php if(isset($post)): ?>
                                    <?php echo e(method_field('PUT')); ?>

                                <?php endif; ?>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" id='title'
                                           value="<?php echo e(isset($post) ? $post->title: ''); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input id="description" type="text" name="description" class="form-control"
                                           value="<?php echo e(isset($post) ? $post->description : ''); ?>">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <input id="content" type="text" name="content" class="form-control"
                                           value="<?php echo e(isset($post) ? $post->content : ''); ?>">
                                    
                                </div>
                                <?php if(isset($post)): ?>
                                    <div class="form-group">
                                        <img src="<?php echo e(asset($post->image)); ?>" alt="" style="width: 100%">
                                    </div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select name="category" id="category" class="form-control">
                                        
                                        
                                        
                                        <?php $__currentLoopData = $courseApprovals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courseApproval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(Auth::id()===$courseApproval->user_id ): ?>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($category->course_id === $courseApproval->course_id): ?>
                                                        <option value="<?php echo e($category->id); ?>" <?php if(isset($post)): ?>
                                                        <?php if($category->id === $post->category_id): ?>
                                                        selected
                                                                <?php endif; ?>
                                                                <?php endif; ?>
                                                        >
                                                            <?php echo e($category->name); ?>

                                                            <?php if(isset($courses)): ?>
                                                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if($course->id === $category->course_id): ?>
                                                                        <?php echo e($course->name); ?>

                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        </option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="image"/>
                                </div>
                                <!--<div class="form-group">
                               <input type="file" name="file" />
                                </div>-->

                                <?php if($tags->count() > 0): ?>
                                    <div class="form-group">
                                        <label for="tags">Tags</label>

                                        <select name="tags[]" id="tags" class="form-control tags-selector" multiple>
                                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($tag->id); ?>"
                                                        <?php if(isset($post)): ?>
                                                        <?php if($post->hasTag($tag->id)): ?>
                                                        selected
                                                        <?php endif; ?>
                                                        <?php endif; ?>
                                                >
                                                    <?php echo e($tag->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                <?php endif; ?>


                                <div class="form-group text-center">

                                    <button type="submit"
                                            class="btn btn-success"> <?php echo e(isset($post) ? 'Update Post': 'Create Post'); ?></button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>

        $(document).ready(function () {
            $('.tags-selector').select2();
        })
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>