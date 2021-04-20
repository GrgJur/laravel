<?php $__env->startSection('content'); ?>

    <div class="page-title">
        <div class="container-fluid">
            <h5><?php echo e(__('lesson.edit')); ?></h5>
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
                        <ul class="nav nav-tabs" role="tablist" id="tabMenu">
                            <li class="nav-item"><a class="nav-link active" href="#tab1"
                                                    data-toggle="tab"><?php echo e(__('lesson.detail')); ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab2"
                                                    data-toggle="tab"><?php echo e(__('lesson.members')); ?></a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1" role="tabpanel">
                                <form method="POST" action="<?php echo e(route('lessons.update', ['lesson' => $id])); ?>"
                                      data-parsley-validate class="form-horizontal form-label-left">
                                    <p hidden id="maxMembers"><?php echo e($lesson->course->type->max_members); ?></p>
                                    <?php echo e(csrf_field()); ?>

                                    <input name="_method" type="hidden" value="PUT">
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
                                                <td>
                                                    <div class="input-append date form_datetime ">
                                                        <input size="16" type="text"
                                                               value="<?php echo e($lesson->date_time); ?>"
                                                               readonly id="date_time" name="date_time">
                                                        <span class="add-on" id="dateTimePic"><i
                                                                    class="fa fa-calendar"></i></span>
                                                        <div class="alert alert-danger" id="errorDateTime"
                                                             style="display:none;"></div>
                                                    </div>


                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><?php echo e(__('lesson.number')); ?></th>
                                                <td>
                                                    <select name="number">
                                                        <?php $__currentLoopData = $availablesLessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $number): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($number); ?>"
                                                                    <?php if($number == $lesson->number): ?>
                                                                    selected="selected"
                                                                    <?php endif; ?>
                                                            ><?php echo e($number); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><?php echo e(__('lesson.instructor')); ?></th>
                                                <td>
                                                    <select name="instructor" id="instructor">
                                                        <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructorId => $instructorLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($instructorId); ?>" <?php if($instructorId === $lesson->instructor->id): ?> selected <?php endif; ?>><?php echo e($instructorLabel); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><?php echo e(__('lesson.status')); ?></th>
                                                <td>
                                                    <select name="status" id="status">
                                                        <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusId => $statusLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($statusId); ?>" <?php if($statusId === $lesson->status->id): ?> selected <?php endif; ?>><?php echo e($statusLabel); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="<?php echo e(route('lessons.index',['type'=>$lesson->course->type->description])); ?>#<?php echo e($lesson->course->id); ?>"
                                       class="btn btn-primary"><i
                                                class="fa fa-angle-double-left"></i><?php echo e(__('general.back')); ?></a>&nbsp;

                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa"></i> <?php echo e(__('lesson.update')); ?>

                                    </button>
                                </form>
                            </div>
                            <div class="tab-pane" id="tab2" role="tabpanel">

                                <?php if(count($lesson->LessonLicenseMember)>0): ?>

                                    <div class="table-responsive">
                                        <table class="table u-full-width" id="actual-member">
                                            <thead>
                                            <tr>
                                                <th># <?php echo e(__('member.id')); ?></th>
                                                <th><?php echo e(__('member.nip')); ?></th>
                                                <th><?php echo e(__('member.firstname')); ?></th>
                                                <th><?php echo e(__('member.lastname')); ?></th>
                                                <th><?php echo e(__('member.birthdate')); ?></th>
                                                <th><?php echo e(__('member.phone')); ?></th>
                                                <th><?php echo e(__('lesson.notes')); ?></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!is_null($lesson->LessonLicenseMember)): ?>
                                            <?php $__currentLoopData = $lesson->LessonLicenseMember; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $llm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(!is_null($llm->licenseMember)): ?>
                                                <tr data-id="<?php echo e($llm->id); ?>">
                                                    <td><?php echo e($llm->licenseMember->member->id); ?></td>
                                                    <td><?php echo e($llm->licenseMember->member->nip); ?></td>
                                                    <td><?php echo e($llm->licenseMember->member->firstname); ?></td>
                                                    <td><?php echo e($llm->licenseMember->member->lastname); ?></td>
                                                    <td><?php echo e($llm->licenseMember->member->birthdate); ?></td>
                                                    <?php if(!empty($member->mobile)): ?>
                                                        <td class="table-text"><div><a href="tel:<?php echo e($llm->licenseMember->member->mobile); ?>"><?php echo e($llm->licenseMember->member->mobile); ?></a></div></td>
                                                    <?php else: ?>
                                                        <td class="table-text"><div><a href="tel:<?php echo e($llm->licenseMember->member->phone); ?>"><?php echo e($llm->licenseMember->member->phone); ?></a></div></td>
                                                    <?php endif; ?>
                                                    <td data-field="notes"><?php echo e($llm->notes); ?></td>
                                                    <td>
                                                        <a class="btn btn-info btn-xs edit"
                                                           title="<?php echo e(__('member.edit')); ?>"><i
                                                                    class="fa fa-pencil"></i></a>
                                                    </td>

                                                    <td>
                                                        <form class="delete"
                                                              action="<?php echo e(route('lessons.removeMember', ['lessonLicenseMemberId' => $llm->id])); ?>"
                                                              method="POST">
                                                            <?php echo e(csrf_field()); ?>

                                                            <?php echo e(method_field('DELETE')); ?>

                                                            <button class="btn btn-danger btn-xs btn-delete">
                                                                <i class="fa fa-trash-o"
                                                                   title="<?php echo e(__('lesson.remove_member_from_lesson')); ?>"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>



                                <?php else: ?>
                                    <div class="form-group" id="space"></div>
                                    <div id="no_members" class="alert alert-warning"><?php echo e(__('lesson.no_members')); ?></div>
                                <?php endif; ?>
                                <a href="<?php echo e(route('lessons.index',['type'=>$lesson->course->type->description])); ?>#<?php echo e($lesson->course->id); ?>"
                                   class="btn btn-primary"><i class="fa fa-angle-double-left"></i><?php echo e(__('general.back')); ?>

                                </a>&nbsp;


                                <button
                                        type="button"
                                        class="btn btn-primary"
                                        data-toggle="modal"
                                        data-target="#membersModal">
                                    <?php echo e(__('lesson.add_member')); ?>

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php echo $__env->make('admin.lessons.lessons_members_direct', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jure/sg8000/resources/views/admin/lessons/lessons_edit.blade.php ENDPATH**/ ?>