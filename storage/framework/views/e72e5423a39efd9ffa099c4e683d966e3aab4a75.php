<?php $__env->startSection('content'); ?>

    <div class="page-title">
        <div class="container-fluid">
            <h5><?php echo e(__('payment.edit')); ?></h5>
        </div>
    </div>
    <div class="form-group">
    </div>
    <div class="container-fluid">
        <?php echo $__env->make('common.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-12">
                <div class="panel panel-white">
                    <div class="form-group"></div>
                    <div role="tabpanel">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" href="#tab1"
                                                    data-toggle="tab"><?php echo e(__('payment.details')); ?></a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1" role="tabpanel">
                                <div class="panel panel-default p-3 mb-2 bg-light text-dark">
                                    <div class="form-group"></div>
                                    <form action="<?php echo e(route('payments.update',$payments)); ?>" method="POST">
                                        <?php echo $__env->make('admin.payments.payments_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jure/sg8000/resources/views/admin/payments/payments_edit.blade.php ENDPATH**/ ?>