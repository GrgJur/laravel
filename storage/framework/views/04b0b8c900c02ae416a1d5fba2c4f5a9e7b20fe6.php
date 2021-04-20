<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>


<?php if(Session::has('info')): ?>
    <div class="clearfix"></div>
    <div class="alert alert-info timerHide" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php echo Session::get('info'); ?>

    </div>
<?php endif; ?>

<?php if(Session::has('success')): ?>
    <div class="clearfix"></div>
    <div class="alert alert-success timerHide" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php echo Session::get('success'); ?>

    </div>
<?php endif; ?>

<?php if(Session::has('warning')): ?>
    <div class="clearfix"></div>
    <div class="alert alert-warning timerHide" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php echo Session::get('warning'); ?>

    </div>
<?php endif; ?>

<?php if(Session::has('error')): ?>
    <div class="clearfix"></div>
    <div class="alert alert-danger timerHide" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php echo Session::get('error'); ?>

    </div>
<?php endif; ?><?php /**PATH /home/jure/backup/sg8000/resources/views/layouts/partials/alert.blade.php ENDPATH**/ ?>