<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">

    <div class="container-fluid ">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo e(route('authentication.index')); ?>"><?php echo e(__('navigation.title')); ?></a>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle <?php echo e(Request::is('admin/lessons')? 'nav-link active' : 'nav-link'); ?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo e(__('navigation.courses')); ?>

                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                         <?php echo csrf_field(); ?>
                                <?php $__currentLoopData = \App\Models\CourseType::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="dropdown-item" href="<?php echo e(route('lessons.index',['type'=>$type->description])); ?>"><?php echo e($type->description); ?></a>
                                    <div class="dropdown-divider"></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </li>
                    <li>
                        <a class="<?php echo e(Request::is('admin/members')? 'nav-link active' : 'nav-link'); ?>" href="<?php echo e(route('members.search')); ?>"><?php echo e(__('navigation.all')); ?></a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?php echo e(route('payments.index')); ?>"><?php echo e(__('navigation.pay')); ?></a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?php echo e(route('statistics.index')); ?>"><?php echo e(__('navigation.stats')); ?></a>
                    </li>
                </ul>

        </div>
    </div>
</nav>
<div class="form-group">
</div><?php /**PATH /home/jure/backup/sg8000/resources/views/layouts/partials/nav.blade.php ENDPATH**/ ?>