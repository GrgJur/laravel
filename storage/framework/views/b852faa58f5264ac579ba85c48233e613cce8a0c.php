<?php $__env->startSection('content'); ?>

    <div class="page-title">
        <div class="container-fluid">
            <h5><?php echo e(__('lesson.add')); ?>:
                <?php if(!is_null($course->firstLesson)): ?>
                    <?php echo e(__('lesson.course')); ?>

                    <?php echo e(__('lesson.of')); ?>

                    <?php echo e(\Carbon\Carbon::parse($course->firstLesson->first_lesson)->format('d-m-Y')); ?>

                    <?php echo e(__('lesson.at')); ?>

                    <?php echo e(\Carbon\Carbon::parse($course->firstLesson->first_lesson)->format('H:i')); ?>

                <?php else: ?>
                          ( <?php echo e(__('course.no_lesson')); ?> )
                <?php endif; ?>
            </h5>
            <p hidden id="maxMembers"><?php echo e($course->type->max_members); ?></p>
        </div>
    </div>
    <br>

    <div class="container-fluid">
        <div class="panel panel-default p-3 mb-2 bg-light text-dark">
        <?php echo $__env->make('common.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- New lesson Form -->
            <form action="<?php echo e(route('lessons.store')); ?>" method="POST" class="form-horizontal " id="formInsertLesson"
                  name="formInsertLesson" onsubmit="return validateLessonsCreateForm()">
                <?php echo e(csrf_field()); ?>



                <div class="form-group">
                </div>

                <div class="row">

                    <div class="col-sm-3">
                        <label for="instructor_id"><?php echo e(__('lesson.instructor')); ?></label>
                    
                        <select name="instructor_id">
                            <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructorId => $instructorLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($instructorId); ?>"><?php echo e($instructorLabel); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="col-sm-3">
                        <label for="date_time"><?php echo e(__('lesson.date_time')); ?></label>
                        <div class="input-append date form_datetime ">
                            <input size="16" type="text" value="<?php echo e(old('date_time')); ?>" readonly id="date_time"
                                   name="date_time">
                            <span class="add-on" id="dateTimePic"><i class="fa fa-calendar"></i></span>
                            <div class="alert alert-danger" id="errorDateTime" style="display:none;"></div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label for="number"><?php echo e(__('lesson.number')); ?></label>
                        
                        <select name="number" id="number">
                            <?php $__currentLoopData = $availablesLessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $availablesLessonId => $availablesLessonLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($availablesLessonId); ?>"><?php echo e($availablesLessonLabel); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="status_id"><?php echo e(__('lesson.status')); ?></label>
                        
                        <select name="status_id" id="status_id">
                            <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusId => $statusLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($statusId); ?>"><?php echo e($statusLabel); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>


                <div class="row">
                    <?php echo $__env->make('admin.lessons.lesson_actual_members', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group">
                </div>
                <div class="row">
                    <div class="container" style="background-color: #f2f4f7;">
                        <div class="panel-body">

                            <div class="form-group">
                            </div>

                            <hr>
                            <div class="form-group">
                            </div>
                            <h6><b><?php echo e(__('member.list')); ?></b></h6>
                            <?php echo $__env->make('admin.lessons.lessons_members', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                </div>
                <input type="hidden" name="course_id" value="<?php echo e($course->id); ?>">
                <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
                <!-- Add lesson Button -->
                <div class="form-group">
                    <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary"><i
                                class="fa fa-angle-double-left"></i><?php echo e(__('general.back')); ?></a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i> <?php echo e(__('lesson.add')); ?>

                    </button>

                </div>
            </form>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jure/sg8000/resources/views/admin/lessons/lessons_create.blade.php ENDPATH**/ ?>