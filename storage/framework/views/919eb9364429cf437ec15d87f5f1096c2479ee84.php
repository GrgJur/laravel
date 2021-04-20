<?php $__env->startSection('content'); ?>

    <div class="page-title">
        <div class="container-fluid">
            <h5><?php echo e(__('member.detail')); ?></h5>
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
                                                    data-toggle="tab"><?php echo e(__('member.details')); ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab2"
                                                    data-toggle="tab"><?php echo e(__('member.licenses')); ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab3"
                                                    data-toggle="tab"><?php echo e(__('member.courses')); ?></a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>#<?php echo e($member->id); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row"><?php echo e(__('member.nip')); ?></th>
                                            <td><?php echo e($member->nip); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php echo e(__('member.firstname')); ?></th>
                                            <td><?php echo e($member->firstname); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php echo e(__('member.lastname')); ?></th>
                                            <td><?php echo e($member->lastname); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php echo e(__('member.birthdate')); ?></th>
                                            <td><?php echo e(\Carbon\Carbon::parse($member->birthdate)->format('d-m-Y')); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php echo e(__('member.email')); ?></th>
                                            <td><?php echo e($member->email); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php echo e(__('member.address')); ?></th>
                                            <td><?php echo e($member->address); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php echo e(__('member.city')); ?></th>
                                            <td><?php echo e($member->zip); ?> <?php echo e($member->city); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php echo e(__('member.phone')); ?></th>
                                            <td><?php echo e($member->phone); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php echo e(__('member.mobile')); ?></th>
                                            <td><?php echo e($member->mobile); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php echo e(__('member.work')); ?></th>
                                            <td><?php echo e($member->work); ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab2" role="tabpanel">
                                <div class="table-responsive">
                                    <?php if(count($member->licenses) > 0): ?>
                                        <table class="table">
                                            <tr>
                                                <th scope="row"><?php echo e(__('license.description')); ?></th>
                                                <th scope="row"><?php echo e(__('license.long_description')); ?></th>
                                                <th scope="row"><?php echo e(__('license.valid_from')); ?></th>
                                            </tr>
                                            <?php $__currentLoopData = $member->licenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $license): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($license->description); ?></td>
                                                    <td><?php echo e($license->long_description); ?></td>
                                                    <td><?php echo e(\Carbon\Carbon::parse($license->pivot->valid_from)->format('d-m-Y')); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </table>
                                    <?php else: ?>
                                        <div class="form-group"></div>
                                        <div class="alert alert-warning"><?php echo e(__('member.no_license')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab3" role="tabpanel">
                                <?php if(count($courses) > 0): ?>


                                    <div class="form-group">
                                    </div>
                                    <div class="form-group">
                                    </div>

                                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(count($course->lessons) > 0): ?>
                                            <button class="btn btn-lg" type="button" data-toggle="collapse"
                                                    data-target="#<?php echo e($course->id); ?>"
                                                    style="display:inline;margin:0px;padding:0px;"
                                                    title="<?php echo e(__('general.expand')); ?>">
                                                <i class="fa fa-caret-square-o-down coll"></i>
                                            </button>
                                            <h6 style="display:inline;margin:0px;padding:0px;"><b>&nbsp;
                                                    #<?php echo e($course->id); ?>

                                                    <?php echo e(__('lesson.course').' '.$course->type->description); ?>

                                                    <?php echo e(__('lesson.of')); ?>

                                                    <?php echo e(\Carbon\Carbon::parse($course->firstLesson->first_lesson)->format('d-m-Y')); ?>

                                                    <?php echo e(__('lesson.at')); ?>

                                                    <?php echo e(\Carbon\Carbon::parse($course->firstLesson->first_lesson)->format('H:i')); ?>

                                                </b>
                                            </h6>
                                            <div class="form-group">
                                            </div>
                                            <div class="collapse show" id="<?php echo e($course->id); ?>">
                                                <div class="row">
                                                    <?php $__currentLoopData = $course->lessons->sortBy('number'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(in_array($lesson->id,$lessonsId)): ?>
                                                        <div class="col-sm-3">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="pull-right">
                                                                        <i class="fa fa-circle" aria-hidden="true"
                                                                           style="color:<?php echo e($lesson->status->color); ?>;"
                                                                           title="<?php echo e($lesson->status->description); ?>"></i>
                                                                    </div>
                                                                    <h6 class="card-title"><?php echo e(__('license.category')); ?>: <?php echo e($course->description); ?></h6>
                                                                    <h6 class="card-title">#<?php echo e($lesson->id); ?></h6>
                                                                    <h6 class="card-title"><?php echo e(__('lesson.number')); ?>

                                                                        : <?php echo e($lesson->number); ?></h6>
                                                                    <h7 class="card-subtitle mb-2 text-muted"><?php echo e(\Carbon\Carbon::parse($lesson->date_time)->format('d-m-Y H:i')); ?></h7>
                                                                    <p><?php echo e(__('instructor.instructor')); ?>

                                                                        : <?php echo e($lesson->instructor->firstname); ?> <?php echo e($lesson->instructor->lastname); ?></p>
                                                                    <p style="font-size: smaller"><?php echo e(__('lesson.remaining_places')); ?>

                                                                        <?php if(count($lesson->LessonLicenseMember)<($course->type->max_members/2)): ?>
                                                                            <span class="badge badge-pill badge-success"><?php echo e(count($lesson->LessonLicenseMember)); ?>

                                                                                /<?php echo e($course->type->max_members); ?>

                                                                            </span>
                                                                        <?php elseif(count($lesson->LessonLicenseMember)<($course->type->max_members)): ?>
                                                                            <span class="badge badge-pill badge-warning"><?php echo e(count($lesson->LessonLicenseMember)); ?>

                                                                                /<?php echo e($course->type->max_members); ?>

                                                                            </span>
                                                                        <?php elseif(count($lesson->LessonLicenseMember)>=($course->type->max_members)): ?>
                                                                            <span class="badge badge-pill badge-danger"><?php echo e(count($lesson->LessonLicenseMember)); ?>

                                                                                /<?php echo e($course->type->max_members); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </p>
                                                                    <a href="<?php echo e(route('lessons.show',$lesson)); ?>"
                                                                       class="btn btn-info btn-xs">
                                                                        <i class="fa fa-eye"
                                                                           title="<?php echo e(__('lesson.show')); ?>"></i>
                                                                    </a>
                                                                    <a href="<?php echo e(route('lessons.edit',$lesson)); ?>"
                                                                       class="btn btn-info btn-xs"><i
                                                                                class="fa fa-pencil"
                                                                                title="<?php echo e(__('lesson.edit')); ?>"></i></a>
                                                                    <form action="<?php echo e(route('lessons.destroy',$lesson)); ?>"
                                                                          method="POST"
                                                                          style="display:inline;margin:0px;padding:0px;">
                                                                        <?php echo method_field('DELETE'); ?>

                                                                        <?php echo csrf_field(); ?>

                                                                        <button class="btn btn-danger btn-xs btn-delete">
                                                                            <i class="fa fa-trash-o"
                                                                               title="<?php echo e(__('lesson.delete')); ?>"></i>
                                                                        </button>
                                                                    </form>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                            </div>
                                            <hr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </div>

                            <?php else: ?>
                                <div class="form-group">
                                </div>
                                <div class="clearfix"></div>
                                <div class="alert alert-info timerHide" role="alert">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <?php echo e(__('lesson.not_found')); ?>

                                </div>
                                <div class="form-group">
                                </div>
                            <?php endif; ?>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jure/sg8000/resources/views/admin/members/members_detail.blade.php ENDPATH**/ ?>