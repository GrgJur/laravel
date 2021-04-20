<?php $__env->startSection('content'); ?>

    <div class="page-title">
        <div class="container-fluid">
            <h5><?php echo e(__('payment.detail')); ?></h5>
        </div>
    </div>
    <br>
    <div class="form-group">
    </div>
    <div class="container-fluid" id="main-wrapper">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-12">
                <div class="panel panel-white">
                    <div role="tabpanel">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" href="#tab1"
                                                    data-toggle="tab"><?php echo e(__('payment.details')); ?></a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>#<?php echo e($payments->id); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row"><?php echo e(__('payment.date')); ?></th>
                                            <td><?php echo e($payments->date); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php echo e(__('payment.member')); ?></th>
                                            <td><?php echo e($payments->member_firstname); ?> <?php echo e($payments->member_lastname); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php echo e(__('payment.instructor')); ?></th>
                                            <td><?php echo e($payments->instructor_lastname); ?> <?php echo e($payments->instructor_lastname); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php echo e(__('payment.course')); ?></th>
                                            <td><?php echo e($payments->description); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php echo e(__('payment.amount')); ?></th>
                                            <td><?php echo e($payments->amount); ?> CHF</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>


            <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary"><i
                        class="fa fa-angle-double-left"></i><?php echo e(__('general.back')); ?></a>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jure/sg8000/resources/views/admin/payments/payments_details.blade.php ENDPATH**/ ?>