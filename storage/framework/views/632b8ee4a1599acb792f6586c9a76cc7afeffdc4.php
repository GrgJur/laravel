<?php $__env->startSection('content'); ?>
    <div class="page-title">
        <div class="container-fluid">
            <h5><?php echo e(__('lesson.list').' '.$typ); ?></h5>
        </div>
    </div>
    <div class="form-group">
    </div>
    <div class="container-fluid">
        <div class="search p bg-light m-b-sm">
            <form method="GET" action="<?php echo e(route('lessons.search',['type'=>$typ])); ?>">
                <?php echo csrf_field(); ?>
                <div class="input-group">
                    <input name="search" class="form-control" type="text" placeholder="<?php echo e(__('lesson.search')); ?>"
                           value="<?php echo e(app('request')->input('search')); ?>">
                    &nbsp;
                    <span class="input-group-btn">
                     <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
        </div>

        <?php if(count($courses) > 0): ?>


            <div class="form-group">
            </div>

            <div class="form-group">
            </div>
            <br><br><br>

            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button class="btn btn-lg" type="button" data-toggle="collapse" data-target="#<?php echo e($course->id); ?>"
                        style="display:inline;margin:0px;padding:0px;" title="<?php echo e(__('general.expand')); ?>">
                    <i class="fa fa-caret-square-o-down coll"></i>
                </button>
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
                <hr>
                <div class="form-group">
                </div>
                <div class="collapse show" id="<?php echo e($course->id); ?>">
                    <div class="row">
                        <?php $__currentLoopData = $course->lessons->sortBy('number'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="pull-right">
                                            <i class="fa fa-circle" aria-hidden="true"
                                               style="color:<?php echo e($lesson->status->color); ?>;"
                                               title="<?php echo e($lesson->status->description); ?>"></i>
                                        </div>
                                        <h6 class="card-title">#<?php echo e($lesson->id); ?></h6>
                                        <h6 class="card-title"><?php echo e(__('lesson.number')); ?>: <?php echo e($lesson->number); ?></h6>
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
                                        <a href="<?php echo e(route('lessons.show',['lesson'=>$lesson->id])); ?>"
                                           class="btn btn-info btn-xs">
                                            <i class="fa fa-eye" title="<?php echo e(__('lesson.show')); ?>"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="form-group">
                </div>
                <hr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



            <div class="pull-right align-bottom">
                <?php echo e($courses->appends(['typ' => $typ])->links()); ?>

            </div>

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



<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.template_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/damir/Projects/larajure/resources/views/client/lessons/lessons_show.blade.php ENDPATH**/ ?>