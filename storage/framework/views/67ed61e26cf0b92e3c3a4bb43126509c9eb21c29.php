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
                            <li class="nav-item"><a class="nav-link" href="#tab2" data-toggle="tab"><?php echo e(__('lesson.members')); ?></a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>#<?php echo e($lesson->id); ?></th>
                                        </tr>
                                        </thead>
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
                            <div class="tab-pane" id="tab2" role="tabpanel">

                                <?php if(count($lesson->LessonLicenseMember)>0): ?>

                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <th scope="row" ># <?php echo e(__('member.id')); ?></th>
                                                    <th scope="row" ><?php echo e(__('member.nip')); ?></th>
                                                    <th scope="row" ><?php echo e(__('member.firstname')); ?></th>
                                                    <th scope="row" ><?php echo e(__('member.lastname')); ?></th>
                                                    <th scope="row" ><?php echo e(__('member.birthdate')); ?></th>
                                                    <th scope="row" ><?php echo e(__('member.phone')); ?></th>
                                                    <th scope="row" ><?php echo e(__('lesson.notes')); ?></th>
                                                </tr>
                                                <?php $__currentLoopData = $lesson->LessonLicenseMember; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $llm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td scope="row" ><?php echo e($llm->licenseMember->member->id); ?></td>
                                                        <td scope="row" ><?php echo e($llm->licenseMember->member->nip); ?></td>
                                                        <td scope="row" ><?php echo e($llm->licenseMember->member->firstname); ?></td>
                                                        <td scope="row" ><?php echo e($llm->licenseMember->member->lastname); ?></td>
                                                        <td scope="row" ><?php echo e($llm->licenseMember->member->birthdate); ?></td>
                                                        <?php if(!empty($llm->licenseMember->member->mobile)): ?>
                                                            <td class="table-text"><div><a href="tel:<?php echo e($llm->licenseMember->member->mobile); ?>"><?php echo e($llm->licenseMember->member->mobile); ?></a></div></td>
                                                        <?php else: ?>
                                                            <td class="table-text"><div><a href="tel:<?php echo e($llm->licenseMember->member->phone); ?>"><?php echo e($llm->licenseMember->member->phone); ?></a></div></td>
                                                    <?php endif; ?>
                                                        <td scope="row" ><?php echo e($llm->notes); ?></td>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </table>
                                        </div>

                                <?php else: ?>
                                    <div class="form-group"></div>
                                    <div class="alert alert-warning"><?php echo e(__('lesson.no_members')); ?></div>
                                <?php endif; ?>

                            </div>
                            <div class="tab-pane" id="tab4" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table">

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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jure/sg8000/resources/views/admin/lessons/lessons_detail.blade.php ENDPATH**/ ?>