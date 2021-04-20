<?php $__env->startSection('content'); ?>

	<div class="page-title">
        <div class="container-fluid">
            <h5>Pagamenti</h5>
        </div>
        <div class="form-group">
        </div>
    </div>
    <div class="container-fluid">
        <div class="search p bg-light m-b-sm">
            <form method="GET" action="<?php echo e(route('payments.search')); ?>">
                <?php echo csrf_field(); ?>
                <div class="input-group">
                    <input name="search" class="form-control input-search" type="text" placeholder="<?php echo e(__('payment.search')); ?>" value="<?php echo e(app('request')->input('search')); ?>">
                    &nbsp;
                    <span class="input-group-btn">
                        <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
    </div> 


    <?php if(count($payments) > 0): ?>
            <div class="panel-body">

                <div class="form-group">
                </div>
                <div class="pull-left">
                    <a class="btn btn-success" href="<?php echo e(route('payments.create')); ?>"><?php echo e(__('payment.add')); ?></a>
                </div>
                <div class="table-responsive">

                    <div class="form-group">
                    </div>
                        <table class="table table-striped responsive-table" id="dt">

                            <!-- Table Headings -->
                            <thead>
                                <th><?php echo e(__('payment.date')); ?></th>
                                <th><?php echo e(__('payment.member')); ?></th>
                                <th><?php echo e(__('payment.course')); ?></th>
                                <th><?php echo e(__('payment.instructor')); ?></th>
                                <th><?php echo e(__('payment.amount')); ?></th>
                                <th>&nbsp;</th>
                                <th></th>
                                <th></th>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                            <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="table-text"><div><?php echo e($payment->date); ?></div></td>
                                    <td class="table-text"><div><?php echo e($payment->member_firstname); ?> <?php echo e($payment->member_lastname); ?></div></td>
                                    <td class="table-text"><div><?php echo e($payment->description); ?></div></td>
                                    <td class="table-text"><div><?php echo e($payment->instructor_firstname); ?> <?php echo e($payment->instructor_lastname); ?></div></td>
                                    <td class="table-text"><div><?php echo e($payment->amount); ?> CHF</div></td>
                                    <td>
                                        <a href="<?php echo e(route('payments.details', $payment)); ?>" class="btn btn-info btn-xs"><i class="fa fa-eye" title="<?php echo e(__('payment.details')); ?>"></i></a>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('payments.edit',$payment)); ?>" class="btn btn-info btn-xs edit"><i class="fa fa-pencil" title="<?php echo e(__('payment.edit')); ?>"></i></a>
                                    </td>
                                    <td>
                                        <form class="delete" action="<?php echo e(route('payments.destroy',$payment)); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field('DELETE')); ?>

                                            <button class="btn btn-danger btn-xs btn-delete" >
                                                <i class="fa fa-trash-o" title="<?php echo e(__('payment.delete')); ?>"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    <div class="pull-right align-bottom">
                        <?php echo e($payments ?? ''->links()); ?>

                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/damir/Projects/larajure/resources/views/admin/payments/payments_show.blade.php ENDPATH**/ ?>