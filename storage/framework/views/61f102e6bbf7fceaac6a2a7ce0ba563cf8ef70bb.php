<?php if(count($errors) > 0): ?>
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong><?php echo e(__('validation.title')); ?></strong>

        <br><br>

        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?><?php /**PATH /home/jure/sg8000/resources/views/common/errors.blade.php ENDPATH**/ ?>