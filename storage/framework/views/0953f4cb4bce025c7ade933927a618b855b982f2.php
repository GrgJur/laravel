<?php $__env->startSection('content'); ?>

<p>BENVENUTO <?php echo e(auth()->user()->firstname); ?> <?php echo e(auth()->user()->lastname); ?></p>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.template_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jure/sg8000/resources/views/client/home.blade.php ENDPATH**/ ?>