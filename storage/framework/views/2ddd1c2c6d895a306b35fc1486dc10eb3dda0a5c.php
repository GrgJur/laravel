<?php $__env->startSection('content'); ?>

    <div class="page-title">
        <div class="container-fluid">
            <h5><?php echo e(__('payment.add')); ?></h5>
        </div>
    </div>
    <br>
    <div class="form-group">
    </div>
    <div class="container-fluid">
        <div class="panel panel-default p-3 mb-2 bg-light text-dark">
            <form class="form-horizontal" action="<?php echo e(route('payments.store')); ?>" method="POST">
                <?php echo $__env->make('admin.payments.payments_form', ['submitButtonText' =>__('payment.add')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </form>
        </div>
    </div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/damir/Projects/larajure/resources/views/admin/payments/payments_create.blade.php ENDPATH**/ ?>