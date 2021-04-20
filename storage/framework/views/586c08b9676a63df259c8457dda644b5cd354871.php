<?php echo e(csrf_field()); ?>

<div class="col-xs-8">
    <label for="title"><?php echo e(__('payment.date')); ?></label>
    <input class="form-control" type="date" name="date">
</div>

<div class="row">
    <div class="form-group">
    </div>
    <div class="col">
        <label class="awesome" for="member_id"><?php echo e(__('payment.member')); ?></label>
        <select class="form-control" name="member_id">
            <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($member->id); ?>"><?php echo e($member->firstname); ?> <?php echo e($member->lastname); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

    </div>
    <div class="col">
        <label class="awesome" for="instructor_id"><?php echo e(__('payment.instructor')); ?></label>
        <select class="form-control" name="instructor_id">
            <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($instructor->id); ?>"><?php echo e($instructor->firstname); ?> <?php echo e($instructor->lastname); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

    </div>

</div>
<div class="form-group">
</div>

<div class="row">

    <div class="col">
        <label class="awesome" for="course_id"><?php echo e(__('payment.course')); ?></label>
        <select class="form-control" name="course_id">
            <?php $__currentLoopData = $course_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($course_type->id); ?>"><?php echo e($course_type->description); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="form-group">
    </div>
    <div class="col">
        <label class="awesome" for="amount"><?php echo e(__('payment.amount')); ?></label>
        <input class="form-control" type="number" step="0.01" name="amount">
    </div>
</div>


<div class="form-group">
</div>

<input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">

<div class="form-group">
    <a href="<?php echo e(route('payments.index')); ?>" class="btn btn-primary"><i
                class="fa fa-angle-double-left"></i><?php echo e(__('general.back')); ?></a>
    <input class="btn btn-primary" type="submit" value="Salva">
</div>

<?php /**PATH /Users/damir/Projects/larajure/resources/views/admin/payments/payments_form.blade.php ENDPATH**/ ?>