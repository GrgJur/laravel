<?php $__env->startSection('content'); ?>

    <div class="page-title">
        <div class="container-fluid">
            <h5><?php echo e(__('lesson.detail')); ?></h5>
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
                            <li class="nav-item"><a class="nav-link active" href="#tab1" data-toggle="tab"><?php echo e(__('lesson.detail')); ?></a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <th scope="row"><?php echo e(__('lesson.date_time')); ?></th>
                                            <td><?php echo e($lesson->date_time); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php echo e(__('lesson.number')); ?></th>
                                            <td><?php echo e($lesson->number); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php echo e(__('lesson.instructor')); ?></th>
                                            <td><?php echo e($lesson->instructor->firstname); ?> <?php echo e($lesson->instructor->lastname); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php echo e(__('lesson.status')); ?></th>
                                            <td><?php echo e($lesson->status->description); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php echo e(__('lesson.type')); ?></th>
                                            <td><?php echo e($lesson->course->type->description); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php echo e(__('lesson.num_members')); ?></th>
                                            <td><?php echo e(count($lesson->LessonLicenseMember)); ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <a href="<?php echo e(url()->previous()); ?>#<?php echo e($lesson->course->id); ?>"class="btn btn-primary"><i class="fa fa-angle-double-left"></i><?php echo e(__('general.back')); ?></a>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/damir/Projects/larajure/resources/views/client/lessons/lessons_detail.blade.php ENDPATH**/ ?>