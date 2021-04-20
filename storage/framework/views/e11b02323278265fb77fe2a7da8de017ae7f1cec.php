<?php $__env->startSection('content'); ?>

    <div class="page-title">
        <div class="container-fluid">
            <h5><?php echo e(__('member.addLicense')); ?>:
            </h5>
        </div>
    </div>
    <br>

    <div class="container-fluid">
        <div class="panel panel-default p-3 mb-2 bg-light text-dark">
        <?php echo $__env->make('common.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- New lesson Form -->
            <form action="<?php echo e(route('members.storeLicense')); ?>" method="POST" class="form-horizontal ">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                </div>

                <div class="row">

                    <div class="col-sm-5">
                        <label for="type"><?php echo e(__('member.licenses')); ?></label><p>
                        <?php echo Form::select('license', $licenses, null); ?>

                    </div>
                    <div class="col-sm-5">
                        <label for="valid_from"><?php echo e(__('license.valid_from')); ?></label>
                        <div class="input-append date form_date">
                            <input size="16" type="text" value="<?php echo e(old('valid_from')); ?>" readonly id="valid_from" name="valid_from">
                            <span class="add-on"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                </div>
                <input type="hidden" name="memberId" value="<?php echo e($memberId); ?>">
                <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
                <!-- Add lesson Button -->
                <div class="form-group">
                    <a href="<?php echo e(url()->previous()); ?>"class="btn btn-primary"><i class="fa fa-angle-double-left"></i><?php echo e(__('general.back')); ?></a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i> <?php echo e(__('license.add')); ?>

                    </button>

                </div>
            </form>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/damir/Projects/larajure/resources/views/admin/members/members_add_license.blade.php ENDPATH**/ ?>