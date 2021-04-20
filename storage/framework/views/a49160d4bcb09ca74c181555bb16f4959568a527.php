<?php $__env->startSection('content'); ?>

    <div class="page-title">
        <div class="container-fluid">
            <h5><?php echo e(__('member.add')); ?></h5>
        </div>
    </div>
    <br>
    <div class="form-group">
    </div>
    <div class="container-fluid">
        <div class="panel panel-default p-3 mb-2 bg-light text-dark">
            <form class="form-horizontal" action="<?php echo e(route('members.store')); ?>" method="POST">
                <?php echo $__env->make('admin.members.members_form', ['submitButtonText' =>__('member.add')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </form>
        </div>
    </div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jure/sg8000/resources/views/admin/members/members_create.blade.php ENDPATH**/ ?>