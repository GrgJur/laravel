<?php $__env->startSection('content'); ?>

    <div class="page-title">
        <div class="container-fluid">
            <h5><?php echo e(__('course.create')); ?>:
            </h5>
        </div>
    </div>
    <br>

    <div class="container-fluid">
        <div class="panel panel-default p-3 mb-2 bg-light text-dark">
        <?php echo $__env->make('common.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- New lesson Form -->
            <form action="<?php echo e(route('courses.store')); ?>" method="POST" class="form-horizontal " id="formInsertCourse" name="formInsertCourse">
            <?php echo e(csrf_field()); ?>




                <div class="form-group">
                </div>

                <div class="row">

                    <div class="col-sm-5">
                        <label for="type"><?php echo e(__('course.type')); ?></label><p>
                        <select name="type" id="type">
                            <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typeId => $typeLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($typeId); ?>" <?php if($typeId === $actualTypeId): ?> selected <?php endif; ?>><?php echo e($typeLabel); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-sm-5">
                        <label for="facebook"><?php echo e(__('course.facebook')); ?></label>
                        <input type="text" name="facebook" id="facebook" class="form-control" value="<?php echo e(old('facebook')); ?>">
                    </div>

                </div>

                <div class="form-group">
                </div>
                <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
                <!-- Add lesson Button -->
                <div class="form-group">
                    <a href="<?php echo e(url()->previous()); ?>"class="btn btn-primary"><i class="fa fa-angle-double-left"></i><?php echo e(__('general.back')); ?></a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus"></i> <?php echo e(__('course.create')); ?>

                        </button>

                </div>
            </form>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jure/sg8000/resources/views/admin/courses/courses_create.blade.php ENDPATH**/ ?>