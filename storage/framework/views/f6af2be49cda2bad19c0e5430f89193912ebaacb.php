<?php $__env->startSection('content'); ?>

    <div class="page-title">
        <div class="container-fluid">
            <h5><?php echo e(__('member.manage_inscriptions')); ?>:
            </h5>
        </div>
    </div>
    <br>

    <div class="container-fluid">
        <div class="panel panel-default p-3 mb-2 bg-light text-dark">
            <?php echo $__env->make('common.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="table-responsive" id="edit_license_member">
                <h5>
                    <?php echo e(__('license.category')); ?>

                    <?php echo e($licenseMember->license->description); ?>

                </h5>
                <?php if(count($courses) > 0): ?>
                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <br>
                        <div class="form-group"></div>

                        <h6 style="display:inline;margin:0px;padding:0px;"><b>&nbsp;
                                #<?php echo e($course->id); ?>

                                <?php echo e(__('lesson.course').' '.$course->type->description); ?>

                                <?php if(!is_null($course->firstLesson)): ?>
                                    <?php echo e(__('lesson.of')); ?>

                                    <?php echo e(\Carbon\Carbon::parse($course->firstLesson->first_lesson)->format('d-m-Y')); ?>

                                    <?php echo e(__('lesson.at')); ?>

                                    <?php echo e(\Carbon\Carbon::parse($course->firstLesson->first_lesson)->format('H:i')); ?>

                                <?php else: ?>
                                   ( <?php echo e(__('course.no_lesson')); ?> )
                                <?php endif; ?>
                            </b>
                        </h6>
                        <div class="form-group"></div>
                        <table class="table table-active">
                            <tr>
                                <th scope="row"><?php echo e(__('lesson.type')); ?></th>
                                <th scope="row"><?php echo e(__('lesson.date_time')); ?></th>
                                <th scope="row"><?php echo e(__('lesson.number')); ?></th>
                                <th scope="row"><?php echo e(__('instructor.fullname')); ?></th>

                                <th scope="row"></th>
                            </tr>
                            <?php $__currentLoopData = $course->lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(in_array($lesson->id,$lessonsId)): ?>
                                    <tr>
                                        <td><?php echo e($lesson->course->type->description); ?></td>
                                        <td><?php echo e($lesson->date_time); ?></td>
                                        <td><?php echo e($lesson->number); ?></td>
                                        <td><?php echo e($lesson->instructor->firstname); ?> <?php echo e($lesson->instructor->lastname); ?></td>
                                        <td>
                                            <form class="delete"
                                                  action="<?php echo e(route('members.removeMember', ['lessonLicenseMemberId' => $lesson->getLessonLicenseMemberIdByLicenseMemberId($licenseMember->id)])); ?>"
                                                  method="POST">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('DELETE')); ?>

                                                <button class="btn btn-danger btn-xs btn-delete">
                                                    <i class="fa fa-trash-o" title="<?php echo e(__('member.unsuscribe')); ?>"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="form-group"></div>
                    <div class="alert alert-warning"><?php echo e(__('member.no_lesson')); ?></div>
                <?php endif; ?>
                <div class="form-group">
                    <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary"><i
                                class="fa fa-angle-double-left"></i><?php echo e(__('general.back')); ?></a>
                    <button
                            type="button"
                            class="btn btn-primary"
                            data-toggle="modal"
                            data-target="#coursesModal">
                        <?php echo e(__('member.add_inscription')); ?>

                    </button>

                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('admin.members.members_show_courses_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jure/sg8000/resources/views/admin/members/members_edit_lessons_inscription.blade.php ENDPATH**/ ?>